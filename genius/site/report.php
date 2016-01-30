<?php
$date_start=$_REQUEST['date_start'];
$date_end=$_REQUEST['date_end'];
if($date_start==""){
	$date_start=date('Y-m-d 00:00');
}
if($date_end==""){
	$date_end=date('Y-m-d H:i');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">
    <title><?php echo $site_title;?></title>
    <!--Core CSS -->
    <link href="<?php echo $site_dir;?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $site_dir;?>/css/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/bootstrap-timepicker/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $site_dir;?>/js/select2/select2.css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo $site_dir;?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/style-responsive.css" rel="stylesheet" />
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<?php 
include "header.php";
include "sidebar.php";
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
            <div class="row">
            <div class="col-sm-12">
				<div class="row">
				<div class="col-sm-6">
				<form class="form-group" action="#" method="get">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input size="16" type="text" name="date_start"  data-date-format="Y-m-d H:i" value="<?php if($date_start!=''){echo $date_start; }else{ echo date('Y-m-d H:i'); }?>" class="form_datetime form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input size="16" type="text" name="date_end"  data-date-format="Y-m-d H:i" value="<?php if($date_end!=''){echo $date_end; }else{ echo date('Y-m-d H:i'); }?>" class="form_datetime form-control">
                                </div>
								<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
								<input type="hidden" name="page"  value="report">
                            </div>
				</form>
				</div>
				</div>
				<section class="panel">
					<header class="panel-heading tab-bg-dark-navy-blue ">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#income">Income</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#expend">Expenditure</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#pv">Paid PV</a>
							</li>
						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content">
							<div id="income" class="tab-pane active">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>Date</th>
												<th>Fullname</th>
												<th>Username</th>
												<th>Status</th>
												<th>Package</th>
												<th>Bonus</th>
												<th>Income</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$total_expend=0;
											$total_member=0;
											$member_query=mysqli_query($connect,"SELECT * FROM transactions LEFT JOIN members ON transactions.member_id=members.member_id WHERE transaction='pay' AND transaction_date>='$date_start' AND transaction_date<='$date_end' order by transaction_date DESC");
											while($member=mysqli_fetch_array($member_query)){
											$member_id=$member['member_id'];
											$total_expend=$total_expend+$member['expend'];
											$total_member++;
											?>
											<tr>
												<td><?php echo $member['transaction_date'];?></td>
												<td><?php echo "(".$member['member_id'].") ".$member['member_name'];?></td>
												<td><?php echo $member['member_username'];?></td>
												<td><?php echo $member['member_status'];?></td>
												<td><?php echo select_data('packages','package_name',"package_id=".$member['package_id']);?></td>
												<td><?php echo select_data('bonus','bonus_name',"bonus_id=".$member['bonus_id']);?><?php echo $member['transaction_description'];?></td>
												<td><?php echo number_format($member['expend'],2);?></td>
											</tr>
											<?php
											}
											?>
											<tr>
												<td colspan="2" align="right"><b>Total</b></td>
												<td><b><?php echo $total_member;?></b></td>
												<td></td>
												<td></td>
												<td></td>
												<td align="right"><b><?php echo number_format($total_expend,2);?></b></td>
											</tr>
											</tbody>
										</table>
							</div>
							<div id="expend" class="tab-pane">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>Date</th>
												<th>Fullname</th>
												<th>Username</th>
												<th>Status</th>
												<th>Package</th>
												<th>Bonus</th>
												<th>Income</th>
											</tr>
											</thead>
											<tbody>
												<?php
												$total_expend=0;
												$total_member=0;
												$member_query=mysqli_query($connect,"SELECT * FROM transactions LEFT JOIN members ON transactions.member_id=members.member_id WHERE transaction='receive' AND bonus_id>=1 AND transaction_date>='$date_start'  AND transaction_date<='$date_end' order by transaction_date DESC");
												while($member=mysqli_fetch_array($member_query)){
												$member_id=$member['member_id'];
												$total_expend=$total_expend+$member['income'];
												$total_member++;
												?>
											<tr>
												<td><?php echo $member['transaction_date'];?></td>
												<td><?php echo "(".$member['member_id'].") ".$member['member_name'];?></td>
												<td><?php echo $member['member_username'];?></td>
												<td><?php echo $member['member_status'];?></td>
												<td><?php echo select_data('packages','package_name',"package_id=".$member['package_id']);?></td>
												<td><?php echo select_data('bonus','bonus_name',"bonus_id=".$member['bonus_id']);?></td>
												<td><?php echo number_format($member['income'],2);?></td>
											</tr>
											<?php
											}
											?>
											<tr>
												<td colspan="2" align="right"><b>Total</b></td>
												<td><b><?php echo $total_member;?></b></td>
												<td></td>
												<td></td>
												<td></td>
												<td align="right"><b><?php echo number_format($total_expend,2);?></b></td>
											</tr>
											</tbody>
										</table>
							</div>
							<div id="pv" class="tab-pane">
								<table class="table table-striped">
											<thead>
											<tr>
												<th>Date</th>
												<th>Fullname</th>
												<th>Username</th>
												<th>Products</th>
												<th>QTY</th>
												<th>Total PV</th>
												<th>Total Price</th>
												<th>Total Cost</th>
												<th>Total Margin</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$i=0;
											$items_query=mysqli_query($connect,"SELECT * FROM orders INNER JOIN order_items ON orders.order_id=order_items.order_id  WHERE order_date>='$date_start' AND order_date<='$date_end' order by order_date DESC");
											while($items=mysqli_fetch_array($items_query)){
											$i++;
											?>	
											<tr>
												<td><?php echo $items['order_date'];?></td>
												<td><?php echo "(".$items['member_id'].") ".selectname('members','member_name','member_id',$items['member_id']);?></td>
												<td><?php echo selectname('members','member_username','member_id',$items['member_id']);?></td>
												<td><?php echo selectname('products','product_name','product_id',$items['product_id']);?></td>
												<td>
													<?php echo $items['item_qty'];?>
												</td>
												<td>
													<?php $product_pv=selectname('products','product_point','product_id',$items['product_id']);?>
													<?
													echo $pv_qty=$product_pv*$items['item_qty'];
													$total_pv+=$pv_qty;
													?>
												</td>
												<td>
													<?php //total price
													$product_price=selectname('products','product_price_member','product_id',$items['product_id']);
													echo $sum_price=$items['item_qty']*$product_price; 
													//echo $sum_price=$items['order_total']; 
													$total_price+=$sum_price;
													?>
												</td>
												<td>
													<?php $product_cost=selectname('products','product_cost','product_id',$items['product_id']);
													echo $total_cost=$product_cost*$items['item_qty'];
													?>
												</td>
												<td>
													<?php echo $sum_price-$total_cost; ?>
												</td>
											</tr>
											<?php
											}
											?>
											<tr>
												<td colspan="4" align="right"></td>
												<td align="right"><b>Total PV</b></td>
												<td><b><?php echo number_format($total_pv);?></b></td>
												<td olspan="2" align="right"><b>Total Price</b></td>
												<td><b><?php echo number_format($total_price-$total_cost);?><b></td>
												<td></td>
											</tr>
											</tbody>
										</table>
							</div>
						</div>
					</div>
				</section>
            </div>
        </div>
            
            
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->
<?php include "sidebar_right.php";?>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo $site_dir;?>/js/jquery.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo $site_dir;?>/bs3/js/bootstrap.min.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery-ui-1.9.2.custom.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $site_dir;?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $site_dir;?>/js/easypiechart/jquery.easypiechart.js"></script>
<script src="<?php echo $site_dir;?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.nicescroll.js"></script>

<script src="<?php echo $site_dir;?>/js/bootstrap-switch.js"></script>

<script type="text/javascript" src="<?php echo $site_dir;?>/js/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<script type="text/javascript" src="<?php echo $site_dir;?>/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script type="text/javascript" src="<?php echo $site_dir;?>/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="<?php echo $site_dir;?>/js/jquery-tags-input/jquery.tagsinput.js"></script>

<script src="<?php echo $site_dir;?>/js/select2/select2.js"></script>
<script src="<?php echo $site_dir;?>/js/select-init.js"></script>


<!--common script init for all pages-->
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>

<script src="<?php echo $site_dir;?>/js/toggle-init.js"></script>

<script src="<?php echo $site_dir;?>/js/advanced-form.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo $site_dir;?>/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo $site_dir;?>/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.pie.resize.js"></script>

</body>
</html>
