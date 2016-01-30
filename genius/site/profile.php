<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">
    <title><?php echo $site_title;?></title>
    <!--Core CSS -->
    <link href="<?php echo $site_dir;?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
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
<?php
$member_id=$_REQUEST['id'];
$member_sql=mysqli_query($connect,"SELECT * FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE member_id=$member_id");
$member=mysqli_fetch_array($member_sql);
$member_package=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM packages WHERE package_id=".$member['package_id']));
$next_package_id=$member_package['package_id']+1;
$next_package=mysqli_fetch_array(mysqli_query($connect,"SELECT package_name,package_pv FROM packages WHERE package_id=$next_package_id"));
$pv_upgrade=$member['member_pv']+0;
$pv_total=$next_package['package_pv']-$member_package['package_pv'];
$pv_persent=($pv_upgrade/$pv_total)*100;
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                       <div class="col-md-3">
                           <div class="profile-pic text-center">
								<?php
								if($member['member_avatar']!=""){
								?>
									<img width="34" height="34" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $member['member_avatar'];?>" />
								<?php
								}else{
								?>
									<img width="34" height="34" src="<?php echo $site_main;?>/gallery/avatar/default.png" />
								<?php
								}
								?><br>
								<h4> <?php echo strtoupper($member['member_username']);?> </h4>
								<hr>
								<a href="/?page=members" class="btn btn-primary">Change Member</a>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="profile-desk">
                               <h1><?php echo strtoupper($member['member_name']." ".$member['member_surname']);?></h1>
							   <?php 
							   $sponsor_sql=$member['sponsor'];
							   ?>
                               <span class="text-muted">
									<?php echo $member['package_name'];
										if($member['package_special']!=""){
									?>
											( <?php echo strtoupper($member['package_special']);?> )
									<?php
										}
									?>
							   </span><br>
                               <p style="font-size: 18px;">
                                   <?php
										echo " Address : ".$member['member_address']." ".$member['member_country']." ".$member['member_city']." ".$member['member_zipcode'];
								   ?>
                               </p>
                           </div>
										<div class="prf-box">
                                            <h3 class="prf-border-head">work in progress</h3>
											<?php
											if($member['package_id']!=7){
											?>
                                            <div class=" wk-progress">
                                                <div class="col-md-5">
													<?php echo $pv_upgrade." / ".$pv_total." to ".$next_package['package_name'];?>
												</div>
                                                <div class="col-md-5">
                                                    <div class="progress  ">
                                                        <div style="width: <?php echo $pv_persent;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                                                            <span class="sr-only"><?php echo $pv_persent;?>% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"><?php echo $pv_persent;?>%</div>
                                            </div>
											<?php
											}
											?>
                                        </div>
                       </div>
                       <div class="col-md-3">
                           <div class="profile-statistics">
                               <h1><?php echo number_format($member['jWallet'],2);?></h1>
                               <p>jWallet</p>
                               <h1><?php echo number_format($member['rMoney'],2);?></h1>
                               <p>rMoney</p>
							   <h1><?php echo number_format($member['jPoint'],2);?></h1>
                               <p>jPoint</p>
                           </div>
                       </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#overview">
                                    Overview
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-12">
										<div class="col-sm-8">
                                            <h3 class="prf-border-head">Transactions</h3>
										<?php
										$transactions_query=mysqli_query($connect,"SELECT * FROM transactions WHERE member_id=$member_id ORDER BY transaction_date DESC LIMIT 30");
										while($transactions=mysqli_fetch_array($transactions_query)){
										?>
                                            <div class=" wk-progress pf-status">
												<div class="col-md-3 col-xs-3"><?php echo $transactions['transaction_date'];?></div>
                                                <div class="col-md-3 col-xs-3"><?php echo str_replace('_', ' ',$transactions['transaction_description']);?></div>
                                                <div class="col-md-3 col-xs-3 text-center"><?php echo select_data('members','member_username',"member_id=".$transactions['member_refer']);?></div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
													<?php
														if($transactions['transaction']=="pay" OR $transactions['transaction']=="transfer"){
													?>
														<span style="color:red"> -<?php echo $transactions['expend']; ?> </span>
													<?php
													}else{
													?>
														<span style="color:green"> <?php echo $transactions['income']; ?> </span>
													<?php
													}
													?>
													</strong>
                                                </div>
                                            </div>
										<?php
										}
										?>
                                        </div>
                                        <div class="col-sm-4">
										<h3 class="prf-border-head">Friends</h3>
										<?php
										$friends_query=mysqli_query($connect,"SELECT * FROM members WHERE sponsor=$member_id");
										while($friends=mysqli_fetch_array($friends_query)){
										?>
                                            
                                            <div class=" wk-progress tm-membr">
                                                <div class="col-md-2 col-xs-2">
                                                    <div class="tm-avatar">
                                                        <?php
															if($friends['member_avatar']!=""){
															?>
																<img width="34" height="34" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $friends['member_avatar'];?>" />
															<?php
															}else{
															?>
																<img width="34" height="34" src="<?php echo $site_main;?>/gallery/avatar/default.png" />
															<?php
															}
															?>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-xs-7">
                                                    <span class="tm"><?php echo $friends['member_name'];?></span>
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <a href="?page=profile&id=<?php echo $friends['member_id'];?>" class="btn btn-white">View Profile</a>
                                                </div>
                                            </div>
										<?php
										}
										?>
                                        </div>
                                    </div>
                                </div>
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
<script src="js/jquery.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>
<script src="js/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&AMP;sensor=false"></script>

<!--common script init for all pages-->
<script src="js/scripts.js"></script>
<script>

    //google map
    function initialize() {
        var myLatlng = new google.maps.LatLng(-37.815207, 144.963937);
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Hello World!'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

$('.contact-map').click(function(){

    //google map in tab click initialize
    function initialize() {
        var myLatlng = new google.maps.LatLng(-37.815207, 144.963937);
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Hello World!'
        });
    }
    google.maps.event.addDomListener(window, 'click', initialize);
});

</script>



</body>
</html>
