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

	<!-- LOADING -->
	<!--
	<div class="loading-container" id="loading">
		<div class="loading-inner">
			<span class="loading-1"></span>
			<span class="loading-2"></span>
			<span class="loading-3"></span>
		</div>
	</div>-->
	<!-- END LOADING -->

	<div class="wrap-page ">

		<!-- HEADER -->
		<?php include("header-global.php");?>
		<!-- END HEADER -->

		<!-- SLIDER -->
		<section class="slide _1">
			<div class="container">
				<?php include('slide.php');?>
			</div>
		</section>
		<!-- END SLIDER -->

		<!-- TOP PRODUCT -->
		<section class="product-featured _2">
			<div class="container">

				<div class="heading-tabs _2 ">
					<ul>
						<li class="active"><a href="#featured" data-toggle="tab"><?php echo wordvar('Featured'); ?></a></li>
					</ul>
				</div>
				
				<div class="tab-content">

					<div class="tab-pane fade active in featured" id="featured">
						<div class="featured-slide _2" data-custom="0-1,480-2,768-3,992-4,1200-5">

							<!-- GRID ITEM -->
							<?php
							if($countrycheck!="TH"){
							$product_query=mysqli_query($connect,'SELECT * FROM products where product_id != 144 ORDER BY RAND() LIMIT 10');
							}else{
							$product_query=mysqli_query($connect,'SELECT * FROM products where product_id != 144 and (product_category_id NOT LIKE "%[9]%" and product_category_id NOT LIKE "%[10]%" and product_category_id NOT LIKE "%[11]%" and product_category_id NOT LIKE "%[3]%"  and product_category_id NOT LIKE "%[13]%" and product_category_id NOT LIKE "%[12]%")  ORDER BY RAND() LIMIT 10');
							}
							while($product=mysqli_fetch_array($product_query)){
							?>
							<div class="grid-item _2 ">
								<div class="image">
									<a href="product-detail-2.html">
										<img src="<?php echo product_picture_thumb($product['product_id']);?>" style="max-height:402; max-width:270px;">
									</a>
									<div class="action">
									<?php
									if($product['product_qty']>0){
									?>
										<div class="add-cart">
											<a href="<?php echo $site_url;?>/process?action=basket_add&product_id=<?php echo $product['product_id'];?>&product_qty=1&goto=<?php echo $site_url;?>/cart" class="btn btn-14 add-cart text-uppercase"><i class="fa fa-cart-plus"></i><?php echo wordvar('Add to cart');?> </a>
										</div>
									<?php
									}else{
									?>
										<div class="add-cart">
											<a href="#" class="btn btn-2 add-cart text-uppercase" style="background-color:red; border:1px red solid" disabled><i class="fa fa-cart-plus"></i><?php echo wordvar('Sold Out');?> </a>
										</div>
									<?php
									}
									?>
										<div class="add-cart">
											<a href="<?php echo $site_url.'/'.$product['product_url'];?>" class="btn btn-14"><i class="fa fa-eye"></i><?php echo wordvar('View Product');?></a>
										</div>
									</div>
								</div>
								<div class="text">
									<h2 class="name">
										<a href="product-detail-2.html"><?php echo $product['product_name']; ?></a>	
									</h2>	
									<div class="price-box"> 
	                                  	<p class="special-price">
	                                   		<span class="price">
											<?php 
											if($me_login==null){
												echo currency($product['product_price']);
											}else{
												echo currency($product['product_price_member']);
												echo "  ( PV : ".$product['product_point']." )";
											}
											?>
											</span> 
	                                  	</p>   
		                          	</div>
								</div>
							</div>
							<?php
							}
							?>
							<!-- END GRID ITEM -->

							
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- END TOP PRODUCT -->

		<!-- BANNER -->
		<section class="banner hidden">
			<div class="container">
				<div class="row">

					<div class="col-sm-6">
						<div class="banner-item">
							<a href="#"><img src="<?php echo $site_dir;?>/images/banner/img-19.jpg" alt=""></a>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="banner-item">
							<a href="#"><img src="<?php echo $site_dir;?>/images/banner/img-20.jpg" alt=""></a>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- BANNER -->
		
		<!-- NEW ARRIVALS -->	
		<section class="new-arrivals _2">
			<div class="container">	

				<div class="heading _2">
					<h2 class="text-uppercase"><?php echo wordvar('New Arrivals');?></h2>
				</div>
				<div class="new-arrivals-cn _2">
					<div class="row">
						<?php
						//echo $getdetails->country;
						
						if($countrycheck!="TH"){
							$product_query=mysqli_query($connect,'SELECT * FROM products where product_id != 144 ORDER BY RAND() LIMIT 0,10');
						}else{
							$product_query=mysqli_query($connect,'SELECT * FROM products where product_id != 144 and (product_category_id NOT LIKE "%[9]%" and product_category_id NOT LIKE "%[10]%" and product_category_id NOT LIKE "%[11]%" and product_category_id NOT LIKE "%[3]%"  and product_category_id NOT LIKE "%[13]%"  and product_category_id NOT LIKE "%[12]%") ORDER BY RAND() LIMIT 0,10');
						}
						
						while($product=mysqli_fetch_array($product_query)){
						?>	
						<div class="col-xs-6 col-sm-4 col-md-3" style="width:20%;">
							<!-- GRID ITEM -->
							<div class="grid-item _2 ">
								<div class="image">
									<a href="product-detail-2.html">
										<img src="<?php echo product_picture_thumb($product['product_id']);?>" style="max-height:402; max-width:270px">
									</a>
									<div class="action">
									<?php
									if($product['product_qty']>0){
									?>
										<div class="add-cart">
											<a href="<?php echo $site_url;?>/process?action=basket_add&product_id=<?php echo $product['product_id'];?>&product_qty=1&goto=<?php echo $site_url;?>/cart" class="btn btn-14 add-cart text-uppercase"><i class="fa fa-cart-plus"></i><?php echo wordvar('Add to cart');?> </a>
										</div>
									<?php
									}else{
									?>
										<div class="add-cart">
											<a href="#" class="btn btn-2 add-cart text-uppercase" style="background-color:red; border:1px red solid" disabled><i class="fa fa-cart-plus"></i><?php echo wordvar('Sold Out');?> </a>
										</div>
									<?php
									}
									?>
										<div class="add-cart">
											<a href="<?php echo $site_url.'/'.$product['product_url'];?>" class="btn btn-14"><i class="fa fa-eye"></i><?php echo wordvar('View Product');?></a>
										</div>
									</div>
								</div>
								<div class="text">
									<h2 class="name">
										<a href="product-detail-2.html"><?php echo $product['product_name'];?></a>	
									</h2>	
									<div class="price-box"> 
	                                  	<p class="special-price">
	                                   		<span class="price">
											<?php 
											if($me_login==null){
												echo currency($product['product_price']);
											}else{
												echo currency($product['product_price_member']);
												echo "  ( PV : ".$product['product_point']." )";
											}
											?>
											</span> 
	                                  	</p>   
		                          	</div>
								</div>
							</div>
							<!-- END GRID ITEM -->
						</div>
						<?php
						}
						?>
					</div>
				</div>

			</div>
		</section>
		<!-- END NEW ARRIVALS -->	

		<!-- SHIPPING -->
		<?php include "shipping.php"?>
		<!-- END SHIPPING -->

		<!-- PARTNER -->
		<?php include "partner.php";?>
		<!-- END PARTNER -->

		<!-- FOOTER -->
		<?php include "footer.php";?>
		<!-- END FOOTER -->

		<!-- SCROLL TOP -->
		<div id="scroll-top" class="_2">Scroll Top</div>
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
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5629b3bcac59c79e109bd008/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
</body>
</html>