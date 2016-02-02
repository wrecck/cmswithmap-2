<?php echo $header_block; ?>
<div class="main_wrap_pad profile">
  <?php // print_r($eventWorkshopListingArr);?>

	<div class="profile_top">

			<div class="profile_left">
				<h1><?php echo ucfirst($userData["organization_name"]);?></h1>
				<div class="profile_tag"><?php echo $userData["tagline"];?></div>
				<?php echo $userData["address1"];?>, <?php if(!empty($userData["address2"])){echo $userData["address2"].", ";}?><br>
				<?php echo $userData["city"];?>, <?php if(!empty($userData["county"])){echo $userData["county"].", ";}?> <?php echo $userData["state"];?>, <?php echo $userData["zip"];?>
				<br><?php echo $country;?>
			</div>
			
			<div class="profile_right">
		  <!--<b>Contact:</b><br clear="all">
			  <?php echo $userData["first_name"];?> <?php echo $userData["last_name"];?><br clear="all"><br>
			  <span class="glyphicon glyphicon-envelope"></span>&nbsp;<?php echo $userData["email"];?><br>
			  <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;<?php echo $userData["phone"];?><br>-->
			   <span class="glyphicon glyphicon-home"></span>&nbsp;<a class="span_url" target="_blank" href="<?php echo $userData["website"];?>"><?php echo $userData["website"];?></a>
			  <a style="display:none;" target="_blank" href="<?php echo $userData["website"];?>" class="visit_website">Visit Site</a>
			  <br>
	        </div>
	</div>

	
<div class="profile_mid">
<hr>
<h2>About Us</h2>
<?php echo str_replace("\n","<br>",$userData["description"]);?>
</div>

<div class="profile_bottom">
<hr>
<h2>What we offer</h2>
<?php foreach($offerArr as $offers){?>
		<div class="offers_list">&bull;&nbsp;<?php echo $offers;?></div>	
<?php } ?>


<?php if(count($eventWorkshopListingArr)>0){?>
<br clear="all"><br>
<hr>
<h2>Events/Workshops</h2>

		<?php foreach($eventWorkshopListingArr as $events){?>
				<div class="events_list"><a class="event_title" href="/events-workshops/?id=<?php echo ($events["id"]+159303);//+159303?>"><?php echo $events["event_seminar_title"];?></a>
				<p class="event_details"><b>Date / Time / Duration&nbsp;:&nbsp;</b><?php echo $events["date_time"];?></p>
				<p class="event_intro"><?php echo substr($events["introduction"],0,100);?>...</p>
				</div>	
		<?php } ?>
<?php } ?>

</div>


	<?php if($_GET['sent']==1){?><br>Message has been sent<br><?php } ?>
	<form action="?u=<?php echo $_GET['u'];?>&sent=1#bform" id="message_form" method="post" <?php if($islogged==1){?> onsubmit="return validateMessages2();" <?php }else{?> onsubmit="return validateMessagesProfile();"<?php } ?>>
	<h3 id="bform">Send a Message</h3>
	
	<?php if($islogged==1){?>
	<?php }else{ ?>
	<input class="form-control" type="text" name="fromemail" id="fromemail" value="" placeholder="Your Email">
    <?php } ?>	
	<br>
	<input class="form-control" type="text" id="subject"  name="subject" placeholder="Subject"><br>
	<input type="hidden" name="listing_id" value="<?php echo ucfirst($userData["id"]);?>">
	<input type="hidden" name="message_type" value="Profile">
	<input type="hidden" name="userid" value="<?php echo $userData["id"];?>">
	<input type="hidden" name="toemail" value="<?php echo $userData["email"];?>">
	<textarea  style="height:150px;" class="form-control" placeholder="Your Message" class="message" name="message" id="message"></textarea>
	 <?php if($islogged!=1){?><input style="float:left" type="checkbox" name="sendcopy" value="1">&nbsp;<span style="float: left; font-size: 12px; margin-top: -4px; margin-left: 5px;">Send a copy of this email to myself.</span><br><?php } ?><br>
	<center>
	<input type="submit" style="margin-left:0px" value="Send Message" name="send_message" class="btn btn-tab btn-primary">
	</center>
	</form>
</div>		  	   


<?php echo $footer_block;  ?>
