<?php echo $header_block; ?>

<h1>Edit Country</h1>

<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
<?php echo $message;?>
	  
		  
<div class="rows">			  
  <div class="label">Country</div>
  <div class="field">
 <input type="text" class="form-control" value="<?php echo $data["name"];?>" onKeyUp="convertToSlug(this.value)" name="name" id="name">
  </div>
</div>

<div class="rows">			  
  <div class="label">Code</div>
  <div class="field">
 <input type="text"  class="form-control" value="<?php echo $data["code"];?>" name="code" id="code">
  </div>
</div>

<div class="rows">			  
  <div class="label">Region</div>
  <div class="field">
 <input type="text"  class="form-control" value="<?php echo $data["region"];?>" name="region" id="region">
  </div>
</div>

<div class="rows">			  
  <div class="label">Order</div>
  <div class="field">

<input style="width:100px;" type="text" class="form-control" value="<?php echo $data["vieworder"];?>" name="vieworder" id="vieworder">
  </div>
</div>



<div class="rows">   
  <div class="submit_div">
  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
  <button class="btn btn-tab btn-primary" type="button" onClick="location.href='<?php echo SITE_URL;?>/options-countries/';">Back</button>
  </div>
 </div>


		  <br clear="all">
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
</form>


<?php echo $footer_block;  ?>
