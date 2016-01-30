<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php echo $title;?></title>
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
	<link rel="stylesheet" href="<?php echo $site_dir;?>/fonts/supermarket/stylesheet.css">

	<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>

	<!-- LOADING -
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
		<?php include("header-global.php");?>
		<!-- END HEADER -->
		
		<!-- BREAKCRUMB -->
		<section class="breakcrumb bg-grey">
			<div class="container">
				<h3 class="pull-left">Shopping <span>Cart</span></h3>
				<ul class="nav-breakcrumb  pull-right">
					<li><a href="index.html">Home</a></li>
					<li><span>Login/Register</span></li>
				</ul>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- SHOP CART -->
		<section class="shop-cart">
			<div class="container">
				<?php 
					if($basket!=null){
				?>
				<!-- TABLE CART -->
				<div class="table-cn ">
					
					<table class="table table-cart">
						<thead>
							<tr>
								<th><?php echo wordvar('Items');?></th>
								<th><?php echo wordvar('Quantity');?></th>
								<th><?php echo wordvar('UnitPrice');?></th>
								<th><?php echo wordvar('Total');?></th>
								<th><?php echo wordvar('Remove');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$sumtotal  = 0;
						isset($_SESSION['basket']) ? $basket = $_SESSION['basket'] : $basket = null;
						
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
								<td class="td-qty text-center">
									<div class="qty">
										<a class="qty-plus" href="<?php echo $site_url;?>/process?action=basket_edit&product_id=<?php echo $product_id;?>&product_qty=<?php echo $basket[$product_id]+1;?>&goto=<?php echo $site_url;?>/cart">+</a>
										<input type="text" class="input-text" value="<?php echo $basket[$product_id];?>">
										<a class="qty-minus" href="<?php echo $site_url;?>/process?action=basket_edit&product_id=<?php echo $product_id;?>&product_qty=<?php if($basket[$product_id]>1){echo $basket[$product_id]-1;}else{echo $basket[$product_id];}?>&goto=<?php echo $site_url;?>/cart">-</a>
									</div>
								</td>
								<td class="td-sub text-center">
									<?php 
									if($me_login!=null){
										echo currency($reproduct->product_price_member);
									}else{
										echo currency($reproduct->product_price);
									}
									?>
								</td>
								<td class="td-sub text-center">
									<?php 
									if($me_login!=null){
										echo currency($reproduct->product_price_member*$basket[$product_id]);
									}else{
										echo currency($reproduct->product_price*$basket[$product_id]);
									}
									?>
								</td>
								<td class="td-remove text-center">
									<a href="<?php echo $site_url;?>/process?action=basket_delete&product_id=<?php echo $product_id;?>&goto=<?php echo $site_url;?>/cart"><img src="<?php echo $site_dir;?>/images/icon-delete.png" alt=""></a>
								</td>
							</tr>
						
						<?php 
									if($me_login!=null){
										$sumtotal = $sumtotal + $reproduct->product_price_member*$basket[$product_id];
									}else{
										$sumtotal = $sumtotal + $reproduct->product_price*$basket[$product_id];
									}
						
						
						
						} // foreach
						?>

						</tbody>
						<tfoot>
							<tr class="tr-f">
								<td class="td-item">
									<h3><?php echo wordvar('Net Total');?></h3>
								</td>
								<td></td>
								<td class="td-sub text-center">
									
								</td>
								<td class="td-sub text-center">
									<h3><?php echo currency($sumtotal) ;?></h3>
								</td>
								<td></td>
							</tr>
						</tfoot>
						
					</table>
				</div>
				<!-- END TABLE CART -->
				
				<!-- CART BUTTON -->
				<div class="shop-button clearfix">
					<a href="<?php echo $site_url;?>" class="btn btn-13 pull-left"><?php echo wordvar('Continue Shipping');?></a>
					
					<?php 
					//if($me_login!=null){
						echo "<a href='$site_url/checkout' class='btn btn-13 pull-right'>".wordvar('Checkout')."</a>";
					//}else{
						//echo "<a href='' data-toggle='modal' data-target='#myLogin' class='btn btn-13 pull-right'>".wordvar('Checkout')."</a>";
					//}	
					?>

				</div>
				<!-- END CART BUTTON -->
				<?php }else{
						
						echo "<div align='center'><h3>".wordvar('Your Shopping Cart is empty')."</h3></div>";
						echo "<div align='center'><a href='$site_url' class='btn btn-success'><icon class='fa fa-shopping-cart'></icon> Shopping</a></div>";
						
							
				}?>
				<!-- CART COLLATERALS -->
				<div class="cart-collaterals hidden">
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<h2>Have a Gift Card?</h2>
							<input type="text" class="input-text" placeholder="Enter gift code...">
							<button class="btn btn-13">APPLY</button>
						</div>
						<div class="col-sm-6 col-md-4">
							<h2>Got a Coupon?</h2>
							<input type="text" class="input-text" placeholder="Enter coupon code...">
							<button class="btn btn-13">APPLY</button>
						</div>
						<div class="col-sm-12 col-md-4">
							<h2>Esitimate &amp; Tax</h2>

							<label>Country <sup>*</sup></label>
							<select>
								<option>Select Option...</option>
								<option>Afghanistan</option>
								<option>Åland Islands</option>
								<option>Albania</option>
							</select>

							<label>State/ Province<sup>*</sup></label>
							<select>
								<option>Select Option...</option>
								<option>Alabama</option>
								<option>Alaska</option>
								<option>American Samoa</option>
							</select>

							<label>State/ Province</label>
							<input type="text" class="input-text" placeholder="Select Option...">

							<button class="btn btn-13">Get a Qoute</button>

						</div>
					</div>
				</div>
				<!-- END CART COLLATERALS -->

			</div>
		</section>
		<!-- END SHOP CART -->

		<!-- PARTNER -->
		<?php include "partner.php";?>
		<!-- END PARTNER -->
		
		<!-- FOOTER -->
		<?php include('footer.php');?>
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