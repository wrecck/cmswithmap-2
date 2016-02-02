<?php echo $header_block; ?>
<h1>Countries</h1> 
<?php if($_GET['added']==1){echo "<br><b>Item has been added.</b><br>";}?>
<?php if(isset($_GET['delete'])){echo "<br><b>Item has been deleted.</b><br>";}?>
			<div class="list">
			  <div class="option_links" style="width:610px;" ><a href="<?php echo SITE_URL;?>/options-countries/?add-new=1">Add New</a></div>
				<br clear="all">
				<div class="header_list">
				<div class="col1" style="width:250px;">Category</div>
				<div class="col5" style="width:360px;">&nbsp;</div>
               </div>
		  <?php foreach($countryList as $data){?>
				<div class="body_list">
				  <div class="col1" style="width:250px;"><?php echo $data["name"];?></div>

				  <div class="col5" style="width:360px;"><?php echo $data["options"];?></div>
				</div>
		   <?php }?>	
			</div>
		  	   


<?php echo $footer_block;  ?>
