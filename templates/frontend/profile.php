<?php echo $header_block; ?>

<div class="main_wrap_pad profile">

<h1><?php echo ucfirst($userData["username"]);?> Profile</h1>
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
		 <?php echo $userData["organization_name"];?>
		  </div>			  
		</div>
		
		<div class="rows">  
		<div class="label">Phone</div>
		<div class="field">
		<?php echo $userData["phone"];?>
		</div>			  
		</div>

		<div class="rows">  
		<div class="label">Description</div>
		<div class="field">
		<?php echo $userData["description"];?>
		</div>			  
		</div>

	<?php }else{?>	
		<!--<div class="rows">  
		  <div class="label">First Name</div>
		  <div class="field">
		  <?php echo $userData["first_name"];?>
		  </div>			  
		</div>
		<div class="rows">  
		  <div class="label">Last Name</div>
		  <div class="field">
		  <?php echo $userData["last_name"];?>
		  </div>			  
		</div> -->
	<?php } ?>	
		<div class="rows">  
		  <div class="label">Join date</div>
		  <div class="field">
		  <?php  echo date("M d, Y",strtotime($userData["date_added"]));?>
		  </div>			  
		</div>
		




	
    </div><!--//module_box_left-->
	
	<div class="module_box_right"><h3>Profile Photo:</h3><br>
	     <div class="avatar_div"><img alt="<?php echo $userData["organization_name"];?> logo" src="<?php echo UPLOAD_URL."/avatar/".$userData["avatar"];?>"></div>
	</div><!--//module_box_right-->
	
	  <br clear="all">	
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
<input type="hidden" name="isprofile" value="1">
</form>
<br clear="all"><br>
</div>		  	   


<?php echo $footer_block;  ?>
