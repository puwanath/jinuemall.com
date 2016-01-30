<?php
isset($_REQUEST['upline']) ? $upline = $_REQUEST['upline'] : $upline=null;
isset($_REQUEST['placement']) ? $placement = $_REQUEST['placement'] : $placement=null;

$me_package=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM packages WHERE package_id=".$me['package_id']));

$next_package_id=$me_package['package_id']+1;

$next_package=mysqli_fetch_array(mysqli_query($connect,"SELECT package_name,package_pv FROM packages WHERE package_id=$next_package_id"));

$pv_upgrade=$me['member_pv']+0;
$pv_upgrade_total=$next_package['package_pv']-$me_package['package_pv'];
$pv_persent=($pv_upgrade/$pv_upgrade_total)*100;
	
isset($uri[1]) ? $view = $uri[1] : $view=null;
isset($_SESSION['basket']) ? $basket = $_SESSION['basket'] : $basket=null;


$net_total=0;
$pv_total=0;

$confirm=null;
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
      <?php	echo wordvar('shopping');  ?>
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
	<meta content="text/html" charset="utf-8">
  </head>
  <body class="page-header-fixed bg-ios-purple-1 layout-fluid"> 
	<div class="modal-shiftfix">
	<?php
	include "header.php";
	
	if($view=="cart"){
	?>
	<div class="container-fluid main-content fluid-height padded row">
		<div class="col-md-10">
				<h1 style="color:#ffffff">		
				<i class="fa fa-shopping-cart"></i> <?php echo wordvar('View Cart');?>
				</h1>
		</div>
		<div class="col-md-2">
			<a class="btn btn-github btn-block" href="<?php echo $site_url;?>/shopping"><?php echo wordvar('Continue shopping');?></a>
		</div>
	</div>
	<div class="container-fluid main-content fluid-height padded">
		<?php
		if(!empty($basket)){
		?>
		<form action="<?php echo $site_url;?>/process" method="POST">
		<div class="row">
			<div class="col-md-9">
				<div class="widget-container fluid-height">
                  <div class="widget-content padded">
					
									<table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="span10"><?php echo wordvar('Product');?></th>
                                            <th class="span1 text-right"><?php echo wordvar('Quantity');?></th>
                                            <th class="span1 price-column text-right"><?php echo wordvar('Total Price');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 								
										foreach($basket as $product_id => $product_qty){
										$product_query=mysqli_query($connect,"SELECT * FROM products WHERE product_id=$product_id AND product_qty>=1;");
										$product=mysqli_fetch_array($product_query);
										$product_id=$product['product_id'];
										?>
                                        <tr>
                                            <td>
												<h4><b><?php echo $product['product_name'];?></b></h4>
                                                <div class="thumb">
                                                    <div style="width:100px;height:100px;background:url('<?php echo product_picture($product_id,"thumb");?>') center no-repeat;background-size:100% auto;"/></div>
                                                </div>
                                                <div class="price">
													<?php echo currency($product['product_price_member']);?>
													<br><?php echo $product['product_point'];?> PV
                                                </div>
												<a class="btn-link" onclick="<?php echo $product_id.'del';?>" href="<?php echo $site_url;?>/process?action=basket_delete&product_id=<?php echo $product['product_id'];?>&goto=<?php echo $site_url;?>/shopping/cart">
														<i class="fa fa-trash-o"></i><?php echo wordvar('Delete');?></a> 
														<script>
															document.getElementById('<?php echo $product_id.'del';?>').onchange = function() {
																window.location.href = this.children[this.selectedIndex].getAttribute('href');
															}
														</script>
                                            </td>
                                            <td align="right">
                                                <div class="quantity">
                                                    <select class="form-control" id="<?php echo $product_id.'Qty';?>" style="width:70px;">
													<?php
													for($i=1;$i<16;$i++){
													?>
                                                        <option href="<?php echo $site_url;?>/process?action=basket_edit&product_id=<?php echo $product['product_id'];?>&product_qty=<?php echo $i;?>&goto=<?php echo $site_url;?>/shopping/cart" <?php if($basket["$product_id"]==$i) echo "selected";?> ><?php echo $i;?></option>
														
													<?php
													}
													?>
                                                    </select> 
													<script>
															document.getElementById('<?php echo $product_id.'Qty';?>').onchange = function() {
																window.location.href = this.children[this.selectedIndex].getAttribute('href');
															}
														</script>
                                                </div>
                                            </td>
                                            <td align="right">
                                                <div class="price">
												<?php
													echo currency($product['product_price_member']*$basket["$product_id"]);
													$net_total+=$product['product_price_member']*$basket["$product_id"];
													$pv_total+=$product['product_point']*$basket["$product_id"];
												?>
                                                </div>
                                            </td>
                                        </tr>
										<?php
										}
										?>
                                     
                                    </tbody>
                                </table>
								
					</div>
				</div> <!-- widget cart-->
				<br>
				<div class="widget-container fluid-height ">
					<div class="widget-content padded text-center">
						<h2>You'll receive <b><?php echo $pv_total;?></b> PV</h2>
						<hr>
						<div class="row">
							<div class="col-sm-3  text-left" >
								<h3>Upgrade Package</h3>
							</div>
							<div class="col-sm-6 text-left">								
									<?php
									$pv_persent_need=((($pv_upgrade+$pv_total)/$pv_upgrade_total)*100)-$pv_persent;
									?>
									<div class="progress" style="height:24px;">
										<div class="progress-bar progress-bar-success" style="width: <?php echo $pv_persent;?>%;"></div>
										<div class="progress-bar progress-bar-warning" style="width: <?php if($pv_persent+$pv_persent_need>100) echo 100-$pv_persent; else echo $pv_persent_need;?>%;"></div>
									</div>
								<h4>
								<?php 
								if($pv_persent+$pv_persent_need>=100){
								?>
									You'll upgrade to <b><?php echo $next_package['package_name'];?></b>
								<?php
								}else{
								?>
									You need <?php echo $pv_upgrade_total-($pv_upgrade+$pv_total);?> PV for upgrade to <a><?php echo $next_package['package_name'];?></a> package. <a class="btn-link">Upgrade now</a>
								<?php
								}
								?>
								</h4>
							</div>	
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3  text-left" >
								<h3>Autoship</h3>
							</div>
							<div class="col-sm-6 text-left">
									<?php
									$autoship_persent=($me['member_purchase']/50)*100;
									$autoship_persent_need=((($me['member_purchase']+$pv_total)/50)*100)-$autoship_persent;
									?>
									<div class="progress" style="height:24px;">
										<div class="progress-bar progress-bar-success" style="width: <?php echo $autoship_persent;?>%;"></div>
										<div class="progress-bar progress-bar-warning" style="width: <?php if($autoship_persent+$autoship_persent_need>100) echo 100-$autoship_persent; else echo  $autoship_persent_need;?>%;"></div>
									</div>
								<h4>
								<?php 
								if($autoship_persent+$autoship_persent_need>=100){
								?>
									You'll Autoship Complete 
								<?php
								}else{
								?>
									You need <?php echo 50-($me['member_purchase']);?> to complete Autoship
								<?php
								}
								?>
								</h4>
							</div>	
						</div>
					</div>
				</div>
				<br>
				<a class="btn btn-github btn-block hidden" href="<?php echo $site_url;?>/shopping"><?php echo wordvar('Continue shopping');?></a>
			</div>
			<div class="col-md-3">
				<div class="widget-container fluid-height">
					<div class="widget-content padded text-center">					
						<h1><small>Total</small><br><?php echo currency($net_total);?></h1>
						<hr>
						<label class="row btn btn-default-outline btn-block padded" for="jWallet" <?php if($me['jWallet']>=$net_total){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
						<div class="col-md-2">
							<div class="radio">
								<input name="payment_method" type="radio" value="jWallet" id="jWallet" <?php if($me['jWallet']>=$net_total){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
								<span></span>
							</div>
						</div>
						<div class="col-md-10 text-left">
							<h3>J-Wallet<br>
								<small>Current balance : <?php echo currency($me['jWallet']);?></small>
							</h3>
						</div>
						</label>
						
						<label class="row btn btn-default-outline btn-block padded" for="rMoney" <?php if($me['rMoney']>=$net_total){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
						<div class="col-md-2">
							<div class="radio">
								<input name="payment_method" type="radio" value="rMoney" id="rMoney" <?php if($me['rMoney']>=$net_total){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
								<span></span>
							</div>
						</div>
						<div class="col-md-10 text-left">
							<h3>R-Wallet<br>
								<small>Current balance : <?php echo currency($me['rMoney']);?></small>
							</h3>
						</div>
						</label>
						
						<label class="row btn btn-default-outline btn-block padded" for="jWallet_rMoney"   <?php if($me['jWallet']+$me['rMoney']>=$net_total){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
						<div class="col-md-2">
							<div class="radio">
								<input name="payment_method" type="radio" value="jWallet_rMoney" id="jWallet_rMoney" <?php if($me['jWallet']+$me['rMoney']>=$net_total){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
								<span></span>
							</div>
						</div>
						<div class="col-md-10 text-left">
							<h3>J-Wallet + R-Wallet<br>
								<small>Current balance : <?php echo currency($me['jWallet']+$me['rMoney']);?></small>
							</h3>
						</div>
						</label>
						
						<label class="row btn btn-default-outline btn-block padded" for="jPoint" <?php  if($me['jPoint']>=$net_total && in_array("1",$basket)  && in_array("2",$basket)  && in_array("3",$basket)  && in_array("83",$basket) ){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
						<div class="col-md-2">
							<div class="radio">
								<input name="payment_method" type="radio" value="jPoint" id="jPoint" <?php  if($me['jPoint']>=$net_total && in_array("1",$basket)  && in_array("2",$basket)  && in_array("3",$basket)  && in_array("83",$basket) ){ echo "checked";$confirm="ok"; }else{ echo 'disabled="disabled"';}?>>
								<span></span>
							</div>
						</div>
						
						<div class="col-md-10 text-left">
							<h3>J-Point<br>
								<small>Current balance : <?php echo currency($me['rMoney']);?></small>
							</h3>
						</div>
						</label>
						
						<hr>
						<input type="hidden" name="action" value="order_confirm">
						<input type="hidden" name="goto" value="<?php echo $site_url;?>/profile">
						<button type="submit" class="btn btn-lg btn-block  <?php if($confirm!="ok") echo 'btn-default'; else echo 'btn-success'; ?>" <?php if($confirm!="ok") echo 'disabled="disabled"'; ?>><?php echo wordvar('Confirm payment');?></button>
					</div>
				</div>
			</div>
		</div>
		</form>
		<?php
		}else{
		?>
			<div class="row">
				<div class="col-md-12 text-center">
					<h3 style="color:#ffffff;">Your Shopping Cart is empty</h3>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<?php
	}else{
	?>
	<div class="container-fluid main-content fluid-height padded row">
		<div class="col-md-10">
				<h1 style="color:#ffffff">
				
				<?php 
				$product_about=mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(product_id) AS product_count , MIN(product_price_member) AS price_min FROM products;"));
				echo number_format($product_about['product_count'])." Product and Service From ".currency($product_about['price_min']);
				?>
				</h1>
		</div>
		<div class="col-md-2">
			<a class="btn btn-github btn-block" href="<?php echo $site_url;?>/shopping/cart"><i class="fa fa-shopping-cart"></i><?php echo wordvar('View Cart')." (".count($basket).")";?></a>
		</div>
	</div>
	<?php
	if($me['package_id']<7){
	?>
	<div class="container-fluid main-content bg-f7 padded">
		<div class="container main-content padded text-center">
			<h1>Recommend For Upgrade Package</h1>
			<h4>You have  need <?php echo $pv_upgrade_total-$pv_upgrade;?> pv for upgrade to <?php echo $next_package['package_name'];?> package. <a class="btn-link">Upgrade now</a>
			</h4>
			<div class="row pricing-table">
			<?php
			$i=0;
			$products_query=mysqli_query($connect,"SELECT * FROM products WHERE product_point>=".($pv_upgrade_total-$pv_upgrade)." AND product_point<=".$pv_upgrade_total." ORDER BY product_name DESC");
			while($products=mysqli_fetch_assoc($products_query)){
			?>
			<form action="<?php echo $site_url;?>/process" method="post">
			  <div class="col-sm-3">
				<div class="widget-container fluid-height list ">
				  <div class="widget-content padded text-center">
					<a href="<?php echo $site_main."/".$products['product_url'];?>" style="text-decoration:none;">
						<img src="<?php echo product_picture($products['product_id'],"thumb");?>" style="max-width:100%;max-height:150px;"><hr>
						<strong class="lead" style="font-size:1.2em;margin:10px 0 10px 0;"><?php echo $products['product_name'];?></strong>
						<h1><?php echo $products['product_description'];?></h1>
					</a>
				  </div>
					<ul>
						<li class="row" style="border:0px;">
							<div class="col-sm-8">
							<h3 >
								<?php echo currency($products['product_price_member']);?> <small>(<?php echo $products['product_point'];?> PV)</small>
							</h3>
							</div>
							<div class="col-sm-4 text-right">
								<input type="hidden" name="action" value="basket_add">
								<input type="hidden" name="product_id" value="<?php echo $products['product_id'];?>">
								<input type="hidden" name="product_qty" value="1">
								<input type="hidden" name="goto" value="<?php echo $site_url;?>/shopping/cart">
								<button type="submit" class="btn btn-block btn-success" ><?php echo wordvar('Buy now');?></button>
							</div>
						</li>
					</ul>
				</div>
			  </div>
			</form>
			 
				<?php
				$i++;
				if($i%4==0){
					echo '</div><div class="row pricing-table">';
				}
			}
			?>
			</div>
		</div>
	</div>
    <?php
	}
	?>
	
    <div class="container-fluid main-content bg-ios-gray padded">  
      <div class="container main-content">
	  <?php
	  $category_query=mysqli_query($connect,"SELECT * FROM product_category ORDER BY product_category_name ASC");
	  while($category=mysqli_fetch_assoc($category_query)){
	  ?>
        <div class="page-title" style="margin:60px 0px 0px 0px;padding-bottom:0px;">
          <h2><?php echo $category['product_category_name'];?></h2>
        </div>
        <div class="row pricing-table">
		<?php
		$i=0;
		$products_query=mysqli_query($connect,"SELECT * FROM products WHERE product_category_id LIKE '%[".$category['product_category_id']."]%' AND product_qty>=1 ORDER BY product_name DESC");
		while($products=mysqli_fetch_array($products_query)){
		?>
		<form action="<?php echo $site_url;?>/process" method="post">
          <div class="col-sm-3">
            <div class="widget-container fluid-height list ">
              <div class="widget-content padded text-center">
				<a href="<?php echo $site_main."/".$products['product_url'];?>" style="text-decoration:none;">
					<img src="<?php echo product_picture($products['product_id'],"thumb");?>" style="max-width:100%;max-height:150px;"><hr>
					<strong class="lead" style="font-size:1.2em;margin:10px 0 10px 0;"><?php echo $products['product_name'];?></strong>
					<h1><?php echo $products['product_description'];?></h1>
				</a>
              </div>
				<ul>
					<li class="row" style="border:0px;">
						<div class="col-sm-8">
						<h3 >
							<?php echo currency($products['product_price_member']);?> <small>(<?php echo $products['product_point'];?> PV)</small>
						</h3>
						</div>
						<div class="col-sm-4 text-right">
								<input type="hidden" name="action" value="basket_add">
								<input type="hidden" name="product_id" value="<?php echo $products['product_id'];?>">
								<input type="hidden" name="product_qty" value="1">
								<input type="hidden" name="goto" value="<?php echo $site_url;?>/shopping/cart">
								<button type="submit" class="btn btn-block btn-success" ><?php echo wordvar('Buy now');?></button>
						</div>
					</li>
				</ul>
            </div>
          </div>
		</form>
		 
			<?php
			$i++;
			if($i%4==0){
				echo '</div><div class="row pricing-table">';
			}
		}
		?>
        </div>
        <!-- Pricing table 2 -->
		<hr>
      <?php
	  }
	  ?>
	  

      </div>
    </div>
	<?php
	}
	?>
  </body>
</html>