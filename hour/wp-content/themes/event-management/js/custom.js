jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'                        
	});

});

function event_management_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function event_management_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

var event_management_Keyboard_loop = function (elem) {

    var event_management_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var event_management_firstTabbable = event_management_tabbable.first();
    var event_management_lastTabbable = event_management_tabbable.last();
    /*set focus on first input*/
    event_management_firstTabbable.focus();

    /*redirect last tab to first input*/
    event_management_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            event_management_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    event_management_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            event_management_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){
	$('.mobiletoggle').click(function () {
        event_management_Keyboard_loop($('.menu-brand.primary-nav'));
    });
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});

// sticky header
(function( $ ) {

    $(window).scroll(function(){
        var sticky = $('.sticky-header'),
        scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass('fixed-header');
        else sticky.removeClass('fixed-header');
    });

})( jQuery );