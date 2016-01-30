<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php echo wordvar('Product Category');?></title>
	<meta name="description" content="<?php echo strip_tags($description);?>">
	<meta name="keywords" content="<?php echo strip_tags($keyword);?>">
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

	<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>

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
		<?php include("header-global.php");?>
		<!-- END HEADER -->

		<!-- BREAKCRUMB -->
		<section class="breakcrumb bg-grey">
			<div class="container">
				<h3 class="pull-left"><span><?php echo strtoupper($uri[0]);?></span></h3>
				<?php
					if($uri[0]=="decello"){
					?>
					&nbsp;&nbsp;e-Book :
					<span><a href="http://decello.co.kr/ebook/jp/" target="_blank" title="Ebook Jpan"><img src="<?php echo $site_dir;?>/images/flags/Japan.png"  width="24"/></a></span>
					<span><a href="http://decello.co.kr/ebook/en/" target="_blank" title="Ebook Englist"><img src="<?php echo $site_dir;?>/images/flags/usa.png" width="24"/></a></span>
					<span><a href="http://decello.co.kr/ebook/ve/" target="_blank" title="Ebook Viet Nam"><img src="<?php echo $site_dir;?>/images/flags/Viet Nam.png" width="24"/></a></span>
					<span><a href="http://decello.co.kr/ebook/ch/" target="_blank" title="Ebook Jpan"><img src="<?php echo $site_dir;?>/images/flags/China.png" width="24"/></a></span>
					
					<?php
					}
					?>
				<ul class="nav-breakcrumb  pull-right">
					<li><a href="/">Home</a></li>
					<li><span><?php echo $uri[0];?></span></li>
					
				</ul>
			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- PRODUCT LIST -->
		<section class="product-grid">
			<div class="container">

				<!-- SUB BANNER 
				<div class="sub-banner">
					<div class="item">
						<div class="img">
							<a href="#">
								<img src="images/banner/img-4.jpg" alt="">
							</a>
						</div>
					</div>
				</div>
				<!-- END SUB BANNER -->

				<!-- TOP FILTER -->
				<div class="top-filter text-center clearfix hidden">
					
					<div class="pull-left">

						<!-- VIEW -->
						<div class="view  pull-left">
							<a href="product-grid-1.html" class="view-grid active">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
									<path d="M8,8H0V0h8V8z M1,7h6V1H1V7z"/>
									<path d="M19,8h-8V0h8V8z M12,7h6V1h-6V7z"/>
									<path d="M8,19H0v-8h8V19z M1,18h6v-6H1V18z"/>
									<path d="M19,19h-8v-8h8V19z M12,18h6v-6h-6V18z"/>
								</svg>
							</a>
							<a href="product-list-1.html" class="view-list">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18px" height="19px" viewBox="0 0 18 19" enable-background="new 0 0 18 19" xml:space="preserve">
									<path d="M8,8H0V0h8V8z M1,7h6V1H1V7z"/>
									<rect x="10" width="8" height="1"/>
									<rect x="10" y="3" width="8" height="1"/>
									<rect x="10" y="6" width="6" height="1"/>
									<path d="M8,19H0v-8h8V19z M1,18h6v-6H1V18z"/>
									<rect x="10" y="11" width="8" height="1"/>
									<rect x="10" y="14" width="8" height="1"/>
									<rect x="10" y="17" width="6" height="1"/>
								</svg>
							</a>
						</div>
						<!-- END VIEW -->

					</div>
					
					<div class="group pull-left">

						<!-- SORT BY -->
						<div class="sort filter-select pull-left">
							<label for="sort">
								Sort by:
								<select id="sort">
									<option>Position</option>
									<option value="1">Price</option>
									<option value="2">Rating</option>
								</select>
							</label>
						</div>
						<!-- END SORT BY -->

						<!-- FILTER -->
						<div class="filter  pull-left" id="filter-grid">
							<label class="filter-head">Filter by</label>
						</div>
						<!-- END FILTER -->

					</div>

					<div class="pull-right">

						<!-- SHOW PAGE -->
						<div class="show-page filter-select pull-left">
							<label for="show-page">
								Show:
								<select id="show-page">
									<option>12</option>
									<option value="1">16</option>
									<option value="2">20</option>
								</select>
							</label>
						</div>
						<!-- END SHOW PAGE -->

						<!-- PAGING -->
						<ul class="paging-p  _1 pull-left">
							<li class="current"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li class="last"><a href="#"></a></li>
						</ul>
						<!-- END PAGING -->
					</div>

					<!-- FILTER CONTENT -->
					<div class="filter-cn  text-left" id="filter-cn-grid">
						<div class="row">

							<div class="col-xs-6 col-lg-3">
								<h2 class="filter-title">By Categories</h2>
								<ul class="filter-cat">
									<li><a href="#">Party Dress</a></li>
									<li><a href="#">Jean &amp; Trousers</a></li>
									<li><a href="#">Jacket &amp; Coats</a></li>
									<li><a href="#">Sweaters</a></li>
									<li><a href="#">Sports &amp; Lifestyle</a></li>
								</ul>
							</div>
							
							<div class="col-xs-6 col-lg-3">
								<h2 class="filter-title">By Prices</h2>
								<div class="sidebar-slider ">
									<div class="slider">
										<div id="slider"></div>
										<div class="slider-g">
											<span class="price-value" id="price-f"></span>
											<span class="price-value" id="price-t"></span>
											<button class="btn-filter">Filter</button>
										</div>
									</div>
								</div>
							</div>

							<div class="visible-xs visible-sm visible-md clear"></div>

							<div class="col-xs-6 col-lg-3">
								<h2 class="filter-title">By Color</h2>
								<div class="sidebar-color">
									<ul class="nav-color">
										<li class="_1"><a href="#"></a></li>
										<li class="_2"><a href="#"></a></li>
										<li class="_3"><a href="#"></a></li>
										<li class="_4"><a href="#"></a></li>
										<li class="_5"><a href="#"></a></li>
										<li class="_6"><a href="#"></a></li>
										<li class="_7"><a href="#"></a></li>
										<li class="_8"><a href="#"></a></li>
										<li class="_9"><a href="#"></a></li>
										<li class="_10"><a href="#"></a></li>
									</ul>
								</div>
							</div>

							<div class="col-xs-6 col-lg-3">
								<h2 class="filter-title">By Size</h2>
								<ul class="nav-cat">
									<li>
										<div class="check-box">
											<input type="checkbox" class="checkbox" id="size-1">
											<label for="size-1">XL <span>(212)</span></label>
										</div>
									</li>
									<li>
										<div class="check-box">
											<input type="checkbox" class="checkbox" id="size-2">
											<label for="size-2">S <span>(212)</span></label>
										</div>
									</li>
									<li>
										<div class="check-box">
											<input type="checkbox" class="checkbox" id="size-3">
											<label for="size-3">XS <span>(212)</span></label>
										</div>
									</li>
									<li>
										<div class="check-box">
											<input type="checkbox" class="checkbox" id="size-4">
											<label for="size-4">M <span>(212)</span></label>
										</div>
									</li>
									<li>
										<div class="check-box">
											<input type="checkbox" class="checkbox" id="size-5">
											<label for="size-5">XXL <span>(212)</span></label>
										</div>
									</li>
									<li>
										<div class="check-box">
											<input type="checkbox" class="checkbox" id="size-6">
											<label for="size-6">L <span>(212)</span></label>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>
					<!-- END FILTER CONTENT -->
				</div>
				<!-- END TOP FILTER -->

				<!-- GRID CONTENT -->
				<div class="grid-cn-1">
					<div class="row">
						<?php
							$product_query=mysqli_query($connect,'SELECT * FROM products WHERE product_category_id LIKE "%['.$category_result['product_category_id'].']%"');
							while($product=mysqli_fetch_array($product_query)){
						?>
						<div class="col-xs-6 col-sm-4 col-md-3"  style="width:20%;">
							<!-- GRID ITEM -->
							<div class="grid-item _1 ">

								<div class="image">

									<a href="<?php echo $site_url.'/'.$product['product_url'];?>">
										<img src="<?php echo product_picture_thumb($product['product_id']);?>" style="max-width:270px; max-height: 405px">
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
											<a href="#" class="btn btn-2 add-cart text-uppercase" style="background-color:red; border:1px red solid; width:136.5px;" disabled><i class="fa fa-cart-plus"></i><?php echo wordvar('Sold Out');?> </a>
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
										<a href="<?php echo $site_url.'/'.$product['product_url'];?>"><?php echo $product['product_name'];?></a>	
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
				<!-- END GRID CONTENT -->

				<!-- BOTTOM LIST -->
				<div class="bottom-list clearfix hidden">

					<div class="pull-left">
						<p class="text-page">
							 Showing: 1 - 5 of 20
						</p>
					</div>
					
					<div class="pull-right">
						<!-- PAGING -->
						<ul class="paging-p  _1 pull-left">
							<li class="current"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">...</a></li>
							<li><a href="#">10</a></li>
							<li class="last"><a href="#"></a></li>
						</ul>
						<!-- END PAGING -->
					</div>

				</div>
				<!-- END BOTTOM LIST -->

			</div>
		</section>
		<!-- END PRODUCT LIST -->

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
	<script src="<?php echo $site_dir;?>/s/library/isotope.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/js/library/jquery.colio.min.js" type="text/javascript"></script>

	<!-- Main Js -->
	<script src="<?php echo $site_dir;?>/js/script.js" type="text/javascript"></script>
</body>
</html>