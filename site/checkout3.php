<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Check Out</title>
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
		
		
		<div class="container" style="margin-bottom:245px;">
		<center><i class="fa fa-heart" style="margin-top:80px; font-size:16em;"></i></center>
		<h3><span style="margin:60px 0px 0px 150px;"><center><?php echo wordvar('Your order has been done successfully,Thanks you');?> </center></span></h3>
		</div>

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
</body>
</html>