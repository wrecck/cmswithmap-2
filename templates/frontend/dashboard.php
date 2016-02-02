<?php echo $header_block;?>

  		
<div class="main_wrap_pad dashboard">
	<h1><?php echo $page_title;?></h1>
	<p><?php echo $page_content;?></p> 

<div class="dashboard_left">

	<div class="widget admin">

	  <div class="widget_body">
	 

	 <?php if($noPersonalInfo==0){?>
		<div class="widget_row noprofile">
		<div class="row_text notice"><a href="/edit-profile/">Complete Your Profile.</a>
		<br>Tell Everyone what your farm/organization has to offer.
		</div>
		</div>
		 <br clear="all">
  <br>
	 <?php }  ?>

	
<div class="widget_row noprofile">
		<div class="row_text notice"><a href="/add-new-listing/">Add New Listing</a>

		</div>
		</div>
		
	 <?php if($isProAccount!=1){?>		
		<div class="widget_row ">
		<div class="icon"><span class="glyphicon glyphicon-exclamation-sign"></span></div>
		<div class="row_text"><a href="/upgrade-account/">Upgrade your account to post more listing.</a></div>
		</div>
     <?php }  ?>	
		
	  </div>  
	</div>
    <br clear="all">
   
	<div class="widget overview">
	  <div class="widget_header">Quick Links</div>
	  <div class="widget_body">
	  
		<div class="widget_row" style="width:50%">
		<div class="icon"><span class="glyphicon glyphicon-envelope"></span></div>
		<div class="row_text"><a href="/my-messages/?filter=unread">Unread Messages(<?php echo $unread_messages;?>)</a></div>
		</div>

		<div class="widget_row" style="width:50%">
		<div class="icon"><span class="glyphicon glyphicon-inbox"></span>
		</div>
		<div class="row_text"><a href="/my-messages/">Inbox</a></div>
		</div>
	
	
		<div class="widget_row" style="width:50%"><div class="icon"><span class="glyphicon glyphicon-list-alt"></span></div>
		<div class="row_text"><a href="/my-listing/">View Listing</a></div></div>
				
		<div class="widget_row" style="width:50%"><div class="icon"><span class="glyphicon glyphicon-plus"></span></div>
		<div class="row_text"><a href="/add-new-listing/">Add New Listing</a></div></div>	
		
		<div class="widget_row" style="width:50%"><div class="icon"><span class="glyphicon glyphicon-user"></span></div>
		<div class="row_text"><a href="/profile/?u=<?php echo $username;?>">View Profile</a></div></div>

		<div class="widget_row" style="width:50%"><div class="icon"><span class="glyphicon glyphicon-edit"></span></div>
		<div class="row_text"><a href="/edit-profile/">Edit Profile</a></div></div>
		
	 </div>  
	</div>
</div>

<div class="dashboard_right">

	<div class="widget activity listing">
	  <div class="widget_header">Recently added listing   
	  &nbsp;&nbsp;<a href="/add-new-listing/" class="widget_add">Add</a>
	  <a href="/my-listing/" class="widget_add">View All</a>
	 
	 </div>
	  <div class="widget_body">
			   <?php 
			  if(count($listingArr)>0){
			   foreach($listingArr as $data){
				   if($data["id"]==""){break;}
				   ?>
					 <div class="listing_main_row">  
					   <div class="listing_image">
						<a href="/edit-listing/?id=<?php echo $data["id"];?>"><img 
						src="<?php if(!empty($data["listing_image"])){echo UPLOAD_URL."/listing/".$data["listing_image"];}
						else{echo UPLOAD_URL."/category/".$data["cat_image"];}?>"></a>

					   </div>
					   <div class="listing_text">
							  <div class="listing_row_title">
							    <a title="<?php echo $data["catname"];?> - <?php echo $data["subcatname"];?> - <?php echo $data["specific_variety"];?>" alt="<?php echo $data["catname"];?> - <?php echo $data["subcatname"];?> - <?php echo $data["specific_variety"];?>" class="listing_row_title" style="" href="/edit-listing/?id=<?php echo $data["id"];?>"><?php echo $data["catname"];?> - <?php echo $data["subcatname"];?> - <?php echo $data["specific_variety"];?></a>  
								  <span style="float:left">
								  <?php if($data["period_availability_limit"]>0){echo ucfirst($data["status"]);}else{echo '<span style="float:left">Listing has expired -  </span>  <a style="width:auto;float:left;" onClick="relist()" href="/edit-listing/?id='.$data["id"].'&relist=1#relist">Re-list</a>';}?>
								  </span>
								  <span> 
								  <?php echo $data["currency"];?> <?php echo $data["price_per_item"];?> / <?php echo $data["quantity_unit"];?>
								  </span>
							  </div>
					     </div>
		
					</div>	
				<?php }
			  }else{
				  if(empty($msg)){echo "You have no listing yet.";}
			  }?>
		</div>  
	</div>

<?php if($isProAccount==1){?>			
	<div class="widget activity growing_space" style="display:none !important;">
	  <div class="widget_header">Recently added Growing Space 
	  <a href="/add-new-growing-space/" class="widget_add">Add</a>
	  <a href="/my-growing-space/" class="widget_add">View All</a></div>
	  <div class="widget_body">
			   <?php 
			  if(count($growingSpaceListingArr)>0){
			   foreach($growingSpaceListingArr as $data){?>
					 <div class="listing_main_row">  
					   <div class="listing_image">
						<a href="/my-growing-space/?eid=<?php echo $data["id"];?>"><img 
						src="<?php if(!empty($data["listing_image"])){echo UPLOAD_URL."/growing_space/".$data["listing_image"];}
						else{echo UPLOAD_URL."/category/".$data["cat_image"];}?>"></a>

					   </div>
					   <div class="listing_text">
							  <div class="listing_row_title">
							   <a href="/my-growing-space/?eid=<?php echo $data["id"];?>"><?php echo $data["address1"];?>, <?php echo $data["city"];?>, <?php echo $data["state"];?> <?php echo $data["zip"];?>, <?php echo $data["country"];?></a> - 
								  <span> 
								  <?php echo $data["growing_space_style"];?> <?php echo $data["growing_space_size"];?> <?php echo $data["growing_space_size_unit"];?>
								  </span>
							  </div>
					     </div>
		
					</div>	
				<?php }
			  }else{
				  if(empty($msg)){echo "You have no growing space listing yet.";}
			  }?>
		</div>  
	</div>
	
	
	<div class="widget activity events_workshop">
	  <div class="widget_header">Recently added Events/Workshops 
	  <a href="/add-new-event-workshop/" class="widget_add">Add</a>
	  <a href="/my-events-workshop/" class="widget_add">View All</a>
	  </div>
	  <div class="widget_body">
			   <?php 
			  if(count($eventWorkshopListingArr)>0){
			   foreach($eventWorkshopListingArr as $data2){?>
					 <div class="listing_main_row">  
					   <div class="listing_image">
						<a href="/my-events-workshop/?eid=<?php echo $data2["id"];?>"><img 
						src="<?php if(!empty($data2["listing_image"])){echo UPLOAD_URL."/event_workshop/".$data2["listing_image"];}
						else{echo UPLOAD_URL."/category/".$data2["cat_image"];}?>"></a>

					   </div>
					   <div class="listing_text">
							  <div class="listing_row_title">
							    <a  class="listing_row_title" href="/my-events-workshop/?eid=<?php echo $data2["id"];?>" alt="<?php echo $data2["event_seminar_title"];?>" title="<?php echo $data2["event_seminar_title"];?>" ><?php echo $data2["event_seminar_title"];?></a><br clear="all">
								  <span> 
								  <?php echo $data2["date_time"];?>
								  </span>
							  </div>
					     </div>
		
					</div>	
				<?php }
			  }else{
				  if(empty($msg)){echo "You have no events/workshop listing yet.";}
			  }?>
		</div>  
	</div>
<?php } ?>	

	
</div><!--//end dashboard_right-->
	
</div>



<?php echo $footer_block; ?>