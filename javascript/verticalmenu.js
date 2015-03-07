/*
Credit : http://cssmenumaker.com/menu/modern-jquery-accordion-menu#
*/
( function( $ ) {
	$( document ).ready(function() {
		$('.verticalmenu > ul > li > a').click(function() {
		  $('.verticalmenu li').removeClass('active');
		  $(this).closest('li').addClass('active');	
		  var checkElement = $(this).next();
		  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$(this).closest('li').removeClass('active');
			checkElement.slideUp('normal');
		  }
		  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('.verticalmenu ul ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
		  }
		  if($(this).closest('li').find('ul').children().length == 0) {
			return true;
		  } else {
			return false;	
		  }		
		});
	});
} )( jQuery );
