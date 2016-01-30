<?php
isset($_REQUEST['action'])?$action=$_REQUEST['action']:$action='';
isset($_REQUEST['id'])?$product_id=$_REQUEST['id']:$product_id='';
/* Set action */
if($action=="new" || $action==""){
	$page_title="Add new Product";
	$process_action="product_add";
	$process_goto=$site_url."/products";
}elseif($action=="edit" && $product_id!=""){
	$product_query=mysqli_query($connect,"SELECT * FROM products WHERE product_id=$product_id");
	$product=mysqli_fetch_array($product_query);
	
	isset($product['product_id']) ? $product_id=$product['product_id'] : $product_id=null;
	isset($product['product_name']) ? $product_name=$product['product_name'] : $product_name=null;
	isset($product['product_detail']) ? $product_detail=$product['product_detail'] : $product_detail=null;
	isset($product['product_description']) ? $product_description=$product['product_description'] : $product_description=null;
	isset($product['product_price']) ? $product_price=$product['product_price'] : $product_price=null;
	isset($product['product_price_member']) ? $product_price_member=$product['product_price_member'] : $product_price_member=null;
	isset($product['product_pv']) ? $product_pv=$product['product_pv'] : $product_pv=null;
	isset($product['product_weight']) ? $product_weight=$product['product_weight'] : $product_weight=null;
	isset($product['product_qty']) ? $product_qty=$product['product_qty'] : $product_qty=null;
	isset($product['product_barcode']) ? $product_barcode=$product['product_barcode'] : $product_barcode=null;
	isset($product['product_url']) ? $product_url=$product['product_url'] : $product_url=null;
	isset($product['product_category']) ? $product_category=$product['product_category'] : $product_category=null;
	
	$page_title="Edit : ".$product['product_name'];
	$process_action="product_edit";
	$process_goto=$site_url."/product?action=edit&id=$product_id";
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

	
	<link href="<?php echo $site_dir;?>/js/iCheck/skins/square/green.css" rel="stylesheet">
	
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
		<form action="<?php echo $site_url;?>/process" enctype="multipart/form-data" method="post">
		<input type="hidden" name="process" value="<?php echo $process_action;?>">
		<input type="hidden" name="product_id" value="<?php echo $product_id;?>">
		<input type="hidden" name="goto" value="<?php echo $process_goto;?>">
        <div class="row">
            <div class="col-md-9">
				<section class="panel">
                    <header class="panel-heading">
                        <?php echo $page_title;?>
						<div class="pull-right">
						</div>
                    </header>
                    <div class="panel-body toggle-heading">
						<input class="form-control input-lg m-bot15" type="text" value="<?php echo $product_name;?>" placeholder="Product Name" name="product_name" required autofocus >
						
						<div class="input-group m-bot15 col-md-12">
							<span class="input-group-addon">http://www.jinuemall.com/</span>
							<input type="text" class="form-control" value="<?php echo $product_url;?>" placeholder="Product Url" name="product_url">
						</div>
						
                        <textarea class="wysihtml5 form-control" rows="32"  placeholder="Product Detail" name="product_detail"><?php echo $product_detail;?></textarea>
						
						
						
						<div class="row">
							<div class="attachment-mail col-lg-12">
								<ul>
								<h3>Pictures</h3>
                                    <input type="file" class="default" name="image[]" multiple accept="image/*" />
									<!--li class="text-center">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
											</div>
											<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
											<div>
													   <span class="btn btn-white btn-file">
													   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
													   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
													   <input type="file" class="default"  name="img[]" multiple>
													   </span>
												<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
											</div>
										</div>
									</li-->
									<?php
									if($action=="edit"){
										$pictures_query=mysqli_query($connect,"SELECT * FROM product_pictures WHERE product_id=$product_id ORDER BY picture_index ASC");
										while($pictures=mysqli_fetch_array($pictures_query)){
										?>
										<li>
											<a class="!atch-thumb" href="#">
												<img src="<?php echo $site_main;?>/gallery/products/thumb/<?php echo $pictures['picture_id'].".".$pictures['picture_type'];?>">
											</a>
											<?php
											if($pictures['picture_index']=="#"){
												echo "Main Picture";
											}else{
												echo $pictures['picture_index'];
											}
											?>
											&nbsp;|&nbsp;
											<a class="btn-link" href="<?php echo $site_url;?>/process?process=product_picture_delete&picture_id=<?php echo $pictures['picture_id'];?>"><i class="fa fa-trash-o"></i></a>
										</li>
										<?php
										}
									}
									?>								

								</ul>
							</div>
						</div>
						<button type="submit" class="btn btn-info"><i class="fa fa-save" ></i> Save</button>
						<a class="btn btn-link" href="#" data-href="<?php echo $site_url;?>/process?process=product_delete&product_id=<?php echo $product_id;?>" data-toggle="modal" data-target="#confirm-delete">Delete this product</a>

						<!--button class="btn btn-default" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete">
							Delete record #54
						</button-->
						
						<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										Confirm delete
									</div>
									<div class="modal-body">
										Do you sure to delete <b><?php echo $product['product_name'];?></b>.?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										<a class="btn btn-danger btn-ok"><i class="fa fa-trash-o"></i> Delete</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </section>
				
				
            </div>
			<div class="col-md-3">
				
				<section class="panel">
                    <div class="panel-body">
						<button type="submit" class="btn btn-info"><i class="fa fa-save" ></i> Save</button>
						<a class="btn btn-link pull-right" href="#" data-href="process.php?process=product_delete&product_id=<?php echo $product_id;?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i> Delete</a>
					</div>
				</section>
				<section class="panel">
                    <header class="panel-heading">
                        Options
                              <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="row">    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="">Description</label>
                                    <textarea class="form-control" rows="4"   placeholder="Product Description" name="product_description"><?php echo $product['product_description'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="">Regular Price ($)</label>
                                    <input type="text"  value="<?php echo $product['product_price'];?>" class="form-control" placeholder="Product Price" name="product_price">
                                </div>
								<div class="form-group">
                                    <label class="">Member Price ($)</label>
                                    <input type="text" value="<?php echo $product['product_price_member'];?>" class="form-control" placeholder="Product Member Price" name="product_price_member">
                                </div>
								<div class="form-group">
                                    <label class="">Product PV</label>
                                    <input type="text" value="<?php echo $product['product_point'];?>" class="form-control" placeholder="Product PV" name="product_pv">
                                </div>
								<div class="form-group">
                                    <label class="">Product Weight</label>
                                    <input type="text" value="<?php echo $product['product_weight'];?>" class="form-control" placeholder="Product Weight" name="product_weight">
                                </div>
								<div class="form-group">
                                    <label class="">Product Quantity</label>
                                    <input type="text" value="<?php echo $product['product_qty'];?>" class="form-control" placeholder="Product Quantity" name="product_qty">
                                </div>
								<div class="form-group">
                                    <label class="">Barcode</label>
                                    <input type="text" value="<?php echo $product['product_barcode'];?>" class="form-control" placeholder="Product Barcode" name="product_barcode">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
				
				
				<section class="panel">
                    <header class="panel-heading">
                        Category
                          <span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12 icheck ">
										<?php 
										$category_query=mysqli_query($connect,'SELECT * FROM product_category ORDER BY product_category_name ASC');
										while($category=mysqli_fetch_array($category_query)){
										?>
                                            <div class="square-green single-row">
                                                <div class="checkbox ">
                                                    <input type="checkbox" id="<?php echo $category['product_category_id'];?>" value="<?php echo $category['product_category_id'];?>"  name="product_category[]" 
													<?php 
													if($product['product_category_id']!="" AND $product['product_category_id']!="0"){
														
														$product_category=$product['product_category_id'];
														$product_category=str_replace("[","",$product_category);
														$product_category=str_replace("]","",$product_category);
														$product_category=explode(',',$product_category);
														
														$category_id=$category['product_category_id'];
														if(in_array("$category_id",$product_category)){
															echo "checked";
														}
													}
													?>
													>
                                                    <label for="<?php echo $category_id;?>"><?php echo $category['product_category_name'];?></label>
                                                </div>
                                            </div>
										<?php
										}
										?>
										</div>
									</div>
									
							<div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" id="new" placeholder="Add New Category"  name="product_category_new">
                                </div>
                            </div>
						
                    </div>
                </section>
			</div>
        </div>
		</form>
		</section>
	</section>
    <!--main content end-->
<?php include "sidebar_right.php";?>

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

<script src="<?php echo $site_dir;?>/js/iCheck/jquery.icheck.js"></script>

<!--common script init for all pages-->
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>
<script>
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>

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



<!--icheck init -->
<script src="<?php echo $site_dir;?>/js/icheck-init.js"></script>

</body>
</html>
