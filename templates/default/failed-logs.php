<?php echo $header_block; ?>
<style>
.list {
    border: 0 solid #000;
    min-height: 300px;
    width: 100%;
}
</style>

<h1>Failed Logs</h1>

<?php echo $message;?>
			<div class="list logs">
			  <div class="option_links" style="display:none"><a href="<?php echo SITE_URL;?>/add-new-user/">Add New User</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo SITE_URL;?>/roles/">Roles</a></div>
				<div class="header_list">
				 <div class="col1">Type</div>
				  <div class="col1">IP</div>
				   <div class="col1">Page</div>
				  <div class="col2">Country</div>
				  <div class="col2">Browser</div>
				  <div class="col3">Device</div>
				  <div class="col3">OS</div>
				  <div class="col3">Date</div>
               </div>
		  <?php foreach($listLogs as $data){ 
		  if($data["username"]=="<"){break;}
		  if($data["username"]=="&"){break;}
		  ?>
				<div class="body_list">
				 <div class="col1"><?php echo $data["type"];?></div>
				  <div class="col1"><?php echo $data["ip"];?></div>
				  <div class="col2"><?php echo $data["ref"];?></div>
				  <div class="col2"><?php echo $data["country"];?></div>
				  <div class="col3"><?php echo $data["browser"];?></div>
				   <div class="col3"><?php echo $data["device"];?></div>
				  <div class="col3"><?php echo $data["os"];?></div>
				  <div class="col3"><?php echo $data["dateentry"];?></div>
				</div>
		   <?php }?>	
			</div><br clear="all"><br>
		 <?php  echo  "<b>Page:</b> ".$listLogs["pagelinks"];?> 	   


<?php echo $footer_block;  ?>

