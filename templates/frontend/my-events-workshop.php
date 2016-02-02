<?php echo $header_block;?>

  		
  		<div class="main_wrap_pad">
		 	
              <div class="my_listing_left">
			  <?php echo $msg;?>
			 
			   <?php 
			  if(count($growingSpaceListingArr)>0){
			   foreach($growingSpaceListingArr as $data){?>
					 <div class="listing_main_row">  
					   <div class="listing_image">
						<a href="/my-events-workshop/?eid=<?php echo $data["id"];?>"><img 
						src="<?php if(!empty($data["listing_image"])){echo UPLOAD_URL."/event_workshop/".$data["listing_image"];}
						else{echo UPLOAD_URL."/category/".$data["cat_image"];}?>"></a>

					   </div>
					   <div class="listing_text">
							  <div class="listing_row_title">
							      <?php echo $data["address1"];?>, <?php echo $data["city"];?>, <?php echo $data["state"];?> <?php echo $data["zip"];?>, <?php echo $data["country"];?><br> 
								  <span> 
								  <?php echo $data["growing_space_style"];?> <?php echo $data["growing_space_size"];?> <?php echo $data["growing_space_size_unit"];?>
								  </span>
							  </div>
							  <div class="listing_row_subtitle"><br>
							    <!--  <?php echo $data["growing_space_size_unit"];?>
								  <?php echo $data["electricity_provided"];?>
								  <?php echo $data["electricity_available_at_cost"];?>
								  <?php echo $data["gas_provided"];?>
								  <?php echo $data["gas_provided_at_cost"];?>
								  <?php echo $data["water_provided"];?>
								  <?php echo $data["water_provided_cost"];?>
								  <?php echo $data["other"];?> -->
							  </div>
						
					     </div>
						<div class="listing_options">
					
							<span class="glyphicon glyphicon-pencil" onClick="location.href='/my-events-workshop/?eid=<?php echo $data["id"];?>';"></span><br>
							<span class="glyphicon glyphicon-trash" onClick="confirmDelete('/my-events-workshop/?did=<?php echo $data["id"];?>')"></span>
						</div>
					</div>	
				<?php }
			  }else{
				  if(empty($msg)){echo "You have no Events/Workshop listing yet.";}
				  }?>
			  </div>			
  			  <div class="my_listing_right">
			      <a href="/add-new-event-workshop/">Add New</a><br clear="all">
			  </div>		
  		</div>
		
		
  	

<?php echo $footer_block; ?>