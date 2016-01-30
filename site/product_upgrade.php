<?php

?>
<section class="product-featured _2">
			<div class="container">

				<div class="heading-tabs _2 ">
					<ul>
						<li class="active"><a href="#featured" data-toggle="tab"><?php echo wordvar('Package Upgrade'); ?></a></li>
					</ul>
				</div>
				
				<div class="tab-content">

					<div class="tab-pane fade active in featured" id="featured">
						<div class="featured-slide _2" data-custom="0-1,480-2,768-3,992-4,1200-5">

							<!-- GRID ITEM -->
							<?php
							if($countrycheck!="TH"){
							$product_query=mysqli_query($connect,'SELECT * FROM products where product_id != 144 ORDER BY RAND() LIMIT 10');
							}else{
							$product_query=mysqli_query($connect,'SELECT * FROM products where product_id != 144 and (product_category_id NOT LIKE "%[9]%" and product_category_id NOT LIKE "%[10]%" and product_category_id NOT LIKE "%[11]%" and product_category_id NOT LIKE "%[3]%"  and product_category_id NOT LIKE "%[13]%" and product_category_id NOT LIKE "%[12]%")  ORDER BY RAND() LIMIT 10');
							}
							while($product=mysqli_fetch_array($product_query)){
							?>
							<div class="grid-item _2 ">
								<div class="image">
									<a href="product-detail-2.html">
										<img src="<?php echo product_picture_thumb($product['product_id']);?>" style="max-height:402; max-width:270px;">
									</a>
									<div class="action">
									<?php
									if($product['product_qty']>0){
									?>
										<div class="add-cart">
											<a href="<?php echo $site_url;?>/process?action=basket_add&product_id=<?php echo $product['product_id'];?>&product_qty=1&goto=<?php echo $site_url;?>/cart" class="btn btn-14 add-cart text-uppercase"><i class="fa fa-cart-plus"></i><?php echo wordvar('Add to cart');?> </a>
										</div>
									<?php
									}else{
									?>
										<div class="add-cart">
											<a href="#" class="btn btn-2 add-cart text-uppercase" style="background-color:red; border:1px red solid" disabled><i class="fa fa-cart-plus"></i><?php echo wordvar('Sold Out');?> </a>
										</div>
									<?php
									}
									?>
										<div class="add-cart">
											<a href="<?php echo $site_url.'/'.$product['product_url'];?>" class="btn btn-14"><i class="fa fa-eye"></i><?php echo wordvar('View Product');?></a>
										</div>
									</div>
								</div>
								<div class="text">
									<h2 class="name">
										<a href="product-detail-2.html"><?php echo $product['product_name']; ?></a>	
									</h2>	
									<div class="price-box"> 
	                                  	<p class="special-price">
	                                   		<span class="price">
											<?php 
											if($me_login==null){
												echo currency($product['product_price']);
											}else{
												echo currency($product['product_price_member']);
												echo "  ( PV : ".$product['product_point']." )";
											}
											?>
											</span> 
	                                  	</p>   
		                          	</div>
								</div>
							</div>
							<?php
							}
							?>
							<!-- END GRID ITEM -->

							
						</div>
					</div>

				</div>

			</div>
		</section>