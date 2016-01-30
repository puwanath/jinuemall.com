<?php
$session_id=session_id();
isset($_REQUEST['process'])?$process=$_REQUEST['process'] : $process=null;
isset($_REQUEST['action'])?$action=$_REQUEST['action'] : $action=null;
isset($_REQUEST['return'])?$return=$_REQUEST['return'] : $return=null;
isset($_REQUEST['goto'])?$goto=$_REQUEST['goto'] : $goto=null;
isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;

isset($_REQUEST['product_id']) ? $product_id=$_REQUEST['product_id'] : $product_id=null;
isset($_REQUEST['product_qty'])? $product_qty=$_REQUEST['product_qty'] : $product_qty=null;

isset($_SESSION['basket']) ? $basket = $_SESSION['basket'] : $basket=null;
isset($_SESSION['sponsor']) ? $sponsor=$_SESSION['sponsor'] : $sponsor=null;

/* Register */
if($process=="member_signup"){
	isset($_REQUEST['signup_name']) ? $member_name=$_REQUEST['signup_name'] : $member_name=null;
	isset($_REQUEST['signup_surname']) ? $member_surname=$_REQUEST['signup_surname'] : $member_surname=null;
	isset($_REQUEST['signup_city']) ? $member_city=$_REQUEST['signup_city'] : $member_city=null;
	isset($_REQUEST['signup_country']) ? $member_country=$_REQUEST['signup_country'] : $member_country=null;
	isset($_REQUEST['signup_currency']) ? $member_currency=$_REQUEST['signup_currency'] : $member_currency=null;
	isset($_REQUEST['signup_zipcode']) ? $member_zipcode=$_REQUEST['signup_zipcode'] : $member_zipcode=null;
	isset($_REQUEST['signup_email']) ? $member_email=$_REQUEST['signup_email'] : $member_email=null;
	isset($_REQUEST['signup_phone']) ? $member_phone=$_REQUEST['signup_phone'] : $member_phone=null;
	isset($_REQUEST['signup_username']) ? $member_username=$_REQUEST['signup_username'] : $member_username=null;
	isset($_REQUEST['signup_password']) ? $member_password=encode($_REQUEST['signup_password'],$private_key) : $member_password=null;
	isset($_REQUEST['signup_national_id']) ? $member_national_id=$_REQUEST['signup_national_id'] : $member_national_id=null;
	isset($_REQUEST['signup_passport']) ? $member_passport=$_REQUEST['signup_passport'] : $member_passport=null;
	
	isset($_REQUEST['package']) ? $signup_package=$_REQUEST['package'] : $signup_package=0;
	isset($_REQUEST['product_set']) ? $product_set=$_REQUEST['product_set'] : $product_set=null;
	isset($_REQUEST['sponsor']) ? $sponsor=$_REQUEST['sponsor'] : $sponsor=null;
	isset($_REQUEST['upline']) ? $upline=$_REQUEST['upline'] : $upline=null;
	isset($_REQUEST['placement']) ? $placement=$_REQUEST['placement'] : $placement=null;
	isset($_REQUEST['signup_franchiser']) ? $franchiser=$_REQUEST['signup_franchiser'] : $franchiser=null;
	isset($_REQUEST['payment_method']) ? $payment_method=$_REQUEST['payment_method'] : $payment_method=null;
	
	$member_avatar="avatar-".rand(1,12).".png";
	
	$signup_sql="INSERT INTO members	(member_name,member_surname,member_city,member_country,member_zipcode,member_avatar,member_email,member_phone,member_username,member_password,member_national_id,member_passport,member_registered,package_id,sponsor,upline,placement,franchiser)
	VALUES	
	('$member_name','$member_surname','$member_city','$member_country','$member_zipcode','$member_avatar','$member_email','$member_phone','$member_username','$member_password','$member_national_id','$member_passport',now(),'$signup_package','$sponsor','$upline','$placement','$franchiser')";
	$signup_query=mysqli_query($connect,$signup_sql);
	if($signup_query){
		//Defined member username , Find member id
		$member_id=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id FROM members WHERE member_username='$member_username' AND member_password='$member_password' ")); 
		$member_id=$member_id['member_id'];
		
		mysqli_query($connect,"INSERT INTO members_settings VALUES(NULL,$member_id,'country_code','$member_country')");
		mysqli_query($connect,"INSERT INTO members_settings VALUES(NULL,$member_id,'currency_code','$member_currency')");
		
		$package=mysqli_fetch_array(mysqli_query($connect,"SELECT package_price,package_pv FROM packages WHERE package_id=$signup_package"));
		$package_price=$package['package_price'];
		$package_pv=$package['package_pv'];
		
		
		// Set complete infomation
		$_SESSION['signup_username']=$member_username;
		$_SESSION['signup_password']=$member_password;
		$_SESSION['signup_avatar']=$member_avatar;
		$return="signup/complete";
		
		
		// Check product select
		if($product_set=="neo-medical"){
			$basket[82]=1;
		}elseif($product_set=="glu-gold"){
			$basket[80]=1;
		}elseif($product_set=="facial-massage"){
			$basket[81]=1;
		}
		
		
		// Calculate price , pv
		$order_total=0;
		$order_discount=0;
		foreach($basket as $product_id => $product_qty){
			$product=mysqli_fetch_array(mysqli_query($connect,"SELECT product_price_member FROM products WHERE product_id=$product_id"));
			$order_total+=$basket["$product_id"]*$product['product_price_member'];	
		}
		
		
		if($order_total>$package_price)	$order_discount=$order_total-$package_price+0;
		$order_total=$order_total-$order_discount;
		
		$order_add=mysqli_query($connect,"
		INSERT INTO orders(member_id,order_total,order_discount,payment_method,order_comment,order_status,shipping_costs,session_id,shipping_method,order_date) 
		VALUES('$member_id','$order_total','$order_discount','$payment_method','signup_package_from_jSystem','paid','0','$session_id','at-shop',now())
		;");
		if($order_add){
			$order_result=mysqli_fetch_array(mysqli_query($connect,"SELECT order_id FROM orders WHERE session_id='$session_id'"));
			$order_id=$order_result['order_id'];
			foreach($basket as $product_id => $item_qty){
				$items_add=mysqli_query($connect,"
				INSERT INTO order_items(order_id,product_id,item_qty) VALUES($order_id,$product_id,$item_qty)
				;");
			}
			mysqli_query($connect,"UPDATE orders SET session_id='' WHERE session_id='$session_id';");
			unset($_SESSION['basket']);
		}
	
		
		pay($payment_method,$package_price); // Update jWallet or rMoney
	
	
		//Direct bonus
		if($signup_package==0) $bonus_direct=3; else $bonus_direct=$package_pv*0.15; //direct bonus get 10% of package pv		
		bonus_direct($member_id,$bonus_direct);	
	}
}elseif($process=="member_settings"){
	$currency_code=$_REQUEST['currency_code'];
	$language_code=$_REQUEST['language_code'];
	$country_code=$_REQUEST['country_code'];
	
	if($currency_code!=""){
		$currency_code_check=mysqli_num_rows(mysqli_query($connect,"SELECT id FROM members_settings WHERE setting='currency_code' AND member_id=$me_login;"));
		if($currency_code_check==0){
			mysqli_query($connect,"INSERT INTO members_settings(member_id,setting,value) VALUES($me_login,'currency_code','$currency_code')");
		}else{
			mysqli_query($connect,"UPDATE members_settings SET value='$currency_code' WHERE setting='currency_code' AND member_id=$me_login;");
		}
	}
	
	if($country_code!=""){
		$country_code_check=mysqli_num_rows(mysqli_query($connect,"SELECT id FROM members_settings WHERE setting='country_code' AND member_id=$me_login;"));
		if($country_code_check==0){
			mysqli_query($connect,"INSERT INTO members_settings(member_id,setting,value) VALUES($me_login,'country_code','$country_code')");
		}else{
			mysqli_query($connect,"UPDATE members_settings SET value='$country_code' WHERE setting='country_code' AND member_id=$me_login;");
		}
	}
	
	if($language_code!=""){
		$language_code_check=mysqli_num_rows(mysqli_query($connect,"SELECT id FROM members_settings WHERE setting='language_code' AND member_id=$me_login;"));
		if($language_code_check==0){
			mysqli_query($connect,"INSERT INTO members_settings(member_id,setting,value) VALUES($me_login,'language_code','$language_code')");
		}else{
			mysqli_query($connect,"UPDATE members_settings SET value='$language_code' WHERE setting='language_code' AND member_id=$me_login;");
		}
	}
}elseif($process=="member_avatar"){
	$file=$_FILES['member_avatar'];
	$file_name = $file['name'];
	$file_file = $file['tmp_name'];
	$file_type = end(explode('.',$file_name));
	$file=$me_login.".".$file_type; 
	mysqli_query($connect,"UPDATE members SET member_avatar='$file' WHERE member_id=$me_login");
	copy($file_file,"../gallery/avatar/".$file);
}elseif($process=="transfer_jWallet"){
	$transfer_amount=$_POST['transfer_amount'];
	$transfer_to_username=$_POST['transfer_to_username'];
	$transfer_password=encode($_POST['transfer_password'],$private_key);
	$me_jWallet=$me['jWallet'];
	if($transfer_amount<=$me_jWallet){
		$check_user=mysqli_num_rows(mysqli_query($connect,"SELECT member_username FROM members WHERE member_username='$transfer_to_username'"));
		if($check_user==1){		
			$receiver_result=mysqli_fetch_array(mysqli_query($connect,"SELECT member_id,jWallet FROM members WHERE member_username='$transfer_to_username'"));		
			$receiver_member_id=$receiver_result['member_id'];
			$check_password=mysqli_num_rows(mysqli_query($connect,"SELECT member_password FROM members WHERE member_id=$me_login AND member_password='$transfer_password'"));
			if($check_password==1){
				$jWallet_query=mysqli_query($connect,"UPDATE members SET jWallet=$me_jWallet-$transfer_amount WHERE member_id=$me_login");
				if($jWallet_query){
					mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,$receiver_member_id,NOW(),'transfer','transfered_jWallet_to_username',0,0,$transfer_amount,'unread') ");
					
					$receiver_jWallet=$receiver_result['jWallet'];
					$transfer_query=mysqli_query($connect,"UPDATE members SET jWallet=$receiver_jWallet+$transfer_amount WHERE member_id=$receiver_member_id");
					if($transfer_query){
						mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($receiver_member_id,$me_login,NOW(),'receive','received_transfer_jWallet',0,$transfer_amount,0,'unread') ");
						$return=$return."?transfer_status=success";
					}else{					
						$return=$return."?transfer_status=error";
					}
				}else{
					$return=$return."?transfer_status=error";
				}
			}else{
				$return=$return."?transfer_status=error&";
			}
		}else{
			$return=$return."?transfer_status=error";
		}
	}else{
		$return=$return."?transfer_status=error&";
	}	
}elseif($process=="withdraw_request"){
	$withdraw_amount=$_REQUEST['withdraw_amount'];
	$account_bank=$_REQUEST['account_bank'];
	$account_name=$_REQUEST['account_name'];
	$account_number=$_REQUEST['account_number'];
	$withdraw_password=encode($_REQUEST['withdraw_password'],$private_key);
	$me_jWallet=$me['jWallet'];
	if($withdraw_amount<=$me_jWallet){
		$check_password=mysqli_num_rows(mysqli_query($connect,"SELECT member_password FROM members WHERE member_id=$me_login AND member_password='$withdraw_password'"));
		if($check_password==1){
			mysqli_query($connect,"INSERT INTO withdraw(member_id,withdraw_amount,account_bank,account_name,account_number,withdraw_status,withdraw_date) 
			VALUES($me_login,'$withdraw_amount','$account_bank','$account_name','$account_number','requested',NOW())");
			$return=$return."?request_status=success";
		}else{					
			$return=$return."?request_status=error".$withdraw_password;
		}
	}else{					
		$return=$return."?request_status=error";
	}
}



if($action=="post_add"){
	isset($_REQUEST['post_text']) ? $post_text=$_REQUEST['post_text'] : $post_text=null;
	isset($_REQUEST['post_image']) ? $post_image=$_REQUEST['post_image'] : $post_image=null;
	isset($_REQUEST['post_link']) ? $post_link=$_REQUEST['post_link'] : $post_link=null;
	isset($_REQUEST['post_video']) ? $post_video=$_REQUEST['post_video'] : $post_video=null;
	isset($_REQUEST['post_type']) ? $post_type=$_REQUEST['post_type'] : $post_type=null;
	isset($_REQUEST['special_title']) ? $special_title=$_REQUEST['special_title'] : $special_title=null;
	isset($_REQUEST['special_content']) ? $special_content=$_REQUEST['special_content'] : $special_content=null;
	isset($_REQUEST['member_refer']) ? $member_refer=$_REQUEST['member_refer'] : $member_refer=null;
	isset($_FILES['post_image_upload']['tmp_name']) ? $file=$_FILES['post_image_upload'] : $file=null; 
	
	if(!empty($file['tmp_name'])){
	$date = date_create();
	$timestamp = date_timestamp_get($date);
	$file_name = $file['name'];
	$file_file = $file['tmp_name'];
	$file_type = end(explode('.',$file_name));
	$file=$me_login."_".$timestamp.".".$file_type; 
	$post_image=$site_main."/gallery/post/".$file;
	copy($file_file,"../gallery/post/".$file);
	}
	
	$check=$post_text.$post_image.$post_link.$post_video.'empty';
	if($check!='empty'){
	mysqli_query($connect,"INSERT INTO posts(post_date,post_text,post_image,post_link,post_video,post_likes,post_shared,post_status,post_type,special_title,special_content,member_id,member_refer) 
	VALUES(NOW(),'$post_text','$post_image','$post_link','$post_video',0,0,'normal','$post_type','$special_title','$special_content',$me_login,'$member_refer') ");
	}
}elseif($action=="basket_add"){
	$basket["$product_id"]=$product_qty;
	$_SESSION['basket']=$basket;
}elseif($action=="basket_edit"){
	$basket["$product_id"]=$product_qty;
	$_SESSION['basket']=$basket;
}elseif($action=="basket_delete"){
	unset($basket["$product_id"]);
	$_SESSION['basket']=$basket;
}elseif($action=="order_confirm"){
	isset($_REQUEST['billing_name']) ? $member_name=$_REQUEST['billing_name'] : $member_name=null;
	isset($_REQUEST['billing_surname']) ? $billing_surname=$_REQUEST['billing_surname'] : $billing_surname=null;
	isset($_REQUEST['register_email']) ? $register_email=$_REQUEST['register_email'] : $register_email=null;
	isset($_REQUEST['register_password']) ? $register_password=$_REQUEST['register_password'] : $register_password=null;
	isset($_REQUEST['billing_phone']) ? $billing_phone=$_REQUEST['billing_phone'] : $billing_phone=null;
	isset($_REQUEST['billing_address']) ? $billing_address=$_REQUEST['billing_address'] : $billing_address=null;
	isset($_REQUEST['billing_city']) ? $billing_city=$_REQUEST['billing_city'] : $billing_city=null;
	isset($_REQUEST['billing_country']) ? $billing_country=$_REQUEST['billing_country'] : $billing_country=null;
	isset($_REQUEST['billing_zipcode']) ? $billing_zipcode=$_REQUEST['billing_zipcode'] : $billing_zipcode=null;
	isset($_REQUEST['payment_method']) ? $payment_method=$_REQUEST['payment_method'] : $payment_method=null;
	isset($_REQUEST['pv_method']) ? $pv_method=$_REQUEST['pv_method'] : $pv_method=null;
	
	isset($_REQUEST['shipping_method']) ? $shipping_method=$_REQUEST['shipping_method'] : $shipping_method=null;
	isset($_REQUEST['shipping_detail']) ? $shipping_detail=$_REQUEST['shipping_detail'] : $shipping_detail=null;
	isset($_REQUEST['shipping_name']) ? $shipping_name=$_REQUEST['shipping_name'] : $shipping_name=null;
	isset($_REQUEST['shipping_surname']) ? $shipping_surname=$_REQUEST['shipping_surname'] : $shipping_surname=null;
	isset($_REQUEST['shipping_phone']) ? $shipping_phone=$_REQUEST['shipping_phone'] : $shipping_phone=null;
	isset($_REQUEST['shipping_address']) ? $shipping_address=$_REQUEST['shipping_address'] : $shipping_address=null;
	isset($_REQUEST['shipping_city']) ? $shipping_city=$_REQUEST['shipping_city'] : $shipping_city=null;
	isset($_REQUEST['shipping_country']) ? $shipping_country=$_REQUEST['shipping_country'] : $shipping_country=null;
	isset($_REQUEST['shipping_zipcode']) ? $shipping_zipcode=$_REQUEST['shipping_zipcode'] : $shipping_zipcode=null;
	isset($_REQUEST['shipping_method']) ? $shipping_method=$_REQUEST['shipping_method'] : $shipping_method=null;
	
	isset($_REQUEST['payment_method']) ? $payment_method=$_REQUEST['payment_method'] : $payment_method=null;
	isset($_REQUEST['order_comment']) ? $order_comment=$_REQUEST['order_comment'] : $order_comment=null;
	
	
	// INSERT New member , Get member data 
	if($me_login==""){
		$member_add=mysqli_query($connect,"
		INSERT INTO members(member_name,member_surname,member_email,member_password,member_address,member_phone,member_city,member_country,member_zipcode,sponsor,member_registered)
		VALUES('$member_name','$member_surname','$member_email','$member_password','$member_address','$member_phone','$member_city','$member_country','$member_zipcode','$sponsor',now())
		;");
		$member_id=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id FROM members WHERE member_email='$member_email' AND member_password='$member_password';"));
		$member_id=$member_id['member_id'];
	}else{
		$me=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM members WHERE member_id = '$me_login' "));
		$upline=$me['upline'];
		$sponsor=$me['sponsor'];
		$member_id=$me['member_id'];
	}
	$member=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE member_id='$member_id';"));

	// Calculate Price , PV 
	$shipping_costs=0;
	$total_price=0;
	$total_pv=0;
	$product_id=null;
	$product_qty=null;
	if($payment_method=="jWallet" OR $payment_method=="rMoney" OR $payment_method=="jWallet_rMoney" OR $payment_method=="jPoint"){
		foreach($basket as $product_id => $product_qty){
			$product=mysqli_fetch_assoc(mysqli_query($connect,"SELECT product_price,product_price_member,product_point FROM products WHERE product_id=$product_id"));
			$product_price=$product['product_price'];
			$product_price_member=$product['product_price_member'];
			$product_pv=$product['product_point'];
			if($me_login=="") $total_price+=$basket["$product_id"]*$product_price;
			else 					$total_price+=$basket["$product_id"]*$product_price_member;
			$total_pv+=$basket["$product_id"]*$product_pv;
		}
	}
	$price_discount=$total_price*0;
	$total_price=$total_price-$price_discount;
	
	pay($payment_method,$total_price);	// Purchase orders	
	// Add order and calculate 
	if($member_id!=""){
		// Set Order status
		if($payment_method=="bank") $order_status="pending"; else $order_status="paid";

		$order_add=mysqli_query($connect,"
		INSERT INTO orders(member_id,order_total,order_discount,payment_method,order_comment,order_status,shipping_costs,session_id,shipping_method,order_date) 
		VALUES('$member_id','$total_price','$price_discount','$payment_method','$order_comment','$order_status','$shipping_costs','$session_id','$shipping_method',now())
		;");
		if($order_add){
			$order_id=mysqli_fetch_assoc(mysqli_query($connect,"SELECT order_id FROM orders WHERE session_id='$session_id'"));
			$order_id=$order_id['order_id'];
			foreach($basket as $product_id => $item_qty){
				$items_add=mysqli_query($connect,"INSERT INTO order_items(order_id,product_id,item_qty) VALUES($order_id,$product_id,$item_qty);");
			}
			if($shipping_method=="ems"){
				mysqli_query($connect,"
				INSERT INTO order_address(order_id,address_name,address_surname,address,address_city,address_country,address_zipcode)
				VALUES($order_id,'$shipping_name','$shipping_surname','$shipping_address','$shipping_city','$shipping_country','$shipping_zipcode')
				;");
			}
			mysqli_query($connect,"UPDATE orders SET session_id='' WHERE session_id='$session_id';");
			unset($_SESSION['basket']);
			
			
			 //Autoship PV hold
			if($member['package_id']>=1 AND $payment_method!="jPoint"){   //start from starter package
				$member_purchase=$member['member_purchase'];
				$update_purchase=$member_purchase+$total_pv;				
				mysqli_query($connect,"UPDATE members SET member_purchase='$update_purchase' WHERE member_id=$member_id; ");				
			}						
			
			$upgrade_package_id=upgrade_package($me_login,$total_pv); // Update PV		
			// Recall me and package after use upgrade_package
			$me=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM members WHERE member_id='$member_id';"));
			$me_package=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM packages WHERE package_id=".$me['package_id']));	
			

			$sponsor_package=mysqli_fetch_assoc(mysqli_query($connect,"SELECT package_id FROM members WHERE member_id=$sponsor;"));
			$sponsor_package=$sponsor_package['package_id'];

			// start bonus
			bonus_direct($member_id,$total_pv*0.15);	
			bonus_ss($member_id,$total_pv); 			//Super starter(SS)
			upgrade_to_ss($member_id,$upgrade_package_id); 		//Upgrade Super starter(SS)
			bonus_sd_sdmatching($member_id,$total_pv);
			bonus_cycle($member_id);			//Cycle
		}
	}
}

//goto
//if(isset($goto)) header("Location: $goto");

//return
//if(isset($return)) header("Location: $return");
?>	
	
