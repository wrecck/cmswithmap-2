<?php echo $header_block; ?>

<h1>Edit Sub Category</h1>

<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
<?php echo $message;?>
	  
		  
<div class="rows">			  
  <div class="label">Category</div>
  <div class="field">
 <input type="text" class="form-control" value="<?php echo $data["name"];?>" onKeyUp="convertToSlug(this.value)" name="name" id="name">
  </div>
</div>

<div class="rows">			  
  <div class="label">Slug</div>
  <div class="field">
 <input type="text"  class="form-control" value="<?php echo $data["slug"];?>" name="slug" id="slug">
  </div>
</div>

<div class="rows">  
  <div class="label">Category Image</div>
  <div class="field">
  <?php if(!empty($data["cat_image"])){?>
  <br><img width="80px;" src="<?php echo UPLOAD_URL."/category/".$data["cat_image"];?>">
<br><b>Browse new file to replace current image</b><br><?php }?><br>
<input type="file" name="cat_image" id="cat_image" accept="image/*,audio/*">
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
  <button class="btn btn-tab btn-primary" type="button" onClick="location.href='<?php echo SITE_URL;?>/product-categories/';">Back</button>
  </div>
 </div>


		  <br clear="all">
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
</form>


<?php echo $footer_block;  ?>
