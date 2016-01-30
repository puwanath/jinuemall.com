<?
ini_set('display_errors', 1);
error_reporting(0);
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

function Database(){
	include "database.php";
	return $connect;
}

?>

<link href="http://www.jinuemall.com/genius/bs3/css/bootstrap.min.css" rel="stylesheet">
<link href="http://www.jinuemall.com/genius/css/bootstrap-reset.css" rel="stylesheet">
<link href="http://www.jinuemall.com/genius/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
<link href="http://www.jinuemall.com/genius/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
<link href="http://www.jinuemall.com/genius/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="http://www.jinuemall.com/genius/js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
<link href="http://www.jinuemall.com/genius/css/style.css" rel="stylesheet">
<link href="http://www.jinuemall.com/genius/css/style-responsive.css" rel="stylesheet" />

<table cellpadding="0" cellspacing="0" border="0" class="display table table-striped table-hover" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>Pictured</th>
                        <th>Fullname</th>
                        <th class="hidden-phone">IP</th>
                        <th class="hidden-phone">Country</th>
                        <th class="hidden-phone">Session ID</th>
                        <th class="hidden-phone">Time</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$connect=Database();
					$member_sql=mysqli_query($connect,'SELECT * FROM members_online where 1 order by member_id DESC');
					while($member=mysqli_fetch_array($member_sql)){
					?>
                    <tr>
						<td><img src="<?php echo $site_main;?>/gallery/avatar/<?php echo  selectname('members','member_avatar','member_id',$member['member_id']);?>" width="35" width="35" alt="avatar member" class="img-circle"></td>
                        <td><u><a href="<?php echo $site_url;?>/profile/?id=<?php echo $member['member_id'];?>"><?php echo selectname('members','member_name','member_id',$member['member_id'])." ".selectname('members','member_surname','member_id',$member['member_id']);?></a></u></td>
                        <td  class="hidden-phone"><?php echo $member['ip'];?></td>
                        <td class="hidden-phone"><?php echo $member['country'];?></td>
                        <td class="hidden-phone"><?php echo $member['session'];?></td>
                        <td class="hidden-phone"><?php echo date('d/m/Y  H:i:s',$member['time']);?></td>
					<?php
					}
					?>
                    </tbody>
                    </table>