<?php
 $zoomGoogle=13;
 $fakeid="159303";
 ?>
<div id="search_listing_left" class="search_listing_left">
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
		   $latlongArray=array();
		   $loopCount=0;
			   foreach($listingArr as $data){$cntItems++;
			   
			   if($_GET['page']!=""){ 
				      if($cntItems<=($recordPerPage*($_GET['page']-1))){continue;}   
			   }
			    
				
			    $latlong=$data["lat"].", ".$data["lng"];
			   /*if(!in_array($latlong,$latlongArray)){
				    $latlongArray[]=$latlong;
				}else{
					$randCount=rand(2,4);
					$ranAdd="0.00000".$randCount.$loopCount; 
					$latlong=($data["lat"]+$ranAdd).", ".$data["lng"];
					$latlongArray[]=$latlong;
					$loopCount++;
				}
                  */
	
			 //  $latlongArray[]=
					$infoDetails=""; //reset value
				    if($data["listing_type"]=="produce"){	
						$link="/view-details/?id=".($data["id"]+$fakeid);
						$infoDetails="<a href=\"".$link."\"><b>".$data["subcatname"]." - ".$data["specific_variety"]."</b></a>";
						$coords.=",['<div class=\'map_info_window\'>".$infoDetails."</div>', ".$latlong.", '".$data["listing_type"]."','$cntItems']";	  
					}elseif($data["listing_type"]=="growing_space"){
						$link="/growing-space-details/?id=".($data["id"]+$fakeid);
						if(!empty($data["farm_name"])){
						$infoDetails="<a href=\"".$link."\"><b>".$data["farm_name"]."</b></a><br>";
						$infoDetails.="".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."";}
						else{$infoDetails="<a href=\"".$link."\"><b>".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."</b></a>";}
						$coords.=",['<div class=\'map_info_window\'>".$infoDetails."</div>', ".$latlong.", '".$data["listing_type"]."','$cntItems']";								
					}else{
						$link="/profile/?u=".$data["username"];
						if(!empty($data["organization_name"])){
						$infoDetails="<a href=\"".$link."\"><b>".str_replace("'","&#39;",$data["organization_name"])."</b></a><br>";
						$infoDetails.="".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."";}
						else{$infoDetails="<a href=\"".$link."\"><b>".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."</b></a>";}
						$coords.=",\n['<div class=\'map_info_window\'>".str_replace("'","&#39;",$infoDetails)."</div>', ".$latlong.", '".$data["listing_type"]."','$cntItems']";	
					}
					
					$additionalMap.="|".$data["lat"].",".$data["lng"].",lightblue".($cntLoop+1);
					$toGoogleLink = "https://www.google.com/maps/preview?q=".$data["lat"].",".$data["lng"]."";
				   
				   ?>
				   
			<?php if($data["listing_type"]=="produce"){ ?>	   
					 <div class="listing_main_row">  
					   <div class="listing_image">
						  <a href="/view-details/?id=<?php echo ($data["id"]+$fakeid);?>"><img 
		src="<?php if(!empty($data["listing_image"])){echo UPLOAD_URL."/listing/".$data["listing_image"];}
		else{echo UPLOAD_URL."/category/".$data["cat_image"];}?>"></a>
		  
					   </div>
					   <div class="loop_count produce"><?php echo $cntItems;?></div>
					   <div class="listing_text" onMouseOut="slideUp('list<?php echo $data["id"];?>')" onMouseOver="slideDown('list<?php echo $data["id"];?>')" id="list<?php echo $data["id"];?>">
							  <div class="listing_row_title">
							       <a href="/view-details/?id=<?php echo ($data["id"]+$fakeid);?>"><?php echo $data["subcatname"];?> - <?php echo $data["specific_variety"];?></a>
								  		  <?php  //if(!empty($_GET['location'])){ echo " - Distance: ".$data["kldistace"];  } ?>
								  
								  <span> 
								  <?php echo $data["currency"];?> <?php echo $data["price_per_item"];?> / <?php echo $data["quantity_number"];?> <?php echo $data["quantity_unit"];?>
								  &nbsp;&bull;&nbsp;<?php  echo "".$data["kldistace"]."km"; ?>
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
									<?php if(!empty($data["contact_producer"])){?>&nbsp;<span class="check_text"><span>- Contact Producer&nbsp;</span><a href="/view-details/?id=<?php echo ($data["id"]+$fakeid);?>#bform"><span class="glyphicon glyphicon-envelope"></span></a></span><br clear="all"><?php } ?>
 									<?php if(!empty($data["farmers_market"])){?>&nbsp;<span class="check_text">- At farmers market: <?php echo ucfirst($data["farmers_market_name"]);?> (<?php echo strtolower($data["farmers_market_time_day"]);?>, <?php echo $data["farmers_market_time_from"]." to ".$data["farmers_market_time_until"];?>)</span><br clear="all"><?php } ?>

								  
								  <?php // if(!empty($data["additional_notes"])){echo "<br clear='all'><br><b>Additional Notes: </b>".substr($data["additional_notes"],0,100).'...<br clear="all"><br>';}?>
								
									 
								
							  </div>
						
					     </div>
				
					</div>
			<?php } ?>	 
        <?php if($data["listing_type"]=="workshops"){ ?>			    
										 <div class="listing_main_row ">  
					   <div class="listing_image">
						<a href="/events-workshops/?id=<?php echo ($data["id"]+159303);//+159303?>"><img 
		src="<?php if(!empty($data["listing_image"])){echo UPLOAD_URL."/event_workshop/".$data["listing_image"];}
		else{echo UPLOAD_URL."/event_workshop/no_image.png";}?>"></a>
					   </div>
					   <div class="loop_count growing_space"><?php echo $cntItems;?></div>
					   <div class="listing_text" onMouseOut="slideUp('list<?php echo $data["id"];?>')" onMouseOver="slideDown('list<?php echo $data["id"];?>')" id="list<?php echo $data["id"];?>">
							  <div class="listing_row_title workshop">
							       <a href="/events-workshops/?id=<?php echo ($data["id"]+159303);//+159303?>"><?php echo $data["event_seminar_title"];?></a>
							  
							  	 <span> 
								 <?php  if(!empty($data["kldistace"])){echo "".$data["kldistace"]."km";} ?>
								  </span>
							  </div>
							

							
							  <div class="listing_row_subtitle">
							  	<span> 
								 <b>Date / Time / Duration&nbsp;:&nbsp;</b><?php echo $data["date_time"];?><br>
								  <?php if(!empty($data["introduction"])){echo substr($data["introduction"],0,100)."..";}?>
								  </span>
								
								  
								  <br clear="all">
								  <b>Venue:</b>  <?php echo $data["address1"];?>, <?php echo $data["city"];?>,<?php echo $data["state"];?>, <?php echo $data["country"];?><br clear="all">
								  <?php echo $data["pick_up_at_property"];?> <?php echo $data["pick_up_at_property_timefrom"];?> <?php echo $data["pick_up_at_property_timeuntil"];?><br clear="all"><br>
								  
							  </div>
					     </div>
				    </div>
		<?php } ?>			
	
        <?php if($data["listing_type"]=="organization"){ ?>	
			 <div class="listing_main_row">  
					   <div class="listing_image">
						  <a href="/profile/?u=<?php echo $data["username"];?>"><img 
		src="<?php if(!empty($data["avatar"])){echo UPLOAD_URL."/avatar/".$data["avatar"];}
		else{echo UPLOAD_URL."/event_workshop/no_image.png";}?>"></a>
					   </div>
					   <div class="loop_count organization"><?php echo $cntItems;?></div>
					   <div class="listing_text" onMouseOut="slideUp('list<?php echo $data["id"];?>')" onMouseOver="slideDown('list<?php echo $data["id"];?>')" id="list<?php echo $data["id"];?>">
							  <div class="listing_row_title">
							       <a href="/profile/?u=<?php echo $data["username"];?>"><?php echo $data["organization_name"];?></a>
							  
							   <?php if(!empty($_GET['location'])){?><span> 
								  <?php  echo "".$data["kldistace"]."km"; ?>
							   </span><?php } ?>
							  </div>
							

							
							  <div class="listing_row_subtitle">
							  	  <span> 
								  <?php echo $data["address1"];?>, <?php echo $data["city"];?>, <?php echo $data["state"];?> <?php echo $data["zip"];?>, <?php echo $data["country"];?>
								  </span><br>
								 <br clear="all">
								  <b>Offering:</b><br>
								<?php
								if(is_array($data["offerArr"])){
								 foreach($data["offerArr"] as $offers){?>
										&bull;&nbsp;<?php echo $offers;?><br>	
								<?php } 
								}
								?>
								  
								  <br clear="all"><br>
								  <b>About:</b><br><?php echo substr($data["description"],0,200)."...";?>

							  </div>
						
					     </div>
				
					</div>
        <?php } ?>	 	
		
		<?php   
           		
            if($cntItems==$recordPerPage AND $_GET['page']==""){break;}
			else{
			    if($cntItems==($recordPerPage*$_GET['page'])){break;}
			}
		}
		
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
				
			  </div>	<?php  echo '<!-- latlongArray '; print_r($latlongArray); echo "-->";		?>		
 
			  <div class="search_listing_right" id="search_listing_right">
			    <iframe frameborder="0" src="<?php echo SITE_URL."/mapiframe.php?category=".$_GET['category']."&produce=".$_GET['produce']."&location=".$_GET['location']."";?>" style="width:100%;height:100%;"></iframe>
 			  </div>		
  		

