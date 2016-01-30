<?
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
function SumPV($upline){
	$uplines=array($upline);
	$sum=mysql_result(mysql_query("SELECT package_pv FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE member_id=$upline"),0);
	do{
		$member_sql="SELECT member_id,package_pv FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE ";
		$member_sql.=" upline=".$uplines[0];
		for($i=1;$i<=$uplines_count-1;$i++){
			$member_sql.=" OR upline=".$uplines[$i];
		} 
			
		$uplines=array();
		$member_query=mysql_query($member_sql);
		while($members=mysql_fetch_array($member_query)){
			$sum=$sum+$members['package_pv'];
			array_push($uplines,$members['member_id']);
		}
		$uplines_count=count($uplines);
	}while($uplines_count!=0);
	 return $sum;
}
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


?>  
