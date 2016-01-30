	<footer class="dark">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-3">
						<h2 class="title-f"></h2>
						<div align="center">
							<?php
							if($me_login==null){
							?>
							<a href="" data-toggle='modal' data-target='#myLogin' class="btn btn-lg btn-9" style="margin-bottom:15px;
    color: #FFF;border-radius: 4px; width:95%;"><?php echo wordvar('Login');?></a>
							<?php
							}else{
							?>
							<a href="//system.jinuemall.com" class="btn btn-lg btn-9" style="margin-bottom:15px;
    color: #FFF;border-radius: 4px; width:95%;"><?php echo wordvar('Jsystem');?></a>
							<?php
							}
							?>
							
						</div>
						<div align="center">
							<a href="//system.jinuemall.com" class="btn btn-9" style="font-size:15px; border-radius: 4px;"><?php echo wordvar('ร่วมงานกับเรา');?></a>
							<a href="//system.jinuemall.com" class="btn btn-9" style="font-size:15px; border-radius: 4px;"><?php echo wordvar('ติดต่อโฆษณา');?></a>
							
							
						</div>
					
					</div>
					<div class="col-xs-6 col-md-3">
						<h2 class="title-f"></h2>
						<div align="center">
							<img src="<?php echo $site_dir;?>/images/sn-appstore.png" style="margin-bottom:10px; width:180px;">
							<img src="<?php echo $site_dir;?>/images/sn-playstore.png" style="margin-bottom:10px; width:180px;">
						</div>
					</div>
					<div class="col-xs-6 col-md-3" align="center">
						<h2 class="title-f"><?php echo wordvar('ติดตามข่าวสาร Jinuemall.com ได้ที่');?></h2>
						<div style="display:inline-block; margin-top:12px;">
							<a href="https://facebook.com/jinuemall"><div style="float:left; margin:0px 7px 10px 0px"><img src="<?php echo $site_dir;?>/images/social/facebook.png" style="max-width:29px;"></div></a>
							<a href="https://www.youtube.com/channel/UCJzjfksureg6zBJLdeNqROQ"><div style="float:left; margin:0px 7px 10px 0px"><img src="<?php echo $site_dir;?>/images/social/youtube.png" style="max-width:29px;"></div></a>
							<a href="http://instagram.com/jinuemall"><div style="float:left; margin:0px 7px 10px 0px"><img src="<?php echo $site_dir;?>/images/social/instagram.png" style="max-width:29px;"></div></a>
							<a href="https://plus.google.com/110960154543749240662/posts"><div style="float:left; margin:0px 7px 10px 0px"><img src="<?php echo $site_dir;?>/images/social/google.png" style="max-width:29px;"></div></a>
						</div>
						<a href="#" class="suggest-box"> แนะนำ-ติชม และแจ้งปัญหาการใช้งาน</a>
						
						<div style="padding-top:15px;">
						<!-- Histats.com  START  (standard)-->
							<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
							<a href="http://www.histats.com" target="_blank" title="html hit counter" ><script  type="text/javascript" >
							try {Histats.start(1,3312532,4,2049,280,25,"00011111");
							Histats.track_hits();} catch(err){};
							</script></a>
							<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3312532&101" alt="html hit counter" border="0"></a></noscript>
							<!-- Histats.com  END  -->
						</div>
						
					</div>
					<div class="col-xs-6 col-md-3" align="center">
						<h2 class="title-f">Jinue Official Line</h2>
						<div class="flickr clearfix">
									<img src="<?php echo $site_dir;?>/images/social/qr_code.jpg" style="max-width:95px;">
						</div>
					</div>
				</div>
			</div>
			<div class="footer-b">
				<div class="container">
					<div class="row">
						
						<div class="col-md-6 col-md-push-6 payment-icon">
							<a href="#"><img src="<?php echo $site_dir;?>/images/payment/kbank1.png" style="width:80px;"></a>
							<a href="#"><img src="<?php echo $site_dir;?>/images/payment/icon-5.png" class="black-white"></a>
							<a href="#"><img src="<?php echo $site_dir;?>/images/payment/icon-4.png" class="black-white"></a>
							<a href="#"><img src="<?php echo $site_dir;?>/images/payment/icon-3.png" class="black-white"></a>
							<!--<a href="#"><img src="<?php echo $site_dir;?>/images/payment/icon-2.png" class="black-white"></a>
							<a href="#"><img src="<?php echo $site_dir;?>/images/payment/icon-1.png" class="black-white"></a>-->
						</div>

						<div class="col-md-6 col-md-pull-6 copyright">
							<p>
							<?php
							if(isset($me_country)){
								$country= $me_country;
							}else{
								$country = $getdetails->country;
							}
							?>
								&copy; <?php date('Y');?> JinueMall by <a href="http://www.inspires-studio.com/" title="INSPIRES STUDIO">INSPIRES STUDIO</a> - All Rights Reserved.    GET Country : <?php echo selectname('country','country','country_code',$country);?>
							<script type="text/javascript" language="javascript1.1" src="http://tracker.stats.in.th/tracker.php?sid=66958"></script><noscript><a target="_blank" href="http://www.stats.in.th/">www.Stats.in.th</a></noscript>
							
							
							
							</p>
						</div>

					</div>
				</div>
			</div>
		</footer>