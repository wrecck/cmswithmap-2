<?php echo $header_block; ?>
<?php
//print_r($data);
?>
<div class="main_wrap_pad">
<h1>Edit Listing</h1>
<span class="message"><?php echo $message;?></span>

<form action="" onSubmit="return addNewListingFormSubmit();" id="addnewlisting" method="post" name="user" enctype="multipart/form-data">
	
<div class="add_new_listing_left">
	<input type="text" class="form-control half" placeholder="First Name" value="<?php echo $data["fname"];?>" name="first_name" id="first_name" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Last Name" value="<?php echo $data["lname"];?>" name="last_name" id="last_name" ><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Email" value="<?php echo $data["email"];?>" name="email" id="email" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Confirm Email" value="<?php echo $data["email"];?>" name="confirm_email" id="confirm_email"><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Phone" value="<?php echo $data["phone"];?>" name="phone" id="phone">
	<br clear="all">
	<input type="text" class="form-control half" placeholder="Farm Name/House Name" value="<?php echo $data["farm_name"];?>" name="farm_name" id="farm_name">
    <br clear="all">
	<input type="text" class="form-control full" placeholder="First Line of Address" value="<?php echo $data["address1"];?>" name="address1" id="address1"><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control full" placeholder="Second Line of Address" value="<?php echo $data["address2"];?>" name="address2" id="address2">
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Town/City" value="<?php echo $data["city"];?>" name="city" id="city"><span class="required">*</span>
	<input type="text" class="form-control half" onKeyUp="showAddress()"; placeholder="State" value="<?php echo $data["state"];?>" name="state" id="state"><span class="required">*</span>
		<select name="country" id="country" class="form-control half" onChange="showAddress();">
		   <option value="">Country</option>
		   <?php echo $countries;?>
		</select><span class="required">*</span>
<hr>		
  </div>   

<div class="add_new_listing_right">

	<div class="add_new_listing_right_left"> 
	 <b>Logistic Option</b><br clear="all"><br>
		<input type="checkbox" class="checkbox" value="Pick up farm stand shop" name="pick_up_farm_stand_shop" id="pick_up_farm_stand_shop" <?php if(!empty($data["pick_up_farm_stand_shop"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Pick up farm stand shop</span><br clear="all">
		<input type="checkbox" class="checkbox" value="Pick up at property" name="pick_up_at_property" id="pick_up_at_property" <?php if(!empty($data["pick_up_at_property"])){echo "checked";}?>>
		&nbsp;<span class="check_text">Pick up at property</span><br clear="all">
		<input type="checkbox" class="checkbox" value="Delivery contact producer" name="delivery_contact_producer" id="delivery_contact_producer" <?php if(!empty($data["delivery_contact_producer"])){echo "checked";}?>>
		&nbsp;<span class="check_text">Delivery contact producer</span><br clear="all">
		<input type="checkbox" class="checkbox" value="Contact Producer" name="contact_producer" id="contact_producer" <?php if(!empty($data["contact_producer"])){echo "checked";}?>>
		&nbsp;<span class="check_text">Contact Producer</span><br clear="all">
		<input type="checkbox" class="checkbox" value="1" name="u_pick" id="u_pick" <?php if(!empty($data["u_pick"])){echo "checked";}?>>
		&nbsp;<span class="check_text">U Pick</span><br clear="all">
		<input type="checkbox" class="checkbox"  value="1" name="farmers_market" id="farmers_market" <?php if(!empty($data["farmers_market"])){echo "checked";}?>>
		&nbsp;<span class="check_text">Farmers Market</span><br clear="all">		
	</div> 
	
	<div class="add_new_listing_right_right"> 
	 <b>Time</b><br clear="all"><br>
		<select class="form-control half" name="pick_up_farm_stand_shop_timefrom" id="pick_up_farm_stand_shop_timefrom">
		<option value="">Time From</option>
		<?php echo $pick_up_farm_stand_shop_timefrom;?>
		</select>
		
		<select class="form-control half"  name="pick_up_farm_stand_shop_timeuntil" id="pick_up_farm_stand_shop_timeuntil">
		<option value="">Time Until</option>
		<?php echo $pick_up_farm_stand_shop_timeuntil;?>
		</select><br clear="all">

		<select class="form-control half"name="pick_up_at_property_timefrom" id="pick_up_at_property_timefrom">
		<option value="">Time From</option>
		<?php echo $pick_up_at_property_timefrom;?>
		</select>
		
		<select class="form-control half"  name="pick_up_at_property_timeuntil" id="pick_up_at_property_timeuntil">
		<option value="">Time Until</option>
		<?php echo $pick_up_at_property_timeuntil;?>
		</select><br clear="all">
		
		
	</div> 

	<div class="add_new_listing_right_full">
	
	    <input type="text" class="form-control half" placeholder="Enter Name of Farmer's Market" value="<?php echo $data["farmers_market_name"];?>" name="farmers_market_name" id="farmers_market_name">
		<select style="width:80px;" class="form-control half"  name="market_day" id="farmers_market_time_day">
		<option value="">Day</option>
		<?php echo $farmers_market_time_day;?>
		</select><br clear="all">
		<select class="form-control half"name="farmers_market_time_from" id="farmers_market_time_from">
		<option value="">Time From</option>
		<?php echo $farmers_market_time_from;?>
		</select>
		<select class="form-control half"  name="farmers_market_time_until" id="farmers_market_time_until">
		<option value="">Time Until</option>
		<?php echo $farmers_market_time_until;?>
		</select><br clear="all">	
	
	</div>
 </div>
<div class="add_new_listing_middle">
   <h2>Produce Details</h2>

<select class="form-control threeforths" name="produce_category" id="produce_category" onChange="loadProduceSubCat(this.value)">
<option value="">Select Produce Category</option>
<?php echo $produceCategory;?>
</select><span class="required">*</span> 
 
<div id="produce_select" style="float:left;min-width:200px;"><select class="form-control full"  name="produce" id="produce">
<option value="">Select category first</option>
</select></div><span  style="margin-left:-15px;" class="required">*</span>

<input type="text" class="form-control threeforths" placeholder="Enter Variety(Optional)" value="<?php echo $data["specific_variety"];?>" name="specific_variety" id="specific_variety"><span class="required">*</span>
<br clear="all">
<div class="is_checkbox" style="">
	<input type="checkbox" <?php if(!empty($data["is_certified_organic"])){echo "checked";}?> class="checkbox" value="Certified Organic" name="is_certified_organic" id="is_certified_organic">&nbsp;<span class="check_text">Certified Organic</span>
	<input type="checkbox" <?php if(!empty($data["organic_not_certified"])){echo "checked";}?>  class="checkbox" value="Organic, Not Certified" name="organic_not_certified" id="organic_not_certified">&nbsp;<span class="check_text">Organic, Not Certified</span>
	<input type="checkbox" <?php if(!empty($data["is_not_organic"])){echo "checked";}?>  class="checkbox" value="Not Organic" name="is_not_organic" id="is_not_organic">&nbsp;<span class="check_text">Not Organic</span>
	<br clear="all">
	<input type="checkbox" <?php if(!empty($data["is_free"])){echo "checked";}?>  class="checkbox" value="Free" name="is_free" id="is_free">&nbsp;<span class="check_text">Free</span>
	<input type="checkbox" <?php if(!empty($data["is_accept_trades"])){echo "checked";}?>  class="checkbox" value="Accept Trades" name="is_accept_trades" id="is_accept_trades">&nbsp;<span class="check_text">Accept Trades</span>
</div>
<div style="float:left; width:30%; margin-top:20px; margin-bottom:20px;">
	<select class="form-control " name="period_availability" id="period_availability">
	<option value="">Period of Availability</option>
	<?php echo $period_availability;?>
	</select><span class="required">*</span>
</div>

<br clear="all">
<input type="text" class="form-control small" placeholder="Price per item/quantity" value="<?php echo $data["price_per_item"];?>" name="price_per_item" id="price_per_item"><span class="required">*</span>

<select class="form-control small" name="currency" id="currency">
<option value="">Currency</option>
<?php echo $currency;?>
</select><span class="required">*</span>

<select class="form-control small" name="quantity_number" id="quantity_number">
<option value="">Quantity No.</option>
<?php echo $quantity_number;?>
</select><span class="required">*</span>

<select class="form-control small" name="quantity_unit" id="quantity_unit">
<option value="">Quantity Unit.</option>
<?php echo $quantity_unit;?>
</select><span class="required">*</span>&nbsp;(E.g: $1 for 31lbs, $10 for $1 bunch)

<br clear="all">
<textarea placeholder="Additional Notes" class="form-control small" name="additional_notes" id="additional_notes"><?php echo $data["additional_notes"];?></textarea>


<br clear="all">
	 <div class="image_div">
	 <hr>
		   <h2>Listing Image</h2>
		
		  <?php 
			if(!empty($data["listing_image"])){ ?><br>
				Current Image: 
				<br><img width="80px;" src="<?php echo UPLOAD_URL."/listing/".$data["listing_image"];?>">
				<br><b>Browse new file to replace current image</b><br><br>
			<?php }?>
              <input type="file" name="listing_image" id="listing_image" accept="image/*,audio/*">		  
		
		  
	 </div>


	<div class="map_div">
	   <hr>
		<h2>Map Coordinates</h2>
		<input placeholder="Latitude"  value="<?php echo $data["lat"];?>" class="form-control small" type="text" style="" name="lat" id="lat" onBlur="showAddressUpdate()" />&nbsp;
		<input placeholder="Longtitude" value="<?php echo $data["lng"];?>"  class="form-control small" type="text" name="lng" id="lng"  onblur="showAddressUpdate()" />&nbsp;
	
	  <div id="map" class="mappreview">
	  Map Preview
	  </div>
	
	</div>

</div>

	<br clear="all">
	<center>
		<input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">&nbsp;&nbsp;
		<input type="button" onClick="location.href='/listings/';" value="Back to Listing" name="back" class="btn btn-tab btn-primary">
		
    </center>


</form>
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
			
			
			var tstate = document.getElementById("state");
			var tstate_selectedText = tstate.options[tstate.selectedIndex].text;
			
			if(tstate_selectedText!="Select State"){address=tstate_selectedText+", "+address;}
			
			var tcity = document.getElementById("city");
			var tcity_selectedText = tcity.options[tcity.selectedIndex].text;
			
			if(tcity_selectedText!="Select City"){address=tcity_selectedText+", "+address;}
			//address=tcity_selectedText+", "+tstate_selectedText+", "+tcountry_selectedText;
		  
		//  alert(address);
		   document.getElementById('approximate_location').value=address;
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
