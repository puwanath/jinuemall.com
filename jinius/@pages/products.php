<?
$colors_arr=array("#1CA8DD","#1BC98E","#9F86FF","#E64759","#E4D836","#68C3A3","#D2D7D3");
$product_search=$_REQUEST['product_search'];
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
      
       Products &middot; JINIUS
      
    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="<?=$dir;?>/dashboard/css/toolkit-inverse.css" rel="stylesheet">
    <link href="<?=$dir;?>/dashboard/css/docs.css" rel="stylesheet">
    <link href="<?=$dir;?>/dashboard/css/application.css" rel="stylesheet">
	<script src="<?=$dir;?>/dashboard/dist/sweetalert.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="<?=$dir;?>/dashboard/dist/sweetalert.css">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
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
			<h2 class="apb">Products</h2>
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
			  <input type="text" name="product_search" class="form-control aqp" placeholder="Search Products" value="<?=$product_search;?>">
			  <span class="bv adm"></span>
			</div>
			</form>
		  </div>
		  <div class="akg">
			<div class="oa">
			  <a href="#docsModal" data-toggle="modal" class="ce apm">
				<span class="bv xn"></span>
			  </a>
			</div>
		  </div>
		</div>
		
		

		<div class="uc">
		  <div class="eg">
			<table class="cl" data-sort="table">
			  <thead>
			  
				<tr>
				  <th><input type="checkbox" class="aqi" id="selectAll"></th>
				  <th></th>
				  <th>Images</th>
				  <th>Name</th>
				  <th>Quantity</th>
				  <th>Price</th>
				  <th>Member Price</th>
				  <th>Category</th>
				  <th>Edit</th>
				</tr>
			  </thead>
			  <tbody>
				<?
				$products_sql="SELECT * FROM products";
				if($product_search!=""){
				$products_sql.=" WHERE product_name LIKE '%$product_search%' OR product_description LIKE '%$product_search%' OR product_detail LIKE '%$product_search%' ";
				}
				$products_sql.=" ORDER BY product_name LIMIT 100";
				$products_query=mysql_query($products_sql);
				while($products=mysql_fetch_array($products_query)){
				$product_id=$products['product_id'];
				?>
				<tr>
				  <td><input type="checkbox" class="aqj"></td>
				  <td><a href="#">#<?=$products['product_id'];?></a></td>
				  <td>
					<?
					$picture_type=mysql_result(mysql_query("SELECT picture_type FROM product_pictures WHERE product_id='$product_id';"),0);
					?>
					<img src="http://jinuemall.com/@pages/images/products/<?=$product_id;?>_1.<?=$picture_type;?>" style="width:50px;">
				  </td>
				  <td><?=$products['product_name'];?></td>
				  <td><?=$products['product_qty'];?></td>
				  <td><?=$products['product_price'];?></td>
				  <td><?=$products['product_price_member'];?></td>
				  <td>
				  <?=mysql_result(mysql_query("SELECT product_category_name FROM product_category WHERE product_category_id=".$products['product_category_id']),0);?>
				  </td>
				  <td>
					  <div class="oa">
						  <a href="#edit_<?=$products['product_id'];?>" data-toggle="modal" class="ce apm">
							<span class="bv aey"></span>
						  </a>
					  </div>
				  </td>
				</tr>
				<form action="process.php" method="post">
				<!-- Modal Edit -->
				  <div id="edit_<?=$products['product_id'];?>" class="cb fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog">
					<div class="modal-content">

					  <div class="rj">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Edit Product</h4>
					  </div>
					  <div class="modal-body  ">
						
							<div class="row">
							  <div class="col-xs-2">
								<input type="text" class="form-control" placeholder="Product Name" name="product_name" value="<?=$products['product_name'];?>" required>
							  </div><br>
							  <div class="col-xs-3">
								<input type="text" class="form-control" placeholder="Product Description" name="product_des" value="<?=$products['product_description'];?>">
							  </div><br>
							  <div class="col-xs-3">
								<textarea class="form-control" placeholder="Product Detail" id="product_detail" name="product_detail" rows="3"><?=$products['product_detail'];?></textarea>
							  </div><br>
							  <div class="col-xs-3">
								<input type="text" class="form-control" placeholder="Product Price" name="product_price" value="<?=$products['product_price'];?>">
							  </div><br>
							  <div class="col-xs-3">
								<input type="text" class="form-control" placeholder="Product Member Price" name="product_price_member" value="<?=$products['product_price_member'];?>">
							  </div><br>
							  <div class="col-xs-3">
								<input type="text" class="form-control" placeholder="Product PV" name="product_pv" value="<?=$products['product_point'];?>">
							  </div><br>
							  <div class="col-xs-4">
								<input type="text" class="form-control" placeholder="Product Quantity" name="product_qty" value="<?=$products['product_qty'];?>">
							  </div><br>
							  <div class="col-xs-3">
								<input type="text" class="form-control" placeholder="Product Barcode" name="product_barcode" value="<?=$products['product_barcode'];?>">
							  </div><br>
							  <div class="col-xs-3">
								<input type="text" class="form-control" placeholder="Product Url" name="product_url" value="<?=$products['product_url'];?>">
							  </div><br>
							  <div class="col-xs-3">
								<fieldset class="form-group">
								<label for="exampleSelect1">Product Category</label>
								<select class="form-control" id="exampleSelect1" name="product_category">
								<?
								$category_query=mysql_query('SELECT * FROM product_category');
								while($category=mysql_fetch_array($category_query)){
								?>
								  <option value="<?=$category['product_category_id'];?>" <? if($category['product_category_id']==$products['product_category_id']){ echo "selected"; } ?>  ><?=$category['product_category_name'];?></option>
								 <?
								}
								?>
								</select>
							  </fieldset>
							  </div>
							</div>
					  </div>
					  <div class="rk">
						<a href="process.php?process=product_delete&product_id=<?=$products['product_id'];?>&return=<?=$url;?>/products" type="button" class="ce fh bv wf" style="background-color:#B9DFF1; border-color:#B9DFF1; color:#60A9CC;"> Delete Product</a>
						<button type="submit" class="ce fh bv zs"> Finish </button>
						<input type="hidden" name="process" value="product_edit">
						<input type="hidden" name="product_id" value="<?=$products['product_id'];?>">
						<input type="hidden" name="return" value="<?=$url;?>/?page=products">
					  </div>
					</div>
				  </div>
				</div>
				</form>
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


<form action="process.php" enctype="multipart/form-data" method="post">
<!-- Modal -->
  <div id="docsModal" class="cb fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="rj">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
      </div>
      <div class="modal-body  ">
		
			<div class="row">
			  <div class="col-xs-2">
				<input type="text" class="form-control" placeholder="Product Name" name="product_name" required>
			  </div><br>
			  <div class="col-xs-3">
				<input type="text" class="form-control" placeholder="Product Description" name="product_des">
			  </div><br>
			  <div class="col-xs-3">
				<textarea class="form-control" placeholder="Product Detail" id="product_detail" name="product_detail" rows="3"></textarea>
			  </div><br>
			  <div class="col-xs-3">
				<input type="text" class="form-control" placeholder="Product Price" name="product_price">
			  </div><br>
			  <div class="col-xs-3">
				<input type="text" class="form-control" placeholder="Product Member Price" name="product_price_member">
			  </div><br>
			  <div class="col-xs-3">
				<input type="text" class="form-control" placeholder="Product PV" name="product_pv">
			  </div><br>
			  <div class="col-xs-4">
				<input type="text" class="form-control" placeholder="Product Quantity" name="product_qty">
			  </div><br>
			  <div class="col-xs-3">
				<input type="text" class="form-control" placeholder="Product Barcode" name="product_barcode">
			  </div><br>
			  <div class="col-xs-3">
				<input type="text" class="form-control" placeholder="Product Url" name="product_url">
			  </div><br>
			  <div class="col-xs-3">
				<fieldset class="form-group">
				<label for="exampleSelect1">Product Category</label>
				<select class="form-control" id="exampleSelect1" name="product_category">
				<?
				$category_query=mysql_query('SELECT * FROM product_category');
				while($category=mysql_fetch_array($category_query)){
				?>
				  <option value="<?=$category['product_category_id'];?>"><?=$category['product_category_name'];?></option>
				 <?
				}
				?>
				</select>
			  </fieldset>
			  </div>
			</div>
      </div>
      <div class="rk">
		<input type="file" name="img[]" multiple> 
        <button type="submit" class="ce fh">Add Product</button>
		<input type="hidden" name="process" value="product_add">
		<input type="hidden" name="return" value="<?=$url;?>/?page=products">
      </div>
    </div>
  </div>
</div>
</form>


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

