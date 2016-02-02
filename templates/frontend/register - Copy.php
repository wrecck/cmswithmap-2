<?php echo $header_block;?>

	<br clear="all">
	<div class="main_wrap" style="max-width:90%; width:80%;">
	
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
#codeCap_registration_error

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
</style>
  	<div class="login-form" style="max-width:700px;">
  	
  			<h1 class="center-txt"><?php echo $sitename;?> Registration</h1>
  	
  		<div class="login-body">
		Please login <a href="/login/">here</a> if you already have an account.
		 		   <span class="log_message" id="log_message"></span>
  			<form enctype="multipart/form-data" action="<?php echo $defaultURL;?>/successful-registration/" method="post" name="register" id="register">
<div class="module_box">
<?php echo $message;?>
	  <h2></h2>
		  
<div class="rows">			  
  <div class="label">Username</div>
  <div class="field">
 <input class="form-control" type="text" value="<?php echo $userData["username"];?>" name="username" id="username">
  </div>
</div>
  <div id="username_registration_error">Username must be provided</div>
  
	<div class="rows">  
	  <div class="label">Type of Membership</div>
	  <div class="field checkboxestype"  style="padding-top:5px;" >
	  <input onClick="swithType(1);" type="radio" checked="checked" name="profile_type" id="member_type1" value="1">&nbsp;Producer/Growers&nbsp;&nbsp;
	  <input onClick="swithType(2);"  type="radio" name="profile_type"  id="member_type2"  value="2">&nbsp;Organization&nbsp;&nbsp;
	  <input onClick="swithType(3);"  type="radio" name="profile_type"  id="member_type3"  value="3">&nbsp;Land Owners&nbsp;&nbsp;
      <input onClick="swithType(4);"  type="radio" name="profile_type"  id="member_type3"  value="4">&nbsp;All

	  </div>			  
	</div><br clear="all"><br>
	
  
<div class="profile_1" id="profile_1">
	<div class="rows">  
	  <div class="label">First Name</div>
	  <div class="field">
	  <input class="form-control" type="text" value="<?php echo $userData["first_name"];?>" name="first_name" id="first_name">
	  </div>			  
	</div>
	  <div id="first_name_registration_error">First Name must be provided</div>
	<div class="rows">  
	  <div  class="label">Last Name</div>
	  <div class="field">
	  <input class="form-control" type="text" value="<?php echo $userData["last_name"];?>" name="last_name" id="last_name">
	  </div>			  
	</div>
	  <div id="last_name_registration_error">Last Name must be provided</div>
</div>	  

<div class="profile_2" id="profile_2" style="display:none">
	<div class="rows">  
	  <div class="label">Organization Name</div>
	  <div class="field">
	  <input class="form-control" type="text" value="<?php echo $userData["organization_name"];?>" name="organization_name" id="organization_name">
	  </div>			  
	</div>
   <div id="organization_name_registration_error">Organization Name must be provided</div>
   
 	<div class="rows">  
	  <div class="label">Phone(optional)</div>
	  <div class="field">
	  <input class="form-control" type="text" value="<?php echo $userData["phone"];?>" name="phone" id="phone">
	  </div>			  
	</div>
    <br clear="all"><br>
 	<div class="rows">  
	  <div class="label">Description(optional)</div>
	  <div class="field">
	  <textarea class="form-control" type="text" name="description" id="description"></textarea>
	  </div>			  
	</div>
	 <br clear="all"><br>
</div>


  
<div class="rows">  
  <div  class="label">Email</div>
  <div class="field">
  <input class="form-control" type="text" value="<?php echo $userData["email"];?>" name="email" id="email">
  </div>			  
</div>
  <div id="email_registration_error">Email must be provided</div>			  



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
  <input class="form-control" type="password" value="" name="password" id="password">
  </div>			  
</div>
<div id="password_registration_error">Password must be provided</div>

<div class="rows">  	  
  <div class="label">Retype password</div>
  <div class="field">
  <input class="form-control" type="password" value="" name="password2" id="password2">
  </div>			  
 </div>
<div id="password2_registration_error">Please retype password</div>
   
<div class="rows">  	  
  <div class="label">&nbsp;</div>
  <div class="field"><span style="float:left; padding-top:8px; padding-right:10px;"><?php echo $label; $_SESSION['codeCap']=$codeCap;?> = </span>
 <input class="form-control" style="width:100px;" type="text" value="" name="codeCap" id="codeCap">
  
  </div>			  
 </div>
<div id="codeCap_registration_error">Please input the correct answer above</div>
<br clear="all">
 <br>  
   
<div class="rows">   
  <div class="submit_div" style="margin-top:0px;">
   <button  name="login" onClick="registerFormSubmit()" style="width:150px" class="btn btn-primary" type="button">Register</button>
  </div>
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
</form>
  		</div>
		
		</div>
  <?php echo $footer_block; ?>