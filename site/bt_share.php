<style type="text/css">
	ul.share-buttons{
	  list-style: none;
	  padding: 0;
	}

	ul.share-buttons li{
	  display: inline;
	}

	ul.share-buttons img{
	  width: 32px;
	}
</style>

<ul class="share-buttons">
  <li><a href="http://line.me/R/msg/text/?<?=$title;?>%0D%0A<?=$urlweb;?>" title="Share on line Social" target="_blank"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/line.png"></a></li>
  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=$urlweb;?>" title="Share on Facebook" target="_blank"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Facebook.svg"></a></li>
  <li><a href="https://twitter.com/intent/tweet?source=<?=$urlweb;?>&text=<?=$title;?>:%20<?=truncateStr($description,80);?> เพิ่มเติม : <?=$urlweb;?>" target="_blank" title="Tweet"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Twitter.svg"></a></li>
  <li><a href="https://plus.google.com/share?url=<?=$urlweb;?>" target="_blank" title="Share on Google+"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Google+.svg"></a></li>
  <li><a href="http://www.tumblr.com/share?v=3&u=<?=$urlweb;?>&t=<?=$title;?>&s=<?=$description;?>" target="_blank" title="Post to Tumblr"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Tumblr.svg"></a></li>
  <li><a href="http://pinterest.com/pin/create/button/?url=<?=$urlweb;?>&description=<?=$description;?>" target="_blank" title="Pin it"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Pinterest.svg"></a></li>
  <li><a href="https://getpocket.com/save?url=<?=$urlweb;?>&title=<?=$title;?>" target="_blank" title="Add to Pocket"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Pocket.svg"></a></li>
  <li><a href="http://www.reddit.com/submit?url=<?=$urlweb;?>&title=<?=$title;?>" target="_blank" title="Submit to Reddit"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Reddit.svg"></a></li>
  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$urlweb;?>&title=<?=$title;?>&summary=<?=$description;?>&source=<?=$description;?>" target="_blank" title="Share on LinkedIn"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/LinkedIn.svg"></a></li>
  <li><a href="https://pinboard.in/popup_login/?url=<?=$urlweb;?>&title=<?=$title;?>&description=<?=$description;?>" target="_blank" title="Save to Pinboard"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Pinboard.svg"></a></li>
  <li><a href="mailto:?subject=<?=$title;?>&body=<?=$urlweb;?>:%20<?=$description;?>" target="_blank" title="Email"><img src="<?php echo $site_dir;?>/images/social_flat_rounded_rects_svg/Email.svg"></a></li>
</ul>

<!--
<script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
<script type="text/javascript">
new media_line_me.LineButton({"pc":true,"lang":"en","type":"d","text":"","withUrl":true});
</script>
-->