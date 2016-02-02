<?php echo $header_block; ?>
	  <h1>Role Details</h1>
<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
<?php echo $message;?>

		  

<div class="rows">  
  <div class="label">Role</div>
  <div class="field">
  <input class="form-control" type="text" value="<?php echo $roleData["account_type_name"];?>" name="account_type_name" id="account_type_name">
  </div>			  
</div>
<div class="rows"> 
<?php $selectedPages=unserialize($roleData["page_level"]);?>
<h3>Page Restriction</h3> 
		  <?php foreach($pages as $page){  ?>
		    <div class="role_pages">
			  <input <?php if($_GET['id']==1){echo "disabled"; }?> <?php if(in_array($page,$selectedPages)){echo "checked";}?> value="1" type="checkbox" name="<?php echo $page;?>" id="<?php echo $page;?>">&nbsp;<?php echo strtoupper($page);?>
			</div>
		  <?php }?>
</div>

<div class="rows">   
  <div class="submit_div">
  <input type="submit" <?php if($_GET['id']==1){echo "disabled style='background-color:gray'"; }?> value="Save" name="submit" class="btn btn-tab btn-primary">
  <button class="btn btn-tab btn-primary" type="button" onClick="location.href='<?php echo SITE_URL;?>/roles/';">Back</button>
  </div>
 </div>
		  <br clear="all">
</div><!--//module_box-->
<input type="hidden" value="<?php echo $roleData["id"];?>" name="id">
</form>


<?php echo $footer_block;  ?>
