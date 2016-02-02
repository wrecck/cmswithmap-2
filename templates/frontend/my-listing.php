<?php echo $header_block;?>

  		
  		<div class="main_wrap_pad">
		 	
              <div class="my_listing_left">
			  <?php echo $msg;?>
			 
			   <?php 
			  if(count($listingArr)>0){
			   foreach($listingArr as $data){?>
					 <div class="listing_main_row">  
					   <div class="listing_image">
						<a href="/edit-listing/?id=<?php echo $data["id"];?>"><img 
						src="<?php if(!empty($data["listing_image"])){echo UPLOAD_URL."/listing/".$data["listing_image"];}
						else{echo UPLOAD_URL."/category/".$data["cat_image"];}?>"></a>

					   </div>
					   <div class="listing_text">
							  <div class="listing_row_title">
							      <?php echo  $data["catname"];?> - <?php echo $data["subcatname"];?> - <?php echo $data["specific_variety"];?><br>
								  <span style="float:left">
								  <?php if($data["period_availability_limit"]>0){echo ucfirst($data["status"]);}else{echo '<span style="float:left">Listing has expired -  </span>  <a style="width:auto;float:left;" onClick="relist()" href="/edit-listing/?id='.$data["id"].'&relist=1#relist">Re-list</a>';}?>
								  </span>
								  <span> 
								  <?php echo $data["currency"];?> <?php echo $data["price_per_item"];?> / <?php echo $data["quantity_unit"];?>
								  </span>
							  </div>
							  <div class="listing_row_subtitle">
							      <?php echo $data["is_certified_organic"];?>
								  <?php echo $data["is_organic_not_certified"];?>
								  <?php echo $data["is_not_organic"];?>
								  <?php echo $data["is_free"];?>
								  <?php echo $data["is_accept_trades"];?>
							  </div>
						
					     </div>
						<div class="listing_options">
							<span class="glyphicon glyphicon-pencil" onClick="location.href='/edit-listing/?id=<?php echo $data["id"];?>';"></span><br>
							<span class="glyphicon glyphicon-trash" onClick="confirmDelete('/my-listing/?did=<?php echo $data["id"];?>')"></span>
						</div>
					</div>	
				<?php }
			  }else{
				  if(empty($msg)){echo "You have no listing yet.";}
				  }?>
			  </div>			
  			  <div class="my_listing_right">
			      <a href="/add-new-listing/">Add New Listing</a><br clear="all">
			  </div>		
  		</div>
		
		
  	

<?php echo $footer_block; ?>