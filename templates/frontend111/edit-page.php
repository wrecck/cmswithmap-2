<?php echo $header_block; ?>

<h1>Add New Page</h1>

<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
<?php echo $message;?>
	  
		  
<div class="rows">			  
  <div class="label">Page Title</div>
  <div class="field">
 <input type="text"  class="form-control" value="<?php echo $pageData["page_title"];?>" name="page_title" id="page_title">
  </div>
</div>

<div class="rows">  
  <div class="label">Content</div>
  <div class="field">
  <textarea class="form-control" name="page_content" style="min-height:300px;" id="page_content"><?php echo $pageData["page_content"];?></textarea>
  </div>			  
</div>

<div class="rows">			  
  <div class="label">Page URL</div>
  <div class="field">
<div style="float:left; padding-top:7px;margin-right:3px; font-size:17px; font-weight:bold"><?php echo $defaultURL;?></div>
<input style="width:100px;" type="text" class="form-control" value="<?php echo $pageData["page_slug"];?>" name="page_slug" id="page_slug">
  </div>
</div>



<div class="rows">			  
  <div class="label">Meta Description</div>
  <div class="field">
 <input type="text" class="form-control" value="<?php echo $pageData["page_description"];?>" name="page_description" id="page_description">
  </div>
</div>

<div class="rows">			  
  <div class="label">Meta Keyword</div>
  <div class="field">
 <input type="text" class="form-control" value="<?php echo $pageData["page_keyword"];?>" name="page_keyword" id="page_keyword">
  </div>
</div>
<div class="rows">			  
  <div class="label">Page Order</div>
  <div class="field">
<input style="width:100px;" type="text" class="form-control" value="<?php echo $pageData["page_order"];?>" name="page_order" id="page_order">
  </div>
</div>
<div class="rows">			  
  <div class="label">&nbsp;</div>
  <div class="field">
 <input type="checkbox"  value="1" <?php if($pageData["showinheader"]==1){echo "checked";}?> name="showinheader" id="showinheader">&nbsp;Show in Header
  </div>
</div>

<div class="rows">			  
  <div class="label">&nbsp;</div>
  <div class="field">
 <input type="checkbox"  value="1"  <?php if($pageData["showinside"]==1){echo "checked";}?>  name="showinside" id="showinside">&nbsp;Show in Sidebar
  </div>
</div>

<div class="rows">			  
  <div class="label">&nbsp;</div>
  <div class="field">
 <input type="checkbox" value="1"  <?php if($pageData["showinfooter"]==1){echo "checked";}?>  name="showinfooter" id="showinfooter">&nbsp;Show in Footer
 
  </div>
</div>
<div class="rows">   
  <div class="submit_div">
  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
  <button class="btn btn-tab btn-primary" type="button" onClick="location.href='<?php echo SITE_URL;?>/pages/';">Back</button>
  </div>
 </div>


		  <br clear="all">
</div><!--//module_box-->
<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
</form>


<?php echo $footer_block;  ?>
