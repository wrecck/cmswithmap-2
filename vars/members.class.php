<?php

Class MembersCalls{



	 function getMemberDetails($id){ //get user details
	  	global $conn;
	      $r=mysqli_query($conn,"SELECT * FROM ".USERS_TABLE." WHERE id ='".$id."' ") or die("<br>user details error ".mysqli_error());
	      $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	      return $data;
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
	 }


	
     //save user
	 function saveMember(){
	  global $conn;

	   if($_FILES["avatar"]["tmp_name"]!=""){  	 //upload image
         $fileName=$this->uploadImage("avatar",$_POST['id']);
	     if($fileName!="Invalid file"){$avatar=$fileName;}

		 $avatarSql=" avatar='".$avatar."', ";
	   }


	 if(!empty($_POST['password'])){$passwordUpdate="password='".md5($_POST['password'])."', ";}

	 if($_POST['isprofile']!="1"){
	    $accountSql="
	     status='".$_POST['status']."',
	   ";  // account_type='".$_POST['account_type']."',
	 }
	 if($_POST['profile_type']==4){$paid=1;}else{$paid=0;}
	 
	 $r=mysqli_query($conn,"UPDATE  ".USERS_TABLE." SET
	                        first_name='".$_POST['first_name']."',
	                        last_name='".$_POST['last_name']."',
	                        email='".$_POST['email']."',
							profile_type='".$_POST['profile_type']."',
							paid='".$paid."',
							$accountSql
	                        $avatarSql
							$passwordUpdate
	                        page_level='".$_POST['page_level']."'
                            WHERE id ='".$_POST['id']."'

	 ") or die("<br>User update error saveMember: ".mysqli_error($conn));
		  return "success";
	 }

	function deleteMember($id){
		global $conn;
	    $r=mysqli_query($conn,"DELETE FROM ".USERS_TABLE." WHERE id ='$id' ")
		or die("<br>delete member error `".mysqli_error($r));
		return true;
	}

     //list all users
	 function listMembers(){
	 global $conn;
	 $limit=20;
	 $sql="SELECT * FROM ".USERS_TABLE." WHERE account_type='101' ";
	 
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

	   $list[] = array( 'id' => $data["id"],
					    'username' => $data["username"],
					    'password' => $data["password"],
					    'first_name' => $data["first_name"],
					    'last_name' => $data["last_name"],
					    'email' => $data["email"],
						'account_type' => $this->getMemberType($data["account_type"]),
					    'status' => $this->getMemberStatus($data["status"]),
						'options' => '<a href="'.SITE_URL.'/edit-member/?id='.$data["id"].'">Edit</a>&nbsp;'.$delete
						);
	
	 }
	  $totalPages=ceil($totalrows/$limit);
	  for($cnt=1;$totalPages>$cnt;$cnt++){
		$pageLinks.="&nbsp;|&nbsp;<a href='?pg=$cnt'>$cnt</a>";  
	  }
	  $list["pagelinks"]=$pageLinks;	
	  
      return $list;
    }

	function getMemberStatus($sid){
	    if($sid==1){$return = "Active";}
	    if($sid==0){$return = "Inactive";}
		return $return;
	}
	
    function getMemberType($id){
		global $conn;
	      $r=mysqli_query($conn,"SELECT * FROM ".USERS_TYPE_TABLE." WHERE id ='$id' ") or die("<br>user details error ".mysqli_error());
	      $data=mysqli_fetch_array($r,MYSQLI_ASSOC);
	      return $data["account_type_name"];

	}




}

?>
