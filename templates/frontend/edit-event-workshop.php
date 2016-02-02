<?php echo $header_block; ?>
<div class="main_wrap_pad">
<h1>Edit Event/Workshop</h1>

<span class="message"><?php echo $message;?></span>
<form action="" onSubmit="return addNewEventSeminarFormSubmit();" id="addnewlisting" method="post" name="user" enctype="multipart/form-data">
	
<div class="add_new_listing_left">
   <h2>Contact Information</h2>
	<input type="text" class="form-control half" placeholder="First Name" value="<?php echo $data["fname"];?>" name="first_name" id="first_name" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Last Name" value="<?php echo $data["lname"];?>" name="last_name" id="last_name" ><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Email" value="<?php echo $data["email"];?>" name="email" id="email" ><span class="required">*</span>
	<input type="text" class="form-control half" placeholder="Confirm Email" value="<?php echo $data["email"];?>" name="confirm_email" id="confirm_email"><span class="required">*</span>
    <br clear="all">
	<input type="text" class="form-control half" placeholder="Phone" value="<?php echo $data["phone"];?>" name="phone" id="phone">

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

 <div class="add_new_listing_middle">
   <h2>Event or Seminar Details</h2>

<input type="text" class="form-control full" name="event_seminar_title" id="event_seminar_title" placeholder="Event/Seminar Title" value="<?php echo $data["event_seminar_title"];?>" name="event_seminar_title" id="event_seminar_title"><span class="required">*</span>
<br clear="all">
	
<textarea placeholder="Introduction" class="form-control small" name="introduction" id="introduction"><?php echo $data["introduction"];?></textarea><span class="required">*</span>		
<br clear="all">

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

<?php /*<br clear="all">
<select class="form-control threeforths" name="start_date" id="start_date" >
<option value="">Start Date</option>
<?php echo $start_date;?>
</select><span class="required">*</span> 
 

<select class="form-control small"  name="end_date" id="end_date">
<option value="">End Date</option>
<?php echo $end_date;?>
</select><span    class="required">*</span>

<select class="form-control small"  name="time" id="time">
<option value="">Time</option>
<?php echo $time;?>
</select><span    class="required">*</span> */?>

<br clear="all">
<input type="text" class="form-control small" placeholder="Cost" name="cost" value="<?php echo $data["cost"];?>" id="cost">
<span   class="required">*</span>
<select class="form-control small" name="currency" id="currency">
<option value="">Currency</option>
<?php echo $currency;?>
</select><span class="required">*</span>
<br clear="all">
         
                 <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="event_date_time">Choose Event or Workshop date and time:</label>
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                       <input type="text" style="width: 400px" name="date_time" id="date_time" class="form-control" value="<?php echo $data["date_time"];?>"  class="span4"/>
                     </div>
                    </div>
                  </div>
                 </fieldset>
       

               <script type="text/javascript">
               $(document).ready(function() {
                  $('#date_time').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    format: 'MM/DD/YYYY h:mm A'
                  }, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                  });
               });
               </script>
<br clear="all">
	 <div class="image_div">
	 <hr>
		   <h2>Image</h2>
		   
		<?php 
			if(!empty($data["listing_image"])){ ?><br>
				Current Image: 
				<br><img width="80px;" src="<?php echo UPLOAD_URL."/event_workshop/".$data["listing_image"];?>">
				<br><b>Browse new file to replace current image</b><br><br>
			<?php }?>	   
		   
		   
		  <input type="file" name="event_workshop_image" id="event_workshop_image" accept="image/*,audio/*">
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
