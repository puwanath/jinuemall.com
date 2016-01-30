<?php
if(isset($_REQUEST['id'])){
$order_id=$_REQUEST['id'];

$order_query=mysql_query("SELECT * FROM orders WHERE order_id=$order_id");
$order=mysql_fetch_array($order_query);

$member_id=$order['member_id'];
$member_query=mysql_query("SELECT * FROM members WHERE member_id=$member_id");
$member=mysql_fetch_array($member_query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo $site_dir;?>/EditableInvoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo $site_dir;?>/EditableInvoice/css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo $site_dir;?>/EditableInvoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo $site_dir;?>/EditableInvoice/js/example.js'></script>

</head>

<body>
	<div id="page-wrap">
		<div id="identity">
		
           

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            
             <img id="image" src="http://jinuemall.com/@pages/images/jinuemall-new.png" alt="logo" style="height:48px"/>
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><?=$order_id;?></td>
                </tr>

            </table>
		
		</div>
		<div id="terms">
			<h5>ใบเสร็จรับเงิน / ใบรับสินค้า</h5>
			
			<table id="items">
			<tr class="item-row">
				<td align="left">
					ชื่อ ลูกค้า : 
				</td>
				<td class="description" align="left">
					<?php echo $member['member_name']."  ".$member['member_surname'];?>
				</td>
				<td align="left">
				</td>
				<td class="description">
				
				</td>
			</tr>
			<tr class="item-row">
				<td align="left">
					ที่อยู่ : 
				</td>
				<td class="description" align="left">
					<?php echo $member['member_address'];?>
					<?php echo $member['member_address'].",  ".$member['member_city'].",  ".$member['member_country'].",  ".$member['member_zipcode'];?>
				</td>
				<td align="left">
				
				</td>
				<td class="description">
				
				</td>
			</tr>
			</table>
		</div>
		<table id="items">		
		  <tr>
		      <th>Item</th>
		      <th>Quantity</th>
		      <th>Total PV</th>
		      <th>Total Price</th>
		  </tr>
		<?php
		$sum_pv=0;
		$sum_price=0;
		$i=0;
		$items_query=mysql_query("SELECT * FROM order_items WHERE order_id=$order_id");
		while($items=mysql_fetch_array($items_query)){
		$product_pv=mysql_result(mysql_query("SELECT product_point FROM products WHERE product_id=".$items['product_id']),0);
		$product_price=mysql_result(mysql_query("SELECT product_price_member FROM products WHERE product_id=".$items['product_id']),0);
		$sum_pv+=$product_pv;
		$sum_price+=$product_price;
		$i++;
		?>
		  <tr class="item-row">
		      <td class="description"><?php echo mysql_result(mysql_query("SELECT product_name FROM products WHERE product_id=".$items['product_id']),0);?></td>
		      <td align="center" class=""><?=$items['item_qty'];?></td>
		      <td align="center"><?=$product_pv*$items['item_qty'];?></td>
		      <td align="right">$<?=number_format($product_price*$items['item_qty'],2);?></td>
		  </tr>
		<?php
		}
		$order_discount=$order['order_discount']+0;
		$grand_total=$sum_price-$order_discount;
		$vat=($grand_total*7)/107;
		?>
		</table>
		<br>
		<div id="customer">
            <table id="meta">
				<tr>
                    <td class="meta-head">Net PV</td>
                    <td><div class="due">$<?php echo number_format($sum_pv,2);?></div></td>
                </tr>
				<tr>
                    <td class="meta-head">Discount</td>
                    <td><div class="due">$<?php echo number_format($order_discount,2);?></div></td>
                </tr>
				<tr>
                    <td class="meta-head">Net Price</td>
                    <td><div class="due">$<?php echo number_format($grand_total-$vat,2);?></div></td>
                </tr>
                <tr>
                    <td class="meta-head">Vat</td>
                    <td><div class="due">$<?php echo number_format($vat,2);?></div></td>
                </tr>
                <tr>
                    <td class="meta-head">Grand Total</td>
                    <td><div class="due">$<?php echo number_format($grand_total,2);?></div></td>
                </tr>

            </table>
		
		</div>
		<div id="terms">
		<h5></h5>
		 <strong>JINUE GLOBAL CO., LTD.</strong>  เลขที่ 135/1-2 ซอยนาทอง  อาคารอมรพันธุ์ ทาวเวอร์ 	ถนนรัชดาภิเษก 7  เขตดินแดง กรุงเทพฯ. 10400
		</div>
	
	</div>
	
</body>
</html>
<?php
}
?>