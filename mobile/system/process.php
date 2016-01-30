<?php
session_start();
include("../databases.php");
include "../language.php";
include "../function.php";

isset($_REQUEST['process'])?$process=$_REQUEST['process'] : $process=null;
isset($_REQUEST['return'])?$return=$_REQUEST['return'] : $return=null;
isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
$session_id=session_id();

/* Register */
if($process=="member_signup"){
	$member_name=$_REQUEST['signup_name'];
	$member_surname=$_REQUEST['signup_surname'];
	$member_city=$_REQUEST['signup_city'];
	$member_country=$_REQUEST['signup_country'];
	$member_currency=$_REQUEST['signup_currency'];
	$member_zipcode=$_REQUEST['signup_zipcode'];
	$member_email=$_REQUEST['signup_email'];
	$member_phone=$_REQUEST['signup_phone'];
	$member_username=$_REQUEST['signup_username'];
	$member_password=$_REQUEST['signup_password'];
	$member_national_id=$_REQUEST['signup_national_id'];
	$member_passport=$_REQUEST['signup_passport'];
	
	$signup_package=$_REQUEST['package'];
	$product_set=$_REQUEST['product_set'];
	$sponsor=$_REQUEST['sponsor'];
	$upline=$_REQUEST['upline'];
	$placement=$_REQUEST['placement'];
	$franchiser=$_REQUEST['signup_franchiser'];
	$payment_method=$_REQUEST['payment_method'];
	
	$signup_sql="INSERT INTO members	(member_name,member_surname,member_city,member_country,member_zipcode,member_email,member_phone,member_username,member_password,member_national_id,member_passport,member_registered,package_id,sponsor,upline,placement,franchiser)
	VALUES	
	('$member_name','$member_surname','$member_city','$member_country','$member_zipcode','$member_email','$member_phone','$member_username','$member_password','$member_national_id','$member_passport',now(),'$signup_package','$sponsor','$upline','$placement','$franchiser')";
	$signup_query=mysql_query($signup_sql);
	if($signup_query){
		//Defined member username
		$member_id=mysql_result(mysql_query("SELECT member_id FROM members WHERE member_username='$member_username' AND member_password='$member_password' "),0); //Find member id 
		//mysql_query("UPDATE members SET member_username='$member_id' WHERE member_id=$member_id");  
		$package_price=mysql_result(mysql_query("SELECT package_price FROM packages WHERE package_id=$signup_package"),0)+0;
	
		mysql_query("INSERT INTO members_settings VALUES(NULL,$member_id,'country_code','$member_country')");
		mysql_query("INSERT INTO members_settings VALUES(NULL,$member_id,'currency_code','$member_currency')");
		
		
		$_SESSION['signup_username']=$member_username;
		$_SESSION['signup_password']=$member_password;
		
		$return="signup/complete";
		
		
		
		// Add invoice order
		$basket = array();
		$order_total=0;
		$order_discount=0;
/*		if($signup_package==1){
			$basket[1]=1;
		}elseif($signup_package==2){
			$basket[1]=3;
		}elseif($signup_package==3){
			$basket[1]=4;
			$basket[24]=1;
			$basket[62]=2;
		}
*/
		if($product_set=="neo-medical"){
			$basket[82]=1;
		}elseif($product_set=="glu-gold"){
			$basket[80]=1;
		}elseif($product_set=="facial-massage"){
			$basket[81]=1;
		}
		
		
		foreach($basket as $product_id => $product_qty){
			$product_price_member=mysql_result(mysql_query("SELECT product_price_member FROM products WHERE product_id=$product_id"),0);
			$order_total=$order_total+$basket["$product_id"]*$product_price_member;	
		}
		if($order_total>$package_price){
			$order_discount=$order_total-$package_price;
		}
		$order_total=$order_total-$order_discount;
		
		$order_add=mysql_query("
		INSERT INTO jinue_system.orders(member_id,order_total,order_discount,payment_method,order_comment,order_status,shipping_costs,session_id,shipping_method,order_date) 
		VALUES('$member_id','$order_total','$order_discount','$payment_method','signup_package_from_jSystem','paid','0','$session_id','at-shop',now())
		;");
		if($order_add){
			$order_id=mysql_result(mysql_query("SELECT order_id FROM jinue_system.orders WHERE session_id='$session_id'"),0);
			foreach($basket as $product_id => $item_qty){
				$items_add=mysql_query("
				INSERT INTO jinue_system.order_items(order_id,product_id,item_qty) VALUES($order_id,$product_id,$item_qty)
				;");
			}
			mysql_query("UPDATE jinue_system.orders SET session_id='' WHERE session_id='$session_id';");
			unset($_SESSION['basket']);
		}
	
	
	
	
	
	
		// Update Sponsor PV
		if($payment_method=="jWallet"){
			$sponsor_jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$me_login"),0)+0;
			$sponsor_jWallet_update=$sponsor_jWallet-$package_price;
			$buy_package_query=mysql_query("UPDATE members SET jWallet='$sponsor_jWallet_update' WHERE member_id=$me_login; ");
			if($buy_package_query){
				mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,$member_id,NOW(),'pay','paid_signup_package_with_jwallet','','0','$package_price','unread') ");
			}
		}elseif($payment_method=="rMoney"){
			$sponsor_rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$me_login"),0)+0;
			$sponsor_rMoney_update=$sponsor_rMoney-$package_price;
			$buy_package_query=mysql_query("UPDATE members SET rMoney='$sponsor_rMoney_update' WHERE member_id=$me_login; ");
			if($buy_package_query){
				mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,$member_id,NOW(),'pay','paid_signup_package_with_rmoney','','0','$package_price','unread') ");
			}
		}
		
		
		
		
		
		



		// start bonus
		$package_pv=mysql_result(mysql_query("SELECT package_pv FROM packages WHERE package_id=$signup_package;"),0);
		
		
		
		//Direct bonus
		if($signup_package==0){
			$bonus_direct=3;
		}else{
			$bonus_direct=$package_pv*0.15; //direct bonus get 10% of package pv
		}
		$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$sponsor;"),0);
		$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$sponsor;"),0);
		
		$jWallet_received=($bonus_direct*0.97)*0.70;
		$rMoney_received=($bonus_direct*0.97)*0.30;
		$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
		$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
		$bonus_direct_query=mysql_query("UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$sponsor");
		if($bonus_direct_query AND $jWallet_received>0 AND $rMoney_received>0){
			mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($sponsor,$member_id,NOW(),'receive','received_direct_bonus',1,$jWallet_received+$rMoney_received,'0','unread') ");
		}	
		
		
/*	
		
		//Super starter(SS)
		$find_ss_next=$sponsor;
		do{
			$find_ss=mysql_fetch_array(mysql_query("SELECT member_id,package_id,package_special,sponsor FROM members WHERE member_id=$find_ss_next"));
			$package_special=$find_ss['package_special'];
			if($find_ss['package_id']<=3){
				$package_special="";
			}
			$who_ss=$find_ss['member_id'];
			$find_ss_next=$find_ss['sponsor'];
		}while($package_special!="ss" AND $who_ss!=0);
		if($package_special=="ss" AND $who_ss!=0){
			$bonus_ss=$package_pv*0.05; //ss bonus get 5% of package price
			
			$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$who_ss;"),0);
			$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$who_ss;"),0);
			$jWallet_received=($bonus_ss*0.97)*0.70;
			$rMoney_received=($bonus_ss*0.97)*0.30;
			
			$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
			$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
			if($bonus_ss>0){
				$bonus_ss_query=mysql_query("UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who_ss");
			
				if($bonus_ss_query){					
					mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who_ss,$member_id,NOW(),'receive','received_ss_bonus',2,$jWallet_received+$rMoney_received,'0','unread') ");
				}
			}
		}		
		
		
		
		
			
		//Upgrade Super starter(SS)
		if($signup_package==4 OR $signup_package==5 OR $signup_package==6 OR $signup_package==7){
			$check_ss=mysql_num_rows(mysql_query("SELECT member_id FROM members WHERE sponsor=$sponsor AND (package_id=4 OR package_id=5 OR package_id=6 OR package_id=7)"));
			if($check_ss==4){
				$upgrade_ss=mysql_query("UPDATE members SET package_special='ss' WHERE member_id=$sponsor");
				if($upgrade_ss){
					mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($sponsor,$member_id,NOW(),'upgrade','upgrade_to_ss',3,'0','0','unread') ");
				}
			}
		}
		
		
				
		
		
		//Super Director
		$sponsor_package=mysql_result(mysql_query("SELECT package_id FROM members WHERE member_id=$sponsor"),0);
		if($sponsor_package==6 OR $sponsor_package==7){
			$bonus_sd=$package_pv*0.05; //SD bonus get 5% of package pv
			
			$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$sponsor;"),0);
			$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$sponsor;"),0);
			$jWallet_received=($bonus_sd*0.97)*0.70;
			$rMoney_received=($bonus_sd*0.97)*0.30;
			$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
			$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
			$bonus_sd_query=mysql_query("UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$sponsor");
			if($bonus_sd_query){
				mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($sponsor,$member_id,NOW(),'receive','received_sd_bonus',4,$jWallet_received+$rMoney_received,'0','unread') ");
			}	
		}
					//  ^
					//  |
					//  |    Continue
					//  |
					//  |
		//Matching Super Director bonus(M-SD)
		$find_sd_next=$sponsor;
		$level=1;
		do{
			$find_sd=mysql_fetch_array(mysql_query("SELECT member_id,package_id,sponsor FROM members WHERE member_id=$find_sd_next AND (package_id=6 OR package_id=7)"));
			$package_id=$find_sd['package_id'];
			$who_sd=$find_sd['member_id'];
			$find_sd_next=$find_sd['sponsor'];
			if($sponsor!=$who_sd AND ($package_id=6 OR $package_id=7)){
				$bonus_sd=($jWallet_received+$rMoney_received)*0.10; //SD bonus get 10% of 50% of 10% of package_pv
				
				$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$who_sd;"),0);
				$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$who_sd;"),0);
				$jWallet_received=($bonus_sd*0.97)*0.70;
				$rMoney_received=($bonus_sd*0.97)*0.30;
				$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
				$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
				$bonus_sd_query=mysql_query("UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who_sd");
				if($bonus_sd_query){
					mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who_sd,$member_id,NOW(),'receive','received_matching_sd_bonus',5,$jWallet_received+$rMoney_received,'0','unread') ");
				}
				$level++;
			}
		}while($find_sd_next!=0 AND $level<=10);	
		
		
		
		
		//Cycle
		if($signup_package==0){
			$level_max=0;
		}elseif($signup_package==1){
			$level_max=0;
		}elseif($signup_package==2){
			$level_max=3;
		}elseif($signup_package==3){
			$level_max=4;
		}elseif($signup_package==4){
			$level_max=5;
		}elseif($signup_package==5){
			$level_max=6;
		}elseif($signup_package==6){
			$level_max=7;
		}elseif($signup_package==7){
			$level_max=8;
		}
		$find_cycle_next=$upline;	
		do{
			$find_cycle=mysql_fetch_array(mysql_query("SELECT member_id,upline FROM members WHERE member_id=$find_cycle_next"));
			$member_cycle=$find_cycle['member_id'];
			$find_cycle_next=$find_cycle['upline'];
			
			$left_downline=mysql_result(mysql_query("SELECT member_id FROM members WHERE upline=$member_cycle AND placement='L';"),0);
			$left_calculated=mysql_result(mysql_query("SELECT calculated_left FROM members WHERE member_id=$member_cycle;"),0);
			$right_downline=mysql_result(mysql_query("SELECT member_id FROM members WHERE upline=$member_cycle AND placement='R';"),0);
			$right_calculated=mysql_result(mysql_query("SELECT calculated_right FROM members WHERE member_id=$member_cycle;"),0);
			$left_pv=SumPV($left_downline)-$left_calculated;
			$right_pv=SumPV($right_downline)-$right_calculated;
			if($left_pv<=$right_pv){
				$calculate_pv=$left_pv;
			}elseif($right_pv<$left_pv){
				$calculate_pv=$right_pv;
			}
			
			if($calculate_pv>0){
				$calculated_left=$calculate_pv+$left_calculated;
				$calculated_right=$calculate_pv+$right_calculated;
				$calculated_pv_query=mysql_query("UPDATE members SET calculated_left=$calculated_left,calculated_right=$calculated_right WHERE member_id=$member_cycle");
				
				
				
				if($calculated_pv_query){
					$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$member_cycle;"),0);
					$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$member_cycle;"),0);
					
					$member_cycle_package=mysql_result(mysql_query("SELECT package_id FROM members WHERE member_id=$member_cycle;"),0);
					$cycle_today_amount=mysql_result(mysql_query("
					SELECT SUM( amount )
					FROM transactions
					WHERE DATE( `transaction_date` ) = DATE( CURDATE( ) )
					AND bonus_id =6
					AND to_member =1
					"),0);
					
					$bonus_cycle=$calculate_pv*.10;
					
					if($member_cycle_package==1){
						$cycle_max=50;
					}elseif($member_cycle_package==2){
						$cycle_max=100;
					}elseif($member_cycle_package==3){
						$cycle_max=200;
					}elseif($member_cycle_package==4){
						$cycle_max=400;
					}elseif($member_cycle_package==5){
						$cycle_max=1000;
					}elseif($member_cycle_package==6){
						$cycle_max=2000;
					}elseif($member_cycle_package==7){
						$cycle_max=3000;
					}
					
					if($cycle_max>$cycle_today_amount){
						$cycle_remaining=$cycle_max-$cycle_today_amount;
						$cycle_text="received_cycle_bonus";
						if($bonus_cycle>=$cycle_remaining){
							$bonus_cycle=$cycle_remaining;
							$cycle_text="received_cycle_bonus_max";
						}
					}
					
					$jWallet_received=($bonus_cycle*0.97)*0.70;
					$rMoney_received=($bonus_cycle*0.97)*0.30;
					$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
					$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus

					$bonus_cycle_query=mysql_query("UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$member_cycle");
					if($bonus_cycle_query){
						mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($member_cycle,$member_id,NOW(),'receive','$cycle_text',6,$jWallet_received+$rMoney_received,'0','unread') ");
					}
				
				}
				
				
				
				$bonus_mc=$bonus_cycle*0.05; //MC bonus get 5% of cycle bonus
				$jWallet_received=($bonus_mc*0.97)*0.70;
				$rMoney_received=($bonus_mc*0.97)*0.30;
								
				$mc_sponsor_next=mysql_result(mysql_query("SELECT sponsor FROM members WHERE member_id=$member_cycle"),0);		
				$level=2;
				do{
					$find_mc=mysql_fetch_array(mysql_query("SELECT member_id,package_id,sponsor FROM members WHERE member_id=$mc_sponsor_next"));
					
					$who_mc=$find_mc['member_id']."  ";
					$mc_sponsor_next=$find_mc['sponsor'];
																
					$jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$who_mc;"),0);
					$rMoney=mysql_result(mysql_query("SELECT rMoney FROM members WHERE member_id=$who_mc;"),0);
					
					$jWallet=$jWallet+$jWallet_received;  //jWallet get 70% of bonus
					$rMoney=$rMoney+$rMoney_received;  //rMoney get 30% of bonus
														
					$bonus_mc_sql="UPDATE members SET jWallet=$jWallet,rMoney=$rMoney WHERE member_id=$who_mc";
					
					if($level==2 AND $find_mc['package_id']>=2){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==3 AND $find_mc['package_id']>=2){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==4 AND $find_mc['package_id']>=3){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==5 AND $find_mc['package_id']>=4){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==6 AND $find_mc['package_id']>=5){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==7 AND $find_mc['package_id']>=6){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==8 AND $find_mc['package_id']==7){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==9 AND $find_mc['package_id']==7){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}elseif($level==10 AND $find_mc['package_id']==7){					
						$bonus_mc_query=mysql_query($bonus_mc_sql);
					}else{

					}
					
	
					if($bonus_mc_query){
						mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($who_mc,$member_cycle,NOW(),'receive','received_matching_cycle_bonus',7,$jWallet_received+$rMoney_received,'0','unread') ");
					}
					
					$level++;

				}while($level<=10);	
			}

		}while($find_cycle_next!=0);
		
*/	
	
	}
}elseif($process=="member_edit"){
	$edit=$_REQUEST['edit'];
	$value=$_REQUEST['value'];
	mysql_query("UPDATE members SET $edit='$value' WHERE member_id=$me_login;");
}elseif($process=="member_settings"){
	$currency_code=$_REQUEST['currency_code'];
	$language_code=$_REQUEST['language_code'];
	$country_code=$_REQUEST['country_code'];
	
	if($currency_code!=""){
		$currency_code_check=mysql_result(mysql_query("SELECT COUNT(id) FROM members_settings WHERE setting='currency_code' AND member_id=$me_login;"),0);
		if($currency_code_check==0){
			mysql_query("INSERT INTO members_settings(member_id,setting,value) VALUES($me_login,'currency_code','$currency_code')");
		}else{
			mysql_query("UPDATE members_settings SET value='$currency_code' WHERE setting='currency_code' AND member_id=$me_login;");
		}
	}
	
	if($country_code!=""){
		$country_code_check=mysql_result(mysql_query("SELECT COUNT(id) FROM members_settings WHERE setting='country_code' AND member_id=$me_login;"),0);
		if($country_code_check==0){
			mysql_query("INSERT INTO members_settings(member_id,setting,value) VALUES($me_login,'country_code','$country_code')");
		}else{
			mysql_query("UPDATE members_settings SET value='$country_code' WHERE setting='country_code' AND member_id=$me_login;");
		}
	}
	
	if($language_code!=""){
		$language_code_check=mysql_result(mysql_query("SELECT COUNT(id) FROM members_settings WHERE setting='language_code' AND member_id=$me_login;"),0);
		if($language_code_check==0){
			mysql_query("INSERT INTO members_settings(member_id,setting,value) VALUES($me_login,'language_code','$language_code')");
		}else{
			mysql_query("UPDATE members_settings SET value='$language_code' WHERE setting='language_code' AND member_id=$me_login;");
		}
	}
}elseif($process=="member_avatar"){
	$file=$_FILES['member_avatar'];
	$file_name = $file['name'];
	$file_file = $file['tmp_name'];
	$file_type = end(explode('.',$file_name));
	$file_name = $me_login;
	echo $file=$file_name.".".$file_type; 
	mysql_query("UPDATE members SET member_avatar='$file_type' WHERE member_id=$me_login");
	copy($file_file,"@pages/profile/".$file);
}elseif($process=="transfer_jWallet"){
	$transfer_amount=$_POST['transfer_amount'];
	$transfer_to_username=$_POST['transfer_to_username'];
	$transfer_password=$_POST['transfer_password'];
	$me_jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$me_login"),0);
	if($transfer_amount<=$me_jWallet){
		$check_user=mysql_num_rows(mysql_query("SELECT member_username FROM members WHERE member_username='$transfer_to_username'"));
		if($check_user==1){		
			$receiver_member_id=mysql_result(mysql_query("SELECT member_id FROM members WHERE member_username='$transfer_to_username'"),0);		
			$check_password=mysql_num_rows(mysql_query("SELECT member_password FROM members WHERE member_id=$me_login AND member_password='$transfer_password'"));
			if($check_password==1){
				$jWallet_query=mysql_query("UPDATE members SET jWallet=$me_jWallet-$transfer_amount WHERE member_id=$me_login");
				if($jWallet_query){
					mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($me_login,$receiver_member_id,NOW(),'transfer','transfered_jWallet_to_username',0,0,$transfer_amount,'unread') ");
					
					$receiver_jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$receiver_member_id"),0);
					$transfer_query=mysql_query("UPDATE members SET jWallet=$receiver_jWallet+$transfer_amount WHERE member_id=$receiver_member_id");
					if($transfer_query){
						mysql_query("INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($receiver_member_id,$me_login,NOW(),'receive','received_transfer_jWallet',0,$transfer_amount,0,'unread') ");
						$return=$return."?transfer_status=success";
					}else{					
						$return=$return."?transfer_status=error";
					}
				}else{
					$return=$return."?transfer_status=error";
				}
			}else{
				$return=$return."?transfer_status=error";
			}
		}else{
			$return=$return."?transfer_status=error";
		}
	}else{
		$return=$return."?transfer_status=error";
	}	
}elseif($process=="withdraw_request"){
	$withdraw_amount=$_REQUEST['withdraw_amount'];
	$account_bank=$_REQUEST['account_bank'];
	$account_name=$_REQUEST['account_name'];
	$account_number=$_REQUEST['account_number'];
	$withdraw_password=$_REQUEST['withdraw_password'];
	$me_jWallet=mysql_result(mysql_query("SELECT jWallet FROM members WHERE member_id=$me_login"),0);
	if($withdraw_amount<=$me_jWallet){
		$check_password=mysql_num_rows(mysql_query("SELECT member_password FROM members WHERE member_id=$me_login AND member_password='$withdraw_password'"));
		if($check_password==1){
			mysql_query("INSERT INTO withdraw(member_id,withdraw_amount,account_bank,account_name,account_number,withdraw_status,withdraw_date) 
			VALUES($me_login,'$withdraw_amount','$account_bank','$account_name','$account_number','requested',NOW())");
			$return=$return."?request_status=success";
		}else{					
			$return=$return."?request_status=error";
		}
	}else{					
		$return=$return."?request_status=error";
	}
}elseif($process=="member_password_check"){
	$value=$_REQUEST['value'];
	$check=mysql_num_rows(mysql_query("SELECT member_password FROM members WHERE member_id=$me_login AND member_password='$value'"));
	echo $check;
}elseif($process=="member_username_check"){
	$value=$_REQUEST['value'];
	$check_query = mysql_query("SELECT member_username FROM members WHERE member_username='".$value."'");
	$count=mysql_num_rows($check_query);
	if($count==0){
		mysql_query("UPDATE members SET member_username='$value' WHERE member_id=$me_login;");
	}
	echo $count;
}elseif($process=="member_username_check_only"){
	$value=$_REQUEST['value'];
	$check_query = mysql_query("SELECT member_username FROM members WHERE member_username='".$value."'");
	$count=mysql_num_rows($check_query);
	if($count==0){
		$_SESSION['signup_username']=$value;
	}
	echo $count;
}elseif($process=="signup_username_exist"){
	$username = $_REQUEST['username'];
	$query = "SELECT member_username FROM members WHERE member_username='$username'";
	$link = mysql_query($query);
	if (!$link) {
		die('query error');
	}
	$num=mysql_num_rows($link)+0;
	if ($num>0){
	//die('email already exists'); //email already taken   
		echo '1';
	 }else{	
		echo '0';	
	}
}

if($process<>"member_edit" && $process<>"member_password_check" && $process<>"member_username_check" && $process<>"member_username_check_only" && $process<>"signup_username_exist"){
	header("Location: $return");
}
?>	
	
