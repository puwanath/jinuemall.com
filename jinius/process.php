<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?
session_start();
$session_id=session_id();
include "@system/databases.php";
include "@system/language.php";
include "@system/function.php";
$process=$_REQUEST['process'];
$return=$_REQUEST['return'];

if($process=="product_add"){
	$product_name=$_REQUEST['product_name'];
	$product_des=$_REQUEST['product_des'];
	$product_detail=$_REQUEST['product_detail'];
	$product_price=$_REQUEST['product_price'];
	$product_price_member=$_REQUEST['product_price_member'];
	$product_pv=$_REQUEST['product_pv'];
	$product_qty=$_REQUEST['product_qty'];
	$product_barcode=$_REQUEST['product_barcode'];
	$product_url=$_REQUEST['product_url'];
	$product_category=$_REQUEST['product_category'];
	$product_id = mysql_result(mysql_query("SELECT MAX(product_id) FROM products;"),0)+1;
	
	
	$product_add=mysql_query("INSERT INTO products (product_id,product_name,product_description,product_detail,product_price,product_price_member,product_point,product_qty,product_barcode,product_url,product_category_id)
										VALUES ($product_id,'$product_name','$product_des','$product_detail','$product_price','$product_price_member','$product_pv','$product_qty','$product_barcode','$product_url','$product_category')");
	
	if($product_add){
		$i = 0;
		$file_ary = reArrayFiles($_FILES['img']);
		foreach ($file_ary as $file) {
			$i++;
			$file_name = $file['name'];
			$file_file = $file['tmp_name'];
			$file_type = end(explode('.',$file_name));
			$file_name = $product_id."_".$i;
			$file=$file_name.".".$file_type; 
			mysql_query("INSERT INTO product_pictures VALUES(null,'$file_name','$file_type','$product_id')");
			copy($file_file,"../@pages/images/products/".$file);
		}
		
	}else{
		//HEADER("location:/hmn/register");
	}
}elseif($process=="product_edit"){
	$product_id=$_REQUEST['product_id'];
	$product_name=$_REQUEST['product_name'];
	$product_des=$_REQUEST['product_des'];
	$product_detail=$_REQUEST['product_detail'];
	$product_price=$_REQUEST['product_price'];
	$product_price_member=$_REQUEST['product_price_member'];
	$product_pv=$_REQUEST['product_pv'];
	$product_qty=$_REQUEST['product_qty'];
	$product_barcode=$_REQUEST['product_barcode'];
	$product_url=$_REQUEST['product_url'];
	$product_category=$_REQUEST['product_category'];
	$product_edit=mysql_query("UPDATE products SET
	product_name='$product_name',
	product_description='$product_des',
	product_detail='$product_detail',
	product_price='$product_price',
	product_price_member='$product_price_member',
	product_point='$product_pv',
	product_qty='$product_qty',
	product_barcode='$product_barcode',
	product_url='$product_url',
	product_category_id='$product_category'
	WHERE product_id=$product_id");
}elseif($process=="product_delete"){
	$product_id=$_REQUEST['product_id'];
	$product_delete=mysql_query("DELETE FROM products WHERE product_id='$product_id'");
}elseif($process=="order_sent"){
	$order_id=$_REQUEST['order_id'];
	$order_send=mysql_query("UPDATE orders SET order_status='sent',date_sended=NOW() WHERE order_id=$order_id");
}elseif($process=="withdraw_approve"){
	$withdraw_id=$_REQUEST['withdraw_id'];
	$withdraw_amount=mysql_result(mysql_query("SELECT withdraw_amount FROM withdraw WHERE withdraw_id=$withdraw_id"),0);
	$member_id=mysql_result(mysql_query("SELECT member_id FROM withdraw WHERE withdraw_id=$withdraw_id"),0);
	$member_jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$member_id"),0);
	if($member_jWallet>=$withdraw_amount){
		$jWallet_update=$withdraw_amount-$member_jWallet;
		$withdraw_approved=mysql_query("UPDATE members SET jWallet='$jWallet_update' WHERE member_id=$member_id");
		echo "UPDATE members SET jWallet='$jWallet_update' WHERE member_id=$member_id";
		if($withdraw_approved){
			mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($member_id,'',NOW(),'withdraw','withdraw_money_jwallet','','0','$withdraw_amount','unread') ");
			
			mysql_query("UPDATE withdraw SET withdraw_status='approved' WHERE withdraw_id=$withdraw_id;");
		}
	}
}
header('LOCATION: '.$return);
?>