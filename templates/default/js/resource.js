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

function validateUpgradeAccount(name){
	var radios = upgradeform.elements[name];
	
    for(var i=0, len=radios.length; i<len; i++){
        if ( radios[i].checked ){ // radio checked?
            val = radios[i].value; // if so, hold its value in val
            break; // and break out of for loop
        }
    }
	
	
	
	/*
	if (document.getElementById('plan').checked) {
		return true;
	}else{
	   alert('Please select a plan.');
	    return false
	}*/
	
	return false;
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
   var witherror="";
   var radios = document.getElementsByName("profile_type");
    var formValid = false;
    var member_type_val = document.getElementsByName("profile_type");
   /* var i = 0;
    while (!formValid && i < radios.length) {
			if (radios[i].checked){ formValid = true;
			   member_type_val=radios[i].value;
			}	
        i++;        
    } */
	

	  //
	    document.getElementById('preloader').style.display="block";
	
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;
		var password2 = document.getElementById('password2').value;
		var codeCapInput = document.getElementById('codeCap').value;
		
        if(member_type_val==2){
		 var organization_name = document.getElementById('organization_name').value;
		}else{
		 var first_name = document.getElementById('first_name').value;
		 var last_name = document.getElementById('last_name').value;
		}
		var email = document.getElementById('email').value;
	     
		 //alert(validateEmail(email));		
		
		//str.length;

		if(username==""){document.getElementById('username_registration_error').style.visibility="visible";witherror=1;}
		else{document.getElementById('username_registration_error').style.visibility="hidden";} 
	
		if(member_type_val==2){
			if(organization_name==""){document.getElementById('organization_name_registration_error').style.visibility="visible";witherror=1;}
			else{document.getElementById('organization_name_registration_error').style.visibility="hidden";}
		}else{
			if(first_name==""){document.getElementById('first_name_registration_error').style.visibility="visible";witherror=1;}
			else{document.getElementById('first_name_registration_error').style.visibility="hidden";}
			
			if(last_name==""){document.getElementById('last_name_registration_error').style.visibility="visible";witherror=1;}
			else{document.getElementById('last_name_registration_error').style.visibility="hidden";}
		}
		
		if(email==""){document.getElementById('email_registration_error').style.visibility="visible";witherror=1;}
		else{document.getElementById('email_registration_error').style.visibility="hidden";
		       if(validateEmail(email)!=true){
				document.getElementById('email_registration_error').style.visibility="visible";witherror=1;
				document.getElementById('email_registration_error').innerHTML="Invalid email address.";
				}
				else{
					document.getElementById('email_registration_error').style.visibility="hidden";

					var valemail = checkEmail(email);
					valemail.success(function (data){
						// alert(data);
						   if(data=="true"){ 
							 document.getElementById('email_registration_error').style.visibility="visible";witherror=1;
							 document.getElementById('email_registration_error').innerHTML="Email already exists.";
						   }else{
							 document.getElementById('email_registration_error').style.visibility="hidden";
							 document.getElementById('email_registration_error').innerHTML="Email must be provided.";
						   }
					});
				}
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
	 


        if (document.getElementById('agree_to_term').checked){
		        document.getElementById('agree_to_terms_error').style.visibility="hidden";
		}else{
				document.getElementById('agree_to_terms_error').style.visibility="visible";witherror=1;
				
		}
		
	 
	if(codeCapInput==""){
			document.getElementById('codeCap_registration_error').style.visibility="visible";witherror=1;
		    document.getElementById('codeCap_registration_error').innerHTML="Please input the correct answer above";
	}else{
	       	 var valcap = checkCapcode(codeCapInput);
			 
		       valcap.success(function (data){
			
			   if(data=="1"){ 
				   document.getElementById('isr').value=1;
				  
				}else{ 
				   document.getElementById('isr').value=0;
				  
				}
			});
			
				if(document.getElementById('isr').value=="1"){ 
					  document.getElementById('codeCap_registration_error').style.visibility="hidden"; 
				}else{
					 document.getElementById('codeCap_registration_error').style.visibility="visible";witherror=1;
				}	
	}
	
	
      if(witherror==1){document.getElementById('preloader').style.display="none";}
	 
	  if(username!=""){
		  
		var valuser = checkUsername(username);
		valuser.success(function (data){
			 
			   if(data=="true"){ 
				 document.getElementById('username_registration_error').style.visibility="visible";witherror=1;
				 document.getElementById('username_registration_error').innerHTML="Username already exists.";
			   }else{
				 document.getElementById('username_registration_error').style.visibility="hidden";
				 document.getElementById('username_registration_error').innerHTML="Username must be provided.";

			   }

			 
			});
		
		
	  }	
	  
	  
	//alert(witherror);
	  //password2_registration_error
	 if(witherror!=1){
	    document.getElementById("register").submit();
	 }
}

function checkCapcode(capcode){
			var strURL="/ajax.php?action=checkcapcode&capcode="+capcode;
			//alert(strURL);
		     return $.ajax({
            url: strURL});
}


function checkCapcode2(capcode,capcodeHid){
			var strURL="/ajax.php?action=checkcapcode2&capcode="+capcode+"&capcodeHid="+capcodeHid;
			//alert(strURL);
		     return $.ajax({
            url: strURL});
}

function checkEmail(email){
			var strURL="/ajax.php?action=checkemail&email="+email;
			//alert(strURL);
		   return $.ajax({
            url: strURL});
}


function checkUsername(username){
			var strURL="/ajax.php?action=checkusername&username="+username;
			//alert(strURL);
		     return $.ajax({
            url: strURL});
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

function resetPasswordSubmit(token){
	   document.getElementById('preloader').style.visibility="visible";
	     var password = document.getElementById('password').value;
		 var password2 = document.getElementById('password2').value;
		 
		var witherror="";
		
		if(password==""){document.getElementById('password_error').style.visibility="visible";witherror=1;}
		else{document.getElementById('password_error').style.visibility="hidden";
			if(password.length<8){	
			 document.getElementById('password_error').style.visibility="visible";witherror=1;
			 document.getElementById('password_error').innerHTML="Password must be more than 8 characters.";
			}
		}
		
		if(password2==""){document.getElementById('password_error2').style.visibility="visible";witherror=1;}
		else{
			document.getElementById('password_error2').style.visibility="hidden";
		   if(password!=password2){
			   document.getElementById('password_error2').style.visibility="visible";
			   document.getElementById('password_error2').innerHTML="Both passwords entered doesn't match.";
			   witherror=1;
			   }
		}
		
	
	       //Enter your username to reset password:
		if(witherror!=1){
				var strURL="../ajax.php?action=changePasswordFormSubmit&token="+token+"&newpassword="+password;
				var req = getXMLHTTP();

				if (req) {
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								if(req.responseText=="success"){
									document.getElementById('reset_password_form').style.display="none";
									document.getElementById('success_reset').style.display="block";
								}
								else{
							
								}
							}else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}
					}
					req.open("GET", strURL, true);
					req.send(null);
				}


		}
		 document.getElementById('preloader').style.visibility="hidden";
	
	
	
}

function resetPasswordFormSubmit(){
	
        document.getElementById('preloader').style.visibility="visible";
		
        var username = document.getElementById('username').value;
		var witherror="";
		if(username==""){
			document.getElementById('reset_password_label').innerHTML="Username must be provided:";
			document.getElementById('reset_password_label').style.fontcolor='red';
		witherror=1;}

       //Enter your username to reset password:
		if(witherror!=1){
				var strURL="../ajax.php?action=resetPasswordFormSubmit&user="+username;
				var req = getXMLHTTP();

				if (req) {
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								if(req.responseText=="success"){
									document.getElementById('reset_form').style.display="none";
									document.getElementById('success_p').innerHTML="Please check your email for the password reset instructions.";
									document.getElementById('success_p').style.display="block";
								}
								else{
								
								document.getElementById('reset_password_label').innerHTML="Please provide the correct username:";
								 document.getElementById('preloader').style.visibility="hidden";
								}
							}else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}
					}
					req.open("GET", strURL, true);
					req.send(null);
				}


		}
		 document.getElementById('preloader').style.visibility="hidden";
}

//call for login form
function loginFormSubmit(){
	
        document.getElementById('preloader').style.display="block";
		
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
		var durl = document.getElementById('durl').value;
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
								if(req.responseText=="success"){
									if(durl!="none"){
									  location.href=durl;
									}else{
									  location.href="/dashboard/";
									}
								}
								else{
									if(req.responseText=="failed|5"){		
									 document.getElementById('log_message').innerHTML="You have reached the login limit attempt. <br>Please try again after an hour.";
									 document.getElementById('s-form').style.display="none";
									}else{
									  document.getElementById('log_message').innerHTML="Invalid username and / or password.";
									}
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


function validateContact(){
		var witherror ="";
	    var errormsg="";
		var first_name = document.getElementById('first_name').value;
		var last_name = document.getElementById('last_name').value;
		var email = document.getElementById('email').value;
        var confirm_email = document.getElementById('confirm_email').value;	    
        var message = document.getElementById('message').value;	    		
	    var codeCapInput = document.getElementById('codeCap').value;
	    var capLabel = document.getElementById('capLabel').value;
		var codeCapInputHid = document.getElementById('codeCapHid').value;
		
	   if(first_name==""){witherror=1; errormsg+="First name must be provided.\n";}
	   if(last_name==""){witherror=1; errormsg+="Last name must be provided.\n";}
	   if(email==""){witherror=1; errormsg+="Email must be provided.\n";}
	   else{ 
	     if(validateEmail(email)!=true){
			   witherror=1;errormsg+="Provide a valid email address.\n";
		 }
	   }
	   if(confirm_email==""){witherror=1; errormsg+="Confirm your email.\n";}
	   else{
		   if(confirm_email!=email){witherror=1; errormsg+="Emails doesn't match.\n";}
	   }
		 if(message==""){witherror=1; errormsg+="Message must be provided.\n";}
	
		
	
	if(codeCapInput==""){
		   witherror=1;
		   errormsg+="Answer for "+capLabel+" must be provided\n";
	}else{  
	       	 var valcap = checkCapcode2(codeCapInput,codeCapInputHid);
			 
		       valcap.success(function (data){
			
			   if(data=="1"){ 
				   document.getElementById('isr').value=1;
				  
				}else{ 
				   document.getElementById('isr').value=0;
				  
				}
			});
				
				if(document.getElementById('isr').value=="1"){ 
					 
				}else{
					errormsg+="Please input the correct answer for "+capLabel+".\n";
					witherror=1;
				}	
	}	
		
		if(witherror==1){
		  errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}	
		
}

function addNewEventSeminarFormSubmit(){
		var witherror ="";
	    var errormsg="";
		var first_name = document.getElementById('first_name').value;
		var last_name = document.getElementById('last_name').value;
		var email = document.getElementById('email').value;
        var confirm_email = document.getElementById('confirm_email').value;	    
		
		var phone = document.getElementById('phone').value;	    
		var address1 = document.getElementById('address1').value;	    
		var address2 = document.getElementById('address2').value;	    
		var city = document.getElementById('city').value;	    
		var state = document.getElementById('state').value;	    
		var country = document.getElementById('country').value;	    
		var currency = document.getElementById('currency').value;		
		var event_seminar_title = document.getElementById('event_seminar_title').value;	    
		var introduction = document.getElementById('introduction').value;	    
		//var start_date = document.getElementById('start_date').value;	    
		//var end_date = document.getElementById('end_date').value;	    
		//var time = document.getElementById('time').value;	    
		//var event_date_time = document.getElementById('event_date_time').value;	   		
		var event_cost = document.getElementById('cost').value;	    

   
		var lat = document.getElementById('lat').value;	    
		var lng = document.getElementById('lng').value;	    
	
	   if(first_name==""){witherror=1; errormsg+="First name must be provided.\n";}
	   if(last_name==""){witherror=1; errormsg+="Last name must be provided.\n";}
	   if(email==""){witherror=1; errormsg+="Email must be provided.\n";}
	   else{ 
	     if(validateEmail(email)!=true){
			   witherror=1;errormsg+="Provide a valid email address.\n";
		 }
	   }
	   if(confirm_email==""){witherror=1; errormsg+="Confirm your email.\n";}
	   else{
		   if(confirm_email!=email){witherror=1; errormsg+="Emails doesn't match.\n";}
	   }
		
		if(address1==""){witherror=1; errormsg+="First line address must be provided.\n";}

		if(city==""){witherror=1; errormsg+="City must be provided.\n";}
		if(state==""){witherror=1; errormsg+="State must be provided.\n";}
		if(country==""){witherror=1; errormsg+="Country must be provided.\n";}
		
		if(event_seminar_title==""){witherror=1; errormsg+="Title must be provided.\n";}
		if(introduction==""){witherror=1; errormsg+="Introduction must be provided.\n";}
		/*if(start_date==""){witherror=1; errormsg+="Start Date must be provided.\n";}
		if(end_date==""){witherror=1; errormsg+="End Date must be provided.\n";}
		if(time==""){witherror=1; errormsg+="Time must be provided.\n";}*/
		if(event_cost==""){witherror=1; errormsg+="Cost must be provided.\n";}
		if(currency==""){witherror=1; errormsg+="Currency must be provided.\n";}
		//if(event_date_time==""){witherror=1; errormsg+="Event or Workshop date and time must be provided.\n";}
		
		
        if (document.getElementById('agree_to_term').checked){
	
		}else{
			witherror=1; errormsg+="You must agree to the Terms of Use and Privacy Policy of SproutingTrade.\n";
		}
		
		if(witherror==1){
		  errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}	
}


function addNewGrowingSpaceFormSubmit(){
	var witherror ="";
	var errormsg="";
		var first_name = document.getElementById('first_name').value;
		var last_name = document.getElementById('last_name').value;
		var email = document.getElementById('email').value;
        var confirm_email = document.getElementById('confirm_email').value;	    
		
		var phone = document.getElementById('phone').value;	    
		var farm_name = document.getElementById('farm_name').value;	    
		var address1 = document.getElementById('address1').value;	    
		var address2 = document.getElementById('address2').value;	    
		var city = document.getElementById('city').value;	    
		var state = document.getElementById('state').value;	    
		var country = document.getElementById('country').value;	    
		
		var growing_space_style = document.getElementById('growing_space_style').value;	    
		
		var growing_space_style = document.getElementById('period_availability').value;	    
		var growing_space_size = document.getElementById('growing_space_size').value;	    
		var growing_space_size_unit = document.getElementById('growing_space_size_unit').value;	    
		var growing_space_cost = document.getElementById('growing_space_cost').value;	    
		var growing_space_period = document.getElementById('growing_space_period').value;	    
		var growing_space_period = document.getElementById('growing_space_period').value;	    
		var growing_space_period = document.getElementById('growing_space_period').value;	    
		var growing_space_accommodation = document.getElementById('growing_space_accommodation').value;	    
		//var growing_space_organic_certification = document.getElementById('growing_space_organic_certification').value;	    
		//var growing_space_site_access_time = document.getElementById('growing_space_site_access_time').value;	    
		
		var currency = document.getElementById('currency').value;	    
		var additional_notes = document.getElementById('additional_notes').value;	    
		var lat = document.getElementById('lat').value;	    
		var lng = document.getElementById('lng').value;	    
	
	   if(first_name==""){witherror=1; errormsg+="First name must be provided.\n";}
	   if(last_name==""){witherror=1; errormsg+="Last name must be provided.\n";}
	   if(email==""){witherror=1; errormsg+="Email must be provided.\n";}
	   else{ 
	     if(validateEmail(email)!=true){
			   witherror=1;errormsg+="Provide a valid email address.\n";
		 }
	   }
	   if(confirm_email==""){witherror=1; errormsg+="Confirm your email.\n";}
	   else{
		   if(confirm_email!=email){witherror=1; errormsg+="Emails doesn't match.\n";}
	   }
		
		if(address1==""){witherror=1; errormsg+="First line address must be provided.\n";}

		if(city==""){witherror=1; errormsg+="City must be provided.\n";}
		if(state==""){witherror=1; errormsg+="State must be provided.\n";}
		if(country==""){witherror=1; errormsg+="Country must be provided.\n";}
		
		if(growing_space_style==""){witherror=1; errormsg+="Growing space style must be provided.\n";}
		if(growing_space_size==""){witherror=1; errormsg+="growing spaces size must be provided.\n";}
		if(growing_space_size_unit==""){witherror=1; errormsg+="Size unit must be provided.\n";}
		//if(period_availability==""){witherror=1; errormsg+="Period availability must be provided.\n";}
		
		if(growing_space_cost==""){witherror=1; errormsg+="Cost must be provided.\n";}
		if(currency==""){witherror=1; errormsg+="Currency must be provided.\n";}
		if(growing_space_period==""){witherror=1; errormsg+="Period must be provided.\n";}
		if(growing_space_onsite_tools==""){witherror=1; errormsg+="Onsite tools must be provided.\n";}
		if(growing_space_parking==""){witherror=1; errormsg+="Parking must be provided.\n";}
		if(growing_space_accommodation==""){witherror=1; errormsg+="Accommodation must be provided.\n";}
		//if(growing_space_organic_certification==""){witherror=1; errormsg+="Organic certification must be provided.\n";}
		//if(growing_space_site_access_time==""){witherror=1; errormsg+="Site access time must be provided.\n";}	
		
		if (document.getElementById('agree_to_term').checked) {
		}else{
			witherror=1; errormsg+="You must agree to the Terms of Use and Privacy Policy of SproutingTrade.\n";
		}
		
		if(witherror==1){
		  errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}
}

function saveListingFormSubmit(){
	var witherror ="";
	var errormsg="";
	
	 if(document.getElementById('to_relist').value=="1"){
		if (document.getElementById('agree_to_term').checked) {
		}else{
			witherror=1; errormsg+="You must agree to the Terms of Use and Privacy Policy of SproutingTrade.\n";
		}
		
	    if(witherror==1){
		  errormsg=""+errormsg;	
          alert(errormsg);
		  return false;
		}
	 }else{
					var first_name = document.getElementById('first_name').value;
		var last_name = document.getElementById('last_name').value;
		var email = document.getElementById('email').value;
        var confirm_email = document.getElementById('confirm_email').value;	    
		
		var phone = document.getElementById('phone').value;	    
		var farm_name = document.getElementById('farm_name').value;	    
		var address1 = document.getElementById('address1').value;	    
		var address2 = document.getElementById('address2').value;	    
		var city = document.getElementById('city').value;	    
		var state = document.getElementById('state').value;	    
		var country = document.getElementById('country').value;	    
		
		var produce_category = document.getElementById('produce_category').value;	    
		var produce = document.getElementById('produce').value;	    
		
	
		
		var specific_variety = document.getElementById('specific_variety').value;	    
		var is_certified_organic = document.getElementById('is_certified_organic').value;	    
		var organic_not_certified = document.getElementById('organic_not_certified').value;	    
		var is_not_organic = document.getElementById('is_not_organic').value;	    
		var is_free = document.getElementById('is_free').value;	    
		var is_accept_trades = document.getElementById('is_accept_trades').value;	    
		var period_availability = document.getElementById('period_availability').value;	    
		var price_per_item = document.getElementById('price_per_item').value;	    
		var currency = document.getElementById('currency').value;	    
		//var quantity_number = document.getElementById('quantity_number').value;	    
		var quantity_unit = document.getElementById('quantity_unit').value;	    
		var additional_notes = document.getElementById('additional_notes').value;	    
		var lat = document.getElementById('lat').value;	    
		var lng = document.getElementById('lng').value;	    
	
		var pick_up_farm_stand_shop = document.getElementById('pick_up_farm_stand_shop').value;	    	
		var pick_up_farm_stand_shop_timefrom = document.getElementById('pick_up_farm_stand_shop_timefrom').value;	
		var pick_up_farm_stand_shop_timefrom = document.getElementById('pick_up_farm_stand_shop_timefrom').value;	
		
		var pick_up_at_property = document.getElementById('pick_up_at_property').value;	
		var pick_up_at_property_timefrom = document.getElementById('pick_up_at_property_timefrom').value;	
		var pick_up_at_property_timeuntil = document.getElementById('pick_up_at_property_timeuntil').value;	
		
		var delivery_contact_producer = document.getElementById('delivery_contact_producer').value;	
		var contact_producer = document.getElementById('contact_producer').value;	
		var u_pick = document.getElementById('u_pick').value;	
		
		var farmers_market = document.getElementById('farmers_market').value;	
		var farmers_market_name = document.getElementById('farmers_market_name').value;	
		var farmers_market_time_day = document.getElementById('farmers_market_time_day').value;	
		var farmers_market_time_from = document.getElementById('farmers_market_time_from').value;	
		var farmers_market_time_until = document.getElementById('farmers_market_time_until').value;	
		
	   if(first_name==""){witherror=1; errormsg+="First name must be provided.\n";}
	   if(last_name==""){witherror=1; errormsg+="Last name must be provided.\n";}
	   if(email==""){witherror=1; errormsg+="Email must be provided.\n";}
	   else{ 
	     if(validateEmail(email)!=true){
			   witherror=1;errormsg+="Provide a valid email address.\n";
		 }
	   }
	   if(confirm_email==""){witherror=1; errormsg+="Confirm your email.\n";}
	   else{
		   if(confirm_email!=email){witherror=1; errormsg+="Emails doesn't match.\n";}
	   }

		
		if(address1==""){witherror=1; errormsg+="First line address must be provided.\n";}

		if(city==""){witherror=1; errormsg+="City must be provided.\n";}
		if(state==""){witherror=1; errormsg+="State must be provided.\n";}
		if(country==""){witherror=1; errormsg+="Country must be provided.\n";}
		
		if(produce_category==""){witherror=1; errormsg+="Produce category must be provided.\n";}
		if(produce==""){witherror=1; errormsg+="Produce must be provided.\n";}
		if(specific_variety==""){witherror=1; errormsg+="Specific variety must be provided.\n";}
		//if(period_availability==""){witherror=1; errormsg+="Period availability must be provided.\n";}
		
		
		
		if(price_per_item==""){witherror=1; errormsg+="Price per item must be provided.\n";}
		if(currency==""){witherror=1; errormsg+="Currency must be provided.\n";}
		//if(quantity_number==""){witherror=1; errormsg+="Quantity number must be provided.\n";}
		if(quantity_unit==""){witherror=1; errormsg+="Quantity unit must be provided.\n";}
		

		
		
        if(witherror==1){
		  errormsg="Please correct/complete the following to continue:\n"+errormsg;	
          alert(errormsg);
		  return false;
		}

     }	 
		

}


//temporary validation
function addNewListingFormSubmit(){
	
	var witherror ="";
	var errormsg="";
		var first_name = document.getElementById('first_name').value;
		var last_name = document.getElementById('last_name').value;
		var email = document.getElementById('email').value;
        var confirm_email = document.getElementById('confirm_email').value;	    
		
		var phone = document.getElementById('phone').value;	    
		var farm_name = document.getElementById('farm_name').value;	    
		var address1 = document.getElementById('address1').value;	    
		var address2 = document.getElementById('address2').value;	    
		var city = document.getElementById('city').value;	    
		var state = document.getElementById('state').value;	    
		var country = document.getElementById('country').value;	    
		
		var produce_category = document.getElementById('produce_category').value;	    
		var produce = document.getElementById('produce').value;	    
		
	
		
		var specific_variety = document.getElementById('specific_variety').value;	    
		var is_certified_organic = document.getElementById('is_certified_organic').value;	    
		var organic_not_certified = document.getElementById('organic_not_certified').value;	    
		var is_not_organic = document.getElementById('is_not_organic').value;	    
		var is_free = document.getElementById('is_free').value;	    
		var is_accept_trades = document.getElementById('is_accept_trades').value;	    
		var period_availability = document.getElementById('period_availability').value;	    
		var price_per_item = document.getElementById('price_per_item').value;	    
		var currency = document.getElementById('currency').value;	    
		//var quantity_number = document.getElementById('quantity_number').value;	    
		var quantity_unit = document.getElementById('quantity_unit').value;	    
		var additional_notes = document.getElementById('additional_notes').value;	    
		var lat = document.getElementById('lat').value;	    
		var lng = document.getElementById('lng').value;	    
	
		var pick_up_farm_stand_shop = document.getElementById('pick_up_farm_stand_shop').value;	    	
		var pick_up_farm_stand_shop_timefrom = document.getElementById('pick_up_farm_stand_shop_timefrom').value;	
		var pick_up_farm_stand_shop_timefrom = document.getElementById('pick_up_farm_stand_shop_timefrom').value;	
		
		var pick_up_at_property = document.getElementById('pick_up_at_property').value;	
		var pick_up_at_property_timefrom = document.getElementById('pick_up_at_property_timefrom').value;	
		var pick_up_at_property_timeuntil = document.getElementById('pick_up_at_property_timeuntil').value;	
		
		var delivery_contact_producer = document.getElementById('delivery_contact_producer').value;	
		var contact_producer = document.getElementById('contact_producer').value;	
		var u_pick = document.getElementById('u_pick').value;	
		
		var farmers_market = document.getElementById('farmers_market').value;	
		var farmers_market_name = document.getElementById('farmers_market_name').value;	
		var farmers_market_time_day = document.getElementById('farmers_market_time_day').value;	
		var farmers_market_time_from = document.getElementById('farmers_market_time_from').value;	
		var farmers_market_time_until = document.getElementById('farmers_market_time_until').value;	
		
	   if(first_name==""){witherror=1; errormsg+="First name must be provided.\n";}
	   if(last_name==""){witherror=1; errormsg+="Last name must be provided.\n";}
	   if(email==""){witherror=1; errormsg+="Email must be provided.\n";}
	   else{ 
	     if(validateEmail(email)!=true){
			   witherror=1;errormsg+="Provide a valid email address.\n";
		 }
	   }
	   if(confirm_email==""){witherror=1; errormsg+="Confirm your email.\n";}
	   else{
		   if(confirm_email!=email){witherror=1; errormsg+="Emails doesn't match.\n";}
	   }

		
		if(address1==""){witherror=1; errormsg+="First line address must be provided.\n";}

		if(city==""){witherror=1; errormsg+="City must be provided.\n";}
		if(state==""){witherror=1; errormsg+="State must be provided.\n";}
		if(country==""){witherror=1; errormsg+="Country must be provided.\n";}
		
		if(produce_category==""){witherror=1; errormsg+="Produce category must be provided.\n";}
		if(produce==""){witherror=1; errormsg+="Produce must be provided.\n";}
		if(specific_variety==""){witherror=1; errormsg+="Specific variety must be provided.\n";}
		//if(period_availability==""){witherror=1; errormsg+="Period availability must be provided.\n";}
		
		if(document.getElementById('is_free').checked){
			document.getElementById('price_per_item').value='0.00';
        }else{	
		  if(price_per_item==""){witherror=1; errormsg+="Price per item must be provided.\n";}
		  if(currency==""){witherror=1; errormsg+="Currency must be provided.\n";}
		}
		//if(quantity_number==""){witherror=1; errormsg+="Quantity number must be provided.\n";}
		if(quantity_unit==""){witherror=1; errormsg+="Quantity unit must be provided.\n";}
		
	   if (document.getElementById('agree_to_term').checked) {
		}else{
			witherror=1; errormsg+="You must agree to the Terms of Use and Privacy Policy of SproutingTrade.\n";
		}
		
		
        if(witherror==1){
		  errormsg="Please correct/complete the following to continue:\n"+errormsg;	
          alert(errormsg);
		  return false;
		}
}

function loadProduceSubCat(cid,selectedsub){
    	document.getElementById('produce_select').innerHTML='<select  class="form-control full" name="produce" id="produce"><option>Loading Option...</option></select>';

	
				var strURL="../ajax.php?action=loadProduceSubCategory&cid="+cid+"&selectedsub="+selectedsub;
				var req = getXMLHTTP();

				if (req) {
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
							    document.getElementById('produce_select').innerHTML='<select class="form-control full" name="produce" id="produce">'+req.responseText+'</select>';
							}else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}
					}
					req.open("GET", strURL, true);
					req.send(null);
				}
		

		
}

function confirmDelete(url){
   
   var r = confirm("Are you sure you want to delete this?");
	if (r == true) {
        location.href=url;
	} else {
		return false;
	}
}

function submitSearch(){
  var witherror="";
  var errormsg="";
  var category = document.getElementById('category').value;
  var produce = document.getElementById('produce').value;
  var location = document.getElementById('location').value;
  
  //if(category==""){witherror=1; errormsg="Please select a category.\n";}
  //if(produce==""){witherror=1; errormsg=errormsg+"Please provide produce.\n";}
  if(location==""){witherror=1; errormsg=errormsg+"Please provide location.\n";}
  /*if(category=="" && produce=="" && location==""){
	witherror=1; errormsg="Please provide at least one of the three search fields to continue.\n";
	//Category or Produce or Location.
 }*/
	

  if(witherror==1){
	  alert(errormsg);
	  return false;
  }else{ 
  
  return true;
		/*category = category.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
		.replace(/\s+/g, '-') // collapse whitespace and replace by -
		.replace(/-+/g, '-'); // collapse dashes

		produce = produce.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
		.replace(/\s+/g, '-') // collapse whitespace and replace by -
		.replace(/-+/g, '-'); // collapse dashes

		location = location.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
		.replace(/\s+/g, '-') // collapse whitespace and replace by -
		.replace(/-+/g, '-'); // collapse dashes		*/
	  
      //var submitSub = "http://localhost/search/";//'+category+'/'+produce+'/'+location+'/';
	//alert(submitSub);
    
  }


}

function convertToSlug(str)
{     
		str = str.replace(/^\s+|\s+$/g, ''); // trim
		str = str.toLowerCase();

		// remove accents, swap ñ for n, etc
		var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
		var to   = "aaaaaeeeeeiiiiooooouuuunc------";
		for (var i=0, l=from.length ; i<l ; i++) {
		str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
		}

		str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
		.replace(/\s+/g, '-') // collapse whitespace and replace by -
		.replace(/-+/g, '-'); // collapse dashes
		document.getElementById('slug').value=str;

}

function slideDown(id){
    document.getElementById(id).style.height="350px";
	 // $("#"+id).animate({height:'300'});
}
function slideUp(id){
    document.getElementById(id).style.height="140px";
	 // $("#"+id).animate({height:'65'});
}

function swithType(member_type){
    if(member_type==2){ 
	//  document.getElementById('profile_1').style.display="none";
	  document.getElementById('profile_2').style.display="block";
	}else{
	  //document.getElementById('profile_1').style.display="block";
	  document.getElementById('profile_2').style.display="none";
	}
}

function validateReply(){
	   var errormsg="";
	  var message = document.getElementById('body').value;

	
	   if(message==""){witherror=1; errormsg+="Message must be provided.\n";}else{witherror="";}
	 
		if(witherror==1){
		 // errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}	
		
}

function validateMessages2(){
	   var errormsg="";
	  var message = document.getElementById('message').value;

	
	   if(message==""){witherror=1; errormsg+="Message must be provided.\n";}else{witherror="";}
	 
		if(witherror==1){
		 // errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}	
		
}


function validateMessages2Profile(){
	   var errormsg="";
	   var message = document.getElementById('message').value;
	   var subject = document.getElementById('subject').value;
	
	   if(message==""){witherror=1; errormsg+="Message must be provided.\n";}
	   if(subject==""){witherror=1; errormsg+="Subject must be provided.\n";}
	   
		if(witherror==1){
		 // errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}	
		
}

function validateMessagesProfile(){
	   var errormsg="";
	  var fromemail = document.getElementById('fromemail').value;
	  var message = document.getElementById('message').value;
	  var subject = document.getElementById('subject').value;
		
	   if(fromemail==""){witherror=1; errormsg+="Email address must be provided.\n";}
	   else{
		   if(validateEmail(fromemail)!=true){
		       witherror=1;errormsg+="Provide a valid email address.\n";
		   }else{witherror="";}
		}	   	
	   if(message==""){witherror=1; errormsg+="Message must be provided.\n";}
	   if(subject==""){witherror=1; errormsg+="Subject must be provided.\n";}
	   
		if(witherror==1){
		 // errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}	
		
}


function validateMessages(){
	   var errormsg="";
	  var fromemail = document.getElementById('fromemail').value;
	  var message = document.getElementById('message').value;

	   if(fromemail==""){witherror=1; errormsg+="Email address must be provided.\n";}
	   else{
		   if(validateEmail(fromemail)!=true){
		       witherror=1;errormsg+="Provide a valid email address.\n";
		   }
		}	   	
	   if(message==""){witherror=1; errormsg+="Message must be provided.\n";}else{witherror="";}
	 
		if(witherror==1){
		 // errormsg="Please correct/complete the following to continue:\n\n"+errormsg;	
          alert(errormsg);
		  return false;
		}	
		
}