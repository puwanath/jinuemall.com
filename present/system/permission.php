<?php
$page_allow=array("login","lock_screen");  //define page allow and set default page
isset($admin['admin_permission'])?$permission=$admin['admin_permission']:$permission='';

if($permission=="superadmin"){
	$page_allow=array("index","dashboard","pos","products","product","product-categories","withdraw","members","report","profile","administrator","invoice_print");
}elseif($permission=="stocker"){
	$page_allow=array("index","dashboard","products","product","product-categories");
}elseif($permission=="financing"){
	$page_allow=array("index","dashboard","withdraw","members","report");
}elseif($permission=="cashier"){
	$page_allow=array("index","dashboard","pos","invoices","profile");
}elseif($permission=="ceo"){
	$page_allow=array("index","products","members","withdraw","report","profile");
}


if(!in_array($page,$page_allow)){
	$page="login";
}
?>