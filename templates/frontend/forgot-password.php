<?php echo $header_block;?>


	
  	<div class="login-form">
  		<h1>Reset Password</h1>
  		<div class="login-body">
		
		 		   <span class="log_message" id="log_message"> <?php if($_GET['logout']==1){echo "You have successfully logged out.";}?></span>
				   <p id="success_p" style="display:none";></p>
  			<form class="s-form" id="reset_form">
					<div class="form-group">
						<label class="control-label" id="reset_password_label">Enter your username to reset password:</label>
						<div class="input-group">
	            <input type="text" class="form-control" name="username" id="username">
	            <span class="input-group-addon"><span class="fa fa-user"></span></span>
	          </div>
			  	</div>
			
				

					
					<div class="login-submit right-txt">
					   				
						<a class="forgot_password" href="/login/" >Return to Login page</a>&nbsp;
						<button  name="login" onClick="resetPasswordFormSubmit()" class="btn btn-primary" type="button">Reset Password</button>
						
					</div>
					<center>
					<span id="preloader" style="  visibility: hidden;">
					<img src="<?php echo TEMPLATE_URL;?>/images/preload.gif">
			     	</span> 
				</center>
				
			</form>
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
