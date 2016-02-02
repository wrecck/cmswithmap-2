<?php echo $header_block; ?>
<style>
.list {
    border: 0 solid #000;
    min-height: 300px;
    width: 100%;
}
</style>

<h1>Members</h1>
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
	  <option <?php if($_POST['search_type']=="username"){echo "selected";}?> value="username">Username</option>
	  <option <?php if($_POST['search_type']=="name"){echo "selected";}?> value="name">Name</option>
	  <option <?php if($_POST['search_type']=="email"){echo "selected";}?>  value="email">Email</option>
	</select>
	<input type="submit" name="submit_search" value="Search" class="btn btn-tab btn-primary">
 </form>
</div>
<?php echo $message;?>
			<div class="list">
			  <div class="option_links" style="display:none"><a href="<?php echo SITE_URL;?>/add-new-user/">Add New User</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo SITE_URL;?>/roles/">Roles</a></div>
				<div class="header_list">
				  <div class="col1">Username</div>
				  <div class="col2">Name</div>
				  <div class="col2">Email</div>
				  <div class="col3">Status</div>
				 
				  <div class="col5">&nbsp;</div>
               </div>
		  <?php foreach($membersList as $data){ 
		  if($data["username"]=="<"){break;}
		  if($data["username"]=="&"){break;}
		  ?>
				<div class="body_list">
				  <div class="col1"><?php echo $data["username"];?></div>
				  <div class="col2"><?php echo $data["first_name"];?> - <?php echo $data["last_name"];?></div>
				  <div class="col3"><?php echo $data["email"];?></div>
				   <div class="col3"><?php echo $data["status"];?></div>
				  <div class="col5"><?php echo $data["options"];?></div>
				</div>
		   <?php }?>	
			</div><br clear="all"><br>
		 <?php  echo  "<b>Page:</b> ".$membersList["pagelinks"];?> 	   


<?php echo $footer_block;  ?>
