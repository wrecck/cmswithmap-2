<?php echo $header_block; ?>
<h1><?php echo $mainCategoryName;?> Product Sub Category</h1>
<?php echo $message;?>
			<div class="list">
			  <div class="option_links" style="width:610px;" >
			  <a href="<?php echo SITE_URL;?>/product-categories/">Back to Main Category</a>&nbsp;&nbsp;
			  <a href="<?php echo SITE_URL;?>/sub-categories/?add-new=1&parent_id=<?php echo $_GET['parent_id']?>&catname=<?php echo $_GET['catname'];?>">Add New Sub Category</a></div>
				<br clear="all">
				<div class="header_list">
				<div class="col1" style="width:250px;">Sub Category</div>
				<div class="col5" style="width:360px;">&nbsp;</div>
               </div>
		  <?php
		  if(count($productSubCategoryList)>0){
		   foreach($productSubCategoryList as $data){?>
				<div class="body_list">
				  <div class="col1" style="width:250px;"><?php echo $data["name"];?></div>

				  <div class="col5" style="width:360px;"><?php echo $data["options"];?></div>
				</div>
		   <?php }
		  }else{
           echo "<br clear='all'><br>No records available";
		  }
		   ?>	
			</div>
		  	   


<?php echo $footer_block;  ?>
