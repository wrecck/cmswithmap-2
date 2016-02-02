<?php
class Page{

     //list all failed log users
	 function failedListLogs(){
	 global $conn;
	 $limit=20;
	 $sql="SELECT * FROM ls_ipoverlimit li 
	 LEFT JOIN wp_visitors wv  ON wv.usercode = li.usercode
	 WHERE 1 AND wv.usercode = li.usercode ";
	 
	 if(!empty($_POST['search_key'])){
	
		if($_POST['search_type']=="username"){ $sql.=" AND username LIKE '%".$_POST['search_key']."%' ";	 }
		if($_POST['search_type']=="name"){ $sql.=" AND ( first_name LIKE '%".$_POST['search_key']."%' OR  last_name LIKE '%".$_POST['search_key']."%') ";	 }
		if($_POST['search_type']=="email"){ $sql.=" AND email LIKE '%".$_POST['search_key']."%' ";	 }
	}
      
	 $r2=mysqli_query($conn,$sql) or die("<br>MEMBERS user error ".mysqli_error());
	 $totalrows=mysqli_num_rows($r2); 	
	 
	 $sql.="GROUP BY li.dateentry ";
	 if($_GET['pg']==""){$sql.=" LIMIT 0, $limit";}
	 else{ $start=(($_GET['pg']-1)*$limit);
		 $sql.=" LIMIT $start, $limit ";
		 }
		 
	
	 $r=mysqli_query($conn,$sql) or die("<br>MEMBERS user error ".mysqli_error());
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
		$deleteUrl=SITE_URL.'/members/?did='.$data["id"];
		$delete='|&nbsp;<a onClick="confirmDelete(\''.$deleteUrl.'\')" href="javascript:void(0)" >Delete</a>';
		
		if(empty($data["browser"]) AND empty($data["device"])){$type="BOTS";}else{$type="HUMAN";}
		
	   $list[] = array( 'vsid' => $data["vsid"],
						'type' => $type,	
					    'ref' => $data["ref"],
					    'os' => $data["os"],
					    'browser' => $data["browser"],
					    'country' => $data["country"],
					    'lang' => $data["lang"],
						'ip' => $data["ip"],
					    'device' => $data["device"],
						'dateentry' => $data["dateentry"]
						);
	
	 }
	 
	  $totalPages=ceil($totalrows/$limit);
	  for($cnt=1;$totalPages>$cnt;$cnt++){
		$pageLinks.="&nbsp;|&nbsp;<a href='?pg=$cnt'>$cnt</a>";  
	  }
	  $list["pagelinks"]=$pageLinks;	
	  
      return $list;
    }

     //list all users
	 function listLogs(){
	 global $conn;
	 $limit=20;
	 $sql="SELECT * FROM wp_visitors WHERE 1 ";
	 
	 if(!empty($_POST['search_key'])){
	
		if($_POST['search_type']=="username"){ $sql.=" AND username LIKE '%".$_POST['search_key']."%' ";	 }
		if($_POST['search_type']=="name"){ $sql.=" AND ( first_name LIKE '%".$_POST['search_key']."%' OR  last_name LIKE '%".$_POST['search_key']."%') ";	 }
		if($_POST['search_type']=="email"){ $sql.=" AND email LIKE '%".$_POST['search_key']."%' ";	 }
	}
      
	 $r2=mysqli_query($conn,$sql) or die("<br>MEMBERS user error ".mysqli_error());
	 $totalrows=mysqli_num_rows($r2); 	
	 if($_GET['pg']==""){$sql.=" LIMIT 0, $limit";}
	 else{ $start=(($_GET['pg']-1)*$limit);
		 $sql.=" LIMIT $start, $limit ";
		 }
	
	 $r=mysqli_query($conn,$sql) or die("<br>MEMBERS user error ".mysqli_error());
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
		$deleteUrl=SITE_URL.'/members/?did='.$data["id"];
		$delete='|&nbsp;<a onClick="confirmDelete(\''.$deleteUrl.'\')" href="javascript:void(0)" >Delete</a>';
		
		if(empty($data["browser"]) AND empty($data["device"])){$type="BOTS";}else{$type="HUMAN";}
		
	   $list[] = array( 'vsid' => $data["vsid"],
						'type' => $type,	
					    'ref' => $data["ref"],
					    'os' => $data["os"],
					    'browser' => $data["browser"],
					    'country' => $data["country"],
					    'lang' => $data["lang"],
						'ip' => $data["ip"],
					    'device' => $data["device"],
						'dateentry' => $data["dateentry"]
						);
	
	 }
	 
	  $totalPages=ceil($totalrows/$limit);
	  for($cnt=1;$totalPages>$cnt;$cnt++){
		$pageLinks.="&nbsp;|&nbsp;<a href='?pg=$cnt'>$cnt</a>";  
	  }
	  $list["pagelinks"]=$pageLinks;	
	  
      return $list;
    }

public function editMessage($id){
	global $conn;
	
	//update as read
	$sql="UPDATE ".MESSAGES." SET isread ='1' WHERE id ='$id' "; 
	$r=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	
	$sql="SELECT * FROM ".MESSAGES." m
		  LEFT JOIN ".USERS_TABLE." u ON m.from = u.id 
	WHERE m.id='".$_GET['id']."' ";
	$r=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	
	
	
	
	return mysqli_fetch_array($r,MYSQLI_ASSOC);
}

public function insertInbox($data){
	global $conn;
	
$sql=" INSERT INTO ".MESSAGES." (`touser`, `from`, `subject`, `body`,`parent`,`listing_id`,`message_type`, `isread`, `isreplied`,`dateentry`)
					VALUES('".$data["touser"]."','".$_SESSION["user_id"]."','".addslashes($data["subject"])."','".addslashes($data["body"])."',
					'".$data["parent"]."','".$data["listing_id"]."','".$data["message_type"]."',
					'0','0','".date("Y-m-d g:i:s")."');
";

$r=mysqli_query($conn,$sql)
 		or die("<br>insertInbox insert error. ".mysqli_error($conn));

if($data["isreplied"]==1){ //update/mark parent as replied to 
  $sql="UPDATE ".MESSAGES." SET isreplied='1' WHERE id='".$_GET['id']."' ";
  $r=mysqli_query($conn,$sql)
 		or die("<br>insertInbox update error. ".mysqli_error($conn)); 
}
		
}


public function unread_messages_count(){	
	global $conn;
$sql=" SELECT * FROM ".MESSAGES." WHERE touser ='".$_SESSION["user_id"]."' AND  isread='0' ";
$r=mysqli_query($conn,$sql)
		or die("<br>viewListing error. ".mysqli_error($conn));
		
	return mysqli_num_rows($r);	
}

public function viewMessages(){	
	global $conn;
$sql=" SELECT *, m.id as mid FROM ".MESSAGES." m 
       LEFT JOIN ".USERS_TABLE." u
	   ON m.from = u.id
        WHERE m.touser ='".$_SESSION["user_id"]."' ";
if(!empty($_GET['filter'])){
 if($_GET['filter']=="unread"){$sql.=" AND isread='0' ";}
}	
$sql.="	ORDER BY m.dateentry DESC ";


   $r=mysqli_query($conn,$sql)
		or die("<br>viewListing error. ".mysqli_error($conn));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
  
				$list[] = array( 
					'id' => $data["mid"],
					'touser' => $data["touser"],
					'from' => $data["from"],
					'username' => $data["username"],							
					'listing_id' => $data["listing_id"],		
					'message_type' => $data["message_type"],		
					'subject' => $data["subject"],		
					'body' => $data["body"],								
					'isread' => $data["isread"],			
					'isreplied' => $data["isreplied"],								
					'dateentry' => $data["dateentry"],								
					'options' => '<a href="'.SITE_URL.'/my-messages/?did='.$data["lid"].'">Delete</a>&nbsp;'
					);
         }
					 
		return $list;
}	

public function sendEmail($data){
    if(!empty($data["fromemail"])){$replyto="\r\n".'Reply-To: '.$data["fromemail"];} //send straight to email because its a guest
	
	if(!empty($data["sendcopy"])){
		if(mail($data["fromemail"],$data["subject"],$data["body"],"'From:support@sproutingtrade.com' $replyto")){}
    }	

	if(mail($data["toemail"],$data["subject"],$data["body"],"'From:support@sproutingtrade.com' $replyto")){return "message sent";}
	
}


public function randomizedImage($images,$id=false){
$imagesArr=explode(',',$images);
$arrCount = (count($imagesArr)-1);
$randomNumber=rand(1,$arrCount);

if(!empty($id)){
		if(empty($_SESSION[$id])){
			$_SESSION[$id]=1;	
			$randomNumber=rand(1,$arrCount);//$randomNumber="1";
		}elseif($_SESSION[$id]==$arrCount){
			$_SESSION[$id]=1;	
			$randomNumber="1";
		}else{
			$randomNumber=$_SESSION[$id]+1;
			$_SESSION[$id]=$randomNumber;	
		}
//echo "<hr>".$randomNumber."-".$arrCount."|".$_SESSION[$id]."<hr>";
}

return ($imagesArr[$randomNumber]);

}

public	function saveOptionsSettings(){
	  global $conn;
$sql="UPDATE  ".OPTIONSSETTINGS." SET
	                        currency='".$_POST['currency']."',
	                        quantity_number='".$_POST['quantity_number']."',
	                        quantity_unit='".$_POST['quantity_unit']."',
							quantity_unit='".$_POST['quantity_unit']."',
							time_from='".$_POST['time_from']."',
							time_until='".$_POST['time_until']."',
							period_availability='".$_POST['period_availability']."',
							period_availability_limit='".$_POST['period_availability_limit']."',
							gs_period_availability_limit='".$_POST['gs_period_availability_limit']."',
							day='".$_POST['day']."',
							list_post_limit='".$_POST['list_post_limit']."',
							listing_record_limit='".$_POST['listing_record_limit']."',
							listing_distance_limit='".$_POST['listing_distance_limit']."',
							
							growing_space_style='".$_POST['growing_space_style']."',
							growing_space_size='".$_POST['growing_space_size']."',
							growing_space_size_unit='".$_POST['growing_space_size_unit']."',
							growing_space_cost='".$_POST['growing_space_cost']."',
							growing_space_period='".$_POST['growing_space_period']."',
							growing_space_onsite_tools='".$_POST['growing_space_onsite_tools']."',
							growing_space_parking='".$_POST['growing_space_parking']."',
							growing_space_accommodation='".$_POST['growing_space_accommodation']."',
							growing_space_organic_certification='".$_POST['growing_space_organic_certification']."',
							growing_space_site_access_time='".$_POST['growing_space_site_access_time']."'
							
							WHERE 1

	 ";

	 $r=mysqli_query($conn,$sql) or die("<br>Settings update error: ".mysqli_error($conn));
		  return "success";
}	
	
public	function saveSettings(){
	  global $conn;

	 $r=mysqli_query($conn,"UPDATE  ".SETTINGS." SET
	                        sitename='".$_POST['sitename']."',
	                        description='".$_POST['description']."',
	                        keyword='".$_POST['keyword']."',
							listing_count='".$_POST['listing_count']."',
							header_code='".$_POST['header_code']."',
							footer_code='".$_POST['footer_code']."',
							paypal_enabled='".$_POST['paypal_enabled']."',
							paypal_account='".$_POST['paypal_account']."'
						    WHERE 1

	 ") or die("<br>Settings update error: ".mysqli_error());
		  return "success";
}	
	
public function getSettings(){
		global $conn;
		 $sql="SELECT * FROM ".SETTINGS."  ";
		$r=mysqli_query($conn,$sql) or die(mysql_error());
		if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}

	return $data;
}

public function getOptionsSettings(){
		global $conn;
		 $sql="SELECT * FROM ".OPTIONSSETTINGS."  ";
		$r=mysqli_query($conn,$sql) or die(mysql_error());
		if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}

	return $data;
}


public function checkRemoteFile($url)
{   return true;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(curl_exec($ch)!==FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}
	
  public function getContent($pid){
	  global $coreURL, $con;
		$sql="SELECT * FROM rg_pages WHERE page_id ='".$pid."'  ";
		$r=mysqli_query($con,$sql) or die(mysql_error());
		if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
		return $data;
  }

   public function getContentBySlug($pslug){
	  global $coreURL, $con;
		$sql="SELECT * FROM rg_pages WHERE  page_slug ='".$pslug."'  ";
		$r=mysqli_query($con,$sql) or die(mysql_error());
		if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
		
		return $data;
  }
  
  public function saveError($log){
             $f=fopen("../ts_error.txt","a");
			 fwrite($f, $log."\n");
			 fclose($f);
  }
  
  public function dateDifference($start_time){
		
		$datetime1 = new DateTime($start_time);
		$datetime2 = new DateTime();
		$interval = $datetime1->diff($datetime2);
	
	
		if($interval->d>0){
		 return $interval->format('%a'.' days & %h'.' hrs ago '. ' (updated %i minutes)');
        }else{ 	
		 return $interval->format('%h'.' hrs ago '. ' (updated %i minutes)');
		}
  }

  public function dateDifferenceWithAddedDate($start_time, $date_added){
		
		$datetime1 = new DateTime($start_time);
		$dateadded1 = new DateTime($date_added);

		$datetime2 = new DateTime();

		$interval = $datetime1->diff($datetime2);
	
		$interval2 = $dateadded1->diff($datetime2);

		if($interval->d>0){
		 $updated = $interval->format('(updated %a'.' days & %h'.' hrs &'. '  %i minutes ago)');
        }else{ 	
		 $updated = $interval->format('(updated %h'.' hrs &'. ' %i minutes ago)');
		}

		if($interval2->d>0){
		 $added = 'added '.$dateadded1->format('M d, Y');
        }else{ 	
		 $added = $interval2->format('added %h'.' hrs &'. ' %i minutes ago');
		}

		return $added.' '.$updated;

  }
 	function savePage($id){
		global $conn;
		


		$showinside=$_POST['showinside'];
		$showinheader=$_POST['showinheader'];
		$showinfooter=$_POST['showinfooter'];
		if($showinside==""){$showinside="0";}
		if($showinheader==""){$showinheader="0";}
		if($showinfooter==""){$showinfooter="0";}
		$sql=" UPDATE ".PAGES." SET 
		`page_title` = '".$_POST['page_title']."', 
		`page_content`  = '".addslashes($_POST['page_content'])."', 
		`page_slug` = '".$_POST['page_slug']."', 
		`page_quote` = '".addslashes($_POST['page_quote'])."', 
		`custom_title` = '".addslashes($_POST['custom_title'])."',
		`page_description` = '".addslashes($_POST['page_description'])."',
		`page_keyword` = '".$_POST['page_keyword']."',
		 `showinheader` =  '".$showinheader."',
		 `showinside` = '".$showinside."',
		 `showinfooter` = '".$showinfooter."',
		 `page_order` =  '".$_POST['page_order']."'
		 WHERE pid ='$id' 
		";

     $r=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	 
	 $this->uploadFile($id);

	if(!empty($_FILES["additional_header_image1"]['tmp_name'])){$this->uploadSlider($id,"additional_header_image1");}
	if(!empty($_FILES["additional_header_image2"]['tmp_name'])){$this->uploadSlider($id,"additional_header_image2");}
	if(!empty($_FILES["additional_header_image3"]['tmp_name'])){$this->uploadSlider($id,"additional_header_image3");}
	if(!empty($_FILES["additional_header_image3"]['tmp_name'])){$this->uploadSlider($id,"additional_header_image3");}	 

    return "success";
	header("location: /pages/?edited=1");
	}
	
	
	public function deleteOtherImage(){
		global $conn;
		$sql="UPDATE ".PAGES." SET other_image=REPLACE(other_image,',".$_GET['delete']."','') WHERE pid ='".$_GET['id']."' ";
		$r=mysqli_query($conn,$sql) or die("<br>check permission error ".mysqli_error());
	}
	
	public function uploadSlider($id,$type){
		global $conn;
		$target_path = SITE_UPLOAD_PATH."/slides/";
		$fileName="slides_".$id."_".$_FILES[$type]['name'];
		$target_path = $target_path.basename($fileName); 

			if(move_uploaded_file($_FILES[$type]['tmp_name'], $target_path)) {
						if($_POST['other_image']==""){
						    $sql="UPDATE ".PAGES." SET other_image=',".$fileName."' WHERE pid ='$id' ";
						}else{
							 $sql="UPDATE ".PAGES." SET other_image=CONCAT(other_image,',".$fileName."') WHERE pid ='$id' ";
						}
						
						$r=mysqli_query($conn,$sql) or die("<br>check permission error ".mysqli_error($conn));

			}			
	}
	
	public function uploadFile($id=false){
		  global $conn;
			 if(!empty($_FILES["header_image"]['tmp_name'])){		
				  $target_path = SITE_UPLOAD_PATH."/slides/";
				  $fileName="slides_".$id."_".$_FILES["header_image"]['name'];
				  $target_path = $target_path.basename( $fileName); 

							if(move_uploaded_file($_FILES["header_image"]['tmp_name'], $target_path)) {
									
										 $sql="UPDATE ".PAGES." SET page_header_image ='".$fileName."' WHERE pid ='$id' ";
										$r=mysqli_query($conn,$sql) or die("<br>check permission error ".mysqli_error());
									 
							}		 
			 }		
	}	
	
    function addPage(){
		if(!empty($showinheader)){$showinheader=$_POST['showinheader'];}else{$showinheader="0";}
		if(!empty($showinside)){$showinside=$_POST['showinside'];}else{$showinside="0";}
		if(!empty($showinfooter)){$showinfooter=$_POST['showinfooter'];}else{$showinfooter="0";}
		if(!empty($page_order)){$page_order=$_POST['page_order'];}else{$page_order="0";}
		
		
      global $conn;
     $sql="
	 INSERT INTO ".PAGES." ( `page_title`, `page_content`,`page_quote`, `page_slug`,`custom_title`,
	 `page_description`, `page_keyword`,`showinheader`, `showinside`, `showinfooter`,`page_order`) 
	 VALUES ( '".$_POST['page_title']."',
	          '".$_POST['page_content']."',
			  '".$_POST['page_quote']."',
			  '".$_POST['page_slug']."',
			  '".$_POST['custom_title']."',
			  '".$_POST['page_description']."',
			  '".$_POST['page_keyword']."',
			  '".$showinheader."',
			  '".$showinside."',
	          '".$showinfooter."',
			  '".$page_order."'
			 )
	 ";
	 
   	 
	 $r=mysqli_query($conn,$sql) or die(mysql_error());
	 $newid=mysqli_insert_id($conn); 
	  $this->uploadFile($newid);
	 
    return "success";
	header("location: /pages/?added=1");
	}	
	

	     //list all pages
	 function listPages(){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".PAGES." ORDER BY page_title ASC ") or die("<br>MEMBERS user error ".mysqli_error());
		
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	
	   $list[] = array( 'pid' => $data["pid"],
					    'page_title' => $data["page_title"],
					    'page_content' => $data["page_content"],
					    'page_slug' => $data["page_slug"],
					    'page_description' => $data["page_description"],
					    'showinheader' => $data["showinheader"],
						'showinside' => $data["showinside"],
						'showinfooter' => $data["showinfooter"],
						'options' => '<a href="'.SITE_URL.'/edit-page/?id='.$data["pid"].'">Edit</a>&nbsp;'.$delete
						);
	
	 }

      return $list;
    }
	
	
	
	function bottomMenu(){
		 global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".PAGES." WHERE showinfooter='1' AND page_slug!='home' AND page_title!='Home' 
						    ORDER BY page_order ASC ") or die("<br>MEMBERS user error ".mysqli_error());
		
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	
	   $list[] = array( 'pid' => $data["pid"],
					    'page_title' => $data["page_title"],
					    'page_content' => $data["page_content"],
					    'page_slug' => $data["page_slug"],
					    'page_description' => $data["page_description"],
					    'showinheader' => $data["showinheader"],
						'showinside' => $data["showinside"],
						'showinfooter' => $data["showinfooter"],
						'options' => '<a href="'.SITE_URL.'/edit-page/?id='.$data["pid"].'">Edit</a>&nbsp;'.$delete
						);
	
	 }

      return $list;
		
	}
	
	function topMenu(){
		 global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".PAGES." WHERE showinheader='1' ORDER BY page_order ASC ") or die("<br>MEMBERS user error ".mysqli_error($conn));
		
	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	
	   $list[] = array( 'pid' => $data["pid"],
					    'page_title' => $data["page_title"],
					    'page_content' => $data["page_content"],
					    'page_slug' => $data["page_slug"],
					    'page_description' => $data["page_description"],
					    'showinheader' => $data["showinheader"],
						'showinside' => $data["showinside"],
						'showinfooter' => $data["showinfooter"],
						'options' => '<a href="'.SITE_URL.'/edit-page/?id='.$data["pid"].'">Edit</a>&nbsp;'.$delete
						);
	
	 }

      return $list;
		
	}
	
	
 function getPageDetails($id){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".PAGES." WHERE pid ='$id' ") or die("<br>PAGE user error ".mysqli_error());
		
	    if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
	 
      return $data;
  }
  
 function pageBlocks($content){ //process content for page embedding
   $content=trim($content);
	$content=str_replace("\n","<br>",$content);	

   return "".$content;
 }
 
 function getPagesContent($slug){
	  global $conn;
	  $excludeProcessing=array('home');
	 $r=mysqli_query($conn,"SELECT * FROM ".PAGES." WHERE page_slug ='$slug' ") or die("<br>MEMBERS user error ".mysqli_error());
		
	    if(mysqli_num_rows($r)>0){
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		}else{
			$data=0;
		}
	 if(!in_array($data["page_slug"],$excludeProcessing)){
	  @$data["page_content"]=$this->pageBlocks($data["page_content"]);  //add page block(widgets)
     }	 
	 return $data;
  }

	 function loadRss($type){
		 global $conn;
		$sql=" SELECT * FROM ".LOGSEARCH." GROUP BY category, produce, location  ORDER BY date  DESC ";
		$r=mysqli_query($conn,$sql)
			or die("<br>LOGSEARCH ".mysqli_error($conn));
			 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
				 if(!empty($data["category"])){$search=" ".str_replace("-"," ",$data["category"]);$searchQ='category='.$data["category"];}
				 if(!empty($data["produce"])){$search.=" ".$data["produce"];$searchQ.='&amp;produce='.$data["produce"];}
				 if(!empty($data["location"])){$search.=" ".$data["location"];$searchQ.='&amp;location='.$data["location"];}
				 $search="Searching for ".$search;
				 
				 $searchLink='http://sproutingtrade.com/search/?'.$searchQ;
				 $searchDescription="Search result link ".$search;
				 //echo $search."<br>";
				 $searchLink=str_replace('?&','?',$searchLink);
				
				 $item.='
				 <item>
					<title>'.$search.'</title>
					<link>'.$searchLink.'</link>
					<description>'.$searchDescription.'</description>
					</item>
				 ';
				 //
				 $search="";
				 $searchLink="";
				 $searchQ="";
				 $searchDescription="";
			 }
	   header("Content-Type: application/xml; charset=ISO-8859-1");
	   echo '
			<channel>
			<title>'.SITE_NAME.'</title>
			<link>'.SITE_URL.'</link>
	        '.$item.'
			<description>--</description>
			</channel>
	   
	   ';
	} 
  
  
}



  ?>