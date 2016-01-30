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
		<?php echo wordvar('Friends');?>
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
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="utf-8">
  </head>
  <body class="page-header-fixed bg-ios-gray layout-fluid">  
    <div class="modal-shiftfix">
      <?php
	  include("header.php");
	  ?>
      <div class="container-fluid main-content">
        <!--div class="page-title">
          <h1 style="color:white">
            Friends
          </h1>
        </div-->
		<div class="row">
			<div class="col-lg-12">
				<div class="widget-container fluid-height">
                  <div class="heading tabs">
                    <ul class="nav nav-tabs" data-tabs="tabs" id="tabs">
                      <li class="active">
                        <a data-toggle="tab" href="#tab1"><i class="fa fa-users"></i><span><?php echo friends_number($me_login,'all');?> <?php echo wordvar('Friends');?></span></a>
                      </li>
					  <?php
					  if($me['package_id']==7){
						$franchisee_query=mysqli_query($connect,"SELECT * FROM members WHERE franchiser=$me_login");
						
					  ?>
                      <li>
                        <a data-toggle="tab" href="#tab2"><i class="fa fa-flag"></i><span><?php echo mysqli_num_rows($franchisee_query)+0;?> <?php echo wordvar('Franchisee');?></span></a>
                      </li>
					  <?php
					  }
					  ?>
                      <!--li>
                        <a data-toggle="tab" href="#tab3"><i class="fa fa-paper-clip"></i><span>Attachments</span></a>
                      </li-->
                    </ul>
                  </div>
                  <div class="tab-content padded" id="my-tab-content">
                    <div class="tab-pane active" id="tab1">
						<div class="panel-group" id="accordion">
						<?php
						$level=1;
						$sponsors=array($me_login);
						$sponsors_count=0;
						do{
							$friend_sql="SELECT * FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE ";
							$friend_sql.=" sponsor=".$sponsors[0];
							for($i=1;$i<=$sponsors_count-1;$i++){
								$friend_sql.=" OR sponsor=".$sponsors[$i];
							} 
							$sponsors=array();
							$friend_query=mysqli_query($connect,$friend_sql);
							$level_friends=mysqli_num_rows($friend_query);
							
							if($level_friends!=0){
							?>
							<div class="panel">
								<div class="panel-heading">
								  <div class="panel-title">
									<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#Level<?php echo $level;?>">
									  <div class="caret pull-right"></div>
									  <?php echo wordvar('Level');?> <?php echo $level."   <small>(".$level_friends." ".wordvar('People').")</small>";?></a>
								  </div>
								</div>
								<div class="panel-collapse collapse in" id="Level<?php echo $level;?>">
								  <div class="panel-body">
									<div class="row">
								  <?php
								$i=1;
								while($friend=mysqli_fetch_array($friend_query)){
									?>
										<div class="col-md-3">
											<div class="row">
												<div class="col-xs-3">
													<img width="64" height="64" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $friend['member_avatar'];?>" />
												</div>
												<div class="col-xs-9">
													<a href="<?php echo $site_url;?>/placement/<?php echo $friend['member_username'];?>">
													<strong>
													  <?php echo $friend['member_username'];?>
													</strong>
													(<?php echo $friend['member_name']." ".$friend['member_surname'];?>)
													</a>
													<p>
													<?php echo $friend['package_name'];?><br>
													<small><?php echo wordvar('Sponsor_by');?> : 
													<?php 
														$sponsor_by=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_username FROM members WHERE member_id=".$friend['sponsor']));
														echo $sponsor_by['member_username'];
													?></small>
													<br>
													<small><?php echo wordvar('คะแนนสะสม');?> : <?php echo $friend['member_pv'];?></small>
													</p>
												</div>
											</div>
										</div>
									<?php
									if($i%4==0){ 
										echo "</div><div class='row'>";
									}
									
									$i++;
									array_push($sponsors,$friend['member_id']);
								}
								mysqli_free_result($friend_query);
								?>
									</div>
								  </div>
								</div>
							</div>
							<?php
							} // end if level_friends
							$level++;
							$sponsors_count=count($sponsors);
						}while($sponsors_count!=0);
						?>
						  
						  
						</div>
					</div>
					<?php
					if($me['package_id']==7){
					?>
					<div class="tab-pane" id="tab2">
							<div class="row">
								<?php
								$i=1;
								while($franchisee=mysqli_fetch_array($franchisee_query)){
									?>
										<div class="col-md-3">
											<div class="row">
												<div class="col-xs-3">
													<img width="64" height="64" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $franchisee['member_avatar'];?>" />
												</div>
												<div class="col-xs-9">
													<a href="<?php echo $site_url;?>/placement/<?php echo $franchisee['member_username'];?>">
													<strong>
													  <?php echo $franchisee['member_username'];?>
													</strong>
													</a>
													<p>
													<?php 
													$package_name=mysqli_fetch_assoc(mysqli_query($connect,"SELECT package_name FROM packages WHERE package_id=".$franchisee['package_id']));
													echo $package_name['package_name'];
													?>
													<br>
													<small><?php echo wordvar('Sponsor_by');?> : 
													<?php 
													$franchisee_sponsor=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_username FROM members WHERE member_id=".$franchisee['sponsor']));
													echo $franchisee_sponsor['member_username'];
													?>
													</small>
													</p>
												</div>
											</div>
										</div>
									<?php
									if($i%4==0){ 
										echo "</div><div class='row'>";
									}
									
									$i++;
								}
								mysqli_free_result($franchisee_query);
								?>	
							</div>
					</div>
					<?php
					}
					?>
                  </div>
                </div>
			</div>
		</div>		
      </div>
    </div>
  </body>
</html>