<?php echo $header_block; ?>

<h1>Options Settings</h1>


<form action="" method="post" name="user" enctype="multipart/form-data">
<div class="module_box">
  <div class="module_box_left">
		<?php echo $message;?>

    <div class="rows">  
		  <div class="label">Listing Kilometer Limit</div>
		  <div class="field">
		     <input  class="form-control" type="text" value="<?php echo $data["listing_distance_limit"];?>" name="listing_distance_limit" >
          </div>			  
    </div>		

	
    <div class="rows">  
		  <div class="label">Listing Record Limit</div>
		  <div class="field">
		     <input  class="form-control" type="text" value="<?php echo $data["listing_record_limit"];?>" name="listing_record_limit" >
          </div>			  
    </div>		
	
    <div class="rows">  
		  <div class="label">Free Account Listing<br>Post Limit&nbsp;</div>
		  <div class="field">
		     <input  class="form-control" type="text" value="<?php echo $data["list_post_limit"];?>" name="list_post_limit" >
          </div>			  
    </div>		
		
    <div class="rows">  
		  <div class="label">Currency</div>
		  <div class="field">
		      <textarea class="form-control" name="currency" id="currency"><?php echo $data["currency"];?></textarea>
          </div>			  
    </div>
	
	
    <div class="rows" style="display:none">  
		  <div class="label">Country</div>
		  <div class="field">
		      <textarea class="form-control" name="country" id="country"><?php echo $data["country"];?></textarea>
          </div>			  
    </div>
	
	
    <div class="rows">  
		  <div class="label">Period Availability</div>
		  <div class="field">
		      <textarea class="form-control" name="period_availability" id="period_availability"><?php echo $data["period_availability"];?></textarea>
          </div>			  
    </div>
<br clear="all"><br>	
<b>Produce Listing Options</b>	
<br clear="all"><br>	
    <div class="rows">  
		  <div class="label">Quantity Number</div>
		  <div class="field">
		      <textarea class="form-control" name="quantity_number" id="quantity_number"><?php echo $data["quantity_number"];?></textarea>
          </div>			  
    </div>
 
    <div class="rows">  
		  <div class="label">Quantity Unit</div>
		  <div class="field">
		      <textarea class="form-control" name="quantity_unit" id="quantity_unit"><?php echo $data["quantity_unit"];?></textarea>
          </div>			  
    </div>

    <div class="rows">  
		  <div class="label">Period Availability Limit</div>
		  <div class="field">
		  <input  class="form-control" type="text" value="<?php echo $data["period_availability_limit"];?>" name="period_availability_limit" >
          </div>			  
    </div>


    <div class="rows">  
		  <div class="label">Time From</div>
		  <div class="field">
		      <textarea class="form-control" name="time_from" id="time_from"><?php echo $data["time_from"];?></textarea>
          </div>			  
    </div>

    <div class="rows">  
		  <div class="label">Time Until</div>
		  <div class="field">
		      <textarea class="form-control" name="time_until" id="time_until"><?php echo $data["time_until"];?></textarea>
          </div>			  
    </div>

    <div class="rows">  
		  <div class="label">Day</div>
		  <div class="field">
		      <textarea class="form-control" name="day" id="day"><?php echo $data["day"];?></textarea>
          </div>			  
    </div>	

	
<br clear="all"><br>	
<b>Profile listing options</b>
<br clear="all"><br>	

<div class="rows">  
  <div class="label">Profile Period<br>Availability Limit</div>
  <div class="field">
  <input  class="form-control" type="text" value="<?php echo $data["gs_period_availability_limit"];?>" name="gs_period_availability_limit" >
  </div>			  
</div>
	
<br clear="all"><br>	
<b>Growing  spaces options</b>
<br clear="all"><br>		

    <div class="rows">  
		  <div class="label">Growing Space Style</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_style" id="growing_space_style"><?php echo $data["growing_space_style"];?></textarea>
          </div>			  
    </div>	
	
    <div class="rows">  
		  <div class="label">Growing Space Size</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_size" id="growing_space_size"><?php echo $data["growing_space_size"];?></textarea>
          </div>			  
    </div>	
	
    <div class="rows">  
		  <div class="label">Growing Space Size <br>Unit</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_size_unit" id="growing_space_size_unit"><?php echo $data["growing_space_size_unit"];?></textarea>
          </div>			  
    </div>	
	
<?php /*    <div class="rows">  
		  <div class="label">Growing Space Cost</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_cost" id="growing_space_cost"><?php echo $data["growing_space_cost"];?></textarea>
          </div>			  
    </div>	
	*/?>
	

	
	
    <div class="rows">  
		  <div class="label">Growing Space Period</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_period" id="growing_space_period"><?php echo $data["growing_space_period"];?></textarea>
          </div>			  
    </div>	
	
    <div class="rows">  
		  <div class="label">Growing Space Onsite<br>Tools</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_onsite_tools" id="growing_space_onsite_tools"><?php echo $data["growing_space_onsite_tools"];?></textarea>
          </div>			  
    </div>	
	
    <div class="rows">  
		  <div class="label">Growing Space Parking</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_parking" id="growing_space_parking"><?php echo $data["growing_space_parking"];?></textarea>
          </div>			  
    </div>	
	
    <div class="rows">  
		  <div class="label">Growing Space <br>Accommodation</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_accommodation" id="growing_space_accommodation"><?php echo $data["growing_space_accommodation"];?></textarea>
          </div>			  
    </div>	
	
    <div class="rows">  
		  <div class="label">Growing Space Organic <br>Certification</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_organic_certification" id="growing_space_organic_certification"><?php echo $data["growing_space_organic_certification"];?></textarea>
          </div>			  
    </div>	
								
    <div class="rows">  
		  <div class="label">Growing Space Site <br>Access Time</div>
		  <div class="field">
		      <textarea class="form-control" name="growing_space_site_access_time" id="growing_space_site_access_time"><?php echo $data["growing_space_site_access_time"];?></textarea>
          </div>			  
    </div>	


	
	
		<div class="rows">   
		  <div class="submit_div">
		  <input type="submit" value="Save" name="submit" class="btn btn-tab btn-primary">
		
		  </div>
		 </div>

		 
<br clear="all"><br>	

		
    </div><!--//module_box_left-->
	

	
	  <br clear="all">	
</div><!--//module_box-->
</form>


<?php echo $footer_block;  ?>
