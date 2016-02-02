
<br clear="all">
<div class="footer">

<div class="social_icons_links">
  <a target="_blank" href="https://plus.google.com/103564958773621317754"
rel="publisher"><img alt="Sprouting Trade Google" src="/templates/default/images/social_google.png"></a>
  <a target="_blank" href="https://www.facebook.com/sproutingtrade"><img alt="Sprouting Trade Facebook" src="/templates/default/images/social_facebook.png"></a>
  <a target="_blank" href="https://twitter.com/SproutingTrade"><img  alt="Sprouting Trade twitter" src="/templates/default/images/social_twitter.png"></a>
  <a target="_blank" href="https://www.pinterest.com/sproutingtrade/"><img  alt="Sprouting Trade pinterest" src="/templates/default/images/social_pinterst.png"></a>
  <a target="_blank" href="http://www.houzz.com/user/sproutingtrade"><img  alt="Sprouting Trade houzz" src="/templates/default/images/social_houzz.png"></a>
</div>
<br clear="all">

<div class="footer_left">
        <a href="/">Home</a>
		<?php foreach($menu_bottom as $data){?>
		<a href="<?php echo $defaultUrl."/".$data["page_slug"];?>/"><?php echo $data["page_title"];?></a>
		<?php }?>
</div>


<div class="footer_span">
<a href="/terms/" class="terms_policies">Terms of use</a>&nbsp;<a href="/privacy-policies/" class="terms_policies">Privacy Policy</a>
<br>
<span class="copyright">&copy; 2015 <?php echo $sitename;?></span>
</div>

<div class="footer_right">
<a href="/add-new-listing/">List your Produce</a>
<a href=" <?php if($_SESSION['account_type']==101){echo '/edit-profile/';}else{echo '/register/';}?>">Register your Farm/Organization</a>
</div>




</div>


</body>
</html>