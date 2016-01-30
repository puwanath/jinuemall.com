<?php
$date_start=$_REQUEST['date_start'];
$date_end=$_REQUEST['date_end'];
if($date_start==""){
	$date_start=date('Y-m-d 00:00');
}
if($date_end==""){
	$date_end=date('Y-m-d H:i');
}


$inputsubmit = $_GET['submit'];
if($inputsubmit=="ok"){
	
	$orderstatus = $_GET['status'];
	$orderid = $_GET['id'];
	$emscode = $_GET['emscode'];
	if(isset($orderstatus)){
		
		mysqli_query($connect,"UPDATE orders SET order_status = '$orderstatus', order_emscode = '$emscode' where order_id = '$orderid' ");
		header('LOCATION: '.$site_url.'/orders');
	}
	
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
								<a data-toggle="tab" href="#orders">Orders</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#orderpending">Order Pending</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#ordercomplete">Order Complate</a>
							</li>
						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content">
							<div id="orders" class="tab-pane active">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>Order ID</th>
												<th>Date</th>
												<th>Fullname</th>
												<th align="right">Total</th>
												<th align="right">Discount</th>
												<th>Payment</th>
												<th>Order Status</th>
												<th>Ems Code</th>
											</tr>
											</thead>
											<tbody>
											<?php
											
											$total_price = 0;
											$total_order = 0;
											$orders_query = mysqli_query($connect,"select * from orders where order_date>='$date_start' and order_date<='$date_end' order by order_date DESC ");
											while($orders=mysqli_fetch_array($orders_query)){
											$member_id=$orders['member_id'];
											$total_price+=$orders['order_total'];
											$total_order++;
											?>
											<tr>
												<td><a href="" data-toggle="modal" data-target="#myDetail_<?php echo $orders['order_id'];?>"><span class="label label-info"><?php echo $orders['order_id'];?></span></a></td>
												<td><?php echo $orders['order_date'];?></td>
												<td><?php echo "(".$orders['member_id'].") ".selectname('members','member_name','member_id',$orders['member_id'])." ".selectname('members','member_surname','member_id',$orders['member_id']);?></td>
												<td><?php echo $orders['order_total'];?></td>
												<td><?php echo $orders['order_discount'];?></td>
												<td><?php echo typepayment($orders['payment_method']);?></td>
												<td>
												
													<div class="btn-group">
													  <?php 
													  if($orders['order_status']=="paid"){
														  $cssbtn = "btn-info";
													  }elseif($orders['order_status']=="sent"){
														  $cssbtn = "btn-success";
													  }elseif($orders['order_status']=="pending"){
														  $cssbtn = "btn-dunger";
													  }
													  
													  
													  ?>
													  <button type="button" class="btn <?php echo $cssbtn;?> btn-xs"><?php echo $orders['order_status'];?></button>
													  <button type="button" class="btn <?php echo $cssbtn;?> btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span> 
													  </button>
													  <ul class="dropdown-menu">
														<li><a href="#" data-toggle="modal" data-target="#myReceive_<?php echo $orders['order_id'];?>">Received</a></li>
														<li><a href="#" data-toggle="modal" data-target="#myEms_<?php echo $orders['order_id'];?>">Shipping To Ems</a></li>
														<li><a href="<?php echo $site_url;?>/orders?status=pending&id=<?php echo $orders['order_id'];?>&submit=ok">Pending</a></li>
														<li><a href="<?php echo $site_url;?>/orders?status=paid&id=<?php echo $orders['order_id'];?>&submit=ok">Paid</a></li>
													  </ul>
													</div>
												
												</td>
												<td><?php if($orders['order_emscode']!=''){echo $orders['order_emscode'];}else{echo "N/A";}?></td>
											</tr>
											
											<!-- modal product detail-->
											<div class="modal fade" id="myDetail_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Order Details from Order ID : <?php echo $orders['order_id'];?></h4>
												  </div>
												  <div class="modal-body">
														<div>
														<ul class="list-group">
														<?php 
														$query_orderdetail = mysqli_query($connect,"select * from order_items where order_id = '".$orders['order_id']."' order by item_id asc");
														while($reitems = mysqli_fetch_object($query_orderdetail)){
														?>
															<li class="list-group-item"><?php echo "<b>(".$reitems->product_id.")</b> ".selectname('products','product_name','product_id',$reitems->product_id);?>  <span class="badge">QTY : <?php echo $reitems->item_qty;?></span><span class="badge">PRICE : <?php echo selectname('products','product_price_member','product_id',$reitems->product_id);?></span></li>
														<?php	
														}
														
														?>
														</ul>
														</div>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												  </div>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											<!-- modal product detail-->
											<div class="modal fade" id="myEms_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Input EMS Number</h4>
												  </div>
												  <form name="frm" method="get" action="">
												  
												  <div class="modal-body">
														<div class="form-group">
															<input type="hidden" name="submit" value="ok"/>
															<input type="hidden" name="status" value="sent"/>
															<input type="hidden" name="id" value="<?php echo $orders['order_id'];?>"/>
															<input type="text" name="emscode"  class="form-control"  />
														</div>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save</button>
												  </div>
												  
												  </form>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											<!-- modal product detail-->
											<div class="modal fade" id="myReceive_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">ยืนยันการส่งสินค้า</h4>
												  </div>
												  <form method="GET" action="" name="frm">
													
												  <div class="modal-body" align="center">
														<input type="hidden" name="submit" value="ok"/>
														<input type="hidden" name="id" value="<?php echo $orders['order_id'];?>"/>
														<input type="hidden" name="status" value="sent"/>
														<button type="submit" class="btn btn-primary btn-lg">กดยืนยันการส่งสินค้า</button>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												  </div>
												  
												  </form>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											
											<!--end products-->
											<?php
											}
											?>
											<tr>
												<td colspan="2" align="right"><b>Total</b></td>
												<td><b><?php echo $total_order;?></b></td>
												<td><b><?php echo number_format($total_price,2);?></b></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											</tbody>
										</table>
							</div>
							<div id="orderpending" class="tab-pane">
										<table class="table table-striped">
											<thead>
											<tr>
												<th>Order ID</th>
												<th>Date</th>
												<th>Fullname</th>
												<th align="right">Total</th>
												<th align="right">Discount</th>
												<th>Payment</th>
												<th>Order Status</th>
												<th>Ems Code</th>
											</tr>
											</thead>
											<tbody>
											<?php
											
											$total_price = 0;
											$total_order = 0;
											$orders_query = mysqli_query($connect,"select * from orders where order_status = 'pending' order by order_date DESC ");
											while($orders=mysqli_fetch_array($orders_query)){
											$member_id=$orders['member_id'];
											$total_price+=$orders['order_total'];
											$total_order++;
											?>
											<tr>
												<td><a href="" data-toggle="modal" data-target="#myDetail_<?php echo $orders['order_id'];?>"><span class="label label-info"><?php echo $orders['order_id'];?></span></a></td>
												<td><?php echo $orders['order_date'];?></td>
												<td><?php echo "(".$orders['member_id'].") ".selectname('members','member_name','member_id',$orders['member_id'])." ".selectname('members','member_surname','member_id',$orders['member_id']);?></td>
												<td><?php echo $orders['order_total'];?></td>
												<td><?php echo $orders['order_discount'];?></td>
												<td><?php echo typepayment($orders['payment_method']);?></td>
												<td>
												
													<div class="btn-group">
													  <?php 
													  if($orders['order_status']=="paid"){
														  $cssbtn = "btn-info";
													  }elseif($orders['order_status']=="sent"){
														  $cssbtn = "btn-success";
													  }elseif($orders['order_status']=="pending"){
														  $cssbtn = "btn-dunger";
													  }
													  
													  
													  ?>
													  <button type="button" class="btn <?php echo $cssbtn;?> btn-xs"><?php echo $orders['order_status'];?></button>
													  <button type="button" class="btn <?php echo $cssbtn;?> btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span> 
													  </button>
													  <ul class="dropdown-menu">
														<li><a href="#" data-toggle="modal" data-target="#myReceive_<?php echo $orders['order_id'];?>">Received</a></li>
														<li><a href="#" data-toggle="modal" data-target="#myEms_<?php echo $orders['order_id'];?>">Shipping To Ems</a></li>
														<li><a href="<?php echo $site_url;?>/orders?status=pending&id=<?php echo $orders['order_id'];?>&submit=ok">Pending</a></li>
														<li><a href="<?php echo $site_url;?>/orders?status=paid&id=<?php echo $orders['order_id'];?>&submit=ok">Paid</a></li>
													  </ul>
													</div>
												
												</td>
												<td><?php if($orders['order_emscode']!=''){echo $orders['order_emscode'];}else{echo "N/A";}?></td>
											</tr>
											
											<!-- modal product detail-->
											<div class="modal fade" id="myDetail_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Order Details from Order ID : <?php echo $orders['order_id'];?></h4>
												  </div>
												  <div class="modal-body">
														<div>
														<ul class="list-group">
														<?php 
														$query_orderdetail = mysqli_query($connect,"select * from order_items where order_id = '".$orders['order_id']."' order by item_id asc");
														while($reitems = mysqli_fetch_object($query_orderdetail)){
														?>
															<li class="list-group-item"><?php echo "<b>(".$reitems->product_id.")</b> ".selectname('products','product_name','product_id',$reitems->product_id);?>  <span class="badge">QTY : <?php echo $reitems->item_qty;?></span><span class="badge">PRICE : <?php echo selectname('products','product_price_member','product_id',$reitems->product_id);?></span></li>
														<?php	
														}
														
														?>
														</ul>
														</div>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												  </div>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											<!-- modal product detail-->
											<div class="modal fade" id="myEms_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Input EMS Number</h4>
												  </div>
												  <form name="frm" method="get" action="">
												  
												  <div class="modal-body">
														<div class="form-group">
															<input type="hidden" name="submit" value="ok"/>
															<input type="hidden" name="status" value="sent"/>
															<input type="hidden" name="id" value="<?php echo $orders['order_id'];?>"/>
															<input type="text" name="emscode"  class="form-control"  />
														</div>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save</button>
												  </div>
												  
												  </form>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											<!-- modal product detail-->
											<div class="modal fade" id="myReceive_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">ยืนยันการส่งสินค้า</h4>
												  </div>
												  <form method="GET" action="" name="frm">
													
												  <div class="modal-body" align="center">
														<input type="hidden" name="submit" value="ok"/>
														<input type="hidden" name="id" value="<?php echo $orders['order_id'];?>"/>
														<input type="hidden" name="status" value="sent"/>
														<button type="submit" class="btn btn-primary btn-lg">กดยืนยันการส่งสินค้า</button>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												  </div>
												  
												  </form>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											
											<!--end products-->
											<?php
											}
											?>
											<tr>
												<td colspan="2" align="right"><b>Total</b></td>
												<td><b><?php echo $total_order;?></b></td>
												<td><b><?php echo number_format($total_price,2);?></b></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											</tbody>
										</table>
							</div>
							<div id="ordercomplete" class="tab-pane">
								<table class="table table-striped">
											<thead>
											<tr>
												<th>Order ID</th>
												<th>Date</th>
												<th>Fullname</th>
												<th align="right">Total</th>
												<th align="right">Discount</th>
												<th>Payment</th>
												<th>Order Status</th>
												<th>Ems Code</th>
											</tr>
											</thead>
											<tbody>
											<?php
											
											$total_price = 0;
											$total_order = 0;
											$orders_query = mysqli_query($connect,"select * from orders where order_status = 'sent' and order_date>='$date_start' and order_date<='$date_end' order by order_date DESC ");
											while($orders=mysqli_fetch_array($orders_query)){
											$member_id=$orders['member_id'];
											$total_price+=$orders['order_total'];
											$total_order++;
											?>
											<tr>
												<td><a href="" data-toggle="modal" data-target="#myDetail2_<?php echo $orders['order_id'];?>"><span class="label label-info"><?php echo $orders['order_id'];?></span></a></td>
												<td><?php echo $orders['order_date'];?></td>
												<td><?php echo "(".$orders['member_id'].") ".selectname('members','member_name','member_id',$orders['member_id'])." ".selectname('members','member_surname','member_id',$orders['member_id']);?></td>
												<td><?php echo $orders['order_total'];?></td>
												<td><?php echo $orders['order_discount'];?></td>
												<td><?php echo typepayment($orders['payment_method']);?></td>
												<td>
												
													<div class="btn-group">
													  <?php 
													  if($orders['order_status']=="paid"){
														  $cssbtn = "btn-info";
													  }elseif($orders['order_status']=="sent"){
														  $cssbtn = "btn-success";
													  }elseif($orders['order_status']=="pending"){
														  $cssbtn = "btn-dunger";
													  }
													  
													  
													  ?>
													  <button type="button" class="btn <?php echo $cssbtn;?> btn-xs"><?php echo $orders['order_status'];?></button>
													  <button type="button" class="btn <?php echo $cssbtn;?> btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span> 
													  </button>
													  <ul class="dropdown-menu">
														<li><a href="#" data-toggle="modal" data-target="#myReceive2_<?php echo $orders['order_id'];?>">Received</a></li>
														<li><a href="#" data-toggle="modal" data-target="#myEms2_<?php echo $orders['order_id'];?>">Shipping To Ems</a></li>
														<li><a href="<?php echo $site_url;?>/orders?status=pending&id=<?php echo $orders['order_id'];?>&submit=ok">Pending</a></li>
														<li><a href="<?php echo $site_url;?>/orders?status=paid&id=<?php echo $orders['order_id'];?>&submit=ok">Paid</a></li>
													  </ul>
													</div>
												
												</td>
												<td><?php if($orders['order_emscode']!=''){echo $orders['order_emscode'];}else{echo "N/A";}?></td>
											</tr>
											
											<!-- modal product detail-->
											<div class="modal fade" id="myDetail2_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Order Details from Order ID : <?php echo $orders['order_id'];?></h4>
												  </div>
												  <div class="modal-body">
														<div>
														<ul class="list-group">
														<?php 
														$query_orderdetail = mysqli_query($connect,"select * from order_items where order_id = '".$orders['order_id']."' order by item_id asc");
														while($reitems = mysqli_fetch_object($query_orderdetail)){
														?>
															<li class="list-group-item"><?php echo "<b>(".$reitems->product_id.")</b> ".selectname('products','product_name','product_id',$reitems->product_id);?>  <span class="badge">QTY : <?php echo $reitems->item_qty;?></span><span class="badge">PRICE : <?php echo selectname('products','product_price_member','product_id',$reitems->product_id);?></span></li>
														<?php	
														}
														
														?>
														</ul>
														</div>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												  </div>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											<!-- modal product detail-->
											<div class="modal fade" id="myEms2_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Input EMS Number</h4>
												  </div>
												  <form name="frm" method="get" action="">
												  
												  <div class="modal-body">
														<div class="form-group">
															<input type="hidden" name="submit" value="ok"/>
															<input type="hidden" name="status" value="sent"/>
															<input type="hidden" name="id" value="<?php echo $orders['order_id'];?>"/>
															<input type="text" name="emscode"  class="form-control"  />
														</div>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save</button>
												  </div>
												  
												  </form>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											<!-- modal product detail-->
											<div class="modal fade" id="myReceive2_<?php echo $orders['order_id'];?>" tabindex="-1" role="dialog">
											  <div class="modal-dialog">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">ยืนยันการส่งสินค้า</h4>
												  </div>
												  <form method="GET" action="" name="frm">
													
												  <div class="modal-body" align="center">
														<input type="hidden" name="submit" value="ok"/>
														<input type="hidden" name="id" value="<?php echo $orders['order_id'];?>"/>
														<input type="hidden" name="status" value="sent"/>
														<button type="submit" class="btn btn-primary btn-lg">กดยืนยันการส่งสินค้า</button>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												  </div>
												  
												  </form>
												</div><!-- /.modal-content -->
											  </div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
											
											<!--end products-->
											<?php
											}
											?>
											<tr>
												<td colspan="2" align="right"><b>Total</b></td>
												<td><b><?php echo $total_order;?></b></td>
												<td><b><?php echo number_format($total_price,2);?></b></td>
												<td></td>
												<td></td>
												<td></td>
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
