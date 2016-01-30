<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php echo wordvar('Check Out');?></title>
	<meta name="description" content="<?php echo $description;?>">
	<meta name="keywords" content="<?php echo $keyword;?>">
	<meta property="og:site_name" content="<?php echo $title;?>"/>
	<meta property="og:title" content="<?php echo $title;?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="<?php echo $urlweb;?>"/>
	<meta property="og:image" content="<?php echo $imageurl;?>"/>
	<meta property="og:locale" content="th_TH"/>
	<meta property="og:description" content="<?php echo $description;?>"/>
	<meta name="author" content="Jinuemall Thailand">
	<meta name="stats-in-th" content="ab47" />
	<!-- Library CSS -->
	<link rel="stylesheet" href="<?php echo $site_dir;?>/css/library/font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site_dir;?>/css/library/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $site_dir;?>/css/library/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo $site_dir;?>/css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="<?php echo $site_dir;?>/css/library/jquery.fancybox.css">
	
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="<?php echo $site_dir;?>/css/style.css">
	<link rel="stylesheet" href="<?php echo $site_dir;?>/css/color-green.css">
	
	<script type='text/javascript'>
	
		
		function loadLogin(){
			
			/*
			<?php
			if($me_login==null){
			?>
			$(document).ready(function(){
				$("#myLogin_private").modal({backdrop: "static"});
			});
			<?php }?>
			*/
			document.getElementById("checkatshop").checked = true;
			document.getElementById("DIVatshop").className = "btn-group btn btn-success";
		}

			
		function checkatshop(){
			document.getElementById("checkatshop").checked = true;
			document.getElementById("checkatems").checked = false;
			document.getElementById("DIVatshop").className = "btn-group btn btn-success";
			document.getElementById("DIVatems").className = "btn-group btn btn-default";
		}
		
		function checkatems(){
			document.getElementById("checkatshop").checked = false;
			document.getElementById("checkatems").checked = true;
			document.getElementById("DIVatshop").className = "btn-group btn btn-default";
			document.getElementById("DIVatems").className = "btn-group btn btn-success";
			$("#myEMS").modal({backdrop: "static"});
			
		}
    </script>
	<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body onload="loadLogin();">
	<!-- LOADING -->
	<div class="loading-container" id="loading">
		<div class="loading-inner">
			<span class="loading-1"></span>
			<span class="loading-2"></span>
			<span class="loading-3"></span>
		</div>
	</div>
	<!-- END LOADING -->

	<div class="wrap-page">

		<!-- HEADER -->
		<?php include "header-global.php";?>
		<!-- END HEADER -->
		
		<!-- BREAKCRUMB -->
		<section class="breakcrumb bg-grey">
			<div class="container">
				<h3 class="pull-left">Checkout <span>Cart</span></h3>
				<ul class="nav-breakcrumb  pull-right">
					<li><a href="index.html">Home</a></li>
					<li><span>Checkout</span></li>
				</ul>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- CHECK OUT -->
		<section class="check-out">
			<div class="container">
				<?php 
					if($basket!=null){
				?>
				<div class="check-out-cn">
					
					<!-- STEP CHECK OUT -->
					<ul class="check-out-step text-uppercase ">
						<li data-step="1"><span>Checkout Method</span></li>
						<li data-step="2"  class="current"><span>Billing Information</span></li>
						<li data-step="3"><span>Payment Information</span></li>
						<li data-step="4"><span>ORDER SUMMARY</span></li>
					</ul>
					<!-- END STEP CHECK OUT -->
					
					<!-- CHECK OUT FORM -->
					<form action="<?php echo $site_url;?>/checkout2" method="post">
					<div class="form check-out-form">
						<div class="row">
							<div class="col-xs-6">
								<label><?php echo wordvar('Name');?> <sup>*</sup></label>
								<input type="text" name="billing_name"  id="billing_name" value="<?php echo $me_name;?>" class="input-text" required>
							</div>
							<div class="col-xs-6">
								<label><?php echo wordvar('Surname');?><sup>*</sup></label>
								<input type="text" name="billing_surname"  id="billing_surname" value="<?php echo $me_surname;?>" class="input-text" required>
							</div>
							<div class="col-xs-12">
								<label><?php echo wordvar('Address');?><sup>*</sup></label>
								<input type="text"  name="billing_address"  id="billing_address" value="<?php echo $me_address;?>" class="input-text" required>
							</div>
							<div class="col-xs-6">
								<label><?php echo wordvar('City');?></label>
								<input type="text" name="billing_city"  id="billing_city" value="<?php echo $me_city;?>" class="input-text" required>
							</div>	
							<div class="col-xs-6">
								<label><?php echo wordvar('phone');?></label>
								<input type="text" name="billing_phone"  id="billing_phone" value="<?php echo $me_phone;?>" class="input-text" required>
							</div>	
							<div class="col-xs-6">
								<label><?php echo wordvar('Country');?><sup>*</sup></label>
								<select name="billing_country" class="input-text" required>
									<option value="1"><?php echo wordvar('Select Country');?>
									<?php
									
										$sqlcountry2 = mysqli_query($connect,"SELECT * from country ");
										while($recountry2 = mysqli_fetch_object($sqlcountry2)){
											
											if($getdetails->country==$recountry2->country_code){
												$countryselect2 = "selected";
											}else{
												$countryselect2 = "";
											}
											
											echo "<option value='$recountry2->country_id' $countryselect2>$recountry2->country";
										}
									?>
								</select>
							</div>
							<div class="col-xs-6">
								<label><?php echo wordvar('Zipcode');?><sup>*</sup></label>
								<input type="text" name="billing_zipcode"  id="billing_zipcode" value="<?php echo $me_zipcode;?>" class="input-text" required>
							</div>
							<?php if($me_login==null){?>
							<div class="col-xs-12" style="margin-bottom:20px;">
								<div class="col-xs-12" id="username_check_status" style="margin-top:5px; margin-bottom:5px;">
								<label for="username_check">Username <span id="result" ></span></label>
								  <input id="signup_username" class="form-control col-md-12" placeholder="เช่น thesuccess , apple01" type="text" name="signup_username" required> 
								</div>
								<div class="col-xs-12" id="password_check" style="margin-top:5px; margin-bottom:5px;">
									<label for="tel">Password</label>
									  <input class="form-control col-md-12" placeholder="<?php echo wordvar('Password');?>" type="text" name="signup_password" id="signup_password" value="<?php echo rand(999,9999);?>" required>
								</div>
								<div class="col-xs-12" id="password_confirm" style="margin-top:5px; margin-bottom:15px;">
									<label for="tel">Confirm Password</label>
									  <input class="form-control col-md-12" placeholder="<?php echo wordvar('Confirm Password');?>" type="text" name="signup_password_confirm" id="signup_password_confirm" value="" required>
								</div>
							
							
							</div>
							
							<?php }?>
	
							
							<div class="col-xs-12">
								<div class="panel panel-default">
									<div class="panel-heading"><b>Shipping Address</b></div>
									<div class="panel-body">
											<div type="button" class="btn-group btn btn-default" id="DIVatshop" onclick="checkatshop();">
											<span class="fa fa-shopping-bag"></span>
											<input type="checkbox" name="shipping_method" id="checkatshop" value="at-shop" style="width: 20px; display:none;"/>   <?php echo wordvar('AT SHOP');?>
											</div>
											
											<div class="btn-group btn btn-default" id="DIVatems" onclick="checkatems();">
											<span class="fa fa-send"></span>
											<input type="checkbox" name="shipping_method" id="checkatems" value="ems" style="width: 20px; display:none;"/>   <?php echo wordvar('EMS');?>
											</div>
									</div>
								</div>
							
							</div>
							<hr/>
							<div class="col-xs-12">
								<input type="submit" class="btn btn-success text-uppercase pull-right" value="Next Step"/>
							</div>
							
							
						</div>
					</div>
					
					
					<!--Modal Login Private-->
						<div class="modal fade" id="myEMS">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title"><?php echo wordvar('Shipping Address');?></h4>
							  </div>
								<form  name="frm" method="POST" action="" enctype="multipart/form-data">
								<div class="modal-body">
										<div class="checkbox-holder" >
										   <input type="checkbox" name="shipping_detail" value="same" class="-iCheck"  id="iCheck" > Check this if the Billing address is the same as Shipping address
										</div>
										<div class="input-group input-group" style="padding:5px;">
											<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-user"></icon></span>
											<input type="text" name="shipping_name" id="shipping_name" class="form-control" placeholder="<?php echo wordvar('Name');?>" />
										</div>
										<div class="input-group input-group" style="padding:5px;"> 
											<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-user"></icon></span>
											<input type="text" name="shipping_surname" id="shipping_surname" class="form-control" placeholder="<?php echo wordvar('Surname');?>"  />
										</div>
										<div class="input-group input-group" style="padding:5px;"> 
											<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-home"></icon></span>
											<input type="text" name="shipping_address" id="shipping_address" class="form-control" placeholder="<?php echo wordvar('Address');?>"  />
										</div>
										<div class="input-group input-group" style="padding:5px;"> 
											<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-phone"></icon></span>
											<input type="text" name="shipping_phone" id="shipping_phone" class="form-control" placeholder="<?php echo wordvar('Tel');?>"  />
										</div>
										<div class="input-group input-group" style="padding:5px;"> 
											<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-globe"></icon></span>
											<input type="text" name="shipping_city" id="shipping_city" class="form-control" placeholder="<?php echo wordvar('City');?>"  />
										</div>
										<div class="input-group input-group" style="padding:5px;"> 
											<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-globe"></icon></span>
											<select name="shipping_country" class="form-control" >
													<option value="1"><?php echo wordvar('Select Country');?>
													<?php
													$sqlcountry = mysqli_query($connect,"SELECT * from country ");
													while($recountry = mysqli_fetch_object($sqlcountry)){
														
														if($getdetails->country==$recountry->country_code){
															$countryselect = "selected";
														}else{
															$countryselect = "";
														}
														
														
														echo "<option value='$recountry->country_id' $countryselect>$recountry->country";
													}
													?>
											</select>
										</div>
										<div class="input-group input-group" style="padding:5px;"> 
											<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-globe"></icon></span>
											<input type="text" name="shipping_zipcode" id="shipping_zipcode" class="form-control" placeholder="<?php echo wordvar('Zipcode');?>"  />
										</div>
								
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo wordvar('Finish');?></button>
							  </div>
							  </form>
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					
						
					
					</form>
					<!-- END CHECK OUT FORM -->
							
				</div>
				<?php }else{
						
						echo "<div align='center'><h3>".wordvar('Your Shopping Cart is empty')."</h3></div>";
						echo "<div align='center'><a href='$site_url' class='btn btn-success'><icon class='fa fa-shopping-cart'></icon> Shopping</a></div>";
						
							
				}?>
				
				
			</div><!--connianer-->
		</section>
		<!-- END CHECK OUT -->

		<!-- PARTNER -->
		<?php include "partner.php";?>
		<!-- END PARTNER -->
		
		<!-- FOOTER -->
		<?php include "footer.php";?>
		<!-- END FOOTER -->

		<!-- SCROLL TOP -->
		<div id="scroll-top" class="_1">Scroll Top</div>
		<!-- END SCROLL TOP -->

	</div>

	<!-- Library JS -->
	<script src="<?php echo $site_dir;?>/js/library/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_system;?>/scripts.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/owl.carousel.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/parallax.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery.countdown.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery.mb.YTPlayer.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery.responsiveTabs.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery.fancybox.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/SmoothScroll.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/isotope.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery.colio.min.js" type="text/javascript"></script>

	<!-- Main Js -->
	<script src="<?php echo $site_dir;?>/js/script.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			$("#iCheck").click(function(){
				if ($(this).is(":checked")){
					$('#shipping_name').val($('#billing_name').val());
					//$('#shipping_name').prop('disabled', true);
					$('#shipping_surname').val($('#billing_surname').val());
					//$('#shipping_surname').prop('disabled', true);
					$('#shipping_phone').val($('#billing_phone').val());
					//$('#shipping_phone').prop('disabled', true);
					$('#shipping_address').val($('#billing_address').val());
					//$('#shipping_address').prop('disabled', true);
					$('#shipping_city').val($('#billing_city').val());
					//$('#shipping_city').prop('disabled', true);
					$('#shipping_country').val($('#billing_country').val());
					//$('#shipping_country').prop('disabled', true);
					$('#shipping_zipcode').val($('#billing_zipcode').val());
					//$('#shipping_zipcode').prop('disabled', true);
				}else{
					$('#shipping_name').val(" ");
					$('#shipping_surname').val(" ");
					$('#shipping_phone').val(" ");
					$('#shipping_address').val(" ");
					$('#shipping_city').val(" ");
					$('#shipping_country').val(" ");
					$('#shipping_zipcode').val(" ");
				}
			});
			
		});
		</script>
</body>
</html>