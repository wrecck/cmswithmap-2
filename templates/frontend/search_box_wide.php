  <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize_<?php echo $page_id;?>() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('location')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}
// [END region_geolocation]
</script>
	

    <style>
      #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
    </style>
<div class="search_box_wide <?php echo $page_id;?>">
<form action="/search/" method="get" name="search_form"  id="search_form" onSubmit="return submitSearch();">
  <div class="main_content_width search">
    <center>
		<select  name="category" id="category"  class="form-control category">
		<option value="">Browse</option>
		<option value="all">All</option>
		<?php echo $produceCategory;?>
		<?php echo $plantsCategory;?>
		<?php echo $organizationCategory;?>
		<?php echo $eventsWorkshops;?>
		
		</select>
		<input type="hidden" name="current_coordinates"  id="current_coordinates" value="">
		<input name="produce" id="produce"   type="text"   class="form-control subcategory" placeholder="Search for produce">
		<input name="location" id="location"  type="text"   class="form-control location" placeholder="Location: Street, City">
		<input type="submit"  class="btn btn-tab btn-primary searh" type="button" name="submit" 
		 value="Search">
  </center>
  </div>

</form>
<script>
initialize_<?php echo $page_id;?>();
</script>
<?php if($_SESSION['current_coordinates']==""){?>
<script>
			$.get("http://ipinfo.io", function (response) {
					
					document.getElementById("current_coordinates").value=response.loc;
			}, "jsonp");
</script>			
<?php } ?>	
</div>  