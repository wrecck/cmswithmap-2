<?php echo $header_block; ?>

<h1>Edit User</h1>
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
		  <div class="label">Status</div>
		  <div class="field">
		  <input type="radio"  value="1" <?php if($userData["status"]==1){echo "checked";}?> name="status" id="status1">&nbsp;Active&nbsp;&nbsp;
		  
		  <input type="radio" value="0" <?php if($userData["status"]==0){echo "checked";}?> name="status" id="status2">&nbsp;Inactive
		  
		  </div>			  
		</div>
		<div class="rows">  
		  <div class="label">Account Type</div>
		  <div class="field">
		  <select name="account_type" id="account_type">
			<option value="">[Select]</option>
			<?php echo $account_type_list;?>
		  </select>
		  </div>		
		</div>

		<div class="rows">  
		  <div class="label">Avatar</div>
		  <div class="field">
		<input type="file" name="avatar">
		  </div>		
		</div>

		<div class="rows">  
		  <h3>Password Reset</h3>
		  <div class="label">Password</div>
		  <div class="field">
		  <input type="hidden" class="form-control" value="" name="password" id="password">
		  </div>			  
		</div>
		<div class="rows">  	  
		  <div class="label">Retype password</div>
		  <div class="field">
		  <input type="hidden" class="form-control" value="" name="password2" id="password2">
		  </div>			  
		 </div>
		<div class="rows">   
		  <div class="submit_div">
		  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
		  <button class="btn btn-tab btn-primary" type="button" onClick="location.href='<?php echo SITE_URL;?>/users/';">Back</button>
		  </div>
		 </div>
    </div><!--//module_box_left-->
	
	<div class="module_box_right"><h3>Avatar:</h3><br>
	     <div class="avatar_div"><img src="<?php echo UPLOAD_URL."/avatar/".$userData["avatar"];?>"></div>
	</div><!--//module_box_right-->
	
	  <br clear="all">	
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
</form>


<?php echo $footer_block;  ?>
