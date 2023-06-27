
$(document).ready(function(){
	$('#loader').fadeOut(); //To fade out the loading animation
	$('#preloader').delay(300).fadeOut('slow'); //fade out the page covering colour;
	$('#body').delay(300).css({'overflow': 'visible'});
})