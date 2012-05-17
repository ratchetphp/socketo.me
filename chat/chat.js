$(function() {
	$('.groupHead:first').next('.users').slideToggle();
	$('.groupHead:first').addClass('open');
	$('.chatWindow:first').fadeIn();
	$('.chatWindow:first').addClass('active');
	
	$('.groupHead').click(function() {
		$('.groupHead').each(function() {
			$('.open').next('.users').slideUp();
			$('.open').removeClass('open');
		});
		$(this).next('.users').slideToggle();
		$(this).toggleClass('open');
		
		$('.active').each(function() {
			$(this).fadeOut();
			$(this).removeClass('active');
		});
		var channel = $(this).attr('data-channel');
		$('#' + channel).fadeIn();
		$('#' + channel).addClass('active');
	}); 
});