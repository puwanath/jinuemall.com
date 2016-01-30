<?php
isset($_REQUEST['upline']) ? $upline = $_REQUEST['upline'] : $upline=null;
isset($_REQUEST['placement']) ? $placement = $_REQUEST['placement'] : $placement=null;
?>
<!DOCTYPE html>
<html>
	
  <head>
    <title>
      Packages
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
	<link href="<?php echo $site_dir;?>/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/color/green.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
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
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="text/html" charset="utf-8">
  </head>
  <body class="page-header-fixed bg-1 layout-boxed"> 
    <div class="modal-shiftfix">
      <?php
	  include "header.php";
	  ?>
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Package Plan
          </h1>
        </div>
        <!-- Pricing table 1 -->
        <div class="row pricing-table">
          <div class="col-sm-4">
		  <?php
			$newbie_query=mysqli_query($connect,'SELECT * FROM packages WHERE package_id=0');
			$newbie=mysqli_fetch_array($newbie_query);
		  ?>
            <div class="widget-container fluid-height list red">
              <div class="widget-content padded text-center">
                <h1 style="font-size:20px; color:#D9534F;">
                  <?
					echo $newbie['package_name'];
				  ?>
                </h1>
                <h2>
                  $<?php echo $newbie['package_price'];?> <span>/ (<?php echo number_format($newbie['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-danger" href="signup/?package=<?php echo $newbie['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>">Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : $<?php echo $newbie['package_price_return'];?> (<?php echo number_format($newbie['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo $newbie['package_pv'];?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $newbie['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $newbie['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo $newbie['package_cycle_maximum'];?> (<?php echo number_format($newbie['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $newbie['package_autoship_price'];?> (<?php echo $newbie['package_autoship_price']*35;?> Baht)
                </li>
              </ul>
            </div>
          </div> 
          <div class="col-sm-4">
		  <?php
			$starter_query=mysqli_query($connect,'SELECT * FROM packages WHERE package_id=1');
			$starter=mysqli_fetch_array($starter_query);
		  ?>
            <div class="widget-container fluid-height list red">
              <div class="widget-content padded text-center">
                <h1 style="font-size:20px; color:#D9534F;">
                  <?php
					echo $starter['package_name'];
				  ?>
                </h1>
                <h2>
                  $<?php echo $starter['package_price'];?> <span>/ (<?php echo number_format($starter['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-danger" href="signup/?package=<?php echo $starter['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>" >Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : $<?php echo $starter['package_price_return'];?> (<?php echo number_format($starter['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo $starter['package_pv'];?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $starter['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $starter['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo $starter['package_cycle_maximum'];?> (<?php echo number_format($starter['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $starter['package_autoship_price'];?> (<?php echo $starter['package_autoship_price']*35;?> Baht)
                </li>
              </ul>
            </div>
          </div>
		  <div class="col-sm-4">
		  <?php
			$member_query=mysqli_query($connect,'SELECT * FROM packages WHERE package_id=2');
			$member=mysqli_fetch_array($member_query);
		  ?>
            <div class="widget-container fluid-height list orange">
              <div class="widget-content padded text-center">
                <h1 style="font-size:20px; color:#F0AD4E;">
                  <?php echo $member['package_name'];?>
                </h1>
                <h2>
                  $<?php echo $member['package_price'];?> <span>/ (<?php echo number_format($member['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-warning" href="signup/?package=<?php echo $member['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>">Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : $<?php echo $member['package_price_return'];?> (<?php echo number_format($member['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo $member['package_pv'];?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $member['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $member['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo $member['package_cycle_maximum'];?> (<?php echo number_format($member['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $member['package_autoship_price'];?> (<?php echo $member['package_autoship_price']*35;?> Baht)
                </li>
              </ul>
            </div>
          </div>
		</div>
		<div class="row pricing-table">
		  <div class="col-sm-4">
			<?php
			$member_plus_query=mysqli_query($connect,'SELECT * FROM packages WHERE package_id=3');
			$member_plus=mysqli_fetch_array($member_plus_query);
			?>
            <div class="widget-container fluid-height list orange">
              <div class="widget-content padded text-center">
                <h1 style="font-size:20px; color:#F0AD4E;">
                  <?php echo $member_plus['package_name'];?>
                </h1>
                <h2>
                  $<?php echo $member_plus['package_price'];?> <span>/ (<?php echo number_format($member_plus['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-warning" href="signup/?package=<?php echo $member_plus['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>">Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : $<?php echo $member_plus['package_price_return'];?> (<?php echo number_format($member_plus['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo $member_plus['package_pv'];?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $member_plus['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $member_plus['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo $member_plus['package_cycle_maximum'];?> (<?php echo number_format($member_plus['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $member_plus['package_autoship_price'];?> (<?php echo $member_plus['package_autoship_price']*35;?> Baht)
                </li>
              </ul>
            </div>
          </div>
		
		  <div class="col-sm-4">
			<?php
			$vip_query=mysqli_query($connect,'SELECT * FROM packages WHERE package_id=4');
			$vip=mysqli_fetch_array($vip_query);
			?>
            <div class="widget-container fluid-height list green">
              <div class="widget-content padded text-center">
                <h1 style="font-size:20px; color:#60C560;">
                  <?php echo $vip['package_name'];?>
                </h1>
                <h2>
                  $<?php echo number_format($vip['package_price']);?> <span>/ (<?php echo number_format($vip['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-default" href="signup/?package=<?php echo $vip['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>" disabled="disabled">Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : <?php echo number_format($vip['package_price_return']);?> (<?php echo number_format($vip['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo number_format($vip['package_pv']);?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $vip['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $vip['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo $vip['package_cycle_maximum'];?> (<?php echo number_format($vip['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $vip['package_autoship_price'];?> (<?php echo number_format($vip['package_autoship_price']*35);?> Baht)
                </li>
				<li>
                  All sale : $<?php echo $vip['package_allsale_percent'];?> %
                </li>
              </ul>
            </div>
          </div>
		  <div class="col-sm-4">
			<?
			$vip_plus_query=mysqli_query($conenct,'SELECT * FROM packages WHERE package_id=5');
			$vip_plus=mysqli_fetch_array($vip_plus_query);
			?>
            <div class="widget-container fluid-height list green">
              <div class="widget-content padded text-center">
               <h1 style="font-size:20px; color:#60C560;">
                  <?php echo $vip_plus['package_name'];?>
                </h1>
                <h2>
                  $<?php echo number_format($vip_plus['package_price']);?> <span>/ (<?php echo number_format($vip_plus['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-default" href="signup/?package=<?php echo $vip_plus['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>" disabled="disabled">Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : $<?php echo number_format($vip_plus['package_price_return']);?> (<?php echo number_format($vip_plus['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo number_format($vip_plus['package_pv']);?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $vip_plus['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $vip_plus['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo $vip_plus['package_cycle_maximum'];?> (<?php echo number_format($vip_plus['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $vip_plus['package_autoship_price'];?> (<?php echo number_format($vip_plus['package_autoship_price']*35);?> Baht)
                </li>
				<li>
                  All sale : $<?php echo $vip_plus['package_allsale_percent'];?> %
                </li>
              </ul>
            </div>
          </div>
		</div>
		<div class="row pricing-table">
		  <div class="col-sm-4">
			<?
			$sd_query=mysqli_query($connect,'SELECT * FROM packages WHERE package_id=6');
			$sd=mysqli_fetch_array($sd_query);
			?>
            <div class="widget-container fluid-height list green">
              <div class="widget-content padded text-center">
                <h1 style="font-size:20px; color:#60C560;">
                  <?php echo $sd['package_name'];?>
                </h1>
                <h2>
                  $<?php echo number_format($sd['package_price']);?> <span>/ (<?php echo number_format($sd['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-default" href="signup/?package=<?php echo $sd['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>" disabled="disabled">Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : $<?php echo number_format($sd['package_price_return']);?> (<?php echo number_format($sd['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo number_format($sd['package_pv']);?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $sd['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $sd['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo number_format($sd['package_cycle_maximum']);?> (<?php echo number_format($sd['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $sd['package_autoship_price'];?> (<?php echo number_format($sd['package_autoship_price']*35);?> Baht)
                </li>
				<li>
                  All sale : $<?php echo $sd['package_allsale_percent'];?> %
                </li>
              </ul>
            </div>
          </div>
		
          <div class="col-sm-4">
			<?
			$fs_query=mysqli_query($connect,'SELECT * FROM packages WHERE package_id=7');
			$fs=mysqli_fetch_array($fs_query);
			?>
            <div class="widget-container fluid-height list blue">
              <div class="widget-content padded text-center">
                <h1 style="font-size:20px; color:#007AFF;">
                  <?php echo $fs['package_name'];?>
                </h1>
                <h2>
                  $<?php echo number_format($fs['package_price']);?> <span>/ (<?php echo number_format($fs['package_price']*35);?> Baht) </span>
                </h2>
                <a class="btn btn-block btn-default" href="signup/?package=<?php echo $fs['package_id'];?>&upline=<?php echo $upline;?>&placement=<?php echo $placement;?>" disabled="disabled">Sign Up</a>
              </div>
              <ul>
                <li>
                  Price return : $<?php echo number_format($fs['package_price_return']);?> (<?php echo number_format($fs['package_price_return']*35);?> Baht)
                </li>
                <li>
                  Price value : <?php echo number_format($fs['package_pv']);?> PV
                </li>
                <li>
                  Direct bonus : <?php echo $fs['package_direct_percent'];?> %
                </li>
                <li>
                  Cycle bonus : <?php echo $fs['package_cycle_percent'];?> %
                </li>
                <li>
                  Max income/day : $<?php echo number_format($fs['package_cycle_maximum']);?> (<?php echo number_format($fs['package_cycle_maximum']*35);?> Baht)
                </li>
				<li>
                  Autoship : $<?php echo $fs['package_autoship_price'];?> (<?php echo number_format($fs['package_autoship_price']*35);?> Baht)
                </li>
				<li>
                  All sale : $<?php echo $fs['package_allsale_percent'];?> %
                </li>
              </ul>
            </div>
          </div>
          <!--div class="col-sm-4">
            <div class="widget-container fluid-height list red">
              <div class="widget-content padded text-center">
                <h1>
                  Extreme!
                </h1>
                <h2>
                  $99<span>/month</span>
                </h2>
                <a class="btn btn-block btn-default" href="#">Sign Up</a>
              </div>
              <ul>
                <li>
                  2TB of Storage
                </li>
                <li>
                  Unlimited Users
                </li>
                <li>
                  Unlimited Pageviews
                </li>
                <li>
                  Custom domain
                </li>
                <li>
                  Dedicated Support 
                </li>
              </ul>
            </div>
          </div><!-->

        </div>
        <!-- Pricing table 2 -->
        
      </div>
    </div>
  </body>
</html>