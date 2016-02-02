<?php echo $header_block; ?>

<div class="main_wrap_pad profile">

<h1>My Account</h1>
<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
  <div class="module_box_left">
		<?php echo $message;?>
			
		
		<div class="rows">			  
		  <div class="label">Username</div>
		  <div class="field">
		  <?php echo $userData["username"];?>
		  </div>
		</div>
	<?php if($userData["profile_type"]==2){?>
       
		<div class="rows">  
		  <div class="label">Organization Name</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["organization_name"];?>" name="organization_name" id="organization_name">
		  </div>			  
		</div>
		

		<div class="rows">  
		<div class="label">Description(optional)</div>
		<div class="field">
		<textarea class="form-control" type="text" name="description" id="description"><?php echo $userData["description"];?></textarea>
		</div>			  
		</div>

	<?php }else{?>	
		<div class="rows">  
		  <div class="label">First Name</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["first_name"];?>" name="first_name" id="first_name">
		  </div>			  
		</div>
		<div class="rows">  
		  <div class="label">Last Name</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["last_name"];?>" name="last_name" id="last_name">
		  </div>			  
		</div>
	<?php } ?>	
	
	
	
		<div class="rows">  
		  <div class="label">Email</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["email"];?>" name="email" id="email">
		  </div>			  
		</div>


		<div class="rows">  
		<div class="label">Phone(optional)</div>
		<div class="field">
		<input class="form-control" type="text" value="<?php echo $userData["phone"];?>" name="phone" id="phone">
		</div>			  
		</div>

		
		<div class="rows">  
		  <div class="label">Profile Photo</div>
		  <div class="field">
		<input type="file" class="form-control" name="avatar">
		  </div>		
		</div>

		<div class="rows">  
		 <h3>Address Details</h3>
		  <div class="label">First Line of Address</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["address1"];?>" name="address1" id="address1">
		  </div>			  
		</div>

		<div class="rows">  
		  <div class="label">Second Line of Address</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["address2"];?>" name="address2" id="address2">
		  </div>			  
		</div>
		
		<div class="rows">  
		  <div class="label">Town/City</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["city"];?>" name="city" id="city">
		  </div>			  
		</div>

		<div class="rows">  
		  <div class="label">State</div>
		  <div class="field">
		  <input  type="text" class="form-control" value="<?php echo $userData["state"];?>" name="state" id="state">
		  </div>			  
		</div>


		<div class="rows">  
		  <div class="label">Country</div>
		  <div class="field">
		  <select style="margin-bottom:0px;" name="country" id="country" class="form-control half" onChange="showAddress();">
		   <option value="">Country</option>
		   <?php echo $countries;?>
		</select>
		  </div>			  
		</div>


		<div class="rows">  
		  <div class="label">Zip</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["zip"];?>" name="zip" id="zip">
		  </div>			  
		</div>
		
		
		<div class="rows">  
		  <h3>Password Reset</h3>
		  <div class="label">Password</div>
		  <div class="field">
		  <input type="password" class="form-control" value="" name="password" id="password">
		  </div>			  
		</div>
		<div class="rows">  	  
		  <div class="label">Retype password</div>
		  <div class="field">
		  <input type="password" class="form-control" value="" name="password2" id="password2">
		  </div>			  
		 </div>
		 

	
	 <div class="rows">   
		  <div class="submit_div">
		  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
           </div>
	 </div>
		
	<br clear="all">
<hr><br>
<b>Upgrade Account</b>	
	<div class="rows">  	  
		  <div class="label">&nbsp;</div>
		  <div class="field">
		  <input type="buttom" onClick="location.href='/upgrade-account/';" class="btn btn-tab btn-primary"value="Upgrade Account" name="upgrade" id="upgrade">
		  </div>			  
	</div>		 
		 
    </div><!--//module_box_left-->
	
	<div class="module_box_right"><h3>Profile Photo:</h3><br>
	     <div class="avatar_div"><img src="<?php echo UPLOAD_URL."/avatar/".$userData["avatar"];?>"></div>
	</div><!--//module_box_right-->
	
	  <br clear="all">	
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
<input type="hidden" name="isprofile" value="1">
</form>
<br clear="all"><br>
</div>		  	   


<?php echo $footer_block;  ?>
