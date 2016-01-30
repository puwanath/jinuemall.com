<?php

session_set_cookie_params(0, '/', '.jinuemall.com');
session_start();
include('system/setting.php');
include('system/databases.php');
include('system/function.php');
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
	//Since hashes are after getData, you only need to strip hashes when there is no getData
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

//Check Login
isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
if(isset($me_login)){
	$me_query=mysqli_query($connect,"SELECT * FROM members WHERE member_id='$me_login';") or die (mysqli_error());
	if($me_query){
		$me=mysqli_fetch_array($me_query);
		$me_login=$me['member_id'];
		$me_currency=me('currency');
	}
	if($uri[0]=="process" || $uri[0]=="ajax"){
		$includeFile = 'system/'.$uri[0].'.php';
	}else{
		$includeFile = 'site/'.preg_replace('/[^\w]/','',$uri[0]).'.php';
	}
}else{
	$includeFile="site/login.php";
}


//function checkuser and update user online
$session=session_id();
$time=time();
$time_check=$time-600; //ตั้งเวลาไว้ที่ 10 นาที  600 = 10 60=1
//useronline($session,$time,$time_check,$me_login);  //function user online


if (is_file($includeFile)) {
	include($includeFile);
}else{
	include("site/404.php");
}

mysqli_close($connect);
?>