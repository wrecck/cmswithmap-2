<?php echo $header_block;?>
<style>
/*
Responsive Layout
*********************
*/
@media (max-width: 767px){}
@media (min-width: 768px) and (max-width: 991px){}
@media (max-width: 991px){
	/*Reusables*/
	/*margins*/
    .mb-10, .mb-20, .mb-30, .mb-40, .mb-50, .mb-60, .mb-70, .mb-80, .mb-90, .mb-100{margin-bottom: 15px;} 
    /*grids and containers*/

    /*
	Right Main
	*********************
	*/
	/*article*/
	.article-label{text-align: left;}
}
@media (min-width: 992px){}
--&gt;/* ]]&gt; */
</style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
      <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->

</head>
<body class="login">
<div class="topdiv" id="topdiv">
<div class="top_menu"><a href="/">Home</a>
<?php foreach($menu_top as $data){?>
<a href="<?php echo $defaultUrl."/".$data["page_slug"];?>/"><?php echo $data["page_title"];?></a>
<?php }?>
<?php /*<a href="/">Home</a><a href="/">The Vision</a><a href="/">Our Roots</a><a href="/">Contact</a>*/?>
</div>
</div>
<script src="<?php echo $templateUrl;?>/js/resource.js"></script>
<div class="login-form" style="max-width:90%; width:80%;margin-top:20px;">
  		
  		<div class="login-body">
		 		 
  			<form class="s-form">
					<div class="form-group">
						<label class="control-label">
						<h1><?php echo $page_title;?></h1>
						<p><?php echo $page_content;?></p>
						</label>
					</div>
				</form>
  		</div>
  	</div>

<?php echo $footer_block; ?>