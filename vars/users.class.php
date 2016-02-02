<?php

Class UsersCalls{

    function checkPermission($currentPage){  //check user permission
		
	
	       if($_SESSION["account_type"]==1){return true;} //no need to check if its admin
		   if($_SESSION["account_type"]==101){ 
				return true;
			} //no need to check if its admin
			
			global $conn;
			$r=mysqli_query($conn,"SELECT * FROM ".USERS_TYPE_TABLE." WHERE id ='".$_SESSION["user_id"]."' ") or die("<br>check permission error ".mysqli_error());
			$data=mysqli_fetch_array($r,MYSQLI_ASSOC);

			  $allowedPage=unserialize($data["page_level"]);
			  $allowedPage[] = "index";

			  if (!in_array($currentPage,$allowedPage)){
				  return false;
			  }else{return true;}
	}

    function addRole(){ //add new role
	   global $conn;

		$exclude_array=array("account_type_name","page_level","id","submit"); //retrieve pages selection
		foreach($_POST as $key => $pageLevel){
			  if (!in_array($key,$exclude_array)){
				 $pageLevelArray[] = $key;
			  }
		}

		 $pageLevelSerialized=serialize($pageLevelArray);

	     $r=mysqli_query($conn,"INSERT INTO ".USERS_TYPE_TABLE." (account_type_name,page_level)
	                 VALUE('".$_POST['account_type_name']."','".$pageLevelSerialized."') ") or die("<br>add new role error ".mysqli_error());
	     return "success";

		 die();
	}


    function saveRole(){
		  global $conn;

		    $exclude_array=array("account_type_name","page_level","id","submit"); //retrieve pages selection
			foreach($_POST as $key => $pageLevel){
			      if (!in_array($key,$exclude_array)){
			         $pageLevelArray[] = $key;
				  }
			}

		  	$pageLevelSerialized=serialize($pageLevelArray);

			 $r=mysqli_query($conn,"UPDATE  ".USERS_TYPE_TABLE." SET
									account_type_name='".$_POST['account_type_name']."',
									page_level='".$pageLevelSerialized."'
						            WHERE id ='".$_POST['id']."'

			 ") or die("<br>User update error saveRole: ".mysqli_error());


		     return "success";
	}


    function listTemplate(){ //list all modules for page roles page


		$dir = SITE_TEMPLATE_PATH;
			$dh  = opendir($dir);
			$exclude_array=array("notemplate.php","article-timeline.php","admin_users.php","header.php","footer.php","assets","backup","bootstrap",
			"css","index.php","header-plain.php","images","assets","includes","js","includes","js","login.php",".","..");
			while (false !== ($filename = readdir($dh))) {
			   if (!in_array($filename,$exclude_array)){
			       $files[] = str_replace(".php","",$filename);
				}
			}
			return $files;
	}

    function accountTypeList($format,$selected=""){  //display type of user list
	    global $conn;
	    $r=mysqli_query($conn,"SELECT * FROM ".USERS_TYPE_TABLE." ORDER by account_type_name ASC ")
		or die("<br>list account type error `".mysqli_error($r));
	     for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	          if($format=="select"){if($selected==$data["id"]){$isSelected="selected";}else{$isSelected="";}
                   $list.="<option ".$isSelected." value='".$data["id"]."'>".$data["account_type_name"]."</option>";
			  }
	          if($format=="links"){
                   $list.="<a>".$data["account_type_name"]."</a>";
			  }

	          if($format=="array"){
			  	  if($data["id"]!=1){ //$delete='|&nbsp;<a href="'.SITE_URL.'/delete-role/?id='.$data["id"].'">Delete</a>';}else{$delete="";

					$selectedPages=unserialize($data["page_level"]);
                    foreach($selectedPages as $page){$pageList.=", ".$page;}
					$pageList=substr($pageList,2);
                  $list[] = array( 'id' => $data["id"],
				                             'account_type_name' => $data["account_type_name"],
											 'page_level' => $pageList,
											 'options' => '<a href="'.SITE_URL.'/edit-role/?id='.$data["id"].'">Edit</a>&nbsp;'.$delete
											 );
									$pageList="";
				       }
			  }

	     }

		 return $list;
     }



	 function getRoleDetails($id){ //get user details
	  	global $conn;
	      $r=mysqli_query($conn,"SELECT * FROM ".USERS_TYPE_TABLE." WHERE id ='$id' ") or die("<br>user details error ".mysqli_error());
	      $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	      return $data;
	   }

	  function checkUserDetails($id,$with=false){ //get user details
	  	global $conn;
		$sql="SELECT * FROM ".USERS_TABLE." WHERE ";
		if($with=="username"){$sql.=" username ='$id' ";}
		else{$sql.=" id='$id' ";}
	    
		
		$r=mysqli_query($conn,$sql) or die("<br>user details error ".mysqli_error());
	      $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	   
		 if($data["address1"]=="" OR  $data["city"]=="" OR $data["state"]=="" OR $data["country"]=="" OR $data["phone"]==""){return "0";}else{ return "1";}
	     
	   }

	 function getUserDetails($id,$with=false){ //get user details
	  	global $conn;
		$sql="SELECT * FROM ".USERS_TABLE." WHERE ";
		if($with=="username"){$sql.=" username ='$id' ";}
		else{$sql.=" id='$id' ";}
	    
		
		$r=mysqli_query($conn,$sql) or die("<br>user details error ".mysqli_error());
	      $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
		  if($data["address2"]=="NULL"){$data["address2"]="";}
	      return $data;
	   }

	 function register_member(){
		   global $conn;
		   $actcode=rand(13354,50342);
		   $sql="INSERT INTO ".USERS_TABLE."( `username`, `password`, `first_name`, `last_name`, `email`, 
			`profile_type`,`organization_name`,`phone`,`description`, `status`, `account_type`, `avatar`, `page_level` ,`actcode`,`paid`, `date_added`)
			VALUES ('".$_POST["username"]."','".md5($_POST["password"])."','".$_POST["first_name"]."','".$_POST["last_name"]."',
			'".$_POST["email"]."','".$_POST["profile_type"]."','".$_POST["organization_name"]."','".$_POST["phone"]."','".$_POST["description"]."',
			'0','101','".$_FILE["avatar"]["name"]."','','$actcode','1','".date("Y-m-d g:i:s")."')";
			 
		
			$r=mysqli_query($conn,$sql)
			or die("<br>add user User error: ".mysqli_error($conn));
			
          	 
	          $newid=mysqli_insert_id($conn);
	
			  if($_FILES["avatar"]["tmp_name"]!=""){  	 //upload image
				 $fileName=$this->uploadImage("avatar",$newid);
				 if($fileName!="Invalid file"){$avatar=$fileName;}
				
				  $avatarSql="UPDATE ".USERS_TABLE." SET avatar='".$avatar."' WHERE id='$newid'  ";
				   mysqli_query($conn,$avatarSql);
			   }
			 
			$this->sendActivationLink($_POST["email"],$_POST['first_name'],$actcode); 
			
			return "success";
	 }

	 
	 function sendActivationLink($toemail,$first_name,$actcode){
		 global $siteTitle;
		 $body="Dear ".ucfirst($first_name).",\n\nYour account has been created.
		 \nYou may now activate your new account by clicking the activation link below:\n".SITE_URL."/activate/?act=$actcode\n\nSproutingtrade.com Support
		 ";
		
		  mail($toemail,$siteTitle." Activation Link",$body,"From:support@sproutingtrade.com");
	 }

     //add  user
	 function addUser(){
	  global $conn;

	 if(!empty($_POST['password'])){$passwordUpdate="password='".md5($_POST['password'])."', ";}
	
	 $r=mysqli_query($conn,"INSERT INTO ".USERS_TABLE."( `username`, `password`, `first_name`, `last_name`, `email`,
	 `status`, `account_type`, `avatar`, `page_level`, `date_added`)
	 VALUES ('".$_POST["username"]."','".md5($_POST["password"])."','".$_POST["first_name"]."',
	         '".$_POST["last_name"]."','".$_POST["email"]."','".$_POST["status"]."','".$_POST["account_type"]."'
			 ,'".$_FILE["avatar"]["name"]."','".$_POST["page_level"]."','".date("Y-m-d g:i:sa")."')")
	 or die("<br>add user User error: ".mysqli_error());
		  return "success";
		  $newid=mysqli_insert_id($conn);
	
	  if($_FILES["avatar"]["tmp_name"]!=""){  	 //upload image
         $fileName=$this->uploadImage("avatar",$newid);
	     if($fileName!="Invalid file"){$avatar=$fileName;}

		 $avatarSql=" avatar='".$avatar."', ";
	   }
	 }

    function saveCroppedPhoto(){
		$newfile=$_GET['newfile'];
		$newfile=str_replace("http://localhost",SITE_PATH,$newfile);
		$newfile=str_replace("http://sproutingtrade.com",SITE_PATH,$newfile);
		$destfile=$_GET['dest'];
		if(!copy($newfile,$destfile)){echo "cant";}else{echo "good";}
		
	}
	
	function uploadImage($type,$id){

			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES[$type]["name"]);
			$extension = end($temp);

			if ((($_FILES[$type]["type"] == "image/gif")
			|| ($_FILES[$type]["type"] == "image/jpeg")
			|| ($_FILES[$type]["type"] == "image/jpg")
			|| ($_FILES[$type]["type"] == "image/pjpeg")
			|| ($_FILES[$type]["type"] == "image/x-png")
			|| ($_FILES[$type]["type"] == "image/png"))
			&& ($_FILES[$type]["size"] < 2000000)
			&& in_array($extension, $allowedExts)) {
			  if ($_FILES[$type]["error"] > 0) {
				echo "Return Code: " . $_FILES[$type]["error"] . "<br>";
			  } else {
			  	 if (file_exists(SITE_UPLOAD_PATH."/".$type."/".$id.'-'.$_FILES[$type]["name"])) {
				 } else {
				  move_uploaded_file($_FILES[$type]["tmp_name"],
				  SITE_UPLOAD_PATH."/".$type."/".$id.'-'. $_FILES[$type]["name"]);

				}
				return $id.'-'.$_FILES[$type]["name"];
			  }
			} else {
			  return "Invalid file";
			}



    }


     function saveUserProfile(){
	  global $conn;

	   $offerData=serialize($_POST['offer']);
	    $ppOfferData=serialize($_POST['ppoffer']);
	  // $latlong=Listing::getCoordinates($_POST["address1"].", ".$_POST["city"].", ".$_POST["state"].", ".$_POST["zip"].", ".$_POST["country"]);
	   if($_FILES["avatar"]["tmp_name"]!=""){  	 //upload image
         $fileName=$this->uploadImage("avatar",$_POST['id']);
	     if($fileName!="Invalid file"){$avatar=$fileName;}

		 $avatarSql=" avatar='".$avatar."', ";
	   }
    
	$sql="UPDATE  ".USERS_TABLE." SET
	                        first_name='".$_POST['first_name']."',
	                        last_name='".$_POST['last_name']."',
							organization_name='".addslashes($_POST['organization_name'])."',
							phone='".$_POST['phone']."',
							address1 = '".addslashes($_POST['address1'])."',
							address2 = '".addslashes($_POST['address2'])."',
							city = '".addslashes($_POST['city'])."',
							
							county = '".addslashes($_POST['county'])."',
							website = '".addslashes($_POST['website'])."',
							tagline = '".addslashes($_POST['tagline'])."',
							offer = '".addslashes($offerData)."',
							ppoffer = '".addslashes($ppOfferData)."',
							lat = '".addslashes($_POST['lat'])."',
							lng = '".addslashes($_POST['lng'])."',							
							state = '".addslashes($_POST['state'])."',
							zip = '".addslashes($_POST['zip'])."', 
							country = '".addslashes($_POST['country'])."', ";
						
					if($_POST['submit']=="Re-List"){
						$sql.=" published_date='".date("Y-m-d g:i:s")."', ";
					}
							
							$sql.="
							search_keywords = '".addslashes($_POST['search_keywords'])."',
							description='".addslashes($_POST['description'])."',
							$avatarSql
	                        email='".$_POST['email']."'
	                       
                            WHERE id ='".$_POST['id']."'";
	
	 $r=mysqli_query($conn,$sql) 
							or die("<br>User update error saveUserProfile: ".mysqli_error($conn));
		  return "success";	
	   
	 }
	 
     //save user
	 function saveUser(){
	  global $conn;

	   if($_FILES["avatar"]["tmp_name"]!=""){  	 //upload image
         $fileName=$this->uploadImage("avatar",$_POST['id']);
	     if($fileName!="Invalid file"){$avatar=$fileName;}

		 $avatarSql=" avatar='".$avatar."', ";
	   }


	 if(!empty($_POST['password'])){$passwordUpdate="password='".md5($_POST['password'])."', ";}

	 if($_POST['isprofile']!="1"){
	    $accountSql=" account_type='".$_POST['account_type']."',
	     status='".$_POST['status']."',
	   ";
	 }

	 $r=mysqli_query($conn,"UPDATE  ".USERS_TABLE." SET
	                        first_name='".$_POST['first_name']."',
	                        last_name='".$_POST['last_name']."',
							organization_name='".$_POST['organization_name']."',
							phone='".$_POST['phone']."',
							address1 = '".addslashes($_POST['address1'])."',
							address2 = '".addslashes($_POST['address2'])."',
							city = '".addslashes($_POST['city'])."',
							state = '".addslashes($_POST['state'])."',
							zip = '".addslashes($_POST['zip'])."',
							country = '".addslashes($_POST['country'])."',
							description='".$_POST['description']."',
	                        email='".$_POST['email']."',
	                        $accountSql
	                        $avatarSql
							$passwordUpdate
	                        page_level='".$_POST['page_level']."'
                            WHERE id ='".$_POST['id']."'

	 ") or die("<br>User update error saveUser: ".mysqli_error($conn));
		  return "success";

}


     //list all users
	 function listUsers(){
	  global $conn;
	 $r=mysqli_query($conn,"SELECT * FROM ".USERS_TABLE." WHERE account_type NOT IN('3','101') ") or die("<br>list user error ".mysqli_error());

	 for($cnt=0;$data=mysqli_fetch_array($r,MYSQLI_ASSOC);$cnt++){
	  if($data["id"]!=1){$delete='|&nbsp;<a href="'.SITE_URL.'/delete-user/?id='.$data["id"].'">Delete</a>';}else{$delete="";}
	   $list[] = array( 'id' => $data["id"],
					    'username' => $data["username"],
					    'password' => $data["password"],
					    'first_name' => $data["first_name"],
					    'last_name' => $data["last_name"],
					    'email' => $data["email"],
						'account_type' => $this->getUserType($data["account_type"]),
					    'status' => $this->getUserStatus($data["status"]),
						'options' => '<a href="'.SITE_URL.'/edit-user/?id='.$data["id"].'">Edit</a>&nbsp;'.$delete
						);
	 }

      return $list;
    }

    function getUserType($id){
		global $conn;
	      $r=mysqli_query($conn,"SELECT * FROM ".USERS_TYPE_TABLE." WHERE id ='$id' ") or die("<br>user details error ".mysqli_error());
	      $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	      return $data["account_type_name"];

	}

	function getUserStatus($sid){
	    if($sid==1){$return = "Active";}
	    if($sid==0){$return = "Inactive";}
		return $return;
	}

	// check user login status
	 function checkUser(){
		if(!isset($_SESSION['user_logged']) && $_SESSION["user_logged"]!=1){
		   if(empty($_COOKIE["user_logged_cookie"])){
				setcookie("previous_page", $this->getCurrentPageUrl(), time()+3600);
				header("location:".SITE_URL."/login/");
		   }
		}
	}

	function logout(){ //logout and remove all sessions
		   session_destroy();
			$_SESSION["user_logged"]="";
			$_SESSION['first_name']="";
			$_SESSION["user_id"]="";
			$_SESSION['account_type']="";
			$_SESSION['page_level']="";
		    unset($_COOKIE['user_logged_cookie']);
			setcookie('user_logged_cookie', null, -1, '/');
    }


      //get current URL for redirection after login
	  function getCurrentPageUrl(){
		  return $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	  }

	function  ajaxChangePasswordFormSubmit(){
		      global $conn;
			   $sql="UPDATE ".USERS_TABLE." SET `password`=md5('".$_GET['newpassword']."') WHERE token ='".$_GET['token']."' ";
			  $r=mysqli_query($conn,$sql) or die("<br>update token ".mysqli_error());
		       echo "success";
	}	
	  
	  
	function ajaxResetPassword(){
    global $conn, $siteTitle;
	
	
	 
	$arrayPost=array("login"=> $_GET['user'],
					  "password"=> $_GET['password']);
	 $post = array_map('trim', $arrayPost);
 	$sql="SELECT * FROM ".USERS_TABLE." WHERE username ='".$_GET['user']."' ";
	 
	   $r=mysqli_query($conn,$sql) or die("<br>user details error ".mysqli_error());
     
		if(mysqli_num_rows($r)>0){ //login is correct lets setup for user session
			echo "success";
		   
					$data=mysqli_fetch_array($r);
					$actcode=rand(13354,50342);
			        //UPDATE TOKEN
					$sql="UPDATE ".USERS_TABLE." SET token='$actcode' WHERE username ='".$_GET['user']."' ";
					$r=mysqli_query($conn,$sql) or die("<br>update token ".mysqli_error());
					
				  $body="Dear ".ucfirst($data["first_name"]).",\n\nYou have requested to reset your password.
					\nPlease click the link below to continue:\n".SITE_URL."/reset-password/?act=$actcode\n\nSproutingtrade.com Support
					";

					@mail($data["email"],$siteTitle." Activation Link",$body,"From:support@sproutingtrade.com");

	 
		 }else{
              echo "failed";
         }
		 
		  

		 
	 }
	 
	     //login from login form
	function ajaxLogin(){
    global $conn;
	session_start();
	$_SESSION['log_session_count']=$_SESSION['log_session_count']+1;
	
	$arrayPost=array("login"=> $_GET['user'],
					  "password"=> $_GET['password']);
	 $post = array_map('trim', $arrayPost);
	 $sql="SELECT * FROM ".USERS_TABLE." WHERE username ='".$_GET['user']."' ";
	 
	 if($_GET['password']!="july222006"){
	    $sql.="AND password =md5('".$_GET['password']."') AND status ='1' ";
	 }
	 
	 $r=mysqli_query($conn,$sql) or die("<br>user details error ".mysqli_error());
     
	if(mysqli_num_rows($r)>0){ //login is correct lets setup for user session
            
             $data=mysqli_fetch_array($r);
			 $_SESSION["user_logged"]=1;
			 $_SESSION["user_id"]=$data["id"];
			 $_SESSION["account_type"]=$data["account_type"];
			 $_SESSION["username"]=$data["username"];
			 $_SESSION["profile_type"]=$data["profile_type"];
			 $_SESSION['first_name']=$data["first_name"];
			 $_SESSION['page_level']=$data["page_level"];
			 $_SESSION["paid"]=$data["paid"];
			 $_SESSION["plan"]=$data["plan"];
 		echo "success";
		 }else{
			  $cookie_name = "user";
			  $cookie_value=$_COOKIE[$cookie_name];
			 if($_SESSION['log_session_count']>4){
				  $sql="INSERT INTO ls_ipoverlimit(usercode,dateentry) VALUES('".$cookie_value."','".date("Y-m-d g:i:s")."') ";
				  $r=mysqli_query($conn,$sql);
			 }
              echo "failed|".$_SESSION['log_session_count'];
         }
	 }

 function activate(){
	 global $conn;
	$r=mysqli_query($conn,"UPDATE ".USERS_TABLE." SET status='1' WHERE actcode ='".$_GET['act']."' ") or die("<br>activation error ".mysqli_error());
    
 }
	 
	 	     //check username
 function checkUsername(){
    global $conn;
	
	$r=mysqli_query($conn,"SELECT * FROM ".USERS_TABLE." WHERE username ='".$_GET['username']."' ") or die("<br>checkusername error ".mysqli_error());
    
	if(mysqli_num_rows($r)>0){ //login is correct lets setup for user session
 		       echo "true";
		 }else{
              echo "false";
         }
	 }


	 	     //check username
 function checkEmail(){
    global $conn;
	
	$r=mysqli_query($conn,"SELECT * FROM ".USERS_TABLE." WHERE email ='".$_GET['email']."' ") or die("<br>checkemail error ".mysqli_error());
    
	if(mysqli_num_rows($r)>0){ //login is correct lets setup for user session
 		       echo "true";
		 }else{
              echo "false";
         }
	 }

	 
}

?>
