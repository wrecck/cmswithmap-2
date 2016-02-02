<?php if(!empty($page_header_image)){?>
<div class="big_image_slide <?php echo str_replace(".jpg","",$page_header_image);?>" id="<?php echo $page_id;?>" style="background-size: 100% auto !important; background-position:center;width:100%; min-height:510px; background:url(<?php echo UPLOAD_URL;?>/slides/<?php echo $page_header_image;?>)  no-repeat <?php if($page_id=="home"){?> fixed 50% 0 / cover  rgba(0, 0, 0, 0);<?php } ?>">
<?php echo $page_quote;?><?php if($show_profile_photo==1){?><div class="main_wrap" style="max-width:90%; width:80%; background:none"><div  class="profile_photo">
<img alt="<?php echo $logoAlt;?>" title="<?php echo $logoAlt;?>" src="<?php echo UPLOAD_URL."/avatar/".$profile_photo;?>"></div></div><?php } ?>
</div>
<?php }?>