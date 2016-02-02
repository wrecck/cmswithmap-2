<?php echo $header_block; ?>
<h1>Listings</h1>

<div class="search_box">
<script>
 function searchKey(){
	if(document.getElementById('search_key').value==""){ alert('Please provide Search Keyword'); return false;}
 }
</script>
 <form action="" method="post" onSubmit="return searchKey();">
   <div style="float: left; font-weight: bold; padding-top: 10px; margin-right: 10px;">Search Keyword:</div>
    <input type="text" value="<?php echo $_POST['search_key'];?>" name="search_key" id="search_key" class="form-control small">
	<select name="search_type" class="form-control small">
	  <option <?php if($_POST['search_type']=="produce"){echo "selected";}?> value="produce">Produce</option>
	  <option <?php if($_POST['search_type']=="category"){echo "selected";}?> value="category">Category</option>
	  <option <?php if($_POST['search_type']=="farm_name"){echo "selected";}?>  value="farm_name">Farm name</option>
	  <option <?php if($_POST['search_type']=="address"){echo "selected";}?>  value="address">Address</option>
	  <option <?php if($_POST['search_type']=="user"){echo "selected";}?>  value="user">User</option>
	</select>
	<input type="submit" name="submit_search" value="Search" class="btn btn-tab btn-primary">
 </form>
</div>
			<div class="list">
				<div class="header_list">
				  <div class="col1">Produce/Category</div>
				  <div class="col2">User</div>
				  <div class="col2">Farm Name</div>
				  <div class="col3">Status</div>
				 
				  <div class="col5">&nbsp;</div>
               </div>
		  <?php 
		 if(count($listingsArr)>0){ 
		    foreach($listingsArr as $data){
			if(@$data["username"]=="<"){break;}
			if(@$data["username"]=="&"){break;}
				?>
				<div class="body_list">
				  <div class="col1">
				  <b><?php echo $data["catname"];?> - <?php echo $data["subcatname"];?></b><br>
				  <?php echo $data["currency"];?> <?php echo $data["quantity_number"];?> <?php echo $data["quantity_unit"];?>
				  </div>
				  <div class="col2"><?php echo $data["ufirst_name"];?> - <?php echo $data["ulast_name"];?></div>
				  <div class="col2"><?php echo $data["farm_name"];?> </div>
				  <div class="col3"><?php echo $data["status"];?> </div>
			
				  <div class="col5"><?php echo $data["options"];?>&nbsp;<a href="javascript:void(0);"  onClick="confirmDelete('/listings/?did=<?php echo $data["id"];?>')">Delete</a></div>
				</div>
		   <?php }
		 } ?>	
			</div>
		  	<br clear="all"><br>
		 <?php  echo  "<b>Page:</b> ".$listingsArr["pagelinks"];?> 	   


<?php echo $footer_block;  ?>
