<?php echo $header_block; ?>

<h1>Edit Membership</h1>

<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
<?php echo $message;?>
	  
		  
<div class="rows">			  
  <div class="label">Membership Plan</div>
  <div class="field">
 <input type="text" class="form-control" value="<?php echo $data["name"];?>" name="name" id="name">
  </div>
</div>



<div class="rows">			  
  <div class="label">Price</div>
  <div class="field">

<input style="width:100px;" type="text" class="form-control" value="<?php echo $data["price"];?>" name="price" id="price">
  </div>
</div>


<div class="rows">			  
  <div class="label">Terms</div>
  <div class="field">
   <select name="payment_term" class="form-control">
     <option value="">[Select Term]</option>
     <option value="Monthly" <?php if($data["payment_term"]=="Monthly"){echo "selected";}?>>Monthly</option>
	 <option value="One Time" <?php if($data["payment_term"]=="One Time"){echo "selected";}?>>One Time</option>
	 <option value="Annually" <?php if($data["payment_term"]=="Annually"){echo "selected";}?>>Annually</option>
   </select>
  </div>
</div>


<div class="rows">   
  <div class="submit_div">
  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
  <button class="btn btn-tab btn-primary" type="button" onClick="location.href='<?php echo SITE_URL;?>/membership/';">Back</button>
  </div>
 </div>


		  <br clear="all">
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
</form>


<?php echo $footer_block;  ?>
