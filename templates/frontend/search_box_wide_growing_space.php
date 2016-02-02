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
      /** @type {HTMLInputElement} */(document.getElementById('location_<?php echo $page_id;?>')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}
// [END region_geolocation]
</script>

<div class="search_box_wide <?php echo $page_id;?>">
<form action="/search-growing-space/" method="get" name="search_form"  id="search_form" onSubmit="return submitSearch();">
  <div class="main_content_width">
		<select  name="style" id="style"  class="form-control category">
		<option value="">Growing Space Type</option>
		<option value="all">All</option>
		<?php echo $growing_space_style;?>
		</select>
		
		<select name="size" id="size"  class="form-control subcategory">
		<option value="">Size</option>
		<option value="all">All</option>
		<?php echo $growing_space_size;?>
		</select>
		<!--<input name="produce" id="produce_<?php echo $page_id;?>"  style="max-width:280px;" type="text"   class="form-control" placeholder="Search for produce">-->
		<input name="location" id="location_<?php echo $page_id;?>"  style="max-width:280px;margin-right: 10px;" type="text"   class="form-control location" placeholder="Location: Street, City">
		<input type="submit"  class="btn btn-tab btn-primary searh" type="button" name="submit" value="Search">
  </div>

</form>

</div>  
<script>
initialize_<?php echo $page_id;?>();
</script>