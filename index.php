<?php
//session_set_cookie_params(0, '/', '.jinuemall.com');
ob_start();
session_start();
include('system/system/setting-jinuemall.php');
include('system/system/databases.php');
include('system/system/function.php');


isset($_REQUEST['lg']) ? $_SESSION['language_code']=$_REQUEST['lg'] : $_SESSION['language_code']=null;
isset($_REQUEST['cu']) ? $_SESSION['currency_code']=$_REQUEST['cu'] : $_SESSION['currency_code']=null;

/*
	replace array indexes:
	1) fix windows slashes
	2) strip up-tree ../ as possible hack attempts
*/
$URL = str_replace(
	array( '\\', '../' ),
	array( '/',  '' ),
	$_SERVER['REQUEST_URI']
);

if ($offset = strpos($URL,'?')) {
	// strip getData
	$URL = substr($URL,0,$offset);
} else if ($offset = strpos($URL,'#')) {
	/*
		Since hashes are after getData, you only need
		to strip hashes when there is no getData
	*/
	$URL = substr($URL,0,$offset);
}


//check country
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
//$getdetails = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
//echo $getdetails = getcountry($ip);

/*
	the path routes below aren't just handy for stripping out
	the REQUEST_URI and looking to see if this is an attempt at
	direct file access, they're also useful for moving uploads,
	creating absolute URI's if needed, etc, etc
*/
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));

// strip off the URL root from REQUEST_URI
if (URL_ROOT != '/') $URL=substr($URL,strlen(URL_ROOT));

// strip off excess slashes
$URL = trim($URL,'/');

// 404 if trying to call a real file
if (
	file_exists(DOC_ROOT.'/'.$URL) &&
	($_SERVER['SCRIPT_FILENAME'] != DOC_ROOT.$URL) &&
 	($URL != '') &&
 	($URL != 'index.php')
) include("site/404.php");

/*
	If $url is empty of default value, set action to 'default'
	otherwise, explode $URL into an array
*/
$uri = (
	($URL == '') ||
	($URL == 'index.php') ||
	($URL == 'index.html')
) ? array($site_homepage) : explode('/',html_entity_decode($URL));

/*
	I strip out non word characters from $ACTION[0] as the include
	which makes sure no other oddball attempts at directory
	manipulation can be done. This means your include's basename
	can only contain a..z, A..Z, 0..9 and underscore!
	
	for example, as root this would make:
	pages/default.php
*/
/*
isset($uri[0]) ? $sponsor_username=$uri[0] : $sponsor_username=;
if($_SESSION['sponsor']==""){
	$sponsor_query=mysqli_query($connect,"SELECT member_id FROM jinue_system.members member WHERE member_username='$sponsor_username'");
	$sponsor_check=mysqli_num_rows($sponsor_query);
	if($sponsor_check==1){
		$sponsor_result=mysqli_fetch_assoc($sponsor_query);
		$_SESSION['sponsor']=$sponsor_result['member_id'];
	}else{
		$sponsor_username=end($path_info['call_parts']);
		$sponsor_query=mysql_query("SELECT member_username FROM jinue_system.members member WHERE member_username='$sponsor_username'");	
		$sponsor_check=mysql_num_rows($sponsor_query);
		if($sponsor_check==1){
			$_SESSION['sponsor']=mysql_result($sponsor_query,0);
		}else{
			$_SESSION['sponsor']="jtogether";
		}
	}
}elseif($me_login!=""){
	$sponsor=$me_login;
}
*/

isset($_POST['txtkeyword'])?$searkeyword=$_POST['txtkeyword'] : $searkeyword=null;
//login user /check user member login

//echo $username = $_POST['txtUserName'];
//echo $password = $_POST['txtPassword'];

checkUser();
//$errorMessage = "กรุณาเข้าสู่ระบบ เพื่อใช้งาน";

if (isset($_POST['txtUserName'])) {
	$result = doLogin();
	
	isset($_POST['txtUserName'])?$username = $_POST['txtUserName'] : $username=null;
	isset($_POST['txtPassword'])?$password = encode($_POST['txtPassword'],$private_key) : $password=null;

	
	if ($result != '') {
		$errorMessage = $result;
	}
}

//Check Login
isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;

if($me_login!=null){
	$sqlu = "SELECT * FROM members WHERE member_id = '$me_login' ";
	$qu = mysqli_query($connect,$sqlu);
	$resultu = mysqli_fetch_object($qu);
	$me_name  = $resultu->member_username;
	$me_jwallet = $resultu->jWallet;
	$me_rmoney = $resultu->rMoney;
	$me_jpoint = $resultu->jPoint;
	$wallet = $me_jwallet+$me_rmoney;
	
	//-----------------//
	$me_name = $resultu->member_name;
	$me_username = $resultu->member_username;
	$me_surname = $resultu->member_surname;
	$me_address = $resultu->member_address;
	$me_city = $resultu->member_city;
	$me_country = $resultu->member_country;
	$me_zipcode = $resultu->member_zipcode;
	$me_phone = $resultu->member_phone;
}else{
	$me_username=null;
}

//function checkuser and update user online
$session=session_id();
$time=time();
$time_check=$time-600; //ตั้งเวลาไว้ที่ 10 นาที  600 = 10 60=1
//useronline($session,$time,$time_check,$me_login);  //function user online



if($uri[0]=="process" || $uri[0]=="ajax") $includeFile = 'system/system/'.$uri[0].'.php';
else{
	$sponsor=end($uri);
	$sponsor_query=mysqli_query($connect,'SELECT member_username FROM members member WHERE member_username="'.$sponsor.'";');
	$sponsor_check=mysqli_num_rows($sponsor_query);

	$category_query=mysqli_query($connect,'SELECT product_category_id,product_category_name FROM product_category WHERE product_category_name="'.$uri[0].'" ;');
	$category_check=mysqli_num_rows($category_query);
	
	$product_query=mysqli_query($connect,'SELECT * FROM products WHERE product_url="'.$uri[0].'" ;');
	$product_check=mysqli_num_rows($product_query);
	
	if($category_check==1){
		$includeFile='site/category.php';
		$category_result=mysqli_fetch_assoc($category_query);
	}elseif($product_check==1){
		$includeFile='site/product.php';
		$product_result=mysqli_fetch_assoc($product_query);
	}elseif($sponsor_check==1){
		$includeFile='site/index.php';
		$sponsor=mysqli_fetch_assoc($sponsor_query);
	}else{ 
		$includeFile = 'site/'.preg_replace('/[^\w]/','',$uri[0]).'.php';
	}
}

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//seo website




if($uri[0]!=null){
	
	if(empty($product_result['product_name'])){
		$title = "JinueMall (บริษัท จีนู(ประเทศไทย) จำกัด)";
		$description = "Glugold อันดับหนึ่ง
รูขุมขนในร่างกายกระชับขึ้นผิวพรรณเนียนขึ้นใสขึ้น เลือดไหลเวียนดีขึ้นอย่างเห็นได้ชัด คนที่ผมไม่ขึ้นทานได้ 1 กล่องก็จะเห็นผลอย่างได้ชัด ระบบฮอร์โมนดีขึ้น ทานก่อนทานข้าวจะเห็นผลได้ชัดมาก จะทานตอนเช้าและก่อนนอนจะทำให้หลับสบายขึ้นตื่นเช้ามาสดชื่นอย่างเห็นได้ชัด ไม่ว่าคุณจะปวดขาเย็นเท้า เท้าชา glugold สามารถช่วยคุณได้ เเล้วทำให้ผิวของคุณขาวอย่างเห็นได้ชัด ทานเป็นประจำ ทานไปสักพัก รอเวลา 5-10 นาที จะมีอาการคันๆตามตัวผิวจะเป็นสีเเดง ไม่ต้องตกใจเพราะนั้นคือ การที่ glugold เข้าไปทำให้เลือดไหลเวียนดีขึ้น เเล้ว glugold ตัวนี้ เป็น ที่นิยมในเกาหลีมากเป็น glugold อันดับหนึ่ง ในเกาหลีอีกด้วย ไม่ว่าจะเป็นผู้ชายก็สามารทานได้เด็กก็สามารถทานได้...";
		$keyword = "Glugold อันดับหนึ่ง
รูขุมขนในร่างกายกระชับขึ้นผิวพรรณเนียนขึ้นใสขึ้น เลือดไหลเวียนดีขึ้นอย่างเห็นได้ชัด คนที่ผมไม่ขึ้นทานได้ 1 กล่องก็จะเห็นผลอย่างได้ชัด ระบบฮอร์โมนดีขึ้น ทานก่อนทานข้าวจะเห็นผลได้ชัดมาก จะทานตอนเช้าและก่อนนอนจะทำให้หลับสบายขึ้นตื่นเช้ามาสดชื่นอย่างเห็นได้ชัด ไม่ว่าคุณจะปวดขาเย็นเท้า เท้าชา glugold สามารถช่วยคุณได้ เเล้วทำให้ผิวของคุณขาวอย่างเห็นได้ชัด ทานเป็นประจำ ทานไปสักพัก รอเวลา 5-10 นาที จะมีอาการคันๆตามตัวผิวจะเป็นสีเเดง ไม่ต้องตกใจเพราะนั้นคือ การที่ glugold เข้าไปทำให้เลือดไหลเวียนดีขึ้น เเล้ว glugold ตัวนี้ เป็น ที่นิยมในเกาหลีมากเป็น glugold อันดับหนึ่ง ในเกาหลีอีกด้วย ไม่ว่าจะเป็นผู้ชายก็สามารทานได้เด็กก็สามารถทานได้...";
		$urlweb = $actual_link.'/'.$me_username;
		$imageurl = "";
	}else{
		$title = $product_result['product_name'];
		$description = strip_tags($product_result['product_detail']);
		$keyword = strip_tags($product_result['product_description']);
		$urlweb = $actual_link.'/'.$me_username;
		$imgproduct = product_picture($product_result['product_id']);
		$imageurl = $imgproduct;
	}
	
}else{
	$title = "JinueMall (บริษัท จีนู(ประเทศไทย) จำกัด)";
	$description = "Glugold อันดับหนึ่ง
รูขุมขนในร่างกายกระชับขึ้นผิวพรรณเนียนขึ้นใสขึ้น เลือดไหลเวียนดีขึ้นอย่างเห็นได้ชัด คนที่ผมไม่ขึ้นทานได้ 1 กล่องก็จะเห็นผลอย่างได้ชัด ระบบฮอร์โมนดีขึ้น ทานก่อนทานข้าวจะเห็นผลได้ชัดมาก จะทานตอนเช้าและก่อนนอนจะทำให้หลับสบายขึ้นตื่นเช้ามาสดชื่นอย่างเห็นได้ชัด ไม่ว่าคุณจะปวดขาเย็นเท้า เท้าชา glugold สามารถช่วยคุณได้ เเล้วทำให้ผิวของคุณขาวอย่างเห็นได้ชัด ทานเป็นประจำ ทานไปสักพัก รอเวลา 5-10 นาที จะมีอาการคันๆตามตัวผิวจะเป็นสีเเดง ไม่ต้องตกใจเพราะนั้นคือ การที่ glugold เข้าไปทำให้เลือดไหลเวียนดีขึ้น เเล้ว glugold ตัวนี้ เป็น ที่นิยมในเกาหลีมากเป็น glugold อันดับหนึ่ง ในเกาหลีอีกด้วย ไม่ว่าจะเป็นผู้ชายก็สามารทานได้เด็กก็สามารถทานได้...";
	$keyword = "Glugold อันดับหนึ่ง
รูขุมขนในร่างกายกระชับขึ้นผิวพรรณเนียนขึ้นใสขึ้น เลือดไหลเวียนดีขึ้นอย่างเห็นได้ชัด คนที่ผมไม่ขึ้นทานได้ 1 กล่องก็จะเห็นผลอย่างได้ชัด ระบบฮอร์โมนดีขึ้น ทานก่อนทานข้าวจะเห็นผลได้ชัดมาก จะทานตอนเช้าและก่อนนอนจะทำให้หลับสบายขึ้นตื่นเช้ามาสดชื่นอย่างเห็นได้ชัด ไม่ว่าคุณจะปวดขาเย็นเท้า เท้าชา glugold สามารถช่วยคุณได้ เเล้วทำให้ผิวของคุณขาวอย่างเห็นได้ชัด ทานเป็นประจำ ทานไปสักพัก รอเวลา 5-10 นาที จะมีอาการคันๆตามตัวผิวจะเป็นสีเเดง ไม่ต้องตกใจเพราะนั้นคือ การที่ glugold เข้าไปทำให้เลือดไหลเวียนดีขึ้น เเล้ว glugold ตัวนี้ เป็น ที่นิยมในเกาหลีมากเป็น glugold อันดับหนึ่ง ในเกาหลีอีกด้วย ไม่ว่าจะเป็นผู้ชายก็สามารทานได้เด็กก็สามารถทานได้...";
	$urlweb = $actual_link.'/'.$me_username;
	$imageurl = "";
}







if (is_file($includeFile)) include($includeFile);
else include("site/page-404.php");

//echo $getdetails->country; // -> "US"s

mysqli_close($connect);
?>