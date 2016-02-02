<?php echo $header_block;?>

  		
  		<div class="main_wrap_pad">
			<h1>My Messages</h1> 	
		<div class="my_messages_left">
	    
		
		<div class="widget messages">
	        <div class="widget_header">Inbox - <?php if(empty($_GET['filter'])){echo "Recent";}else{echo ucfirst($_GET['filter']);}?></div>
	        <div class="widget_body message_list">
	 		   <?php echo $msg;?>
			 
			   <?php 
			  if(count($listingArr)>0){
				?>


				<div class="row_col1"><b>From</b></div>
				<div class="row_col2"><b>Subject</b></div>
				<div class="row_col3"><b>Received</b></div>	
					
			<?php
			   foreach($listingArr as $data){
				if($data["isread"]==1){$isread="read";}else{$isread="unread";}
				?>
				<div class="row_col1 <?php echo $isread;?>"><?php echo $data["username"];?>&nbsp;</div>
				<div class="row_col2 <?php echo $isread;?>">
				<?php if($data["isreplied"]==1){?><span class="glyphicon glyphicon-share-alt"></span><?php }?><a class="<?php echo $isread;?>" href="/my-messages/?id=<?php echo $data["id"];?>"><?php echo substr($data["subject"],0,200);?>...</a><br>
				</div>
				<div class="row_col3 <?php echo $isread;?>">
				<?php echo $data["dateentry"];?>
				</div><br clear="all">
				<?php }
			  }else{
				  if(empty($msg)){
					    if($_GET['filter']=="unread"){
					      echo "You have no unread messages. <a href='/my-messages/'>View all</a>.";
						}else{
					       echo "You have no messages.";
					    }
					  }
				  }?>
			  </div>	
		
	        </div>  
	    </div>		  
			  
			  
		
  			
  		</div>
		
		
  	

<?php echo $footer_block; ?>