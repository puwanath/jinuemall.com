<?php
isset($_REQUEST['date']) ? $date=$_REQUEST['date'] : $date=null;
isset($_REQUEST['filter']) ? $filter=$_REQUEST['filter'] : $filter=null;

isset($_REQUEST['transfer_status']) ? $transfer_status =$_REQUEST['transfer_status'] : $transfer_status =null;
isset($_REQUEST['transfer_select_username']) ? $transfer_select_username =$_REQUEST['transfer_select_username'] : $transfer_select_username =null;

isset($_REQUEST['d']) ? $d=$_REQUEST['d'] : $d=null;
isset($_REQUEST['ss']) ? $d=$_REQUEST['ss'] : $d=null;
isset($_REQUEST['sd']) ? $d=$_REQUEST['sd'] : $d=null;
isset($_REQUEST['msd']) ? $d=$_REQUEST['msd'] : $d=null;
isset($_REQUEST['c']) ? $d=$_REQUEST['c'] : $d=null;
isset($_REQUEST['mc']) ? $d=$_REQUEST['mc'] : $d=null;
isset($_REQUEST['rd']) ? $d=$_REQUEST['rd'] : $d=null;
isset($_REQUEST['fc']) ? $d=$_REQUEST['fc'] : $d=null;
isset($_REQUEST['af']) ? $d=$_REQUEST['af'] : $d=null;
isset($_REQUEST['transfer']) ? $d=$_REQUEST['transfer'] : $d=null;
isset($_REQUEST['transfer_receive']) ? $d=$_REQUEST['transfer_receive'] : $d=null;
isset($_REQUEST['pay']) ? $d=$_REQUEST['pay'] : $d=null;
isset($_REQUEST['bonus']) ? $bonus=$_REQUEST['bonus'] : $bonus=null;

isset($_REQUEST['date_start']) ? $date_start=$_REQUEST['date_start'] : $date_start=date('Y-m-d 00:00');
isset($_REQUEST['date_end']) ? $date_end=$_REQUEST['date_end'] : $date_end=date('Y-m-d H:i');

$total_income=0;
$total_expend=0;
$total_tax = 0;
$sum_income=0;
$sum_expend=0;
$sum_tax=0;
$net=0;
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
		J-System
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
  <body class="page-header-fixed bg-ios-gray layout-boxed">  
    <div class="modal-shiftfix">
      <?php
	  include "header.php";
	  ?>
      <div class="container-fluid main-content">
        <div class="row">
			<div class="col-md-4 col-md-offset-4 text-center  " > 
				<h1 style="color:darkslategray;font-size:4.8em;"> 
					<img src="<?php echo $site_dir;?>/images/wallet.png" style="width: 100px;" align="center">
					<?php echo currency($me['jWallet']+$me['rMoney']+$me['jPoint'])?>
				</h1>
			</div>		
        </div>
		

		
		<div class="row">
            <div class="col-lg-12">
            <div class="widget-container stats-container">
				
				<div class="col-md-3">
					<div class="number">
					  <div class="icon money"></div>
					  <small><?php echo currency($me['jWallet'])?></small>
					</div>
					<div class="text">
					  <strong>J-Wallet</strong> (70% <?php echo wordvar('From Income');?>)
					</div>
				</div>      
				<div class="col-md-3">
					<div class="number">
					  <div class="icon money"></div>
					  <small><?php echo currency($me['rMoney'])?></small>
					</div>
					<div class="text">
					  <strong>R-Wallet</strong> (30% <?php echo wordvar('From Income');?>)
					</div>
				</div>
				<div class="col-md-3">
					<div class="number">
					  <div class="icon money"></div>
					  <small><?php echo currency($me['member_purchase'])?></small>
					</div>
					<div class="text">
					  <strong>Autoship Hold </strong><?php echo wordvar('(ใช่สำหรับคำนวณ Autoship)');?>
					</div>
				</div>		
				<div class="col-md-3">
					<div class="number">
					  <div class="icon money"></div>
					  <small><?php echo currency($me['jPoint'])?></small>
					</div>
					<div class="text">
					  <strong>J-Point</strong> (<?php echo wordvar('From');?> Autoship)
					</div>
				</div>
				
            </div>
			</div>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="widget-container  fluid-height">
                  <div class="heading tabs">
                    <ul class="nav nav-tabs" data-tabs="tabs" id="tabs">
                      <li class="<?php if($uri[1]=="transactions" OR $uri[1]==""){ echo "active"; }?>">
                        <a data-toggle="tab" href="#tab1"><i class="fa fa-tasks"></i><span><?php echo wordvar('Transactions');?></span></a>
                      </li>
                      <li class="<?php if($uri[1]=="transfer"){ echo "active"; }?> <?php if($me['jWallet']<10){ echo "hidden";};?>">
                        <a data-toggle="tab" href="#tab2"><i class="fa fa-exchange"></i><span><?php echo wordvar('Transfer');?></span></a>
                      </li>
                      <li class="<?php if($uri[1]=="withdraw"){ echo "active"; }?> <?php if($me['jWallet']<10){ echo "hidden";};?>">
                        <a data-toggle="tab" href="#tab3"><i class="fa fa-ticket"></i><span><?php echo wordvar('Withdraw');?></span></a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content padded" id="my-tab-content">
                    <div class="tab-pane <?php if($uri[1]=="transactions" OR $uri[1]==""){ echo "active"; }?> " id="tab1">

									<form action="#" method="post" class="form-horizontal">
										<div class="form-group">
											<div class="col-sm-3">
											  <input class="form-control" name="date_start"  placeholder="Start date" data-date-format="yyyy-mm-dd 00:00" id="dpd1"  type="text" value="<?php echo $date_start;?>">
											</div>
											<div class="col-sm-3">
											  <input class="form-control" name="date_end" placeholder="End date" data-date-format="yyyy-mm-dd 23:59" id="dpd2"  type="text" value="<?php echo $date_end;?>">
											</div>
											<div class="col-sm-3">
												<input type="hidden" name="filter" value="y">
												<button class="btn btn-primary" type="submit"><?php echo wordvar("Filter");?></button>
											</div>
										 </div>
										 <div class="form-group">
											<div class="col-md-12">
														<select class="select2able" name="bonus[]" multiple="" placeholder="Select transaction" style="display:block">
															<option value="1" selected><?php echo wordvar('Direct bonus');?></option>
															<option value="2" selected><?php echo wordvar('Super Starter');?></option>
															<option value="4" selected><?php echo wordvar('SD bonus');?></option>
															<option value="5" selected><?php echo wordvar('Matching Super Director bonus');?></option>
															<option value="6" selected><?php echo wordvar('Cycle bonus');?></option>
															<option value="7" selected><?php echo wordvar('Matching cycle bonus');?></option>
															<option value="8" selected><?php echo wordvar('Roll down from cycle bonus');?></option>
															<option value="9" selected><?php echo wordvar('Autoship bonus');?></option>
															<option value="10" selected><?php echo wordvar('Franchise bonus');?></option>
															<option value="11" selected><?php echo wordvar('All sales bonus');?></option>
															<option value="'receive'" selected><?php echo wordvar('receive');?></option>
															<option value="'pay'" selected><?php echo wordvar('Pay');?></option>
															<option value="'transfer'" selected><?php echo wordvar('transfer');?></option>
															<option value="'upgrade'" selected><?php echo wordvar('upgrade');?></option>
															<option value="'withdraw'" selected><?php echo wordvar('withdraw');?></option>
														</select>
											</div>
										  </div>
										<div class="form-group">
											<div class="col-md-12">
											
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
											
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
											
											</div>
										</div>
										
										
										
								  </form>


					
						 
						  <div class="col-sm-12">
							
							<div class="widget-container fluid-height">
							  <!-- Table -->
							  <table class="table table-filters">
								<thead>
								  <th width="60" class="hidden-xs">

								  </th>
								  <th>
									<?php echo wordvar('Date');?>
								  </th>
								  <th class="hidden-sm hidden-xs">
									<?php echo wordvar('Transaction');?>
								  </th>
								  <th>
									<?php echo wordvar('Description');?>
								  </th>
								  <th class="hidden-sm hidden-xs">
									<?php echo wordvar('Reference');?>
								  </th>
								  <th class="hidden-sm hidden-xs text-right">
									<?php echo wordvar('Amount');?>
								  </th>
								  <th class="hidden-sm hidden-xs text-right">
									<?php echo wordvar('Tax');?> (3%)
								  </th>
								  <th class="text-right">
									<?php echo wordvar('Total');?>
								  </th>
								</thead>
								<tbody>
								<?php
								$transactions_sql="SELECT * FROM transactions WHERE member_id=$me_login ";	
								$transactions_sql.=" AND transaction_date BETWEEN '$date_start' AND '$date_end' ";
								if($filter=='y'){
									$transactions_sql.=" AND (`transaction` IN (".implode(',',$bonus).") ";
									$transactions_sql.=" OR bonus_id IN (".implode(',',$bonus).") )";
								}
								$transactions_sql.=" ORDER BY transaction_date DESC";
								
								$transactions_query=mysqli_query($connect,$transactions_sql);
								while($transactions=mysqli_fetch_array($transactions_query)){
									if($transactions['bonus_id']==1){
										$icon="flash";
										$color="green";
									}elseif($transactions['bonus_id']==2){
										$icon="star";
										$color="green";
									}elseif($transactions['bonus_id']==3){
										$icon="star-o";
										$color="green";
									}elseif($transactions['bonus_id']==4){
										$icon="flash";
										$color="green";
									}elseif($transactions['bonus_id']==5){
										$icon="flash";
										$color="green";
									}elseif($transactions['bonus_id']==6){
										$icon="circle-o";
										$color="green";
									}elseif($transactions['bonus_id']==7){
										$icon="arrow-circle-up";
										$color="green";
									}elseif($transactions['bonus_id']==8){
										$icon="level-down";
										$color="green";
									}elseif($transactions['transaction']=="receive"){
										$icon="money";
										$color="green";
									}elseif($transactions['transaction']=="pay"){
										$icon="shopping-cart";
										$color="magenta";
									}elseif($transactions['transaction']=="upgrade"){
										$icon="arrow-circle-up";
										$color="blue";
									}elseif($transactions['transaction']=="transfer"){
										$icon="exchange";
										$color="orange";
									}
									?>
									<tr>
										<td class="filter-category hidden-xs <?php echo $color;?>">
										  <div class="arrow-left"></div>
										  <i class="fa fa-<?php echo $icon;?>"></i>
										</td>
										<td>
										  <?php echo $transactions['transaction_date'];?>
										</td>
										<td class="hidden-sm hidden-xs">
											<?php echo wordvar($transactions['transaction']);?>
										</td>
										<td>
										  <?php echo wordvar($transactions['transaction_description']);?>
										</td>
										
										<td class="hidden-sm hidden-xs">
											<?php 
											$member_refer=mysqli_fetch_array(mysqli_query($connect,"SELECT member_username FROM members WHERE member_id=".$transactions['member_refer']));
											echo $member_refer['member_username'];
											?>
										</td>
										<td class="hidden-sm hidden-xs text-right">
										<?php
										if($transactions['income']!=0 AND $transactions['bonus_id']>=1){
											$total_income=($transactions['income']/97*3)+$transactions['income'];
											echo currency($total_income,2);
										}elseif($transactions['income']!=0 AND $transactions['transaction']=="receive" AND $transactions['bonus_id']==0){
											$total_income=$transactions['income'];
										}else{
											echo "-";
										}
										?>
										</td>
										<td class="hidden-sm hidden-xs text-right">
											<div class="<?php echo $amount_status;?>" >
											<?php
											if($transactions['income']!=0 AND $transactions['bonus_id']>=1){
												$total_tax=$total_income*0.03;
												$sum_tax+=$total_tax;
												echo "-".currency($total_tax,2)."";
											}else{
												echo "-";
											}
											?>
											</div>
										</td>
										<td class="text-right">
										<?php
										if($transactions['income']!=0){
										?>
											<div class="<?php echo $amount_status;?> " style="color:#60C560;">
												<?php 
												echo currency($transactions['income'],2);
												$sum_income+=$total_income; 
												?>
											</div>
										<?php
										}elseif($transactions['expend']!=0){
										?>
											<div class="<?php echo $amount_status;?> " style="color:#D9534F;">
												<?php 
												$total_expend=$transactions['expend'];
												echo "-".currency($total_expend,2);
												$sum_expend+=$total_expend;
												?>
											</div>
										<?php
										}else{
											echo "-";
										}
										?>
											
										</td>
									</tr>
								<?php
								
								}
								$transactions_seen=mysqli_query($connect,"UPDATE transactions SET notification_status='seen' WHERE member_id=$me_login;");
								?>
									<tr>
										<td class="hidden-xs "></td>
										<td></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs text-right"></td>
										<td>
											<b> Total Income </b>
										</td>
										<td class="text-right">
											<b> <?php echo currency($sum_income,2); ?> </b>
										</td>
									</tr>
									<tr>
										<td class="hidden-xs "></td>
										<td></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs text-right"></td>
										<td>
											<b> Total Expend </b>
										</td>
										<td class="text-right">
											<b> <?php echo currency($sum_expend,2); ?> </b>
										</td>
									</tr>
									<tr>
										<td class="hidden-xs "></td>
										<td></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs text-right"></td>
										<td>
											<b> Tax </b>
										</td>
										<td class="text-right">
											<b> <?php echo currency($sum_tax,2); ?> </b>
										</td>
									</tr>
									<tr>
										<td class="hidden-xs "></td>
										<td></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs"></td>
										<td class="hidden-sm hidden-xs text-right"></td>
										<td>
											<b> Net Total </b>
										</td>
										<td class="text-right">
											<b> <?php echo currency($sum_income-($sum_tax+$sum_expend),2); ?> </b>
										</td>
									</tr>
								</tbody>
							  </table>
							</div>
						  </div>
						
                    </div>
                    <div class="tab-pane <?php if($uri[1]=="transfer"){ echo "active"; }?> row <?php if($me['jWallet']<10){ echo "hidden";};?>" id="tab2">
					<?php
					if($transfer_status=="success"){
					?>
						<div class="alert alert-success">
						  <button class="close" data-dismiss="alert" type="button">&times;</button><?php echo wordvar('Transfer success.');?>
						</div>
					<?php
					}elseif($transfer_status=="error"){
					?>
						<div class="alert alert-danger">
						  <button class="close" data-dismiss="alert" type="button">&times;</button><?php echo wordvar('Sorry something wrong! Please try again.');?>
						</div>
					<?php
					}
					?>
						
						<form action="<?php if($transfer_select_username!=""){ echo "$site_url/process"; }else{ echo $site_url."/wallet/transfer"; }?>" method="POST" class="form-horizontal">
						
						<div class="col-sm-<?php if($transfer_select_username!=""){ echo "6"; }else{ echo "12"; }?> text-center">
						  
							<h3>
							<?php echo wordvar('Transfer money to member');?>
							</h3>
							<?php
							if($transfer_select_username==""){
							?>
								<img src="<?php echo $site_main;?>/gallery/avatar/default.jpg" alt="..." height="120">
								<h2>
								<input name="transfer_select_username" autocomplete="off" class="members typeahead tt-query form-control  " dir="auto" placeholder="<?php echo wordvar('Search').wordvar('username');?>  " spellcheck="false" type="text" autofocus required>
								<input type="hidden" name="return" value="<?php echo $site_url;?>/wallet/transfer">
								</h2>
								<button type="submit" class="btn btn-primary" style="margin-top:5px;"><?php echo wordvar('Select').wordvar('Member');?></button>
							<?php
							}else{
								$receiver=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE member_username='".$_REQUEST['transfer_select_username']."'"));
							?>
								<img src="<?php echo $site_main;?>/gallery/avatar/<?php echo $receiver['member_avatar'];?>" alt="..." height="120">
								<br>
								<h1><?php echo $receiver['member_name']."  ".$receiver['member_surname'];?></br>
								<small>(<?php echo $receiver['member_username'];?>)</small>
								</h1>
							
								<a href="<?php echo $site_url;?>/wallet/transfer" class="btn btn-default" style="margin-top:5px;"><?php echo wordvar('Change');?></a>
								
							<?php
							}
							?>
						</div>
						<?php
						if($transfer_select_username!=""){
						?>
						<div class="col-sm-6 text-center">
							<h3>
								<?php echo wordvar('From');?> J-Wallet
							</h3>
							<h1  style="font-weight:100">
							<img src="<?php echo $site_dir;?>/images/wallet.png" style="height: 100px;" align="center">
							  $<?php echo number_format($me['jWallet'],2);?>
							</h1>
							  <div class="form-group">
								<label class="control-label col-md-3"><?php echo wordvar('Transfer amount');?>:</label>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">$</span>
										<input class="form-control text-right" type="number" min="10" max="<?php echo $me['jWallet'];?>" value="10" name="transfer_amount" autofocus required><span class="input-group-addon">.00</span>
									</div>
								  <!--select class="form-control" name="transfer_amount" autofocus>
									<?php
									if($me['jWallet']>=10){
										echo '<option value="10">'.currency(10).'</option>';
									}
									if($me['jWallet']>=30){
										echo '<option value="30">'.currency(30).'</option>';
									}
									if($me['jWallet']>=50){
										echo '<option value="50">'.currency(50).'</option>';
									}
									if($me['jWallet']>=100){
										echo '<option value="100">'.currency(100).'</option>';
									}
									if($me['jWallet']>=300){
										echo '<option value="300">'.currency(300).'</option>';
									}
									if($me['jWallet']>=500){
										echo '<option value="500">'.currency(500).'</option>';
									}
									if($me['jWallet']>=1000){
										echo '<option value="1000">'.currency(1000).'</option>';
									}
									
									?>					
								  </select-->
								</div>
							</div>		
							
							<input type="hidden" name="transfer_to_username" value="<?php echo $_REQUEST['transfer_select_username'];?>">
							<input type="hidden" name="return" value="<?php echo $site_url;?>/wallet/transfer">
							<input type="hidden" name="process" value="transfer_jWallet">
							
							
							<div class="form-group">
								<label for="TransferPassword" class="control-label col-md-3"><?php echo wordvar('Password');?></label>
								<div class="col-md-6">
									<div class="input-group">
										<input class="form-control" id="TransferPassword" name="transfer_password" type="password" placeholder="<?php echo wordvar('Enter_your_password');?>" required>
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary"><?php echo wordvar('Transfer');?></button>
										</span>
									</div>
								</div>
							</div>
								
						</div>
						<?php
						}
						?>
						</form>
                    </div>
					
                    <div class="tab-pane <?php if($uri[1]=="withdraw"){ echo "active"; }?> row <?php if($me['jWallet']<10){ echo "hidden";};?>" id="tab3">
					<?php
					isset($_REQUEST['request_status']) ? $request_status=$_REQUEST['request_status'] : $request_status=null;
					$requested_query=mysqli_query($connect,"SELECT * FROM withdraw WHERE member_id=$me_login AND withdraw_status='requested'");
					$requested_check=mysqli_num_rows($requested_query)+0;
					if($requested_check==0){
						if($request_status=="success"){
						?>
							<div class="alert alert-success">
								<button class="close" data-dismiss="alert" type="button">&times;</button><?php echo wordvar('Request withdraw success');?>
							</div>
						<?php
						}elseif($request_status=="error"){
						?>
							<div class="alert alert-danger">
								<button class="close" data-dismiss="alert" type="button">&times;</button><?php echo wordvar('Sorry something wrong! please check and try again');?>
							</div>
						<?php
						}
						?>
						<div class="col-sm-12 text-center">
						<h1>
							<?php echo wordvar('The request to withdraw from the system');?>
						</h1>
						<!--p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque imperdiet auctor purus, non imperdiet sapien dapibus non. Phasellus pretium rutrum elit in cursus. Donec ullamcorper nec massa vel mattis. Curabitur eros metus, dapibus quis est et, dapibus imperdiet dolor.
						</p-->
						</div>
						<form action="<?php echo "$site_url/process";?>" method="POST" class="form-horizontal">
						
						<div class="col-sm-6 text-center">
						  
							<h3>
								<?php echo wordvar('From');?> J-Wallet
							</h3>
							<h1  style="font-weight:100">
							<img src="<?php echo $site_dir;?>/images/wallet.png" style="height: 100px;" align="center">
							  $<?php echo number_format($me['jWallet'],2);?>
							</h1>
							  <div class="form-group">
								<label class="control-label col-md-3"><?php echo wordvar('Withdraw amount');?>:</label>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">$</span>
										<input class="form-control text-right" type="number" min="10" max="<?php echo $me['jWallet'];?>" value="10" name="withdraw_amount" autofocus required><span class="input-group-addon">.00</span>
									</div>
								  <!--select class="form-control" name="transfer_amount" autofocus>
									<?php
									if($me['jWallet']>=50){
										echo '<option value="50">50</option>';
									}
									if($me['jWallet']>=100){
										echo '<option value="100">100</option>';
									}
									if($me['jWallet']>=300){
										echo '<option value="300">300</option>';
									}
									if($me['jWallet']>=500){
										echo '<option value="500">500</option>';
									}
									if($me['jWallet']>=1000){
										echo '<option value="1000">1000</option>';
									}
									
									?>					
								  </select-->
								</div>
							</div>
						</div>
						<div class="col-sm-6 text-center">
							<div>

						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
							<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
							<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
							<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">...</div>
							<div role="tabpanel" class="tab-pane" id="profile">...</div>
							<div role="tabpanel" class="tab-pane" id="messages">...</div>
							<div role="tabpanel" class="tab-pane" id="settings">...</div>
						  </div>

						</div>
						
						
						
							<h3>
							<?php echo wordvar('To bank account');?>
							</h3>
							<div class="form-group">
								<label for="account_bank" class="control-label col-md-3"><?php echo wordvar('Bank name');?></label>
								<div class="col-md-6">
									<input class="form-control" id="account_bank" name="account_bank" type="text" required>
								</div>
							</div>
							<div class="form-group">
								<label for="account_name" class="control-label col-md-3"><?php echo wordvar('Account name');?></label>
								<div class="col-md-6">
									<input class="form-control" id="account_name" name="account_name" type="text" required>
								</div>
							</div>
							<div class="form-group">
								<label for="account_number" class="control-label col-md-3"><?php echo wordvar('Account number');?></label>
								<div class="col-md-6">
									<input class="form-control" id="account_number" name="account_number" type="text" required>
								</div>
							</div>
							<div class="form-group">
								<label for="withdraw_password" class="control-label col-md-3"><?php echo wordvar('Enter_password');?></label>
								<div class="col-md-6">
									<div class="input-group">
										<input class="form-control" id="withdraw_password" name="withdraw_password" type="password" placeholder="<?php echo wordvar('Enter_your_password')?>" required>
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary"><?php echo wordvar('Withdraw');?></button>
										</span>
									</div>
								</div>
							</div>
							<input type="hidden" name="return" value="<?php echo $site_url;?>/wallet/withdraw">
							<input type="hidden" name="process" value="withdraw_request">
								
							<button type="submit" class="btn btn-primary" style="margin-top:5px;display:none;">Transfer</button>
						</div>
						</form>
					<?php
					}else{
					?>
						<div class="col-sm-12">
							<h3>
							
							</h3>
														  
								<table class="table table-striped">
								<thead>
									<th width="60">

									</th>
									<th>
										Date
									</th>
									<th>
										Withdraw amount
									</th>
									<th>
										Bank account
									</th>
									<th>
										Account name
									</th>
									<th>
										Account number
									</th>
									<th>
										Status
									</th>
								</thead>
								<tbody>
								<?php
								$i=1;
								$withdraw_query=mysqli_query($connect,"SELECT * FROM withdraw WHERE member_id=$me_login ");
								while($withdraw=mysqli_fetch_array($withdraw_query)){
								?>
								<tr>
									<td>
										<?php echo $i++;?>
									</td>
									<td>
										<?php echo $withdraw['withdraw_date'];?>
									</td>
									<td>
										<?php echo currency($withdraw['withdraw_amount'])?>
									</td>
									<td>
										<?php echo $withdraw['account_bank'];?>
									</td>
									<td class="hidden-xs">
										<?php echo $withdraw['account_name'];?>
									</td>
									<td class="hidden-xs">
									  <?php echo $withdraw['account_number'];?>
									</td>
									<td>								
									<?php
									if($withdraw['withdraw_status']=='approved'){
										echo '<span class="label label-success">Approved</span>';
									}elseif($withdraw['withdraw_status']=='requested'){
										echo '<span class="label label-warning">Requesting</span>';
									}elseif($withdraw['withdraw_status']=='rejected'){
										echo '<span class="label label-danger">Rejected</span>';
									}
									?>
									</td>
								</tr>
								<?php
								}
								?>
							  </tbody>
							</table>
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
    </div>
	
	<script src="<?php echo $site_dir;?>/javascripts/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
	<script>
	$(document).ready(function() {
		
		if ($('.typeahead').length) {
		  $(".members.typeahead").typeahead({
			name: "members",
			local: 
			[
			<?php
			echo '"'.$me['member_username'].'"';
			$member_sql="SELECT member_id,member_username FROM members";

			$member_query=mysqli_query($connect,$member_sql);
			while($members=mysqli_fetch_array($member_query)){
					echo ','.'"'.$members['member_username'].'"';
			}
			?>
			]
		  });
		}
	});
	</script>
	<script type="text/javascript">
            $(function () {
                $("#datetimepicker2").datetimepicker({format: 'yyyy-mm-dd hh:ii', autoclose: true});
            });
        </script>
  </body>
</html>