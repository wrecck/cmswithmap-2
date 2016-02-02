<?php echo $header_block; ?>
<div class="main_wrap_pad">
<h1>Edit Growing Space</h1>
<span class="message"><?php echo $message;?></span>
<form action="" onSubmit="return addNewGrowingSpaceFormSubmit();" id="addnewlisting" method="post" name="user" enctype="multipart/form-data">

	
<div class="add_new_listing_left">
	<input type="text" class="form-control half" placeholder="First Name" value="<?php echo $userData["first_name"];?>" name="first_name" id="first_name" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Last Name" value="<?php echo $userData["last_name"];?>" name="last_name" id="last_name" ><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Email" value="<?php echo $userData["email"];?>" name="email" id="email" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Confirm Email" value="<?php echo $userData["email"];?>" name="confirm_email" id="confirm_email"><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Phone" value="<?php echo $data["phone"];?>" name="phone" id="phone">
	<br clear="all">
	<input type="text" class="form-control half" placeholder="Farm Name/House Name" value="<?php echo $data["farm_name"];?>" name="farm_name" id="farm_name">
    <br clear="all">
	<input type="text" class="form-control full" onKeyUp="showAddress();" placeholder="First Line of Address" value="<?php echo $data["address1"];?>" name="address1" id="address1"><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control full" placeholder="Second Line of Address" value="<?php echo $data["address2"];?>" name="address2" id="address2">
    <br clear="all">
	<input type="text" class="form-control half" onBlur="showAddress();" onKeyUp="showAddress();" placeholder="Town/City" value="<?php echo $data["city"];?>" name="city" id="city"><span class="required">*</span>
	<input type="text" class="form-control half" onBlur="showAddress();" onKeyUp="showAddress()"; placeholder="Province/State" value="<?php echo $data["state"];?>" name="state" id="state"><span class="required">*</span>
		<select name="country" id="country" class="form-control half" onChange="showAddress();">
		   <option value="">Country</option>
		   <?php echo $countries;?>
		</select><span class="required">*</span>
	<input type="text" class="form-control half" onKeyUp="showAddress();" placeholder="Postcode/Zip Code" value="<?php echo $data["zip"];?>" name="zip" id="zip"><span class="required">*</span>		

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
	
  </div>   

<div class="add_new_listing_right">
<center> <b>Utilities</b></center>
	<div class="add_new_listing_right_left"> 
	
		<input <?php if(!empty($data["no_utilities_at_site"])){echo "checked";}?> type="checkbox" class="checkbox" value="No utilities at site" name="no_utilities_at_site" id="no_utilities_at_site">
		&nbsp;<span class="check_text">No utilities at site</span><br clear="all">
		<input <?php if(!empty($data["electricity_provided"])){echo "checked";}?> type="checkbox" class="checkbox" value="Electricity Provided" name="electricity_provided" id="electricity_provided">
		&nbsp;<span class="check_text">Electricity provided</span><br clear="all">
		<input <?php if(!empty($data["electricity_available_at_cost"])){echo "checked";}?> type="checkbox" class="checkbox" value="Electricity available at cost" name="electricity_available_at_cost" id="electricity_available_at_cost">
		&nbsp;<span class="check_text">Electricity available at cost</span><br clear="all">
		<input <?php if(!empty($data["gas_provided"])){echo "checked";}?> type="checkbox" class="checkbox" value="Gas provided" name="gas_provided" id="gas_provided">
		&nbsp;<span class="check_text">Gas provided</span><br clear="all">
		<input <?php if(!empty($data["gas_provided_at_cost"])){echo "checked";}?> type="checkbox" class="checkbox" value="Gas provided at cost" name="gas_provided_at_cost" id="gas_provided_at_cost">
		&nbsp;<span class="check_text">Gas provided at cost</span><br clear="all">
		
	</div> 
	

		<div class="add_new_listing_right_left"> 
	
		<input <?php if(!empty($data["water_provided"])){echo "checked";}?> type="checkbox" class="checkbox" value="Water provided" name="water_provided" id="water_provided">
		&nbsp;<span class="check_text">Water provided</span><br clear="all">
		<input <?php if(!empty($data["water_provided_cost"])){echo "checked";}?> type="checkbox" class="checkbox" value="Water provided Cost" name="water_provided_cost" id="water_provided_cost">
		&nbsp;<span class="check_text">Water provided Cost</span><br clear="all">
		<input <?php if(!empty($data["other_check"])){echo "checked";}?> type="checkbox" class="checkbox" value="Delivery contact producer" name="other_check" id="other_check">
		&nbsp;<span class="check_text">Other</span><br clear="all">
		<input <?php if(!empty($data["other"])){echo "checked";}?> type="text" class="form-control full" placeholder="Other"  name="other" id="other" >
		
	
	   </div> 

 </div>
<div class="add_new_listing_middle">
   <h2>Growing Space Details</h2>

<select style="width:22%" class="form-control threeforths" name="growing_space_style" id="growing_space_style" >
<option value="">Select Growing Space Style</option>
<?php echo $growing_space_style;?>
</select><span class="required">*</span> 
 
<?php /*
<select class="form-control small"  name="growing_space_size" id="growing_space_size">
<option value="">Size</option>
<?php echo $growing_space_size;?>
</select><span    class="required">*</span>
*/?>

<input type="text" class="form-control small" placeholder="Growing Space Size" name="growing_space_size" value="<?php echo $data["growing_space_size"];?>" id="growing_space_size">
<span   class="required">*</span>


<select class="form-control small"  name="growing_space_size_unit" id="growing_space_size_unit">
<option value="">Size Unit</option>
<?php echo $growing_space_size_unit;?>
</select><span   class="required">*</span>

<br clear="all">

<div style="float:left; width:30%; margin-bottom:20px;">
	<select class="form-control  threeforths" name="period_availability" id="period_availability">
	<option value="">Period of Availability</option>
	<?php echo $period_availability;?>
	</select><span class="required">*</span>
</div>

<br clear="all">

<input type="text" class="form-control small" placeholder="Cost" name="growing_space_cost" value="<?php echo $data["growing_space_cost"];?>" id="growing_space_cost">
<span   class="required">*</span>

<select class="form-control small" name="growing_space_period" id="growing_space_period">
<option value="">Cost Period</option>
<?php echo $growing_space_period;?>
</select><span class="required">*</span>

<select class="form-control small" name="currency" id="currency">
<option value="">Currency</option>
<?php echo $currency;?>
</select><span class="required">*</span>

<br clear="all">

	<select  class="form-control  small" name="growing_space_onsite_tools" id="growing_space_onsite_tools">
	<option value="">On-site Tools Available</option>
	<?php echo $growing_space_onsite_tools;?>
	</select><span class="required">*</span>



	<select class="form-control small" name="growing_space_parking" id="growing_space_parking">
	<option value="">Parking Availability</option>
	<?php echo $growing_space_parking;?>
	</select><span class="required">*</span>



<select class="form-control small" name="growing_space_accommodation" id="growing_space_accommodation">
<option value="">Accommodation</option>
<?php echo $growing_space_accommodation;?>
</select><span class="required">*</span>

<br clear="all">
<?php /*
<select class="form-control small" name="growing_space_organic_certification" id="growing_space_organic_certification">
<option value="">Organic Certification</option>
<?php echo $growing_space_organic_certification;?>
</select><span class="required">*</span>


<select class="form-control small" name="growing_space_site_access_time" id="growing_space_site_access_time">
<option value="">Site Access Times</option>
<?php echo $growing_space_site_access_time;?>
</select><span class="required">*</span>
*/?>
<br clear="all">
<textarea placeholder="Additional Notes" class="form-control small" name="additional_notes" id="additional_notes"><?php echo $data["additional_notes"];?></textarea>


<br clear="all">
	 <div class="image_div">
	 <hr>
		   <h2>Image</h2>
		   
			<?php 
			if(!empty($data["listing_image"])){ ?><br>
				Current Image: 
				<br><img width="80px;" src="<?php echo UPLOAD_URL."/growing_space/".$data["listing_image"];?>">
				<br><b>Browse new file to replace current image</b><br><br>
			<?php }?>
			
			
		  <input type="file" name="growing_space_image" id="growing_space_image" accept="image/*,audio/*">
		  <br>(Suggested dimension: 620px × 400px)
	 </div>


	<div class="map_div">
	   <hr>
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
		<input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
		<input type="submit" value="Save and Publish" name="submit" class="btn btn-tab btn-primary">
    </center>


</form>
</div>

  	
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
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
  var latLng = new google.maps.LatLng(<?php echo $data["lat"];?>, <?php echo $data["lng"];?>);
  
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });
  
	  
		var map_error="";
		var error_message="";	   
		var tcountry = document.getElementById("country");
		var tcountry_selectedText = tcountry.options[tcountry.selectedIndex].text;
		var address=tcountry_selectedText;
		var country2 = document.getElementById('country').value;
		var city = document.getElementById('city').value;
		var state = document.getElementById('state').value;
		var address1 = document.getElementById('address1').value;
		var address = address1+", "+city+", "+state+", "+country;  
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
					
					var latLng = new google.maps.LatLng(<?php echo $data["lat"];?>, <?php echo $data["lng"];?>);
					  
					  var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					  });
					  map.setCenter(results[0].geometry.location);

					  if(isdefault==1){
						  var marker = new google.maps.Marker({
							position: latLng,
							title: <?php if(!empty($data["farm_name"])){echo "'".$data["farm_name"]."'";}else{echo address;}?>,
							map: map,
							draggable: true
						  });
			          }else{
						  var marker = new google.maps.Marker({
							title: <?php if(!empty($data["farm_name"])){echo "'".$data["farm_name"]."'";}else{echo address;}?>,
							map: map,
							draggable: true,
							position: results[0].geometry.location
						  });
					  }		
					  
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
			  //alert('Geocode was not successful for the following reason: ' + status);
			}
		  });
}

showAddress(1); //is default by provided coordinates, none is default by center of the map
    </script>
	
	
<?php echo $footer_block;  ?>
