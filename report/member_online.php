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
$actual_link = "http://$_SERVER[HTTP_HOST]";
$site_dir=$actual_link."/genius/site";

?>
<!--
<link href="<?php echo $site_dir;?>/bs3/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $site_dir;?>/css/bootstrap-reset.css" rel="stylesheet">
<link href="<?php echo $site_dir;?>/css/font-awesome.css" rel="stylesheet" />
-->

    <!--dynamic table-->
	<!--
<link href="<?php echo $site_dir;?>/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
<link href="<?php echo $site_dir;?>/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.css" />
-->
    <!-- Custom styles for this template -->
	<!--
<link href="<?php echo $site_dir;?>/css/style.css" rel="stylesheet">
<link href="<?php echo $site_dir;?>/css/style-responsive.css" rel="stylesheet" />
-->
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
					$member_sql=mysqli_query($connect,'SELECT * FROM members_online where 1 order by member_id DESC');
					while($member=mysqli_fetch_array($member_sql)){
						
						$sql = mysqli_query($connect,"select * from members where member_id = '".$member['member_id']."' ");
						$re = mysqli_fetch_object($sql);
					?>
                    <tr>
						<td><img src="<?php echo $site_main;?>/gallery/avatar/<?php echo  $re ->member_avatar;?>" width="35" width="35" alt="avatar member" class="img-circle"></td>
                        <td><u><a href="<?php echo $site_url;?>/profile/?id=<?php echo $member['member_id'];?>"><?php echo $re ->member_name." ".$re->member_surname;?></a></u></td>
                        <td  class="hidden-phone"><?php echo $member['ip'];?></td>
                        <td class="hidden-phone"><?php echo $member['country'];?></td>
                        <td class="hidden-phone"><?php echo $member['session'];?></td>
                        <td class="hidden-phone"><?php echo date('d/m/Y  H:i:s',$member['time']);?></td>
					<?php
					}
					?>
                    </tbody>
                    </table>
					
<!--Core js-->
<!--
<script src="<?php echo $site_dir;?>/js/jquery.js"></script>
<script src="<?php echo $site_dir;?>/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $site_dir;?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $site_dir;?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.nicescroll.js"></script>
-->
<!--Easy Pie Chart-->
<!--
<script src="<?php echo $site_dir;?>/js/easypiechart/jquery.easypiechart.js"></script>
-->
<!--Sparkline Chart-->
<!--
<script src="<?php echo $site_dir;?>/js/sparkline/jquery.sparkline.js"></script>
-->
<!--jQuery Flot Chart-->
<!--
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.pie.resize.js"></script>
-->
<!--dynamic table-->
<!--
<script type="text/javascript" language="javascript" src="<?php echo $site_dir;?>/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.js"></script>
-->
<!--common script init for all pages-->
<!--
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>-->

<!--dynamic table initialization -->
<!--<script src="<?php echo $site_dir;?>/js/dynamic_table_init.js"></script>-->