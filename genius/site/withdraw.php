<?php
$order_search=$_REQUEST['order_search'];
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

    <!--dynamic table-->
    <link href="<?php echo $site_dir;?>/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo $site_dir;?>/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.css" />

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
                <section class="panel">
                    <header class="panel-heading">
                        <i class="fa fa-users"></i> Member
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped table-hover" id="dynamic-table-w">
                    <thead>
                    <tr>
                        <th>Order Date</th>
						<th>Fullname</th>
						<th>Username</th>
						<th>Shipping</th>
						<th ailgn="right">Price</th>
						<th align="right">Status</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$withdraws_sql="SELECT * FROM withdraw LEFT JOIN members ON withdraw.member_id=members.member_id ";
					if($search!=""){
					$withdraws_sql.=" WHERE member_name LIKE '%$search%' OR member_username LIKE '%$search%' OR withdraw_date LIKE '%$search%' ";
					}
					$withdraws_sql.=" ORDER BY withdraw_date DESC ";
					$withdraws_query=mysqli_query($connect,$withdraws_sql);
					while($withdraws=mysqli_fetch_array($withdraws_query)){
					?>
                    <tr>
						  <td><?php echo $withdraws['withdraw_date'];?></td>
						  <td><?php echo $withdraws['member_name']."  ".$withdraws['member_surname'];?></td>
						  <td><?php echo $withdraws['member_username'];?></td>
						  <td><?php echo $withdraws['account_bank'];?></td>
						  <td align="right">฿<?php echo number_format($withdraws['withdraw_amount']*35);?></td>
						  <td align="center">
							<?php
							if($withdraws['withdraw_status']=="requested"){
							?>
								<a href="#view_<?php echo $withdraws['withdraw_id'];?>" data-toggle="modal" class="btn btn-warning">
									ขอถอนเงิน
								</a>
							<?php
							}elseif($withdraws['withdraw_status']=="approved"){
							?>
								<a href="#view_<?php echo $withdraws['withdraw_id'];?>" data-toggle="modal" class="btn btn-link">
									โอนเงินแล้ว
								</a>
							<?php
							}elseif($withdraws['withdraw_status']=="rejected"){
							?>
								<a href="#view_<?php echo $withdraws['withdraw_id'];?>" data-toggle="modal" class="btn btn-danger">
									ยกเลิกแล้ว
								</a>
							<?php
							}
							?>
							<form action="<?php echo $site_url;?>/process" method="POST">
							<div id="view_<?php echo $withdraws['withdraw_id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel"><?php echo $withdraws['member_name']."  ".$withdraws['member_surname'];?></h4>
								  </div>
								  <div class="modal-body  ">
										<div class="row">
											วันที่ขอถอนเงิน : <?php echo $withdraws['withdraw_date'];?>
										</div>
									<table class="table table-hover" data-sort="table">
										<thead>						  
											<tr>
												<th>Money in J-Wallet:</th>
												<td>฿<?php echo number_format(select_data('members','jWallet',"member_id=".$withdraws['member_id'])*35);?></td>
											</tr>
										</thead>
										<tbody>
										<tr>
											<th>Withdraw amount:</th>
											<td>฿<?php echo number_format($withdraws['withdraw_amount']*35);?></td>
										</tr>
										<tr>
											<th>Bank account:</th>
											<td><?php echo $withdraws['account_bank'];?></td>
										</tr>
										<tr>
											<th>Account number:</th>
											<td><?php echo $withdraws['account_number'];?></td>
										</tr>
										<tr>
											<th>Account name:</th>
											<td><?php echo $withdraws['account_name'];?></td>
										</tr>
										</tbody>
									</table>
									
									
								  </div>
								  <div class="modal-footer">
										<input type="hidden" name="withdraw_id" value="<?php echo $withdraws['withdraw_id'];?>">
										<input type="hidden" name="process" value="withdraw_approve">
										<input type="hidden" name="goto" value="<?php echo $site_url;?>/withdraw">
										<?php
										if($withdraws['withdraw_status']=="requested"){
										?>
										<button class="btn btn-success" type="submit">
											โอนเงิน ฿<?php echo number_format($withdraws['withdraw_amount']*35);?> บาท
										</button>
										<?php
										}
										?>
										<button class="btn btn-link" type="button" data-dismiss="modal" >
											ปิด
										</button>
								  </div>
								</div>
							  </div>
							</div>
							</form>
						  </td>
					</tr>
					<?php
					}
					?>
                    </tbody>
                    </table>

                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<?php include "sidebar_right.php";?>

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo $site_dir;?>/js/jquery.js"></script>
<script src="<?php echo $site_dir;?>/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $site_dir;?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $site_dir;?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo $site_dir;?>/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo $site_dir;?>/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.pie.resize.js"></script>

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="<?php echo $site_dir;?>/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.js"></script>
<!--common script init for all pages-->
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>

<!--dynamic table initialization -->
<script src="<?php echo $site_dir;?>/js/dynamic_table_init.js"></script>

<script>
$(document).ready(function() {

    $('#dynamic-table-w').dataTable( {
        "aaSorting": [[ 0, "desc" ]]
    } );
} );
</script>

</body>
</html>
