$(window).load(function(){
	//call functions
	sortIt();
	columnSize();
	//setTimeout(function(){
		//callNiceScroll();
	//},1000);
	fixedAppHead();
	resizeIt();
});

$(document).ready(function(){
	//header offset
	var appHeaderHeight = $('.app-header').height();
	$('.header-offset').css('top',appHeaderHeight);

	//column resizer
	$(window).resize(function(){
		columnSize();
		callNiceScroll();
	});

	$('#column-size').change(function(){
		columnSize();
		callNiceScroll();
	});

	//close app column
	$('.app-col-close').click(function(){
		$(this).closest('.app-col').remove();
		setTimeout(function(){
			columnSize();
		});
	});
});

//functions ********************************************************************
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

function fixedAppHead(){
	$('.app-col-content').css({
		top: $('.app-col-head').outerHeight()
	});
}

function callNiceScroll(){
	$(".app-col-content, .app-body").niceScroll({
		cursorcolor: '#A8A8A8',
		cursorwidth: '7px',
		//touchbehavior: true,
		autohidemode: false,
		//bouncescroll: true,
		smoothscroll: true,
		scrollspeed: 60
	}).resize();
}

function sortIt(){
	$( ".sort-it" ).sortable({
		handle: ".app-col-head",
		axis: "x",
		revert: true,
		change: function(){
			setTimeout(function(){
				callNiceScroll();
			},1000);
		}
	});
	//$( ".sort-it" ).disableSelection();
}

function resizeIt(){
	$('.resize-it').resizable();
}