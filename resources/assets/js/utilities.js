/*--------------------------
	"Back to Top" Button
--------------------------*/
var amountScrolled = 300;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('#backToTop').fadeIn('slow');
	} else {
		$('#backToTop').fadeOut('slow');
	}
});

$('#backToTop').click(function() {
	$('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});
