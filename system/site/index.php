<?php
$me_package=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM packages WHERE package_id=".$me['package_id']));

$next_package_id=$me_package['package_id']+1;

$next_package=mysqli_fetch_array(mysqli_query($connect,"SELECT package_name,package_pv FROM packages WHERE package_id=$next_package_id"));

$pv_upgrade=$me['member_pv']+0;
$pv_total=$next_package['package_pv']-$me_package['package_pv'];
$pv_persent=($pv_upgrade/$pv_total)*100;
	

								$uplines=array($me_login);
								$uplines_count=null;
								$member_arr=array($me_login);
								do{
									$member_sql="SELECT member_id,member_username FROM members WHERE ";
									$member_sql.=" upline=".$uplines[0];
									for($i=1;$i<=$uplines_count-1;$i++){
										$member_sql.=" OR upline=".$uplines[$i];
									} 			
									$uplines=array();
									$member_query=mysqli_query($connect,$member_sql);
									while($members=mysqli_fetch_array($member_query)){
										array_push($uplines,$members['member_id']);
										array_push($member_arr,$members['member_id']);
									}
									$uplines_count=count($uplines);
								}while($uplines_count!=0);

								
								$find_uplines_next=$me_login;
								do{
									$member_result=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,upline FROM members WHERE member_id=$find_uplines_next"));	
									$find_uplines_next=$member_result['upline'];
									array_push($member_arr,$member_result['upline']);
								}while($member_result['upline']!=0);
						

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
		<?php echo $me['member_name']."  ".$me['member_surname'];?>
    </title>
	<link rel="shortcut icon" href="<?php echo $site_dir;?>/images/jSystem-icon.png" />
	<link href="<?php echo $site_dir;?>/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/hightop-font.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/bootstrap-editable.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/social-buttons.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/dropzone.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/nestable.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/ios7-background.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $site_dir;?>/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
	<script src="<?php echo $site_dir;?>/javascripts/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery-ui.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/raphael.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/selectivizr-min.js" type="text/javascript"></script>
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
	<script src="<?php echo $site_dir;?>/javascripts/isotope_extras.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/modernizr.custom.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/select2.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/styleswitcher.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/wysiwyg.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/typeahead.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/summernote.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/typeahead.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/spin.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/ladda.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/moment.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/mockjax.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-editable.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/xeditable-demo-mock.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/xeditable-demo.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/address.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/daterange-picker.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/date.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/morris.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/skycons.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/fitvids.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/dropzone.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/jquery.nestable.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/main.js" type="text/javascript"></script>
	<script src="<?php echo $site_dir;?>/javascripts/respond.js" type="text/javascript"></script>
	<script src="<?php echo $site_system;?>/scripts.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	
  </head>
  <body class="page-header-fixed bg-ios layout-boxed">  
  
    <div class="modal-shiftfix"> 
      <?php
	  include("header.php"); 
	  ?> 
      <div class="container-fluid main-content">
        <!-- Statistics -->
		
		<div class="social-wrapper">
		  <div id="social-container"></div>
		  <div class="row hidden">
			<div class="col-lg-12">
			  <div class="btn btn-lg btn-block btn-default" id="load-more">
				<i class="fa fa-spinner fa fa-spin"></i>Loading content
			  </div>
			</div>
		  </div>
		  <div id="hidden-items">
			<!-- Profile Widget -->
			<div class="item widget-container fluid-height profile-widget">
			  <div class="widget-content padded">
				<div class="profile-info clearfix">
				  <img width="70" height="70" class="social-avatar pull-left" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $me['member_avatar'];?>" />
				  <div class="profile-details">
					<a class="user-name" href="<?php echo $site_url;?>/profile"><?php echo $me['member_name']."  ".$me['member_surname'];?></a>
					<p>
					  <?php echo $me_package['package_name'];?>
					</p>
					<a href="<?php echo "http://www.jinuemall.com/".$me['member_username'];?>"><em><i class="fa fa-link"></i><?php echo "www.jinuemall.com/".$me['member_username'];?></em></a>
				  </div>
				</div>
				<div class="profile-stats">
				  <div class="col-xs-4">
					<a href="#">
					  <h2>
					  <?php echo mysqli_num_rows(mysqli_query($connect,"SELECT post_id FROM posts WHERE member_id=$me_login")); ?>
					  </h2>
					</a>
					<p>
					  Posts
					</p>
				  </div>
				  <div class="col-xs-4">
					<a href="<?php echo $site_url;?>/friends">
					  <h2>
						<?php echo friends_number($me_login,'all');?>
					  </h2>
					</a>
					<p>
					  Friends
					</p>
				  </div>
				  <div class="col-xs-4">
					<a href="<?php echo $site_url;?>/">
					  <h2>
						<?php 
						$likes_result=mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(post_likes) FROM posts WHERE member_id=$me_login")); 
						echo $likes_result[0]+0;
						?>
					  </h2>
					</a>
					<p>
					  Likes
					</p>
				  </div>
				</div>
			  </div>
			</div>
			<!-- end Profile Widget -->
			<!-- Share Form -->
			<div class="item widget-container share-widget fluid-height clearfix">
			<form action="<?php echo $site_url;?>/process" method="POST"  enctype="multipart/form-data">
			  <div class="widget-content padded">
					<div class="add_post_photo hidden">
						<input type="text" class="form-control" id="photo_url" name="post_image" placeholder="Photo url : ">
						<input type="file" id="select_file" name="post_image_upload"> 
					</div>
					<div class="add_post_link hidden">
						<input type="text" class="form-control" name="post_link" placeholder="Link url : ">
					</div>
					<div class="add_post_video hidden">
						<input type="text" class="form-control" name="post_video" placeholder="Video url : ">					
					</div>
					<textarea class="form-control add_post_text" name="post_text" placeholder="What's new..." rows="4" style="" autofocus></textarea>
			  </div>
			  <div class="clearfix">
				<div class="col-xs-2 share-options active btn_add_post_text">
				  <i class="fa fa-pencil"></i>
				  <p>
					Text
				  </p>
				</div>
				<div class="col-xs-2 share-options btn_add_post_photo">
				  <i class="fa fa-camera"></i>
				  <p>
					Photo
				  </p>
				</div>
				<div class="col-xs-2 share-options btn_add_post_link">
				  <i class="fa fa-link"></i>
				  <p>
					Link
				  </p>
				</div>
				<div class="col-xs-2 share-options btn_add_post_video">
				  <i class="fa fa-youtube-play"></i>
				  <p>
					Video
				  </p>
				</div>
				<div class="col-xs-4 text-right">
					<input type="hidden" name="action" value="post_add">
					<input type="hidden" name="post_type" value="post">
					<input type="hidden" name="goto" value="<?php echo $site_url;?>">
					<button type="submit" class="btn btn-primary">Post</button>
				</div>
			  </div>
			</form>
			</div>
			<!-- end Share Form -->
			<!-- Text Post -->
		<?php
		$posts_query=mysqli_query($connect,"SELECT * FROM posts WHERE member_id=$me_login OR member_refer LIKE '%[$me_login]%' OR member_id IN (".implode(',',$member_arr).") ORDER BY post_date DESC LIMIT 100;");
		while($posts=mysqli_fetch_array($posts_query)){
		$member=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,member_name,member_surname,member_username,member_avatar FROM members WHERE member_id=".$posts['member_id']));
		?>
			<div class="item widget-container fluid-height clearfix social-entry">
			  <div class="widget-content">
				<div class="profile-info clearfix padded">
				  <img width="50" height="50" class="social-avatar pull-left" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $member['member_avatar'];?>" />
				  <div class="profile-details">
					<a class="user-name" href="#"><?php echo $member['member_name']."  ".$member['member_surname'];?></a>
					<p>
					  <em><?php echo $posts['post_date'];?></em>
					</p>
				  </div>
				</div>
				<?php
				if(!empty($posts['post_image'])){
				?>
					<img width="100%"  class="social-content-media" src="<?php echo $posts['post_image'];?>" />
				<?php
				}elseif(!empty($posts['post_video'])){
					$youtube = strpos($posts['post_video'],"youtube.com/watch?v=");
					if($youtube==true){
						$youtube_url=substr($posts['post_video'],-11);
					?>
						<iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $youtube_url;?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
					<?php
					}else{
					?>
					<iframe allowfullscreen="" class="social-content-media" frameborder="0" height="200" mozallowfullscreen="" src="<?php echo $posts['post_video'];?>" webkitallowfullscreen="" width="100%"></iframe>
					<?php
					}
				}
				?>
				
				<div class="padded">		
				<p class="content">
				<?php echo $posts['post_text'];?>
				<br><?php if(!empty($posts['post_link'])) ?><a href="<?php echo $posts['post_link'];?>"><?php echo $posts['post_link'];?></a>
				</p>
				<div class="btn btn-sm btn-default-outline like_post" id="like_post_<?php echo $posts['post_id'];?>" data-post="<?php echo $posts['post_id'];?>" data-likes="<?php echo $posts['post_likes'];?>">
				  <i class="fa fa-thumbs-o-up"></i> <span id="post_likes_<?php echo $posts['post_id'];?>"><?php echo $posts['post_likes'];?></span>
				</div>
				<div class="btn btn-sm btn-default-outline shared_post" id="shared_post_<?php echo $posts['post_id'];?>"  data-post="<?php echo $posts['post_id'];?>"  data-shared="<?php echo $posts['post_shared'];?>">
				  <i class="fa fa-mail-forward"></i> <span class="hidden" id="post_shared_<?php echo $posts['post_id'];?>"><?php echo $posts['post_shared'];?></span>
				</div>
				</div>
			  </div>
			  <div class="comments padded">
			  <?php
			  $i=0;
			  $comments_query=mysqli_query($connect,"SELECT * FROM post_comments WHERE post_id=".$posts['post_id']." ORDER BY comment_date ASC;");
			  while($comments=mysqli_fetch_array($comments_query)){
			  $member=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,member_name,member_surname,member_username,member_avatar FROM members WHERE member_id=".$comments['member_id']));
			  ?>
				<div class="comment">
				  <img width="40" height="40" class="social-avatar pull-left" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $member['member_avatar'];?>" />
				  <div class="profile-details clearfix">
					<a class="user-name" href="#"><?php echo $member['member_name']."  ".$member['member_surname'];?></a>
					<p>
					  <em><?php echo $comments['comment_date'];?></em>
					</p>
				  </div>
				  <p class="content">
					<?php echo $comments['comment_text'];?>
				  </p>
				</div>
			  <?php $i++;
			  }
			  ?>
			<div class="comment" >
				<div class="hidden" id="add_comment_<?php echo $posts['post_id'];?>">
				  <a class="user-name" href="#"><?php echo $me['member_name']."  ".$me['member_surname'];?></a>
				  <span class="content" id="add_comment_text_<?php echo $posts['post_id'];?>">
				  </span>
				</div>
			  </div>
				<div class="form-group" id="frm_add_comment_<?php echo $posts['post_id'];?>">
					<input class="form-control comment_text" id="<?php echo $posts['post_id']."_".$i;?>" data-post="<?php echo $posts['post_id'];?>" placeholder="Add a comment..." >
				</div>
			  </div>
			</div>
		<?php
		}
		?>
		
			<!--div class="item social-widget instagram">
			  <i class="fa fa-instagram"></i>
			  <div class="social-data">
				<h1>
				  120k
				</h1>
				Followers
			  </div>
			</div>
			<div class="item social-widget pinterest">
			  <i class="fa fa-pinterest"></i>
			  <div class="social-data">
				<h1>
				  230
				</h1>
				Repins
			  </div>
			</div>
			<div class="item social-widget dribbble">
			  <i class="fa fa-dribbble"></i>
			  <div class="social-data">
				<h1>
				  185
				</h1>
				Rebounds
			  </div>
			</div-->
			
		  </div>
		</div>
      </div>
		
		
		
		
        </div>		
      </div>
    </div>
	
  </body>
</html>