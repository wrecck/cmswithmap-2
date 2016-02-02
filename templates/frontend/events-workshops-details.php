<?php echo $header_block; ?>
<div class="main_wrap_pad">
<h1 style="font-size:22px;"><?php echo ucfirst($data["event_seminar_title"]);?></h1>


<form action="" onSubmit="return addNewListingFormSubmit();" id="addnewlisting" method="post" name="user" enctype="multipart/form-data">
	
<div class="add_new_listing_left">

	<br><b>Event/Workshop details:</b>
	<br><span class="labeler">Title:</span> <?php echo $data["event_seminar_title"];?>
	<br><span class="labeler">Date time and duration:</span> <?php echo $data["date_time"];?>
	<br><span class="labeler">Cost:</span> <?php echo $data["currency"];?><?php echo $data["cost"];?>
	<br><br clear="all">
	<?php if(!empty($data["currency"])){?><hr>	<b>Introduction</b><br><?php echo $data["introduction"];?><?php }?>
		<br>
		<hr><b>Location</b><br>
	<br><span class="labeler">First Line of Address:</span> <?php echo $data["address1"];?>
	<br><span class="labeler">Town/City:</span> <?php echo $data["city"];?>
	<br><span class="labeler">State:</span> <?php echo $data["state"];?>
	<br><span class="labeler">Zip:</span> <?php echo $data["zip"];?>
	<br><span class="labeler">Country:</span> <?php echo $country;?>
	<br clear="all"><br>
	<?Php /*<hr>		
  
<b>Contact Details</b>
<br>First Name: <?php echo $data["fname"];?>
<br>Last Name: <?php echo $data["lname"];?>
<br>Email: <?php echo $data["email"];?>
<br>Phone: <?php echo $data["phone"];?>
		<br>
		<hr>	*/?>
  </div>   

<div class="add_new_listing_right">
<?php if($noimage!=1){?>
<img style="margin-top:10px;" width="100%" align="right" src="<?php echo UPLOAD_URL."/event_workshop/".$data["listing_image"];?>">
<br>

<?php } ?>
		<div id="map" class="mappreview">
		Map Preview
		</div>
	<br clear="all"><br>

 </div>
<div class="add_new_listing_middle">


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
