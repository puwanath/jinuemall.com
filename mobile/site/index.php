<?php
include("../system/databases.php");
include("../system/function.php");
include("../system/setting.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>My App</title>
    <!-- Path to Framework7 Library CSS-->
    <link rel="stylesheet" href="../build/css/framework7.ios.min.css">
    <!-- Path to your custom app styles-->
    <link rel="stylesheet" href="css/my-app.css">
	<link rel="stylesheet" href="fontello/css/fontello.css">
	<link rel="stylesheet" href="fontello/css/animation.css"><!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->
  </head>
  <body>
    <!-- Status bar overlay for fullscreen mode-->
    <div class="statusbar-overlay"></div>
    <!-- Panels overlay-->
    <div class="panel-overlay"></div>
    <!-- Left panel with reveal effect-->
    <div class="panel panel-left panel-reveal layout-dark">
      <div class="content-block-title">Framework7 Kitchen Sink</div>
      <div class="list-block">
        <ul>
          <li><a href="about.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Forms</div>
                </div>
              </div></a></li>
          <li><a href="list-view.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">List View</div>
                </div>
              </div></a></li>
          <li><a href="media-lists.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Media Lists</div>
                </div>
              </div></a></li>
          <li><a href="modals.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Modals</div>
                </div>
              </div></a></li>
          <li><a href="bars.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Navbars And Toolbars</div>
                </div>
              </div></a></li>
          <li><a href="popover.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Popover</div>
                </div>
              </div></a></li>
          <li><a href="panels.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Side Panels</div>
                </div>
              </div></a></li>
          <li><a href="swipe-delete.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Swipe To Delete</div>
                </div>
              </div></a></li>
          <li><a href="swiper.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Swiper Slider</div>
                </div>
              </div></a></li>
          <li><a href="tabs.html" class="item-link close-panel"> 
              <div class="item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner"> 
                  <div class="item-title">Tabs</div>
                </div>
              </div></a></li>
        </ul>
      </div>
    </div>
    <!-- Right panel with cover effect-->
    <div class="panel panel-right panel-cover">
      <div class="content-block">
        <p>Right panel content goes here</p>
      </div>
    </div>
    <!-- Views, and they are tabs-->
    <!-- We need to set "toolbar-through" class on it to keep space for our tab bar-->
    <div class="views tabs toolbar-through">
      <!-- Your first view, it is also a .tab and should have "active" class to make it visible by default-->
      <div id="view-1" class="view view-main tab active">
			<div class="navbar">
				<div class="navbar-inner">
					<div class="left"><a href="#" class="open-panel link icon-only"><i class="icon icon-bars"></i></a></div>
					<div class="center sliding">Jinuemall</div>
					<div class="right"><a href="#" data-panel="right" class="open-panel link icon-only"><i class="icon icon-cart"></i></a></div>
				</div>
			</div>
			<div class="pages navbar-through">
			  <div data-page="index-2" class="page">
				<form data-search-list=".virtual-list" class="searchbar searchbar-init">
				  <div class="searchbar-input">
					<input type="search" placeholder="Search"/><a href="#" class="searchbar-clear"></a>
				  </div><a href="#" class="searchbar-cancel">Cancel</a>
				</form>
				<div class="searchbar-overlay"></div>
				<div class="page-content">
				   <div class="content-block-title">All Products</div>
					<div class="list-block media-list">
						<ul>
						<?php
						$product_query=mysqli_query($connect,"SELECT * FROM products ORDER BY product_name ASC");
						while($product=mysqli_fetch_array($product_query)){
						$picture=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM product_pictures WHERE picture_index='#' AND product_id=".$product['product_id']));
						?>
							<li>
								<a href="#" class="item-link item-content">
									<div class="item-media"><img src="<?php echo $site_main."/gallery/products/".$picture['picture_id'].".".$picture['picture_type'];?>" width="80"/></div>
									<div class="item-inner">
										<div class="item-title-row">
										  <div class="item-title"><?php echo $product['product_name'];?></div>
										  <div class="item-after">$<?php echo number_format($product['product_price'],2);?></div>
										</div>
										<div class="item-subtitle">
										<?php
										if($product['product_category_id']!=""){
											$product_category=$product['product_category_id'];
											$product_category=str_replace("[","",$product_category);
											$product_category=str_replace("]","",$product_category);
											$product_category=explode(',',$product_category);
											
											foreach ($product_category as $category_id) {
												$category_name=mysqli_fetch_assoc(mysqli_query($connect,"SELECT product_category_name FROM product_category WHERE product_category_id LIKE '%".$category_id."%' "));
												echo $category_name['product_category_name'].",";
											}
										}
										?>
										</div>
										<div class="item-text"><?php echo $product['product_description'];?></div>
									</div>
								</a>
							</li>
						<?php
						}
						?>
						</ul>
					</div>
				</div>
			  </div>
			</div>
      </div>
      <!-- Second view (for second wrap)-->
      <div id="view-2" class="view tab">
        <!-- We can make with view with navigation, let's add Top Navbar-->
        <div class="navbar">
          <div class="navbar-inner">
            <div class="center sliding">Second View</div>
          </div>
        </div>
        <div class="pages navbar-through">
          <div data-page="index-2" class="page">
            <div class="page-content">
              <div class="content-block">
                <p>This is a second view. Lets, for example, have here some internal pages with navbar navigation</p>
              </div>
              <div class="list-block">
                <ul>
                  <li><a href="about.html" class="item-link">
                      <div class="item-content">
                        <div class="item-inner"> 
                          <div class="item-title">About Us</div>
                        </div>
                      </div></a></li>
                  <li><a href="services.html" class="item-link">
                      <div class="item-content"> 
                        <div class="item-inner">
                          <div class="item-title">Services</div>
                        </div>
                      </div></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="view-3" class="view tab">
        <div class="pages">
          <div data-page="index-3" class="page">
            <div class="page-content">
              <div class="content-block-title">Another plain static view</div>
              <div class="content-block">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel commodo massa, eu adipiscing mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus ultricies dictum neque, non varius tortor fermentum at. Curabitur auctor cursus imperdiet. Nam molestie nisi nec est lacinia volutpat in a purus. Maecenas consectetur condimentum viverra. Donec ultricies nec sem vel condimentum. Phasellus eu tincidunt enim, sit amet convallis orci. Vestibulum quis fringilla dolor.    </p>
                <p>Mauris commodo lacus at nisl lacinia, nec facilisis erat rhoncus. Sed eget pharetra nunc. Aenean vitae vehicula massa, sed sagittis ante. Quisque luctus nec velit dictum convallis. Nulla facilisi. Ut sed erat nisi. Donec non dolor massa. Mauris malesuada dolor velit, in suscipit leo consectetur vitae. Duis tempus ligula non eros pretium condimentum. Cras sed dolor odio.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel commodo massa, eu adipiscing mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus ultricies dictum neque, non varius tortor fermentum at. Curabitur auctor cursus imperdiet. Nam molestie nisi nec est lacinia volutpat in a purus. Maecenas consectetur condimentum viverra. Donec ultricies nec sem vel condimentum. Phasellus eu tincidunt enim, sit amet convallis orci. Vestibulum quis fringilla dolor.    </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="view-4" class="view tab">
        <div class="pages navbar-fixed">
          <div data-page="index-4" class="page">
            <div class="navbar">
              <div class="navbar-inner">
                <div class="center">Settings</div>
              </div>
            </div>
            <div class="page-content">
              <div class="list-block">
                <ul>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-name"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">Name</div>
                        <div class="item-input">
                          <input type="text" placeholder="Your name">
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-email"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">E-mail</div>
                        <div class="item-input">
                          <input type="email" placeholder="E-mail">
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-url"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">URL</div>
                        <div class="item-input">
                          <input type="url" placeholder="URL">
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-password"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">Password</div>
                        <div class="item-input">
                          <input type="password" placeholder="Password">
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-tel"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">Phone</div>
                        <div class="item-input">
                          <input type="tel" placeholder="Phone">
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-gender"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">Gender</div>
                        <div class="item-input">
                          <select>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">Birth date</div>
                        <div class="item-input">
                          <input type="date" placeholder="Birth day" value="2014-04-30">
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-toggle"></i></div>
                      <div class="item-inner"> 
                        <div class="item-title label">Switch</div>
                        <div class="item-input">
                          <label class="label-switch">
                            <input type="checkbox">
                            <div class="checkbox"></div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-settings"></i></div>
                      <div class="item-inner">
                        <div class="item-title label">Slider</div>
                        <div class="item-input">
                          <div class="range-slider">
                            <input type="range" min="0" max="100" value="50" step="0.1">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="content-block">
                <p>Mauris commodo lacus at nisl lacinia, nec facilisis erat rhoncus. Sed eget pharetra nunc. Aenean vitae vehicula massa, sed sagittis ante. Quisque luctus nec velit dictum convallis. Nulla facilisi. Ut sed erat nisi. Donec non dolor massa. Mauris malesuada dolor velit, in suscipit leo consectetur vitae. Duis tempus ligula non eros pretium condimentum. Cras sed dolor odio.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Bottom Tabbar-->
      <div class="toolbar tabbar tabbar-labels">
        <div class="toolbar-inner">
			<a href="#view-1" class="tab-link active"> <i class="icon icon-shop-1"></i><span class="tabbar-label">Shopping</span></a>
			<a href="#view-2" class="tab-link"><i class="icon icon-inbox-4"><span class="badge bg-red">4</span></i><span class="tabbar-label">Transactions</span></a>
			<a href="#view-3" class="tab-link"> <i class="icon icon-wallet"></i><span class="tabbar-label">Wallet</span></a>
			<a href="#view-4" class="tab-link"> <i class="icon icon-user-7"></i><span class="tabbar-label">Me</span></a></div>
      </div>
    </div>
    <!-- Path to Framework7 Library JS-->
    <script type="text/javascript" src="../build/js/framework7.min.js"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="js/my-app.js"></script>
  </body>
</html>