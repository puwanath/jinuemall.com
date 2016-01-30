<?php
$me_package=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM packages WHERE package_id=".$me['package_id']));

$next_package_id=$me_package['package_id']+1;

$next_package=mysqli_fetch_array(mysqli_query($connect,"SELECT package_name,package_pv FROM packages WHERE package_id=$next_package_id"));

$pv_upgrade=$me['member_pv']+0;
$pv_total=$next_package['package_pv']-$me_package['package_pv'];
$pv_persent=($pv_upgrade/$pv_total)*100;
	

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>
		<?php echo $me['member_name']."  ".$me['member_surname'];?>
    </title>
	<link rel="shortcut icon" href="<?php echo $site_dir;?>/images/jSystem-icon.png" />
	<link href="<?php echo $site_dir;?>/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/hightop-font.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/bootstrap-editable.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/social-buttons.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/dropzone.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/nestable.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/ios7-background.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_system;?>/styles.css" media="all" rel="stylesheet" type="text/css" />
	<script src="<?php echo $site_dir;?>/javascripts/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery-ui.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/raphael.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/selectivizr-min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.mousewheel.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.vmap.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/fullcalendar.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/gcal.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/datatable-editable.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/excanvas.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/isotope_extras.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/modernizr.custom.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/select2.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/styleswitcher.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/wysiwyg.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/typeahead.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/summernote.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/typeahead.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/spin.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/ladda.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/moment.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/mockjax.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-editable.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/xeditable-demo-mock.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/xeditable-demo.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/address.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/daterange-picker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/date.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/morris.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/skycons.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/fitvids.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/dropzone.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.nestable.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/main.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/respond.js" type="text/javascript"></script>
	<script src="<?php echo $site_system;?>/scripts.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	
  </head>
  <body class="layout-fluid bg-f7" style="padding-top:112px;">  
	<div class="modal-shiftfix">
	<?php
	  include("header.php"); 
	  ?> 
		<!-- Statistics -->
            <div class="widget-container weather fluid-height">
              <div class="widget-content padded bg-f7">
                <div class="row text-center">
                  <div class="col-sm-4 today text-center" style="border-bottom:1px #d2d2d2 solid;">
					<a href="<?php echo $site_url;?>/wallet">
					<h1 style="font-size:3em;display: block;margin: 20px auto 14px; color:#555555;">
						<img class="img-circle" src="<?php echo $site_main."/gallery/avatar/".$me['member_avatar'];?>" style="height:100px;width:100px;">
						<?php echo $me['member_username'];?><br>
						<small><?php echo $me['member_name']."  ".$me['member_surname'];?></small>
					</h1>
                    <p class="location">          
						<h1></h1>
                    </p>
					</a>
                  </div>
                  <div class="col-sm-2 col-xs-6" style="border-bottom:1px #d2d2d2 solid;">
                    <p>
                      <?php echo wordvar('Your_money');?>
                    </p>
					<a href="<?php echo $site_url;?>/wallet">
					<h1 style="font-size:4em;display: block;margin: 20px auto 14px; color:#555555;">
						<img src="<?php echo $site_dir;?>/images/wallet.png" style="width: 64px;" align="center">
					</h1>
                    <div class="number">
                      <?php echo currency($me['jWallet']+$me['rMoney']+$me['jPoint']);?>
                    </div>
					</a>
                  </div>
                  <div class="col-sm-2 col-xs-6" style="border-bottom:1px #d2d2d2 solid;">
                    <p>
                      <?php echo wordvar('Transactions');?>
                    </p>
					<a href="<?php echo $site_url;?>/wallet/transactions">
					<h1 style="font-size:4em;display: block;margin: 20px auto 14px; color:#555555;">
						<i class="fa fa-tasks" style="font-size:1em;"></i>
					</h1>
					</a>
                    <div class="number">
                      <?php 
						$transactions_count=mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(transaction_id) FROM transactions WHERE member_id=$me_login;"));
						echo $transactions_count[0];
					  ?>
					  <small><?php echo wordvar('List');?></small>
                    </div>
                  </div>
                  <div class="col-sm-2 col-xs-6" style="border-bottom:1px #d2d2d2 solid;">
                    <p>
                      <?php echo wordvar('Invoices');?>
                    </p>
					<a href="<?php echo $site_url;?>/invoices">
					<h1 style="font-size:4em;display: block;margin: 20px auto 14px; color:#555555;">
						<i class="fa fa-shopping-cart" style="font-size:1em;"></i>
					</h1>
					</a>
                    <div class="number">
                     <?php 
						$orders_count=mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(order_id) FROM orders WHERE member_id=$me_login;"));
						echo $orders_count[0];
					 ?>
					  <small><?php echo wordvar('Invoice');?></small>
                    </div>
                  </div>
                  <div class="col-sm-2 col-xs-6" style="border-bottom:1px #d2d2d2 solid;">
                    <p>
                      Autoship 50pv 
                    </p>
					<?php
					$autoship_percent=($me['member_purchase']/50)*100;
					?>
					<a href="/">
                   <div id="Autoship" class="pie-chart pie-number" data-percent="<?php echo $autoship_percent;?>"></div>
                    <div class="number">
						<?php
						if($me['member_purchase']>=50){
							echo "50pv";
						}elseif($me['member_purchase']<130){
							echo number_format($me['member_purchase'],0)."pv";
						}
						?>
						<small><?php echo wordvar('Hold');?></small>
                    </div>
					</a>
                  </div>
                </div>
              </div>
            </div>
			<!--stat -->
		<div class="container-fluid main-content bg-white">
			<div class="container padded fluid-height">
				<h2>Your Package</h2>
				<div class="row">
					<div class="col-sm-3 text-center  " >
						<img src="<?php echo $site_dir;?>/images/crown_orange.png" style="width: 120px;"><br>
						<h1 style="color:darkslategray;"> 
							<?php echo $me_package['package_name'];?> <?if($me['package_special']=="ss"){ echo "(SS)"; }?>
						</h1>
					</div>
					<?php
					if($me['package_special']=="ss"){
					?>
					<div class="col-sm-3 text-center  " >
						<h1 style="font-size:72px;font-weight:bold;">SS</h1>
						<h1 style="color:darkslategray;"> 
							Super Starter
						</h1>
					</div>
					<?php
					}
					if($me['member_position']!=""){
					?>
					<div class="col-sm-3 text-center  " >
						<h1 style="font-size:72px;font-weight:bold;"><?php echo select_data('positions','position_name',"position_id=".$me['member_position']);?></h1>
						<h1 style="color:darkslategray;"> 
							Position
						</h1>
					</div>
					<?php
					}
					?>
				</div>
			</div>
			<hr>
		</div>
	<?php
	if($me['package_id']<=6){
	?>
		<div class="container-fluid main-content bg-white">
			<div class="container padded">
				<h2>Upgrade Package <br>
					<small>You need <?php echo $pv_total-$pv_upgrade;?> pv for upgrade to <?php echo $next_package['package_name'];?> package. <a class="btn-link">Upgrade now</a></small>
				</h2>
				<div class="row">
					<div class="col-sm-12 text-center  " >
						<div class="page-title">
							<div class="progress progress-striped active" style="height:32px;">
							  <div class="progress-bar progress-bar-success" style="width: <?php echo $pv_persent;?>%;"></div>
							</div>
						</div>
					</div>	
				</div>
			</div>
			<hr>
		</div>
	<?php
	}
	?>
	<div class="container-fluid main-content bg-white">
			<div class="container padded fluid-height">
				<h2>Reference</h2>
				<div class="row">
					<div class="col-sm-6  " >
						<h1 style="font-size:42px;font-weight:bold;">
							<img class="img-circle" src="<?php echo $site_main."/gallery/avatar/".select_data('members','member_avatar',"member_id=".$me['sponsor']);?>" style="height:60px;width:60px;">
							<?php echo select_data('members',"CONCAT(member_name,' ',member_surname)","member_id=".$me['sponsor']);?></h1>
						<h2 style=""> 
							<?php echo wordvar("Sponsor");?>
						</h2>
					</div>
					<div class="col-sm-6  " >
						<h1 style="font-size:42px;font-weight:bold;">
							<img class="img-circle" src="<?php echo $site_main."/gallery/avatar/".select_data('members','member_avatar',"member_id=".$me['upline']);?>" style="height:60px;width:60px;">
							<?php echo select_data('members',"CONCAT(member_name,' ',member_surname)","member_id=".$me['upline']);?></h1>
						<h2 style=""> 
							<?php echo wordvar("Upline");?>
						</h2>
					</div>
				</div>
			</div>
			<hr>
		</div>
		
		
	</div>
  </body>
</html>