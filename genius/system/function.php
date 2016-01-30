<?php
function Database(){
	include "database.php";
	return $connect;
}
function select_data($table,$field,$where=1){
	$connect=Database();
	$data_query=mysqli_query($connect,"SELECT $field FROM $table WHERE $where ;");
	if($data_query) $data=mysqli_fetch_row($data_query);
	if(isset($data[0])) return $data[0]; else return null;
}
function selectname($tb,$fillname,$whereid,$id)
{
	$connect=Database();	
	if($id!=null){
		$sql = mysqli_query($connect,"select $fillname from $tb where $whereid = '$id' ");
		$re = mysqli_fetch_object($sql);
		
		return $re->$fillname;
	}	
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
function image_resize(array $file, $width, $height ,$path){
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
function product_category($array){
	$connect=Database();
	$product_category=$product['product_category_id'];
	$product_category=str_replace("[","",$product_category);
	$product_category=str_replace("]","",$product_category);
	$product_category=explode(',',$product_category);
	return print_r($product_category);
}

function product_picture($product_id,$size="thumb"){
	$connect=Database();
	include('setting.php');
	$picture=mysqli_fetch_array(mysqli_query($connect,"SELECT picture_id,picture_type FROM product_pictures WHERE product_id='$product_id' AND picture_index='#';"));
	$picture_id=$picture['picture_id'];
	$picture_type=$picture['picture_type'];
	if($size="thumb") $picture_url=$site_url."/gallery/products/thumb/".$picture_id.".".$picture_type;
	else  $picture_url=$site_url."/gallery/products/".$picture_id.".".$picture_type;
	return $picture_url;
}	
function product_picture_thumb($product_id){
	$connect=Database();
	include('setting.php');
	$picture=mysqli_fetch_array(mysqli_query($connect,"SELECT picture_id,picture_type FROM product_pictures WHERE product_id='$product_id' AND picture_index='#';"));
	$picture_id=$picture['picture_id'];
	$picture_type=$picture['picture_type'];
	$picture_url=$site_url."/gallery/products/thumb/".$picture_id.".".$picture_type;
	return $picture_url;
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


//function method_payment   create by pu 18/01/59
function typepayment($type){
	
	if($type=="jWallet_rMoney"){
		$cssspan ="<span class='label label-primary'>Wallet</span>";
	}elseif($type=="jWallet"){
		$cssspan ="<span class='label label-success'>J-Wallet</span>";
	}elseif($type=="rMoney"){
		$cssspan ="<span class='label label-warning'>R-Money</span>";
	}elseif($type=="jPoint"){
		$cssspan ="<span class='label label-default'>J-Point</span>";
	}elseif($type=="bank"){
		$cssspan ="<span class='label label-info'>Bank</span>";
	}
	
	return $cssspan;
}






?>  