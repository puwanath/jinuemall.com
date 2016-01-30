<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Page 404</title>

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
					<li><a href="index.html">Home</a></li>
					<li><span>404 Page</span></li>
				</ul>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- PAGE 404 -->
		<section class="page-404">
			
			<!-- BACKGROUND -->
			<div class="bg-parallax bg-1"></div>
			<!-- END BACKGROUND -->

			<!-- OVERLAY -->
			<div class="overlay"></div>
			<!-- END OVERLAY -->
			
			<!-- CONTENT -->
			<div class="page-404-cn  text-center">
				<div class="container">
					<h2><span>404</span>Error</h2>
					<p>
						We’re sorry, but the pageyou were looking for doesn’t exist.
					</p>
					<div class="search-page">
						<form action="#">
							<input type="text" class="input-text" placeholder="Search page...">
							<button class="btn-search"></button>
						</form>
					</div>
					<a href="#" class="btn btn-10 text-uppercase">Back To Previus Page</a>
				</div>
			</div>
			<!--END CONTENT -->

		</section>
		<!-- PAGE 404 -->

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