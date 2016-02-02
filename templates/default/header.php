<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo $templateUrl;?>/assets/ico/favicon.png">

    <title><?php echo $pageTitle;?></title>

    <script src="<?php echo $templateUrl;?>/assets/js/jquery-1.11.0.min.js"></script>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link href="<?php echo $templateUrl;?>/css/style.css" rel="stylesheet">
	<script src="<?php echo $templateUrl;?>/js/resource.js"></script>
  </head>

  <body class="<?php echo (isset($template)) ? $template : ''; ?>">
<div class="navigator_left">
<div class="nav_gap">&nbsp;</div>
<ul class="nav">
<li><a href="/dashboard/">Dashboard</a></li>
<?php if($_SESSION['account_type']!=101){?>
<li><a href="/settings/">Settings</a>
 <ul>
   <li><a href="/options-settings/">Options</a></li>
    <li><a href="/options-countries/">Country Options</a></li>
 </ul> 
</li>
<li><a href="/users/">Users</a>
	 <ul>
		 <li><a href="/add-new-user/">Add New Users</a></li>
		 <li><a href="/roles/">Roles</a></li>
	 </ul>
</li>
<li>
   <a href="/listings/">Listings</a>
    <ul>
		 <li><a href="/product-categories/">Categories</a></li>
   </ul>
</li>
<li>
   <a href="/members/">Members</a>
   <ul>
		 <li><a href="/membership/">Membership</a></li>
   </ul>		 
</li>
<li>
   <a href="/pages/">Pages</a>
   	 <ul>
		 <li><a href="/add-new-page/">Add New Page</a></li>
	 </ul>
</li>

<?php }?>
<li><a href="/profile/">My Account</a></li>
<li>&nbsp;&nbsp;Administration
   	 <ul>
		 <li><a href="/logs/">Logs</a></li>
     	 <li><a href="/failed-logs/">Failed logs</a></li><!-- failed-logs-->
     </ul>
</li>

<li><a href="/login/?logout=1">Logout</a></li>
</ul>
</div>
<div class="content_right">
<div class="content_wrap container">

   