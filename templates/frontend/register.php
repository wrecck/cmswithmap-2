<?php echo $header_block;?>

	<br clear="all">
	<div class="main_wrap" >
	
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

    .btn-file {
    position: relative;
    overflow: hidden;
    }
	
	
	   .btn-file input[type="file"] {
    background: none repeat scroll 0 0 white;
    cursor: inherit;
    display: block;
    font-size: 22px;
    margin-left: -15px;
    margin-top: -27px;
    outline: medium none;
    position: absolute;
    text-align: right;
	opacity: 0;
    }
   
 
    /*    .btn-file input[type=file] {
    position: absolute;



  text-align: right;
    filter: alpha(opacity=0);
   opacity: 0;
   
       min-width: 100%;
    min-height: 100%;
	 top: 0;
    right: 0;
	 font-size: 100px;
 
    outline: none;
    background: white;
    cursor: inherit;
    display: block; 
    }  */
	
	
#username_registration_error,
#first_name_registration_error,
#last_name_registration_error,
#email_registration_error,
#password_registration_error,
#password2_registration_error,
#organization_name_registration_error,
#codeCap_registration_error,
#agree_to_terms_error
 {
    color: red;
    float: left;
    font-size: 12px;
    margin-left: 230px;
    visibility: hidden;
}	

.module_box .label{
  margin-top: 6px !important;
}

#agree_to_terms_error {
    margin-left: 120px;
    margin-top: -10px;
}
</style>
  	<div class="login-form" >
  	
  			<h1 class="center-txt"><?php echo $sitename;?> Registration</h1>
  	
  		<div class="login-body">
		Please login <a href="/login/">here</a> if you already have an account.
		 		   <span class="log_message" id="log_message"></span>
  			
<div class="module_box">
<?php echo $message;?>

		<?php if($_GET['showdonationbutton']!=1){?> 	
<div class="donation_div">
	 <p>If you feel this site provides a valuable service, feel free to donate to keep this site free of advertisement.   
	 We understand though, that making a living from farming and growing is no easy task, so enjoy the free marketing.</p>
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
</form>
</div>
<?php } ?>
	<form enctype="multipart/form-data" action="<?php echo $defaultURL;?>/successful-registration/" method="post" name="register" id="register">
		

<?php /*	<div class="rows">  
	  <div class="label typerow">Type of Membership</div>
	  <div class="field checkboxestype"  style="padding-top:5px;" >

	  <input onClick="swithType(1);" type="radio" checked="checked" name="profile_type" id="member_type1" value="1">&nbsp;Free Registration&nbsp;&nbsp;<span class="type_features">(List up to 5 listings at a time.)</span>
      <br><input onClick="swithType(2);"  type="radio" name="profile_type"  id="member_type3"  value="4">&nbsp;Premium Account&nbsp;&nbsp;<span class="type_features">(Unlimited listings, monthly, yearly or lifetime subscription options.)</span>
	  </div>			  
	</div><br clear="all"><br>
	*/?>
	
<input type="hidden" name="profile_type" value="4">
	
<div class="rows">			  
  <div class="label">Username</div>
  <div class="field">
 <input class="form-control" type="text" value="<?php echo $userData["username"];?>" name="username" id="username"><span class="required">*</span>
  </div>
</div>

  <div id="username_registration_error" class="register_error">Username must be provided</div>
  

  


<div class="profile_2" id="profile_2" >
	<div class="rows">  
	  <div class="label">Organization/Farm Name</div>
	  <div class="field">
	  <input class="form-control" type="text" value="<?php echo $userData["organization_name"];?>" name="organization_name" id="organization_name"><span class="required">*</span>
	  </div>			  
	</div>
   <div id="organization_name_registration_error" class="register_error">Organization Name must be provided</div>
   
</div>

<div class="profile_1" id="profile_1">
	<div class="rows">  
	  <div class="label">Contact First Name</div>
	  <div class="field">
	  <input class="form-control" type="text" value="<?php echo $userData["first_name"];?>" name="first_name" id="first_name"><span class="required">*</span>
	  </div>			  
	</div>
	  <div id="first_name_registration_error" class="register_error">Contact First Name must be provided</div>
	<div class="rows">  
	  <div  class="label">Contact Last Name</div>
	  <div class="field">
	  <input class="form-control" type="text" value="<?php echo $userData["last_name"];?>" name="last_name" id="last_name"><span class="required">*</span>
	  </div>			  
	</div>
	  <div id="last_name_registration_error" class="register_error">Contact Last Name must be provided</div>
</div>	  

  
<div class="rows">  
  <div  class="label">Email</div>
  <div class="field">
  <input class="form-control" type="text" value="<?php echo $userData["email"];?>" name="email" id="email"><span class="required">*</span>
  </div>			  
</div>
  <div id="email_registration_error" class="register_error">Email must be provided</div>			  



<div class="rows" style="margin-bottom:17px">  
  <div class="label">Profile Photo</div>
  <div class="field">
  <span class="btn btn-default btn-file">
 Browse <input type="file" name="avatar">
 </span>
  </div>		
</div>

<div class="rows">  
  <div class="label">Password</div>
  <div class="field">
  <input class="form-control" type="password" value="" name="password" id="password"><span class="required">*</span>
  </div>			  
</div>
<div id="password_registration_error" class="register_error">Password must be provided</div>

<div class="rows">  	  
  <div class="label">Retype password</div>
  <div class="field">
  <input class="form-control" type="password" value="" name="password2" id="password2"><span class="required">*</span>
  </div>			  
 </div>
<div id="password2_registration_error" class="register_error">Please retype password</div>
   
   
<div class="rows terms"> 
  <center> 
	<input type="checkbox" value="1" name="agree_to_term" id="agree_to_term">  
   &nbsp;I agree to the <a href="/terms/" target="_blank">Terms of Use</a> and <a target="_blank" href="/privacy-policies/">Privacy Policy</a> for the site, services, and application provided by SproutingTrade Inc.&nbsp;<span style="float:none" class="required">*</span>
  </center>
 
</div>
<div id="agree_to_terms_error" class="register_error">You must agree to the Terms of Use and Privacy Policy of SproutingTrade.</div>

<div class="rows">  
  <div class="label">&nbsp;</div>
  <div class="field"><span style="float:left; padding-top:8px; padding-right:10px;"><?php echo $label; $_SESSION['codeCap']=$codeCap;?> = </span>
 <input class="form-control" style="width:100px;" type="text" value="" name="codeCap" id="codeCap"><span class="required">*</span>
  
  </div>			  
 </div>
<div id="codeCap_registration_error" class="register_error">Please input the correct answer above</div>
<br clear="all">
 <br>  
   

<div class="rows">   
  <div class="submit_div" style="margin-top:0px;">
   <button  name="login" onClick="registerFormSubmit()" style="width:150px" class="btn btn-primary" type="button">Register</button>
  </div>
</div>

 <br clear="all">
 <br>  
  <div class="rows"> 
<span class="note"><span>*</span>&nbsp;Your contact information will not be shared with anyone. it will be used solely for the purpose of communicating with you.</span>
 </div>

 
 <center>
<span id="preloader" style="display: none; float: left; width: 100%; text-align: center; margin-top:10px;">
	<img src="<?php echo TEMPLATE_URL;?>/images/preload.gif">
</span>
</center>
</div>
		  <br clear="all">
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
<input type="hidden" value="0" id="isr">
</form>
  		</div>
		
		</div>
  <?php echo $footer_block; ?>