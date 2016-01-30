<?
$colors_arr=array("#1CA8DD","#1BC98E","#9F86FF","#E64759","#E4D836","#68C3A3","#D2D7D3");
$order_search=$_REQUEST['order_search'];
$member_id=$order['member_id'];
$member_query=mysql_query("SELECT * FROM members WHERE member_id=$member_id");
$member=mysql_fetch_array($member_query);
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
        Orders &middot; JINIUS
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
			<h2 class="apb">Orders</h2>
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
				  <th></th>
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
				$orders_sql="SELECT * FROM orders LEFT JOIN members ON orders.member_id=members.member_id ";
				if($order_search!=""){
				$orders_sql.=" WHERE member_name LIKE '%$order_search%' OR member_username LIKE '%$order_search%' OR order_date LIKE '%$order_search%' ";
				}
				$orders_sql.=" ORDER BY order_date DESC ";
				$orders_query=mysql_query($orders_sql);
				while($orders=mysql_fetch_array($orders_query)){
				?>
				<tr>
				  <td><a href="#">#<?=$orders['order_id'];?></a></td>
				  <td><?=$orders['order_date'];?></td>
				  <td><?=$orders['member_name']."  ".$orders['member_surname'];?></td>
				  <td><?=$orders['member_username'];?></td>
				  <td><?=$orders['shipping_method'];?></td>
				  <td align="right"><?=number_format($orders['order_total']*35);?> ฿</td>
				  <td align="center">
					<?
					if($orders['order_status']=="pending"){
					?>
						<a href="#view_<?=$orders['order_id'];?>" data-toggle="modal" class="ce fe">
							รอชำระเงิน
						</a>
					<?
					}elseif($orders['order_status']=="paid"){
					?>
						<a href="#view_<?=$orders['order_id'];?>" data-toggle="modal" class="ce fh">
							จัดส่งสินค้า
						</a>
					<?
					}elseif($orders['order_status']=="sent"){
					?>
						<a href="#view_<?=$orders['order_id'];?>" data-toggle="modal" class="ce apn">
							ส่งสินค้าแล้ว
						</a>
					<? 
					}
					?>
					<form action="<?=$url;?>/process.php" method="POST">
					<div id="view_<?=$orders['order_id'];?>" class="cb fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="rj">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel"><?=$orders['member_name']."  ".$orders['member_surname'];?></h4>
						  </div>
						  <div class="modal-body  ">
								<div class="row">
									วันที่สั่งซื้อ : <?=$orders['order_date'];?>
								</div>
							<table class="cl" data-sort="table" style="color:#ffffff;">
								<thead>						  
									<tr>
									  <th>#</th>
									  <th>Order Date</th>
									  <th>QTY</th>
									  <th>Total price</th>
									  <th>Total PV</th>
									</tr>
								</thead>
								<tbody>
							<?
							$orders=$orders['order_id'];
							$i=0;
							$items_query=mysql_query("SELECT * FROM order_items WHERE order_id=$orders");
							while($items=mysql_fetch_array($items_query)){
								$i++;
								$product=mysql_fetch_array(mysql_query("SELECT * FROM products WHERE product_id=".$items['product_id']),0);
							?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$product['product_name'];?></td>
										<td><?=$items['item_qty'];?></td>
										<td>$<?=number_format($items['item_qty']*$product['product_price_member']);?> ( <?=number_format($items['item_qty']*$product['product_price_member']*35);?>B )</td>
										<td>
										 <? $product_pv=mysql_result(mysql_query("SELECT product_point FROM products WHERE product_id=".$items['product_id']),0);?>
										<?
											echo $product_pv*$items['item_qty'];
										?>
										</td>
									</tr>
							<?
							}
							?>
								</tbody>
							</table>
							<input type="hidden" name="order_id" value="<?=$orders;?>">
							<input type="hidden" name="process" value="order_sent">
							<input type="hidden" name="return" value="<?=$url;?>?page=orders">
							<button class="ce fh" type="submit">
								<span class="bv us"></span>
								จัดส่งสินค้า
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

