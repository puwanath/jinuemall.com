<?
ini_set('display_errors', 1);
//error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);


$connectdb_host="localhost";
$connectdb_username="jinue";
$connectdb_password="ratchada7@morn";
$connectdb_database="jinue_system";

$connect = mysqli_connect("$connectdb_host","$connectdb_username","$connectdb_password","$connectdb_database");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($connect,"utf8");

//mysqli_connect($connectdb_host,$connectdb_username,$connectdb_password) or die ("connect mysql error");
//mysqli_select_db($connectdb_database) or die ("connect database error");
//mysqli_query("set NAMES UTF8");

date_default_timezone_set("Asia/Bangkok");

?>