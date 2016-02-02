<?php echo $header_block;?>
<?php
 $fakeid="159303";
?>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> <!-- not this -->
    <!-- Custom styles for this template -->
    <link href="<?php echo FRONTEND_TEMPLATE_URL;?>/map_search/css/starter-template.css" rel="stylesheet">
	<link href="<?php echo FRONTEND_TEMPLATE_URL;?>/map_search/css/ms-style.css" rel="stylesheet">
	
		<div class="map-search">
			 <div class="map">
				<div id="map-canvas"></div>
			</div>
			<div class="side-bar">
				<div id="ms-listings"></div>
				<div id="ms-pagination"></div>
			</div>
		</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="<?php echo FRONTEND_TEMPLATE_URL;?>/map_search/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?php echo FRONTEND_TEMPLATE_URL;?>/map_search/js/jquery.mapSearch.js"></script>
	<script>
	
function objectLength(obj) {
  var result = 0;
  for(var prop in obj) {
    if (obj.hasOwnProperty(prop)) {
    // or Object.prototype.hasOwnProperty.call(obj, prop)
      result++;
    }
  }
  return result;
}

	
		(function ( $ ) {
			
		<?php
		if(!empty($_GET['location'])){
			echo 'var latVal = '.$latLngFrom["lat"].";\n";
			echo 'var LngVal = '.$latLngFrom["lng"].";\n";
		}else{ 
			echo 'var latVal = '.$current_coordinates["0"].";\n";
			echo 'var LngVal = '.$current_coordinates["1"].";\n";
		
		} ?>
		
			$('#map-canvas').mapSearch({
			
				initialPosition:[latVal,LngVal],
				request_uri : '<?php echo SITE_URL;?>/map_search.php?category=<?php echo $_GET['category'];?>&produce=<?php echo $_GET['produce'];?>&location=<?php echo $_GET['location'];?>',  //'http://sbadb.herokuapp.com/v1/bizs',
				zoom: <?php echo $mapZoom;?>,
				search_box : false,

				infowindow_content : function(listing){
                      if(listing.listing_type==""){document.getElementById('search_result').value="no result";}
					  else{document.getElementById('search_result').value="with result";}		
						if(listing.listing_type=="produce"){	
							return '<div class="map_info_window"><a href="/view-details/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'">'+listing.name +'</a><div>';
						}else if(listing.listing_type=="workshops"){
							return '<div class="map_info_window"><a href="/events-workshops/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'">'+listing.name +'</a><div>';
						}else if(listing.listing_type=="organization"){	
							return '<div class="map_info_window"><a href="/profile/?u='+listing.username+'">'+listing.organization_name+'</a><div>';
					    }else{
							return '<div class="map_info_window"><a href="/view-details/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'">'+listing.name +'</a><div>';
						}	
				},
				listing_template : function(listing){	
				
										if(listing.listing_type=="produce"){	
										
										    var other_info ='';
										     if(listing.is_certified_organic!=""){other_info = other_info + "&bull;&nbsp;&nbsp;" +listing.is_certified_organic+"&nbsp;&nbsp;";} 
											 if(listing.is_organic_not_certified!=""){other_info = other_info + "==&bull;&nbsp;&nbsp;" +listing.is_organic_not_certified+"&nbsp;&nbsp;";} 
											 if(listing.is_not_organic!=""){other_info = other_info + "&bull;&nbsp;&nbsp;" +listing.is_not_organic+"&nbsp;&nbsp;";} 
											 if(listing.is_free!=""){other_info = other_info + "&bull;&nbsp;&nbsp;" +listing.is_free+"&nbsp;&nbsp;";} 
											 if(listing.is_accept_trades!=""){other_info = other_info + "&bull;&nbsp;&nbsp;" +listing.is_accept_trades+"&nbsp;&nbsp;";} 
											
											other_info = other_info + "<br><strong>Collection/Delivery:</strong><br>";
											if(listing.pick_up_farm_stand_shop!==""){other_info = other_info + "<br>&bull;&nbsp;&nbsp;'" +listing.pick_up_farm_stand_shop+"'&nbsp;&nbsp;";} 
											if(listing.pick_up_at_property!=""){other_info = other_info + "<br>&bull;&nbsp;&nbsp;" +listing.pick_up_at_property+"&nbsp;&nbsp;";} 
											if(listing.delivery_contact_producer!=""){other_info = other_info + "<br>&bull;&nbsp;&nbsp;" +listing.delivery_contact_producer+"&nbsp;&nbsp;";} 
											if(listing.u_pick!="" && listing.u_pick!="0"){other_info = other_info + "<br>&bull;&nbsp;&nbsp;U Pick&nbsp;&nbsp;";} 
											if(listing.contact_producer!=""){other_info = other_info + "<br>&bull;&nbsp;&nbsp;" +listing.contact_producer+'&nbsp;&nbsp;<a href="/view-details/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'#bform"><span class="glyphicon glyphicon-envelope"></span></a></span>';} 
											if(listing.farmers_market!="" && listing.farmers_market!="0"){
												  other_info = other_info + "<br>&bull;&nbsp;&nbsp;Farmers Market: "+listing.farmers_market_name+" &nbsp;&nbsp;";
											     if(listing.farmers_market_time_from!=""){ other_info = other_info + " / Day:  "+listing.farmers_market_time_day;}
												 if(listing.farmers_market_time_from!=""){
												    other_info = other_info + " - "+listing.farmers_market_time_from+" to "+listing.farmers_market_time_until;
												  }	
											} 
											
												var returnProduce = '<div id="list'+listing.id+'" onMouseOut="slideUp(\'list'+listing.id+'\')" onMouseOver="slideDown(\'list'+listing.id+'\')"  class="listing '+listing.listing_type+'"   >'
												+     '<h3 ><a href="/view-details/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'">'+listing.name +'</a></h3>'
												+	  '<div class="row" >'
												+	       '<div class="col-sm-2">'
												+	  			'<a href="/view-details/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'"><img  alt="'+listing.name +'" class="thumbnail img-responsive" src="'+listing.listing_image+'"></a>'
												+          '</div>'
												+	       '<div class="col-sm-5">'
												+     			'<p><span class="address_label">Address : </span>' + listing.address1+ '</p>'
												+               '<p>'+listing.city+', '+listing.state+' '+listing.zip+'</p>'
												+          '</div>'
												+	       '<div class="col-sm-5 rightalign">'
												+     			'<p><strong>' + listing.currency+' '+ listing.price_per_item+' / '+ listing.quantity_number+' '+ listing.quantity_unit+ '</strong></p>';
												returnProduce =  returnProduce + '<p>'+listing.kldistace+'km</p>';
												returnProduce =  returnProduce + '</div>'
												+     '<div class="row_two">'+other_info+'</div>'
												+	  '</div>'
												+  '</div>';
										
											return returnProduce;
										}else if(listing.listing_type=="workshops"){
												var other_info ='<b>Date / Time / Duration&nbsp;:&nbsp;</b>'+listing.date_time+"<br><br>";
												other_info = other_info + ""+listing.introduction;
												var returnWorkshops = '<div id="list'+listing.id+'" onMouseOut="slideUp(\'list'+listing.id+'\')" onMouseOver="slideDown(\'list'+listing.id+'\')"  class="listing '+listing.listing_type+'"   >'
												+     '<h3 ><a href="/events-workshops/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'">'+listing.name +'</a></h3>'
												+	  '<div class="row" >'
												+	       '<div class="col-sm-2">'
												+	  			'<a href="/events-workshops/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'"><img  alt="'+listing.name +'" class="thumbnail img-responsive" src="'+listing.listing_image+'"></a>'
												+          '</div>'
												+	       '<div class="col-sm-5">'
												+     			'<p><span class="address_label">Address : </span>' + listing.address1+ '</p>'
												+               '<p>'+listing.city+', '+listing.state+' '+listing.zip+'</p>'
												+          '</div>'
												+	       '<div class="col-sm-5 rightalign">'
												+     			'';
												returnWorkshops =  returnWorkshops + '<p>'+listing.kldistace+'km</p>';
												returnWorkshops =  returnWorkshops + '</div>'
												+     '<div class="row_two">'+other_info+'</div>'							
												+	  '</div>'
												+  '</div>';
											return returnWorkshops;	
										}else if(listing.listing_type=="organization"){
												other_info='';
												
												if(listing.offerArr!==''){												
													other_info = other_info + "<strong>Offering:</strong><br>";
													var arrayLength = listing.offerArr.length;
													for (var i = 0; i < arrayLength; i++) {
														other_info = other_info + "&bull;&nbsp;"+listing.offerArr[i]+"<br>";
													}
												}
												
												other_info = other_info + "<br><strong>About:</strong><br>"+listing.description;
												
												returnOrg = '<div id="list'+listing.id+'" onMouseOut="slideUp(\'list'+listing.id+'\')" onMouseOver="slideDown(\'list'+listing.id+'\')"  class="listing  '+listing.listing_type+'"   >'
												+     '<h3 ><a href="/profile/?u='+listing.username+'">'+listing.organization_name+'</a></h3>'
												+	  '<div class="row" >'
												+	       '<div class="col-sm-2">'
												+	  			'<a href="/profile/?u='+listing.username+'"><img alt="'+listing.organization_name+'" class="thumbnail img-responsive" src="'+listing.listing_image+'"></a>'
												+          '</div>'
												+	       '<div class="col-sm-5">'
												+     			'<p><span class="address_label">Address : </span>' + listing.address1+ '</p>'
												+               '<p>'+listing.city+', '+listing.state+' '+listing.zip+'</p>'
												+          '</div>'
												+	       '<div class="col-sm-5 rightalign">'
												+		   '<p><a href="/profile/?u='+listing.username+'#bform"><span class="glyphicon glyphicon-envelope"></span></a>&nbsp;&nbsp;<br>';

												returnOrg =  returnOrg + '<span class="kl">'+listing.kldistace+'km</span></p>';
												returnOrg =  returnOrg + '</div>'
												+     '<div class="row_two">'+other_info+'</div>'											
												+	  '</div>'
												+  '</div>';
											    return returnOrg;	
										}else{		
				//
												return '<div id="list'+listing.id+'" onMouseOut="slideUp(\'list'+listing.id+'\')" onMouseOver="slideDown(\'list'+listing.id+'\')"  class="listing"   >'
												+     '<h3 ><a href="/view-details/?id='+(Math.round(listing.id)+Math.round(<?php echo ($fakeid);?>))+'">'+listing.name +'</a></h3>'
												+	  '<div class="row" >'
												+	       '<div class="col-sm-2">'
												+	  			'<img alt="'+listing.name+'" class="thumbnail img-responsive" src="'+listing.listing_image+'">'
												+          '</div>'
												+	       '<div class="col-sm-5">'
												+     			'<p><strong class="address_label">Address : </strong>' + listing.address1+ '</p>'
												+               '<p>'+listing.city+', '+listing.state+' '+listing.zip+'</p>'
												+          '</div>'

												+	  '</div>'
												+  '</div>';
										}		
									},
			});
		}( jQuery ));
		
	</script>  		
 <input type="hidden"  id="dont_reload_map"> 		
 <input type="hidden" value="<?php echo FRONTEND_TEMPLATE_URL;?>" id="default_url"> 	
 <input type="hidden" value="" id="search_result"> 

<?php echo $footer_block; ?>