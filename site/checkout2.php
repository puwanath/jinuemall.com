<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Payment Information</title>
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
			<?php 
			 if(isset($_REQUEST['billing_name'])==null){
			?>
			window.location.assign("http://www.jinuemall.com/checkout");
			<?php
			}
			?>	
			/*<?php
			if($me_login==null){
			?>
			$(document).ready(function(){
				$("#myLogin_private").modal({backdrop: "static"});
			});
			<?php }?>*/
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
	<?php
	isset($_REQUEST['atems'])?$atems=$_REQUEST['atems'] : $atems=null;
	isset($_REQUEST['shipping_name'])?$shipping_name=$_REQUEST['shipping_name'] : $shipping_name=null;
	if($shipping_name!=null){
		$css = "col-md-6";
		$hidden = "";
	}else{
		$css = "col-md-12";
		$hidden = "hidden";
	}
	?>
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
						<li data-step="2" ><span>Billing Information</span></li>
						<li data-step="3" class="current"><span>Payment Information</span></li>
						<li data-step="4"><span>ORDER SUMMARY</span></li>
					</ul>
					<!-- END STEP CHECK OUT -->
					<form action="<?php echo $site_url;?>/process" method="post">
					<!-- CHECK OUT FORM -->
					<div class="form check-out-form" style="padding:20px;">
						<div class="row">
							<div class="<?php echo $css;?>">
								<div class="panel panel-default">
									<div class="panel-heading"><b>Billing Address</b></div>
									<div class="panel-body">
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="billing_name"  id="billing_name" value="<?php if(isset($_REQUEST['billing_name'])) echo $_REQUEST['billing_name']; ?>" placeholder="Name" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="billing_surname"  id="billing_surname" value="<?php if(isset($_REQUEST['billing_surname'])) echo $_REQUEST['billing_surname']; ?>" placeholder="Surname" readonly>
										  </div>
										  <div class="col-xs-12 col-sm-12" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="billing_address"  id="billing_address" value="<?php if(isset($_REQUEST['billing_address'])) echo $_REQUEST['billing_address']; ?>" placeholder="Address" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="billing_city"  id="billing_city" value="<?php if(isset($_REQUEST['billing_city'])) echo $_REQUEST['billing_city']; ?>" placeholder="City" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="billing_country"  id="billing_country" value="<?php if(isset($_REQUEST['billing_country'])) echo $_REQUEST['billing_country']; ?>" placeholder="Country" readonly style="display : none;">
											<input class="form-control" type="text" name="billing_country"  id="billing_country" value="<?php  if(isset($_REQUEST['billing_country'])) {echo selectname('country','country','country_id',$_REQUEST['billing_country']);}?>" placeholder="Country" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="billing_zipcode"  id="billing_zipcde" value="<?php if(isset($_REQUEST['billing_zipcode'])) echo $_REQUEST['billing_zipcode']; ?>" placeholder="Zipcode" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="billing_phone"  id="billing_phone" value="<?php if(isset($_REQUEST['billing_phone'])) echo $_REQUEST['billing_phone']; ?>" placeholder="phone" readonly>
										  </div>
									</div>
								</div>
							</div>
									
							<div class="col-md-6 <?php echo $hidden;?>">
								<div class="panel panel-default">
									<div class="panel-heading"><b>Shipping Address</b></div>
									<div class="panel-body">
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="shipping_name"  id="shipping_name" value="<?php if(isset($_REQUEST['shipping_name'])) echo $_REQUEST['shipping_name']; ?>" placeholder="Name" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="shipping_surname"  id="shipping_surname" value="<?php if(isset($_REQUEST['shipping_surname'])) echo $_REQUEST['shipping_surname']; ?>" placeholder="Surname" readonly>
										  </div>
										  <div class="col-xs-12 col-sm-12" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="shipping_address"  id="shipping_address" value="<?php if(isset($_REQUEST['shipping_address'])) echo $_REQUEST['shipping_address']; ?>" placeholder="Address" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="shipping_city"  id="shipping_city" value="<?php if(isset($_REQUEST['shipping_city'])) echo $_REQUEST['shipping_city']; ?>" placeholder="City" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="shipping_country"  id="shipping_country" value="<?php if(isset($_REQUEST['shipping_country'])) echo $_REQUEST['shipping_country']; ?>" style="display : none;">
											<input class="form-control" type="text"  id="shipping_country" value="<?php  if(isset($_REQUEST['shipping_country'])) {echo selectname('country','country','country_id',$_REQUEST['shipping_country']);}?>" placeholder="Country" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="shipping_zipcode"  id="shipping_zipcode" value="<?php if(isset($_REQUEST['shipping_zipcode'])) echo $_REQUEST['shipping_zipcode']; ?>" placeholder="Zipcode" readonly>
										  </div>
										  <div class="col-xs-6 col-sm-6" style="margin-bottom:5px;">
											<input class="form-control" type="text" name="shipping_phone"  id="shipping_phone" value="<?php if(isset($_REQUEST['shipping_phone'])) echo $_REQUEST['shipping_phone']; ?>" placeholder="Phone" readonly>
										  </div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><b><?php echo wordvar('Product Decription');?></b></div>
								<div class="panel-body">
								<div class="table-cn " style="margin-bottom:20px;">
									<table class="table table-cart">
										<thead>
											<tr>
												<th><?php echo wordvar('Items');?></th>
												<th><?php echo wordvar('PV');?></th>
												<th><?php echo wordvar('Quantity');?></th>
												<th><?php echo wordvar('Unit Price');?></th>
												<th><?php echo wordvar('Total');?></th>
											</tr>
										</thead>
										<tbody>
										<?php
										$sumtotal  = 0;
										$sumpv = 0;
										$nettotal = 0;
										$shipping_cost = 0;
										$weight = 0;
										isset($_SESSION['basket']) ? $basket = $_SESSION['basket'] : $basket = null;
										if($basket!=null){
											foreach($basket as $product_id => $product_qty){
										 $product = "SELECT * from products where product_id = '$product_id'";
										 $qproduct = mysqli_query($connect,$product);
										 $reproduct = mysqli_fetch_object($qproduct);
										 $product_id = $reproduct->product_id;
										

										?>
											<tr>
												<td class="td-item">
													<div class="img" >
														<a href="#">
															<img src="<?php echo product_picture_thumb($product_id);?>" alt="" width="150">
														</a>
													</div>
													<div class="info">
														<a href="#"><?php echo $reproduct->product_name;?></a>
														<p><?php echo $reproduct->product_description;?></p>
													</div>
												</td>
												<td class="td-remove text-center">
													<?php echo ($reproduct->product_point); ?>
												</td>
												<td class="td-qty text-center">
													<div class="qty">
														<?php echo $basket[$product_id];?>
													</div>
												</td>
												<td class="text-center">
													<?php 
													if($me_login!=null){
														echo currency($reproduct->product_price_member);
													}else{
														echo currency($reproduct->product_price);
													}
													?>
												</td>
												<td class="text-center">
													<?php 
													if($me_login!=null){
														echo currency($reproduct->product_price_member*$basket[$product_id]);
													}else{
														echo currency($reproduct->product_price*$basket[$product_id]);
													}
													?>
												</td>
											</tr>
										
										<?php 
													if($me_login!=null){
														$sumtotal = $sumtotal + $reproduct->product_price_member*$basket[$product_id];
													}else{
														$sumtotal = $sumtotal + $reproduct->product_price*$basket[$product_id];
													}
													$sumpv +=  $reproduct->product_point*$basket[$product_id];
													$nettotal = $sumtotal;
													$weight+=$reproduct->product_weight*$basket[$product_id];
													
										} // foreach
										}?>
										</tbody>
									</table>
								</div> <!-- div table -->
								</div> <!-- div panal Body -->
								</div> <!-- div panal default -->
								<div class="panel panel-default">
								  <div class="panel-body" style="text-align:right; font-size:20px">
									 Total : <?php echo currency($sumtotal);?> </span> <br>
								  </div>
								</div>
								<div class="panel panel-default <?php if($me_login==null) echo "hidden"; ?>">
								  <div class="panel-body" style="text-align:right; font-size:20px">
									Total PV : <?php echo $sumpv;?> <br>
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-body" style="text-align:right; font-size:20px">
								  <?php 
									isset($_REQUEST['shipping_country'])?$country_id=$_REQUEST['shipping_country'] : $country_id=null;
									$weight;
								  ?>
									Shipping Cost : <?php if($atems==null){ echo $shipping_cost=0; }else{ $shipping_cost=shipping_cost($country_id,$weight); echo  currency($shipping_cost); } ?> <br>
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-body" style="text-align:right; font-size:20px">
									Net total : <?php $total_withcost = $nettotal+$shipping_cost; echo currency($total_withcost);?> <br>
								  </div>
								</div>
							</div> <!-- div col 12 -->
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading"><b>Additional Comments</b></div>
									<div class="panel-body">
										<div class="comment-holder" align="center">
										<textarea name="order_comment"  placeholder="<?php echo wordvar('Your Comment Here');?>" style="width:95%; height:256.5px; padding:10px; border:1px #DDDDDD solid;"></textarea>
									</div>
									</div>
								</div>
							</div> 
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading"><b>Payment Method</b></div>
									<div class="panel-body">
									
										
										<?php
										if($me_login!=null){
										?>
										<label class="radio" for="jWallet" >
										<div class="panel panel-default" style="padding:6px;">
										  <div class="panel-body">
											<input type="radio" id="jWallet" name="payment_method" <?php if($me_jwallet>=$nettotal){ echo "checked"; }else{ echo "disabled";}?> value="jWallet" style="position:inherit; margin-left:0px;"> <?php echo wordvar('jWallet');?> : <span style="float:right;"><?php echo currency($me_jwallet*1);?></span>
										  </div>
										</div>
										</label>
										<label class="radio" for="rMoney" >
										<div class="panel panel-default" style="padding:6px;">
										  <div class="panel-body">
											<input type="radio" id="rMoney" name="payment_method" <?php if($me_rmoney>=$nettotal){ echo "checked"; }else{ echo "disabled";}?> value="rMoney" style="position:inherit; margin-left:0px;"> <?php echo wordvar('rMoney');?> : <span style="float:right;"><?php echo currency($me_rmoney*1);?>
											</span>
										  </div>
										</div>
										</label>
										<label class="radio" for="jWallet_rMoney" >
										<div class="panel panel-default" style="padding:6px;">
										  <div class="panel-body">
										  <input type="radio" id="jWallet_rMoney" name="payment_method" <?php if(($me_rmoney + $me_jwallet)>=$nettotal){ echo "checked"; }else{ echo "disabled";}?> value="jWallet_rMoney" style="position:inherit; margin-left:0px;"> <?php echo wordvar('jWallet + rMoney');?> : <span style="float:right;"><?php echo currency($me_rmoney+$me_jwallet);?></span>
										  </span>
										  </div>
										</div>
										</label>


										<?php
										}else{
										?>
										  <div><img src="<?php echo $site_dir;?>/images/account.jpg" width="100%"/></div>

										<?php
										}
										?>
									
										
									</div>
								</div>
							</div> 
									<div class="col-md-12">
									<?php 
									if($wallet<$total_withcost){
									?>
									<a href="<?php echo $site_url;?>/refillwallet" class="btn text-uppercase" style="float:right; background-color:#00cc99; color:#FFF; font-weight: 600;"><i class="fa fa-cart-plus"></i> <span><?php echo wordvar('Refill Wallet');?></span></a>
									<?php
									}else{
									?>
									<button type="submit" class="btn text-uppercase" style="float:right; background-color:#00cc99; font-weight: 600;"><i class="fa fa-cart-plus"></i> <span><?php echo wordvar('Confirm Order');?></span></button>
									<?php 
									}
									
									?>
				                	
									<input type="hidden" name="shipping_method" value="<?php if(isset($_REQUEST['shipping_method'])) echo $_REQUEST['shipping_method']; ?>">
									<input type="hidden" name="action" value="order_confirm">
									<input type="hidden" name="goto" value="<?php echo $site_url;?>/checkout3">
									</div>
						</div> <!-- div row -->
					</form>
					</div>	<!-- END CHECK OUT FORM -->	
				</div> <!-- END CHECK OUT CN -->
				
				<?php }else{
						
						echo "<div align='center'><h3>".wordvar('Your Shopping Cart is empty')."</h3></div>";
						echo "<div align='center'><a href='$site_url' class='btn btn-success'><icon class='fa fa-shopping-cart'></icon> Shopping</a></div>";
						
							
				}?>
				
			</div> <!---->
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
</body>
</html>