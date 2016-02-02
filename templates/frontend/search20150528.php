<?php echo $header_block;?>
	
<?php
 $zoomGoogle=13;
//print_r($listingArr);

$totalRetrievedRec=$listingArr[0]["total_rows"];
$recordPerPage=$listingArr[0]["recordPerPage"];

?>
  		
  		<div class="main_wrap_pad">
		 	
              <div class="search_listing_left">
			  <?php if(empty($_GET['user'])){?>
			  Search Result for 
			  <?php }else{?>
			  <?php echo ucfirst($_GET['user']);?> Listings
			  <?php } ?>
			  <b><?php if(!empty($_GET['category'])){ echo "  ".str_replace("-"," ",ucfirst($_GET['category']));}?>
			  <?php if(!empty($_GET['produce'])){ echo " / ".ucfirst($_GET['produce']);}?>
			  <?php if(!empty($_GET['location'])){ echo " in ".ucfirst($_GET['location']);}?></b>
			  
			  : <?php echo $totalRetrievedRec; 
			  $resultCount = count($listingArr);?>
			  <?php echo $msg;?>
			 <?php echo $data["subcatname"];?> - <?php echo $data["specific_variety"];?>
			   <?php
			 	$cntItems=0;
		  if(count($listingArr)>0){	
			   foreach($listingArr as $data){$cntItems++;
			   
			           $infoDetails=""; //reset value
					   $link="/view-details/?id=".($data["id"]+159303);
					   //if(!empty($data["farm_name"])){
						   $infoDetails="<a href=\'".$link."\'><b>".$data["subcatname"]." - ".$data["specific_variety"]."</b></a>";
						  // $infoDetails.="".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."";
						   //}
						 
					//   else{$infoDetails="<a href=\'".$link."\'><b>".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."</b></a>";}
					   
				  	   $coords.=",['<div class=\'map_info_window\'>".$infoDetails."</div>', ".$data["lat"].", ".$data["lng"]."]";	
					   
								$additionalMap.="|".$data["lat"].",".$data["lng"].",lightblue".($cntLoop+1);
								$toGoogleLink = "https://www.google.com/maps/preview?q=".$data["lat"].",".$data["lng"]."";
				   
				   ?>
					 <div class="listing_main_row">  
					   <div class="listing_image">
						  <a href="/view-details/?id=<?php echo ($data["id"]+159303);?>"><img 
		src="<?php if(!empty($data["listing_image"])){echo UPLOAD_URL."/listing/".$data["listing_image"];}
		else{echo UPLOAD_URL."/category/".$data["cat_image"];}?>"></a>
		  
					   </div>
					   <div class="loop_count"><?php echo $cntItems;?></div>
					   <div class="listing_text" onMouseOut="slideUp('list<?php echo $data["id"];?>')" onMouseOver="slideDown('list<?php echo $data["id"];?>')" id="list<?php echo $data["id"];?>">
							  <div class="listing_row_title">
							       <a href="/view-details/?id=<?php echo ($data["id"]+159303);?>"><?php echo $data["subcatname"];?> - <?php echo $data["specific_variety"];?></a>
								  		  <?php  //if(!empty($_GET['location'])){ echo " - Distance: ".$data["kldistace"];  } ?>
								  
								  <span> 
								  <?php echo $data["currency"];?> <?php echo $data["price_per_item"];?> / <?php echo $data["quantity_number"];?> <?php echo $data["quantity_unit"];?>
								  &nbsp;&bull;&nbsp;<?php  echo "".$data["kldistace"].""; ?>
								  </span>
							  </div>
							  <div class="listing_row_subtitle">
							      <b>
								  <?php if(!empty($data["is_certified_organic"])){echo "&bull;&nbsp;&nbsp;".$data["is_certified_organic"]."&nbsp;&nbsp;";}?>
								  <?php if(!empty($data["is_organic_not_certified"])){echo "&bull;&nbsp;&nbsp;".$data["is_organic_not_certified"]."&nbsp;&nbsp;";}?>
								  <?php if(!empty($data["is_not_organic"])){echo "&bull;&nbsp;&nbsp;".$data["is_not_organic"]."&nbsp;&nbsp;";}?>
								  <?php if(!empty($data["is_free"])){echo "&bull;&nbsp;&nbsp;".$data["is_free"]."&nbsp;&nbsp;";}?>
								  <?php if(!empty($data["is_accept_trades"])){echo "&bull;&nbsp;&nbsp;".$data["is_accept_trades"]."&nbsp;&nbsp;";}?>
								  </b>
								 <br clear="all"><br>
								 <b>Location:</b> <?php echo $data["address1"];?>, <?php echo $data["city"];?>,<?php echo $data["state"];?>, <?php echo $data["country"];?><br clear="all"><br>
								 <b>Collection/Delivery:</b><br>						
									<?php if(!empty($data["pick_up_farm_stand_shop"])){?>&nbsp;<span class="check_text">- Pick up farm stand shop (<?php echo $data["pick_up_farm_stand_shop_timefrom"]." - ".$data["pick_up_farm_stand_shop_timeuntil"];?>)</span><br clear="all"><?php } ?>
									<?php if(!empty($data["pick_up_at_property"])){ ?>&nbsp;<span class="check_text">- Pick up at property (<?php echo $data["pick_up_at_property_timefrom"]." - ".$data["pick_up_at_property_timeuntil"];?>)</span><br clear="all"><?php } ?>
									<?php if(!empty($data["delivery_contact_producer"])){?>&nbsp;<span class="check_text">- Delivery contact producer</span><br clear="all"><?php } ?>
									<?php if(!empty($data["u_pick"])){?>&nbsp;<span class="check_text">- U Pick</span><br clear="all"><?php } ?>
									<?php if(!empty($data["contact_producer"])){?>&nbsp;<span class="check_text"><span>- Contact Producer&nbsp;</span><a href="/view-details/?id=<?php echo ($data["id"]+159303);?>#bform"><span class="glyphicon glyphicon-envelope"></span></a></span><br clear="all"><?php } ?>
 									<?php if(!empty($data["farmers_market"])){?>&nbsp;<span class="check_text">- At farmers market: <?php echo ucfirst($data["farmers_market_name"]);?> (<?php echo strtolower($data["farmers_market_time_day"]);?>, <?php echo $data["farmers_market_time_from"]." to ".$data["farmers_market_time_until"];?>)</span><br clear="all"><?php } ?>

								  
								  <?php // if(!empty($data["additional_notes"])){echo "<br clear='all'><br><b>Additional Notes: </b>".substr($data["additional_notes"],0,100).'...<br clear="all"><br>';}?>
								
									 
								
							  </div>
						
					     </div>
				
					</div>
			 
			  
		<?php      }
		
		  }else {echo "<br><b>No record found</b><br>";} 
				if(count($listingArr)<2){$coords="";}
				 $linkAll="?category=".$_GET['category']."&produce=".$_GET['produce']."&location=".$_GET['location']; //add all link variables
				?>
				<div class="pagination">
				<?php if($_GET['page']>1){?>
				 <a href="<?php echo $linkAll."&page=".($_GET['page']-1);?>">Previous</a>&nbsp;
				<?php }?>
				 <?php 
				   @$pageCount=($totalRetrievedRec/$recordPerPage);
				     
				    for($pageLoop=1;($pageCount+1)>$pageLoop;$pageLoop++){
					   $link=$linkAll."&page=".$pageLoop;
					   if($_GET['page']==$pageLoop){$currentPage="current";}
					     else{$currentPage="";
					     if($_GET['page']=="" AND $pageLoop==1){$currentPage="current";}
					   }
					   
					   echo "<a class='".$currentPage."' href='".$link."'>".$pageLoop."</a>&nbsp;";   
					   $link="";
				    }
				 ?>
				 
			  <?php if($_GET['page']<$pageCount AND $pageCount>1){?>
				<a href="<?php echo $linkAll;?>&page=<?php if(!empty($_GET['page'])){echo ($_GET['page']+1);}else{echo "2";}?>">Next</a>&nbsp;
				<?php }?>
				</div>
				
			  </div>			
  			  <div class="search_listing_right">
			     <?php if($resultCount>0){?>
 				 <div id="mapall" class="mappreview_all">
					Loading map...
					</div>
				 <?php }?>
			  </div>		
  		</div>
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>	
    			<script type="text/javascript">
			
			
				$(document).ready(function () {
					// Define the latitude and longitude positions
					var latitude = parseFloat("<?php echo $data["lat"];?>");
					var longitude = parseFloat("<?php echo $data["lng"];?>");
					var latlngPos = new google.maps.LatLng(latitude, longitude);
                                        var bounds = new google.maps.LatLngBounds();
					// Set up options for the Google map
					var myOptions = {
						zoom: <?php echo $zoomGoogle;?>,
						center: latlngPos,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					
				map = new google.maps.Map(document.getElementById("mapall"), myOptions);
								
		<?php if(empty($coords)){?>			
					// Define the map
					
					// Add the marker
					var marker = new google.maps.Marker({
						position: latlngPos,
						url: '<?php echo $toGoogleLink;?>',
						map: map,
						icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=1|4cbb17|000000',
						title: " <?php echo $data["address1"];?>, <?php echo $data["city"];?>, <?php echo $data["state"];?>"
					});
					
					
					 var contentString = '<div id="map_info_window">'+
										 '<?php echo $infoDetails;?></div>';

					  var infowindow = new google.maps.InfoWindow({
						  content: contentString
					  });
					
					  google.maps.event.addListener(marker, 'click', function() {
						infowindow.open(map,marker);
					  });

						
					
		
		<?php }else{ //no need for this if one listing only ?>
					var coords = [
						<?php echo substr($coords,1,5000);?>
						// and additional coordinates, just add a new item
					];
					var iconNumber = "";
					// iterate over your coords array
					
					var infowindow = new google.maps.InfoWindow();
					
					for (var i = 0; i < coords.length; i++) {
						var iconNumber = (Math.round(i)+Math.round(1));
						// create a closure for your latitude/longitude pair
						(function(coord) {
							// set the location...
							var latLng = new google.maps.LatLng(coord[1], coord[2]);bounds.extend(latLng);
							// ...and add the Marker to your map
							var marker = new google.maps.Marker({
								position: latLng,
								icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+iconNumber+'|4cbb17|000000',
								title: coord[0],
								map: map
							}); 
							
							
							      google.maps.event.addListener(marker, 'click', (function(marker, i) {
										return function() {
										  infowindow.setContent(coord[0]);
										  infowindow.open(map, marker);
										}
									  })(marker, i));
									  
							bounds.extend(latLng);
						})(coords[i]);  
					};
		
            map.fitBounds(bounds);
            map.panToBounds(bounds);
            map.setCenter(bounds.getCenter());
		<?php } ?>
});
			</script>		
  	

<?php echo $footer_block; ?>