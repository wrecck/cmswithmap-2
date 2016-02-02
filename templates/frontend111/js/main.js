$(window).load(function(){
	//variables
	var sortLink;
	//call functions
	$('.sort-it').sortIt({
		handle: ".app-col-head",
		axis: "x",
		revert: true
	}); //.disableSelection();

  $(".sort-it-y").sortable({
		update: function() {
			var order = jQuery(this).sortable("serialize");
		    var data = {
		      action: 'my_action',
		     act:'order_qstseq',
		      order: order
	         };

		}
	});




	$('.sort-it-y').sortIt({
		//removes the link when the item starts to move
		start: function(){
			setTimeout(function(){
				sortLink = $('.ui-sortable-helper').attr('data-link');
				$('.ui-sortable-helper').attr('data-link','');
				$('.ui-sortable-helper').addClass('sort-moved');

			},50);
		},
		//restores the link when the item stops
		stop: function(){
			setTimeout(function(){
				$('.sort-moved').attr('data-link',sortLink);
				$('.sort-moved').removeClass('sort-moved');
			},200);
		},
		axis: "y",
		revert: true
	});//.disableSelection();

	//check if page is full template
	if($('body').hasClass('full')){}
	else{
		// set default width
		defaultWidth();
	}
	fixedAppHead();
	resizeIt();
	containerWidth();
	setTimeout(function(){
		carousel();
	},1000);

	//feed row links
	$('.feed-row').click(function(){
		var dataLink = $(this).attr('data-link');
		if(!dataLink || 0 === dataLink.length){}
		else{
			window.location.assign(dataLink);
		}
	});
});

$(function () {
	$(".tool-left").tooltip({placement: 'left'});
	$(".tool-right").tooltip({placement: 'right'});
});

$(document).ready(function(){
	//current menu
	var url = window.location.href;
	$('.left-nav-menu li').removeClass('current');
    $('.left-nav-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('current');

	//tabs
	$('.toggle-app-body').click(function(){
		var targetTab = $(this).attr('data-toggle');
		$('.toggle-app-body').parent().removeClass('active');
		$(this).parent().addClass('active');
		$('.app-body-container').removeClass('active');
		$(targetTab).addClass('active');
		fixedAppHead();
	});

	//header offset
	var appHeaderHeight = $('.app-header').height();
	$('.header-offset').css('top',appHeaderHeight);

	$('.column-size').change(function(){
		var parentWidth = $('.app-body').width();
		var colWidth = parentWidth/($(this).val());
		$(this).closest('.app-col').css('width',colWidth);
		containerWidth();
		sortableFix();
	});

	//column resizer
	$(window).resize(function(){
		//columnSize();
		//callNiceScroll();
		containerWidth();
		carousel();
	});

    var pinningtabheight;
    (pinningtabheight = function() {
        $('#pinning_tab_temp').height($(document).height() - 120);
    })();

    $(window).on('resize load', pinningtabheight);

	//close app column
	$('.app-col-close').click(function(){
		$(this).closest('.app-col').remove();
		setTimeout(function(){
			columnSize();
		});
	});

	//close
	$('body').on('click', '.close-parent', function(){
		$(this).parent().remove();
	});

	//bootstrap tags
	$('.bootstrap-tagsinput .bootstrap-tagsinput').addClass('s-tagsinput-inner').removeClass('bootstrap-tagsinput');
	$('.s-tagsinput span[data-role="remove"]').click(function(){
		$(this).parent().remove();
	});
	$('.s-hashtag input[type="text"]').change(function(){
		$('.s-hashtag .s-tagsinput-inner .tag').each(function(){
			var keywordText = $(this).text();
			//alert(keywordText);
			if(keywordText.indexOf('#') === -1){
				$(this).prepend('#');
			}
			else{

			}
		});
	});

	//menu-drop
	$('#app-left-main').hover(function() {
		$(this).addClass('is-hovered').removeClass('not-hovered');
	},
	function () {
		$(this).addClass('not-hovered').removeClass('is-hovered');
	});

	//slide-down
	$('.slide-toggle').click(function(event){
		event.preventDefault();
		var sdToggle = $(this).attr('data-toggle');
		$(sdToggle).slideToggle();
	});

	//left toggle
	$('.left-toggle').click(function(){
		var ltToggle = $(this).attr('data-toggle');
		$('.asset-choice').hide().css('left','-100px');
		$('.assets-toggle').fadeIn().css('left','0');
		$('.asset-item').hide();
		$(ltToggle).fadeIn();
		resetForm('#assets-modal form');
	});

	//assets
	$('.asset-btn-back').click(function(){
		$('.asset-item').hide();
		$('.asset-choice').fadeIn().css('left','0');
		$('.assets-toggle').hide().css('left','-100px');
		resetForm('#assets-modal form');
	});

	//geo location
	$('#geo-location-add').click(function(){
		var geo_val = $('#geo-location-value').val();
		var geo_exist = true;
		if($('.geo-location-values').find('.label').length){
			$('.geo-location-values .label').each(function(){
				var chechGeo = $(this).text();
				if(chechGeo.indexOf(geo_val) === -1){
					//alert('wala');
				}
				else{
					geo_exist = false;
				}
			});
			if(geo_exist == true){
				$('.geo-location-values').append('<span class="label s-label label-warning">'+geo_val+' <span class="close-parent">x</span></span>');
			}
		}
		else{
			$('.geo-location-values').append('<span class="label s-label label-warning">'+geo_val+' <span class="close-parent">x</span></span>');
		}
	});
	$('.geo-location-values').on('click','.close-parent',function(){
		$(this).parent().remove();
	});


	// PANEL SETTINGS ******************************************************

	//add class to current panel that uses the settings
	$('.app-col-menu').on('click','.panel-settings-trigger',function(){
		$('.app-col').removeClass('settings-on');
		$(this).closest('.app-col').addClass('settings-on');
		$('#panel-settings .modal-title').html('<span class="icon-m fa fa-rss"></span>Edit Panel');
	});

	//remove settings-on class when settings modal is closed
	$('#panel-settings').on('hidden.bs.modal', function (e) {
	  $('.app-col').removeClass('settings-on');
	  $('#panel-settings .modal-title').html('<span class="icon-m fa fa-rss"></span>New Panel');
	})


		//pass values to app columns from the settings popup
	$('#panel-settings').on('shown.bs.modal', function() {
		var thisId = $(this).attr('id');
		resetFormValues("#"+thisId);

		$('#panel-settings-form').bootstrapValidator({
			live: false,
			message: 'The value is not valid',
			submitButtons: '#panel-settings-submit',
	    	submitHandler: function(validator, form, submitButton) {

				if (validator.isValid() == true){
					$('#panel-settings').modal('hide');
					getPanelValue();
				}
			},
			fields: {
				panel_name: {
					validators: {
						notEmpty: {}
					}
				},
				panel_size: {
					validators: {
						notEmpty: {}
					}
				},
				panel_refresh: {
					validators: {
						notEmpty: {},
						numeric: {
							message: "Please enter a numeric value"
						}
					}
				}
			}
		}).bootstrapValidator('resetForm');

	});
	//pass values to app columns from the settings popup
	$('#panel-settings_pinning').on('hide.bs.modal', function() {
		/*var thisId = $(this).attr('id');
		resetFormValues("#"+thisId);*/
	});

	//pass values to app columns from the settings popup
	$('#panel-settings_pinning').on('shown.bs.modal', function() {
		var thisId = $(this).attr('id');
		resetFormValues("#"+thisId);
		$('#pannel_submitted').val(0);
		$('#panel-settings-form').bootstrapValidator({
			live: false,
			excluded: [':disabled'],
			message: 'The value is not valid',
			submitButtons: '#panel-settings-submit',
	    	submitHandler: function(validator, form, submitButton) {

				if (validator.isValid() == true){
					$('#panel-settings_pinning').modal('hide');
					if($('#pannel_submitted').val() == 0)
					{
						$('#pannel_submitted').val(1);
						getPanelValuePinning();
					}
				}
			},
			fields: {
				panel_name: {
					validators: {
						notEmpty: {}
					}
				},
				panel_size: {
					validators: {
						notEmpty: {}
					}
				},
				panel_refresh: {
					validators: {
						notEmpty: {},
						numeric: {
							message: "Please enter a numeric value"
						}
					}
				},
				panel_filter: {
					validators: {
						callback: {
                            message: 'Please select a filter',
                            callback: function (value, validator, $field) {
                                // Determine the numbers which are generated in captchaOperation
                                var status = $('#panel_filter').attr('data-status');
                                    if(status == 'block')
                                		return false;
                                	if(status == 'ok')
                                		return true;
                        	}
                    	}
					}
				}
			}
		}).bootstrapValidator('resetForm');

	});

});

//functions ********************************************************************
function sortableFix(){
	var firstCol = $('.app-col:first-child').width();
	$('.app-col:first-child').css('width',firstCol-1);
}

function setColSize(panelWidth){
	var parentWidth = $('.app-body').width();
	var colWidth = parentWidth/panelWidth;
	console.log(colWidth);
	return colWidth;
	//alert('hello');
}

function defaultWidth(){
	//$('.app-col').hide();
	var defaultWidth = 3;
	var parentWidth = $('.app-body').width();
	var colWidth = parentWidth/defaultWidth;
	var colCount = $('.app-col').size();
	$('.app-col').css('width',colWidth);
	$('.app-col:first-child').css('width',colWidth-1);//for sortable width bug
	//$('.app-body-container').css('width',colWidth*colCount);
	//$('.app-col').fadeIn();
}

function changetWidth(panelWidth, e){
	var parentWidth = $('.app-body').width();
	var colWidth = parentWidth/panelWidth;
	$('#column_'+e).css('width',colWidth);
}


function containerWidth(){
	var conWidth = 0;
	$('.app-body-container.active .app-col').each(function(){
		conWidth = conWidth + $(this).width();
	});
	$('.app-body-container.active').css('width',conWidth);
	//alert(conWidth);
}

function fixedAppHead(){
	$('.app-col-content').each(function(){
		//alert($(this).siblings('.app-col-head').outerHeight());
		$(this).css({
			top: $(this).siblings('.app-col-head').outerHeight()
		});
	});
}

//forms
function resetFormValues(formSelector){
	$(formSelector+' input[type="text"]').val('');
	$(formSelector+' select').val('');
	$(formSelector+' textarea').val('');
	$(formSelector+' option:contains("Select")').prop('selected','selected');
	$(formSelector+' input[type="radio"]').prop('checked',false);
	$(formSelector+' button[name="panel_filter"]').attr('data-status','block');
	$('#location_li').hide();
	$('#category_li').hide();

}

function resetForm(formSelector){
	$(formSelector).bootstrapValidator('resetForm');
}

function loadColumn(column_id) {
	

	$("#"+column_id).html('<br><br><center><img src="/templates/default/images/preloader.gif"></center>');
	
	var column_count = document.getElementById('number_of_columns').value+1;
	if(column_count>3){
	  var page_width=(Math.round(column_count)*433);
	  // document.getElementById('app-right-main').style.width=page_width+"px";
	}
	var panelSize = $('#panel-settings-form input[name="panel_size"]:checked').val();
	var panelWidth;
	var panelName = $('#panel-settings-form input[name="panel_name"]').val();
    var panel_refresh = $('#panel-settings-form input[name="panel_refresh"]').val();

	$('#column_2_name').html=panelName;
   // document.getElementById('column_2').style.display="block";

	var category_value = $("#category-value").html();
	var provider_value = $("#provider-value").html();
	var location_value = $("#location-value").html();
	var sort_value = $("#sort-value").val();
	var content_type_value = $("#content-type-value").html();
	var date_value = $("#date-value").html();
	var curation_status_value = $("#curation-status-value").html();
	var article_id_value = $("#article-id-value").html();
	var keyword_value = $("#keyword-value").html();

	var settings = "category_value="+category_value;
		settings = settings + "&sort_value="+sort_value;
	    settings = settings + "&provider_value="+provider_value;
	    settings = settings + "&location_value-value="+location_value;
	    settings = settings + "&content_type_value="+content_type_value;
	    settings = settings + "&date_value="+date_value;
	    settings = settings + "&curation_status_value="+curation_status_value;
		settings = settings + "&article_id_value="+article_id_value;
	    settings = settings + "&keyword_value="+keyword_value;
		settings = settings + "&panelName="+panelName;
		settings = settings + "&panelSize="+panelSize;
		settings = settings + "&panelWidth="+panelWidth;
		settings = settings + "&panel_refresh="+panel_refresh;
		settings = settings.trim();
	    settings = settings.replace("&gt;","_");
		settings = settings.replace(" &gt;","_");
		settings = settings.replace(" >","_");
		settings = settings.replace("undefined","");
	   var strURL="/ajax.php?action=addcolumns&column="+column_id+"&"+settings;

		document.getElementById("refresh_"+column_id).value=panel_refresh;
	    document.getElementById("settings_"+column_id).value=strURL;

	var req = getXMLHTTP();

	if (req) {

		req.onreadystatechange = function() {

			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {

				  if(req.responseText=="null"){
					  document.getElementById(column_id).innerHTML="No article/story found.";
					}else{
					 setTimeout(function(){
					 document.getElementById(column_id).innerHTML=req.responseText;

					$("#"+column_id).find("script").each(function(i) {
                            eval($(this).text());
                        });
						carousel();
					 }, 2000);



				   }


				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}
		}
		req.open("GET", strURL, true);
		req.send(null);
	}
}


function loadColumnPinning(column_id) {
	var column_count = document.getElementById('number_of_columns').value+1;
	if(column_count>3){
	  var page_width=(Math.round(column_count)*433);
	  // document.getElementById('app-right-main').style.width=page_width+"px";
	}
	var panelSize = $('#panel-settings-form input[name="panel_size"]:checked').val();
	var panelWidth;
	var panelName = $('#panel-settings-form input[name="panel_name"]').val();
    var panel_refresh = $('#panel-settings-form input[name="panel_refresh"]').val();


	$('#column_2_name').html=panelName;
    document.getElementById(column_id).style.display="block";

	var category_value = $("#category-value").html();

	var location_value = $("#location-value").html();
	var sort_value = $("#sort-value").val();

	var settings = "category_value="+category_value;

	    settings = settings + "&location_value-value="+location_value;
		settings = settings + "&panelName="+panelName;
		settings = settings + "&panelSize="+panelSize;
		settings = settings + "&panelWidth="+panelWidth;
		settings = settings + "&panel_refresh="+panel_refresh;
	    settings = settings.trim();
	    settings = settings.replace("&gt;","_");
		settings = settings.replace(" &gt;","_");
		settings = settings.replace(" >","_");
		settings = settings.replace("undefined","");
	var strURL="/ajax.php?action=add_pinning_columns&column="+column_id+"&"+settings;
	//alert(strURL);

		document.getElementById("refresh_"+column_id).value=panel_refresh;
	    document.getElementById("settings_"+column_id).value=strURL;

	var req = getXMLHTTP();

	if (req) {

		req.onreadystatechange = function() {

			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {

				  if(req.responseText=="null"){
					  document.getElementById(column_id).innerHTML="No article/story found.";
					}else{
					 setTimeout(function(){

					 document.getElementById(column_id).innerHTML=req.responseText;

					$("#"+column_id).find("script").each(function(i) {
                            eval($(this).text());
                     });

						$.ajax(".sort-it-y").sortable({update: function() {
							   var order = $(this).sortable("serialize");
							   var ajaxurl="../ajax.php?action=pinning_ordering";


							   var data = {
							   action: 'pinning_ordering',
							   act:'order_optintable',
							   order: order};
								jQuery.post(ajaxurl, data, function(response){

								});
							}

						});

					}, 2000);



				   }


				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}
		}
		req.open("GET", strURL, true);
		req.send(null);
	}
}

//panel settings for pining
function getPanelValuePinning(){
	var panelSize = $('#panel-settings-form input[name="panel_size"]:checked').val();
	var panelWidth;
	var colWidth;
	var panelName = $('#panel-settings-form input[name="panel_name"]').val();
    var column_id_count = parseFloat(document.getElementById('number_of_columns').value)+parseFloat(1); //what column should be loaded
	document.getElementById('number_of_columns').value = column_id_count;
	var parentWidth = $('.app-body').width();
	var defaultPanelWidth = $('#default_panel').width();
	$('#column_'+column_id_count+'_name').html=panelName;
    document.getElementById('column_'+column_id_count).style.display="block";
	document.getElementById('default_pinning_tab').style.display="block";

	switch(panelSize){
		case 'small':  colWidth = parentWidth / 4;
									 break;

		case 'medium': colWidth = parentWidth / 3;
									 break;

		case 'large':  colWidth = parentWidth / 2;
									 break;
		case 'xlarge': colWidth = parentWidth - defaultPanelWidth;
		               break;
		default:       colWidth = parentWidth / 3;
	}


    $('#column_'+column_id_count).width(colWidth+'px');
    
	loadColumnPinning('column_'+column_id_count);

	var category_value = $("#category-value").html();
	var provider_value = $("#provider-value").html();
	var location_value = $("#location-value").html();
	var content_type_value = $("#content-type-value").html();
	var date_value = $("#date-value").html();
	var curation_status_value = $("#curation-status-value").html();
	var article_id_value = $("#article-id-value").html();
	var keyword_value = $("#keyword-value").html();

	var settings = "category_value="+category_value;
	    settings = settings + "&location_value-value="+location_value;
	    		settings = settings.trim();


	//panel size - resize the panel column size and recompute the container width and reset the sizes of carousel
	switch(panelSize){
		case 'small':  panelWidth = 4;
									 break;

		case 'medium': panelWidth = 3;
									 break;

		case 'large':  panelWidth = 2;
									 break;
		case 'xlarge': panelWidth = 1;
		               break;
		default:       panelWidth = 3;
	}

	$('.settings-on').css('width',setColSize(panelWidth));
	carousel();


	//panel name
	$('.settings-on .app-col-head h5').html('<span class="icon-m fa fa-rss"></span>'+panelName);
}

//panel settings
function getPanelValue(){
	var panelSize = $('#panel-settings-form input[name="panel_size"]:checked').val();
	var panelWidth;
	var colWidth;
	var panelName = $('#panel-settings-form input[name="panel_name"]').val();
    var column_id_count = parseFloat(document.getElementById('number_of_columns').value)+parseFloat(1); //what column should be loaded
	document.getElementById('number_of_columns').value = column_id_count;
	var parentWidth = $('.app-body').width();
	var defaultPanelWidth = $('#default_panel').width();
	$('#column_'+column_id_count+'_name').html=panelName;
    document.getElementById('column_'+column_id_count).style.display="block";

    switch(panelSize){
		case 'small':  colWidth = parentWidth / 4;
									 break;

		case 'medium': colWidth = parentWidth / 3;
									 break;

		case 'large':  colWidth = parentWidth / 2;
									 break;
		case 'xlarge': colWidth = parentWidth - defaultPanelWidth;
		               break;
		default:       colWidth = parentWidth / 3;
	}


    $('#column_'+column_id_count).width(colWidth+'px');
	loadColumn('column_'+column_id_count);

	var category_value = $("#category-value").html();
	var provider_value = $("#provider-value").html();
	var location_value = $("#location-value").html();
	var content_type_value = $("#content-type-value").html();
	var date_value = $("#date-value").html();
	var curation_status_value = $("#curation-status-value").html();
	var article_id_value = $("#article-id-value").html();
	var keyword_value = $("#keyword-value").html();

	var settings = "category_value="+category_value;
	    settings = settings + "&provider_value="+provider_value;
	    settings = settings + "&location_value-value="+location_value;
	    settings = settings + "&content_type_value="+content_type_value;
	    settings = settings + "&date_value="+date_value;
	    settings = settings + "&curation_status_value="+curation_status_value;
		settings = settings + "&article_id_value="+article_id_value;
	    settings = settings + "&keyword_value="+keyword_value;
		settings = settings + "&panelName="+panelName;
		settings = settings + "&panelSize="+panelSize;
		settings = settings + "&panelWidth="+panelWidth;
		settings = settings.trim();


	//panel size - resize the panel column size and recompute the container width and reset the sizes of carousel
	

	$('.settings-on').css('width',setColSize(panelWidth));
	//containerWidth();
	//changetWidth(panelWidth, 'column_id_count');
	carousel();
	
	//panel name
	$('.settings-on .app-col-head h5').html('<span class="icon-m fa fa-rss"></span>'+panelName);
}

// function sortIt(){
// 	$(".sort-it").sortable({
// 		handle: "",
// 		axis: "x",
// 		revert: true
// 	});
// 	//$( ".sort-it" ).disableSelection();
// }

(function($){
	$.fn.sortIt = function(options){
		var settings = $.extend({
			delay: "",
			start: "",
			stop: "",
			change: "",
			handle: "",
			axis: "",
			revert: true
		},options);
		return this.sortable({
			delay: settings.delay,
			start: settings.start,
			stop: settings.stop,
			change: settings.change,
			handle: settings.handle,
			axis: settings.axis,
			revert: settings.revert
		});
	};
}(jQuery));

function resizeIt(){
	$(".app-col").resizable({
		start: function(){
			$(this).removeClass('app-col-static app-col-4-4 app-col-3-4 app-col-2-4 app-col-1-4');
		}
	});
}

function carousel(){
    $('.s-carousel').flexslider({
      slideshow: false,
      animation: "slide",
      animationLoop: false,
      itemWidth: 40,
      maxItems: 7,
      controlNav: false,
      itemMargin: 5,
      prevText: '<span class="glyphicon glyphicon-chevron-left">',
      nextText: '<span class="glyphicon glyphicon-chevron-right">'
    });

    $('.article-slider').flexslider({
      controlNav: false,
      prevText: '<span class="glyphicon glyphicon-chevron-left">',
      nextText: '<span class="glyphicon glyphicon-chevron-right">'
    });

    $('.feed-slider').flexslider({
      slideshow: false,
      animation: "slide",
      controlNav: false,
      directionNav: true,
      prevText: '<span class="fa fa-angle-left">',
      nextText: '<span class="fa fa-angle-right">'
    });


}

function columnSize(){
	//$('.app-col').hide();
	var parentWidth = $('.app-body').width();
	var colWidth = parentWidth/($('#column-size').val());
	var colCount = $('.app-col').size();
	$('.app-col').css('width',colWidth);
	$('.app-col:first-child').css('width',colWidth-1);//for sortable width bug
	$('.app-body-container').css('width',colWidth*colCount);
	//$('.app-col').fadeIn();
}

