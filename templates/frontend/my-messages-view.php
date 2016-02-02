<?php echo $header_block;?>
 <?php
 //print_r($messageData);
 ?>
  		
  		<div class="main_wrap_pad">
			<h1>Message Details</h1> 	
		<div class="my_messages_left">
	    
		
		<div class="widget messages">
	        <div class="widget_header">
			   <div class="left">
			     <?php echo $messageData["subject"];?>
			   </div>
			   <div class="right">
			   <a href="/my-messages/?id=<?php echo $_GET['id'];?>&action=reply">Reply</a>&nbsp;&nbsp;<a href="/my-messages/">Back to List</a>
			   </div>
			 <br clear="all">
			 </div>
			 
	        <div class="widget_body">
	 		   <?php echo $msg;?>
		
		
		     <?php echo str_replace("\n","<br>",$messageData["body"]);?>
			 <br clear="all"><br>
			 <b>From:</b> <?php echo $messageData["username"];?>
			 <br>
			 <b>Date:</b><?php echo $messageData["date_added"];?>
			 
			  </div>	
		
	        </div>  
	    </div>		  
			  
			  
		
  			
  		</div>
		
		
  	

<?php echo $footer_block; ?>