<?php
function Database(){
	include("databases.php");
	return $connect;
}
function select_data($table,$field,$where=1){
	$connect=Database();
	$data_query=mysqli_query($connect,"SELECT $field FROM $table WHERE $where ;");
	if($data_query) $data=mysqli_fetch_row($data_query);
	if(isset($data[0])) return $data[0]; else return null;
}

function encode($string,$key) {
	$j=null;
	$hash=null;
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
	$j=null;
	$hash=null;
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
}function image_resize(array $file, $width, $height ,$path){
	/* Get original image x y*/
	list($w, $h) = getimagesize($file['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	//$path = '../gallery/products/thumb/'.$_FILES['image']['name'];
	/* read binary data from image file */
	$imgString = file_get_contents($file['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagealphablending($tmp, false);
	$transparency = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
	imagefill($tmp, 0, 0, $transparency);
	imagesavealpha($tmp, true);
	imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
	/* Save image */
	switch ($file['type']) {
	case 'image/jpeg':
		imagejpeg($tmp, $path, 100);
		break;
	case 'image/png':
		imagepng($tmp, $path, 0);
		break;
	case 'image/gif':
		imagegif($tmp, $path);
		break;
    default:
		exit;
		break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function product_picture($product_id,$size=null){
	$connect=Database();
	include('setting-jinuemall.php');
	$picture=mysqli_fetch_array(mysqli_query($connect,"SELECT picture_id,picture_type FROM product_pictures WHERE product_id='$product_id' AND picture_index='#';"));
	$picture_id=$picture['picture_id'];
	$picture_type=$picture['picture_type'];
	if($size=="thumb"){
		$picture_url=$site_url.'/gallery/products/thumb/'.$picture_id.'.'.$picture_type;
	}else{  
		$picture_url=$site_url.'/gallery/products/'.$picture_id.'.'.$picture_type;
	}
	return $picture_url;
}	
function product_picture_thumb($product_id){
	$connect=Database();
	include('setting-jinuemall.php');
	$picture=mysqli_fetch_array(mysqli_query($connect,"SELECT picture_id,picture_type FROM product_pictures WHERE product_id='$product_id' AND picture_index='#';"));
	$picture_id=$picture['picture_id'];
	$picture_type=$picture['picture_type'];
	$picture_url=$site_url."/gallery/products/thumb/".$picture_id.".".$picture_type;
	if($size=="thumb"){
		$picture_url=$site_url.'/gallery/products/thumb/'.$picture_id.'.'.$picture_type;
	}else{  
		$picture_url=$site_url.'/gallery/products/'.$picture_id.'.'.$picture_type;
	}
	return $picture_url;
}	
function SumPV($upline){
	$connect=Database();
	$uplines=array($upline);
	$uplines_count=0;
	if(isset($upline)){
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

function me($setting){ 
	$connect=Database();
	isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
	if(!empty($me_login)){
		$query=mysqli_query($connect,"SELECT value FROM members_settings WHERE setting='$setting' AND member_id='$me_login';");
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
	if(empty($language_code)) $language_code="en";
	
	$query=mysqli_query($connect,"SELECT word FROM wordvars WHERE wordvar='$wordvar' AND language_code='$language_code'");
	if(mysqli_num_rows($query)>0){
		$result=mysqli_fetch_assoc($query);
		$word=$result['word'];
		return $word;
	}else{
		return $wordvar;
	}
}


function pay($payment_method=null,$total_price=0){
	$connect=Database();
	isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
	$member=mysqli_fetch_assoc(mysqli_query($connect,"SELECT jWallet,rMoney,jPoint FROM members WHERE member_id=$me_login ;"));
	$member_jWallet=$member['jWallet'];
	$member_rMoney=$member['rMoney'];
	$member_jPoint=$member['jPoint'];
	
	if($payment_method=="jWallet"){
		if($member_jWallet>=$total_price){
			$member_jWallet_update=$member_jWallet-$total_price;
			$buy_product_query=mysqli_query($connect,"UPDATE members SET jWallet='$member_jWallet_update' WHERE member_id=$me_login; ");
			if($buy_product_query){
				mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,'',NOW(),'pay','purchase_product_by_jwallet','','0','$total_price','unread') ");
			}
		}else{
			header("Location:$site_url");
		}
	}elseif($payment_method=="rMoney"){				
		if($member_rMoney>=$total_price){
			$member_rMoney_update=$member_rMoney-$total_price;
			$buy_product_query=mysqli_query($connect,"UPDATE members SET rMoney='$member_rMoney_update' WHERE member_id=$me_login; ");
			if($buy_product_query){
				mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,'',NOW(),'pay','purchase_product_by_rmoney','','0','$total_price','unread') ");
			}
		}else{
			header("Location:$site_url");
		}
	}elseif($payment_method=="jWallet_rMoney"){
		if($member_rMoney>=$total_price){
			$member_rMoney_update=$member_rMoney-$total_price;
			$buy_product_query=mysqli_query($connect,"UPDATE members SET rMoney='$member_rMoney_update' WHERE member_id=$me_login; ");			
		}elseif(($member_jWallet+$member_rMoney)>=$total_price){
			echo "update ".$member_jWallet_update=$member_jWallet-($total_price-$member_rMoney);
			$member_rMoney_update=0;
			$buy_product_query=mysqli_query($connect,"UPDATE members SET jWallet='$member_jWallet_update',rMoney='$member_rMoney_update' WHERE member_id=$me_login; ");	
		}else{
			header("Location:$site_url/cart");
		}
		if($buy_product_query){
			mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,'',NOW(),'pay','purchase_product_by_jwallet_and_rmoney','','0','$total_price','unread') ");
		}
	}elseif($payment_method=="jPoint"){
		if($member_jPoint>=$total_price){
			$member_jPoint_update=$member_jPoint-$total_price;
			$buy_product_query=mysqli_query($connect,"UPDATE members SET jPoint='$member_jPoint_update' WHERE member_id=$me_login; ");
			if($buy_product_query){
				mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,'',NOW(),'pay','purchase_product_by_jpoint','','0','$total_price','unread') ");
			}
		}else{
			header("Location:$site_url");
		}
	}else{
		header("Location:$site_url");
	}
}

function upgrade_package($member_id=null,$total_pv=0){
	$connect=Database();
	isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
	$member=mysqli_fetch_assoc(mysqli_query($connect,"SELECT jWallet,rMoney,jPoint,member_pv,package_id FROM members WHERE member_id=$me_login ;"));
	$member_pv=$member['member_pv']+0;
	$package_id=$member['package_id'];
	
	$me_package=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM packages WHERE package_id=$package_id"));
			
	if($me_package['package_pv']+$member_pv+$total_pv>=12000){
		$upgrade_package_id=7;
	}elseif($me_package['package_pv']+$member_pv+$total_pv>=6000){
		$upgrade_package_id=6;
	}elseif($me_package['package_pv']+$member_pv+$total_pv>=2000){
		$upgrade_package_id=5;
	}elseif($me_package['package_pv']+$member_pv+$total_pv>=1000){
		$upgrade_package_id=4;
	}elseif($me_package['package_pv']+$member_pv+$total_pv>=500){
		$upgrade_package_id=3;
	}elseif($me_package['package_pv']+$member_pv+$total_pv>=250){
		$upgrade_package_id=2;
	}elseif($me_package['package_pv']+$member_pv+$total_pv>=80){
		$upgrade_package_id=1;
	}else{
		$upgrade_package_id=0;
	}
	
	$upgrade_package=mysqli_fetch_array(mysqli_query($connect,"SELECT package_id,package_name,package_pv FROM packages WHERE package_id=$upgrade_package_id"));		
	if($upgrade_package['package_id']>$me_package['package_id']){
		$upgrade_package_query=mysqli_query($connect,"UPDATE members SET package_id='$upgrade_package_id' WHERE member_id=$member_id; ");	
		if($upgrade_package_query){
			mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($member_id,'',NOW(),'upgrade','upgrade_package',0,'0','0','unread') ");
			echo "upgrade_package<br>";
		}
		$update_pv=($me_package['package_pv']+$member_pv+$total_pv)-$upgrade_package['package_pv'];
	}else{				
		$update_pv=$member_pv+$total_pv;
	}		
	mysqli_query($connect,"UPDATE members SET member_pv='$update_pv' WHERE member_id=$member_id; ");
	return $upgrade_package_id;
}
			
function bonus_direct($member_id=0,$bonus_direct=0){
	$connect=Database();
	$sponsor=mysqli_fetch_assoc(mysqli_query($connect,"SELECT sponsor FROM members WHERE member_id=$member_id;"));
	$sponsor=$sponsor['sponsor'];
	$sponsor_result=mysqli_fetch_array(mysqli_query($connect,"SELECT jWallet,rMoney FROM members WHERE member_id=$sponsor;"));
	$jWallet=$sponsor_result['jWallet'];
	$rMoney=$sponsor_result['rMoney'];
		
	$jWallet_received=($bonus_direct*0.97)*0.70;
	$rMoney_received=($bonus_direct*0.97)*0.30;
	$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
	$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
	if($bonus_direct>0){
		$bonus_direct_query=mysqli_query($connect,"UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$sponsor");
		if($bonus_direct_query AND $jWallet_received>0 AND $rMoney_received>0){
			mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($sponsor,$member_id,NOW(),'receive','received_direct_bonus',1,$jWallet_received+$rMoney_received,'0','unread') ");
			echo "bonus_direct<br>";
		}
	}
	
}

function bonus_ss($member_id=null,$total_pv=0){
	$connect=Database();
	$sponsor=mysqli_fetch_assoc(mysqli_query($connect,"SELECT sponsor FROM members WHERE member_id=$member_id;"));
	$sponsor=$sponsor['sponsor'];
	$find_ss_next=$sponsor;
	do{
		$find_ss=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,package_id,package_special,sponsor FROM members WHERE member_id=$find_ss_next"));
		$package_special=$find_ss['package_special'];
		if($find_ss['package_id']<2){
			$package_special="";
		}
		$who_ss=$find_ss['member_id'];
		$find_ss_next=$find_ss['sponsor'];
	}while($package_special!="ss" AND $who_ss!=0);
	
	if($package_special=="ss" AND $who_ss!=0){
		$bonus_ss=$total_pv*0.05; //ss bonus get 5% of package price
				
		$who_ss_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT jWallet,rMoney FROM members WHERE member_id=$who_ss;"));
		$jWallet=$who_ss_result['jWallet'];
		$rMoney=$who_ss_result['rMoney'];
				
		$jWallet_received=($bonus_ss*0.97)*0.70;
		$rMoney_received=($bonus_ss*0.97)*0.30;
				
		$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
		$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
		if($bonus_ss>0){
			$bonus_ss_query=mysqli_query($connect,"UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who_ss");
				
			if($bonus_ss_query){					
				mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who_ss,$member_id,NOW(),'receive','received_ss_bonus',2,$jWallet_received+$rMoney_received,'0','unread') ");
				echo "bonus_ss<br>";
			}
		}
	}	
}

function upgrade_to_ss($member_id,$upgrade_package_id){
	$connect=Database();
	$sponsor_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT sponsor FROM members WHERE member_id=$member_id;"));
	$sponsor=$sponsor_result['sponsor'];
	$sponsor=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id,package_id,package_special FROM members WHERE member_id=$sponsor;"));
	$sponsor_package=$sponsor['package_special'];
	$sponsor=$sponsor['member_id'];
	if(($upgrade_package_id>=2 AND $upgrade_package_id<=7) AND $sponsor_package!="ss"){
		$check_ss=mysqli_num_rows(mysqli_query($connect,"SELECT member_id FROM members WHERE sponsor=$sponsor AND (package_id>=2 AND package_id<=7)"));
		if($check_ss==4){
			$upgrade_ss=mysqli_query($connect,"UPDATE members SET package_special='ss' WHERE member_id=$sponsor");
			if($upgrade_ss){
				mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($sponsor,$member_id,NOW(),'upgrade','upgrade_to_ss',3,'0','0','unread') ");
				echo "upgrade_to_ss<br>";
			}
		}
	}
}

function  bonus_sd_sdmatching($member_id=null,$total_pv=0){
	$connect=Database();
	$sponsor=mysqli_fetch_assoc(mysqli_query($connect,"SELECT sponsor FROM members WHERE member_id=$member_id;"));
	$sponsor=$sponsor['sponsor'];
	//Super Director
			
	$find_sd_next=$sponsor;
	do{
		$find_sd=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,package_id,sponsor FROM members WHERE member_id=$find_sd_next"));
		$who_sd=$find_sd['member_id'];
		$who_sd_package=$find_sd['package_id'];
		$find_sd_next=$find_sd['sponsor'];
	}while($who_sd_package<6 AND $who_sd!=0);
		
	if($who_sd!=0){
		if($who_sd_package>=6){
			$bonus_sd=$total_pv*0.05; //SD bonus get 5% of package pv
			if($bonus_sd>0 and $bonus_sd!=""){
				$who_sd_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT jWallet,rMoney FROM members WHERE member_id=$who_sd;"));
				$jWallet=$who_sd_result['jWallet'];
				$rMoney=$who_sd_result['rMoney'];
				$jWallet_received=($bonus_sd*0.97)*0.70;
				$rMoney_received=($bonus_sd*0.97)*0.30;
				$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
				$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
							
				$bonus_sd_query=mysqli_query($connect,"UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who_sd");
				if($bonus_sd_query){
					mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who_sd,$member_id,NOW(),'receive','received_sd_bonus',4,$jWallet_received+$rMoney_received,'0','unread') ");
					echo "bonus_sd<br>";
				}
				$bonus_sd=($jWallet_received+$rMoney_received)*0.10; //SD bonus get 10% of 50% of 10% of package_pv
			}
		}
		
		$find_sd_next=$sponsor;
		$level=1;
		
		do{
			//echo "SELECT member_id,package_id,sponsor FROM members WHERE member_id=$find_sd_next AND (package_id=6 OR package_id=7)";
			$find_sd=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,package_id,sponsor FROM members WHERE member_id=$find_sd_next AND (package_id=6 OR package_id=7)"));
			$who_sd=$find_sd['member_id'];
			$package_id=$find_sd['package_id'];
			$find_sd_next=$find_sd['sponsor'];
	
			
			if($sponsor!=$who_sd AND $find_sd['member_id']!=""){
				
				$who_sd_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT jWallet,rMoney FROM members WHERE member_id=".$find_sd['member_id'].";"));
				$jWallet=$who_sd_result['jWallet'];
				$rMoney=$who_sd_result['rMoney'];
				
				$jWallet_received=($bonus_sd*0.97)*0.70;
				$rMoney_received=($bonus_sd*0.97)*0.30;
				$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
				$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
				
				$bonus_sd_query=mysqli_query($connect,"UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who_sd");
				if($bonus_sd_query){
					mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who_sd,$member_id,NOW(),'receive','received_matching_sd_bonus',5,$jWallet_received+$rMoney_received,'0','unread') ");
					echo "bunus_sd_matching<br>";
				}
				$level++;
			}
		}while($find_sd_next!=0 AND $level<=10);	
	}

}


function bonus_cycle($member_id){
	$connect=Database();
	$upline=mysqli_fetch_assoc(mysqli_query($connect,"SELECT upline FROM members WHERE member_id=$member_id;"));
	$upline=$upline['upline'];
	
	$find_cycle_next=$upline;	
	do{
		$find_cycle=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,upline FROM members WHERE member_id=$find_cycle_next"));
		$member_cycle=$find_cycle['member_id'];
		$find_cycle_next=$find_cycle['upline'];
				
		$left_downline=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id FROM members WHERE upline=$member_cycle AND placement='L';"));
		$left_downline=$left_downline['member_id'];
		
		$left_calculated=mysqli_fetch_assoc(mysqli_query($connect,"SELECT calculated_left FROM members WHERE member_id=$member_cycle;"));
		$left_calculated=$left_calculated['calculated_left'];
		
		$right_downline=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id FROM members WHERE upline=$member_cycle AND placement='R';"));
		$right_downline=$right_downline['member_id'];
		
		$right_calculated=mysqli_fetch_assoc(mysqli_query($connect,"SELECT calculated_right FROM members WHERE member_id=$member_cycle;"));
		$right_calculated=$right_calculated['calculated_right'];
		
		$left_pv=SumPV($left_downline)-$left_calculated;
		$right_pv=SumPV($right_downline)-$right_calculated;
		if($left_pv<=$right_pv){
			$calculate_pv=$left_pv;
		}elseif($right_pv<$left_pv){
			$calculate_pv=$right_pv;
		}
		
		if($calculate_pv>0){
			$calculated_left=$calculate_pv+$left_calculated;
			$calculated_right=$calculate_pv+$right_calculated;
			$calculated_pv_query=mysqli_query($connect,"UPDATE members SET calculated_left=$calculated_left,calculated_right=$calculated_right WHERE member_id=$member_cycle");
					
			if($calculated_pv_query){
				$member_cycle=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id,jWallet,rMoney,package_id FROM members WHERE member_id=$member_cycle;"));
				$jWallet=$member_cycle['jWallet'];
				$rMoney=$member_cycle['rMoney'];
						
				$member_cycle_package=$member_cycle['package_id'];
				$cycle_today_amount=mysqli_fetch_assoc(mysqli_query($connect,"
						SELECT SUM(income) AS sum_income  
						FROM transactions
						WHERE DATE(  `transaction_date` ) = DATE( CURDATE( ) ) 
						AND bonus_id =6
						AND member_id=".$member_cycle['member_id'].
						";"));
				$cycle_today_amount=$cycle_today_amount['sum_income'];
				
				$bonus_cycle=$calculate_pv*0.10;
						
				if($member_cycle_package==1){
					$cycle_max=50;
				}elseif($member_cycle_package==2){
					$cycle_max=100;
				}elseif($member_cycle_package==3){
					$cycle_max=200;
				}elseif($member_cycle_package==4){
					$cycle_max=400;
				}elseif($member_cycle_package==5){
					$cycle_max=1000;
				}elseif($member_cycle_package==6){
					$cycle_max=2000;
				}elseif($member_cycle_package==7){
					$cycle_max=3000;
				}
						
				if($cycle_max>$cycle_today_amount){
					$cycle_remaining=$cycle_max-$cycle_today_amount;
					$cycle_text="received_cycle_bonus";
					if($bonus_cycle>=$cycle_remaining){
						$bonus_cycle=$cycle_remaining;
						$cycle_text="received_cycle_bonus_max";
					}
				}
						
				$jWallet_received=($bonus_cycle*0.97)*0.70;
				$rMoney_received=($bonus_cycle*0.97)*0.30;
				$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
				$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus

				$bonus_cycle_query=mysqli_query($connect,"UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=".$member_cycle['member_id'].";");
				if($bonus_cycle_query){
					mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES(".$member_cycle['member_id'].",$member_id,NOW(),'receive','$cycle_text',6,$jWallet_received+$rMoney_received,'0','unread') ");
					echo "bonus_cycle<br>";
				}		
			}
					
					
					
			//$bonus_mc=$bonus_cycle*0.05; //MC bonus get 5% of cycle bonus
			$bonus_mc=($calculate_pv*0.10)*0.05; //MC bonus get 5% of PV (edited:12/13/2015)
			$jWallet_received=($bonus_mc*0.97)*0.70;
			$rMoney_received=($bonus_mc*0.97)*0.30;
									
			$mc_sponsor_next=mysqli_fetch_assoc(mysqli_query($connect,"SELECT sponsor FROM members WHERE member_id=".$member_cycle['member_id'].";"));
			$mc_sponsor_next=$mc_sponsor_next['sponsor'];
			
			if(isset($mc_sponsor_next) AND $mc_sponsor_next!=0){
				$level=2;
				do{
					$find_mc=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id,package_id,sponsor FROM members WHERE member_id=$mc_sponsor_next"));
						
					$who_mc=$find_mc['member_id'];
					$mc_sponsor_next=$find_mc['sponsor'];
																		
					$who_mc_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id,jWallet,rMoney FROM members WHERE member_id=".$find_mc['member_id'].";"));
					$jWallet=$who_mc_result['jWallet'];
					$rMoney=$who_mc_result['rMoney'];
							
					$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
					$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
																
					$bonus_mc_sql="UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=".$who_mc_result['member_id'].";";
							
					$get_matching_cyle='no';
					if($level==2 AND $find_mc['package_id']>=2){					
						$get_matching_cyle='yes';
					}elseif($level==3 AND $find_mc['package_id']>=2){					
						$get_matching_cyle='yes';
					}elseif($level==4 AND $find_mc['package_id']>=3){					
						$get_matching_cyle='yes';
					}elseif($level==5 AND $find_mc['package_id']>=4){					
						$get_matching_cyle='yes';
					}elseif($level==6 AND $find_mc['package_id']>=5){					
						$get_matching_cyle='yes';
					}elseif($level==7 AND $find_mc['package_id']>=6){					
						$get_matching_cyle='yes';
					}elseif($level==8 AND $find_mc['package_id']==7){					
						$get_matching_cyle='yes';
					}elseif($level==9 AND $find_mc['package_id']==7){					
						$get_matching_cyle='yes';
					}elseif($level==10 AND $find_mc['package_id']==7){					
						$get_matching_cyle='yes';
					}else{

					}
							
			
					if($get_matching_cyle=='yes' AND $find_mc['package_id']>=2){	
						$bonus_mc_query=mysqli_query($connect,$bonus_mc_sql);
						if($bonus_mc_query){
							mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES(".$who_mc_result['member_id'].",".$member_cycle['member_id'].",NOW(),'receive','received_matching_cycle_bonus',7,$jWallet_received+$rMoney_received,'0','unread') ");
							echo "bonus_matching_cycle<br>";
						}
					}
							
				$level++;
				}while($level<=10 AND $mc_sponsor_next!=0);	
			}
		}

	}while($find_cycle_next!=0);
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






//check user login  insert date modify 8/1/16
//check user member
function checkUser()
{
	// if the session id is not set, redirect to login page
	//if (!isset($_SESSION['me_login'])) {
		//header('Location: ' . WEB_ROOT . '../../login');
		//exit;
	//}
	
	// the user want to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
	
}


//check user login check member from database  success 
function doLogin()
{
	$connect=Database();
	include("setting-jinuemall.php");
	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	//$userName = $_POST['txtUserName'];
	//$password = $_POST['txtPassword'];
    isset($_REQUEST['txtUserName'])?$username = $_REQUEST['txtUserName'] : $username=null;
	isset($_REQUEST['txtPassword'])?$password = encode($_REQUEST['txtPassword'],$private_key) : $password=null;
	isset($_REQUEST['remember'])?$remember = $_REQUEST['remember'] : $remember=null;
	
    //$mdpass = encode($password,$private_key);
	
	// first, make sure the username & password are not empty
	if ($username == '') {
		$errorMessage = 'Please To Check Username';
	} else if ($password == '') {
		$errorMessage = 'Please To Check Password';
	} else {
		// check the database and see if the username and password combo do match
		
		$sql = "SELECT member_id,member_username 
				FROM members
				WHERE member_username = '$username' AND member_password = '$password'  ";
		$query = mysqli_query($connect,$sql);
		$numrow = mysqli_num_rows($query);
		if($numrow == 1){
			$row = mysqli_fetch_object($query);
			$_SESSION['me_login'] = $row->member_id;
			
			// log the time when the user last login
			$sqlupdate = mysqli_query("UPDATE member
			        SET last_login = NOW() 
					WHERE member_id = '{$row->member_id}'");
			
			if ($remember==true){
				setcookie('login_username',$username,time()+60);
				setcookie('login_password',$password,time()+60);
			}else{
				setcookie('login_username',$username);
				setcookie('login_password',$password);
			}	
			// now that the user is verified we move on to the next page
            // if the user had been in the admin pages before we move to
			// the last page visited
			if (isset($_SESSION['login_return_url'])) {
				header('Location: ' . $_SESSION['login_return_url']);
				exit;
			} else {
				//print $_SESSION['member_id'];
				header("Location: $site_url");
				exit;
			}
		}else{
			$errorMessage = 'Wrong Username and Password';
		}		
			
	}
	return $errorMessage;
	
}

/*
	Logout a user
*/
function doLogout()
{
	include("setting-jinuemall.php");
	if (isset($_SESSION['me_login'])) {
		unset($_SESSION['me_login']);
		session_unset('me_login');
	}
		
	header("Location: $site_url");
	exit;
}

//end set function checkuser

function selectname($tb,$fillname,$whereid,$id)
{
	$connect=Database();
	
	if($id!=null){
		$sql = mysqli_query($connect,"select $fillname from $tb where $whereid = '$id' ");
		$re = mysqli_fetch_object($sql);
		
		return $re->$fillname;
	}
	
}

//cal weight

function shipping_cost($country_id,$weight){
	$connect=Database();
	
	$shipping_cost=mysqli_query($connect,"SELECT * FROM shipping_rate WHERE country_id='$country_id' AND weight_start<='$weight' AND weight_end >='$weight'");
	$re=mysqli_fetch_array($shipping_cost);

			return $price = $re['rate_price']/35;
	
}

//function get country new by pu 18/01/59
function getcountry($ipaddress){
	$connect=Database();
	
	$query = mysqli_query($connect,"select country_code from geoIP where '$ipaddress' between  ip_long_from and ip_long_to limit 0,1");
	$result = mysqli_fetch_object($query);
	
	return $result->country_code;
}

function truncateStr($str, $maxChars, $holder="...."){

    // ตรวจสอบความยาวของประโยค
    if (strlen($str) > $maxChars ){
        return strip_tags(trim(mb_substr($str, 0, $maxChars,'UTF-8'))) . $holder;
    }   else {
        return strip_tags($str);
    }
    
    //by puwanath baibua kapongidea.com
}


//start function user online  by puwanath baibua
function useronline($session,$time,$time_check,$memberid){
$connect=Database();

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$getdetails = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
$countrycode = $getdetails->country;

$sql="SELECT * FROM members_online WHERE session='$session' ";
$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);


if($count==0){

$sql1="INSERT INTO members_online(session,member_id,ip,time,country) VALUES('$session','$memberid','$ip','$time','$countrycode')";
mysqli_query($connect,$sql1);


}else {
"$sql2=UPDATE members_online SET time='$time' WHERE session = '$session'";
$result2=mysqli_query($connect,$sql2);
}


// if over 10 minute, delete session 
$sql4="DELETE FROM  members_online WHERE time<$time_check";
$result4=mysqli_query($connect,$sql4);


//return $sql1;

}


?>