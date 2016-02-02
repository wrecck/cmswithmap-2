<?php echo $header_block; ?>


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
		<div class="rows">  
		  <div class="label">Email</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $userData["email"];?>" name="email" id="email">
		  </div>			  
		</div>



		<div class="rows">  
		  <div class="label">Avatar</div>
		  <div class="field">
		<input type="file" class="form-control" name="avatar">
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
    </div><!--//module_box_left-->
	
	<div class="module_box_right"><h3>Avatar:</h3><br>
	     <div class="avatar_div"><img src="<?php echo UPLOAD_URL."/avatar/".$userData["avatar"];?>"></div>
	</div><!--//module_box_right-->
	
	  <br clear="all">	
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
<input type="hidden" name="isprofile" value="1">
</form>
		  	   


<?php echo $footer_block;  ?>
