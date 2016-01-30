<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php echo $title;?></title>
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
		<?php include "header-global.php";?>
		<!-- END HEADER -->

		<!-- BREAKCRUMB -->
		<section class="breakcrumb bg-grey">
			<div class="container">
				<ul class="nav-breakcrumb ">
					<li><a href="<?php echo $site_url;?>">Jinuemall</a></li>
					<li><span><?php echo $product_result['product_name'];?></span></li>
				</ul>
			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- PRODUCT DETAIL -->
		<section class="product-detail _2 ">
			<div class="container">
				<div class="row">
					<div class="col-l text-center">
						<div class="product-image">
							<div class="image-block">
								<a id="view_full_size" class="fancybox" href="<?php echo product_picture($product_result['product_id']);?>">
									<img src="<?php echo product_picture($product_result['product_id']);?>"/>
									<span class="view-link"></span>
								</a>

							</div>

							<div class="view-block">

								<ul class="thumb_list">

									<li class="active" data-src="<?php echo product_picture($product_result['product_id']);?>"><img src="<?php echo product_picture_thumb($product_result['product_id']);?>"/>
									</li>
									
									<?php
									$picture_query=mysqli_query($connect,"SELECT * FROM product_pictures WHERE product_id=".$product_result['product_id']." AND picture_index!='#' LIMIT 3");
									while($picture=mysqli_fetch_array($picture_query)){
									?>
									<li data-src="<?php echo $site_url.'/gallery/products/'.$picture['picture_id'].'.'.$picture['picture_type'];?>">
										<img src="<?php echo $site_url.'/gallery/products/thumb/'.$picture['picture_id'].'.'.$picture['picture_type'];?>" alt=""/>
									</li>
									<?php
									}
									?>
								</ul>

							</div>

							
						</div>

					</div>

					<div class="col-r">

						<div class="product-text">
							<h1><?php echo $product_result['product_name'];?> </h1>
							<span class="product_stock">Available in stock</span>

							<span class="product_sku">BARCODE: <span><?php echo $product_result['product_barcode'];?></span></span>

							<div class="hr _1"></div>

							<div class="price-box"> 

	                          	<p class="special-price">
	                           		<span class="price">
									<?php
									if($me_login==null){
										echo currency($product_result['product_price']);
									}else{
										echo currency($product_result['product_price_member']);
									}
									?>
									</span> 
	                          	</p> 

	                          	<p class="old-price"> 
	                            	<span class="price">
									<?php 
									if($me_login!=null){
										echo currency($product_result['product_price']);
									}
									?>
									</span> 
	                          	</p>     

	                      	</div>

	                      	<div class="short-description">
	                      		<p>
	                      			<?php echo $product_result['product_description'];?>
	                      		</p>
	                      	</div>

							
	                      	<div class="add-to-box clearfix">
							<form action="<?php echo $site_url;?>/process" method="post">
				                <div class="add-to-cart" style="margin-left:0px">
								<?php
								if($product_result['product_qty']>0){
								?>
				                	<button type="submit" class="btn btn-10 text-uppercase"><i class="fa fa-cart-plus"></i> <span><?php echo wordvar('Add To Cart');?></span></button>
								<?php
								}else{
								?>
									<button type="" class="btn btn-10 text-uppercase" disabled style="background-color:red"><i class="fa fa-cart-plus"></i> <span><?php echo wordvar('Sold Out');?></span></button>
								<?php
								}
								?>
				                </div>
								<input type="hidden" name="action" value="basket_add">
								<input type="hidden" name="product_id" value="<?php echo $product_result['product_id'];?>">
								<input type="hidden" name="goto" value="<?php echo $site_url;?>/cart">
							</form>
	                      	</div>
							
							
                      	</div>
						
						<div class="share" style="padding-top : 20px; padding-bottom:20px;">
								<?php include('bt_share.php');?>
							</div>
						
					</div>
				</div>

				<div class="product-collateral" id="tabs-responsive">
					<ul class="nav-tab">

					    <li class="active"><a href="#description" aria-controls="description" data-toggle="tab">Product Description</a></li>
					    <li><a href="#information" aria-controls="information" data-toggle="tab">Information</a></li>
				  	</ul>

				  	<div class="tab-content">

					    <div class="tab-pane" id="description">
							<div class="text-content">
								<p>
									<?php echo $product_result['product_detail'];?>
								</p>
								<br>
							</div>
					    </div>

					    <div class="tab-pane" id="information">
							<div class="text-content">
								<p>
									Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.
								</p>

								<br>

								<p>
									Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.
								</p>
								<br>
								<p>
									Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea. Vis quaeque ocurreret ea.</p>
							</div>
					    </div>
				  	</div>

				</div>

			</div>
		</section>
		<!-- END PRODUCT DETAIL -->

		<!-- PRODUCT RELATED -->
		<section class="product-related">
			<div class="container">

				<div class="heading _2">
					<h2 class="text-uppercase">Related Products</h2>
				</div>
				<div class="related-cn _2">
					<div class="row">
					
						<div id="related-slide" data-custom="0-1,480-2,768-3,992-4,1200-5">
							<?php $product_query=mysqli_query($connect,'SELECT * FROM products WHERE product_category_id LIKE "%'.$product_result['product_category_id'].'%" ORDER BY RAND() LIMIT 6');
					
					while($product=mysqli_fetch_array($product_query)){
					?>
							<!-- GRID ITEM -->
							<div class="grid-item _2 ">
							
								<div class="image">
									<a href="<?php echo $site_url.'/'.$product['product_url'];?>">
										<img src="<?php echo product_picture_thumb($product['product_id']);?>" style="max-width:270px; max-height: 405px">
									</a>

									<div class="action">
										<div class="add-cart">
											<a href="<?php echo $site_url;?>/process?action=basket_add&product_id=<?php echo $product['product_id'];?>&product_qty=1&goto=<?php echo $site_url;?>/cart" class="btn btn-14 add-cart text-uppercase"><i class="fa fa-cart-plus"></i><?php echo wordvar('Add to cart');?> </a>
										</div>
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
	                                   		<span class="price"><?php echo currency($product['product_price_member']);?></span> 
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
		<!-- END PRODUCT RELATED -->

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
</body>
</html>