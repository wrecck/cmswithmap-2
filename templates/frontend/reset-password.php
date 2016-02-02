<?php echo $header_block;?>


	
  	<div class="login-form">
  		<h1>Reset Password</h1>
  		<div class="login-body">
		 		   <span class="success_reset" id="success_reset" style="display:none;">Your password has been successfully reset, you may now <a href="/login/">Login</a></span>
				   
  			<form class="s-form" id="reset_password_form">
			
		<div class="form-group">
		<label class="control-label">New password:</label>
		<div class="input-group">
		<input type="password" class="form-control" name="password" id="password">
		<span class="input-group-addon"><span class="fa fa-lock"></span></span>
		</div>
		</div>
			<span id="password_error">New password must be provided</span>		
			
			
			<div class="form-group">
			<label class="control-label">Re enter password:</label>
			<div class="input-group">
			<input type="password" class="form-control" name="password2" id="password2">
			<span class="input-group-addon"><span class="fa fa-lock"></span></span>

			</div>
			</div>
			
			
			
					<span id="password_error2">Re enter password</span>
					
					<div class="login-submit right-txt">
					<button  name="login" onClick="resetPasswordSubmit('<?php echo $_GET['act'];?>')" class="btn btn-primary" type="button">Reset Password</button>
					</div>
				</form>
				
				<center>
					<span id="preloader" style="  visibility: hidden;">
					<img src="<?php echo TEMPLATE_URL;?>/images/preload.gif">
			     	</span> 
				</center>	
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
