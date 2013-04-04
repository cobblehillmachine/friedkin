$(document).ready(function() {
	window.scrollTo(0, 1);
	footerHeight();
	$("#nav li:first").each(function(){$(this).addClass("first")});
	$('.home-box, #philosophy .sub-cont').eq(2).addClass('last').end();
	$('p').each(function(i) {if ((i + 1) % 2 == 0) {$(this).addClass('even');}});
	$('#investments .sub-cont').each(function(i) {if ((i + 1) % 4 == 0) {$(this).addClass('last');}});
	$('p').eq(0).addClass('first').end();
	$(".sub-cont:last").each(function(){$(this).addClass("last")});
	showSubnav();
	
});

$(window).resize(function() {
	footerHeight();
});

$(window).load(function() {
	footerHeight();
});


function footerHeight(){
var footer = $('#footer'),
windowHeight = $(window).height(),
combinedHeight = footer.offset().top + 110,
height = (windowHeight > combinedHeight) ? windowHeight - footer.offset().top : 110;
// height = windowHeight - footer.offset().top;
footer.css({'height':height});
}

function showSubnav() {
	
	$('#menu-item-17').live({
		mouseenter: function(){$('#menu-item-17 .sub-menu').slideToggle();},
		mouseleave: function(){$('#menu-item-17 .sub-menu').slideToggle();}
	});
}