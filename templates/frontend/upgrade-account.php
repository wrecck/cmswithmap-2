<?php echo $header_block; ?>

<div class="main_wrap_pad">
<h1>Upgrade Account</h1>
<?php if($exceededPost==1){?><div class="notice">You have reached the limit for listing, please upgrade your account to post more listing.</div><?php } ?>

<form action="" method="post" name="upgradeform" enctype="multipart/form-data">
<div class="module_box">
  <div class="module_box_left">
		<?php echo $message;?>

		<br clear="all">
		<b>Select Membership Plan</b><br clear="all">
		  <?php foreach($membershiplist as $data){?>
				<div class="body_list">
		  <div class="col1"><input <?php if($data["id"]==1){echo "checked";}?> type="radio" name="plan" id="plan" value="<?php echo $data["id"];?>|<?php echo $data["name"];?>|<?php echo $data["price"];?>|<?php echo $data["payment_term"];?>"></div>
				  <div class="col1"><?php echo $data["name"];?></div>
				  <div class="col1">$<?php echo $data["price"];?></div>
				  <div class="col1"><?php echo $data["payment_term"];?></div>
				  
				</div>
		   <?php }?>
		   
	<?php /*	 <hr>
         <b>Billing Information</b>		 
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
		</div> */?>




	
	 <div class="rows">   
		  <div class="submit_div">
		     <input type="submit" value="Continue" name="submit" class="btn btn-tab btn-primary">
          </div>
	 </div>
		
	 
		 
    </div><!--//module_box_left-->
	

	
	  <br clear="all">	
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
</form>
<br clear="all"><br>
</div>		  	   


<?php echo $footer_block;  ?>
