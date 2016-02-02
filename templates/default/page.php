<?php echo $header_block; ?>
<h1>Pages</h1>
			<div class="list">
			  <div class="option_links"><a href="<?php echo SITE_URL;?>/add-new-page/">Add New Page</a></div>
				<div class="header_list">
				  <div class="col1">Title</div>
				  <div class="col5">&nbsp;</div>
               </div>
		  <?php foreach($pagelist as $data){?>
				<div class="body_list">
				  <div class="col1"><?php echo $data["page_title"];?></div>
				  <div class="col5"><?php echo $data["options"];?></div>
				</div>
		   <?php }?>	
			</div>
		  	   


<?php echo $footer_block;  ?>
