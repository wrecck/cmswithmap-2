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
  		<div class="login-header">
  			<h3 class="center-txt"><?php echo $sitename;?> Login</h3>
  		</div>
  		<div class="login-body">
		 		   <span class="log_message" id="log_message"></span>
				   
  			<form class="s-form">
					<div class="form-group">
						<label class="control-label">Username:</label>
						<div class="input-group">
	            <input type="text" class="form-control" name="username" id="username">
	            <span class="input-group-addon"><span class="fa fa-user"></span></span>
	          </div>
					</div>
			<span id="username_error">Username must be provided</span>		
					<div class="form-group">
						<label class="control-label">Password:</label>
						<div class="input-group">
	            <input type="password" class="form-control" name="password" id="password">
	            <span class="input-group-addon"><span class="fa fa-lock"></span></span>
				
	          </div>
					</div>
					<span id="password_error">Password must be provided</span>
					
					<div class="login-submit right-txt">
					   				<span id="preloader" style="display: none; float: left; width: 82%; text-align: right;">
					<img src="<?php echo TEMPLATE_URL;?>/images/preload.gif">
				</span>
						<a href="/register/" >Register</a>&nbsp;<button  name="login" onClick="loginFormSubmit()" class="btn btn-primary" type="button">Login</button>
						
					</div>
				</form>
  		</div>
  	</div>

<?php echo $footer_block; ?>