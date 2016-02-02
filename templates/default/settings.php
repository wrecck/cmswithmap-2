<?php echo $header_block; ?>

<h1>Settings</h1>

<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
  <div class="module_box_left">
		<?php echo $message;?>

		<div class="rows">  
		  <div class="label">Site Name</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $data["sitename"];?>" name="sitename" id="sitename">
		  </div>			  
		</div>
		<div class="rows">  
		  <div class="label">Description</div>
		  <div class="field">
		  <textarea class="form-control" name="description" id="description"><?php echo $data["description"];?></textarea>
		  </div>			  
		</div>
		<div class="rows">  
		  <div class="label">Keyword</div>
		  <div class="field">
		  <textarea class="form-control" name="keyword" id="keyword"><?php echo $data["keyword"];?></textarea>
		  </div>			  
		</div>
	
		<div class="rows">  
		  <div class="label">Listing Count per Page</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $data["listing_count"];?>" name="listing_count" id="listing_count">
		  </div>			  
		</div>
		
				<div class="rows">  
		  <div class="label">Header Custom Code</div>
		  <div class="field">
		  <textarea class="form-control" name="header_code" id="header_code"><?php echo $data["header_code"];?></textarea>
  </div>			  
		</div>

		
		<div class="rows">  
		  <div class="label">Footer Custom Code</div>
		  <div class="field">
		  <textarea class="form-control" name="footer_code" id="footer_code"><?php echo $data["footer_code"];?></textarea>
		
		  </div>			  
		</div>
   
   <br clear="all"><br>
		 <hr>
	
		<b>Paypal Settings</b>
		<div class="rows">  
		  <div class="label">&nbsp;</div>
		  <div class="field">
       <input type="checkbox" value="1" <?php if($data["paypal_enabled"]==1){echo "checked";}?> name="paypal_enabled">&nbsp;&nbsp;Enable PayPal Payment		 
		 </div>			  
		</div>
		
		<div class="rows">  
		  <div class="label">PayPal Email:</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $data["paypal_account"];?>" name="paypal_account" id="paypal_account">
		  </div>			  
		</div>
		
    <div class="rows">  
		  <div class="label">Currency:</div>
		  <div class="field">
		  <input type="text" class="form-control" value="<?php echo $data["currency"];?>" name="currency" id="currency">
		  </div>			  
		</div>
	
		<div class="rows">   
		  <div class="submit_div">
		  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
		
		  </div>
		 </div>

		
    </div><!--//module_box_left-->
	

	
	  <br clear="all">	
</div><!--//module_box-->
</form>


<?php echo $footer_block;  ?>
