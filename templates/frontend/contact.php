<?php echo $header_block;?>


  		<div class="main_wrap_pad">
		 		<h1>Contact</h1>
		<?php echo $message;?>		
		<p>Contact us for whatever reason, and we will get back to you as soon as we can.</p>
<form  action="/contact/" method="post" onSubmit="return validateContact();">
		
		<input type="text" class="form-control half" placeholder="First Name"  name="first_name" id="first_name">
		<input type="text" class="form-control half" placeholder="Last Name"  name="last_name" id="last_name">
		<br clear="all">
		<input type="text" class="form-control half" placeholder="Email Address"  name="email" id="email">
		<input type="text" class="form-control half" placeholder="Confirm Email Address"  name="confirm_email" id="confirm_email">
	
		<textarea placeholder="Enter Message"  style="width:100% !important; height:200px; margin-top:0px;" class="form-control full" name="message" id="message"></textarea>
        <br clear="all">
		<div class="rows">  
  <div class="label">&nbsp;</div>
  <div class="field"><span style="float:left; padding-top:8px; padding-right:10px;"><?php echo $label; $_SESSION['codeCap']=$codeCap;?> = </span>
 <input class="form-control" style="width:100px;" type="text" value="" name="codeCap" id="codeCap"><span class="required">*</span>
  
  </div>			  
 </div>
<div id="codeCap_registration_error" class="register_error">Please input the correct answer above</div>
<br clear="all">

		<center>
		<input type="submit" style="width:250px;" value="Send" name="submit" class="btn btn-tab btn-primary">
		</center>
		</div>
	
	 <br clear="all">


<span class="note"><span>*</span>&nbsp;Your contact information will not be shared with anyone. it will be used solely for the purpose of communicating with you.</span>
 <input type="hidden" value="<?php echo $label;?>" id="capLabel">
  <input type="hidden" value="<?php echo $codeCapHid;?>" id="codeCapHid">
  
 <input type="hidden" value="0" id="isr">
</form>
		
		</div>
		
		
  	

<?php echo $footer_block; ?>