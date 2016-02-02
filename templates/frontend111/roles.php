<?php echo $header_block; ?>
<h1>Roles</h1>
			<div class="list">
			  <div class="option_links"><a href="<?php echo SITE_URL;?>/add-new-role/">Add New Roles</a></div>
				<div class="header_list">
				  <div class="col1">Role</div>
				  <div class="col2">Pages</div>
				  <div class="col3">&nbsp;</div>
               </div>
		  <?php foreach($rolesList as $data){?>
				<div class="body_list">
				  <div class="col1"><?php echo $data["account_type_name"];?></div>
				  <div class="col2"><?php echo $data["page_level"];?></div>
				  <div class="col3"><?php echo $data["options"];?></div>

				</div>
		   <?php }?>	
			</div>

<?php echo $footer_block;  ?>
