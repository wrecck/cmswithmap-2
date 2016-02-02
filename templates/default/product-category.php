<?php echo $header_block; ?>
<h1>Product Category</h1>
<?php echo $message;?>
			<div class="list">
			  <div class="option_links" style="width:610px;" ><a href="<?php echo SITE_URL;?>/product-categories/?add-new=1">Add New Category</a></div>
				<br clear="all">
				<div class="header_list">
				<div class="col1" style="width:250px;">Category</div>
				<div class="col5" style="width:360px;">&nbsp;</div>
               </div>
		  <?php foreach($productCategoryList as $data){?>
				<div class="body_list">
				  <div class="col1" style="width:250px;"><?php echo $data["name"];?></div>

				  <div class="col5" style="width:360px;"><?php echo $data["options"];?></div>
				</div>
		   <?php }?>	
			</div>
		  	   


<?php echo $footer_block;  ?>
