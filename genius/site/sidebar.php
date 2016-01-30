<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
				<?php
				if(in_array("dashboard",$page_allow)){
				?>
                <li>
                    <a  class="<?php if($page=="dashboard"){ echo "active"; }?>" href="<?=$site_url;?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
				<?php
				}
				if(in_array("pos",$page_allow)){
				?>
				<li>
                    <a class="<?php if($page=="pos"){ echo "active"; }?>" href="<?php echo $site_url;?>/pos">
                        <i class="fa fa-shopping-cart"></i>
                        <span>POS</span>
                    </a>
                </li>
				<?php
				}
				if(in_array("products",$page_allow)){
				?>
				<li class="sub-menu">
                    <a href="javascript:;" class="<?php if($page=="products" || $page=="product" || $page=="product-categories"){ echo "active"; }?>" >
                        <i class="fa fa-barcode"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($page=="products"){ echo "active"; }?>"><a href="<?php echo $site_url;?>/products">All Products</a></li>
                        <li class="<?php if($page=="product" AND $action=="new"){ echo "active"; }?>"><a href="<?php echo $site_url;?>/product?action=new">Add new</a></li>
                        <li class="<?php if($page=="product-categories"){ echo "active"; }?>"><a href="<?php echo $site_url;?>/product-categories">Categories</a></li>
                    </ul>
                </li>
				<?php
				}
				if(in_array("products",$page_allow)){
				?>
				<!--li>
                    <a class="<?php if($page=="products"){ echo "active"; }?>" href="<?php echo $site_url;?>/products">
                        <i class="fa fa-barcode"></i>
                        <span>Products</span>
                    </a>
                </li-->
				<?php
				}
				if(in_array("members",$page_allow)){
				?>
				<li>
                    <a class="<?php if($page=="members" OR $page=="profile"){ echo "active"; }?>" href="<?php echo $site_url;?>/members">
                        <i class="fa fa-users"></i>
                        <span>Members</span>
                    </a>
                </li>
				<?php
				}
				if(in_array("withdraw",$page_allow)){
				?>
				<li>
                    <a class="<?php if($page=="withdraw"){ echo "active"; }?>" href="<?php echo $site_url;?>/withdraw">
                        <i class="fa fa-money"></i>
                        <span>Withdraw</span>
                    </a>
                </li>
				<?php
				}
				if(in_array("orders",$page_allow)){
				?>
				<li>
                    <a class="<?php if($page=="orders"){ echo "active"; }?>" href="<?php echo $site_url;?>/orders">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
				<?php
				}
				if(in_array("report",$page_allow)){
				?>
				<li>
                    <a class="<?php if($page=="report"){ echo "active"; }?>" href="<?php echo $site_url;?>/report">
                        <i class="fa fa-book"></i>
                        <span>Report</span>
                    </a>
                </li>
				<?php
				}
				if(in_array("memberonline",$page_allow)){
				?>
				<li>
                    <a class="<?php if($page=="memberonline"){ echo "active"; }?>" href="<?php echo $site_url;?>/memberonline">
                        <i class="fa fa-user"></i>
                        <span>Members Online</span>
                    </a>
                </li>
				<?php
				}
				?>
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>