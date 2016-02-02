<?php
Class Listing{
		
    function saveCroppedProducePhoto(){
		$newfile=$_GET['newfile'];
		$newfile=str_replace("http://localhost",SITE_PATH,$newfile);
		$newfile=str_replace("http://sproutingtrade.com",SITE_PATH,$newfile);
		$destfile=$_GET['dest'];
		if(!copy($newfile,$destfile)){echo "cant";}else{echo "good";}
		
	}

	
function getCoordinates($address){
    $address=trim($address);
	if($address==""){return;}
	$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
	$url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyBendv0fdsSfV-p3jJV3lKEIkOL_0haHMM&address=$address";
	$response = file_get_contents($url);
	$json = json_decode($response,TRUE); //generate array object from the response from the web
    
    
	$coor["lat"]=$json['results'][0]['geometry']['location']['lat'];
	$coor["lng"]=$json['results'][0]['geometry']['location']['lng'];
    return $coor;
}	

public function countListingPost(){
	global $conn; 
	$sql="SELECT * FROM ".LISTING."	WHERE 1  AND userid ='".$_SESSION["user_id"]."'";
	$r=mysqli_query($conn,$sql);
	return mysqli_num_rows($r);
}
	
public function editViewEventWorkshopListing($lid){
	global $conn; 
	$sql="SELECT * FROM ".EVENTWORKSHOPLISTING." WHERE lid ='$lid' ";

	$r=mysqli_query($conn,$sql)
	or die("<br>editViewEventWorkshopListing  error ".mysqli_error());
	$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	return $data;
}		
	
public function editViewGrowingSpaceListing($lid){
	global $conn; 
	$sql="SELECT * FROM ".GROWINGSPACELISTING." WHERE lid ='$lid' ";

	$r=mysqli_query($conn,$sql)
	or die("<br>editViewGrowingSpaceListing  error ".mysqli_error());
	$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	return $data;
}	
	
public function editViewListing($lid){
	global $conn; 
	$sql="SELECT * FROM ".LISTING." WHERE lid ='$lid' ";

	$r=mysqli_query($conn,$sql)
	or die("<br>get view listing type error ".mysqli_error());
	$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	return $data;
}


public function deleteEventWorkShopListing($id){
	global $conn;
	$sql="DELETE FROM ".EVENTWORKSHOPLISTING." WHERE lid ='$id' ";
	$r=mysqli_query($conn,$sql)
	or die("<br>deleteListing ".mysqli_error());
	return "Event/Workshop listing has been deleted successfully.";
}


public function deleteGrowingSpaceListing($id){
	global $conn;
	$sql="DELETE FROM ".GROWINGSPACELISTING." WHERE lid ='$id' ";
	$r=mysqli_query($conn,$sql)
	or die("<br>deleteListing ".mysqli_error());
	return "Growing Space listing has been deleted successfully.";
}

public function deleteListing($id){
	global $conn;
	$sql="DELETE FROM ".LISTING." WHERE lid ='$id' ";
	$r=mysqli_query($conn,$sql)
	or die("<br>deleteListing ".mysqli_error());
	return "Listing has been deleted successfully.";
}

public function ajaxSearchLocation($key,$type=false){
	global $conn;
	
	if($type==2){
	
		 $sql='
			SELECT 
			*,
			ls.zip as zipcode,
			ls.address1,ls.city,
			ls.state,
			us.first_name as ufirst_name,
			us.last_name as ulast_name,
			ct.name as countryname
			FROM '.GROWINGSPACELISTING.' ls
			LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
			LEFT JOIN '.USERS_TABLE.' us ON ls.userid = us.id ';
			$sql.="WHERE 1  ";
		   
		    $sql.=" AND CONCAT(ls.address1,' ',ls.address2,', ',ls.city,', ',ls.state,' ',ls.zip,' ',ct.name) 
			LIKE '%".$_GET['key']."%' 
			LIMIT 0,50
			";
		
	}else{
			$sql='
			SELECT 
			*,
			ls.zip as zipcode,
			ls.address1,ls.city,
			ls.state,
			us.first_name as ufirst_name,
			us.last_name as ulast_name,
			lp.name as catname, 
			lpsub.name subcatname,
			ct.name as countryname,
			lp.cat_image as cat_image
			FROM '.LISTING.' ls
			LEFT JOIN '.PRODUCECATEGORY.' lp ON ls.produce_category = lp.id
			LEFT JOIN '.PRODUCESUBCATEGORY.' lpsub ON ls.produce = lpsub.id
			LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
			LEFT JOIN '.USERS_TABLE.' us ON ls.userid = us.id ';
			
			$sql.="WHERE 1 AND date_add(SUBSTRING(date_entry,1,10), INTERVAL `period_availability` DAY) >= CURDATE() ";
		   
		   $sql.=" AND CONCAT(ls.address1,' ',ls.address2,', ',ls.city,', ',ls.state,' ',ls.zip,' ',ct.name) 
							LIKE '%".$_GET['key']."%' 
			LIMIT 0,50
			";
	}		
   
   $r=mysqli_query($conn,$sql)
		or die("<br>ajaxSearchLocation error ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
          $address=$data["address1"];
		  //full address
		  $address = preg_replace('/[0-9]+/', '', $address);
		  if(!empty($data["city"])){$address.=", ".$data["city"];}
		  if(!empty($data["state"])){$address.=", ".$data["state"];}
		 // if(!empty($data["zipcode"])){$address.=" ".$data["zipcode"];}
		  if(!empty($data["countryname"])){$addressFull=$address.=", ".$data["countryname"];}
		 
		  if(!empty($data["city"])){$addressCity="".$data["city"];}
		  if(!empty($data["state"])){$addressCity.=", ".$data["state"];}
		  //if(!empty($data["zipcode"])){$addressCity.=" ".$data["zipcode"];}
		  if(!empty($data["countryname"])){$addressCity.=", ".$data["countryname"];}
		  
				$list[] = array( 
					'id' => $data["id"],
					'title' => trim($addressFull),
					'slug' => $data["slug"]);
					
				if(!in_array(trim($addressCity),$list)){	
					$list[] = array( 
					'id' => $data["id"],
					'title' => trim($addressCity),
					'slug' => $data["slug"]);
				}
		 }
		
      		
		return json_encode($list);		 
}


public function ajaxSearchProduceSubCat($key){
	global $conn;
   $sql="SELECT * FROM ".PRODUCESUBCATEGORY." WHERE name LIKE '%$key%' ";
   $r=mysqli_query($conn,$sql)
		or die("<br>ajaxSearchProduceSubCat error ".mysqli_error());
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
  
				$list[] = array( 
					'id' => $data["id"],
					'title' => $data["name"],
					'slug' => $data["slug"]);
		 }
		
      		
		return json_encode($list);		 
}

public function logSearch(){
	global $conn;
	$sql="INSERT INTO ".LOGSEARCH." ( `type`, `category`, `produce`, `location`, `search`, `date`) 
			 VALUES ('listing',
			         '".$_GET['category']."',
			         '".$_GET['produce']."',					 
			         '".$_GET['location']."',
			         '".$_GET['search']."',
			         '".date("Y-m-d g:i:s")."')";
				   $r=mysqli_query($conn,$sql)
				or die("<br>logSearch error ".mysqli_error($conn));
					 
}



public function searchOrganisationListing(){
global $conn;
$optionData=Page::getOptionsSettings();
$recordPerPage=$optionData["listing_record_limit"];
$klLimit=$optionData["listing_distance_limit"];


if(!empty($_GET['page'])){$currentPage=(($_GET['page']-1)*$recordPerPage);}else{$currentPage=0;}

$location=$_GET['location'];
$latLngFrom = $this->getCoordinates($location);


if(!empty($location)){  //get location coordinates
  $location=str_replace(" ","%",$location);
}
if($_GET['submit']=="Search"){$this->logSearch();}

    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) as kldistace, ';}
		
	$sql.='
	ls.id lid,
	ls.lng as lslng,
	ls.lat as lslat,
	ls.address1,ls.city,
	ls.state,
	ls.first_name as ufirst_name,
	ls.last_name as ulast_name,
	ct.name as countryname
	FROM '.USERS_TABLE.' ls
	LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
    ';
	
    $sql.="WHERE ls.profile_type ='4' AND ( 1 ";
	
	if(!empty($location)){ 
		/*$sql.='(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - lng) * COS(ls.lat / 57.3), 2))*1.609344) AS kdistance, ';*/
		
		$sql.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}
	
    if($_GET['style']!="all" AND $_GET['style']!=""){
		$sql.=" AND ls.growing_space_style ='".$_GET['style']."'   "; 
	}
	
    if($_GET['size']!="all" AND $_GET['size']!=""){
		$sql.=" AND ls.growing_space_size ='".$_GET['size']."'   "; 
	}	
	
	if(!empty($_GET['category']) AND $_GET['category']!='all'){ 
			
		$sql.=" AND ls.offer LIKE '%".$_GET['category']."%'";
	}
	
	if(!empty($_GET['produce'])){
		$sql.=" AND ls.offer LIKE '%".$_GET['produce']."%' "; 
	}		

	if(!empty($location)){ 
		$sql.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}	
	
   $sql.=' )';
	
    if(!empty($_GET['location'])){
	   $sql.="	ORDER BY FIELD(CONCAT(' ',ls.address1,' ',ls.city,' ',ls.state,' ',ls.zip,' ',ct.name), 'Ilene%Terrace') ";
    }else{
	   $sql.='	ORDER BY ls.id DESC ';	
	}
  
	//echo $sql; 
	$rCount=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$totalRows = mysqli_num_rows($rCount);
    $sql.=" LIMIT $currentPage, $recordPerPage ";
   
	
// echo $sql;
 // echo "<hr>";
 
   $r=mysqli_query($conn,$sql)
		or die("<br>searchListing error ".mysqli_error($conn));
		
	
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
			
			    $lldata=$this->getCoordinates($data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["zip"].", ".$data["country"]);
				$list[] = array( 
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],								
					'listing_image' => $data["listing_image"],
					'avatar' => $data["avatar"],
					'address1' => $data["address1"],
					'address2' => $data["address2"],
					'city' => $data["city"],
					'state' => $data["state"],
					'zip' => $data["zip"],
					'country' => $data["countryname"],
					'growing_space_cost' => $data["growing_space_cost"],
					'kldistace'  => number_format($data["kldistace"],2)."km",					
					'description' => $data["description"],	
					'organization_name' => $data["organization_name"],	
					'offerArr' => $data["offer"],
					'lat' => $data["lslat"],
					'lng' => $data["lslng"],
					'username' => $data["username"],
					'offerArr' => unserialize($data["offer"]),
					'total_rows' => $totalRows,
					'recordPerPage' => $recordPerPage,
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }
					 
		return $list;
}		


		
public function searchGrowingSpaceListing(){
global $conn;
$optionData=Page::getOptionsSettings();
$recordPerPage=$optionData["listing_record_limit"];
$klLimit=$optionData["listing_distance_limit"];


if(!empty($_GET['page'])){$currentPage=(($_GET['page']-1)*$recordPerPage);}else{$currentPage=0;}

$location=$_GET['location'];
$latLngFrom = $this->getCoordinates($location);


if(!empty($location)){  //get location coordinates
  $location=str_replace(" ","%",$location);
}
if($_GET['submit']=="Search"){$this->logSearch();}

    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) as kldistace, ';}
		
	$sql.='
	ls.lng as lslng,
	ls.lat as lslat,
	ls.address1,ls.city,
	ls.state,
	us.first_name as ufirst_name,
	us.last_name as ulast_name,
	ct.name as countryname
	FROM '.GROWINGSPACELISTING.' ls
	LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
	LEFT JOIN '.USERS_TABLE.' us ON ls.userid = us.id ';
	
    $sql.="WHERE 1 AND date_add(SUBSTRING(date_entry,1,10), INTERVAL `period_availability` DAY) >= CURDATE() ";
	

	if(!empty($location)){ 
		/*$sql.='(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - lng) * COS(ls.lat / 57.3), 2))*1.609344) AS kdistance, ';*/
		
		$sql.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}
	
    if($_GET['style']!="all" AND $_GET['style']!=""){
		$sql.=" AND ls.growing_space_style ='".$_GET['style']."'   "; 
	}
	
    if($_GET['size']!="all" AND $_GET['size']!=""){
		$sql.=" AND ls.growing_space_size ='".$_GET['size']."'   "; 
	}	
	
	if(!empty($location)){ 
			
		$sql.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}
	
	
	//$sql.='	ORDER BY date_entry DESC ';
    if(!empty($_GET['location'])){
	   $sql.="	ORDER BY FIELD(CONCAT(' ',ls.address1,' ',ls.city,' ',ls.state,' ',ls.zip,' ',ct.name), 'Ilene%Terrace') ";
    }else{
	   $sql.='	ORDER BY date_entry DESC ';	
	}
  
  
	$rCount=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$totalRows = mysqli_num_rows($rCount);
    $sql.=" LIMIT $currentPage, $recordPerPage ";
   
	
// echo $sql;
 // echo "<hr>";
 
   $r=mysqli_query($conn,$sql)
		or die("<br>searchListing error ".mysqli_error($conn));
		
	
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
  
				$list[] = array( 
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],								
					'listing_image' => $data["listing_image"],
					'farm_name' => $data["farm_name"],
					'address1' => $data["address1"],
					'address2' => $data["address2"],
					'city' => $data["city"],
					'state' => $data["state"],
					'zip' => $data["zip"],
					'country' => $data["countryname"],
					'growing_space_cost' => $data["growing_space_cost"],
					'kldistace'  => number_format($data["kldistace"],2)."km",					
					'currency' => $data["currency"],	
					'quantity_number' => $data["quantity_number"],	
					'quantity_unit' => $data["quantity_unit"],
					'is_certified_organic' => $data["is_certified_organic"],
					'is_organic_not_certified' => $data["is_organic_not_certified"],
					'is_not_organic' => $data["is_not_organic"],
					'is_free' => $data["is_free"],
					'is_accept_trades' => $data["is_accept_trades"],		
					'lat' => $data["lslat"],
					'lng' => $data["lslng"],
					'price_per_item' => $data["price_per_item"],	
					'catname' => $data["catname"],
					'cat_image' => $data["cat_image"],
					'subcatname' => $data["subcatname"],

					'pick_up_farm_stand_shop' => $data["pick_up_farm_stand_shop"],
					'pick_up_farm_stand_shop_timefrom' => $data["pick_up_farm_stand_shop_timefrom"],
					'pick_up_farm_stand_shop_timeuntil' => $data["pick_up_farm_stand_shop_timeuntil"],
					'pick_up_at_property' => $data["pick_up_at_property"],
					'pick_up_at_property_timefrom' => $data["pick_up_at_property_timefrom"],
					'pick_up_at_property_timeuntil' => $data["pick_up_at_property_timeuntil"],
					'delivery_contact_producer' => $data["delivery_contact_producer"],
					
					'accepted_payment' => $data["accepted_payment"],
					'additional_notes' => $data["additional_notes"],
					'total_rows' => $totalRows,
					'recordPerPage' => $recordPerPage,
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }
					 
		return $list;
}	

public function isCountrySearch(){
	global $conn;
	$sql="SELECT * FROM ".COUNTRIES." WHERE name LIKE '".$_GET['location']."%' ";
	$r=mysqli_query($conn,$sql);
	mysqli_num_rows($r);
	
	if(mysqli_num_rows($r)>0){return "yes";}else{return "no";}
	
}

public function mapZoom(){
    if($this->isCountrySearch()=="yes"){$zoomMap=4;}else{$zoomMap=7;}
    $arrayLoc=explode(",",$_GET['location']);
	if(count($arrayLoc)==4){$zoomMap=12;}
	if(count($arrayLoc)==3){$zoomMap=10;}
	
	//overwrite if its a specific country search 
	if($_GET['location']=="New Zealand"){$zoomMap=7;}
	

	return $zoomMap;
}

public function searchListingJson(){
	global $conn;
	$optionData=Page::getOptionsSettings();
	$recordPerPage=$optionData["listing_record_limit"];
	$klLimit=$optionData["listing_distance_limit"];
	$ne_lat = $_GET['ne_lat'];
	$sw_lat = $_GET['sw_lat'];
	$ne_lng = $_GET['ne_lng'];
	$sw_lng = $_GET['sw_lng'];	

	if(!empty($_GET['page'])){$currentPage=(($_GET['page']-1)*$recordPerPage);}else{$currentPage=0;}



	$location=$_GET['location'];
if(!empty($location)){  //get location coordinates
	$latLngFrom = $this->getCoordinates($location);
	$location=str_replace(" ","%",$location);
}

if($_GET['submit']=="Search"){$this->logSearch();}


//# produce listing
    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) as kldistace, ';
		}
		
	$sql.='	
	ls.lng as lslng,
	ls.lat as lslat,
	ls.address1,ls.city,
	ls.state,
	us.first_name as ufirst_name,
	us.last_name as ulast_name,
	lp.name as catname, 
	lpsub.name subcatname,
	ct.name as countryname,
	lp.cat_image as cat_image
	FROM '.LISTING.' ls
	LEFT JOIN '.PRODUCECATEGORY.' lp ON ls.produce_category = lp.id
	LEFT JOIN '.PRODUCESUBCATEGORY.' lpsub ON ls.produce = lpsub.id
	LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
	LEFT JOIN '.USERS_TABLE.' us ON ls.userid = us.id ';
	
    $sql.="WHERE 1 AND date_add(SUBSTRING(ls.published_date,1,10), INTERVAL `period_availability` DAY) >= CURDATE() ";
	//$sql.=" AND status ='published' ";
	
	if($_GET['category']!="all" AND $_GET['category']!=""){
		$sql.="AND lp.slug ='".$_GET['category']."'   "; 
	}
	
	if(!empty($_GET['produce'])){
		$sql.="AND (lpsub.name ='".$_GET['produce']."' OR "; 
		$sql.=" CONCAT(' ', ls.search_keywords, ' ')  LIKE '%".$_GET['produce']."%') "; 
	}	
	
	if(!empty($_GET['uid'])){
		$sql.="AND ls.userid  ='".$_GET['uid']."' "; 
	}	
	
	
	if(!empty($location)){ 
			
		$sqlRemove.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}
	
  /*  $sql.=" AND
	ls.lat  < '$ne_lat' 
	AND ls.lat  > '$sw_lat' 
	AND ls.lng > '$ne_lng' 
	AND ls.lng < '$sw_lng'"; */
	 $sql.=" AND ls.lat  < '$ne_lat' 	AND ls.lat  > '$sw_lat' 
	         AND SUBSTRING(ls.lng,2) > ".substr($ne_lng,1)." AND SUBSTRING(ls.lng,2) < '".substr($sw_lng,1)."' ";
	
	
	//$sql.='	ORDER BY date_entry DESC ';
    if(!empty($_GET['location'])){
	   $sql.="	ORDER BY kldistace ";
    }else{
	   $sql.='	ORDER BY ls.date_entry DESC ';	
	   $sql.="   LIMIT 0, 100 ";
	}
	 //echo $sql;
	// echo "\n----------------------------\n";
	$rCount=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$totalRows = mysqli_num_rows($rCount);
   // $sql.=" LIMIT $currentPage, $recordPerPage ";

   $r=mysqli_query($conn,$sql)
		or die("<br>searchListing error ".mysqli_error($conn));
		
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
		 if(!empty($data["listing_image"])){
			 $listing_image=UPLOAD_URL."/listing/".$data["listing_image"];
		     $small_listing_image=UPLOAD_URL."/listing/small_".$data["listing_image"];
			 if(!file_exists($small_listing_image)){$this->imageResizeOnServer("listing_image",$data["listing_image"],$listing_image);}
			 $listing_image=$small_listing_image;
			 
		}else{$listing_image=UPLOAD_URL."/category/".$data["cat_image"];}
				$list[] = array(
					'listing_type' => "produce",	
					'id' => $data["lid"],
					'name' => $data["subcatname"]." - ".$data["specific_variety"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],								
					'listing_image' => $listing_image,
					'farm_name' => $data["farm_name"],
					'address1' => $data["address1"],
					'address2' => $data["address2"],
					'city' => $data["city"],
					'state' => $data["state"],
					'specific_variety' => $data["specific_variety"],
					'zip' => $data["zip"],
					'country' => $data["countryname"],					
					'currency' => $data["currency"],	
					'quantity_number' => $data["quantity_number"],	
					'quantity_unit' => $data["quantity_unit"],
					'is_certified_organic' => $data["is_certified_organic"],
					'is_organic_not_certified' => $data["is_organic_not_certified"],
					'is_not_organic' => $data["is_not_organic"],
					'is_free' => $data["is_free"],
					'is_accept_trades' => $data["is_accept_trades"],		
					'lat' => $data["lslat"],
					'lng' => $data["lslng"],
					'latlon' => array($data["lslng"],$data["lslat"]),
					'price_per_item' => $data["price_per_item"],	
					'catname' => $data["catname"],
					'cat_image' => $data["cat_image"],
					'subcatname' => $data["subcatname"],
					'kldistace'  => number_format($data["kldistace"],2)."",
					'pick_up_farm_stand_shop' => $data["pick_up_farm_stand_shop"],
					'pick_up_farm_stand_shop_timefrom' => $data["pick_up_farm_stand_shop_timefrom"],
					'pick_up_farm_stand_shop_timeuntil' => $data["pick_up_farm_stand_shop_timeuntil"],
					'pick_up_at_property' => $data["pick_up_at_property"],
					'pick_up_at_property_timefrom' => $data["pick_up_at_property_timefrom"],
					'pick_up_at_property_timeuntil' => $data["pick_up_at_property_timeuntil"],
					'u_pick' => $data["u_pick"],
					'contact_producer' => $data["contact_producer"],
					'delivery_contact_producer' => $data["delivery_contact_producer"],
					
					'farmers_market' => $data["farmers_market"],
					'farmers_market_name' => $data["farmers_market_name"],
					'farmers_market_time_from' => $data["farmers_market_time_from"],
					'farmers_market_time_until' => $data["farmers_market_time_until"],
					'farmers_market_time_day' => $data["farmers_market_time_day"],
					
					'accepted_payment' => $data["accepted_payment"],
					'additional_notes' => $data["additional_notes"],
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }
					 
		 
			
					 
					 
	

		//### Organization
    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) as kldistace, ';}
		
	$sql.='
	ls.id lid,
	ls.lng as lslng,
	ls.lat as lslat,
	ls.address1,ls.city,
	ls.state,
	ls.first_name as ufirst_name,
	ls.last_name as ulast_name,
	ct.name as countryname
	FROM '.USERS_TABLE.' ls
	LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
    ';
	
    $sql.="WHERE ls.organization_name!='' AND ls.isprofiled ='1' 
           AND date_add(SUBSTRING(ls.published_date,1,10), INTERVAL ".$optionData["gs_period_availability_limit"]." DAY) >= CURDATE() 
	       AND  ( 1 ";  // ls.profile_type ='4'
	
	if(!empty($location)){ 
		/*$sql.='(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - lng) * COS(ls.lat / 57.3), 2))*1.609344) AS kdistance, ';*/
		
		$sqlRemoved.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}
	
    if($_GET['style']!="all" AND $_GET['style']!=""){
		$sql.=" AND ls.growing_space_style ='".$_GET['style']."'   "; 
	}
	
    if($_GET['size']!="all" AND $_GET['size']!=""){
		$sql.=" AND ls.growing_space_size ='".$_GET['size']."'   "; 
	}	
	
	if(!empty($_GET['category']) AND $_GET['category']!='all'){ 
			$catSearch=$_GET['category'];
			$catSearch=str_replace("/","%",$catSearch);
			$catSearch=str_replace("-"," ",$catSearch);
		$sql.=" AND ls.offer LIKE '%".$catSearch."%'";
		$sql.=" OR ls.ppoffer LIKE '%".$catSearch."%'";
	}
	
	  //$sql.=" AND ls.lat  < '$ne_lat' AND ls.lat  > '$sw_lat' AND ls.lng < '$ne_lng' AND ls.lng > '$sw_lng' "; 	
  
	 
		$pos = strpos(strtolower(" ".$location), "victoria");

    if ($pos !== false) {
		$sql.=" AND ls.lat  < '$ne_lat' 	AND ls.lat  > '$sw_lat' 
			 AND SUBSTRING(ls.lng,2) > ".substr($ne_lng,1)." AND SUBSTRING(ls.lng,2) < '".substr($sw_lng,1)."' ";

	 }else{
			
		/*	 $sw_lat_comp=str_replace('-','',$sw_lat);	
			 $ne_lat_comp=str_replace('-','',$ne_lat);	
			
			 if($_GET['location']!="United States"){
			   $sw_lng_comp=str_replace('-','',$sw_lng);	
			   $ne_lng_comp=str_replace('-','',$ne_lng);
			}*/
	 
	  if($sw_lat>$ne_lat){
		 $lat1=$ne_lat;
		 $lat2=$sw_lat;
	  }else{
		 $lat1=$sw_lat;
		 $lat2=$ne_lat;
	  }	 

	  if($sw_lng>$ne_lng){
		 $lng1=$ne_lng;
		 $lng2=$sw_lng;
	  }else{
		 $lng1=$sw_lng;
		 $lng2=$ne_lng;
	  }	

		 
			$sql.=" AND ls.lat BETWEEN $lat1 AND $lat2 AND ls.lng BETWEEN $lng1 AND $lng2 "; 	
	 }
	

	
	
	if(!empty($_GET['produce'])){
		$sql.=" AND (
		ls.offer LIKE '%".$_GET['produce']."%' OR "; 
		$sql.="  
		ls.description LIKE '%".$_GET['produce']."%' OR
		CONCAT(' ', ls.search_keywords, ' ')  LIKE '%".$_GET['produce']."%'
		OR ls.ppoffer LIKE '%".$_GET['produce']."%'
		) "; 
		$sql.="  ";
	}		

	
   $sql.=' )';
	

	
    if(!empty($_GET['location'])){
	   $sql.="	ORDER BY kldistace ";//FIELD(CONCAT(' ',ls.address1,' ',ls.city,' ',ls.state,' ',ls.zip,' ',ct.name), 'Ilene%Terrace') ";
    }else{
	   $sql.='	ORDER BY ls.id DESC ';	
	   $sql.="  LIMIT 0,100 ";
	}

if($_GET['debug']==1){
	echo "post: $pos \n";
  echo $sql;
  echo "\n----------------------------\n";
}
	$rCount=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$totalRows = mysqli_num_rows($rCount) + $totalRows;
    //$sql.=" LIMIT $currentPage, $recordPerPage ";
   
	

 
   $r=mysqli_query($conn,$sql)
		or die("<br>searchListing error ".mysqli_error($conn));
		
	
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
		 if(!empty($data["avatar"])){
			 $listing_image=UPLOAD_URL."/avatar/".$data["avatar"];
			 $small_listing_image=UPLOAD_URL."/avatar/small_".$data["avatar"];
			 if(!file_exists($small_listing_image)){$this->imageResizeOnServer("avatar_image",$data["avatar"],$listing_image);}
			 $listing_image=$small_listing_image;
		}else{$listing_image=UPLOAD_URL."/event_workshop/no_image.png";}			 
			
					   if(!empty($data["organization_name"])){
						$infoDetails="<a href=\"".$link."\"><b>".str_replace("'","&#39;",$data["organization_name"])."</b></a><br>";
						$infoDetails.="".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."";
						$name=str_replace("'","&#39;",$data["organization_name"]);
						}
						else{$infoDetails="<a href=\"".$link."\"><b>".$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"]."</b></a>";
						$name=$data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["country"];
						}
						
			    //$lldata=$this->getCoordinates($data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["zip"].", ".$data["country"]);
				$list[] = array( 
				    'listing_type' => "organization",
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'name' => $name,
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],								
					'listing_image' => $listing_image,
					'avatar' => $data["avatar"],
					'address1' => $data["address1"],
					'address2' => $data["address2"],
					'city' => $data["city"],
					'state' => $data["state"],
					'zip' => $data["zip"],
					'country' => $data["countryname"],
					'growing_space_cost' => $data["growing_space_cost"],
					'kldistace'  => number_format($data["kldistace"],2)."",					
					'description' =>  substr($data["description"],0,200)."...",	
					'organization_name' => $data["organization_name"],	
					'offerArr' => $data["offer"],
					'lat' => $data["lslat"],
					'lng' => $data["lslng"],
					'latlon' => array($data["lslng"],$data["lslat"]),
					'username' => $data["username"],
					'offerArr' => unserialize($data["offer"]),
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }	
		 
		 if($_GET['category']=="Events Workshops"){ //make sure its just events as requested by user
			unset($list);
			$list = array();
         }
		 
		 //### EVENT AND WORKSHOP
		 
    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ev.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ev.lng) * COS(ev.lat / 57.3), 2))*1.609344) as kldistace, ';}
	$sql.='	
	ev.fname as ufirst_name,
	ev.lname as ulast_name,
	ev.lat as evlat,
	ev.lng as evlng,
    ev.address1,
	ev.city,
	ev.state,
	ev.zip,
	ev.country,
	ev.lat,
	ev.lng
	FROM '.EVENTWORKSHOPLISTING.' ev
	LEFT JOIN '.USERS_TABLE.' u ON ev.userid = u.id
	WHERE 1 ';
	

   $sql.=" AND ev.status = 'published'   AND  ev.event_seminar_title!='' 
           AND STR_TO_DATE(TRIM(SUBSTRING(ev.date_time,22,11)),'%m/%d/%Y') >='".date("Y-m-d")."'
   ";	
	

	if(!empty($_GET['produce'])){
		$sql.=" AND (ev.event_seminar_title LIKE '%".$_GET['produce']."%' OR "; 
		$sql.="  ev.introduction LIKE '%".$_GET['produce']."%') "; 
	}		

	if(!empty($location)){ 
		$sqlRemoved.=' AND (SQRT(POW(69.1 * (ev.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ev.lng) * COS(ev.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}		
	
	//	$sql.=" AND
	//ev.lat  < '$ne_lat' AND ev.lat  > '$sw_lat' AND ev.lng > '$ne_lng' AND ev.lng < '$sw_lng'"; 
	
	 $sql.=" AND ev.lat  < '$ne_lat' 	AND ev.lat  > '$sw_lat' 
	         AND SUBSTRING(ev.lng,2) > ".substr($ne_lng,1)." AND SUBSTRING(ev.lng,2) < '".substr($sw_lng,1)."' ";
		
	
	$sql.=' ORDER BY date_entry DESC	';
	if(empty($location)){ 
	$sql.=' LIMIT 0, 100';	
	}

	//echo $sql;
	//echo "\n===================\n";
   $r=mysqli_query($conn,$sql)
		or die("<br>viewEventWorkshopListing error. ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
		    if(!empty($data["avatar"])){$listing_image=UPLOAD_URL."/event_workshop/".$data["listing_image"];}
		    else{$listing_image=UPLOAD_URL."/event_workshop/no_image.png";}		
		 
				$list[] = array( 
				    'listing_type' => "workshops",
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],
				    'name'=>$data["event_seminar_title"],
					'address1' => $data["address1"],		
					'city' => $data["city"],		
					'state' => $data["state"],		
					'zip' => $data["zip"],		
					'country' => $data["country"],		
					'listing_image' => $listing_image,
					'kldistace' => number_format($data["kldistace"],2)."",		
					'event_seminar_title' => $data["event_seminar_title"],	
					'introduction' => substr($data["introduction"],0,100),	
					'date_time' => $data["date_time"],	
					'cost' => $data["cost"],	
					'currency' => $data["currency"],	
					
					'lat' => $data["evlat"],
					'lng' => $data["evlng"],
					'latlon' => array($data["evlng"],$data["evlat"]),
					'options' => '<a href="'.SITE_URL.'/growing-space-listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
					
         }	 
		 
		 
if($_GET['location']!=""){  //sort by kilometer if search is with location
	$distance = array();
	foreach ($list as $key => $row)
	{
		$distance[$key] = $row['kldistace'];
	}
   array_multisort($distance, SORT_ASC, $list);
}
		 
		 
		 
$count=count($list);
$total_pages=ceil($recordPerPage/$count);
$metaArr[]=array("page" => "1", "per_page" => "$recordPerPage", "count" => "$count", "total_pages"=> "$total_pages");

//print_r($list);
$results=array("results"=>$list, "meta"=>$metaArr);    
echo json_encode($this->utf8ize($results));
//echo json_encode($results);


}

public function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = $this->utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

public function searchListing(){
global $conn;
$optionData=Page::getOptionsSettings();
$recordPerPage=$optionData["listing_record_limit"];
$klLimit=$optionData["listing_distance_limit"];


if(!empty($_GET['page'])){$currentPage=(($_GET['page']-1)*$recordPerPage);}else{$currentPage=0;}

$location=$_GET['location'];
$latLngFrom = $this->getCoordinates($location);


if(!empty($location)){  //get location coordinates
  $location=str_replace(" ","%",$location);
}

if($_GET['submit']=="Search"){$this->logSearch();}

//# produce listing
    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) as kldistace, ';}
		
	$sql.='	
	ls.lng as lslng,
	ls.lat as lslat,
	ls.address1,ls.city,
	ls.state,
	us.first_name as ufirst_name,
	us.last_name as ulast_name,
	lp.name as catname, 
	lpsub.name subcatname,
	ct.name as countryname,
	lp.cat_image as cat_image
	FROM '.LISTING.' ls
	LEFT JOIN '.PRODUCECATEGORY.' lp ON ls.produce_category = lp.id
	LEFT JOIN '.PRODUCESUBCATEGORY.' lpsub ON ls.produce = lpsub.id
	LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
	LEFT JOIN '.USERS_TABLE.' us ON ls.userid = us.id ';
	
    $sql.="WHERE 1 AND date_add(SUBSTRING(published_date,1,10), INTERVAL `period_availability` DAY) >= CURDATE() ";
	
	if($_GET['category']!="all" AND $_GET['category']!=""){
		$sql.="AND lp.slug ='".$_GET['category']."'   "; 
	}
	
	if(!empty($_GET['produce'])){
		$sql.="AND lpsub.name ='".$_GET['produce']."' "; 
	}	
	
	if(!empty($_GET['uid'])){
		$sql.="AND ls.userid  ='".$_GET['uid']."' "; 
	}	
	
	
	if(!empty($location)){ 
			
		$sql.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}
	
	
	//$sql.='	ORDER BY date_entry DESC ';
    if(!empty($_GET['location'])){
	   $sql.="	ORDER BY FIELD(CONCAT(' ',ls.address1,' ',ls.city,' ',ls.state,' ',ls.zip,' ',ct.name), 'Ilene%Terrace') ";
    }else{
	   $sql.='	ORDER BY date_entry DESC ';	
	   $sql.="   LIMIT 0, 100 ";
	}
	
	$rCount=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$totalRows = mysqli_num_rows($rCount);
   // $sql.=" LIMIT $currentPage, $recordPerPage ";


	//echo $sql;
	//echo "<hr>";
   $r=mysqli_query($conn,$sql)
		or die("<br>searchListing error ".mysqli_error($conn));

	
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
  
				$list[] = array(
					'listing_type' => "produce",	
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],								
					'listing_image' => $data["listing_image"],
					'farm_name' => $data["farm_name"],
					'address1' => $data["address1"],
					'address2' => $data["address2"],
					'city' => $data["city"],
					'state' => $data["state"],
					'specific_variety' => $data["specific_variety"],
					'zip' => $data["zip"],
					'country' => $data["countryname"],					
					'currency' => $data["currency"],	
					'quantity_number' => $data["quantity_number"],	
					'quantity_unit' => $data["quantity_unit"],
					'is_certified_organic' => $data["is_certified_organic"],
					'is_organic_not_certified' => $data["is_organic_not_certified"],
					'is_not_organic' => $data["is_not_organic"],
					'is_free' => $data["is_free"],
					'is_accept_trades' => $data["is_accept_trades"],		
					'lat' => $data["lslat"],
					'lng' => $data["lslng"],
					'price_per_item' => $data["price_per_item"],	
					'catname' => $data["catname"],
					'cat_image' => $data["cat_image"],
					'subcatname' => $data["subcatname"],
					'kldistace'  => number_format($data["kldistace"],2)."",
					'pick_up_farm_stand_shop' => $data["pick_up_farm_stand_shop"],
					'pick_up_farm_stand_shop_timefrom' => $data["pick_up_farm_stand_shop_timefrom"],
					'pick_up_farm_stand_shop_timeuntil' => $data["pick_up_farm_stand_shop_timeuntil"],
					'pick_up_at_property' => $data["pick_up_at_property"],
					'pick_up_at_property_timefrom' => $data["pick_up_at_property_timefrom"],
					'pick_up_at_property_timeuntil' => $data["pick_up_at_property_timeuntil"],
					'u_pick' => $data["u_pick"],
					'contact_producer' => $data["contact_producer"],
					'delivery_contact_producer' => $data["delivery_contact_producer"],
					
					'farmers_market' => $data["farmers_market"],
					'farmers_market_name' => $data["farmers_market_name"],
					'farmers_market_time_from' => $data["farmers_market_time_from"],
					'farmers_market_time_until' => $data["farmers_market_time_until"],
					'farmers_market_time_day' => $data["farmers_market_time_day"],
					
					'accepted_payment' => $data["accepted_payment"],
					'additional_notes' => $data["additional_notes"],
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }
					 
		 
			
					 
					 
	

		//### Organization
    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) as kldistace, ';}
		
	$sql.='
	ls.id lid,
	ls.lng as lslng,
	ls.lat as lslat,
	ls.address1,ls.city,
	ls.state,
	ls.first_name as ufirst_name,
	ls.last_name as ulast_name,
	ct.name as countryname
	FROM '.USERS_TABLE.' ls
	LEFT JOIN '.COUNTRIES.' ct ON ls.country = ct.id
    ';
	
    $sql.="WHERE ls.organization_name!='' AND ( 1 ";  // ls.profile_type ='4'
	
	if(!empty($location)){ 
		/*$sql.='(SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - lng) * COS(ls.lat / 57.3), 2))*1.609344) AS kdistance, ';*/
		
		$sql.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}
	
    if($_GET['style']!="all" AND $_GET['style']!=""){
		$sql.=" AND ls.growing_space_style ='".$_GET['style']."'   "; 
	}
	
    if($_GET['size']!="all" AND $_GET['size']!=""){
		$sql.=" AND ls.growing_space_size ='".$_GET['size']."'   "; 
	}	
	
	if(!empty($_GET['category']) AND $_GET['category']!='all'){ 
			$catSearch=$_GET['category'];
			$catSearch=str_replace("/","%",$catSearch);
		$sql.=" AND ls.offer LIKE '%".$_GET['category']."%'";
	}
	
	if(!empty($_GET['produce'])){
		$sql.=" AND (ls.offer LIKE '%".$_GET['produce']."%' OR "; 
		$sql.="  ls.description LIKE '%".$_GET['produce']."%') "; 
	}		

	if(!empty($location)){ 
		$sql.=' AND (SQRT(POW(69.1 * (ls.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ls.lng) * COS(ls.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}	
	
   $sql.=' )';
	
    if(!empty($_GET['location'])){
	   $sql.="	ORDER BY FIELD(CONCAT(' ',ls.address1,' ',ls.city,' ',ls.state,' ',ls.zip,' ',ct.name), 'Ilene%Terrace') ";
    }else{
	   $sql.='	ORDER BY ls.id DESC ';	
	   $sql.="  LIMIT 0,100 ";
	}
  

	$rCount=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$totalRows = mysqli_num_rows($rCount) + $totalRows;
    //$sql.=" LIMIT $currentPage, $recordPerPage ";
   
	
//echo $sql;
// echo "<hr>";
 	  
   $r=mysqli_query($conn,$sql)
		or die("<br>searchListing error ".mysqli_error($conn));
	
 
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
			
			   // $lldata=$this->getCoordinates($data["address1"].", ".$data["city"].", ".$data["state"].", ".$data["zip"].", ".$data["country"]);
				$list[] = array( 
				    'listing_type' => "organization",
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],								
					'listing_image' => $data["listing_image"],
					'avatar' => $data["avatar"],
					'address1' => $data["address1"],
					'address2' => $data["address2"],
					'city' => $data["city"],
					'state' => $data["state"],
					'zip' => $data["zip"],
					'country' => $data["countryname"],
					'growing_space_cost' => $data["growing_space_cost"],
					'kldistace'  => number_format($data["kldistace"],2)."",					
					'description' => $data["description"],	
					'organization_name' => $data["organization_name"],	
					'offerArr' => $data["offer"],
					'lat' => $data["lslat"],
					'lng' => $data["lslng"],
					'username' => $data["username"],
					'offerArr' => unserialize($data["offer"]),
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }	
		 	
		 if($_GET['category']=="Events Workshops"){ //make sure its just events as requested by user
			unset($list);
			$list = array();
         }
		 	
		 //### EVENT AND WORKSHOP
	
    $sql='
	SELECT 
	*, ';
	
	if(!empty($location)){ 
	$sql.='
	(SQRT(POW(69.1 * (ev.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ev.lng) * COS(ev.lat / 57.3), 2))*1.609344) as kldistace, ';}
	$sql.='	
	ev.fname as ufirst_name,
	ev.lname as ulast_name,
    ev.address1,
	ev.city,
	ev.state,
	ev.zip,
	ev.country,
	ev.lat,
	ev.lng
	FROM '.EVENTWORKSHOPLISTING.' ev
	LEFT JOIN '.USERS_TABLE.' u ON ev.userid = u.id
	WHERE 1 ';
	

   $sql.=" AND ev.status = 'published'   AND  ev.event_seminar_title!='' 
           AND STR_TO_DATE(TRIM(SUBSTRING(ev.date_time,22,11)),'%m/%d/%Y') >='".date("Y-m-d")."'
   ";	
	

	if(!empty($_GET['produce'])){
		$sql.=" AND (ev.event_seminar_title LIKE '%".$_GET['produce']."%' OR "; 
		$sql.="  ev.introduction LIKE '%".$_GET['produce']."%') "; 
	}		

	if(!empty($location)){ 
		$sql.=' AND (SQRT(POW(69.1 * (ev.lat - '.$latLngFrom['lat'].'), 2) +
  		POW(69.1 * ('.$latLngFrom['lng'].' - ev.lng) * COS(ev.lat / 57.3), 2))*1.609344) <='.$klLimit;
	}		
	
	
	$sql.=' ORDER BY date_entry DESC	';
	if(empty($location)){ 
	$sql.=' LIMIT 0, 100';	
	}

	
   $r=mysqli_query($conn,$sql)
		or die("<br>viewEventWorkshopListing error. ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
				
				$list[] = array( 
				    'listing_type' => "workshops",
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'address1' => $data["address1"],		
					'city' => $data["city"],		
					'state' => $data["state"],		
					'zip' => $data["zip"],		
					'country' => $data["country"],		
					'listing_image' => $data["listing_image"],
		
					'event_seminar_title' => $data["event_seminar_title"],	
					'introduction' => $data["introduction"],	
					'date_time' => $data["date_time"],	
					'cost' => $data["cost"],	
					'currency' => $data["currency"],	
					
					'lat' => $data["lat"],
					'lng' => $data["lng"],
					'options' => '<a href="'.SITE_URL.'/growing-space-listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
					
         }	 
	
	 
		 
		return $list;
}	





public function viewEventWorkshopListing($for=false,$uid=false){
	
global $conn;
    $sql='
	SELECT 
	*,
	ev.fname as ufirst_name,
	ev.lname as ulast_name,
    ev.address1,
	ev.city,
	ev.state,
	ev.zip,
	ev.country,
	ev.lat,
	ev.lng
	FROM '.EVENTWORKSHOPLISTING.' ev
	LEFT JOIN '.USERS_TABLE.' u ON ev.userid = u.id
	WHERE 1 ';
	
	if($for=="profile"){
	       $sql.=" AND ev.status = 'published'  AND u.username ='".$_GET["u"]."' AND  ev.event_seminar_title!='' ";	
	}else{
		if($_SESSION["account_type"]!=1){
		   $sql.=" AND ev.userid ='".$_SESSION["user_id"]."'";
		}
	}

	$sql.=' ORDER BY date_entry DESC	';
	
	if($for=="recent"){ $sql.=" LIMIT 0,3";}
	if($for=="profile"){ $sql.=" LIMIT 0,100";}
	 

   $r=mysqli_query($conn,$sql)
		or die("<br>viewEventWorkshopListing error. ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
				
				$list[] = array( 
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'address1' => $data["address1"],		
					'city' => $data["city"],		
					'state' => $data["state"],		
					'zip' => $data["zip"],		
					'country' => $data["country"],		
					'listing_image' => $data["listing_image"],
		
					'event_seminar_title' => $data["event_seminar_title"],	
					'introduction' => $data["introduction"],	
					'date_time' => $data["date_time"],	
					'cost' => $data["cost"],	
					'currency' => $data["currency"],	
					
					'lat' => $data["lat"],
					'lng' => $data["lng"],
					'options' => '<a href="'.SITE_URL.'/growing-space-listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
					
         }
					 
		return $list;
}	



public function viewGrowingSpaceListing($for=false){
	
global $conn;
    $sql='
	SELECT 
	*,
	fname as ufirst_name,
	lname as ulast_name
    
	FROM '.GROWINGSPACELISTING.' 
	WHERE 1 ';
	
	if($_SESSION["account_type"]!=1){
	   $sql.=" AND userid ='".$_SESSION["user_id"]."'";
	}
	

	$sql.=' ORDER BY date_entry DESC	';
	
	if($for=="recent"){ $sql.=" LIMIT 0,3";}
	
   $r=mysqli_query($conn,$sql)
		or die("<br>viewGrowingSpaceListing error. ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
				
				$list[] = array( 
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'ufirst_name' => $data["ufirst_name"],					
					'address1' => $data["address1"],		
					'city' => $data["city"],		
					'state' => $data["state"],		
					'zip' => $data["zip"],		
					'country' => $data["country"],		
					'listing_image' => $data["listing_image"],
					'period_availability' => $data["period_availability"],	
					'growing_space_style' => $data["growing_space_style"],	
					'currency' => $data["currency"],	
					'growing_space_size' => $data["growing_space_size"],	
					'growing_space_size_unit' => $data["growing_space_size_unit"],	
					'growing_space_cost' => $data["growing_space_cost"],	
					'growing_space_period' => $data["growing_space_period"],	
					'growing_space_onsite_tools' => $data["growing_space_onsite_tools"],	
					'growing_space_parking' => $data["growing_space_parking"],	
					'growing_space_organic_certification' => $data["growing_space_organic_certification"],	
					'growing_space_site_access_time' => $data["growing_space_site_access_time"],	
					'no_utilities_at_site' => $data["no_utilities_at_site"],	
					'electricity_provided' => $data["electricity_provided"],	
					'electricity_available_at_cost' => $data["electricity_available_at_cost"],	
					'gas_provided' => $data["gas_provided"],	
					'gas_provided_at_cost' => $data["gas_provided_at_cost"],	
					'water_provided' => $data["water_provided"],	
					'water_provided_cost' => $data["water_provided_cost"],	
					'other' => $data["other"],	
					'lat' => $data["lat"],
					'lng' => $data["lng"],
					'options' => '<a href="'.SITE_URL.'/growing-space-listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
					
         }
					 
		return $list;
}	

public function expiredListing($for=false){
	global $conn;
	$limit=10;
    $sql='
	SELECT
    us.username,	
	us.first_name as ufirst_name,
	us.last_name as ulast_name,
	us.email as uemail,
	ls.lid,
	ls.userid,
	ls.listing_image,
	ls.currency,
	ls.quantity_number,
	ls.quantity_unit,
	ls.is_certified_organic,
	ls.is_organic_not_certified,
	ls.is_not_organic,
	ls.is_free,
	ls.is_accept_trades,
	ls.lat,
	ls.lng,
	ls.status,
	ls.published_date,
	ls.specific_variety,
	ls.price_per_item,
	ls.expired_notify,
	lp.name as catname, 
	lp.cat_image as cat_image,
	lpsub.name subcatname
	FROM '.LISTING.' ls
	LEFT JOIN '.PRODUCECATEGORY.' lp ON ls.produce_category = lp.id
	LEFT JOIN '.PRODUCESUBCATEGORY.' lpsub ON ls.produce = lpsub.id
	LEFT JOIN '.USERS_TABLE.' us ON ls.userid = us.id 
	WHERE 1 ';
  

	if(!empty($_POST['search_key'])){
	
		if($_POST['search_type']=="produce"){ $sql.=" AND lpsub.name LIKE '%".$_POST['search_key']."%' ";	 }
		if($_POST['search_type']=="category"){ $sql.="AND lp.name LIKE '%".$_POST['search_key']."%'";	 }
		if($_POST['search_type']=="farm_name"){ $sql.=" AND ls.farm_name LIKE '%".$_POST['search_key']."%' ";	 }
		if($_POST['search_type']=="user"){ $sql.=" AND (us.first_name LIKE '%".$_POST['search_key']."%' OR us.last_name LIKE '%".$_POST['search_key']."%') ";	 }
		if($_POST['search_type']=="address"){ 
				$sql.=" AND (
				    ls.address1 LIKE '%".$_POST['search_key']."%' OR
					ls.address2 LIKE '%".$_POST['search_key']."%' OR
					ls.city LIKE '%".$_POST['search_key']."%' OR
					ls.state LIKE '%".$_POST['search_key']."%'
				 ) ";
			}
	}
	
	
/*	if($_SESSION["account_type"]!=1){
	   $sql.=" AND ls.userid ='".$_SESSION["user_id"]."'";
	}
*/
	
	$sql.=' ORDER BY date_entry DESC ';
	
	if($for=="recent"){ $sql.=" LIMIT 0,8 ";}
	if($for=="admin"){ 
		$r2=mysqli_query($conn,$sql) or die("<br>MEMBERS user error ".mysqli_error());
	    $totalrows=mysqli_num_rows($r2); 	

		 if($_GET['pg']==""){$sql.=" LIMIT 0, $limit";}
		 else{ $start=(($_GET['pg']-1)*$limit);
			 $sql.=" LIMIT $start, $limit ";
		  }
	}

   $r=mysqli_query($conn,$sql)
		or die("<br>viewListing error. ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
          
  		    $optionData=Page::getOptionsSettings();

				//compute dates 
				$startTimeStamp = strtotime($data["published_date"]);
				$endTimeStamp = strtotime(date("Y-m-d"));
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				// and you might want to convert to integer
				$numberDays = intval($numberDays);
				//$numberDays = $numberDays-1;
				$period_availability=($optionData["period_availability_limit"]-$numberDays);
				
				
				if($period_availability>0){
				       $period_availability_limit=$period_availability;
					   $period_availability=$period_availability;					   
					  // echo "Listing  ".$data["lid"]." is Not Expired - $period_availability_limit";
				}else{ $period_availability="0";
					   $period_availability_limit="0";
					 
				  if($data["expired_notify"]=="0"){	 
					  echo "Listing  ".$data["lid"]." is ";
					  echo "Expired";
					  echo "<br>";
					  echo $data["uemail"];
					  echo "(".$data["username"]."/".$data["ufirst_name"]."-".$data["ulast_name"].")";
					   echo "<br>";
					  echo SITE_URL."/edit-listing/?redirect=1&id=".$data["lid"]."&relist=1#relist";
					   echo "<hr><br>";			
					   $relistLink = SITE_URL."/edit-listing/?redirect=1&id=".$data["lid"]."&relist=1#relist";
					   $name = ucfirst($data["ufirst_name"])." ".ucfirst($data["ulast_name"]);
				       $title = $data["catname"]." - ". $data["subcatname"]." - ".$data["specific_variety"];		
					   $emailBody="Dear $name,\n\nYour Sprouting Trade listing \"$title\" has expired.\nYou may re list your listing by clicking the link below.\n\n$relistLink\n\nSproutingTrade.com Support.";
						$emailSubject="SproutingTrade.com listing has expired.";
					    // echo $emailSubject."<br><br>";
					   //  echo str_replace("\n","<br>",$emailBody);
						$toemail=$data["uemail"];
						//$toemail="wrecck@gmail.com";
						if(mail($toemail,$emailSubject,$emailBody,"'From:support@sproutingtrade.com'")){echo "message sent<br>";
						   $sqlUpd="UPDATE ".LISTING." SET expired_notify='1' WHERE lid='".$data["lid"]."' ";
						   //mail("wrecck@gmail.com","Dev copy: ".$emailSubject,$emailBody,"'From:support@sproutingtrade.com'");
						   mysqli_query($conn,$sqlUpd);
						}
				  }		
				}

			//echo $period_availability_limit."<br>";
				 
				$list[] = array( 
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'status' => $data["status"],
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],		
					'period_availability' => $period_availability,	
					'period_availability_limit' => $period_availability_limit,						
					'specific_variety'  => $data["specific_variety"],
					'listing_image' => $data["listing_image"],
					'currency' => $data["currency"],	
					'quantity_number' => $data["quantity_number"],	
					'quantity_unit' => $data["quantity_unit"],
					'is_certified_organic' => $data["is_certified_organic"],
					'is_organic_not_certified' => $data["is_organic_not_certified"],
					'is_not_organic' => $data["is_not_organic"],
					'is_free' => $data["is_free"],
					'is_accept_trades' => $data["is_accept_trades"],		
					'lat' => $data["lat"],
					'lng' => $data["lng"],
					'price_per_item' => $data["price_per_item"],	
					'catname' => $data["catname"],
					'cat_image' => $data["cat_image"],
					'subcatname' => $data["subcatname"],
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }
					 
					 
      $totalPages=ceil($totalrows/$limit);
	  for($cnt=1;$totalPages>$cnt;$cnt++){
		$pageLinks.="&nbsp;|&nbsp;<a href='?pg=$cnt'>$cnt</a>";  
	  }
	  $list["pagelinks"]=$pageLinks;					 
					 
		return $list;
}	



public function viewListing($for=false){
	global $conn;
	$limit=10;
    $sql='
	SELECT 
	us.first_name as ufirst_name,
	us.last_name as ulast_name,
	ls.lid,
	ls.userid,
	ls.listing_image,
	ls.currency,
	ls.quantity_number,
	ls.quantity_unit,
	ls.is_certified_organic,
	ls.is_organic_not_certified,
	ls.is_not_organic,
	ls.is_free,
	ls.is_accept_trades,
	ls.lat,
	ls.lng,
	ls.status,
	ls.published_date,
	ls.specific_variety,
	ls.price_per_item, 
	lp.name as catname, 
	lp.cat_image as cat_image,
	lpsub.name subcatname
	FROM '.LISTING.' ls
	LEFT JOIN '.PRODUCECATEGORY.' lp ON ls.produce_category = lp.id
	LEFT JOIN '.PRODUCESUBCATEGORY.' lpsub ON ls.produce = lpsub.id
	LEFT JOIN '.USERS_TABLE.' us ON ls.userid = us.id 
	WHERE 1 ';
  

	if(!empty($_POST['search_key'])){
	
		if($_POST['search_type']=="produce"){ $sql.=" AND lpsub.name LIKE '%".$_POST['search_key']."%' ";	 }
		if($_POST['search_type']=="category"){ $sql.="AND lp.name LIKE '%".$_POST['search_key']."%'";	 }
		if($_POST['search_type']=="farm_name"){ $sql.=" AND ls.farm_name LIKE '%".$_POST['search_key']."%' ";	 }
		if($_POST['search_type']=="user"){ $sql.=" AND (us.first_name LIKE '%".$_POST['search_key']."%' OR us.last_name LIKE '%".$_POST['search_key']."%') ";	 }
		if($_POST['search_type']=="address"){ 
				$sql.=" AND (
				    ls.address1 LIKE '%".$_POST['search_key']."%' OR
					ls.address2 LIKE '%".$_POST['search_key']."%' OR
					ls.city LIKE '%".$_POST['search_key']."%' OR
					ls.state LIKE '%".$_POST['search_key']."%'
				 ) ";
			}
	}
	
	
	if($_SESSION["account_type"]!=1){
	   $sql.=" AND ls.userid ='".$_SESSION["user_id"]."'";
	}
	
	$sql.=' ORDER BY date_entry DESC ';
	
	if($for=="recent"){ $sql.=" LIMIT 0,8 ";}
	if($for=="admin"){ 
		$r2=mysqli_query($conn,$sql) or die("<br>MEMBERS user error ".mysqli_error());
	    $totalrows=mysqli_num_rows($r2); 	

		 if($_GET['pg']==""){$sql.=" LIMIT 0, $limit";}
		 else{ $start=(($_GET['pg']-1)*$limit);
			 $sql.=" LIMIT $start, $limit ";
		  }
	}

   $r=mysqli_query($conn,$sql)
		or die("<br>viewListing error. ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
          
  		    $optionData=Page::getOptionsSettings();

				//compute dates 
				$startTimeStamp = strtotime($data["published_date"]);
				$endTimeStamp = strtotime(date("Y-m-d"));
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				// and you might want to convert to integer
				$numberDays = intval($numberDays);
				//$numberDays = $numberDays-1;
				$period_availability=($optionData["period_availability_limit"]-$numberDays);
				
				if($period_availability>0){
				       $period_availability_limit=$period_availability;
					   $period_availability=$period_availability;					   
				}else{ $period_availability="0";
					   $period_availability_limit="0";
				}
				
			//echo $period_availability_limit."<br>";
				 
				$list[] = array( 
					'id' => $data["lid"],
					'userid' => $data["userid"],
					'status' => $data["status"],
					'ufirst_name' => $data["ufirst_name"],					
					'ulast_name' => $data["ulast_name"],		
					'period_availability' => $period_availability,	
					'period_availability_limit' => $period_availability_limit,						
					'specific_variety'  => $data["specific_variety"],
					'listing_image' => $data["listing_image"],
					'currency' => $data["currency"],	
					'quantity_number' => $data["quantity_number"],	
					'quantity_unit' => $data["quantity_unit"],
					'is_certified_organic' => $data["is_certified_organic"],
					'is_organic_not_certified' => $data["is_organic_not_certified"],
					'is_not_organic' => $data["is_not_organic"],
					'is_free' => $data["is_free"],
					'is_accept_trades' => $data["is_accept_trades"],		
					'lat' => $data["lat"],
					'lng' => $data["lng"],
					'price_per_item' => $data["price_per_item"],	
					'catname' => $data["catname"],
					'cat_image' => $data["cat_image"],
					'subcatname' => $data["subcatname"],
					'options' => '<a href="'.SITE_URL.'/listings/?id='.$data["lid"].'">Edit</a>&nbsp;'
					);
         }
					 
					 
      $totalPages=ceil($totalrows/$limit);
	  for($cnt=1;$totalPages>$cnt;$cnt++){
		$pageLinks.="&nbsp;|&nbsp;<a href='?pg=$cnt'>$cnt</a>";  
	  }
	  $list["pagelinks"]=$pageLinks;					 
					 
		return $list;
}	


public function addNewEventWorkshopListing(){
		global $conn;
$sql="

INSERT INTO ".EVENTWORKSHOPLISTING."
(`fname`, `lname`, `email`, `phone`, 
 `address1`, `address2`, 
 `city`, `state`, `zip`, `country`, 
 `event_seminar_title`,  `introduction`, `date_time`,
 `cost`, `currency`,
 `lat`, `lng`, `listing_image`, 
 `userid`, `status`, 
 `date_entry`) 
 
  VALUES ('".addslashes($_POST['first_name'])."','".addslashes($_POST['last_name'])."','".addslashes($_POST['email'])."','".addslashes($_POST['phone'])."',
		  '".addslashes($_POST['address1'])."','".addslashes($_POST['address2'])."',
          '".addslashes($_POST['city'])."','".addslashes($_POST['state'])."','".addslashes($_POST['zip'])."','".addslashes($_POST['country'])."',
		  
		  '".addslashes($_POST['event_seminar_title'])."','".addslashes($_POST['introduction'])."','".addslashes($_POST['date_time'])."',
		  '".addslashes($_POST['cost'])."','".addslashes($_POST['currency'])."',
		  
		  '".addslashes($_POST['lat'])."','".addslashes($_POST['lng'])."','".addslashes($_POST['listing_image'])."',
		  '".$_SESSION["user_id"]."',";
		  
			if($_POST['submit']=="Save"){
				$sql.="'draft',";
			}else{
				$sql.="'published',";
			}

			$sql.="
			'".date("Y-m-d g:i:s")."'
			)
	";
		

	
	$r=mysqli_query($conn,$sql) 
	or die("<br>check permission error ".mysqli_error($conn));
	$newid=mysqli_insert_id($conn); 
	
	$this->uploadFile("event_workshop_image",$newid);
	
	header("location:/my-events-workshop/?as=1&id=$newid"); //
}


public function addNewGrowingSpaceListing(){  
		global $conn;
$sql="

INSERT INTO ".GROWINGSPACELISTING."
(`fname`, `lname`, `email`, `phone`, 
 `farm_name`, `address1`, `address2`, 
 `city`, `state`, `zip`, `country`, 
 `growing_space_style`, `growing_space_size`, 
 `growing_space_size_unit`, `growing_space_cost`, 
 `growing_space_period`, `specific_variety`, 
 `currency`, 
 `growing_space_onsite_tools`, `growing_space_parking`, 
 `period_availability`, `additional_notes`, 
 `growing_space_accommodation`,  
 `growing_space_organic_certification`, `growing_space_site_access_time`, 
 `no_utilities_at_site`,  `electricity_provided`, 
 `electricity_available_at_cost`, `gas_provided`,
 `gas_provided_at_cost`,  `water_provided`, 
 `water_provided_cost`, `other_check`, 
 `other`, `lat`, 
 `lng`, `listing_image`, 
 `userid`, `status`, 
 `date_entry`) 
 
  VALUES ('".addslashes($_POST['first_name'])."','".addslashes($_POST['last_name'])."','".addslashes($_POST['email'])."','".addslashes($_POST['phone'])."',
		  '".addslashes($_POST['farm_name'])."','".addslashes($_POST['address1'])."','".addslashes($_POST['address2'])."',
          '".addslashes($_POST['city'])."','".addslashes($_POST['state'])."','".addslashes($_POST['zip'])."','".addslashes($_POST['country'])."',

		  '".addslashes($_POST['growing_space_style'])."','".addslashes($_POST['growing_space_size'])."',
		  '".addslashes($_POST['growing_space_size_unit'])."','".addslashes($_POST['growing_space_cost'])."',
		  '".addslashes($_POST['growing_space_period'])."','".addslashes($_POST['specific_variety'])."',
		  '".addslashes($_POST['currency'])."',
		  '".addslashes($_POST['growing_space_onsite_tools'])."','".addslashes($_POST['growing_space_parking'])."',
		  '".addslashes($_POST['period_availability'])."','".addslashes($_POST['additional_notes'])."',
		  '".addslashes($_POST['growing_space_accommodation'])."',
		  '".addslashes($_POST['growing_space_organic_certification'])."','".addslashes($_POST['growing_space_site_access_time'])."',
		  '".addslashes($_POST['no_utilities_at_site'])."','".addslashes($_POST['electricity_provided'])."',
		  '".addslashes($_POST['electricity_available_at_cost'])."','".addslashes($_POST['gas_provided'])."',
		  '".addslashes($_POST['gas_provided_at_cost'])."','".addslashes($_POST['water_provided'])."',
		  '".addslashes($_POST['water_provided_cost'])."','".addslashes($_POST['other_check'])."',
		  '".addslashes($_POST['other'])."','".addslashes($_POST['lat'])."',
		  '".addslashes($_POST['lng'])."','".addslashes($_POST['listing_image'])."',
		  '".$_SESSION["user_id"]."',";
		  
			if($_POST['submit']=="Save"){
				$sql.="'draft',";
			}else{
				$sql.="'published',";
			}

			$sql.="
			'".date("Y-m-d g:i:s")."'
			)
			";
	
	

	
	$r=mysqli_query($conn,$sql) 
	or die("<br>check permission error ".mysqli_error($conn));
	$newid=mysqli_insert_id($conn); 
	
	$this->uploadFile("growing_space_image",$newid);
	
	header("location:/my-growing-space/?as=1&id=$newid");
}

public function addNewListing(){
	global $conn;
	
$sql="
INSERT INTO ".LISTING."
(
`fname`, 
`lname`, 
`email`, 
`phone`, 
`farm_name`, 
`address1`, 
`address2`, 
`city`, 
`state`, 
`zip`, 
`country`, 
`produce_category`, 
`produce`, 
`accepted_payment`, 
`is_certified_organic`, 
`is_organic_not_certified`, 
`is_not_organic`, 
`is_free`, 
`is_accept_trades`, 
`specific_variety`, 
`price_per_item`, 
`currency`, 
`quantity_number`, 
`quantity_unit`, 
`period_availability`, 
`additional_notes`, 
`search_keywords`,
`pick_up_farm_stand_shop`, 
`pick_up_farm_stand_shop_timefrom`, 
`pick_up_farm_stand_shop_timeuntil`, 
`pick_up_at_property`, 
`pick_up_at_property_timefrom`, 
`pick_up_at_property_timeuntil`, 
`delivery_contact_producer`, 
`contact_producer`, `u_pick`, 
`farmers_market`, 
`farmers_market_name`, 
`farmers_market_time_from`, 
`farmers_market_time_until`, 
`farmers_market_time_day`,
`payment_cash_exact_change`,
`payment_cash_change_available`,
`payment_cheque`,
`payment_credit_card`,
`payment_debit_card`,
`payment_online`,
`payment_other`,
`payment_provide_details`,
`lat`,
`lng`,
`userid`,
`status`,
`published_date`,
`date_entry`) 
VALUES (
'".$_POST['first_name']."',
'".$_POST['last_name']."',
'".$_POST['email']."',
'".$_POST['phone']."',
'".addslashes($_POST['farm_name'])."',
'".addslashes($_POST['address1'])."',
'".addslashes($_POST['address2'])."',
'".addslashes($_POST['city'])."',
'".addslashes($_POST['state'])."',
'".addslashes($_POST['zip'])."',
'".addslashes($_POST['country'])."',
'".addslashes($_POST['produce_category'])."',
'".addslashes($_POST['produce'])."',
'".addslashes($_POST['accepted_payment'])."',
'".addslashes($_POST['is_certified_organic'])."',
'".addslashes($_POST['is_organic_not_certified'])."',
'".addslashes($_POST['is_not_organic'])."',
'".addslashes($_POST['is_free'])."',
'".addslashes($_POST['is_accept_trades'])."',
'".addslashes($_POST['specific_variety'])."',
'".addslashes($_POST['price_per_item'])."',
'".addslashes($_POST['currency'])."',
'".addslashes($_POST['quantity_number'])."',
'".addslashes($_POST['quantity_unit'])."',
'".addslashes($_POST['period_availability'])."',
'".addslashes($_POST['additional_notes'])."',
'".addslashes($_POST['search_keywords'])."',
'".addslashes($_POST['pick_up_farm_stand_shop'])."',
'".addslashes($_POST['pick_up_farm_stand_shop_timefrom'])."',
'".addslashes($_POST['pick_up_farm_stand_shop_timeuntil'])."',
'".addslashes($_POST['pick_up_at_property'])."',
'".addslashes($_POST['pick_up_at_property_timefrom'])."',
'".addslashes($_POST['pick_up_at_property_timeuntil'])."',
'".addslashes($_POST['delivery_contact_producer'])."',
'".addslashes($_POST['contact_producer'])."',
'".addslashes($_POST['u_pick'])."',
'".addslashes($_POST['farmers_market'])."',
'".addslashes($_POST['farmers_market_name'])."',
'".addslashes($_POST['farmers_market_time_from'])."',
'".addslashes($_POST['farmers_market_time_until'])."',
'".addslashes($_POST['farmers_market_time_day'])."',

'".addslashes($_POST['payment_cash_exact_change'])."',
'".addslashes($_POST['payment_cash_change_available'])."',
'".addslashes($_POST['payment_cheque'])."',
'".addslashes($_POST['payment_credit_card'])."',
'".addslashes($_POST['payment_debit_card'])."',
'".addslashes($_POST['payment_online'])."',
'".addslashes($_POST['payment_other'])."',
'".addslashes($_POST['payment_provide_details'])."',

'".addslashes($_POST['lat'])."',
'".addslashes($_POST['lng'])."', 
'".$_SESSION["user_id"]."',
";

if($_POST['submit']=="Save"){
	$sql.="'draft',";
}else{
	$sql.="'published',";
}
$sql.="
'".date("Y-m-d g:i:s")."',
'".date("Y-m-d g:i:s")."'
)
";

	
	$r=mysqli_query($conn,$sql) 
	or die("<br>check permission error ".mysqli_error($conn));
	$newid=mysqli_insert_id($conn); 
	
	$this->uploadFile("listing_image",$newid);
	$this->imageResize("listing_image",$newid);
	
	header("location:/my-listing/?as=1&id=$newid");
	
}


	public function imageResizeOnServer($type,$fileName,$filePath){
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		
		switch(strtolower($ext))
		{
			case 'jpg':
				$image = imagecreatefromjpeg($filePath);
				break;
			case 'png':
				$image = imagecreatefrompng($filePath);
				break;
			case 'gif':
				$image = imagecreatefromgif($filePath);
				break;
			default:
				die("..");
		}		
		
		// Target dimensions
		$max_width = 240;
		$max_height = 180;

		// Get current dimensions
		$old_width  = imagesx($image);
		$old_height = imagesy($image);

		// Calculate the scaling we need to do to fit the image inside our frame
		$scale      = min($max_width/$old_width, $max_height/$old_height);

		// Get the new dimensions
		$new_width  = ceil($scale*$old_width);
		$new_height = ceil($scale*$old_height);

		// Create new empty image
		$new = imagecreatetruecolor($new_width, $new_height);

		// Resize old image into new
		imagecopyresampled($new, $image,
			0, 0, 0, 0,
			$new_width, $new_height, $old_width, $old_height);
			
				  if($type=="listing_image"){  //image is for listing
					$target_path = SITE_UPLOAD_PATH."/listing/";
				  }

				  if($type=="avatar_image"){  //image is for avatar
					$target_path = SITE_UPLOAD_PATH."/avatar/";
				  }
				  
				  if($type=="cat_image"){  //image is for category
					$target_path = SITE_UPLOAD_PATH."/category/";
				  }				  
				  
				  if($type=="growing_space_image"){  //image is for growing space listing
					$target_path = SITE_UPLOAD_PATH."/growing_space/";
				  }						  
				  
				  if($type=="event_workshop_image"){  //image is for events
					 $target_path = SITE_UPLOAD_PATH."/event_workshop/";
				  }					  
				
				  $fileName=$target_path."small_".$fileName;
				  //$target_path = $target_path.basename($fileName); 
				  imagejpeg($new,$fileName,100);
	
	
			// Destroy resources
			imagedestroy($image);
			imagedestroy($new);		
	}

	public function imageResize($type,$id=false){

		switch(strtolower($_FILES[$type]['type']))
		{
			case 'image/jpeg':
				$image = imagecreatefromjpeg($_FILES[$type]['tmp_name']);
				break;
			case 'image/png':
				$image = imagecreatefrompng($_FILES[$type]['tmp_name']);
				break;
			case 'image/gif':
				$image = imagecreatefromgif($_FILES[$type]['tmp_name']);
				break;
			default:
				$image = imagecreatefromjpeg($_FILES[$type]['tmp_name']);
				break;
		}		
		
		// Target dimensions
		$max_width = 240;
		$max_height = 180;

		// Get current dimensions
		$old_width  = imagesx($image);
		$old_height = imagesy($image);

		// Calculate the scaling we need to do to fit the image inside our frame
		$scale      = min($max_width/$old_width, $max_height/$old_height);

		// Get the new dimensions
		$new_width  = ceil($scale*$old_width);
		$new_height = ceil($scale*$old_height);

		// Create new empty image
		$new = imagecreatetruecolor($new_width, $new_height);

		// Resize old image into new
		imagecopyresampled($new, $image,
			0, 0, 0, 0,
			$new_width, $new_height, $old_width, $old_height);

			
				  if($type=="listing_image"){  //image is for listing
					$target_path = SITE_UPLOAD_PATH."/listing/";
				  }
				  if($type=="cat_image"){  //image is for listing
					$target_path = SITE_UPLOAD_PATH."/category/";
				  }				  
				  
				  if($type=="growing_space_image"){  //image is for growing space listing
					$target_path = SITE_UPLOAD_PATH."/growing_space/";
				  }						  
				  
				  if($type=="event_workshop_image"){  //image is for events
					 $target_path = SITE_UPLOAD_PATH."/event_workshop/";
				  }					  
				
				  $fileName=$target_path."small_listing_".$id."_".$_FILES[$type]['name'];
				  //$target_path = $target_path.basename($fileName); 
				  imagejpeg($new,$fileName,100);
	
	
			// Destroy resources
			imagedestroy($image);
			imagedestroy($new);			
	}
	
	public function uploadFile($type,$id=false){
			  global $conn;
			 if(!empty($_FILES[$type]['tmp_name'])){		
				  if($type=="listing_image"){  //image is for listing
					$target_path = SITE_UPLOAD_PATH."/listing/";
				  }
				  if($type=="cat_image"){  //image is for listing
					$target_path = SITE_UPLOAD_PATH."/category/";
				  }				  
				  
				  if($type=="growing_space_image"){  //image is for growing space listing
					$target_path = SITE_UPLOAD_PATH."/growing_space/";
				  }						  
				  
				  if($type=="event_workshop_image"){  //image is for events
					 $target_path = SITE_UPLOAD_PATH."/event_workshop/";
				  }					  
				  
				  $fileName="listing_".$id."_".$_FILES[$type]['name'];
				  $target_path = $target_path.basename($fileName); 

							if(move_uploaded_file($_FILES[$type]['tmp_name'], $target_path)){
									 if($type=="listing_image"){ //image is for listing
										 $sql="UPDATE ".LISTING." SET listing_image ='".$fileName."' WHERE lid ='$id' ";
										$r=mysqli_query($conn,$sql) or die("<br>uploadFile error ".mysqli_error($conn));
									 }
									 
									if($type=="cat_image"){ //image is for category
										 $sql="UPDATE ".PRODUCECATEGORY." SET cat_image ='".$fileName."' WHERE id ='$id' ";
										$r=mysqli_query($conn,$sql) or die("<br>uploadFile error ".mysqli_error($conn));
									 }	

									if($type=="growing_space_image"){ //image is for growing space
										$sql="UPDATE ".GROWINGSPACELISTING." SET listing_image ='".$fileName."' WHERE lid ='$id' ";
										$r=mysqli_query($conn,$sql) or die("<br>uploadFile error ".mysqli_error($conn));
									 }			

									 if($type=="event_workshop_image"){ //image is for growing space
										$sql="UPDATE ".EVENTWORKSHOPLISTING." SET listing_image ='".$fileName."' WHERE lid ='$id' ";
										$r=mysqli_query($conn,$sql) or die("<br>uploadFile error ".mysqli_error($conn));
									 }											 
							}		 
			 }		
	}
	
		public function showGroupProductCategory($group,$type=false,$selected=false){
		   global $conn;
		    $sql="SELECT id,name,slug FROM ".PRODUCECATEGORY." WHERE 1 ";
			 if($group=="Produce"){$sql.=" AND id IN('4','2','3','1','13','9','14','18','17','12','15') ";}
			 if($group=="Plants"){$sql.=" AND id NOT IN('4','2','3','1','13','9','14','18','17','12','15') ";}
			 
			  if($type=="onlyselected"){$sql.=" AND id='$selected' ";}
			 $sql.="ORDER BY vieworder ASC ";
		
			$r=mysqli_query($conn,$sql) 
			or die("<br>check permission error ".mysqli_error());
			
			if($type=="onlyselected"){ //return only selected item
			    $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
				$return = $data["name"];
			}else{ //return options 
				for($cnt=1;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
				   if($type=="option"){
					   if($selected==$data["id"]){$isselected="selected";}
					   else{$isselected="";}
					  $return.='<option value="'.$data["id"].'" '.$isselected.'>'.$data["name"].'</option>';
				   }
					if($type=="option_slug"){
						$return.='<option value="'.$data["slug"].'" '.$isselected.'>'.$data["name"].'</option>';
					}
				}
			}
		$return='<optgroup label="'.$group.'">'.$return."</optgroup>";
		
		return  $return;	
	}
	
	public function showProductCategory($type=false,$selected=false){
		   global $conn;
		    $sql="SELECT id,name,slug FROM ".PRODUCECATEGORY." WHERE 1 ";
			  if($type=="onlyselected"){$sql.=" AND id='$selected' ";}
			 $sql.="ORDER BY vieworder ASC ";
			
			$r=mysqli_query($conn,$sql) 
			or die("<br>check permission error ".mysqli_error());
			
			if($type=="onlyselected"){ //return only selected item
			    $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
				$return = $data["name"];
			}else{ //return options 
				for($cnt=1;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
				   if($type=="option"){
					   if($selected==$data["id"]){$isselected="selected";}
					   else{$isselected="";}
					  $return.='<option value="'.$data["id"].'" '.$isselected.'>'.$data["name"].'</option>';
				   }
					if($type=="option_slug"){
						$return.='<option value="'.$data["slug"].'" '.$isselected.'>'.$data["name"].'</option>';
					}
				}
			}
			
		return  $return;	
	}


   public function showProductSubCategory($cid,$type=false,$selectedsub=false){
		   global $conn;
		   $sql="SELECT id,name FROM ".PRODUCESUBCATEGORY." WHERE parent ='$cid' ";
		    if($type=="onlyselected"){$sql.=" AND id='$selectedsub' ";}
		   $sql.="ORDER BY name ASC ";
		   
			$r=mysqli_query($conn,$sql) 
			or die("<br>check permission error ".mysqli_error());
			if(mysqli_num_rows($r)>0){
				
						if($type=="onlyselected"){ //return only selected item
						    $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
							$return = $data["name"];
						}else{ //return options 
							for($cnt=1;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
							   if($type=="option"){
								   if($selectedsub==$data["id"]){$isselected="selected";}
								   else{$isselected="";}
								  $return.='<option value="'.$data["id"].'" '.$isselected.'>'.$data["name"].'</option>';
							   }
							}
						}	
				
			}else{
				$return='<option value="">No record found</option>';
			}
		return $return;		   
  }
  
     public function showCoutries($type=false,$selected=false){
		   global $conn;
		    $sql="SELECT id,name FROM ".COUNTRIES." WHERE 1 ";
		    if($type=="onlyselected"){$sql.=" AND id='$selected' ";}
			$r=mysqli_query($conn,$sql) 
			or die("<br>check permission error ".mysqli_error());
			if($type=="onlyselected"){ //return only selected item
			    $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
				$return = $data["name"];
			}else{	
				if(mysqli_num_rows($r)>0){
					for($cnt=1;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
					   if($type=="option"){
						   if($selected==$data["id"]){$isselected="selected";}else{$isselected="";} 
						  $return.='<option value="'.$data["id"].'" '.$isselected.'>'.$data["name"].'</option>';
					   }
					}
				}else{
					$return='<option value="">No record found</option>';
				}
	       }
		return $return;		   
  }
  
      public function editGrowingSpaceViewListing($id){
						global $conn;
			$u_pick=$_POST['u_pick'];
			$farmers_market=$_POST['farmers_market'];
			
			if($u_pick==""){$u_pick="0";}
			if($farmers_market==""){$farmers_market="0";}
			
			
			$sql=" UPDATE ".LISTING." SET
			fname = '".$_POST['first_name']."',
			lname = '".$_POST['last_name']."',
			email = '".$_POST['email']."',
			phone = '".$_POST['phone']."',
			farm_name = '".addslashes($_POST['farm_name'])."',
			address1 = '".addslashes($_POST['address1'])."',
			address2 = '".addslashes($_POST['address2'])."',
			city = '".addslashes($_POST['city'])."',
			state = '".addslashes($_POST['state'])."',
			zip = '".addslashes($_POST['zip'])."',
			country = '".addslashes($_POST['country'])."',
			produce_category = '".addslashes($_POST['produce_category'])."',
			produce = '".addslashes($_POST['produce'])."',
			accepted_payment = '".addslashes($_POST['accepted_payment'])."',
			is_certified_organic = '".addslashes($_POST['is_certified_organic'])."',
			is_organic_not_certified = '".addslashes($_POST['is_organic_not_certified'])."',
			is_not_organic = '".addslashes($_POST['is_not_organic'])."',
			is_free = '".addslashes($_POST['is_free'])."',
			is_accept_trades = '".addslashes($_POST['is_accept_trades'])."',
			specific_variety = '".addslashes($_POST['specific_variety'])."',
			price_per_item = '".addslashes($_POST['price_per_item'])."',
			currency = '".addslashes($_POST['currency'])."',
			quantity_number = '".addslashes($_POST['quantity_number'])."',
			quantity_unit = '".addslashes($_POST['quantity_unit'])."',
			period_availability = '".addslashes($_POST['period_availability'])."',
			additional_notes = '".addslashes($_POST['additional_notes'])."',
			pick_up_farm_stand_shop = '".addslashes($_POST['pick_up_farm_stand_shop'])."',
			pick_up_farm_stand_shop_timefrom = '".addslashes($_POST['pick_up_farm_stand_shop_timefrom'])."',
			pick_up_farm_stand_shop_timeuntil = '".addslashes($_POST['pick_up_farm_stand_shop_timeuntil'])."',
			pick_up_at_property = '".addslashes($_POST['pick_up_at_property'])."',
			pick_up_at_property_timefrom = '".addslashes($_POST['pick_up_at_property_timefrom'])."',
			pick_up_at_property_timeuntil = '".addslashes($_POST['pick_up_at_property_timeuntil'])."',
			
			payment_cash_exact_change  = '".addslashes($_POST['payment_cash_exact_change'])."',
			payment_cash_change_available = '".addslashes($_POST['payment_cash_change_available'])."',
			payment_cheque = '".addslashes($_POST['payment_cheque'])."',
			payment_credit_card = '".addslashes($_POST['payment_credit_card'])."',
			payment_debit_card = '".addslashes($_POST['payment_debit_card'])."',
			payment_online = '".addslashes($_POST['payment_online'])."',
			payment_other = '".addslashes($_POST['payment_other'])."',
			payment_provide_details = '".addslashes($_POST['payment_provide_details'])."',

			delivery_contact_producer = '".addslashes($_POST['delivery_contact_producer'])."',
			contact_producer = '".addslashes($_POST['contact_producer'])."',
			u_pick = '".$u_pick."',
			farmers_market = '".$farmers_market."',
			farmers_market_name = '".addslashes($_POST['farmers_market_name'])."',
			farmers_market_time_from = '".addslashes($_POST['farmers_market_time_from'])."',
			farmers_market_time_until = '".addslashes($_POST['farmers_market_time_until'])."',
			farmers_market_time_day = '".addslashes($_POST['farmers_market_time_day'])."',
			";
			if($_POST['submit']=="Save"){
				$sql.=" status = 'draft', ";
			}else{
				$sql.=" status = 'published', ";
			}
			$sql.="
			lat = '".addslashes($_POST['lat'])."',
			lng = '".addslashes($_POST['lng'])."'
			WHERE lid = '$id' 
			";
		
		
		     if(!empty($_FILES['listing_image']['tmp_name'])){
			    $this->uploadFile("growing_space_image",$id);
			 }
	
	    mysqli_query($conn,$sql) or die("<br>error around 313 of listing class  ".mysqli_error());
		  return "Growing Space Listing has been updated";
	
	  }
  
  
  
  
  		public function editEventWorkshopListing($id){
			global $conn;
						
			$sql=" UPDATE ".EVENTWORKSHOPLISTING." SET
			fname = '".$_POST['first_name']."',
			lname = '".$_POST['last_name']."',
			email = '".$_POST['email']."',
			phone = '".$_POST['phone']."',
			address1 = '".addslashes($_POST['address1'])."',
			address2 = '".addslashes($_POST['address2'])."',
			city = '".addslashes($_POST['city'])."',
			state = '".addslashes($_POST['state'])."',
			zip = '".addslashes($_POST['zip'])."',
			country = '".addslashes($_POST['country'])."',
			currency = '".addslashes($_POST['currency'])."',
		   
			event_seminar_title = '".addslashes($_POST['event_seminar_title'])."',
			introduction = '".addslashes($_POST['introduction'])."',
			cost = '".addslashes($_POST['cost'])."',
			date_time = '".addslashes($_POST['date_time'])."',

			lat = '".addslashes($_POST['lat'])."',
			lng = '".addslashes($_POST['lng'])."',
			
			";
			if($_POST['submit']=="Save"){
				$sql.=" status = 'draft', ";
			}else{
				$sql.=" status = 'published', ";
			}
			$sql.="
			lat = '".addslashes($_POST['lat'])."',
			lng = '".addslashes($_POST['lng'])."'
			WHERE lid = '$id' 
			";
		
		
		     if(!empty($_FILES['event_workshop_image']['tmp_name'])){
				$this->uploadFile("event_workshop_image",$id);
			 } 
		
	    mysqli_query($conn,$sql) or die("<br>error around 313 of listing class  ".mysqli_error($conn));
		  return "Event/Workshop has been updated";
		}  
  
  
		public function editGrowingSpaceListing($id){
			global $conn;
			
			
			$sql=" UPDATE ".GROWINGSPACELISTING." SET
			fname = '".$_POST['first_name']."',
			lname = '".$_POST['last_name']."',
			email = '".$_POST['email']."',
			phone = '".$_POST['phone']."',
			farm_name = '".addslashes($_POST['farm_name'])."',
			address1 = '".addslashes($_POST['address1'])."',
			address2 = '".addslashes($_POST['address2'])."',
			city = '".addslashes($_POST['city'])."',
			state = '".addslashes($_POST['state'])."',
			zip = '".addslashes($_POST['zip'])."',
			country = '".addslashes($_POST['country'])."',
			currency = '".addslashes($_POST['currency'])."',
			period_availability = '".addslashes($_POST['period_availability'])."',
			additional_notes = '".addslashes($_POST['additional_notes'])."',
			growing_space_cost = '".addslashes($_POST['growing_space_cost'])."',
			growing_space_style = '".addslashes($_POST['growing_space_style'])."',
			growing_space_size = '".addslashes($_POST['growing_space_size'])."',
			growing_space_size_unit = '".addslashes($_POST['growing_space_size_unit'])."',
			growing_space_period = '".addslashes($_POST['growing_space_period'])."',
			growing_space_onsite_tools = '".addslashes($_POST['growing_space_onsite_tools'])."',
			growing_space_parking = '".addslashes($_POST['growing_space_parking'])."',
			growing_space_accommodation = '".addslashes($_POST['growing_space_accommodation'])."',
			growing_space_organic_certification = '".addslashes($_POST['growing_space_organic_certification'])."',
			growing_space_site_access_time = '".addslashes($_POST['growing_space_site_access_time'])."',
			no_utilities_at_site = '".addslashes($_POST['no_utilities_at_site'])."',
			electricity_provided = '".addslashes($_POST['electricity_provided'])."',
			electricity_available_at_cost = '".addslashes($_POST['electricity_available_at_cost'])."',
			gas_provided = '".addslashes($_POST['gas_provided'])."',
			gas_provided_at_cost = '".addslashes($_POST['gas_provided_at_cost'])."',
			water_provided = '".addslashes($_POST['water_provided'])."',
			water_provided_cost = '".addslashes($_POST['water_provided_cost'])."',
			other_check = '".addslashes($_POST['other_check'])."',
			lat = '".addslashes($_POST['lat'])."',
			lng = '".addslashes($_POST['lng'])."',
			
			";
			if($_POST['submit']=="Save"){
				$sql.=" status = 'draft', ";
			}else{
				$sql.=" status = 'published', ";
			}
			$sql.="
			lat = '".addslashes($_POST['lat'])."',
			lng = '".addslashes($_POST['lng'])."'
			WHERE lid = '$id' 
			";
		
		
		     if(!empty($_FILES['listing_image']['tmp_name'])){
			    $this->uploadFile("growing_space_image",$id);
			 }
	
	    mysqli_query($conn,$sql) or die("<br>error around 313 of listing class  ".mysqli_error($conn));
		  return "Listing has been updated";
		}  
  
  
  
		public function editListing($id){
			global $conn;
			$u_pick=$_POST['u_pick'];
			$farmers_market=$_POST['farmers_market'];
			
			if($u_pick==""){$u_pick="0";}
			if($farmers_market==""){$farmers_market="0";}
			
			$period_availability=$_POST['period_availability'];
			if($_POST['relist']==1){$period_availability=$_POST['period_availability_default'];}

			$sql=" UPDATE ".LISTING." SET
			fname = '".$_POST['first_name']."',
			lname = '".$_POST['last_name']."',
			email = '".$_POST['email']."',
			phone = '".$_POST['phone']."',
			farm_name = '".addslashes($_POST['farm_name'])."',
			address1 = '".addslashes($_POST['address1'])."',
			address2 = '".addslashes($_POST['address2'])."',
			city = '".addslashes($_POST['city'])."',
			state = '".addslashes($_POST['state'])."',
			zip = '".addslashes($_POST['zip'])."',
			country = '".addslashes($_POST['country'])."',
			produce_category = '".addslashes($_POST['produce_category'])."',
			produce = '".addslashes($_POST['produce'])."',
			accepted_payment = '".addslashes($_POST['accepted_payment'])."',
			is_certified_organic = '".addslashes($_POST['is_certified_organic'])."',
			is_organic_not_certified = '".addslashes($_POST['is_organic_not_certified'])."',
			is_not_organic = '".addslashes($_POST['is_not_organic'])."',
			is_free = '".addslashes($_POST['is_free'])."',
			is_accept_trades = '".addslashes($_POST['is_accept_trades'])."',
			specific_variety = '".addslashes($_POST['specific_variety'])."',
			price_per_item = '".addslashes($_POST['price_per_item'])."',
			currency = '".addslashes($_POST['currency'])."',
			quantity_number = '".addslashes($_POST['quantity_number'])."',
			quantity_unit = '".addslashes($_POST['quantity_unit'])."',
			period_availability = '".addslashes($period_availability)."',
			additional_notes = '".addslashes($_POST['additional_notes'])."',
			search_keywords = '".addslashes($_POST['search_keywords'])."',
			pick_up_farm_stand_shop = '".addslashes($_POST['pick_up_farm_stand_shop'])."',
			pick_up_farm_stand_shop_timefrom = '".addslashes($_POST['pick_up_farm_stand_shop_timefrom'])."',
			pick_up_farm_stand_shop_timeuntil = '".addslashes($_POST['pick_up_farm_stand_shop_timeuntil'])."',
			pick_up_at_property = '".addslashes($_POST['pick_up_at_property'])."',
			pick_up_at_property_timefrom = '".addslashes($_POST['pick_up_at_property_timefrom'])."',
			pick_up_at_property_timeuntil = '".addslashes($_POST['pick_up_at_property_timeuntil'])."',
			
			payment_cash_exact_change  = '".addslashes($_POST['payment_cash_exact_change'])."',
			payment_cash_change_available = '".addslashes($_POST['payment_cash_change_available'])."',
			payment_cheque = '".addslashes($_POST['payment_cheque'])."',
			payment_credit_card = '".addslashes($_POST['payment_credit_card'])."',
			payment_debit_card = '".addslashes($_POST['payment_debit_card'])."',
			payment_online = '".addslashes($_POST['payment_online'])."',
			payment_other = '".addslashes($_POST['payment_other'])."',
			payment_provide_details = '".addslashes($_POST['payment_provide_details'])."',

			delivery_contact_producer = '".addslashes($_POST['delivery_contact_producer'])."',
			contact_producer = '".addslashes($_POST['contact_producer'])."',
			u_pick = '".$u_pick."',
			farmers_market = '".$farmers_market."',
			farmers_market_name = '".addslashes($_POST['farmers_market_name'])."',
			farmers_market_time_from = '".addslashes($_POST['farmers_market_time_from'])."',
			farmers_market_time_until = '".addslashes($_POST['farmers_market_time_until'])."',
			farmers_market_time_day = '".addslashes($_POST['farmers_market_time_day'])."',
			";
			if($_POST['submit']=="Save"){
				//$sql.=" status = 'draft', ";
			}else{
				$sql.=" status = 'published', ";
			}
			
		    if($_POST['submit']=="Re-List"){
			$sql.=" published_date = '".date("Y-m-d g:i:s")."', ";}
			
		   /* if($_POST['listing_status']=="published"){
			$sql.=" published_date = '".date("Y-m-d g:i:s")."', ";}*/
			
			$sql.="
			lat = '".addslashes($_POST['lat'])."',
			lng = '".addslashes($_POST['lng'])."'
			WHERE lid = '$id' 
			";
		
		    if(!empty($_FILES['listing_image']['tmp_name'])){
				$this->imageResize("listing_image",$id);
			    $this->uploadFile("listing_image",$id);
				
			}

	        mysqli_query($conn,$sql) or die("<br>error around 313 of listing class  ".mysqli_error());
		    return "Listing has been updated";
		}
   
  
      public function showCurrency($type=false,$selected=false){
		$selected=trim($selected);
		$data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data["currency"]);
		foreach($arrVal as $val){
	     $val=trim($val);		
		 if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
			}
		 }
		
		return $return;
	}
	

	
	public function getListingDistanceLimit(){
	    $data=Page::getOptionsSettings();
		return $data["listing_distance_limit"];
	}
  
    public function showQuantityNumber($type=false,$selected=false){
		$selected=trim($selected);
		$data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data["quantity_number"]);
		foreach($arrVal as $val){
	     $val=trim($val);		
		 if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
		 }
		}
		
		return $return;
	}


    public function showOptions($field=false,$selected=false){
		$selected=trim($selected);
		$data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data[$field]);
		foreach($arrVal as $val){
	     $val=trim($val);		
		 if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
		 }
		}
		
		return $return;
	}

	
 
      public function showQuantityUnit($type=false,$selected=false){
		$selected=trim($selected);  
		$data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data["quantity_unit"]);
		foreach($arrVal as $val){
	     $val=trim($val);		
		  if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
			}
		}
		
		return $return;
	}



	public function countryList(){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".COUNTRIES." ORDER BY name ASC ") or die("<br>MEMBERS user error ".mysqli_error());
		
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	 $deleteUrl="?delete=".$data["id"];
	   $list[] = array( 'id' => $data["id"],
					    'name' => $data["name"],
						'options' => '<a href="'.SITE_URL.'/options-countries/?edit='.$data["id"].'">Edit</a>
						&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onClick="confirmDelete(\''.$deleteUrl.'\')">Delete</a>
						'
						);
	 }

      return $list;
    }	
	
	 public function showPeriodAvailability($type=false,$selected=false){
		$selected=trim($selected);
		$data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data["period_availability"]);
		foreach($arrVal as $val){
	      $val=trim($val);		
		  if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
			}
		}
		 $return="<option value=\"5000\" $isselected>Always available year-round</option>".$return;
		return $return;
	}
	
	 public function showTimeFrom($type=false,$selected=false){
		$selected=trim($selected); 
		$data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data["time_from"]);
		foreach($arrVal as $val){
	      $val=trim($val);		
		    if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
			}
		}
		return $return;
	}
	
	 public function showTimeUntil($type=false,$selected=false){
		$selected=trim($selected); 
		$data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data["time_until"]);
		foreach($arrVal as $val){
	      $val=trim($val);		
		    if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
			}
		}
		return $return;
	}	

	 public function showDay($type=false,$selected=false){
		 $selected=trim($selected); 
		 $data=Page::getOptionsSettings();
		$arrVal=explode("\n", $data["day"]);
		foreach($arrVal as $val){
	      $val=trim($val);		
		    if(!empty($val)){	
			 if($selected==$val){$isselected="selected";}else{$isselected="";} 	
			  $return.="<option value=\"$val\" $isselected>$val</option>";
			}
		  
		}
		return $return;
	}	


	/*sub category functions starts here*/
	public function productSubCategoryList($pid){
	  global $conn;
	  
	 $r=mysqli_query($conn,"SELECT * FROM ".PRODUCESUBCATEGORY." WHERE  parent='$pid' ORDER BY name ASC ") or die("<br>MEMBERS user error ".mysqli_error());
	
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	 $deleteUrl=SITE_URL."/sub-categories/?delete=".$data["id"].'&parent_id='.$pid.'&catname='.$_GET['catname'];
	   $list[] = array( 'id' => $data["id"],
					    'name' => $data["name"],
						'options' => '<a href="'.SITE_URL.'/sub-categories/?edit='.$data["id"].'&parent_id='.$pid.'&catname='.$_GET['catname'].'">Edit</a>
						&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onClick="confirmDelete(\''.$deleteUrl.'\')">Delete</a>
						'
				 );
	 }

      return $list;
    }


	  public function addSubCategory($pid){
			  global $conn;
		 $sql="
		 INSERT INTO ".PRODUCESUBCATEGORY." ( `name`,`vieworder`,`slug`,`parent`) 
		 VALUES ( '".$_POST['name']."','".$_POST['vieworder']."','".$_POST['slug']."','$pid')
		 ";
		 
	
		 $r=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		return "success";
		//header("location: /sub-categories/?added=1&parent_id=$pid");
	 }

	public function getSubCategoryDetails($id){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".PRODUCESUBCATEGORY." WHERE id ='$id' ") or die("<br>PRODUCECATEGORY  error ".mysqli_error());
		
	    if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
	 
      return $data;
  }		 

   	public function saveSubCategoryDetails($id){
		global $conn;
		$sql=" UPDATE ".PRODUCESUBCATEGORY." SET 
		`name` = '".$_POST['name']."', 
		`slug` = '".$_POST['slug']."', 
		`vieworder`  = '".$_POST['vieworder']."'
		 WHERE id ='$id' 
		";

     $r=mysqli_query($conn,$sql) or die(mysqli_error());
      return "success";
	}	
	 
	/*end sub category functions starts here*/	

	
	/*category functions starts here*/
	public function productCategoryList(){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".PRODUCECATEGORY." ORDER BY name ASC ") or die("<br>MEMBERS user error ".mysqli_error());
		
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	 $deleteUrl=SITE_URL."/product-categories/?delete=".$data["id"];
	   $list[] = array( 'id' => $data["id"],
					    'name' => $data["name"],
						'options' => '<a href="'.SITE_URL.'/sub-categories/?parent_id='.$data["id"].'&catname='.$data["name"].'">View/Edit Sub Category</a>
						&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.SITE_URL.'/product-categories/?edit='.$data["id"].'&catname='.$data["name"].'">Edit</a>
						&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onClick="confirmDelete(\''.$deleteUrl.'\')">Delete</a>
						'
						);
	 }

      return $list;
    }	

	  public function addCountry(){
			  global $conn;
		 $sql="
		 INSERT INTO ".COUNTRIES." ( `name`, `vieworder`,`code`,`region`) 
		 VALUES ( '".$_POST['name']."','".$_POST['vieworder']."','".$_POST['code']."','".$_POST['region']."' )
		 ";
		 
		 
		 $r=mysqli_query($conn,$sql) or die(mysqli_error());
		return "success";
		header("location: /product-categories/?added=1");
	 }

	
	  public function addCategory(){
			  global $conn;
		 $sql="
		 INSERT INTO ".PRODUCECATEGORY." ( `name`, `vieworder`,`slug`) 
		 VALUES ( '".$_POST['name']."','".$_POST['vieworder']."','".$_POST['slug']."' )
		 ";
	
     $r=mysqli_query($conn,$sql) or die(mysqli_error());
		 
		 $newid=mysqli_insert_id($conn); 
		if(!empty($_FILES['cat_image']['tmp_name'])){
			$this->uploadFile("cat_image",$newid);
		 } 
	 
		return "success";
		header("location: /product-categories/?added=1");
	 }

	public function getCountryDetails($id){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".COUNTRIES." WHERE id ='$id' ") or die("<br>COUNTRIES getCountryDetails error ".mysqli_error());
		
	    if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
	 
      return $data;
  }		 
	 	 
	 
	public function getCategoryDetails($id){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".PRODUCECATEGORY." WHERE id ='$id' ") or die("<br>PRODUCECATEGORY  error ".mysqli_error());
		
	    if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
	 
      return $data;
  }		 
	 

	 public function subProductCategoryDelete($id){
	  global $conn;
	  $r=mysqli_query($conn,"DELETE FROM ".PRODUCESUBCATEGORY." WHERE id ='$id' ") or die("<br>DELETE category  error ".mysqli_error());
			
	 }
	 
	 public function productCategoryDelete($id){
	  global $conn;
	  $r=mysqli_query($conn,"DELETE FROM ".PRODUCECATEGORY." WHERE id ='$id' ") or die("<br>DELETE category  error ".mysqli_error());
			
	 }

	 public function countryDelete($id){
	  global $conn;
	  $r=mysqli_query($conn,"DELETE FROM ".COUNTRIES." WHERE id ='$id' ") or die("<br>DELETE category  error ".mysqli_error());
			
	 }

	 
   	public function saveCountryDetails($id){
		global $conn;
		$sql=" UPDATE ".COUNTRIES." SET 
		`name` = '".$_POST['name']."', 
		`code` = '".$_POST['code']."', 
		`region` = '".$_POST['region']."', 
		`vieworder`  = '".$_POST['vieworder']."'
		 WHERE id ='$id' 
		";

     $r=mysqli_query($conn,$sql) or die(mysqli_error());
    return "success";
	}	
	
	 
   	public function saveCategoryDetails($id){
		global $conn;
		$sql=" UPDATE ".PRODUCECATEGORY." SET 
		`name` = '".$_POST['name']."', 
		`slug` = '".$_POST['slug']."', 
		`vieworder`  = '".$_POST['vieworder']."'
		 WHERE id ='$id' 
		";


	 if(!empty($_FILES['cat_image']['tmp_name'])){
		$this->uploadFile("cat_image",$id);
	 }
			 
     $r=mysqli_query($conn,$sql) or die(mysqli_error());
    return "success";
	header("location: /membership/?edited=1");
	}	
	
	/*category functions ends here*/
	
	
	
  public function listMembership(){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".MEMBERSHIP." ORDER BY name ASC ") or die("<br>MEMBERS user error ".mysqli_error());
		
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	
	   $list[] = array( 'id' => $data["id"],
					    'name' => $data["name"],
						'price' => $data["price"],
						'payment_term' => $data["payment_term"],
					    'options' => $data["options"],
						'options' => '<a href="'.SITE_URL.'/edit-membership/?id='.$data["id"].'">Edit</a>&nbsp;'.$delete
						);
	 }

      return $list;
    }
	

		  public function addMembership(){
				  global $conn;
			 $sql="
			 INSERT INTO ".MEMBERSHIP." ( `name`, `price`, `payment_term`) 
			 VALUES ( '".$_POST['name']."',
					  '".$_POST['price']."',
					  '".$_POST['payment_term']."'
					 )
			 ";
			 
			 
			 $r=mysqli_query($conn,$sql) or die(mysql_error());
			return "success";
			header("location: /membership/?added=1");
		 }
		 
		 
	public function getMembershipDetails($id){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".MEMBERSHIP." WHERE id ='$id' ") or die("<br>membership  error ".mysqli_error());
		
	    if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
	 
      return $data;
  }
  
   	public function saveMembership($id){
		global $conn;
		$sql=" UPDATE ".MEMBERSHIP." SET 
		`name` = '".$_POST['name']."', 
		`price`  = '".$_POST['price']."', 
		`payment_term` = '".$_POST['payment_term']."'
		 WHERE id ='$id' 
		";

     $r=mysqli_query($conn,$sql) or die(mysqli_error());
    return "success";
	header("location: /membership/?edited=1");
	}
	
	public function upgradeAccount(){
		$data=Page::getSettings();
		 $paypalEmail = $data["paypal_account"];
	    $planArr=explode('|',$_POST['plan']);
		if($planArr["3"]=="One Time"){$term="1";}
		elseif($planArr["3"]=="Monthly"){$term="M";}
		else{$term="Y";} //Annually
		$price=$planArr["2"];
		$description=$planArr["1"];
		
		if($planArr["3"]!="One Time"){
		echo '
				<form  name="_xclick" id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					
					<input type="hidden" name="cmd" value="_xclick-subscriptions">
					<input type="hidden" name="business" value="'.$paypalEmail.'">
					<input type="hidden" name="item_name" value="'.$description.'">
					<input type="hidden" name="currency_code" value="'.$data["currency"].'">
					<input type="hidden" name="no_shipping" value="1">
					<input style="display:none" type="image" src="http://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
					<input type="hidden" name="a3" value="'.$price.'">
					<input type="hidden" name="p3" value="1">
					<input type="hidden" name="t3" value="'.$term.'">
					<input type="hidden" name="src" value="1">
					<input type="hidden" name="sra" value="1">
					<input type="hidden" name="rm" value="2">
					<input type="hidden" name="notify_url" value="'.SITE_URL.'/poster.php">
					<input type="hidden" name="return" value="'.SITE_URL.'/upgraded/">
					<input type="hidden" name="cbt" value="Return to '.SITE_NAME.' complete transaction.">
					<input type="hidden" name="LANDINGPAGE" value="Billing">
					
					</form>
				
				</form>
				<script>document.getElementById("paypal").submit();</script>
				';
		}else{
            echo '
			<form id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="upload" value="1">
				<input type="hidden" name="business" value="'.$paypalEmail.'">
				<input type="hidden" name="item_name" value="'.$description.'">
				<input type="hidden" name="amount" value="' . $price . '">
				<input type="hidden" name="quantity" value="1"> 
				<input type="hidden" name="LANDINGPAGE" value="Billing">
				<input type="hidden" name="notify_url" value="'.SITE_URL.'/poster.php">
				<input type="hidden" name="return" value="'.SITE_URL.'/upgraded/">
				<input type="hidden" name="rm" value="2">
				<input type="hidden" name="cbt" value="Return to '.SITE_NAME.' complete transaction.">
				<input type="hidden" name="notify_url" value="'.SITE_URL.'/poster.php">
				<input type="hidden" name="currency_code" value="'.$data["currency"].'">
				<input style="display:none" type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
			</form>
				<script>document.getElementById("paypal").submit();</script>
			';
		}
		die();
	}

}

?>