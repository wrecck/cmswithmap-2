<?php echo $header_block; ?>

<h1>Edit Page</h1>

<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
<?php echo $message;?>
	  
		  
<div class="rows">			  
  <div class="label">Page Title</div>
  <div class="field">
  <?php if($pageData["page_title"]=="Home"){echo "Home";?>
   <input type="hidden"  value="<?php echo $pageData["page_title"];?>" name="page_title" id="page_title">
  <?php }else{?>
 <input type="text"  class="form-control" value="<?php echo $pageData["page_title"];?>" name="page_title" id="page_title">
  <?php }?>
  </div>
</div>

<div class="rows">  
  <div class="label">Content</div>
  <div class="field">
  <textarea class="form-control" name="page_content" style="min-height:210px;" id="page_content"><?php echo $pageData["page_content"];?></textarea>
  </div>			  
</div>

<div class="rows">  
  <div class="label">Quote</div>
  <div class="field">
  <textarea class="form-control" name="page_quote" style="min-height:80px;" id="page_quote"><?php echo $pageData["page_quote"];?></textarea>
  </div>			  
</div>


<div class="rows">  
  <div class="label">Header Image</div>
   <div class="field">
	<br><img width="80px;" src="<?php echo UPLOAD_URL."/slides/".$pageData["page_header_image"];?>">
	<br><b>Browse new file to replace current image: </b>
	<input type="file" name="header_image" id="header_image" accept="image/*,audio/*">
 </div>			  
</div>

<div class="rows">  
  <div class="label">&nbsp;</div>
  <div class="field">
    <br>
	
	
	<b>Other Images(to use in image slider/rotation)<br></b>
    <?php if(!empty($pageData["other_image"])){?>	 
	 <ul class="other_images_li">
	  <?php $other_imagesArr=explode(",",substr($pageData["other_image"],1));
	        foreach($other_imagesArr as $other_image_link){ ?>
				<li><img style="width:60px; height:60px" src="<?php echo UPLOAD_URL."/slides/".$other_image_link;?>" 
				style="float:left"><br>
				<center><a  class="delete_image" onClick="confirmDelete('?id=<?php echo $_GET['id'];?>&delete=<?php echo $other_image_link;?>')" href="javascript:void(0)">Delete</a></center>
				</li>
	  <?php }
	  ?>
	  </ul>
	<?php }else{echo "No other image uploaded";} ?>
	<br clear="all"><br>
	<b>Upload additional images:</b>
	Browse: <input type="file" name="additional_header_image1" id="additional_header_image1" accept="image/*,audio/*"><br>
	<input type="file" name="additional_header_image2" id="additional_header_image2" accept="image/*,audio/*"><br>
	<input type="file" name="additional_header_image3" id="additional_header_image3" accept="image/*,audio/*"><br>
	<input type="file" name="additional_header_image4" id="additional_header_image4" accept="image/*,audio/*"><br>
	<input type="hidden" name="other_image" value="<?php echo $pageData["other_image"];?>">
		
 
 </div>			  

 
 </div>



<div class="rows">			  
  <div class="label">Page URL</div>
  <div class="field">
<div style="float:left; padding-top:7px;margin-right:3px; font-size:17px; font-weight:bold"><?php echo $defaultURL;?>/</div>
 <?php if($pageData["page_title"]!="Home"){ ?>
<input style="width:100px;" type="text" class="form-control" value="<?php echo $pageData["page_slug"];?>" name="page_slug" id="page_slug">
 <?php }else{?>
<input  type="hidden"  value="<?php echo $pageData["page_slug"];?>" name="page_slug" id="page_slug">

 <?php }?> 
 </div>
</div>


<div class="rows">			  
  <div class="label">Custom Page Title</div>
  <div class="field">
 <input type="text" class="form-control" value="<?php echo $pageData["custom_title"];?>"  name="custom_title" id="custom_title">
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
