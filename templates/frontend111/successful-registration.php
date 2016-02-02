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
<script src="<?php echo $templateUrl;?>/js/resource.js"></script>
  	<div class="login-form">
  		
  		<div class="login-body">
		 		 
  			<form class="s-form">
					<div class="form-group">
						<label class="control-label">You have successfully created your account.<br><br>
						Please activate your account by clicking the activation link that we have sent to your email.
						</label>
					</div>
				</form>
  		</div>
  	</div>

<?php echo $footer_block; ?>