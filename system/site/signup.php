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
		<?php echo wordvar('Signup');?> 
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
	<script src="<?php echo $site_dir;?>/javascripts/scripts.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="utf-8">
  </head>
  <body class="page-header-fixed bg-ios-blue-3  layout-fluid">  
    <div class="modal-shiftfix">
     <?php
	 include "header.php";
	  
	 if(isset($uri[1])=="complete"){ 
	 ?>
	  <div class="container main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="widget-container fluid-height clearfix">
              <div class="widget-content padded text-center row">
				<div class="col-md-6 text-center">
					<i class="fa fa-check" style="font-size:16em;color:#60C560;"></i>
					<h1><?php echo wordvar('Signup_complete');?></h1>
					<p class="lead">
                    <?php echo wordvar('This_is_an_username_and_password_of_new_member');?>					
					</p>
				</div>
				<div class="col-md-6 text-center">
					<br><br>
					<img src="<?php echo $site_main."/gallery/avatar/".$_SESSION['signup_avatar'];?>" style="width:160px;"><br><br>
						<div  class="form-horizontal">		
							<div class="form-group">
								<label class="control-label col-sm-6" ><?php echo wordvar('Username');?></label>
								<div class="col-sm-2">
								  <input class="form-control" placeholder="<?php echo wordvar('Username');?>" type="text" value="<?php echo $_SESSION['signup_username'];?>" disabled>
								</div>
							</div>
						</div>
						<div  class="form-horizontal">		
							<div class="form-group">
								<label class="control-label col-sm-6" ><?php echo wordvar('Password');?></label>
								<div class="col-sm-2">
								  <input class="form-control" placeholder="<?php echo wordvar('Password');?>" type="text" value="<?php echo $_SESSION['signup_password'];?>" disabled>
								</div>
							</div>
						</div>
					<a class="btn btn-default" href="<?php echo $site_url;?>/placement"><?php echo wordvar('Back_to_placement');?></a>
					<a class="btn btn-success" href="<?php echo $site_url;?>/login"><?php echo wordvar('Login_now');?></a>
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
	 <?php
	 }else{
		isset($_REQUEST['upline']) ? $upline=$_REQUEST['upline'] : $upline=null;
		isset($_REQUEST['placement']) ? $placement = $_REQUEST['placement'] : $placement=null;

		$upline_username=mysqli_fetch_array(mysqli_query($connect,"SELECT member_username FROM members WHERE member_id=$upline")); 

		$package_id=0;
		$package=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM packages WHERE package_id=$package_id"));
	 ?>
	
	<div class="container-fluid main-content text-center padded">
			<div class="page-title">
				  <h1 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo wordvar('Register');?></h1>
			</div>
	</div>
      <div class="container-fluid main-content bg-white padded">
		<form action="<?php echo $site_url;?>/process" method="POST"  id="signup-form">
		<div class="row editable-form">
			<div class="col-sm-8 col-sm-offset-2">
				
				<div class="widget-container fluid-height">
                  <div class="widget-content padded">
				  <div class="row">
					<div class="col-sm-4">
						<div class="form-group"> 
							<label for="sponsor"><?php echo wordvar('Sponsor');?></label>
							<select class="select2able" id="sponsor" name="sponsor">
								<option value="<?php echo $me['member_id'];?>" selected><?php echo $me['member_username'];?></option>
								<?php
								$uplines=array($me_login);
								$uplines_count=null;
								do{
									$member_sql="SELECT member_id,member_username FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE ";
									$member_sql.=" upline=".$uplines[0];
									for($i=1;$i<=$uplines_count-1;$i++){
										$member_sql.=" OR upline=".$uplines[$i];
									} 			
									$uplines=array();
									$member_query=mysqli_query($connect,$member_sql);
									while($members=mysqli_fetch_array($member_query)){
										?>
										<option value="<?php echo $members['member_id'];?>"><?php echo $members['member_username'];?></option>
										<?php
										array_push($uplines,$members['member_id']);
									}
									$uplines_count=count($uplines);
								}while($uplines_count!=0);
								?>
								
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<fieldset disabled="">
							<div class="form-group">
								<label for="upline"><?php echo wordvar('Upline');?></label>
								<input class="form-control" id="sponsor" placeholder="" value="<?php echo $upline_username['member_username'];?>" type="text">
							</div>
						</fieldset>
					</div> 
					<div class="col-sm-4">
						<fieldset disabled="">
							<div class="form-group">
							  <label for="placement"><?php echo wordvar('Side');?></label>
							  <input class="form-control" id="placement" placeholder="" value="<?php if($placement=="R"){echo wordvar('Right');}elseif($placement=="L"){echo wordvar('Left');}else{echo wordvar('Auto side');} ?>" type="text">
							</div>
						</fieldset>
					</div> 
				  </div>
				  <div class="row">
					<div class="col-lg-12">
						<div class="form-group"> 
							<label for="signup_franchiser">Franchise Shop</label>
							<select class="form-control" id="signup_franchiser" name="signup_franchiser">
									  <?php
									  $franchiser_query=mysqli_query($connect,"SELECT member_id,member_username FROM members WHERE package_id=7");
									  while($franchiser=mysqli_fetch_array($franchiser_query)){
									  ?>
									  <option value="<?php echo $franchiser['member_id'];?>" <?php if($franchiser['member_id']==99){ echo "selected"; } ?> ><?php echo $franchiser['member_username'];?></option>
									  <?php
									  }
									  ?>
							</select>
						</div>
					</div>
				  </div>
                  </div>
					<hr>
					<div class="heading text-center">
						<h2><?php echo wordvar('Basic information');?></h2>
					</div>
					<div class="widget-content padded">
						<div  class="form-horizontal">
							
							
							<div class="form-group">
								<label class="control-label col-md-5" for="signup_name"><?php echo wordvar('Name');?></label>
								<div class="col-md-5">
								  <input class="form-control" placeholder="<?php echo wordvar('Name');?>" type="text" name="signup_name">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5" for="surname"><?php echo wordvar('Surname');?></label>
								<div class="col-md-5">
								  <input class="form-control" placeholder="<?php echo wordvar('Surname');?>" type="text" name="signup_surname" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5" for="national_id"><?php echo wordvar('National_ID');?> / <?php echo wordvar('Passport_No.');?></label>
								<div class="col-md-5">
								  <!--input class="form-control" placeholder="National ID" type="text" name="signup_national_id"  data-inputmask="'mask': ['9-9999-99999-99-9']"  required-->
								  <input class="form-control" placeholder="<?php echo wordvar('National_ID');?> / <?php echo wordvar('Passport_No.');?>" type="text" name="signup_national_id"  required>
								</div>
							</div>
							<!--div class="form-group">
								<label class="control-label col-md-3" for="passport">Passport</label>
								<div class="col-md-7">
								  <input class="form-control" placeholder="Passport" type="text" name="signup_passport" >
								</div>
							</div-->
							<div class="form-group">
								<label class="control-label col-md-5" for="signup_country"><?php echo wordvar('Country');?></label>
								<div class="col-md-5">
									<select class="select2able" id="signup_country" name="signup_country">
									<?php
									$country_query=mysqli_query($connect,"SELECT country_code,country FROM country ORDER BY country");
									while($country=mysqli_fetch_array($country_query)){
									?>
										<option value="<?php echo $country['country_code'];?>"><?php echo wordvar($country['country']);?></option>
									<?php
									}
									?>
									</select>
								</div> 
							</div>
							<div class="form-group">
								<label class="control-label col-md-5" for="signup_currency"><?php echo wordvar('Currency');?></label>
								<div class="col-md-5">
									<select class="select2able" id="signup_currency" name="signup_currency">
									<?php
									$currency_query=mysqli_query($connect,"SELECT currency_code,currency FROM country WHERE currency!='' ORDER BY currency");
									while($currency=mysqli_fetch_array($currency_query)){
									?>
										<option value="<?php echo $currency['currency_code'];?>"><?php echo wordvar($currency['currency'])."  (".$currency['currency_code'].")";?></option>
									<?php
									}
									?>
									</select>
								</div> 
							</div>
							<!--div class="form-group">
								<label class="control-label col-md-3">Country</label>
								<div class="col-md-9">
								  <input autocomplete="off" class="form-control countries typeahead tt-query" dir="auto" placeholder="Search for a country" spellcheck="false" type="text" name="signup_country" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">City</label>
								<div class="col-md-9">
								  <input autocomplete="off" class="form-control states typeahead tt-query" dir="auto" placeholder="City" spellcheck="false" type="text" name="signup_city" required>
								</div>
							</div-->
							<!--div class="form-group">
								<label class="control-label col-md-2" for="email">E-mail</label>
								<div class="col-md-3">
								  <input class="form-control" placeholder="email" type="email" name="signup_email" required>
								</div>
							</div-->
							<div class="form-group">
								<label class="control-label col-md-5" for="tel"><?php echo wordvar('Phone');?></label>
								<div class="col-md-5">
								  <input class="form-control" placeholder="<?php echo wordvar('Phone');?>" type="tel" name="signup_phone"  data-inputmask="'mask': ['999-999-9999']"  required>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="heading text-center">
						<h2><?php echo wordvar('Account Infomation');?></h2>
					</div>
					<div class="widget-content padded">
						<div  class="form-horizontal">
							<div class="form-group  has-feedback" id="username_check_status">
								<label class="control-label col-md-5" for="username_check">Username <span id="result" class=""></span></label>
								<div class="col-md-5">
								  <input id="signup_username" class="form-control" placeholder="เช่น thesuccess , apple01" type="text" name="signup_username" required> 
								</div>
							</div>
							<div class="form-group" id="password_check">
								<label class="control-label col-md-5" for="tel">Password</label>
								<div class="col-md-5">
								  <input class="form-control" placeholder="<?php echo wordvar('Password');?>" type="text" name="signup_password" id="signup_password" value="<?php echo rand(999,9999);?>" required>
								</div>
							</div>
							<div class="form-group" id="password_confirm">
								<label class="control-label col-md-5" for="tel">Confirm Password</label>
								<div class="col-md-5">
								  <input class="form-control" placeholder="<?php echo wordvar('Confirm Password');?>" type="text" name="signup_password_confirm" id="signup_password_confirm" value="" required>
								</div>
							</div>
						</div>
					</div>
				<hr>
					<div class="heading text-center">
						<h2><?php echo wordvar('Package');?></h2>
					</div>
					<?php 
					//echo $getdetails->country;
					if($getdetails->country=="th" or $getdetails->country=="TH"){
					?>
					<div class="widget-content padded row">
						<h3><?php echo wordvar('Newbie');?> : <?php echo currency($package['package_price']);?></h3>
						<div class="form-group">
							<div class="col-md-4" style="border-right:1px #E4E4E4 solid">
								<label class="radio" for="set1">
									<input id="set1" name="product_set" type="radio" value="neo-medical" checked><span>Neo-Medical 1 <?php echo wordvar('pieces');?> </span><br>
									<img style="height:120px" src="<?php echo $site_main;?>/gallery/products/244.jpg">
								</label>
							</div>
							<div class="col-md-4" style="border-right:1px #E4E4E4 solid">
								<label class="radio" for="set2">
									<input id="set2" name="product_set" type="radio" value="glu-gold"><span>Glu-Gold 5 <?php echo wordvar('pieces');?></span><br>
									<img style="height:120px" src="<?php echo $site_main;?>/gallery/products/136.png">
								</label>
							</div>
							<div class="col-md-4">
								<label class="radio" for="set3">
									<input id="set3" name="product_set" type="radio" value="facial-massage"><span>Facial massage 1 voucher</span><br>
									<img style="height:120px" src="<?php echo $site_main;?>/gallery/products/243.jpg">
								</label>
							</div>
						</div>
					</div>
					
					<?php
					}else{
					?>
					<div class="widget-content padded row">
						<h3><?php echo wordvar('Newbie');?> : <?php echo currency(5);?></h3>
						<input type="hidden" name="product_set"  value="newbie-region"/>
					</div>
					<?php
					}
					?>
					
					<hr>
					<div class="heading text-center">
						<h2><?php echo wordvar('Payment_method');?></h2>
					</div>
					<div class="widget-content padded row">
						<div class="col-md-6">
							<label class="checkbox-inline" for="jWallet">
								<div class="number">
									J-Wallet
								</div>
								<div class="text">
									<input type="radio" id="jWallet" name="payment_method" <?php if($me['jWallet']>=$package['package_price']){ echo "checked"; }else{ echo "disabled";}?> value="jWallet"><span><?php echo wordvar('Current balance');?> : <?php echo currency($me['jWallet']*1);?></span>
								</div>
							</label>
						</div>
						<div class="col-md-6">
							<label class="checkbox-inline" for="rMoney">
								<div class="number">
									R-Wallet
								</div>
								<div class="text">
									<input type="radio" id="rMoney" name="payment_method" <?php if($me['rMoney']>=$package['package_price']){ echo "checked"; }else{ echo "disabled";}?> value="rMoney"><span><?php echo wordvar('Current balance');?> : <?php echo currency($me['rMoney']*1);?></span>
								</div>
							</label>
						</div>
					</div>
						<!--div class="col-md-4 form-group">
						<label class="checkbox-inline">
							<h3>
								Use 
							</h3>
							
							<div class="text">
								<input type="checkbox"><span>Hold PV</span>
							</div>
						</label>
						</div-->
					<hr>
					<div class="heading text-center">
						<h2><?php echo wordvar('Terms and Conditions');?> </h2>
					</div>
					<div class="widget-content padded row">
						  <p>
							1. ผู้สมัคร JinueGlobal ต้องมีอายุไม่ต่ำกว่า 20 ปี บริบูรณ์ และตกลงยอมรับการยกเลิกการสมัครของท่านโดยบริษัท กรณีท่านไม่มีการทำรายการหรือทำธุรกรรมใดๆ ผ่านในระบบ Jinuemall ภายใน 6 เดือน
						  <p>
						  <p>
						   2. ผู้สมัครได้อ่านและทำความเข้าใจในการจ่ายผลตอบแทน ตลอดจนนโยบาย ระเบียบ วิธีการปฏิบัติ และตกลงยึดถือตามข้อกำหนดและเงื่อนไขทั้งหมด และยอมรับว่า ข้อกำหนด และเงื่อนไขที่ระบุในแผนการจ่ายผลตอบแทน พร้อมทั้งนโนบาย และวิธีปฏิบัติ รวมถึงการปรับปรุงเอกสารผนวค และการแก้ไขใดๆ ที่อาจเกิดขึ้นในอนาคตถือว่าเป็นส่วนหนึ่ง และรวมอยู่ในข้อตกลงนี้ ข้อตกลงนี้ถือเป็นสัญญารวม(สัญญา) ซึ่งรวมถึงแผนการจ่ายผลตอบแทน พร้อมทั้งนโยบายระเบียบวิธีปฏิบัติของบริษัท ผู้สมัครรับทราบว่าการละเมิดข้อกำหนดและเงื่อนไข หรือข้อตกลงมีผลทำให้สถานภาพของผู้สมัครสิ้นสุดลง ซึ่งรวมถึงการจ่ายผลตอบแทนด้วย
						  </p>
						  <p>
						  3. ห้ามมิให้ท่านปลอมหรือหลอกลวงว่าเป็นบุคคลอื่น ซื่งรวมถึงบุคคลที่มีชื่อเสียงหน่วยงานอื่น หรือแสดงความเกี่ยวข้องของท่านกับบุคคลหรือองค์กรใดโดยไม่เป็นจริง JinueGlobal ขอสงวนสิทธิ์ที่จะปฏิเสธรหัสสมาชิกหรือ Username ของท่าน หรือที่อยู่อีเมลใดๆ ที่อาจถือได้ว่าเป็นการปลอม หรือหลอกลวงตัวของท่านเอง หรือเป็นการแอบอ้างชื่อ โดยใช้ชื่อบุคคลอื่น
						  </p>
						  <p>
						  4. เมื่อท่านเป็นสมาชิก JinueGlobal แล้ว กรณีเกิดความเสียหาย หรือมีการร้องเรียนใดๆ อันเกิดจากการให้ข้อมูลอันเป็นเท็จ ไม่ถูกต้อง และ/หรือ ไม่ครบถ้วนสมบูรณ์เกี่ยวกับ บริษัท จีนูโกลบอล จำกัด และการดำเนินธุรกิจของบริษัท จีนูโกลบอล จำกัด ท่านในถานะผู้แนะนำ ท่านต้องรับผิดชอบต่อความเสียหายที่เกิดขึ้นทั้งหมดทุกประการไม่ว่ากรณีใดก็ตาม รวมทั้งท่าน จะไม่ทำการประชาสัมพันธ์ โฆษณา ทำการตลาด ที่เกียวข้องกับการสมัครและสิทธิประโยชน์ของบริษัท จีนูโกลบอล จำกัด ไม่ว่าทางใดๆ อาทิ ทางวิทยุ โทรทัศน์ สื่อสิ่งพิมพ์ อินเทอร์เน็ต โซเซี่ยลมีเดีย หรือสื่ออื่นใดๆ เว้นแต่จะได้รับความยินยอมเป็นลายลักษณ์อักษรจากบริษัท จีนูโกลบอล จำกัด หากมีการฝ่าฝืนบริษัท จีนูโกลบอล จำกัด มีสิทธิ์บอกเลิกสัญญานี้และสิทธิประโยชน์ของท่าน
						  </p>
						 <p class="lead">	ท่านได้อ่านและเข้าใจข้อกำหนดและเงื่อนไขของสัญญาฉบับนี้แล้วเห็นว่าถูกต้องตามเจตนารมณ์และความประสงค์ของท่านทุกประการและยอมรับข้อกำหนดข้อตกลงและเงื่อนไขของสัญญาฉบับนี้จึงสมัครเป็นนักธุรกิจและผู้ใช้บริการของบริษัท จีนูโกลบอล จำกัด					
						  </p>
					</div>
		</div>  <!--row -->
			
			<br><br>
			<div class="row text-center">
				<div class="col-lg-12">
					<?php
					if($me['jWallet']>=$package['package_price'] OR $me['rMoney']>=$package['package_price']){
					?>
					<button class="btn btn-primary btn-lg" type="submit"><?php echo wordvar('Register (Accept Terms and Conditions)');?></button><br>
					<a href="<?php echo $site_url;?>/placement" class="btn btn-link"><?php echo wordvar('Cancel');?> </button>
					<input type="hidden" name="process" value="member_signup">
					<input type="hidden" name="upline" value="<?php echo $upline;?>">
					<input type="hidden" name="package" value="<?php echo $package_id;?>">
					<input type="hidden" name="placement" value="<?php echo $placement;?>">
					<input type="hidden" name="return" value="<?php echo $site_url;?>/">
					<?php
					}
					?>
				</div>
			</div>
			</form>
		
		</div>
		<?php
		}
		?>
	</div>

	<script type="text/javascript">
			var password = document.getElementById("password"),
			passwordconfirm = document.getElementById("confirm_password");
			
			function validatePassword() {
			  if (password.value != passwordconfirm.value) {
				$("#divCheckPasswordMatch").html("Passwords don't match!");
				$("#divCheckPasswordMatch").css("color","red");
				$("#confirm_password").css("border-color","red");
			  } else {
				$("#divCheckPasswordMatch").html("Passwords match.")
				$("#divCheckPasswordMatch").css("color","green");
				$("#confirm_password").css("border-color","green");
			  }
			}
			password.onchange = validatePassword;
			passwordconfirm.onkeyup = validatePassword;

		var calculateForm = function(){
		  document.getElementById("packageTotal").value =
		  (Number(document.getElementById("jWallet").value)+
		   Number(document.getElementById("rMoney").value)+
		   Number(document.getElementById("pvHold").value));
		};
		
	</script>

</body>
</html>
