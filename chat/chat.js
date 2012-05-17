$(function() {
	$('.groupHead:first').next('.users').slideToggle();
	$('.groupHead:first').addClass('open');
	
	$('.groupHead').click(function() {
		$(this).next('.users').slideToggle();
		$(this).toggleClass('open');
	}); 
});