<?php echo $header_block; ?>


 <div id="app-right-main" class="blank">
 
<div class="app-body header-offset users">
<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
<?php echo $message;?>
	  <h2>Role Details</h2>
		  

<div class="rows">  
  <div class="label">Role</div>
  <div class="field">
  <input type="text" value="<?php echo $roleData["account_type_name"];?>" name="account_type_name" id="account_type_name">
  </div>			  
</div>
<div class="rows"> 

<h3>Page Restriction</h3>
		  <?php foreach($pages as $page){ ?>
		    <div class="role_pages">
			  <input value="1" type="checkbox" name="<?php echo $page;?>" id="<?php echo $page;?>">&nbsp;<?php echo strtoupper($page);?>
			</div>
		  <?php }?>
</div>

<div class="rows">   
  <div class="submit_div">
  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
  <button class="btn btn-tab btn-primary" type="button" onClick="location.href='<?php echo SITE_URL;?>/roles/';">Back</button>
  </div>
 </div>
		  <br clear="all">
</div><!--//module_box-->
<input type="hidden" value="<?php echo $roleData["id"];?>" name="id">
</form>
		  	   
		</div><!-- app-body -->
      </div><!-- app-right-main -->

<?php echo $footer_block;  ?>
