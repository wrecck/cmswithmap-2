<?php echo $header_block;?>
	
  	<div class="login-form">
  		<h1><?php echo $sitename;?> Login</h1>
  		<div class="login-body">
		 		   <span class="log_message" id="log_message"> <?php if($_GET['logout']==1){echo "You have successfully logged out.";}?></span>
		
       <?php if($hideLoginForm!=1){?>		
  			<form class="s-form" id="s-form" >
			 <input type="hidden" value="<?php $durl = str_replace("[shrp]","#",$_GET['du']);  $durl = str_replace("[amp]","&",$durl); 
			 if(!empty($durl)){echo $durl;}else{echo "none";}?>" id="durl">
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
	                    <span class="input-group-addon">
						  <span class="fa fa-lock"></span>
				        </span>
			</div>
					</div>
					<span id="password_error">Password must be provided</span>
					
					<div class="login-submit right-txt">
					   				<span id="preloader" style="display: none; float: left; width: 82%; text-align: right;">
					<img src="<?php echo TEMPLATE_URL;?>/images/preload.gif">
				</span> 
						<a class="forgot_password" href="/forgot-password/" >Forgot password</a>&nbsp;
						<a href="/register/" >Register</a>&nbsp;<button  name="login" onClick="loginFormSubmit()" class="btn btn-primary" type="button">Login</button>
						
					</div>
				</form>
	   <?php }else{ ?>
	   <span class="log_message" id="log_message">You have reached the login limit attempt. <br>Please try again after an hour.</span>
	   <?php } ?>
  		</div>
  	</div>
<br clear="all"><br>
<script>
jQuery(document).keypress(function(e) { //execute login if enter key is press
    if(e.which == 13) {
       loginFormSubmit();
    }
});
</script>


<?php echo $footer_block; ?>
