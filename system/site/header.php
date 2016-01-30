<?php
$transactions_query=mysqli_query($connect,"SELECT * FROM transactions WHERE member_id=$me_login ORDER BY transaction_date DESC LIMIT 10");
$number_unread=mysqli_num_rows(mysqli_query($connect,"SELECT transaction_id FROM transactions WHERE member_id=$me_login AND notification_status='unread'"));
?>
	  <!-- Navigation -->
      <div class="navbar navbar-fixed-top scroll-hide"> 
        <div class="container-fluid top-bar">
          <div class="pull-right">
            <ul class="nav navbar-nav pull-right">
              <li class="dropdown notifications hidden-xs">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span aria-hidden="true" class="hightop-flag"></span>
                  <div class="sr-only">
                    <?php echo wordvar('Notifications');?>
                  </div>
				  <?php
				  if($number_unread>=1){
				  ?>
					<p class="counter">
						<?php echo $number_unread;?>
					</p>
				  <?php
				  }
				  ?>
                </a>
                <ul class="dropdown-menu">
				<?php
				while($transactions=mysqli_fetch_array($transactions_query)){
				?>
                  <li>
					<a href="<?php echo $site_url;?>/wallet/transactions">
						
					<?php
					if($transactions['income']!=""){
						echo "<div class='notifications label  label-primary label-success'>".currency($transactions['income'])."</div>";
					}elseif($transactions['expend']!=""){
						echo "<div class='notifications label  label-primary label-danger'>".currency($transactions['expend'])."</div>";
					 }
					 ?>
						<p>
						<?php
						  if($transactions['transaction']=="receive"){
							echo wordvar($transactions['transaction_description'])." <u>$".number_format($transactions['income']*1)."</u>";
							$amount_status="success";
						  }elseif($transactions['transaction']=="pay"){
							echo wordvar($transactions['transaction_description'])." <u>$".number_format($transactions['expend']*1)."</u>";
							$amount_status="danger";
						  }elseif($transactions['transaction']=="transfer"){
							echo wordvar($transactions['transaction_description'])." <u>$".number_format($transactions['expend']*1)."</u>";
							$amount_status="danger";
						  }elseif($transactions['transaction']=="withdraw"){
						  
						  }elseif($transactions['transaction']=="upgrade"){
							echo wordvar($transactions['transaction_description']);
							$amount_status="success";
						  }
						?>
						</p>
					</a>
                  </li>
				<?php
				}
				?>
                </ul>
              </li>
              <!--li class="dropdown messages hidden-xs">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span aria-hidden="true" class="hightop-envelope"></span>
                  <div class="sr-only">
                    Messages
                  </div>
                  <p class="counter">
                    3
                  </p>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">
                    <img width="34" height="34" src="<?php echo $site_dir;?>/images/avatar-male2.png" />Could we meet today? I wanted...</a>
                  </li>
                  <li><a href="#">
                    <img width="34" height="34" src="<?php echo $site_dir;?>/images/avatar-female.png" />Important data needs your analysis...</a>
                  </li>
                  <li><a href="#">
                    <img width="34" height="34" src="<?php echo $site_dir;?>/images/avatar-male2.png" />Buy Se7en today, it's a great theme...</a>
                  </li>
                </ul>
              </li-->
              <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img width="34" height="34" src="<?php echo $site_main;?>/gallery/avatar/<?php echo $me['member_avatar'];?>" />
				<?php echo $me['member_name']."  ".$me['member_surname'];?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <!--li><a href="#">
                    <i class="fa fa-user"></i>My Account</a>
                  </li-->
                  <li><a href="<?php echo $site_url;?>/settings">
                    <i class="fa fa-gear"></i><?php echo wordvar('Account_settings');?></a>
                  </li>
                  <li>
					<a href="<?php echo $site_url;?>/login">
						<i class="fa fa-sign-out"></i><?php echo wordvar('Logout');?>
					</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <button class="navbar-toggle">
				<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
		  </button>
		  <a class="logo" href="<?php echo $site_main."/".$me['member_username'];?>"><h3>JINUEMALL.COM/<?php echo $me['member_username'];?></h3></a>
		  <!--a class="logo" href="<?php echo $site_url;?>"><img src="<?php echo $site_dir;?>/images/jsystem-light.png" style="height:28px;"></a-->
		  <!--form class="navbar-form form-inline col-lg-2 hidden-xs">
            <input class="form-control " placeholder="Search" type="text">
          </form-->
        </div>
        <div class="container-fluid main-nav clearfix">
          <div class="nav-collapse">
            <ul class="nav">
              <li>
                <a class="<?php if($uri[0]=="index") echo "current";?>" href="<?php echo $site_url;?>/">
					<span aria-hidden="true" class="fa fa-globe"></span><?php echo wordvar('Social');?>
				</a>
              </li>
              <li>
                <a class="<?php if($uri[0]=="profile") echo "current";?>" href="<?php echo $site_url;?>/profile">
					<span aria-hidden="true" class="fa fa-user"></span>
					<div class="hidden-xs"><?php echo $me['member_username'];?></div>
					<div class="visible-xs"><?php echo $me['member_username'];?></div>
				</a>
              </li>
			  <li class="dropdown" style="display:none;">
				<a data-toggle="dropdown" class="<?php if($uri[0]=="organize"){ echo "current"; }?>" href="#">
					<span aria-hidden="true" class="fa fa-sitemap"></span><?php echo wordvar('Organize');?>
					<b class="caret"></b>
					<p class="counter">2</p>1
				</a>
				
				<ul class="dropdown-menu">
                  <li>
                    <a class="<?php if($uri[0]=="sponsor"){ echo "current"; }?>" href="<?php echo $site_url;?>/sponsor"><?php echo wordvar('Sponsor');?></a>
                  </li>
                  <li>
                    <a class="<?php if($uri[0]=="placement"){ echo "current"; }?>" href="<?php echo $site_url;?>/placement"><?php echo wordvar('Placement');?></a>
                  </li>
				</ul>
              </li>
              <li>
				<a class="<?php if($uri[0]=="friends"){ echo "current"; }?>" href="<?php echo $site_url;?>/friends">
					<span aria-hidden="true" class="fa fa-users"></span><?php echo wordvar('Friends');?>
				</a>
              </li>
              <li>
				<a class="<?php if($uri[0]=="placement"){ echo "current"; }?>" href="<?php echo $site_url;?>/placement">
					<span aria-hidden="true" class="fa fa-sitemap"></span><?php echo wordvar('Placement');?>
				</a>
              </li>
              <li>
				<a class="<?php if($uri[0]=="wallet"){ echo "current"; }?>" href="<?php echo $site_url;?>/wallet">
					<span aria-hidden="true" class="fa fa-money"></span><?php echo wordvar('Wallet');?>
				</a>
              </li>
              <!--li>
				<a class="<?php if($uri[0]=="package" OR $uri[0]=="signup"){ echo "current"; }?>" href="/category/package">
					<span aria-hidden="true" class="fa fa-tags"></span><?php echo wordvar('Package');?>
				</a>
              </li--> 
              <li>
				<a class="<?php if($uri[0]=="upgrade"){ echo "current"; }?>" href="<?php echo $site_url;?>/upgrade">
					<span aria-hidden="true" class="fa fa-arrow-circle-up"></span><?php echo wordvar('upgrade');?>
				</a>
              </li>  
			<li>
				<a class="<?php if($uri[0]=="shopping"){ echo "current"; }?>" href="<?php echo $site_url;?>/shopping">
					<span aria-hidden="true" class="fa fa-shopping-cart"></span> <?php echo wordvar('Shopping');?>
				</a>
			</li>
			<li class="dropdown">
				<a data-toggle="dropdown" href="#">
					<span aria-hidden="true" class="fa fa-file-text"></span><?php echo wordvar('Report');?><b class="caret"></b>
				</a>
                <ul class="dropdown-menu">
					<li>
						<a class="<?php if($uri[0]=="invoices"){ echo "current"; }?>" href="<?php echo $site_url;?>/invoices">
							<span aria-hidden="true" class="fa fa-file-text"></span> <?php echo wordvar('invoices');?>
						</a>
					</li>
				</ul>
			</li>
			  <li class="dropdown">
				<a data-toggle="dropdown" href="#">
					<span aria-hidden="true" class="fa fa-coffee"></span><?php echo wordvar('Support');?><b class="caret"></b>
				</a>
                <ul class="dropdown-menu">
					<li>
						<a class="<?php if($uri[0]=="faq"){ echo "current"; }?>" href="<?php echo $site_url;?>/faq">
							<span aria-hidden="true" class="fa fa-question"></span> <?php echo wordvar('FAQ');?> 
						</a>
					</li>
					<li>
						<a class="<?php if($uri[0]=="calendar"){ echo "current"; }?>" href="<?php echo $site_url;?>/calendar">
							<span aria-hidden="true" class="fa fa-calendar"></span> <?php echo wordvar('Events');?> 
						</a>
					</li>
                </ul>
              </li>
              <li class="visible-xs">
				<a class="<?php if($uri[0]=="settings"){ echo "current"; }?>" href="<?php echo $site_url;?>/settings">
					<span aria-hidden="true" class="fa fa-gear"></span><?php echo wordvar('Settings');?>
				</a>
              </li>
			  
              <li class="visible-xs">
				<a class="" href="<?php echo $site_url;?>/login">
					<span aria-hidden="true" class="fa fa-sign-out"></span><?php echo wordvar('Logout');?>
				</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Navigation -->