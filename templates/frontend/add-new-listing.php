<?php echo $header_block; ?>
<div class="main_wrap_pad">
<h1>Add New Listing</h1>


<form action="" onSubmit="return addNewListingFormSubmit();" id="addnewlisting" method="post" name="user" enctype="multipart/form-data">
<?php echo $message;?>
	
<div class="add_new_listing_left">
	<input type="text" class="form-control half" placeholder="First Name" value="<?php echo $userData["first_name"];?>" name="first_name" id="first_name" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Last Name" value="<?php echo $userData["last_name"];?>" name="last_name" id="last_name" ><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Email" value="<?php echo $userData["email"];?>" name="email" id="email" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Confirm Email" value="<?php echo $userData["email"];?>" name="confirm_email" id="confirm_email"><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Phone" value="<?php echo $userData["phone"];?>" name="phone" id="phone">
	<br clear="all">
	<input type="text" class="form-control half" placeholder="Farm Name/House Name" value="<?php echo $userData["farm_name"];?>" name="farm_name" id="farm_name">
    <br clear="all">
	<input type="text" class="form-control full" onKeyUp="showAddress();" placeholder="First Line of Address" value="<?php echo $userData["address1"];?>" name="address1" id="address1"><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control full" placeholder="Second Line of Address" value="<?php echo $userData["address2"];?>" name="address2" id="address2">
    <br clear="all">
	<input type="text" class="form-control half" onBlur="showAddress();" onKeyUp="showAddress();" placeholder="Town/City" value="<?php echo $userData["city"];?>" name="city" id="city"><span class="required">*</span>
	<input type="text" class="form-control half" onBlur="showAddress();" onKeyUp="showAddress()"; placeholder="Province/State" value="<?php echo $userData["state"];?>" name="state" id="state"><span class="required">*</span>
		<select name="country" id="country" class="form-control half" onChange="showAddress();">
		   <option value="">Country</option>
		   <?php echo $countries;?>
		</select><span class="required">*</span>
	<input type="text" class="form-control half" onKeyUp="showAddress();" placeholder="Postcode/Zip Code" value="<?php echo $userData["zip"];?>" name="zip" id="zip"><span class="required">*</span>		

<!--
<hr>
<h2>Map Coordinates</h2>
Does your property, growing space, or forage area not have an address, please enter exact coordinates or click precise location on the map.<br>
		<input placeholder="Latitude" value=""  class="form-control small" type="text" style="" name="lat" id="lat" onBlur="showAddressUpdate()" />&nbsp;
		<input placeholder="Longtitude" value=""  class="form-control small" type="text" name="lng" id="lng"  onblur="showAddressUpdate()" />&nbsp;
-->
	<input placeholder="Latitude" value=""  class="form-control small" type="hidden" style="" name="lat" id="lat" onBlur="showAddressUpdate()" />&nbsp;
		<input placeholder="Longtitude" value=""  class="form-control small" type="hidden" name="lng" id="lng"  onblur="showAddressUpdate()" />&nbsp;

	<hr>		
 	<div class="payment_details">
	 <h2>Payment Details</h2>
		<input type="checkbox" class="checkbox" value="Cash(exact change only)" name="payment_cash_exact_change" id="payment_cash_exact_change" <?php if(!empty($data["payment_cash_exact_change"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Cash(exact change only)</span><br clear="all">
	
		
		<input type="checkbox" class="checkbox" value="Cash(change available)" name="payment_cash_change_available" id="payment_cash_change_available" <?php if(!empty($data["payment_cash_change_available"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Cash(change available)</span><br clear="all">
	
		<input type="checkbox" class="checkbox" value="Cheque" name="payment_cheque" id="payment_cheque" <?php if(!empty($data["payment_cheque"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Cheque</span><br clear="all">

		<input type="checkbox" class="checkbox" value="Credit Card" name="payment_credit_card" id="payment_credit_card" <?php if(!empty($data["payment_credit_card"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Credit Card</span><br clear="all">
	
		<input type="checkbox" class="checkbox" value="Debit Card" name="payment_debit_card" id="payment_debit_card" <?php if(!empty($data["payment_debit_card"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Debit Card</span><br clear="all">
	
		<input type="checkbox" class="checkbox" value="Online Payment(Contact Producer or see website)" name="payment_online" id="payment_online" <?php if(!empty($data["payment_online"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Online Payment(Contact Producer or see website)</span><br clear="all">
		
      <input type="checkbox" class="checkbox" value="Other" name="payment_other" id="payment_other" <?php if(!empty($data["payment_other"])){echo "checked";}?> >
		&nbsp;<span class="check_text">Other</span><br clear="all">
		<input type="text" class="form-control half" placeholder="Provide details" value="<?php echo $data["payment_provide_details"];?>" name="payment_provide_details" id="payment_provide_details">&nbsp;&nbsp;<span style="margin-left:0px !important;" class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Provide Details</b><p>Provide other payment type details only if its none of the above selection.</p></span></span>	

	 </div>				
	<hr>		
  </div>   


 
 
<div class="add_new_listing_middle">
   <h2>Produce Details</h2>

<select class="form-control threeforths" name="produce_category" id="produce_category" onChange="loadProduceSubCat(this.value)">
<option value="">Select Produce Category</option>
<?php echo $produceCategory;?>
</select><span class="required">*</span><span class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Produce Category</b><p>Categorized your produce to make it searchable in our listing.</p></span></span>
 
<div id="produce_select" style="float:left;min-width:200px;"><select class="form-control full"  name="produce" id="produce">
<option value="">Select category first</option>
</select></div><span  style="margin-left:-15px;" class="required">*</span><span class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Produce</b><p>Choose the type of produce by selecting a "Produce Category" first.</p></span></span>

<input type="text" class="form-control threeforths" placeholder="Enter Variety(Optional)" value="<?php echo $userData["specific_variety"];?>" name="specific_variety" id="specific_variety"><span class="required">*</span><span class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Variety</b><p>Provide if your produce has variations, e:g: Astro Arugula, Surrey Arugula</p></span></span>
<br clear="all">
<div class="is_checkbox" style="">
	<input type="checkbox" class="checkbox" value="Certified Organic" name="is_certified_organic" id="is_certified_organic">&nbsp;<span class="check_text">Certified Organic</span>
	<input type="checkbox" class="checkbox" value="Organic, Not Certified" name="organic_not_certified" id="organic_not_certified">&nbsp;<span class="check_text">Organic, Not Certified</span>
	<input type="checkbox" class="checkbox" value="Not Organic" name="is_not_organic" id="is_not_organic">&nbsp;<span class="check_text">Not Organic</span>
	<br clear="all">
	<input type="checkbox" class="checkbox" value="Free" name="is_free" id="is_free">&nbsp;<span class="check_text">Free</span>
	<input type="checkbox" class="checkbox" value="Accept Trades" name="is_accept_trades" id="is_accept_trades">&nbsp;<span class="check_text">Accept Trades</span>
	<input type="checkbox" class="checkbox" value="Non GMO" name="is_non_gmo" id="is_non_gmo">&nbsp;<span class="check_text">Non GMO</span>
</div>
<div style="float:left; width:30%; margin-top:20px; margin-bottom:20px;">
	<select style="display:none" class="form-control " name="period_availability" id="period_availability">
	<option value="">Period of Availability(Days)</option>
	<?php echo $period_availability;?>
	</select><span style="display:none" class="required">*</span>
	<span style="float: left; font-weight:bold">Available for <?php echo $period_availability_limit;?> days</span>
	<input type="hidden" name="period_availability" id="period_availability" value="<?php echo $period_availability_limit;?>">
	<span style="display:none" class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Period of Availability</b><p>Number of days that the listing 

will be available.</p></span></span>
</div>

<br clear="all">
<input type="text" class="form-control small" placeholder="Price per item/quantity" value="<?php echo $userData["price_per_item"];?>" name="price_per_item" id="price_per_item"><span class="required">*</span>
<span class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Price per item</b><p>Input numeric character only, E.g: 150</p></span></span>

<select class="form-control small" name="currency" id="currency">
<option value="">Currency</option>
<?php echo $currency;?>
</select><span class="required">*</span><span class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Currency</b><p>Choose the currency that will be indicated with the price.</p></span></span>
<?php /*
<select class="form-control small" name="quantity_number" id="quantity_number">
<option value="">Quantity No.</option>
<?php echo $quantity_number;?>
</select><span class="required">*</span>
*/?>

<select class="form-control small" name="quantity_unit" id="quantity_unit">
<option value="">Quantity Unit.</option>
<?php echo $quantity_unit;?>
</select><span class="required">*</span>
<span class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Quantity Unit</b><p>Unit or Measurement of the produce as per item.</p></span></span>&nbsp;<span class="e_g">E.g: CAD$1 lb, or USD$5 plant or CAD$30 tray</span>

<br clear="all">
<textarea placeholder="Additional Notes" class="form-control small" name="additional_notes" id="additional_notes"></textarea>
<span  style="margin-left:0px !important; margin-top:20px;" class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Additional Notes</b><p>Provide more notes to make your listing more informative.</p></span></span>
<br clear="all"><br>
<input class="form-control half"  placeholder="Keywords for search. E.g: fruits, peas, plants, eggs, dairy "  type="text"   name="search_keywords" id="search_keywords">

<br>
<hr>

<br clear="all">
<h2>Pick up / Delivery Options</h2>
<div class="add_new_listing_right">

	<div class="add_new_listing_right_left"> 
	 <b>Collection/Delivery</b><br clear="all"><br>
		<input type="checkbox" class="checkbox" value="Pick up farm stand shop" name="pick_up_farm_stand_shop" id="pick_up_farm_stand_shop">
		&nbsp;<span class="check_text">Pick up farm stand shop</span><br clear="all">
		<input type="checkbox" class="checkbox" value="Pick up at property" name="pick_up_at_property" id="pick_up_at_property">
		&nbsp;<span class="check_text">Pick up at property</span><br clear="all">
		<input type="checkbox" class="checkbox" value="Delivery contact producer" name="delivery_contact_producer" id="delivery_contact_producer">
		&nbsp;<span class="check_text">Delivery contact producer</span><br clear="all">
		<input type="checkbox" class="checkbox" value="Contact Producer" name="contact_producer" id="contact_producer">
		&nbsp;<span class="check_text">Contact Producer</span><br clear="all">
		<input type="checkbox" class="checkbox" value="1" name="u_pick" id="u_pick">
		&nbsp;<span class="check_text">U Pick</span><br clear="all">
		<input type="checkbox" class="checkbox"  value="1" name="farmers_market" id="farmers_market">
		&nbsp;<span class="check_text">Farmers Market</span><br clear="all">		
	</div> 
	
	<div class="add_new_listing_right_right"> 
	 <b>Time</b><br clear="all"><br>
		<select class="form-control half" name="pick_up_farm_stand_shop_timefrom" id="pick_up_farm_stand_shop_timefrom">
		<option value="">Time From</option>
		<?php echo $time_from;?>
		</select>
		
		<select class="form-control half"  name="pick_up_farm_stand_shop_timeuntil" id="pick_up_farm_stand_shop_timeuntil">
		<option value="">Time Until</option>
		<?php echo $time_until;?>
		</select><br clear="all">

		<select class="form-control half"name="pick_up_at_property_timefrom" id="pick_up_at_property_timefrom">
		<option value="">Time From</option>
		<?php echo $time_from;?>
		</select>
		
		<select class="form-control half"  name="pick_up_at_property_timeuntil" id="pick_up_at_property_timeuntil">
		<option value="">Time Until</option>
		<?php echo $time_until;?>
		</select><br clear="all">
		
		
	</div> 

	<div class="add_new_listing_right_full">
	
	    <input type="text" class="form-control half" placeholder="Enter Name of Farmer's Market" value="<?php echo $userData["farmers_market_name"];?>" name="farmers_market_name" id="farmers_market_name">
		<select style="width:80px;" class="form-control half"  name="farmers_market_time_day" id="farmers_market_time_day">
		<option value="">Day</option>
		<?php echo $day;?>
		</select><br clear="all">
		<select class="form-control half"name="farmers_market_time_from" id="farmers_market_time_from">
		<option value="">Time From</option>
		<?php echo $time_from;?>
		</select>
		<select class="form-control half"  name="farmers_market_time_until" id="farmers_market_time_until">
		<option value="">Time Until</option>
		<?php echo $time_until;?>
		</select><br clear="all">	
	
	</div>
	
	
 </div>


<br clear="all">
	 <div class="image_div">
	 <hr>
		   <h2>Listing Image</h2>
		  <input type="file" name="listing_image" id="listing_image" accept="image/*,audio/*">
		  <br>(Suggested dimension: 620px × 400px)<span style="margin:0px; float:right;margin-right:30px; margin-top:5px;" class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Listing Image</b><p>Upload an image within dimension 620px width and 400px height.</p></span></span>
	 </div>


	<div class="map_div">
	   <hr>
	   * You may drag the marker to exactly mark the location of your listing.
	<!--	<h2>Map Coordinates</h2>
		<input placeholder="Latitude"  class="form-control small" type="text" style="" name="lat" id="lat" onBlur="showAddressUpdate()" />&nbsp;
		<input placeholder="Longtitude"  class="form-control small" type="text" name="lng" id="lng"  onblur="showAddressUpdate()" />&nbsp;
	-->
	  <div id="map" class="mappreview">
	  Map Preview
	  </div>
	
	</div>

</div>

	<br clear="all">
	<center>
	<input type="checkbox" value="1" name="agree_to_term" id="agree_to_term">
&nbsp;I agree to the <a target="_blank" href="/terms/">Terms of Use</a> and <a href="/privacy-policies/"  target="_blank">Privacy Policy</a> of SproutingTrade.
	<br clear="all"><br>
	
		<input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
		<input type="submit" value="Save and Publish" name="submit" class="btn btn-tab btn-primary">
    </center>


</form>
</div>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();
var map;
function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  //document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
	  document.getElementById('lat').value=latLng.lat().toFixed(5);
	  document.getElementById('lng').value=latLng.lng().toFixed(5);
}

function updateMarkerAddress(str) {
   //document.getElementById('address').innerHTML = str;
}


function showAddress(isdefault){
	
  
		var map_error="";
		var error_message="";	   
		var tcountry = document.getElementById("country");
		var tcountry_selectedText = tcountry.options[tcountry.selectedIndex].text;
		var address=tcountry_selectedText;
		var country2 = document.getElementById('country').value;
		var city = document.getElementById('city').value;
		var state = document.getElementById('state').value;
		var address1 = document.getElementById('address1').value;
		var address = address1+", "+city+", "+state+", "+country2;  
		if(address1==""){map_error=1;error_message="First line of Address<br>";}	 
		if(city==""){map_error=1;error_message=error_message+"City<br>";}	
		if(state==""){map_error=1;error_message=error_message+"State<br>";}	
		if(country2==""){map_error=1;error_message=error_message+"Country<br>";}	
		 
       if(map_error==1){	
		  document.getElementById('map').innerHTML="<div style='margin:auto; width:70%; margin-top:-20px;text-align:left;'><b>Please provide the following address field(s) to correctly display the map:</b><br>"+error_message+"</div>";
		  return false;
	   }
			

		var tstate = document.getElementById("state").value;
		var tstate_selectedText = document.getElementById("state").value;//tstate.options[tstate.selectedIndex].text;
		if(tstate_selectedText!="Select State"){address=tstate_selectedText+", "+address;}
		var tcity_selectedText = document.getElementById("city").value;//tcity.options[tcity.selectedIndex].text;
		if(tcity_selectedText!="Select City"){address=tcity_selectedText+", "+address;}
  
		  geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
					     var latLng = results[0].geometry.location;//new google.maps.LatLng(-34.397, 150.644);
						  var map = new google.maps.Map(document.getElementById('map'), {
							zoom: 16,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						  });
						
						  map.setCenter(results[0].geometry.location);  						  
						  var marker = new google.maps.Marker({
							title: <?php if(!empty($data["farm_name"])){echo "'".$data["farm_name"]."'";}else{echo address;}?>,
							map: map,
							draggable: true,
							position: results[0].geometry.location
						  });
				
					  // Update current position info.
					  updateMarkerPosition(latLng);
					  geocodePosition(latLng);
					  
					  // Add dragging event listeners.
					  google.maps.event.addListener(marker, 'dragstart', function() {
						updateMarkerAddress('Dragging...');
					  });
					  
					  google.maps.event.addListener(marker, 'drag', function() {
						updateMarkerStatus('Dragging...');
						updateMarkerPosition(marker.getPosition());
					  });
					  
					  google.maps.event.addListener(marker, 'dragend', function() {
						updateMarkerStatus('Drag ended');
						geocodePosition(marker.getPosition());
					  });
			  
			  
			} else {
			  alert('Geocode was not successful for the following reason: ' + status);
			}
		  });
}

showAddress(); //is default by provided coordinates, none is default by center of the map
	</script> 
	
	
<?php echo $footer_block;  ?>
