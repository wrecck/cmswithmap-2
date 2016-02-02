function getXMLHTTP(){ //fuction to return the xml http object
		var xmlhttp=false;
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{
			try{
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}

		return xmlhttp;
}

function removePinningItem(pid){
$("#"+pid).remove().then(sortableArrayAlert());
}

function addLocationRow(locationRow,aid){

var nextRow = Math.round(document.getElementById(locationRow).value)+Math.round(1);
 document.getElementById(locationRow).value=nextRow;
 // alert("region_div_"+aid+"_"+nextRow);
 //alert(document.getElementById(locationRow).value);
 document.getElementById("region_div_"+aid+"_"+nextRow).style.display="block";
}

//hidcategory_
function addCategory(selvalue,selid,nextselectid,hidcat){
  document.getElementById(nextselectid).style.display="block";
 if(selvalue!=""){document.getElementById(hidcat).value=document.getElementById(hidcat).value+", "+selvalue;}
  	   var strURL="../ajax.php?action=heirarchy_category_option&parent_id="+selvalue+"&level=2";
	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
			   if(responseText!=""){
			    //document.getElementById(selectId).style.display="block";
				var select = $('#'+nextselectid);
				select.empty().append(responseText);
				}else{
				  // document.getElementById(selectId).style.display="none";
				}
            }
        });

}

function editCategory(selvalue,curValId,nextselectid,hidcat){

 if(selvalue!=""){
   var curVal = document.getElementById(hidcat).value;
   curVal = curVal.replace(", "+curValId,", "+selvalue);
   document.getElementById(hidcat).value=curVal;
  }

}

function deleteRegion(lid,rid){
	document.getElementById(rid).style.display="none";
	document.getElementById(lid).value="";
}



function changeLevel2(selvalue,selid){
  var selid2 = selid;
  var selectId = selid.replace("region_level1","region_level2");
  var hidRegion = selid2.replace("region_level1","hidden_region");
  document.getElementById(hidRegion).value=selvalue;
  if(selvalue==""){document.getElementById(selectId).style.display="none";}
  	   var strURL="../ajax.php?action=heirarchy_location_option&parent_id="+selvalue+"&level=2";
	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
			   if(responseText!=""){
			    document.getElementById(selectId).style.display="block";
				var select = $('#'+selectId);
				select.empty().append(responseText);

				}else{
				   document.getElementById(selectId).style.display="none";
				}
            }
        });
}

function changeLevel3(selvalue,selid){
  var selid2 = selid;
  var selectId = selid.replace("region_level2","region_level3");
  var hidRegion = selid2.replace("region_level2","hidden_region");
  document.getElementById(hidRegion).value=selvalue;
  if(selvalue==""){document.getElementById(selectId).style.display="none";}

  	   var strURL="../ajax.php?action=heirarchy_location_option&parent_id="+selvalue+"&level=3";
	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
			   if(responseText!=""){
			    document.getElementById(selectId).style.display="block";
				var select = $('#'+selectId);
				select.empty().append(responseText);
				}else{
				   document.getElementById(selectId).style.display="none";
				}
            }
        });
}

function changeLevel4(selvalue,selid){
       var selid2 = selid;
       var selectId = selid.replace("region_level3","region_level4");
	   var hidRegion = selid2.replace("region_level3","hidden_region");
       document.getElementById(hidRegion).value=selvalue;
  if(selvalue==""){document.getElementById(selectId).style.display="none";}

  	   var strURL="../ajax.php?action=heirarchy_location_option&parent_id="+selvalue+"&level=4";

	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
			   if(responseText!=""){
			    document.getElementById(selectId).style.display="block";
				var select = $('#'+selectId);
				select.empty().append(responseText);

				}else{
				   document.getElementById(selectId).style.display="none";
				}
            }
        });
}


function changeLevel5(selvalue,selid){
       var selid2 = selid;
       var selectId = selid.replace("region_level4","region_level5");
       var hidRegion = selid2.replace("region_level4","hidden_region");
       document.getElementById(hidRegion).value=selvalue;
  if(selvalue==""){document.getElementById(selectId).style.display="none";}

  	   var strURL="../ajax.php?action=heirarchy_location_option&parent_id="+selvalue+"&level=5";
	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
			   if(responseText!=""){
			    document.getElementById(selectId).style.display="block";
				var select = $('#'+selectId);
				select.empty().append(responseText);
				}else{
				   document.getElementById(selectId).style.display="none";
				}
            }
        });
}

function changeLevel6(selvalue,selid){
       var selid2 = selid;
       var selectId = selid.replace("region_level5","region_level6");
	   var hidRegion = selid2.replace("region_level5","hidden_region");
	   document.getElementById(hidRegion).value=selvalue;
      if(selvalue==""){document.getElementById(selectId).style.display="none";}

  	   var strURL="../ajax.php?action=heirarchy_location_option&parent_id="+selvalue+"&level=6";
	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
			   if(responseText!=""){
			    document.getElementById(selectId).style.display="block";
				var select = $('#'+selectId);
				select.empty().append(responseText);
				}else{
				   document.getElementById(selectId).style.display="none";
				}
            }
        });
}



function changeLevel7(selvalue,selid){
	   var selid2 = selid;
       var selectId = selid.replace("region_level6","region_level7");
	   var hidRegion = selid2.replace("region_level6","hidden_region");
       document.getElementById(hidRegion).value=selvalue;
       if(selvalue==""){document.getElementById(selectId).style.display="none";}

  	   var strURL="../ajax.php?action=heirarchy_location_option&parent_id="+selvalue+"&level=7";
	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
			   if(responseText!=""){
			    document.getElementById(selectId).style.display="block";
				var select = $('#'+selectId);
				select.empty().append(responseText);
				}else{
				   document.getElementById(selectId).style.display="none";
				}
            }
        });
}



//call for registration
function registerFormSubmit(){
	var witherror ="";
	
	    document.getElementById('preloader').style.display="block";
	
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;
		var password2 = document.getElementById('password2').value;
		var first_name = document.getElementById('first_name').value;
		var last_name = document.getElementById('last_name').value;
		var email = document.getElementById('email').value;
	     
		 //alert(validateEmail(email));		
		
		//str.length;

		if(username==""){document.getElementById('username_registration_error').style.visibility="visible";witherror=1;}
		else{document.getElementById('username_registration_error').style.visibility="hidden";} 
	

	    if(first_name==""){document.getElementById('first_name_registration_error').style.visibility="visible";witherror=1;}
		else{document.getElementById('first_name_registration_error').style.visibility="hidden";}
		if(last_name==""){document.getElementById('last_name_registration_error').style.visibility="visible";witherror=1;}
		else{document.getElementById('last_name_registration_error').style.visibility="hidden";}
		if(email==""){document.getElementById('email_registration_error').style.visibility="visible";witherror=1;}
		else{document.getElementById('email_registration_error').style.visibility="hidden";
		       if(validateEmail(email)!=true){
				document.getElementById('email_registration_error').style.visibility="visible";witherror=1;
				document.getElementById('email_registration_error').innerHTML="Invalid email address.";
				}
				else{document.getElementById('email_registration_error').style.visibility="hidden";}
		}	
			
		if(password==""){document.getElementById('password_registration_error').style.visibility="visible";witherror=1;}
		else{
			document.getElementById('password_registration_error').style.visibility="hidden";
			if(password.length<8){
				document.getElementById('password_registration_error').style.visibility="visible";witherror=1;
				document.getElementById('password_registration_error').innerHTML="Password must be more than 7 characters.";				
			}
		}
		
		if(password2==""){
			document.getElementById('password2_registration_error').style.visibility="visible";witherror=1;
			document.getElementById('password2_registration_error').innerHTML="Please retype password";
		}else{
			document.getElementById('password2_registration_error').style.visibility="hidden";
			if(password2!=password){
				document.getElementById('password2_registration_error').style.visibility="visible";witherror=1;
				document.getElementById('password2_registration_error').innerHTML="Passwords doesn't match";
			}  
		}
	  
	
      if(witherror==1){document.getElementById('preloader').style.display="none";}
	  
	  if(username!=""){
	    if(validateUsernameNew(username)=="true"){ 
			 document.getElementById('username_registration_error').style.visibility="visible";witherror=1;
			 document.getElementById('username_registration_error').innerHTML="Username already exists.";
		   }else{
			 document.getElementById('username_registration_error').style.visibility="hidden";
		   }
	  }	
	  
	  
	  
	  //password2_registration_error
	 if(witherror!=1){
	    //document.getElementById("register").submit();
	 }
}

function validateUsernameNew(username){
			  
			var strURL="http://localhost/ajax.php?action=checkusername&username="+username;
		   // var toreturn = "";
   	       $.ajax({
            url: strURL,
            success: function(responseText) {
             
                toreturn = responseText;
				 }
               });

					
			return toreturn;
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 


//call for login form
function loginFormSubmit(){
	
        document.getElementById('preloader').style.display="block";
		
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
		var witherror="";
		if(username==""){document.getElementById('username_error').style.visibility="visible";witherror=1;}
		if(password==""){document.getElementById('password_error').style.visibility="visible";witherror=1;}

		if(witherror!=1){
				var strURL="../ajax.php?action=login&user="+username+"&password="+password;
				var req = getXMLHTTP();

				if (req) {
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								if(req.responseText=="success"){location.href="/dashboard/";}
								else{
								document.getElementById('log_message').innerHTML="Invalid username and / or password.";
								}
							}else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}
					}
					req.open("GET", strURL, true);
					req.send(null);
				}
				document.getElementById('username_error').style.visibility="hidden";
				document.getElementById('password_error').style.visibility="hidden";

		}
		 document.getElementById('preloader').style.display="none";
}

function switchTabs(toTab){
var active_tab = document.getElementById('active_tab').value;  //get current active tab
 if(toTab==active_tab){return false;}

 document.getElementById('pinning_tab_temp').style.display="none"; //always close pinning queue div

	   $("#"+active_tab).removeClass("active");  //remove as active
	   $("#"+toTab).addClass("active"); //set active menu

	  //determine what is current tab and set active
     if(toTab=="raw_news_menu"){var to_section = "raw_news_container";
	    document.getElementById('raw_news_tab_panel').style.display="block";
		/*if(document.getElementById('number_of_tabs').value>6 && document.getElementById('number_of_tabs').value<13 ){
            document.getElementById('app-body').style.top="130px";  //remedy to adjust new story section top position
		}else if(document.getElementById('number_of_tabs').value>12){
            document.getElementById('app-body').style.top="170px";
		}else{*/
            document.getElementById('app-body').style.top="91px";  //remedy to adjust new story section top position
       //}
	 }
     else{var to_section = toTab.replace('article_details_menu_','article_detail_section_');}

     if(active_tab=="raw_news_menu"){var from_section = "raw_news_container";
	   document.getElementById('raw_news_tab_panel').style.display="none";
		/*if(document.getElementById('number_of_tabs').value>6 && document.getElementById('number_of_tabs').value<12){
		 document.getElementById('app-body').style.top="83px";  //remedy to adjust new story section top position
		 document.getElementById('app-header').style.backgroundColor="#fff";
		}else if(document.getElementById('number_of_tabs').value>11){
		   ;document.getElementById('app-body').style.top="123px";
		}else{ */
		document.getElementById('app-body').style.top="44px";  //remedy to adjust new story section top position
		document.getElementById('app-header').style.backgroundColor="none";
		//}


	 }
     else{var from_section = active_tab.replace('article_details_menu_','article_detail_section_');}



		document.getElementById(to_section).style.display="block";
		document.getElementById(from_section).style.display="none";


	 document.getElementById('active_tab').value=toTab;  //set the new active
}




function newArticleDetailBlock(aid,title){
     aid=Math.round(document.getElementById('new_story_number_of_tabs').value)+Math.round(1);
	 document.getElementById('new_story_number_of_tabs').value=aid;
     var nextTabNum = document.getElementById('number_of_tabs').value;  //tells us what is the next tab to open
	 var currentActiveTab = document.getElementById('active_tab').value;
	 //display new tab menu
  	 document.getElementById('article_details_menu_'+nextTabNum).style.display="block";
	 	 $("#article_details_menu_"+nextTabNum+" a").text("");
	 $("#article_details_menu_"+nextTabNum+" a.app-col-close").remove();
    $("#article_detail_section_"+nextTabNum).html('<div class="preloader_div" style="width:100%;max-width:1100px;padding-top:100px;text-align:center"><img src="/templates/default/images/preloader.gif"></div>');
	 $("#article_details_menu_"+nextTabNum+" a").text(title);
	 $("#article_details_menu_"+nextTabNum).append( '<a class="fa fa-times app-col-close" href="#" onClick="closeTab(\'article_details_menu_'+nextTabNum+'\')"></a>' );


	 //document.getElementById('article_details_panel_'+nextTabNum).style.display="block";
	 //document.getElementById('article_details_container_'+nextTabNum).style.display="block";

    document.getElementById('article_detail_section_'+nextTabNum).style.display="block"; //display Listing section

	//hide current active panels
	var currentSection = currentActiveTab.replace('details_menu','detail_section');
	if(currentSection=="raw_news_menu"){currentSection="raw_news_container";}
	   document.getElementById(currentSection).style.display="none";


	$("#"+currentActiveTab).removeClass("active");  //remove as active
	$("#article_details_menu_"+nextTabNum).addClass("active"); //set active menu

	 document.getElementById('active_tab').value='article_details_menu_'+nextTabNum; //save the active tab count


	 //document.getElementById('raw_news_menu').style.display="none";


		/*if(document.getElementById('number_of_tabs').value>5 && document.getElementById('number_of_tabs').value<12){
		  document.getElementById('app-body').style.top="83px";  //remedy to adjust new story section top position
		  document.getElementById('app-header').style.backgroundColor="#fff";
		}else if(document.getElementById('number_of_tabs').value>11){
		  document.getElementById('app-body').style.top="123px";  //remedy to adjust new story section top position
		}else{ */
		  document.getElementById('app-body').style.top="44px";  //remedy to adjust new story section top position
		  document.getElementById('app-header').style.backgroundColor="none";
		//}


	   //now lets do the jquery data retrieving.

		var strURL="../ajax.php?action=new_article_section&aid="+aid;


	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
                $("#article_detail_section_"+nextTabNum).html(responseText);
                $("#article_detail_section_"+nextTabNum).find("script").each(function(i) {
                    eval($(this).text());
                });
            }
        });

		/*var req = getXMLHTTP();

		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) { //all good, display story section
						 setTimeout(function(){
						 document.getElementById('article_detail_section_'+nextTabNum).innerHTML=req.responseText;
						 document.getElementById('app-col-details').style.width="100%";
						 eval(document.getElementById('article_detail_section_'+nextTabNum).innerHTML);
						 }, 2000);

						  $("#article_detail_section_"+nextTabNum).find("script").each(function(i) {
								eval($(this).text());
						  });
					}else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}
			}
			req.open("GET", strURL, true);
			req.send(null);
		}	*/

	   document.getElementById('number_of_tabs').value=Math.round(nextTabNum)+Math.round(1); //update count tab
}

function closeTab(tid){
	var nextTabNum = document.getElementById('number_of_tabs').value
	document.getElementById('number_of_tabs').value=Math.round(nextTabNum)-Math.round(1);
	 raw_news_tab_panel
	var active_tab2 = tid;//document.getElementById('active_tab').value;  //get current active tab
	var from_section = active_tab2.replace('article_details_menu_','article_detail_section_');
 	$("#raw_news_menu").addClass("active"); //set active menu
	document.getElementById('raw_news_container').style.display="block";
    document.getElementById('raw_news_tab_panel').style.display="block";


	/*	if(document.getElementById('number_of_tabs').value>6 && document.getElementById('number_of_tabs').value<13 ){
		 document.getElementById('app-body').style.top="130px";  //remedy to adjust new story section top position
		 document.getElementById('app-header').style.backgroundColor="#fff";
		}else if(document.getElementById('number_of_tabs').value>12){
		  document.getElementById('app-body').style.top="170px";  //remedy to adjust new story section top position
		}else{ */
		document.getElementById('app-body').style.top="91px";  //remedy to adjust new story section top position
		document.getElementById('app-header').style.backgroundColor="none";
    //}


	$("#"+active_tab2).hide();
	document.getElementById(from_section).style.display="none";
	setTimeout(function() {
	   document.getElementById('active_tab').value = "raw_news_menu";
	}, 3000);
}

function reloadArticleDetailBlock(aid,pid){
       var detail_block = document.getElementById('active_tab').value;
	   detail_block = detail_block.replace('article_details_menu_','article_detail_section_');

	   //now lets do the jquery data retrieving.
		var strURL="../ajax.php?action=article_section&aid="+aid+"&pid="+pid+"&ispreview=1";

   	    $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
                $("#"+detail_block).html(responseText);
                $("#"+detail_block).find("script").each(function(i) {
                    eval($(this).text());
                });

			    setTimeout(function(){
					carousel();
				},1000);
            }
        });

}



function showArticleDetailBlock(aid,title,ispreview){

     var nextTabNum = document.getElementById('number_of_tabs').value;  //tells us what is the next tab to open



	if(nextTabNum>3){
	  var page_width=(Math.round(nextTabNum)*150);
	  var total_width=(Math.round(page_width)+1000);
	  // document.getElementById('app-right-main').style.width=total_width+"px";
	}

	 var ispreview = "2";
	 //display new tab menu
  	 document.getElementById('article_details_menu_'+nextTabNum).style.display="block";
	 $("#article_details_menu_"+nextTabNum+" a").text("");
	 $("#article_details_menu_"+nextTabNum+" a.app-col-close").remove();
	 $("#article_details_menu_"+nextTabNum+" a").text(title);
	 $("#article_details_menu_"+nextTabNum).append( '<a class="fa fa-times app-col-close" href="#" onClick="closeTab(\'article_details_menu_'+nextTabNum+'\')"></a>' );

	 document.getElementById('active_tab').value='article_details_menu_'+nextTabNum; //save the active tab count

	 //document.getElementById('article_details_panel_'+nextTabNum).style.display="block";
	 //document.getElementById('article_details_container_'+nextTabNum).style.display="block";

     $(".article_details_container").hide();

    document.getElementById('article_detail_section_'+nextTabNum).style.display="block"; //display Listing section
     $("#article_detail_section_"+nextTabNum).html('<div class="preloader_div" style="width:100%;max-width:1100px;padding-top:100px;text-align:center"><img src="/templates/default/images/preloader.gif"></div>');

	//hide  raw news and default panel
	 document.getElementById('raw_news_tab_panel').style.display="none";
	 document.getElementById('raw_news_container').style.display="none";
	 //document.getElementById('raw_news_menu').style.display="none";


		/*if(document.getElementById('number_of_tabs').value>5 && document.getElementById('number_of_tabs').value<12 ){
		 document.getElementById('app-body').style.top="83px";  //remedy to adjust new story section top position
		 document.getElementById('app-header').style.backgroundColor="#fff";
	    }else if(document.getElementById('number_of_tabs').value>11){
		  document.getElementById('app-body').style.top="130px";  //remedy to adjust new story section top position
		}else{ */
		document.getElementById('app-body').style.top="44px";  //remedy to adjust new story section top position
		document.getElementById('app-header').style.backgroundColor="none";
	//	}

	   $("#raw_news_menu").removeClass("active");  //remove as active
	   $("#article_details_menu_"+nextTabNum).addClass("active"); //set active menu

	   //now lets do the jquery data retrieving.
		var strURL="../ajax.php?action=article_section&aid="+aid;

   	    $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
                $("#article_detail_section_"+nextTabNum).html(responseText);
                $("#article_detail_section_"+nextTabNum).find("script").each(function(i) {
                    eval($(this).text());
                });

			    setTimeout(function(){
					carousel();
				},1000);
            }
        });

		/*var req = getXMLHTTP();

		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) { //all good, display story section
						 setTimeout(function(){
						 document.getElementById('article_detail_section_'+nextTabNum).innerHTML=req.responseText;
						 document.getElementById('app-col-details').style.width="100%";
						 eval(document.getElementById('article_detail_section_'+nextTabNum).innerHTML);
						 }, 2000);

						  $("#article_detail_section_"+nextTabNum).find("script").each(function(i) {
								eval($(this).text());
						  });
					}else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}
			}
			req.open("GET", strURL, true);
			req.send(null);
		}	*/

	   document.getElementById('number_of_tabs').value=Math.round(nextTabNum)+Math.round(1); //update count tab
}

function isArticleLocked(aid){
	 var detail_islock = document.getElementById('detail_islock_'+aid).value;  //get story state
	    if(detail_islock=="locked"){
		  return "yes";
		}else{
		  return "no";
		}
}
function lockSwitch(aid){ //change tabs and icons
   var detail_islock = document.getElementById('detail_islock_'+aid).value;  //get story state



  if(detail_islock=="locked"){
     $("#span_islock_"+aid).removeClass("fa-lock"); //set active menu
	 $("#span_islock_"+aid).addClass("fa-unlock-alt"); //set active menu

	 $("#span_lock_icon_"+aid).addClass("label-success"); //set active menu
	 $("#span_lock_icon_"+aid).removeClass("label-default"); //set active menu

	 $("#span_text_"+aid).text('Unlocked');
	   document.getElementById('locked_content_'+aid).style.display="none";
       document.getElementById('unlocked_content_'+aid).style.display="block";
	   document.getElementById('detail_islock_'+aid).value="unlocked";
	    document.getElementById('update_button_'+aid).style.display="none";
		 //document.getElementById('setstatus_'+aid).style.display="none";

		document.getElementById('article_status_'+aid).style.display="block";
  }else{
	 $("#span_lock_icon_"+aid).removeClass("label-success"); //set active menu
	 $("#span_lock_icon_"+aid).addClass("label-default"); //set active menu

     $("#span_islock_"+aid).removeClass("fa-unlock-alt"); //set active menu
	 $("#span_islock_"+aid).addClass("fa-lock"); //set active menu
	 $("#span_text_"+aid).text('Locked');
       document.getElementById('unlocked_content_'+aid).style.display="none";
       document.getElementById('locked_content_'+aid).style.display="block";


	 document.getElementById('detail_islock_'+aid).value="locked";
	  document.getElementById('article_status_'+aid).style.display="none";
	  document.getElementById('update_button_'+aid).style.display="block";
	  document.getElementById('setstatus_'+aid).style.display="block";
  }

  			    setTimeout(function(){
					carousel();
				},1000);
}

function unLocked(aid,toTab){
  $("#"+toTab).addClass("active"); //set active menu
  document.getElementById('unlocked_menu_'+aid).style.display="block";
  document.getElementById('locked_menu_'+aid).style.display="none";
  document.getElementById('locked_content_'+aid).style.display="none";
  document.getElementById('unlocked_content_'+aid).style.display="block";
  document.getElementById('article_detail_content_'+aid).style.display="block";
}

function locked(aid,toTab){
  $("#"+toTab).addClass("active"); //set active menu
  document.getElementById('unlocked_menu_'+aid).style.display="none";
  document.getElementById('locked_menu_'+aid).style.display="block";
  document.getElementById('locked_content_'+aid).style.display="block";
  document.getElementById('unlocked_content_'+aid).style.display="none";
  document.getElementById('article_detail_content_'+aid).style.display="block";
}


	function switchTabs2(aid,toTab){
             var detail_active_tab = document.getElementById('detail_active_tab_'+aid).value;  //get current active tab
			 if(toTab==detail_active_tab){return false;}

            document.getElementById('pinning_tab_temp').style.display="none";
	   $("#"+detail_active_tab).removeClass("active");  //remove as active
	   $("#"+toTab).addClass("active"); //set active menu
		//alert(detail_active_tab+"--"+toTab);

			if(toTab=="activity_menu_"+aid){
			   document.getElementById('article_detail_activity_'+aid).style.display="block";}

			if(toTab=="locked_menu_"+aid){
			    document.getElementById('article_detail_content_'+aid).style.display="block";
			    document.getElementById('update_but_'+aid).style.display="block";
				document.getElementById('setstatus_'+aid).style.display="block";
		}

			if(toTab=="unlocked_menu_"+aid){
			   document.getElementById('article_detail_content_'+aid).style.display="block";

			   }

			if(toTab=="preview_menu_"+aid){
			   //now lets do the jquery data retrieving.
				var strURL="../ajax.php?action=encodesc";

		   	    $.ajax({
		            url: strURL,
		            type: "POST",
  					data: { content : $('#article_content_'+aid).val() },
		            context: document.body,
		            success: function(responseText) {
		              	$('#preview_headline_'+aid).html($('#article_headline_'+aid).val());
					    $('#preview_by_'+aid).html($('#article_author_'+aid).val());
					    $('#preview_content_'+aid).html(responseText);
		            }
		        });


			   document.getElementById('article_detail_preview_'+aid).style.display="block";

			}

			if(toTab=="pinning_menu_"+aid){
			   document.getElementById('article_detail_pinning_'+aid).style.display="block";
			  // document.getElementById('pinning_but_'+aid).style.display="block";
			   document.getElementById('pinning_tab_temp').style.display="block";

			   //get category and location
			   var hidcategory  = document.getElementById('hidcategory_'+aid).value;
			   var pid = document.getElementById('current_pid').value;
			   var allLoc = document.getElementById('current_allloc').value;

			   loadPinningQueue(aid,"article_detail_pinning_"+aid,1,hidcategory,allLoc,pid);
			}


			if(detail_active_tab=="activity_menu_"+aid){
			   document.getElementById('article_detail_activity_'+aid).style.display="none";
			   }

			if(detail_active_tab=="locked_menu_"+aid && toTab!="locked_menu_"+aid){
			   document.getElementById('article_detail_content_'+aid).style.display="none";
			   document.getElementById('update_but_'+aid).style.display="none";
			   //document.getElementById('setstatus_'+aid).style.display="none";
			   }

			if(detail_active_tab=="unlocked_menu_"+aid){
			   document.getElementById('article_detail_content_'+aid).style.display="none";
			   document.getElementById('setstatus_'+aid).style.display="block";
			   }

			if(detail_active_tab=="preview_menu_"+aid){
			   document.getElementById('article_detail_preview_'+aid).style.display="none";}

			if(detail_active_tab=="pinning_menu_"+aid){
			   document.getElementById('article_detail_pinning_'+aid).style.display="none";
			    //document.getElementById('pinning_but_'+aid).style.display="none";
			   }


	 document.getElementById('detail_active_tab_'+aid).value=toTab;  //set the new active
}


//test wrapper
function wrapText(elementID, openTag, closeTag) {
    var textArea = document.getElementById(elementID);

    if (typeof(textArea.selectionStart) != "undefined") {
        var begin = textArea.value.substr(0, textArea.selectionStart);
        var selection = textArea.value.substr(textArea.selectionStart, textArea.selectionEnd - textArea.selectionStart);
        var end = textArea.value.substr(textArea.selectionEnd);
        textArea.value = begin + openTag + selection + closeTag + end;
    }
}

function resetSettings(){
  var defaultFilters='<li class="list-group-item" id="category_li" style="display:none"><span class="badge fa fa-times close-parent"></span><span class="list-label list-col">  Category:</span><span class="list-value list-col" id="category-value"></span></li><li class="list-group-item"  id="provider_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">Provider:</span><span class="list-value list-col" id="provider-value"></span></li><li class="list-group-item"  id="location_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">  Location:</span><span class="list-value list-col" id="location-value"></span></li><li class="list-group-item"  id="content_type_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">  Content Type:</span><span class="list-value list-col" id="content-type-value"></span></li><li class="list-group-item"  id="date_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">  Date:</span><span class="list-value list-col" id="date-value"></span></li><li class="list-group-item"  id="curation_status_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">  Curation Status:</span><span class="list-value list-col" id="curation-status-value"></span></li><li class="list-group-item"  id="article_id_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">  Listing ID</span><span class="list-value list-col" id="article-id-value"></span></li><li class="list-group-item"  id="keyword_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">  Keyword</span><span class="list-value list-col" id="keyword-value"></span></li>';

	document.getElementById('filter_group').innerHTML=defaultFilters;
}


function resetSettings2(){
  var defaultFilters='<li class="list-group-item" id="category_li" style="display:none"><span class="badge fa fa-times close-parent"></span><span class="list-label list-col">  Category:</span><span class="list-value list-col" id="category-value"></span></li><li class="list-group-item"  id="location_li" style="display:none"><span class="badge fa fa-times close-parent"></span> <span class="list-label list-col">  Location:</span><span class="list-value list-col" id="location-value"></span></li>';

	document.getElementById('filter_group').innerHTML=defaultFilters;
}

function loadPinningQueue(aid,divid,updated,hidcat,hidloc,pid){
	 document.getElementById(divid).innerHTML='<div class="preloader_div" style="width:100%;max-width:1100px;padding-top:100px;text-align:center"><img src="/templates/default/images/preloader.gif"></div>';
	 document.getElementById("pinning_tab_temp").innerHTML='<div class="preloader_div" style="width:100%;max-width:1100px;padding-top:100px;text-align:center"><img src="/templates/default/images/preloader.gif"></div>';
	
	 setTimeout(function(){
		   //now lets do the jquery data retrieving.
		var strURL="../ajax.php?action=pinning_queue&aid="+aid+"&updated="+updated+"&pid="+pid+"&cats="+hidcat+"&locs="+hidloc;
	//	alert(strURL);
	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {
                $("#pinning_tab_temp").html(responseText);
				$(".ui-sortable").sortable({update: function() {
					   var order = $(this).sortable("serialize");
					   var ajaxurl="../ajax.php?action=pinning_ordering&aid="+aid;
					   var data = {
					   action: 'pinning_ordering',
					   cat_id: document.getElementById('current_pinning_cat').value,
				       current_pin: document.getElementById('current_pin').value,
					   current_column: document.getElementById('current_column').value,
					   act:'order_optintable',
					   order: order};
						jQuery.post(ajaxurl, data, function(response){
						  // document.getElementById('counter_div_'+document.getElementById('current_column').value).style.display='none';
						   document.getElementById("jscall").innerHTML=response;
						
						   $("#jscall").find("script").each(function(i) {
							   eval($(this).text());
						   });



  					   });
					}

				});



				document.getElementById(divid).innerHTML='';
                $("#pinning_tab_temp").find("script").each(function(i) {
                    eval($(this).text());
                });



            }
        });
	     },300);
}

function updateStoryPinning(aid){

		   //now lets do the jquery data retrieving.
		var strURL="../ajax.php?action=update_pinning_queue&aid="+aid;

	   $.ajax({
            url: strURL,
            context: document.body,
            success: function(responseText) {

            }
        });

}

function updateExpirationDate(xid,xdate){

}

function closeColumn(cid){
   document.getElementById(cid).innerHTML="";
   $("#"+cid).empty(); //just making sure
   document.getElementById(cid).style.display="none";
   var number_of_columns = Math.round(document.getElementById('number_of_columns').value)-Math.round(1);
    document.getElementById('number_of_columns').value=number_of_columns;
}

function openNewMediaWindow(mid,pid)
{	window.open("/imagemanager/image-manager.php?article_id="+mid+"&pid="+pid,"mywindow","menubar=1,resizable=1,width=999,height=750");
}

function reload_column_1(string)
{
}
