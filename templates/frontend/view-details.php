<?php echo $header_block; ?>
<?php
//print_r($data);
?>
<div class="main_wrap_pad">
<h1><?php echo $produceCategory;?> <?php if(!empty($data["specific_variety"])){echo " - ".$data["specific_variety"];}?><?php //echo ucfirst($data["farm_name"]);?><br>

<span style=" font-size:25px;"><?php //echo $data["address1"].", ".$data["city"].", ".$data["state"];?></span></h1>
<span class="message"><?php echo $message;?></span>


	
<div class="add_new_listing_left">
<?php if($noimage!=1){?>
<img alt="<?php echo $produceCategory;?> <?php if(!empty($data["specific_variety"])){echo " - ".$data["specific_variety"];}?> profile photo" width="100%" src="<?php echo UPLOAD_URL."/listing/".$data["listing_image"];?>">
<br clear="all">
<?php } ?>
	<br><b>Produce Location</b>
	<?php /*<br>First Name: <?php echo $data["fname"];?>
	<br>Last Name: <?php echo $data["lname"];?>
	<br>Email: <?php echo $data["email"];?>
	<br>Phone: <?php echo $data["phone"];?> */?>
	<?php if(!empty($data["farm_name"])){?><br><span class="labeler">Farm Name/House Name:</span> <?php echo $data["farm_name"];?><?php } ?>
	<?php if(!empty($data["address1"])){?><br><span class="labeler">Address:</span> <?php echo $data["address1"];?><?php } ?>
	<?php if(!empty($data["city"])){?><br><span class="labeler">Town/City:</span> <?php echo $data["city"];?><?php } ?>
	<?php if(!empty($data["state"])){?><br><span class="labeler">State:</span> <?php echo $data["state"];?><?php } ?>
	<?php if(!empty($data["zip"])){?><br><span class="labeler">Zip:</span> <?php echo $data["zip"];?><?php } ?>
	<?php if(!empty($country)){?><br><span class="labeler">Country:</span> <?php echo $country;?><?php } ?>
	
	<hr>		
	
 	<div class="payment_details">
	 <b>Payment Details</b><br>
		 <?php if(!empty($data["payment_cash_exact_change"])){ ?>
		&nbsp;<span class="check_text">Cash(exact change only)</span><br clear="all">
		 <?php }?>

		<?php if(!empty($data["payment_cash_change_available"])){ ?> 
		&nbsp;<span class="check_text">Cash(change available)</span><br clear="all">
	     <?php }?>
		 
		 <?php if(!empty($data["payment_cheque"])){ ?> 
		&nbsp;<span class="check_text">Cheque</span><br clear="all">
         <?php }?>
		 
		 <?php if(!empty($data["payment_credit_card"])){ ?> 
		&nbsp;<span class="check_text">Credit Card</span><br clear="all">
	    <?php }?>
		
	 <?php if(!empty($data["payment_debit_card"])){ ?>  
		&nbsp;<span class="check_text">Debit Card</span><br clear="all">
	  <?php }?>
	  
	  <?php if(!empty($data["payment_online"])){ ?>  
		&nbsp;<span class="check_text">Online Payment(Contact Producer or see website)</span><br clear="all">
		<?php }?>
		
      <?php if(!empty($data["payment_other"])){ ?> 
		 <?php echo $data["payment_provide_details"];?>
      <?php }?>
	 </div>		
		
	<hr>
<b>Produce Details</b><br>
<span class="labeler">Category:</span> <?php echo $produceCategory;?><br>
<span class="labeler">Produce:</span> <?php echo $produce;?><br>
<span class="labeler">Variety:</span> <?php echo $data["specific_variety"];?><br>
<span class="labeler">Price:</span> <?php echo $data["currency"];?><?php echo $data["price_per_item"];?> per <?php echo $data["quantity_number"];?> <?php echo $data["quantity_unit"];?><br>
<!--Period Availability: <?php echo $data["period_availability"];?><br>-->
<?php if(!empty($data["additional_notes"])){?><span class="labeler">Notes:</span> <?php echo $data["additional_notes"];?><br><?php } ?>
<br clear="all" id="bform">
<?php if(!empty($data["is_certified_organic"])){ echo " <span class='glyphicon glyphicon-ok'></span>&nbsp; ".$data["is_certified_organic"]."<br>";}?>
<?php if(!empty($data["is_organic_not_certified"])){ echo " <span class='glyphicon glyphicon-ok'></span>&nbsp; ".$data["is_organic_not_certified"]."<br>";}?>
<?php if(!empty($data["is_not_organic"])){ echo " <span class='glyphicon glyphicon-ok'></span>&nbsp; ".$data["is_not_organic"]."<br>";}?>
<?php if(!empty($data["is_free"])){ echo " <span class='glyphicon glyphicon-ok'></span>&nbsp; ".$data["is_free"]."<br>";}?>
<?php if(!empty($data["is_accept_trades"])){ echo " <span class='glyphicon glyphicon-ok'></span>&nbsp; ".$data["is_accept_trades"]."<br>";}?>

<br clear="all" >

	<?php if(!empty($data["contact_producer"])){?>
	<?php if($_GET['sent']==1){?><br>Message has been sent<br><?php } ?>
	<form action="?id=<?php echo $_GET['id'];?>&sent=1#message_form" id="message_form" method="post" <?php if($islogged==1){?> onsubmit="return validateMessages2();" <?php }else{?> onsubmit="return validateMessages();"<?php } ?>>
	<h3>Send Producer a Message</h3>
	<input type="hidden" name="subject" value="Produce Listing:<?php echo $produceCategory;?> - <?php echo $produce;?> - <?php echo $data["specific_variety"];?> / <?php echo $data["address1"];?>, <?php echo $data["city"];?>, <?php echo $data["state"];?>, <?php echo $country;?>">
	<?php if($islogged==1){?>
	<?php }else{ ?>
	<input class="form-control" type="text" name="fromemail" id="fromemail" value="" placeholder="Your Email">
    <?php } ?>	
	<span class="subject"><b>Subject:</b>&nbsp;<?php echo $produceCategory;?> - <?php echo $produce;?> - <?php echo $data["specific_variety"];?> / <?php echo $data["address1"];?>, <?php echo $data["city"];?>, <?php echo $data["state"];?>, <?php echo $country;?></span><br>
	<input type="hidden" name="listing_id" value="<?php echo $data["lid"];?>">
	<input type="hidden" name="message_type" value="produce">
	<input type="hidden" name="userid" value="<?php echo $data["userid"];?>">
	<input type="hidden" name="toemail" value="<?php echo $data["email"];?>">
	<textarea  style="height:150px;" class="form-control" placeholder="Your Message" class="message" name="message" id="message"></textarea>
	 <?php if($islogged!=1){?><input style="float:left" type="checkbox" name="sendcopy" value="1">&nbsp;<span style="float: left; font-size: 12px; margin-top: -4px; margin-left: 5px;">Send a copy of this email to myself.</span><br><?php } ?><br>
	<center>
	<input type="submit" style="margin-left:0px" value="Send Message" name="send_message" class="btn btn-tab btn-primary">
	</center>
	</form>
  <?php } ?>

  </div>   

<div class="add_new_listing_right">
		<div id="map" class="mappreview">
		Map Preview
		</div>
	<br clear="all"><br>	
	<div class="add_new_listing_right_left view_details"> 

		
	 <span style="float:left;font-weight:bold; width:100%">Collection/Delivery</span>
		<?php if(!empty($data["pick_up_farm_stand_shop"])){?>&nbsp;<span class="check_text">- Pick up farm stand shop (<?php echo $data["pick_up_farm_stand_shop_timefrom"]." - ".$data["pick_up_farm_stand_shop_timeuntil"];?>)</span><br clear="all"><?php } ?>
		<?php if(!empty($data["pick_up_at_property"])){ ?>&nbsp;<span class="check_text">- Pick up at property (<?php echo $data["pick_up_at_property_timefrom"]." - ".$data["pick_up_at_property_timeuntil"];?>)</span><br clear="all"><?php } ?>
		<?php if(!empty($data["delivery_contact_producer"])){?>&nbsp;<span class="check_text">- Delivery contact producer</span><br clear="all"><?php } ?>
		<?php if(!empty($data["u_pick"])){?>&nbsp;<span class="check_text">- U Pick</span><br clear="all"><?php } ?>
		<?php if(!empty($data["contact_producer"])){?>&nbsp;<span class="check_text"><span>- Contact Producer&nbsp;</span><a href="/view-details/?id=159329#bform"><span class="glyphicon glyphicon-envelope"></span></a></span><br clear="all"><?php } ?>



	
	</div> 
	


	<div class="add_new_listing_right_full">
	<?php if(!empty($data["farmers_market"])){?>
	   <span class="check_text"> <b>Farmers Market:</b> <?php echo ucfirst($data["farmers_market_name"]);?> (<?php echo strtolower($data["farmers_market_time_day"]);?>, <?php echo $data["farmers_market_time_from"];?> - <?php echo $data["farmers_market_time_until"];?>)<br>
	  </span>
	  <br clear="all"><br>
	<?php } ?>	
	
	
	<b>Listing information</b><br>
	Username: <a href="/profile/?u=<?php echo $posterData["username"];?>"><?php echo $posterData["username"];?></a><br>
	Join date: <?php  echo date("M d, Y",strtotime($posterData["date_added"]));?><br>
	<a href="/search/?uid=<?php echo $posterData["id"];?>&user=<?php echo $posterData["username"];?>">View <?php echo $posterData["username"];?> other listing</a>
	
	</div>
 </div>

<?php /*
<div class="add_new_listing_middle">
<b>Produce Details</b><br>
<span class="labeler">Category:</span> <?php echo $produceCategory;?><br>
<span class="labeler">Produce:</span> <?php echo $produce;?><br>
<span class="labeler">Variety:</span> <?php echo $data["specific_variety"];?><br>
<span class="labeler">Price:</span> <?php echo $data["currency"];?><?php echo $data["price_per_item"];?> per <?php echo $data["quantity_number"];?> <?php echo $data["quantity_unit"];?><br>
<!--Period Availability: <?php echo $data["period_availability"];?><br>-->
<span class="labeler">Notes:</span> <?php echo $data["additional_notes"];?><br>
<br clear="all">
<?php if(!empty($data["is_certified_organic"])){ echo " - ".$data["is_certified_organic"]."<br>";}?>
<?php if(!empty($data["is_organic_not_certified"])){ echo " - ".$data["is_organic_not_certified"]."<br>";}?>
<?php if(!empty($data["is_not_organic"])){ echo " - ".$data["is_not_organic"]."<br>";}?>
<?php if(!empty($data["is_free"])){ echo " - ".$data["is_free"]."<br>";}?>
<?php if(!empty($data["is_accept_trades"])){ echo " - ".$data["is_accept_trades"]."<br>";}?>

<br clear="all">
<?php if($islogged==1){?>
	<?php if(!empty($data["contact_producer"])){?>
	<?php if($_GET['sent']==1){?><br>Message has been sent<br><?php } ?>
	<form action="?id=<?php echo $_GET['id'];?>&sent=1#message_form" id="message_form" method="post" onsubmit="return validateMessages();">
	<b>Send Seller a Message</b><br>
	<input type="hidden" name="listing_id" value="<?php echo $data["lid"];?>">
	<input type="hidden" name="message_type" value="produce">
	<input type="hidden" name="userid" value="<?php echo $data["userid"];?>">
	<input type="hidden" name="toemail" value="<?php echo $data["email"];?>">
	<input type="hidden" name="subject" value="Produce Listing: <?php echo $data["address1"];?>, <?php echo $data["city"];?>, <?php echo $data["state"];?>, <?php echo $country;?>">
	<textarea class="message" name="message" id="message"></textarea>
	<br>
	<input type="submit" value="Send Message" name="send_message" class="btn btn-tab btn-primary">
	</form>
  <?php } ?>
<?php } ?>
</div>

<?php */?>
	<br clear="all">




</div>

   <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>
    <script type="text/javascript">


 function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(<?php echo $data["lat"];?>,  	<?php echo $data["lng"];?>);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").value = center.lat().toFixed(5);
        document.getElementById("lng").value = center.lng().toFixed(5);

	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("lat").value = point.lat().toFixed(5);
       document.getElementById("lng").value = point.lng().toFixed(5);

        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").value = center.lat().toFixed(5);
	   document.getElementById("lng").value = center.lng().toFixed(5);


	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("lat").value = point.lat().toFixed(5);
	     document.getElementById("lng").value = point.lng().toFixed(5);

        });
 
        });

      }
    }

	   function showAddressUpdate() {

	     var latlong=document.getElementById("lat").value+", "+ document.getElementById("lng").value;
	
	
			      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(document.getElementById("lat").value, document.getElementById("lng").value);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").value = center.lat().toFixed(5);
        document.getElementById("lng").value = center.lng().toFixed(5);

	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("lat").value = point.lat().toFixed(5);
       document.getElementById("lng").value = point.lng().toFixed(5);

        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").value = center.lat().toFixed(5);
	   document.getElementById("lng").value = center.lng().toFixed(5);


	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("lat").value = point.lat().toFixed(5);
	     document.getElementById("lng").value = point.lng().toFixed(5);

        });
 
        });

      }
	
       }    //
 
	
	
	
	   function showAddress() {
		   
			var tcountry = document.getElementById("country");
			var tcountry_selectedText = tcountry.options[tcountry.selectedIndex].text;
			var address=tcountry_selectedText;
			
			
			var tstate = document.getElementById("state").value;
			var tstate_selectedText = document.getElementById("state").value;//tstate.options[tstate.selectedIndex].text;
			
			if(tstate_selectedText!="Select State"){address=tstate_selectedText+", "+address;}
			
			//var tcity = document.getElementById("city");
			var tcity_selectedText = document.getElementById("city").value;//tcity.options[tcity.selectedIndex].text;
			
			if(tcity_selectedText!="Select City"){address=tcity_selectedText+", "+address;}
			//address=tcity_selectedText+", "+tstate_selectedText+", "+tcountry_selectedText;
		  
		//  alert(address);
		 //  document.getElementById('approximate_location').value=address;
	   var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
		  document.getElementById("lat").value = point.lat().toFixed(5);
	   document.getElementById("lng").value = point.lng().toFixed(5);
		 map.clearOverlays()

   var center = new GLatLng(<?php echo $data["lat"];?>,<?php echo $data["lng"];?>);
   map.setCenter(center, 15);
   
  // map.setCenter(point, 14);
 // var marker = new GMarker(point, {draggable: true}); 
    var marker = new GMarker(center, {draggable: true});  
   map.addOverlay(marker);
   
   GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
	     map.panTo(pt);
      document.getElementById("lat").value = pt.lat().toFixed(5);
	     document.getElementById("lng").value = pt.lng().toFixed(5);
        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").value = center.lat().toFixed(5);
	   document.getElementById("lng").value = center.lng().toFixed(5);

	 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
	    map.panTo(pt);
    document.getElementById("lat").value = pt.lat().toFixed(5);
	   document.getElementById("lng").value = pt.lng().toFixed(5);
        });
 
        });

            }
          }
        );
      }
    }    //
	
load();
setTimeout(function(){showAddress()}, 5000);
loadProduceSubCat(<?php echo $data["produce_category"];?>,<?php echo $data["produce"];?>);	
    </script>
	
<?php echo $footer_block;  ?>
