<?php
function Database(){
	include("databases.php");
	return $connect;
}
function encode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}
function product_picture($product_id){
	$connect=Database();
	$picture_result=mysqli_result(mysqli_query($connect,"SELECT picture_type FROM product_pictures WHERE product_id='$product_id';"));
	$picture_type=$picture_result['picture_type'];
	$picture_url="../@pages/images/products/".$product_id."_1.".$picture_type;
	return $picture_url;
}
function SumPV($upline){
	$connect=Database();
	$uplines=array($upline);
	$uplines_count=0;
	$sum_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT IF(member_status='free',member_pv,package_pv+member_pv) AS sum FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE member_id=$upline"));
	$sum=$sum_result['sum'];
	do{
		$member_sql="SELECT member_id,package_pv,member_pv,member_status FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE ";
		$member_sql.=" upline=".$uplines[0];
		for($i=1;$i<=$uplines_count-1;$i++){
			$member_sql.=" OR upline=".$uplines[$i];
		}  
			
		$uplines=array();
		$member_query=mysqli_query($connect,$member_sql);
		while($members=mysqli_fetch_array($member_query)){
			if($members['member_status']=="free"){
				$sum=$sum+$members['member_pv'];
			}else{  
				$sum=$sum+$members['package_pv']+$members['member_pv'];
			}
			array_push($uplines,$members['member_id']);
		}
		$uplines_count=count($uplines);
	}while($uplines_count!=0);
	 return $sum;
}

function my_downline($who){
	$connect=Database();
	if(!empty($who)){
		$me_login=$_SESSION['me_login'];
		$uplines=array($me_login);
		$who_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id FROM members WHERE member_username='$who' "));
		$who=$who_result['member_id'];
		$my_downline=0;
		$uplines_count=0;
		do{
			$friend_sql="SELECT * FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE";
			$friend_sql.=" upline=".$uplines[0];
			for($i=1;$i<=$uplines_count-1;$i++){
				$friend_sql.=" OR upline=".$uplines[$i];
			}
			$uplines=array();
			$friend_query=mysqli_query($connect,$friend_sql);
			while($friend=mysqli_fetch_array($friend_query)){
				if($friend['member_id']==$who){
					$my_downline=1;
				}
				array_push($uplines,$friend['member_id']);
			}
			$uplines_count=count($uplines);
		}while($uplines_count!=0 AND $my_downline!=1);
		return $my_downline+0;
	}else{
		return 0;
	}
}
function friends_number($who,$level_max){
	$connect=Database();
	$level=1;
	$sponsors=array($who);
	$friends_number=0;
	$sponsors_count=0;
	do{
		$friend_sql="SELECT member_id,package_id FROM members WHERE "; 
		$friend_sql.=" sponsor=".$sponsors[0];
		for($i=1;$i<=$sponsors_count-1;$i++){
			$friend_sql.=" OR sponsor=".$sponsors[$i];
		}
		$sponsors=array();
		$friend_query=mysqli_query($connect,$friend_sql);
		while($friend=mysqli_fetch_array($friend_query)){
			array_push($sponsors,$friend['member_id']);
			//if($friend['package_id']>=1){
			$friends_number=$friends_number+1;
			//}
		}
		$level++;
		$sponsors_count=count($sponsors);
		
		if($level_max=="all"){
			$level_limit=$level+1;
		}else{
			$level_limit=$level_max;
		}
	}while($sponsors_count!=0 AND $level<=$level_limit);
	return $friends_number;
}
function bonus_rolldown($who_cycle,$level_max,$rolldown_bonus){
	$level=1;
	$sponsors=array($who_cycle);
	$friends_number=0;  $get_rolldown=0;
	do{
		$friend_sql="SELECT * FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE ";
		$friend_sql.=" sponsor=".$sponsors[0];
		for($i=1;$i<=$sponsors_count-1;$i++){
			$friend_sql.=" OR sponsor=".$sponsors[$i];
		}		
		$sponsors=array();
		$friend_query=mysql_query($friend_sql);
		while($friend=mysql_fetch_array($friend_query)){   
			array_push($sponsors,$friend['member_id']);
			if($friend['package_id']>=1){
				$who_rolldown=$friend['member_id']; 
				$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$who_rolldown;"),0);
				$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$who_rolldown;"),0);
				$jWallet_received=($rolldown_bonus*0.97)*0.70;
				$rMoney_received=($rolldown_bonus*0.97)*0.30;
				$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
				$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus 
				$bonus_sd_query=mysql_query("UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who_rolldown");
				if($bonus_sd_query){
					mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who_rolldown,$who_cycle,NOW(),'receive','received_rolldown_bonus',8,$jWallet_received+$rMoney_received,'0','unread') ");
					
					$get_rolldown=$get_rolldown+1;
				}
			}
		}
		$level++;
		$sponsors_count=count($sponsors);
		$friends_number=$friends_number+$sponsors_count;
		if($level_max=="all"){
			$level_limit=$level+1;
		}else{
			$level_limit=$level_max;
		}
	}while($sponsors_count!=0 AND $level<=$level_limit);	
	return $get_rolldown;
}
function bonus_autoship($who,$level_max){
	$level=1;
	$sponsors=array($who);
	$autoship_shared_sum=0;
	do{
		$friend_sql="SELECT member_id,autoship_shared FROM members WHERE ";
		$friend_sql.=" sponsor=".$sponsors[0];
		for($i=1;$i<=$sponsors_count-1;$i++){
			$friend_sql.=" OR sponsor=".$sponsors[$i];
		}		
		$sponsors=array();
		$friend_query=mysql_query($friend_sql);
		while($friend=mysql_fetch_array($friend_query)){
			array_push($sponsors,$friend['member_id']);
			$autoship_shared_sum=$autoship_shared_sum+$friend['autoship_shared'];
		}
		$level++;
		$sponsors_count=count($sponsors);
		if($level_max=="all"){
			$level_limit=$level+1;
		}else{
			$level_limit=$level_max;
		}
	}while($sponsors_count!=0 AND $level-1<=$level_limit);	
	
	$bonus_autoship=$autoship_shared_sum*0.0154;
	
	if($bonus_autoship>0){
		$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$who;"),0);
		$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$who;"),0);
		$jWallet_received=($bonus_autoship*0.97)*0.70;
		$rMoney_received=($bonus_autoship*0.97)*0.30;
		$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
		$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus 
		/*
		$bonus_autoship_query=mysql_query("UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who");
		if($bonus_autoship_query){
			mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who,0,NOW(),'receive','received_autoship_bonus',9,$jWallet_received+$rMoney_received,'0','unread') ");
		}	
		*/
	}

	return $bonus_autoship;
}
function me($setting){ 
	$connect=Database();
	isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
	$query=mysqli_query($connect,"SELECT value FROM members_settings WHERE setting='$setting' AND member_id='$me_login';");
	if(mysqli_num_rows($query)>0){
		$result=mysqli_fetch_assoc($query);
		$value=$result['value'];
	}else{
		$value=null;
	}
	return $value;
}
function country($attribute){
	if($_SESSION['currency_code']!=""){
		$currency_code=$_SESSION['currency_code'];
	}else{
		$currency_code=me('currency_code');
	}
	if($currency_code==""){
		$currency_code="usd";
	}
	$value=mysql_result(mysql_query("SELECT $attribute FROM country WHERE currency_code='$currency_code'"),0);
	return $value;
}
function currency($amount=0,$decimal=0){
	$connect=Database();
	isset($_SESSION['currency_code'])?$currency_code=$_SESSION['currency_code'] : $currency_code=me('currency_code');
	if(empty($currency_code)){
		$currency_code="usd";
	}
	if(empty($decimal)){
		if($currency_code=="usd"){
			$decimal=2;
		}else{
			$decimal=0;
		}
	}
	$query=mysqli_query($connect,"SELECT currency_symbol,currency_rate FROM country WHERE currency_code='$currency_code'");
	$result=mysqli_fetch_assoc($query);
	$symbol=$result['currency_symbol'];
	$value=$result['currency_rate']*$amount;
	return $symbol.number_format($value,$decimal);
}
function wordvar($wordvar){
	$connect=Database();
	isset($_SESSION['language_code'])?$language_code=$_SESSION['language_code'] : $language_code=me('language_code');
	if(empty($language_code)){
		$language_code="en";
	}
	$query=mysqli_query($connect,"SELECT word FROM wordvars WHERE wordvar='$wordvar' AND language_code='$language_code'");
	if(mysqli_num_rows($query)>0){
		$result=mysqli_fetch_assoc($query);
		$word=$result['word'];
		return $word;
	}else{
		return $wordvar;
	}
}
?>