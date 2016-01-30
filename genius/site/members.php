<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title><?php echo $site_title;?></title>

    <!--Core CSS -->
    <link href="<?php echo $site_dir;?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="<?php echo $site_dir;?>/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo $site_dir;?>/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="<?php echo $site_dir;?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	
	
</head>

<body>

<section id="container" >
<?php 
include "header.php";
include "sidebar.php";
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <i class="fa fa-users"></i> Member
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
					
						
				<table cellpadding="0" cellspacing="0" border="0" class="display table table-striped table-hover" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="hidden-phone">Package</th>
                        <th class="hidden-phone">jWallet</th>
                        <th class="hidden-phone">jPoint</th>
                        <th class="hidden-phone">Sponsor</th>
                        <th class="hidden-phone">Upline</th>
                        <th class="hidden-phone">Status</th>
                        <th class="hidden-phone">Register Date</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$member_sql=mysqli_query($connect,'SELECT * FROM members LEFT JOIN packages ON members.package_id=packages.package_id');
					while($member=mysqli_fetch_array($member_sql)){
					?>
                    <tr>
                        <td><u><a href="<?php echo $site_url;?>/profile/?id=<?php echo $member['member_id'];?>"><?php echo $member['member_name']." ".$member['member_surname'];?></a></u></td>
                        <td><u><a href="<?php echo $site_url;?>/profile?id=<?php echo $member['member_id'];?>"><?php echo $member['member_username'];?></a></u></td>
						<td class="hidden-phone"><?php echo decode($member['member_password'],$private_key);?></td>
                        <td class="hidden-phone"><?php echo $member['package_name'];?></td>
                        <td class="center hidden-phone"><?php echo $member['jWallet'];?></td>
                        <td class="center hidden-phone"><?php echo $member['jPoint'];?></td>
                        <td class="center hidden-phone"><?php echo select_data('members','member_username',"member_id=".$member['sponsor']);?></td>
                        <td class="center hidden-phone"><?php echo select_data('members','member_username',"member_id=".$member['upline']);?></td>
						<td class="center hidden-phone"><?php echo $member['member_status'];?></td>
                        <td class="center hidden-phone"><?php echo $member['member_registered'];?></td>
					<?php
					}
					?>
</tbody>
</table>
                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<?php include "sidebar_right.php";?>

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo $site_dir;?>/js/jquery.js"></script>
<script src="<?php echo $site_dir;?>/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $site_dir;?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $site_dir;?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo $site_dir;?>/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo $site_dir;?>/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.pie.resize.js"></script>

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="<?php echo $site_dir;?>/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.js"></script>
<!--common script init for all pages-->
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>

<!--dynamic table initialization -->
<script src="<?php echo $site_dir;?>/js/dynamic_table_init.js"></script>



</body>
</html>
