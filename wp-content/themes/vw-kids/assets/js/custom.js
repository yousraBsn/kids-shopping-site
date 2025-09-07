function vw_kids_openNav() {
  jQuery(".sidenav").addClass('show');
}
function vw_kids_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function vw_kids_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const vw_kids_nav = document.querySelector( '.sidenav' );

      if ( ! vw_kids_nav || ! vw_kids_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...vw_kids_nav.querySelectorAll( 'input, a, button' )],
        vw_kids_lastEl = elements[ elements.length - 1 ],
        vw_kids_firstEl = elements[0],
        vw_kids_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && vw_kids_lastEl === vw_kids_activeEl ) {
        e.preventDefault();
        vw_kids_firstEl.focus();
      }

      if ( shiftKey && tabKey && vw_kids_firstEl === vw_kids_activeEl ) {
        e.preventDefault();
        vw_kids_lastEl.focus();
      }
    } );
  }
  vw_kids_keepFocusInMenu();
} )( window, document );



jQuery(function($){
	new WOW().init();
});

(function( $ ) {
	jQuery('document').ready(function($){
	    setTimeout(function () {
    		jQuery("#preloader").fadeOut("slow");
	    },1000);
	});
	
	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});
	$(document).ready(function () {
		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});
		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});
	});	
})( jQuery );

/*sticky copyright*/
window.addEventListener('scroll', function() {
  var sticky = document.querySelector('.copyright-sticky');
  if (!sticky) return;

  var scrollTop = window.scrollY || document.documentElement.scrollTop;
  var windowHeight = window.innerHeight;
  var documentHeight = document.documentElement.scrollHeight;

  var isBottom = scrollTop + windowHeight >= documentHeight-100;

  if (scrollTop >= 100 && !isBottom) {
    sticky.classList.add('copyright-fixed');
  } else {
    sticky.classList.remove('copyright-fixed');
  }
});