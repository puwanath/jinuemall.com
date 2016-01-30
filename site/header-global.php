		<header class="header _2">
			<!--ON the top menu-->
			<div class="row"  style="padding:5px;background-color: #054233;" >
					<div class="container" align="right">
						<span class="box-top-right">
						
							<a href="<?php echo $site_url.'/'.$uri[0];?>?lg=us" class="<?php  if($_GET['lg']=="us") echo "current";?>"><img src="<?php echo $site_dir;?>/images/flags/EN-sq.png" alt=""></a>
							<a href="<?php echo $site_url.'/'.$uri[0];?>/?lg=th" class="<?php  if($_GET['lg']=="th") echo "current"; elseif($_GET['lg']=="") echo "current";?>"><img src="<?php echo $site_dir;?>/images/flags/TH-sq.png" alt=""></a>
							
							<!-- SEARCH -->
							<span class="search-h">
								<button data-toggle='modal' data-target='#mySearch' class="icon-search"></button>
							</span>
							<!-- END SEARCH -->
							
							<?php 
							if($me_login==null){
								echo "<a href='$jsystem_url' class='btn btn-top2' ><span class='fa fa-shield'></span> ".wordvar('JSystem')."</a>";
								
							}else{
								echo "<a href='$jsystem_url' class='btn btn-top2' ><span class='fa fa-user'></span> ".strtoupper($me_name)."</a>";
							}
							
							if($me_login!=null){
								echo "<a href='$jsystem_url' class='btn btn-top3' >Wallet : ".currency($wallet)."</a>";
							}
							
							if($me_login==null){
								echo "<a href='' class='btn btn-top1' data-toggle='modal' data-target='#myLogin' ><span class='fa fa-key'></span> ".wordvar('Login')."</a>";
								
							}else{
								echo "<a href='?logout' class='btn btn-top1' ><span class='fa fa-power-off'></span></a>";
							}
							?>
							
						</span>
						
						<span class="box-top-left">
						
						</span>
						
						
					</div>
			</div>
			<!-- end top menu-->
			<div class="container">
				
				

				<!-- HEADER CONTENT -->
				<div class="header-cn clearfix">
					
					<!-- MINI CART -->
					<div class="mini-cart ">
						<?php
						$countcart  = 0;
						$sumtotal2  = 0;
						isset($_SESSION['basket']) ? $basket = $_SESSION['basket'] : $basket = null;
						//print_r($basket);
							if($basket!=null){
								foreach($basket as $product_id => $product_qty){
								 $product2 = "SELECT * from products where product_id = '$product_id'";
								 $qproduct2 = mysqli_query($connect,$product2);
								 $reproduct2 = mysqli_fetch_object($qproduct2);
								 $product_id2 = $reproduct2->product_id;
								 
								 if($me_login!=null){
										$sumtotal2 = $sumtotal2 + $reproduct2->product_price_member*$basket[$product_id];
									}else{
										$sumtotal2 = $sumtotal2 + $reproduct2->product_price*$basket[$product_id];
									}
								}
								
								$countcart = count($basket);
								
								
							}
						?>
						
						<!-- HEADER CART -->
						<div class="cart-head" id="cart-head">
							<label>MY CART <span>(<?php echo $countcart;?>)</span></label>
							<p><span>Total:</span> <?php echo currency($sumtotal2);?> <small>(<?php echo $countcart;?>)</small></p>
							<span class="cart-count"><?php echo $countcart;?></span>
						</div>
						<!-- END HEADER CART -->

						<!-- CART CONTENT -->
						<div class="cart-cn">
							<ul class="cart-list">
							<?php
							$sumtotal  = 0;
							isset($_SESSION['basket']) ? $basket = $_SESSION['basket'] : $basket = null;
							if($basket!=null){
								foreach($basket as $product_id => $product_qty){
							 $product = "SELECT * from products where product_id = '$product_id'";
							 $qproduct = mysqli_query($connect,$product);
							 $reproduct = mysqli_fetch_object($qproduct);
							 $product_id = $reproduct->product_id;
							

							?>
								<li>
									<a href="#" class="img">
										<img src="<?php echo product_picture_thumb($product_id);?>" alt="" width="60">
									</a>
									<div class="text">
										<div class="name">
											<a href="#"><?php echo $reproduct->product_name;?></a>
										</div>
										<?php echo $basket[$product_id]." x ";?>
										<span class="price">
										<?php 
										if($me_login!=null){
											echo currency($reproduct->product_price_member);
										}else{
											echo currency($reproduct->product_price);
										}
										?>
										</span>
										<a href="<?php echo $site_url;?>/process?action=basket_delete&product_id=<?php echo $product_id;?>&goto=<?php echo $site_url;?>/cart" class="delete"><img src="<?php echo $site_dir;?>/images/icon-delete.png" alt=""></a>
									</div>
								</li>
							<?php 
							
									if($me_login!=null){
										$sumtotal = $sumtotal + $reproduct->product_price_member*$basket[$product_id];
									}else{
										$sumtotal = $sumtotal + $reproduct->product_price*$basket[$product_id];
									}
							
							
								}
							}
							?>
							
							</ul>
							<p class="cart-total"><?php echo wordvar('Total');?>: <span><?php echo currency($sumtotal);?></span></p>
							<div class="cart-bt">
								<a href="<?php echo $site_url;?>/cart" class="btn btn-4 text-uppercase"><?php echo wordvar('View Cart');?></a>
								<a href="<?php echo $site_url;?>/checkout" class="btn btn-4 text-uppercase"><?php echo wordvar('CheckOut');?></a>
							</div>
						</div>
						<!-- END CART CONTENT -->

					</div>
					<!-- END MINI CART -->

					<!-- LOGO -->
					<div class="logo">
						<a href="<?php echo $site_url;?>"><img src="<?php echo $site_dir;?>/images/logo_jinuemall.png" alt=""></a>
					</div>
					<!-- END LOGO -->

					<!-- MENU BAR -->
					<div id="menu-bar" class="menu-bar ">
						<span class="one"></span>
						<span class="two"></span>
						<span class="three"></span>
					</div>
					<!-- END MENU BAR -->

					<div class="clear"></div>
					
					<!-- NAVIGATION -->
					<nav class="navigation">
						<ul class="menu">
							<?php
							$me_country=me("country_code");
							if(isset($me_country)){
								$countrycheck= $me_country;
							}else{
								$countrycheck = $getdetails->country;
							}
							
							if($countrycheck=="TH"){
							?>
							<li class="<?php if($uri[0]=='supplement'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/supplement"><?php echo strtoupper (wordvar('Supplement'));?></a>
							</li>
							<li class="<?php if($uri[0]=='cellveda'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/cellveda"><?php echo strtoupper(wordvar('Cellveda'));?></a>
							</li>
							<li class="<?php if($uri[0]=='decello'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/decello"><?php echo strtoupper(wordvar('Decello'));?></a>
							</li>
							<li class="<?php if($uri[0]=='packages'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/packages"><?php echo strtoupper(wordvar('Packages'));?></a>
							</li>
							<li class="<?php if($uri[0]=='recommend'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/recommend"><?php echo strtoupper(wordvar('Recommend'));?></a>
							</li>
							<li class="<?php if($uri[0]=='service'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/service"><?php echo strtoupper(wordvar('Service'));?></a>
							</li>
							<li class="<?php if($uri[0]=='colornique'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/colornique"><?php echo strtoupper(wordvar('Colornique'));?></a>
							</li>
							
							<?php
							}else{
							?>
							<li class="<?php if($uri[0]=='region-supplement'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/region-supplement"><?php echo strtoupper (wordvar('Glu Gold'));?></a>
							</li>
							<li class="<?php if($uri[0]=='region-cellveda'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/region-cellveda"><?php echo strtoupper(wordvar('Cellveda'));?></a>
							</li>
							<li class="<?php if($uri[0]=='region-packages'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/region-packages"><?php echo strtoupper(wordvar('E-Voucher'));?></a>
							</li>
							<li class="<?php if($uri[0]=='cellveda-package'){ echo "current-menu-parent"; }?>">
								<a href="<?php echo $site_url;?>/cellveda-package"><?php echo strtoupper(wordvar('Cellveda Package'));?></a>
							</li>
							
							<?php
							}
							?>
							
						</ul>
					</nav>
					<!-- END NAVIGATION -->

				</div>
				<!-- END HEADER CONTENT -->

			</div>
		</header>
		
		<!--modal login-->
		<div class="modal fade bs-example-modal-sm" id="myLogin">
		  <div class="modal-dialog modal-sm">
			<div class="modal-content" style="background-color: #00cc99;">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><?php echo wordvar('login');?></h4>
			  </div>
				<form  name="frm" method="POST" action="" enctype="multipart/form-data">
				<div class="modal-body">
					
						<div class="input-group input-group-lg" style="padding:5px;">
							<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-user"></icon></span>
							<input type="text" name="txtUserName" class="form-control" placeholder="<?php echo wordvar('Username');?>...." required/>
						</div>
						<div class="input-group input-group-lg" style="padding:5px;">
							<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-key"></icon></span>
							<input type="password" name="txtPassword" class="form-control" placeholder="<?php echo wordvar('Password');?>...."  required/>
						</div>
						<div>
							<button type="submit" class="btn btn-lg btn-16" style="width:100%;"><?php echo wordvar('Login');?></button>
						</div>
				
			  </div>
			  <div class="modal-footer">
				
			  </div>
			  </form>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		<!--Modal Login Private-->
		<div class="modal fade hedden" id="myLogin_private">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><?php echo wordvar('login');?></h4>
			  </div>
				<form  name="frm" method="POST" action="" enctype="multipart/form-data">
				<div class="modal-body">
					
						<div class="input-group input-group-lg" style="padding:5px;">
							<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-user"></icon></span>
							<input type="text" name="txtUserName" class="form-control" placeholder="<?php echo wordvar('Username');?>...." required/>
						</div>
						<div class="input-group input-group-lg" style="padding:5px;">
							<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-key"></icon></span>
							<input type="password" name="txtPassword" class="form-control" placeholder="<?php echo wordvar('Password');?>...."  required/>
						</div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" onclick="history.back();" class="btn btn-default" data-dismiss="modal"><?php echo wordvar('Close');?></button>
				<button type="submit" class="btn btn-primary"><?php echo wordvar('Login');?></button>
			  </div>
			  </form>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		<!--modal  search-->
		<div class="modal fade" id="mySearch">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h2 class="modal-title" align="center" ><?php echo wordvar('search');?></h2>
			  </div>
			  
				<form  name="frm" method="POST" action="<?php echo $site_url;?>/search" enctype="multipart/form-data">
				<div class="modal-body">
						
						<div class="input-group input-group-lg" style="padding:5px;">
							<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-search"></icon></span>
							<input type="text" name="txtkeyword" class="form-control" placeholder="<?php echo wordvar('Search Keyword');?>...." required/>
						</div>
				
			  </div>
			  </form>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		<!--Register-->
		<div class="modal fade hedden" id="myRegister">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><?php echo wordvar('Register');?></h4>
			  </div>
				<form  name="frm" method="POST" action="" enctype="multipart/form-data">
				<div class="modal-body">
						
						<div class="input-group input-group-lg" style="padding:5px;">
							<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-user"></icon></span>
							<input type="text" name="txtUserName" class="form-control" placeholder="<?php echo wordvar('Username');?>...." required/>
						</div>
						<div class="input-group input-group-lg" style="padding:5px;">
							<span class="input-group-addon" id="sizing-addon1"><icon class="fa fa-key"></icon></span>
							<input type="password" name="txtPassword" class="form-control" placeholder="<?php echo wordvar('Password');?>...."  required/>
						</div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo wordvar('Close');?></button>
				<button type="submit" class="btn btn-primary"><?php echo wordvar('Register');?></button>
			  </div>
			  </form>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		