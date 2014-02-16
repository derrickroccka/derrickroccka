/**
*
* Forcing 100% height of each section
* @author Derrick Roccka
**/
fillWindow();

$(window).resize(function() {
	fillWindow();
});

/**
*
* Smooth scrolling for sections
* @author Derrick Roccka
**/
$('.smooth').on('click', smoothScroll);

/*===============================
=            FUNCTIONS            =
===============================*/

function fillWindow(){
	//will fill window if min-height is lower than window.innerHeight
	$('.section').css('min-height', window.innerHeight+'px').css('height', 'auto');
}

function smoothScroll(e) {
    var $link = $(this);
    var anchor  = $link.attr('href');
    $('html, body').stop().animate({
        scrollTop: $(anchor).offset().top
    }, 2000);
}

/*-----  End of FUNCTIONS  ------*/