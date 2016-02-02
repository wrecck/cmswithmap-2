<?php echo $header_block;?>
 <?php
 //print_r($messageData);
 ?>
  		
  		<div class="main_wrap_pad">
			<h1>Message Details</h1> 	
		<div class="my_messages_left">
	    
		
		<div class="widget messages">
	        <div class="widget_header">
			   <div class="left" style="width:100%">
			     <?php echo $messageData["subject"];?>
			   </div>
			   
			 <br clear="all">
			 </div>
			 
	        <div class="widget_body">
	 		   <?php echo $msg;?>
		     
		    <form action="/my-messages/?id=<?php echo $_GET['id'];?>" method="post" onsubmit="return validateReply();">
			<input type="hidden" name="subject" value="re:<?php echo $messageData["subject"];?>">
			<input type="hidden" name="listing_id" value="<?php echo $messageData["listing_id"];?>">
			<input type="hidden" name="toemail" value="<?php echo $messageData["email"];?>">
			<input type="hidden" name="message_type" value="<?php echo $messageData["message_type"];?>">
			<input type="hidden" name="touser" value="<?php echo $messageData["from"];?>">
			<input type="hidden" name="parent" value="<?php echo $_GET["id"];?>">
			<input type="hidden" name="isreplied" value="1">
			
		     <textarea class="form-control full" name="body" id="body">&#10;&#10;---------------------------------&#10;<?php echo trim($messageData["body"]);?>
			 
			&#10;---------------------------------&#10;From: <?php echo $messageData["username"];?>&#10;Date: <?php echo $messageData["dateentry"];?>
			 </textarea>
			 <br clear="all">
			
			 <center>
			 <input type="submit" value="Send" name="submit" class="btn btn-tab btn-primary">&nbsp;&nbsp;
			  <input type="button" value="Cancel" onClick="location.href='/my-messages/?id=<?php echo $_GET['id'];?>'"  class="btn btn-tab btn-primary">&nbsp;
			 </center>
			 </form>
			 
			  </div>	
		
	        </div>  
	    </div>		  
			 
<script>document.getElementById('body').focus();</script>			 
			  
		
  			
  		</div>
		
		
  	

<?php echo $footer_block; ?>