<?php echo $header_block; ?>
<?php
//print_r($data);
?>
<div class="main_wrap_pad">
<h1 style="font-size:22px;"><?php echo ucfirst($data["farm_name"]);?><br>

<span style=" font-size:25px;"><?php echo $data["address1"].", ".$data["city"].", ".$data["state"];?></span></h1>
<span class="message"><?php echo $message;?></span>

<form action="" onSubmit="return addNewListingFormSubmit();" id="addnewlisting" method="post" name="user" enctype="multipart/form-data">
	
<div class="add_new_listing_left">
<?php if($noimage!=1){?>
<img width="100%" src="<?php echo UPLOAD_URL."/growing_space/".$data["listing_image"];?>">
<br clear="all">
<?php } ?>
	<br><b>Growing Space Location</b>
	<br>Farm Name/House Name: <?php echo $data["farm_name"];?>
	<br>First Line of Address: <?php echo $data["address1"];?>
	<br>Town/City: <?php echo $data["city"];?>
	<br>State: <?php echo $data["state"];?>
	<br>Zip: <?php echo $data["zip"];?>
	<br>Country: <?php echo $country;?>
	<br clear="all"><br>
	<hr>		
  
	<b>Growing Space Details</b>
	<br>Growing Space Style: <?php echo $data["growing_space_style"];?>
	<br>Size: <?php echo $data["growing_space_size"];?>
	<br>Unit Size: <?php echo $data["growing_space_size_unit"];?>
	<br>Period of Availability: <?php echo $data["period_availability"];?>
	<br>Cost: <?php echo $data["growing_space_cost"];?>
	<br>Period: <?php echo $data["growing_space_period"];?>
	<br>Currency: <?php echo $data["currency"];?>	
	<br>Parking Availability: <?php echo $data["growing_space_parking"];?>
	<br>Accommodation: <?php echo $data["growing_space_accommodation"];?>
	<br>Organic Certification: <?php echo $data["growing_space_organic_certification"];?>	
	<br>Site Access Times: <?php echo $data["growing_space_site_access_time"];?>
	
	<?php if(!empty($data["additional_notes"])){?>
	<br clear="all"><br>
	Additional Notes:<br>
	  <?php echo $data["additional_notes"];?>
	<?php }?>
	
		<br>
		<hr>	
  </div>   

<div class="add_new_listing_right">
		<div id="map" class="mappreview">
		Map Preview
		</div>
	<br clear="all"><br>

 </div>
<div class="add_new_listing_middle">

   <b>Contact Details</b>
<br>First Name: <?php echo $data["fname"];?>
<br>Last Name: <?php echo $data["lname"];?>
<br>Email: <?php echo $data["email"];?>
<br>Phone: <?php echo $data["phone"];?>

<br clear="all">

</div>

	<br clear="all">



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
    </script>
	
<?php echo $footer_block;  ?>
