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
                        Products
						<div class="pull-right">
							<a  href="<?php echo $site_url;?>/product/?action=new" class="btn btn-default btn-xs"><i class="fa fa-plus" ></i> Add new Product</a>
						</div>
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table">
                    <thead>
                    <tr>
						<th>ID</th>
						<th>Images</th>
                        <th class="hidden-phone">Name</th>
                        <th class="hidden-phone">Quantity</th>
                        <th class="hidden-phone">Price</th>
                        <th class="hidden-phone">PV</th>
                        <th class="hidden-phone">Category</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$product_query=mysqli_query($connect,'SELECT * FROM products ORDER BY product_name ASC');
					while($product=mysqli_fetch_array($product_query)){
					$product_id=$product['product_id'];
					?>
                    <tr class="gradeX">
                        <td align="center"><?php echo $product['product_id'];?></td>
                        <td align="center">
							<?php
							$picture=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM product_pictures WHERE picture_index='#' AND product_id=".$product['product_id']));
							?>
							<img src="<?php echo $site_main."/gallery/products/thumb/".$picture['picture_id'].".".$picture['picture_type'];?>" style="width:50px;">
						</td>
						<td>
							<a class="btn-link" href="<?php echo $site_url;?>/product/?action=edit&id=<?php echo $product['product_id'];?>">
								<?php echo $product['product_name'];?>
							</a>					
							<br>
							 <?php echo $product['product_description'];?>
						</td>
                        <td><?php echo $product['product_qty'];?></td>
                        <td><?php echo number_format($product['product_price_member'],2);?></td>
                        <td><?php echo number_format($product['product_point'],2);?></td>
                        <td><?php
						if($product['product_category_id']!=""){
							$product_category=$product['product_category_id'];
							$product_category=str_replace("[","",$product_category);
							$product_category=str_replace("]","",$product_category);
							$product_category=explode(',',$product_category);
							
							foreach ($product_category as $category_id) {
								$category=mysqli_fetch_array(mysqli_query($connect,"SELECT product_category_name FROM product_category WHERE product_category_id LIKE '%".$category_id."%' "));
								echo $category['product_category_name'].",";
							}
						}
						?>
						</td>
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
</body>
</html>
