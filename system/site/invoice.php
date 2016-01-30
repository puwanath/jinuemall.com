<?php
isset($uri[1]) ? $order_id=$uri[1] : $order_id=null;
$order_query=mysqli_query($connect,"SELECT * FROM orders WHERE order_id=$order_id");
$order=mysqli_fetch_array($order_query);

$member_id=$order['member_id'];
$member_query=mysqli_query($connect,"SELECT * FROM members WHERE member_id=$member_id");
$member=mysqli_fetch_array($member_query);

$pv_qty=0;
$total_pv=0;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
		<?php echo wordvar('Invoice');?>
    </title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
	<meta charset="utf-8">
  </head>
  <body class="page-header-fixed bg-ios-gray layout-boxed">  
    <div class="modal-shiftfix">
      <?php
	  include "header.php";
	  ?>
      <div class="container-fluid main-content">
	  
        <div class="invoice">
          <div class="row">
            <div class="col-lg-12">
              <div class="row invoice-header">
                <div class="col-md-6">
                  <img width="183" src="<?php echo $site_main;?>/site/images/logo-jinuemall.png" />
                </div>
                <div class="col-md-6 text-right">
                  <h2>
                    <?php echo wordvar('Invoice #');?> : #<?php echo $order_id;?>
                  </h2>
                  <p>
                    <?php echo $order['order_date'];?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="well">
                <strong><?php echo wordvar('From');?></strong>
                <h3>
					<?php echo wordvar('บริษัท จีนู( ประเทศไทย) จำกัด');?>
				</h3>
                <p>
					135/1-2 ตึกอมรพันธ์ 2<br>
					ถนนรัชดาภิเษก  <br>
					แขวงดินแดง เขตดินแดง<br>
					กรุงเทพมหานคร 10400<br>
					jinuemall@gmail.com
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="well">
                <strong><?php echo wordvar('To');?></strong>
                <h3>
                 <?php echo $member['member_name']."  ".$member['member_surname'];?>
                </h3>
                <p>
					<?php echo $member['member_address'];?><br>
					<?php echo $member['member_city'];?><br>
					<?php echo $member['member_country'];?><br>
					<?php echo $member['member_zipcode'];?><br>
					<?php echo $member['member_email'];?>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="widget-container fluid-height">
                <div class="widget-content padded clearfix">
                  <table class="table table-striped invoice-table">
                    <thead>
						   		
                      <th width="50"></th>
                      <th>
                        <?php echo wordvar('Product');?>
                      </th>
					  <th width="100">
                        PV
                      </th>
                      <th width="70">
                        <?php echo wordvar('Qty');?>
                      </th>
                      <th width="100">
                        <?php echo wordvar('Unit price');?>
                      </th>
                      <th width="100">
                        <?php echo wordvar('Total');?>
                      </th>
                    </thead>
					<?php
					$i=0;
					$items_query=mysqli_query($connect,"SELECT * FROM order_items WHERE order_id=$order_id");
					while($items=mysqli_fetch_array($items_query)){
					$product_result=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM products WHERE product_id=".$items['product_id']));
					$i++;
					?>
                    <tbody>	 
                      <tr>
                        <td>
                          #<?php echo $i;?>
                        </td>
                        <td>
                          <?php echo $product_result['product_name']?>
                        </td>
						<td>
                          <?php
							echo $product_pv=$product_result['product_point'];
							$pv_qty=$product_pv*$items['item_qty'];
							$total_pv+=$pv_qty;
						  ?>
                        </td>
                        <td>
                          <?php echo $items['item_qty'];?>
                        </td>
                        <td>
                          <?php
						  $product_price=$product_result['product_price_member'];
						  echo currency($product_price);
						  ?>
                        </td>
						<td>
                          <?php echo currency($product_price*$items['item_qty']);?>
                        </td>
                      </tr>
                    </tbody>
					<?php
					}
					?>
                    <tfoot>
                      <tr>
                        <td class="text-right" colspan="5">
                          <strong><?php echo wordvar('Subtotal');?></strong>
                        </td>
                        <td>
                          <?php echo currency($order['order_total']);?>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" colspan="5">
                          <strong><?php echo wordvar('Discount');?></strong>
                        </td>
                        <td>
                          <?php echo currency($order['order_discount']);?>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" colspan="5">
                          <strong><?php echo wordvar('Estimated_shipping_costs');?></strong>
                        </td>
                        <td>
                          <?php echo currency($order['shipping_costs']);?>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" colspan="5">
                          <h4 class="text-primary">
                            <?php echo wordvar('Total PV');?> 
                          </h4>
                        </td>
                        <td>
                          <h4 class="text-primary">
                            <?php echo $total_pv;?> PV
                          </h4>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" colspan="5">
                          <h4 class="text-primary">
                            <?php echo wordvar('Net Total');?>
                          </h4>
                        </td>
                        <td>
                          <h4 class="text-primary">
                            <?php echo currency($order['order_total']);?>
                          </h4>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="well">
                <strong><?php echo wordvar('Notes');?></strong>
                <p>
                  <?php echo $order['order_comment'];?>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <a class="btn btn-primary pull-right" onclick="javascript:window.print();"><i class="fa fa-print"></i><?php echo wordvar('Print invoice');?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>