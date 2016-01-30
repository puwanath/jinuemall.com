<?php
$page_allow=array("login","lock_screen","process");  //define page allow and set default page
isset($admin['admin_permission'])?$permission=$admin['admin_permission']:$permission=null;

if($permission=="superadmin"){
	array_push($page_allow,"index","dashboard","pos","products","product","product-categories","withdraw","members","report","profile","administrator","invoice_print","orders","memberonline");
}elseif($permission=="president"){
	array_push($page_allow,"index","dashboard","pos","products","product","product-categories","withdraw","members","report","profile","administrator","invoice_print","orders");
}elseif($permission=="stocker"){
	array_push($page_allow,"index","dashboard","products","product","product-categories");
}elseif($permission=="financing"){
	array_push($page_allow,"index","dashboard","withdraw","members","report");
}elseif($permission=="cashier"){
	array_push($page_allow,"index","dashboard","pos","invoices","profile","orders");
}elseif($permission=="ceo"){
	array_push($page_allow,"index","products","members","withdraw","report","profile","orders");
}

if(!in_array($page,$page_allow)){
	$includeFile="site/login.php";
}
?>