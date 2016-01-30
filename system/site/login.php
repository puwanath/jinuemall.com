<?php
unset($_SESSION['me_login']); 
isset($_REQUEST['action'])?$action=$_REQUEST['action'] : $action=null;
isset($_SESSION['signup_username'])?$signup_username=$_SESSION['signup_username'] : $signup_username=null;

if($action=="login"){
	isset($_REQUEST['username'])?$username = $_REQUEST['username'] : $username=null;
	isset($_REQUEST['password'])?$password = encode($_REQUEST['password'],$private_key) : $password=null;
	isset($_REQUEST['remember'])?$remember = $_REQUEST['remember'] : $remember=null;
	/*
	$login_query=mysql_query("SELECT member_id FROM jinue_system.members WHERE 
	(member_email='$username' OR 
	member_phone='$username' OR 
	member_national_id='$username' OR 
	member_passport='$username' OR 
	member_username='$username') 
	AND member_password='$password';"); 
	*/
	$login_query=mysqli_query($connect,"SELECT member_id FROM members WHERE (member_username='$username' OR member_national_id='$username') AND member_password='$password';");
	if(mysqli_num_rows($login_query)==1){
		$login_result=mysqli_fetch_assoc($login_query);
		$_SESSION['me_login']=$login_result['member_id'];
		if ($remember==true){
			setcookie('login_username',$username,time()+60);
			setcookie('login_password',$password,time()+60);
		}else{
			setcookie('login_username',$username);
			setcookie('login_password',$password);
		}			
		mysqli_query($connect,"UPDATE members SET last_login=now() WHERE member_id=".$_SESSION['me_login']);
	}
	header("Location: $site_url");
}
?>
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
      J-SYSTEM
    </title>
	<link rel="shortcut icon" href="<?php echo $site_dir;?>/images/jSystem-icon.png" />
    <link href="<?php echo $site_dir;?>/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo $site_dir;?>/stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo $site_dir;?>/stylesheets/hightop-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo $site_dir;?>/stylesheets/ios7-background.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo $site_dir;?>/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <script src="<?php echo $site_dir;?>/javascripts/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery-ui.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/raphael.min.js" type="text/javascript"></script>
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
    <script src="<?php echo $site_dir;?>/javascripts/masonry.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/select2.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/styleswitcher.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/wysiwyg.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/daterange-picker.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/date.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/morris.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/skycons.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/fitvids.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/main.js" type="text/javascript"></script>
    <script src="<?php echo $site_dir;?>/javascripts/respond.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body class="login1">
    <div style="width:200px; margin:13px 0px 0px 20px; position:absolute;">
        <a href="<?php echo $site_main;?>" style="color:#F8F9FB;font-size:24px;"><i class="fa fa-shopping-cart"></i> JINUEMALL </a>
    </div>
    <!-- Login Screen -->
    <div class="login-wrapper">
      <div class="login-container">
        <h1>
          <img src="<?php echo $site_dir;?>/images/jSystem-2.png">
        </h1>
        <form method="POST" action="<?php echo $site_url;?>/login" >
          <div class="form-group">
            <input class="form-control" placeholder="<?php echo wordvar('Username');?>" type="text" name="username" value="<?php echo $signup_username;?>" autofocus>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="<?php echo wordvar('Password');?>" type="password" name="password">
            <input type="submit" value="&#xf054;">
            <input type="hidden" name="action" value="login">
          </div>
          <div class="form-options clearfix">
            <a class="pull-left" href="#"><?php echo wordvar('Forgot_password?');?></a>
          </div>
        </form>
      </div>
    </div>
	<div style="bottom: 0;
    height: 40px;
    margin: 0 auto;
    position: fixed;
    width: 100%;
	text-align:center;
	color:#333333;
	">Copyright © <?php echo date('Y');?> Jinue Global Co., Ltd. All rights reserved. | Product by <a href="http://www.saalee.com">Inspires Studio</a></div>
    <!-- End Login Screen -->
  </body>
</html>