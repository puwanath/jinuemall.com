<?php
// Get view upline request
if(isset($_REQUEST['view'])){
	$view=$_REQUEST['view'];
}elseif(isset($uri[1])){
	$view=$uri[1];
}else{
	$view=$me['member_username'];
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
		<?php echo wordvar('Placement');?>
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
	<link href="<?php echo $site_dir;?>/stylesheets/jquery.orgchart.css" rel="stylesheet" />
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
    <script src="<?php echo $site_dir;?>/javascripts/jquery.orgchart.js"></script>

    <script>
        $(function() {
            $("#organisation").orgChart({container: $("#main"), interactive: true, fade: true, speed: 'slow'});
        });
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
    </script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta charset="utf-8">
  </head>
  <body class="page-header-fixed bg-ios-blue-3 layout-fluid" style="background-color:#8E8E93">  
    <div class="modal-shiftfix">
      <?php 
	  include "header.php"; 
	  ?>
      <div class="container-fluid main-content">		
		<div class="row">
			<div class="col-lg-12 text-center">
				<button type="button" class="btn btn-default pull-left" aria-label="search" data-toggle="modal" data-target="#SearchMembers" style="position:absolute;left:20px;background:none;border-radius:50%;">
						  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</button>
				<div id="left">
				<?php 
				$leader_upline=$me_login;
				
		
				
				// Set up upline
				if(!empty($view)){
					$leader_upline_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id FROM members WHERE member_username='".$view."'"));
					$leader_upline=$leader_upline_result['member_id'];
					?>
					<a href="<?php echo $site_url;?>/placement">
						<button class="btn btn-primary"><i class="fa fa-user"></i> <?php echo wordvar('Me');?> </button>
					</a><br><i class="fa fa-long-arrow-up" style="color:#CCCCCC;"></i><br>
					<?php 
					$leader=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE member_id=$leader_upline"));
					if($leader['upline']!=$me_login AND $leader_upline!=$me_login AND my_downline($view)==1){
						$upline_username_result=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_username FROM members WHERE member_id=".$leader['upline']));
						$upline_username=$upline_username_result['member_username'];
						?>
						<a href="<?php echo $site_url;?>/placement/<?php echo $upline_username;?>">
							<button class="btn btn-info"><i class="fa fa-arrow-circle-up"></i> <?php echo $upline_username;?> </button>
						</a><br><i class="fa fa-long-arrow-up" style="color:#CCCCCC;"></i><br>
						<?php 
					}
				}else{
					$leader_upline=$me_login;					
					$leader=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE member_id=$leader_upline"));
				}
				
				
				
				// Show organization
				if(my_downline($view)==1 OR $leader_upline==$me_login){
					?>
					<ul id="organisation" class="organization">						
						<?php 						
						if($leader['member_status']=="shutdown"){ $member_status="default"; }else{ $member_status="info"; }	
						$package_name=mysqli_fetch_assoc(mysqli_query($connect,"SELECT package_name FROM packages WHERE package_id=".$leader['package_id']));
						?>
						<li style="background:#ffffff url('<?php echo $site_main;?>/gallery/avatar/<?php echo $leader['member_avatar'];?>') top center no-repeat;background-size:100% auto;"  title="<?php echo $leader['member_name']." ".$leader['member_surname']." (".$package_name['package_name'].")";?>">
							<span class="label label-pill label-<?php echo $member_status;?>" style="width:80px;font-size:1.2em;padding:0px 5px 0px 5px;">
								<?php echo $leader['member_username'];?>
							</span><br>
							<p style="color:#ffffff;line-height:1.4em;margin-top:22px;">
							<?php 
							$package_name=mysqli_fetch_assoc(mysqli_query($connect,"SELECT package_name FROM packages WHERE package_id=".$leader['package_id']));
							echo $leader['member_name']." ".$leader['member_surname']."<br>(".$package_name['package_name'].")";?>
							</p>
							<ul>
							<?php 
							$first_upline=$leader['member_id'];
							
							for($first_side=1;$first_side<=2;$first_side++){
								if($first_side==1){ $side="L"; }else{ $side="R"; }							
								$first=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE upline=$first_upline AND placement='$side'"));
								if($first['member_id']!=""){	
									if($first['member_status']=="shutdown"){ $member_status="default"; }else{ $member_status="info"; }	
									?>
									<li style="background:#ffffff url('<?php echo $site_main;?>/gallery/avatar/<?php echo $first['member_avatar'];?>') top center no-repeat;background-size:100% auto;">
										<div style="position:absolute;left:0;right:0;margin:auto;top:-180px;color:#ffffff;">
										<?php 
										if($side=="L"){
											$calculated_side="calculated_left";
										}elseif($side=="R"){
											$calculated_side="calculated_right";
										}	
										$calculated_pv_result=mysqli_fetch_array(mysqli_query($connect,"SELECT $calculated_side FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE member_id=$first_upline"));
										$calculated_pv=$calculated_pv_result[0];
										$upline=$first['member_id'];

										 echo number_format(SumPV($upline)-$calculated_pv)." PV";
										 $package_name=mysqli_fetch_assoc(mysqli_query($connect,"SELECT package_name FROM packages WHERE package_id=".$first['package_id']));
										?>
										</div>
										<a href="<?php echo $site_url;?>/placement/<?php echo $first['member_username'];?>"  title="<?php echo $first['member_name']." ".$first['member_surname']." (".$package_name['package_name'].")";?>">
											<div style="position:relative;top:-83px;left:-2px;width:96px;height:96px;">
												<span class="label label-pill label-<?php echo $member_status;?>" style="width:80px;margin-top:80px;font-size:1.2em;padding:0px 5px 0px 5px;"> <?php echo $first['member_username'];?>
												</span>
											</div>
										</a>
										<ul>
										<?php 
										$second_upline=$first['member_id'];
										for($second_side=1;$second_side<=2;$second_side++){
											if($second_side==1){ $side="L"; }else{ $side="R"; }							
											$second=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE upline=$second_upline AND placement='$side'"));
											if($second['member_id']!=""){
												$package_name=mysqli_fetch_assoc(mysqli_query($connect,"SELECT package_name FROM packages WHERE package_id=".$second['package_id']));
												if($second['member_status']=="shutdown"){ $member_status="default"; }else{ $member_status="info"; }	
												?>
												<li style="background:#ffffff url('<?php echo $site_main;?>/gallery/avatar/<?php echo $second['member_avatar'];?>') top center no-repeat;background-size:100% auto;">
													<a href="<?php echo $site_url;?>/placement/<?php echo $second['member_username'];?>"   title="<?php echo $second['member_name']." ".$second['member_surname']." (".$package_name['package_name'].")";?>">
														<div style="position:relative;top:-83px;left:-2px;width:96px;height:96px;" >
															<span class="label label-pill label-<?php echo $member_status;?>" style="width:80px;margin-top:80px;font-size:1.2em;padding:0px 5px 0px 5px;">
																<?php echo $second['member_username'];?>
															</span>
														</div>		
													</a>
													<ul>
													<?php 
													$third_upline=$second['member_id'];
													for($third_side=1;$third_side<=2;$third_side++){
														if($third_side==1){ $side="L"; }else{ $side="R"; }							
														$third=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE upline=$third_upline AND placement='$side'"));
														if($third['member_id']!=""){
															$package_name=mysqli_fetch_assoc(mysqli_query($connect,"SELECT package_name FROM packages WHERE package_id=".$third['package_id']));
															if($third['member_status']=="shutdown"){ $member_status="default"; }else{ $member_status="info"; }	
															?>
															<li style="background:#ffffff url('<?php echo $site_main;?>/gallery/avatar/<?php echo $third['member_avatar'];?>') top center no-repeat;background-size:100% auto;">
																<a href="<?php echo $site_url;?>/placement/<?php echo $third['member_username'];?>"  title="<?php echo $third['member_name']." ".$third['member_surname']." (".$package_name['package_name'].")";?>">
																	<div style="position:relative;top:-80px;width:96px;height:96px;">
																	<span class="label label-pill label-<?php echo $member_status;?>" style="width:80px;margin-top:80px;font-size:1.2em;padding:0px 5px 0px 5px;">
																		<?php echo $third['member_username'];?>
																	</span>
																	</div>
																</a>
															</li>
														<?php 
														}else{
														?>	
															<li style="background:url('') center no-repeat;background-size:100% auto;">
																<a href="<?php echo $site_url;?>/signup?upline=<?php echo $third_upline;?>&placement=<?php echo $side;?>" title="<?php echo wordvar('Signup_new_member');?>">
																	<h2 class="fa fa-plus-circle add-member"></h2>
																</a>
															</li>
														<?php 
														}												
													}
													?>
													</ul>
												</li>
											<?php 
											}else{
											?>	
												<li style="background:url('') center no-repeat;background-size:100% auto;">
													<a href="<?php echo $site_url;?>/signup?upline=<?php echo $second_upline;?>&placement=<?php echo $side;?>" title="<?php echo wordvar('Signup_new_member');?>">
														<h2 class="fa fa-plus-circle add-member"></h2>
													</a>
												</li>
											<?php 
											}	
										}
										?>
										</ul>
									</li>
								<?php 
								}else{
								?>	
									<li style="background:url('') center no-repeat;background-size:100% auto;padding:0px;">
										<a href="<?php echo $site_url;?>/signup?upline=<?php echo $first_upline;?>&placement=<?php echo $side;?>" title="<?php echo wordvar('Signup new member');?>">
											<h2 class="fa fa-plus-circle add-member"></h2>
										</a>
									</li>
								<?php 
								}	
							}
							?>
							</ul>
						</li>
					</ul>
					
					<?php 
				}else{
					echo "<h3 style='color:white'>".wordvar('Not_found_your_friends')."</h3>";
				}
				?>
				<div id="content">
					<div id="main">
						
					</div>
				</div>
			</div> <!--end col-lg-12 -->
			<?php
			if($view==$me['member_username']){
			?>
			<div class="col-lg-12 text-center">
				<br><br><p style="color:#ffffff"><?php echo wordvar('Calculated');?> : <?php echo number_format($me['calculated_left']);?> PV</p>
			</div>
			<?php 
			}
			?>
		</div>
      </div>
    </div>
	<div id="SearchMembers" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content" >
                <div class="modal-header">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
					<form action="" method="GET" class="form-inline">
					  <div class="form-group">
						  <input name="view" autocomplete="off" class="members typeahead tt-query form-control " dir="auto" placeholder="<?php echo wordvar('Search_for_members');?>" spellcheck="false" type="text" autofocus="autofocus">
					  </div>
					  <button type="submit" class="btn btn-info" style="margin-top:5px;"><i class="fa fa-search"></i><?php echo wordvar('Search');?></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	$(document).ready(function() {
		if ($('.typeahead').length) {
		  $(".members.typeahead").typeahead({
			name: "members",
			local: 
			[
			<?php 
			$uplines_count=0;
			echo '"'.$me['member_username'].'"';
			$uplines=array($me_login);
			do{
				$member_sql="SELECT member_id,member_username FROM members LEFT JOIN packages ON members.package_id=packages.package_id WHERE ";
				$member_sql.=" upline=".$uplines[0];
				for($i=1;$i<=$uplines_count-1;$i++){
					$member_sql.=" OR upline=".$uplines[$i];
				} 			
				$uplines=array();
				$member_query=mysqli_query($connect,$member_sql);
				while($members=mysqli_fetch_array($member_query)){
					echo ','.'"'.$members['member_username'].'"';
					array_push($uplines,$members['member_id']);
				}
				//mysqli_free_result($members);
				$uplines_count=count($uplines);
			}while($uplines_count!=0);
			?>
			]
		  });
		}
	});
	</script>
  </body>
</html>