<?php 
isset($_REQUEST['txtaction'])?$action=$_REQUEST['txtaction']:$action=''; 
if($action=="login"){
	isset($_REQUEST['txtusername'])?$username=$_REQUEST['txtusername']:$username='';
	isset($_REQUEST['txtpassword'])?$password=$_REQUEST['txtpassword']:$password='';
	
	$login_sql = "SELECT admin_id FROM administrator WHERE admin_username= '$username' AND admin_password= '$password' ";
	$login_query = mysqli_query($connect,$login_sql);
	$login_result = mysqli_fetch_object($login_query);
	$login_check = mysqli_num_rows($login_query);

		if($login_check==1){
			$_SESSION['admin_login']=$login_result->admin_id;
			$admin_id = $_SESSION['admin_login'];
			header("LOCATION:$site_url");
		}

}elseif($action=="logout"){
	$_SESSION['admin_login']="";
	
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php echo $site_dir;?>/images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="<?php echo $site_dir;?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo $site_dir;?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="<?php echo $site_dir;?>/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container text-center">
		<img src="site/images/jinue-genius.png" width="300"  style="margin-top:50px;">
      <form class="form-signin" action="<?php echo $site_url;?>/login" method="POST" style="margin:20px auto;" enctype="multipart/form-data">
        <div class="login-wrap text-center">
            <div class="user-login-info">
			
                <input type="text" name="txtusername" class="form-control" placeholder="User ID" autofocus>
                <input type="password" name="txtpassword"	class="form-control" placeholder="Password">
            </div>
            <!--label class="checkbox" >
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label-->
			<input type="hidden" name="txtaction" value="login">
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

            <div class="registration">
                Go back to 
                <a class="" href="http://www.jinuemall.com">
                    Jinuemall.com
                </a>
            </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="<?php echo $site_dir;?>/js/jquery.js"></script>
    <script src="<?php echo $site_dir;?>/fbs3/js/bootstrap.min.js"></script>

  </body>
</html>