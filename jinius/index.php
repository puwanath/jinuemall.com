<?
session_start();
include "@system/databases.php";
include "@system/function.php";

$page=$_REQUEST['page'];

$dir="/jinius/@pages";
$url="/jinius";
/*
switch($page) {
  case 'about-us': include 'about.php';
    break;
  case 'users': include 'users.php'; 
    break; 
  case 'news': include 'news.php';
    break;
  case 'products': include 'products.php';
    break;
  default:
    include '@pages/home.php'; 
}
*/
$me_login=$_SESSION['me_login'];
if($me_login!=""){
	$me_query=mysql_query("SELECT * FROM members WHERE member_id='$me_login';");
	$me=mysql_fetch_array($me_query);
	$me_login=$me['member_id'];
}


$administrator_arr=array(1,3,4,16,25,77,99,423,501);
if(!in_array("$me_login",$administrator_arr)){
	header('LOCATION: ../system/');
}elseif($page==""){
	include '@pages/dashboard.php';
}elseif($page=="members"){
	include '@pages/members.php';
}elseif($page=="docs"){
	include '@pages/docs.php';
}elseif($page=="products"){
	include '@pages/products.php';
}elseif($page=="orders"){
	include '@pages/orders.php';
}elseif($page=="withdraw"){
	include '@pages/withdraw.php';
}elseif($page=="signup2"){
	include '@pages/signup2.php';
}elseif($page=="package"){
	include '@pages/package.php';
}elseif($page=="bonus"){
	include '@pages/bonus.php';
}elseif($page=="wallet"){
	include '@pages/e-wallet.php';
}elseif($page=="shopping"){
	include '@pages/shopping.php';
}elseif($page=="invoices"){
	include '@pages/invoices.php';
}elseif($page=="invoice"){
	include '@pages/invoice.php';
}elseif($page=="event"){
	include '@pages/calendar.php';
}elseif($page=="faq"){
	include '@pages/faq.php';
}elseif($page=="setting"){
	include '@pages/setting.php';
}
?>