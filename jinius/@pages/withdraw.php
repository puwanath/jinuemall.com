<?
$colors_arr=array("#1CA8DD","#1BC98E","#9F86FF","#E64759","#E4D836","#68C3A3","#D2D7D3");
$order_search=$_REQUEST['order_search'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>
        Withdraw &middot; JINIUS
    </title>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
      <link href="<?=$dir;?>/dashboard/css/toolkit-inverse.css" rel="stylesheet">
	  
    <link href="<?=$dir;?>/dashboard/css/docs.css" rel="stylesheet">
    <link href="<?=$dir;?>/dashboard/css/application.css" rel="stylesheet">
    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
	<script src="<?=$dir;?>/dashboard/dist/sweetalert.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="<?=$dir;?>/dashboard/dist/sweetalert.css">
  </head>
<body>
<div class="aot">
	<?
	include "navigation.php";
	?>
	<div class="bw">
		<div class="aoz">
		  <div class="apa">
			<h6 class="apc">Dashboards</h6>
			<h2 class="apb">withdraw</h2>
		  </div>

		  <div class="oc apd">
			<div class="tm aok">
			  <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
			  <span class="bv ws"></span>
			</div>
		  </div>
		</div>

		<div class="akf ud">
		  <div class="akg akh">
			<form action="" method="get">
			<div class="tm aok">
			  <input type="text" name="order_search" class="form-control aqp" placeholder="Search orders" value="<?=$order_search;?>">
			  <span class="bv adm"></span>
			</div>
			</form>
		  </div>
		  <div class="akg">
			<div class="oa">
			  <button type="button" class="ce apm">
				<span class="bv aey"></span>
			  </button>
			  <button type="button" class="ce apm">
				<span class="bv zy"></span>
			  </button>
			  
			</div>
		  </div>
		</div>

		<div class="uc">
		  <div class="eg">
			<table class="cl" data-sort="table">
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
				<?
				$withdraws_sql="SELECT * FROM withdraw LEFT JOIN members ON withdraw.member_id=members.member_id ";
				if($search!=""){
				$withdraws_sql.=" WHERE member_name LIKE '%$search%' OR member_username LIKE '%$search%' OR withdraw_date LIKE '%$search%' ";
				}
				$withdraws_sql.=" ORDER BY withdraw_date DESC ";
				$withdraws_query=mysql_query($withdraws_sql);
				while($withdraws=mysql_fetch_array($withdraws_query)){
				?>
				<tr>
				  <td><?=$withdraws['withdraw_date'];?></td>
				  <td><?=$withdraws['member_name']."  ".$withdraws['member_surname'];?></td>
				  <td><?=$withdraws['member_username'];?></td>
				  <td><?=$withdraws['account_bank'];?></td>
				  <td align="right">฿<?=number_format($withdraws['withdraw_amount']*35);?></td>
				  <td align="center">
					<?
					if($withdraws['withdraw_status']=="requested"){
					?>
						<a href="#view_<?=$withdraws['withdraw_id'];?>" data-toggle="modal" class="ce fe">
							ขอถอนเงิน
						</a>
					<?
					}elseif($withdraws['withdraw_status']=="approved"){
					?>
						<a href="#view_<?=$withdraws['withdraw_id'];?>" data-toggle="modal" class="ce apn">
							โอนเงินแล้ว
						</a>
					<?
					}elseif($withdraws['withdraw_status']=="rejected"){
					?>
						<a href="#view_<?=$withdraws['withdraw_id'];?>" data-toggle="modal" class="ce apl">
							ยกเลิกแล้ว
						</a>
					<? 
					}
					?>
					<form action="<?=$url;?>/process.php" method="POST">
					<div id="view_<?=$withdraws['withdraw_id'];?>" class="cb fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="rj">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel"><?=$withdraws['member_name']."  ".$withdraws['member_surname'];?></h4>
						  </div>
						  <div class="modal-body  ">
								<div class="row">
									วันที่ขอถอนเงิน : <?=$withdraws['withdraw_date'];?>
								</div>
							<table class="cl" data-sort="table" style="color:#ffffff;">
								<thead>						  
									<tr>
										<th>Money in J-Wallet:</th>
										<td>฿<?=number_format(mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=".$withdraws['member_id']),0)*35);?></td>
									</tr>
								</thead>
								<tbody>
								<tr>
									<th>Withdraw amount:</th>
									<td>฿<?=number_format($withdraws['withdraw_amount']*35);?></td>
								</tr>
								<tr>
									<th>Bank account:</th>
									<td><?=$withdraws['account_bank'];?></td>
								</tr>
								<tr>
									<th>Account number:</th>
									<td><?=$withdraws['account_number'];?></td>
								</tr>
								<tr>
									<th>Account name:</th>
									<td><?=$withdraws['account_name'];?></td>
								</tr>
								</tbody>
							</table>
							<input type="hidden" name="withdraw_id" value="<?=$withdraws['withdraw_id'];?>">
							<input type="hidden" name="process" value="withdraw_approve">
							<input type="hidden" name="return" value="<?=$url;?>/withdraw">
							<button class="ce apj fj" type="submit">
								โอนเงิน ฿<?=number_format($withdraws['withdraw_amount']*35);?> บาท
							</button>
							<button class="ce fm" type="button" data-dismiss="modal" >
								ยกเลิก
							</button>
							
						  </div>
						</div>
					  </div>
					</div>
					</form>
				  </td>
				</tr>
				<?
				}
				?>
			  </tbody>
			</table>
		  </div>
		</div>

		<div class="db">
		  <ul class="ox">
			<li>
			  <a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			  </a>
			</li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
			  <a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			  </a>
			</li>
		  </ul>
		</div>
	</div>
</div>


    <script src="<?=$dir;?>/dashboard/js/jquery.min.js"></script>
    <script src="<?=$dir;?>/dashboard/js/chart.js"></script>
    <script src="<?=$dir;?>/dashboard/js/tablesorter.min.js"></script>
    <script src="<?=$dir;?>/dashboard/js/toolkit.js"></script>
    <script src="<?=$dir;?>/dashboard/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

