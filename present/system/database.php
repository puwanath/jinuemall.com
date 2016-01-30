<?php
$connectdb_host="localhost";
$connectdb_username="root";
$connectdb_password="";
$connectdb_database="jinue";

mysql_connect($connectdb_host,$connectdb_username,$connectdb_password) or die ("connect mysql error");
mysql_select_db($connectdb_database) or die ("connect database error");
mysql_query("set NAMES UTF8");

date_default_timezone_set("Asia/Bangkok");

?>