<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="<?php echo $templateUrl;?>/assets/ico/favicon.png" rel="shortcut icon">
    <title><?php echo $metaTitle;?></title>
    <meta name="description" content="<?php echo $page_description;?>" />
    <meta name="keyword" content="<?php echo $page_keyword;?>"/>
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo $templateUrl;?>/css/jquery.autocomplete.css" />                  
	<script src="<?php echo $templateUrl;?>/assets/js/jquery-1.11.0.min.js"></script>
	<script src="<?php echo $templateUrl;?>/assets/js/jquery-ui-1.10.4.js"></script>
    <link href="<?php echo $templateUrl;?>/assets/css/jquery-ui-1.10.4.css" rel="stylesheet">
    <link href="<?php echo $templateUrl;?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $frontendTemplateUrl;?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $frontendTemplateUrl;?>/css/responsive.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="<?php echo $templateUrl;?>/js/jquery.autocomplete.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $templateUrl;?>/js/datepicker/daterangepicker-bs3.css" />
	<script type="text/javascript" src="<?php echo $templateUrl;?>/js/datepicker/moment.js"></script>
	<script type="text/javascript" src="<?php echo $templateUrl;?>/js/datepicker/daterangepicker.js"></script>
   <link href="<?php echo $frontendTemplateUrl;?>/css/style_ex1.css" rel="stylesheet">


<!-- FN_REPLACE -->

    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:700,400,300">
    <link href='http://fonts.googleapis.com/css?family=Calligraffitti|The+Girl+Next+Door' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://radpioneers.wpengine.com/wp-content/uploads/2014/10/favicon-main.ico">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,900%7COpen+Sans:400,300,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>
	<script>
	 function saveStats(answer){
			var strURL="<?php echo $defaultURL;?>/savetodb.php?action=savetodb&svsl=a2c40d6526&answer="+answer+"&svsl=a2c40d6526&autoplay=true&ref=";
			
	   $.ajax({
            url: strURL,
			dataType: 'jsonp',
            context: document.body,
            success: function(responseText) {
			}
        });

	}</script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
      <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63274664-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="<?php echo $templateUrl;?>/js/resource.js"></script>
<script src="<?php echo $templateUrl;?>/js/resource-ext.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="bootstrap/js/html5shiv.js"></script>
  <script src="bootstrap/js/respond.min.js"></script>
<![endif]-->

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
</head>
<body class="<?php echo $template;?> login 	 <?php if($isProAccount==1){echo "proaccount";}?>" onLoad="saveStats('onload')">
<div class="topdiv" id="topdiv">
<div class="top_menu">
<a href="<?php echo $defaultURL;?>/" class="logo">Sprouting<span>Trade</span><?php //echo SITE_NAME;?></a>
<?php /*foreach($menu_top as $data){ <a href="/">Home</a>
       < <a href="<?php echo $defaultUrl."/".$data["page_slug"];?>/"><?php echo $data["page_title"];?></a>
}*/?>
  
	<?php
	
	if($_SESSION['account_type']==101){?>
	<?php if($_GET['showdonationbutton']!=1){?>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="nick@sproutingtrade.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="sproutingtrade.com">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="CAD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
	</form> <?php } ?>
	    <a class="top_links" href="/login/?logout=1">Logout</a>
		<a class="top_links " href="/my-account/">My Account</a>
		<!--<a class="top_links hidif" href="/my-growing-space/">My Growing Space</a>
		<a class="top_links hidif" href="/my-events-workshop/">My Events/Workshops</a>-->
		<a class="top_links" href="/my-listing/">My Produce</a>
		<a class="top_links" href="/dashboard/">Dashboard</a>
	<?php }else{?>
		<?php if($_GET['showdonationbutton']!=1){?> 		
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="nick@sproutingtrade.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="sproutingtrade.com">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="CAD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form><?php } ?>
		<a class="top_links hidif" href="/dashboard/">Login</a>&nbsp;&nbsp;
	    <a class="top_links" href="/register/">Register</a>
		<a class="top_links" href="/register/">List your Produce</a>&nbsp;&nbsp;
		<!--<a class="top_links"  href="<?php echo $defaultURL;?>/#roots">Our Roots</a>&nbsp;&nbsp;
		<a class="top_links"  href="<?php echo $defaultURL;?>/#the_vision">The Vision</a>&nbsp;&nbsp;-->
		<a class="top_links"  href="<?php echo $defaultURL;?>">Home</a>&nbsp;&nbsp;
	<?php }?>
		
   
<?php /*<a href="/">Home</a><a href="/">The Vision</a><a href="/">Our Roots</a><a href="/">Contact</a>*/?>
</div>

<div class="toggle_menu" style="display:none">
<a href="<?php echo $defaultURL;?>/" class="logo">Sprouting<span>Trade </span><?php //echo SITE_NAME;?></a>
<a href="#">[]</a>
</div>
	<a href="<?php echo $defaultURL;?>/" class="logo responsive">Sprouting<span>Trade</span><?php //echo SITE_NAME;?></a>
	<label for="show-menu" class="show-menu">  <span class="glyphicon glyphicon-th-list"></span></label>
	<input type="checkbox" id="show-menu" role="button">
		
	<?php
	
	if($_SESSION['account_type']==101){?>
    <ul id="menu" >
		<li><a  href="/my-listing/">My Produce</a></li>
		<li><a  href="/my-listing/">My Produce</a></li>
	    <li><a href="/my-events-workshop/">My Events/Workshops</a></li>
		<li><a  href="/my-growing-space/">My Growing Space</a></li>
		<li><a  href="/my-account/">My Account</a></li>
		<li><a  href="/login/?logout=1">Logout</a></li>
	</ul>
	<?php }else{?>
	 
	<ul id="menu" >
		<li><a   href="<?php echo $defaultURL;?>">Home</a></li>
		<li><a  href="/register/">List your Produce</a></li>
		<li><a  href="/register/">Register</a></li>
		<li><a   href="/dashboard/">Login</a></li>
	</ul>
	<?php }?>	
	
	




</div>
<?php 
if($template=="cms"){
	  
	  if(!empty($big_image_slide)){
       echo $big_image_slide;
       echo $search_box_wide;
	  }
	  
	  echo '<br clear="all">';
}
if($template=="profile-pro"){
	 if(!empty($big_image_slide)){
       echo $big_image_slide;
	 }
	 echo '<br clear="all">';
}
?> 
<div class="main_wrap">

<?php if($isProAccount==1 AND $template!="dashboard"){?>

<div class="proaccount_tab" style="display:none"> <!-- hide this for the mean time-->
 <a href="/profile/?u=<?php echo $username;?>">Profile</a>
 <a href="/my-listing/">Produce Listing</a>
 <a href="/my-growing-space/?u=<?php echo $username;?>">Growing Space Listing</a>
 <a style="display:none" href="/my-events-workshop/?u=<?php echo $username;?>">Events/workshop Listing</a>
 </div>
<?php } ?>
