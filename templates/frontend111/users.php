<?php echo $header_block; ?>
<h1>Users</h1>
			<div class="list">
			  <div class="option_links"><a href="<?php echo SITE_URL;?>/add-new-user/">Add New User</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo SITE_URL;?>/roles/">Roles</a></div>
				<div class="header_list">
				  <div class="col1">Username</div>
				  <div class="col2">Name</div>
				  <div class="col3">Status</div>
				  <div class="col4">Role</div>
				  <div class="col5">&nbsp;</div>
               </div>
		  <?php foreach($usersList as $data){?>
				<div class="body_list">
				  <div class="col1"><?php echo $data["username"];?></div>
				  <div class="col2"><?php echo $data["first_name"];?> - <?php echo $data["last_name"];?></div>
				  <div class="col3"><?php echo $data["status"];?></div>
				  <div class="col4"><?php echo $data["account_type"];?></div>
				  <div class="col5"><?php echo $data["options"];?></div>
				</div>
		   <?php }?>	
			</div>
		  	   


<?php echo $footer_block;  ?>
