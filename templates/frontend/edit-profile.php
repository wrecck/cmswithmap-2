<?php echo $header_block; ?>
<script>
function showCroppingTool(){
	document.getElementById('lbE_bg').style.display="block";
	document.getElementById('lbE_container').style.display="block";
}


function hideCroppingTool(){
	document.getElementById('lbE_bg').style.display="none";
	document.getElementById('lbE_container').style.display="none";
}


</script>
<div class="lbE_bg" id="lbE_bg" onClick="hideCroppingTool();">
</div>
<div class="lbE_container" id="lbE_container">
<iframe src="/temp/ImageCropWithPHP/ImageCropWithPHP/?file=<?php echo SITE_UPLOAD_PATH."/avatar/".$userData["avatar"];?>&filename=<?php echo $userData["avatar"];?>" width="100%" style="min-height:400px;height:100%;" frameborder="0"></iframe>
</div>

<div class="main_wrap_pad profile">

<h1>Edit Profile</h1>
<span style="float:right; margin-right:70px">(Status: <?php if($period_availability_limit>0){echo "Published";}else{echo '<span style="color:#000">Profile listing has expired.</span> <a onClick="relist()" href="#relist">Re-list for '.$period_availability_default_limit.' days.</a>';}?>)</span>
<form  action="/edit-profile/"  onSubmit="return saveListingFormSubmit();" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
  <div class="module_box_left">
		<?php echo $message;?>
			
		  <div class="avatar_div" id="avatar_div"><img id="avatar_img" src="<?php echo UPLOAD_URL."/avatar/".$userData["avatar"];?>"></div>
		
		<input style="margin-left:0px; border:0px;" type="file" class="form-control half" name="avatar">
		 <br>
		<?php if(!empty($userData["avatar"])){?>
		<span class="note1" style="float: left; font-size: 11px; line-height: 12px; width: 30%; margin-left: 9px;">Browse new image to replace current profile photo.<br><br>
		<a href="#" onClick="showCroppingTool();">Crop and resize current photo</a>
		</span>
		<?php } ?>
		
<br clear="all"><br>
	<?php if($userData["profile_type"]==2 OR $userData["profile_type"]==4){?>
			
<input style="margin-bottom:5px;" type="text" placeholder="Organization Name" class="form-control full" value="<?php echo $userData["organization_name"];?>" name="organization_name" id="organization_name">
<br clear="all"><span style="float: left; font-size: 11px; line-height: 12px; width: 80%; margin-bottom: 9px;" class="note1">Fill in the Organization name to get your company to appear in the listings. Leave this box blank if you just want to list individual items.</span>
<span style="margin:0px; float:right;margin-right:35px; margin-top:5px;" class="glyphicon glyphicon-question-sign"><span class="tooltip_text"><b>Organization Name</b><p>Provide organization name to automatically list your profile as an Organization.</p></span></span>
	
		



	<?php } ?>	

<input type="text" placeholder="First Line Address" class="form-control full" value="<?php echo $userData["address1"];?>" name="address1" id="address1" onkeyup="showAddress();">

<input type="text" placeholder="Second Line Address(optional)" class="form-control full" value="<?php echo $userData["address2"];?>" name="address2" id="address2" onkeyup="showAddress();">

<input type="text" placeholder="Town/City" class="form-control half" value="<?php echo $userData["city"];?>" name="city" id="city" onkeyup="showAddress();">

<input type="text"  placeholder="County(Optional)" class="form-control half" value="<?php echo $userData["county"];?>" name="county" id="county" onkeyup="showAddress();">

<input  type="text" placeholder="Province/State" class="form-control half" value="<?php echo $userData["state"];?>" name="state" id="state" onkeyup="showAddress();">

<input type="text" class="form-control half"  placeholder="Postcode/Zip Code"  class="form-control" value="<?php echo $userData["zip"];?>" name="zip" id="zip" onkeyup="showAddress();">

<br clear="all">

<select style="margin-bottom:0px;" name="country" id="country" class="form-control half" onChange="showAddress();">
<option value="0">Country</option>
<?php echo $countries;?>
</select>
		
		

	

		
		
	<br clear="all">
	 
	 
    </div><!--//module_box_left-->
	
	<div class="module_box_right">
		<input type="text" placeholder="First Name" class="form-control full" value="<?php echo $userData["first_name"];?>" name="first_name" id="first_name">
		<input type="text"  placeholder="Last Name" class="form-control full" value="<?php echo $userData["last_name"];?>" name="last_name" id="last_name">
		<input type="text"  placeholder="Email"  class="form-control full" value="<?php echo $userData["email"];?>" name="email" id="email">
		<input class="form-control full"  placeholder="Phone"  type="text" value="<?php echo $userData["phone"];?>" name="phone" id="phone">
		<input class="form-control full"  placeholder="Website"  type="text" value="<?php echo $userData["website"];?>" name="website" id="website">
		<textarea class="form-control full" style="height:235px;"  placeholder="Tell us a bit about yourself"  type="text" name="description" id="description"><?php echo $userData["description"];?></textarea>
		<input class="form-control full"  placeholder="Tag line, Quotation, Mission Statement	"  type="text" value="<?php echo $userData["tagline"];?>" name="tagline" id="tagline">
	   <input class="form-control full"  placeholder="Keywords for search. E.g: fruits, peas, plants, eggs, dairy "  type="text" value="<?php echo $userData["search_keywords"];?>" name="search_keywords" id="search_keywords">
	</div><!--//module_box_right-->
	
	  <br clear="all">	
</div><!--//module_box-->

<div class="is_checkbox" style="">
<span style="font-weight:bold;float:left">What services we offer</span><br>

	<input type="checkbox" <?php if(in_array("U-Pick",$offerArr)){echo "checked";}?> class="checkbox" value="U-Pick" 
	name="offer[]" id="offer_1">&nbsp;<span class="check_text">U-Pick</span><br>
	
		<input type="checkbox" <?php if(in_array("Farm Stand",$offerArr)){echo "checked";}?> class="checkbox" value="Farm Stand" 
	name="offer[]" id="offer_1">&nbsp;<span class="check_text">Farm Stand</span><br>

	<input type="checkbox" <?php if(in_array("Cafe/Bistro/Restaurant",$offerArr)){echo "checked";}?> class="checkbox" value="Cafe/Bistro/Restaurant" 
	name="offer[]" id="offer_1">&nbsp;<span class="check_text">Cafe/Bistro/Restaurant</span><br>
	
	<input type="checkbox" <?php if(in_array("Tours",$offerArr)){echo "checked";}?> class="checkbox" value="Tours" 
	name="offer[]" id="offer_1">&nbsp;<span class="check_text">Tours</span><br>

	
	
	
	<input type="checkbox" <?php if(in_array("Farmers/Grower",$offerArr)){echo "checked";}?> class="checkbox" value="Farmers/Grower" 
	name="offer[]" id="offer_1">&nbsp;<span class="check_text">Farmers/Grower</span><br>
	
	<input type="checkbox" <?php if(in_array("Farmers Market",$offerArr)){echo "checked";}?> class="checkbox" value="Farmers Market" 
	name="offer[]" id="offer_2">&nbsp;<span class="check_text">Farmers Market</span><br>

	<input type="checkbox" <?php if(in_array("Community Garden/Orchard/Food Forest",$offerArr)){echo "checked";}?> class="checkbox" value="Community Garden/Orchard/Food Forest" 
	name="offer[]" id="offer_3">&nbsp;<span class="check_text">Community Garden/Orchard/Food Forest</span><br>

	<input type="checkbox" <?php if(in_array("Online Advice/Education",$offerArr)){echo "checked";}?> class="checkbox" value="Online Advice/Education" 
	name="offer[]" id="offer_4">&nbsp;<span class="check_text">Online Advice/Education</span><br>

	<input type="checkbox" <?php if(in_array("Workshops and Courses",$offerArr)){echo "checked";}?> class="checkbox" value="Workshops and Courses" 
	name="offer[]" id="offer_5">&nbsp;<span class="check_text">Workshops and Courses</span><br>
	
	
	<?php /*<input type="checkbox" <?php if(in_array("Grow Produce",$offerArr)){echo "checked";}?> class="checkbox" value="Grow Produce" 
	name="offer[]" id="offer_1">&nbsp;<span class="check_text">Grow Produce</span>
	<input type="checkbox" <?php if(in_array("Workshops and Courses",$offerArr)){echo "checked";}?> class="checkbox" value="Workshops and Courses" 
	name="offer[]" id="offer_2">&nbsp;<span class="check_text">Workshops and Courses</span>
	<br clear="all">
	<input type="checkbox" <?php if(in_array("Farmers Market",$offerArr)){echo "checked";}?> class="checkbox" value="Farmers Market" 
	name="offer[]" id="offer_3">&nbsp;<span class="check_text">Farmers Market</span>
	<input type="checkbox" <?php if(in_array("Growing Space Owner",$offerArr)){echo "checked";}?> class="checkbox" value="Growing Space Owner" 
	name="offer[]" id="offer_4">&nbsp;<span class="check_text">Growing Space Owner</span>
	<br clear="all">
	<input type="checkbox" <?php if(in_array("Volunteer Opportunies/Internships",$offerArr)){echo "checked";}?> class="checkbox" value="Volunteer Opportunies/Internships" 
	name="offer[]" id="offer_5">&nbsp;<span class="check_text">Volunteer Opportunies/Internships</span>
	<input type="checkbox" <?php if(in_array("Work with Schools, Seniors or Other Groups",$offerArr)){echo "checked";}?> class="checkbox" value="Work with Schools, Seniors or Other Groups" 
	name="offer[]" id="offer_6">&nbsp;<span class="check_text">Work with Schools, Seniors or Other Groups</span>
	<br clear="all">
	<input type="checkbox" <?php if(in_array("Online Advice/Education",$offerArr)){echo "checked";}?> class="checkbox" value="Online Advice/Education" 
	name="offer[]" id="offer_7">&nbsp;<span class="check_text">Online Advice/Education</span>
	<input type="checkbox" <?php if(in_array("Build Growing Spaces for Communities",$offerArr)){echo "checked";}?> class="checkbox" value="Build Growing Spaces for Communities" 
	name="offer[]" id="offer_8">&nbsp;<span class="check_text">Build Growing Spaces for Communities</span> */?>

	</div>
	
<div class="is_checkbox" style="">
<span style="font-weight:bold;float:left">Plants and Produce we offer</span><br>

	<input type="checkbox" <?php if(in_array("Fruit",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Fruit" 
	name="ppoffer[]" id="ppoffer_1">&nbsp;<span class="check_text">Fruit</span><br>
	
	<input type="checkbox" <?php if(in_array("Leafy Greens and Fruiting Vegetables",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Leafy Greens and Fruiting Vegetables" 
	name="ppoffer[]" id="ppoffer_2">&nbsp;<span class="check_text">Leafy Greens and Fruiting Vegetables</span><br>

	<input type="checkbox" <?php if(in_array("Edible and Medicinal Herbs/Spices",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Edible and Medicinal Herbs/Spices" 
	name="ppoffer[]" id="ppoffer_3">&nbsp;<span class="check_text">Edible and Medicinal Herbs/Spices</span><br>

	<input type="checkbox" <?php if(in_array("Root Vegetables",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Root Vegetables" 
	name="ppoffer[]" id="ppoffer_4">&nbsp;<span class="check_text">Root Vegetables</span><br>

	<input type="checkbox" <?php if(in_array("Micro Greens",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Micro Greens" 
	name="ppoffer[]" id="ppoffer_5">&nbsp;<span class="check_text">Micro Greens</span><br>	
	
	<input type="checkbox" <?php if(in_array("Nuts",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Nuts" 
	name="ppoffer[]" id="ppoffer_6">&nbsp;<span class="check_text">Nuts</span><br>	

	<input type="checkbox" <?php if(in_array("Grains",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Grains" 
	name="ppoffer[]" id="ppoffer_7">&nbsp;<span class="check_text">Grains</span><br>	

	<input type="checkbox" <?php if(in_array("Eggs",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Eggs" 
	name="ppoffer[]" id="ppoffer_8">&nbsp;<span class="check_text">Eggs</span><br>		

	<input type="checkbox" <?php if(in_array("Meat",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Meat" 
	name="ppoffer[]" id="ppoffer_9">&nbsp;<span class="check_text">Meat</span><br>	

	<input type="checkbox" <?php if(in_array("Other",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Other" 
	name="ppoffer[]" id="ppoffer_10">&nbsp;<span class="check_text">Other</span><br>		

	<input type="checkbox" <?php if(in_array("Dairy",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Dairy" 
	name="ppoffer[]" id="ppoffer_11">&nbsp;<span class="check_text">Dairy</span><br>		
	
	<input type="checkbox" <?php if(in_array("Seeds/Starts",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Seeds/Starts" 
	name="ppoffer[]" id="ppoffer_12">&nbsp;<span class="check_text">Seeds/Starts</span><br>		
	
	<input type="checkbox" <?php if(in_array("Edible and Medicinal Trees, Shrubs, and Plants",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Edible and Medicinal Trees, Shrubs, and Plants" 
	name="ppoffer[]" id="ppoffer_13">&nbsp;<span class="check_text">Edible and Medicinal Trees, Shrubs, and Plants</span><br>		
	
	<input type="checkbox" <?php if(in_array("Ornamental Plants",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Ornamental Plants" 
	name="ppoffer[]" id="ppoffer_14">&nbsp;<span class="check_text">Ornamental Plants</span><br>		
		
		<input type="checkbox" <?php if(in_array("Ornamental Trees",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Ornamental Trees" 
	name="ppoffer[]" id="ppoffer_15">&nbsp;<span class="check_text">Ornamental Trees</span><br>		
	
			<input type="checkbox" <?php if(in_array("Growing Media and Mulch Material",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Growing Media and Mulch Material" 
	name="ppoffer[]" id="ppoffer_16">&nbsp;<span class="check_text">Growing Media and Mulch Material</span><br>		
	
			<input type="checkbox" <?php if(in_array("Bonsai",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Bonsai" 
	name="ppoffer[]" id="ppoffer_17">&nbsp;<span class="check_text">Bonsai</span><br>		
	<!--
			<input type="checkbox" <?php if(in_array("Farmers/Growers",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Farmers/Growers" 
	name="ppoffer[]" id="ppoffer_18">&nbsp;<span class="check_text">Farmers/Growers</span><br>		
	
			<input type="checkbox" <?php if(in_array("U-Pick",$ppOfferArr)){echo "checked";}?> class="checkbox" value="U-Pick" 
	name="ppoffer[]" id="ppoffer_19">&nbsp;<span class="check_text">U-Pick</span><br>		
	
			<input type="checkbox" <?php if(in_array("Workshops and Courses",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Workshops and Courses" 
	name="ppoffer[]" id="ppoffer_20">&nbsp;<span class="check_text">Workshops and Courses</span><br>		
	
			<input type="checkbox" <?php if(in_array("Community Garden/Orchard/Food Forest",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Community Garden/Orchard/Food Forest" 
	name="ppoffer[]" id="ppoffer_21">&nbsp;<span class="check_text">Community Garden/Orchard/Food Forest</span><br>		

			<input type="checkbox" <?php if(in_array("Online Advice/Education",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Online Advice/Education" 
	name="ppoffer[]" id="ppoffer_22">&nbsp;<span class="check_text">Online Advice/Education</span><br>		

			<input type="checkbox" <?php if(in_array("Cafe/Bistro/Restaurant",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Cafe/Bistro/Restaurant" 
	name="ppoffer[]" id="ppoffer_23">&nbsp;<span class="check_text">Cafe/Bistro/Restaurant</span><br>		

			<input type="checkbox" <?php if(in_array("Tours",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Tours" 
	name="ppoffer[]" id="ppoffer_24">&nbsp;<span class="check_text">Tours</span><br>		

			<input type="checkbox" <?php if(in_array("Events/Workshops",$ppOfferArr)){echo "checked";}?> class="checkbox" value="Events/Workshops" 
	name="ppoffer[]" id="ppoffer_25">&nbsp;<span class="check_text">Events/Workshops</span><br>	
 -->
	
</div>
	

<br clear="all"><br>
	 <div class="rows">   
		  <div class="submit_div">
		  
	<script>
	 function relist(){
		  document.getElementById('main_buttons').style.display="none";
		  document.getElementById('relist').style.display="block";
		  document.getElementById('to_relist').value="1";
	 }
	 
	</script>
	<input type="hidden" name="to_relist" id="to_relist" value="0">
	<span style="display:none;" id="relist">
	
	<input type="checkbox" value="1" name="agree_to_term" id="agree_to_term">
&nbsp;I agree to the <a target="_blank" href="/terms/">Terms of Use</a> and <a href="/privacy-policies/"  target="_blank">Privacy Policy</a> of SproutingTrade.
	<br clear="all"><br>
	<input type="submit" value="Re-List" name="submit" class="btn btn-tab btn-primary">
	
	</span>		  
	<span id="main_buttons">	  
		   <input type="submit" value="Save" style="width:150px;" name="submit" class="btn btn-tab btn-primary">
	</span>		  
		  
           </div>
	 </div>
	 

<input type="hidden" value="<?php echo $userData["id"];?>" name="id">
<input type="hidden" name="isprofile" value="1">
		<input type="hidden"  placeholder="Latitude" value=""  class="form-control small" style="" name="lat" id="lat" onBlur="showAddressUpdate()" />&nbsp;
		<input type="hidden"  placeholder="Longtitude" value=""  class="form-control small"  name="lng" id="lng"  onblur="showAddressUpdate()" />&nbsp;

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
		 // document.getElementById('map').innerHTML="<div style='margin:auto; width:70%; margin-top:-20px;text-align:left;'><b>Please provide the following address field(s) to correctly display the map:</b><br>"+error_message+"</div>";
		 // return false;
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
			  //alert('Geocode was not successful for the following reason: ' + status);
			}
		  });
}

var tcountry = document.getElementById("country");
var tcountry_selectedText = tcountry.options[tcountry.selectedIndex].text;
var country=tcountry_selectedText;
var country2 = document.getElementById('country').value;
var city = document.getElementById('city').value;
var state = document.getElementById('state').value;
var address1 = document.getElementById('address1').value;
var address="";
if(address1!=""){address = address1;}
if(city!=""){address = ", "+city;}
if(state!=""){address = ", "+state;}
if(country!="Country"){address = ", "+country;}


if(address!=""){showAddress();}

//is default by provided coordinates, none is default by center of the map
	</script> 
	
	  <div id="map" style="display:none" class="mappreview">
	  Map Preview
	  </div>
<?php echo $footer_block;  ?>
