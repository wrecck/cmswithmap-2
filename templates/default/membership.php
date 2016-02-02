<?php echo $header_block; ?>
<h1>Membership</h1>
			<div class="list">
			  <div class="option_links" style="width:610px;" ><a href="<?php echo SITE_URL;?>/add-new-membership/">Add New Membership</a></div>
				<br clear="all">
				<div class="header_list">
				  <div class="col1">Membership</div>
				  <div class="col1">Price</div>
				  <div class="col1">Payment Term</div>
				  <div class="col5">&nbsp;</div>
               </div>
		  <?php foreach($membershiplist as $data){?>
				<div class="body_list">
				  <div class="col1"><?php echo $data["name"];?></div>
				  <div class="col1"><?php echo $data["price"];?></div>
				  <div class="col1"><?php echo $data["payment_term"];?></div>
				  <div class="col5"><?php echo $data["options"];?></div>
				</div>
		   <?php }?>	
			</div>
		  	   


<?php echo $footer_block;  ?>
