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


    $(Chat).bind('message', function(room, from, msg) {
        if (focus != room) {
            // update counter
        }

        // create div, put in box
    });

    $(Chat).bind('openChannel', function(room) {
    });

    $(Chat).bind('closeChannel', function(room) {
    });

    $(Chat).bind('leftChannel', function(room, name) {
        // name has left room
    });

    $(Chat).bind('joinChannel', function(room, name) {
        // name has joined room
    });

// Testing code
$(Chat).trigger('openChannel', 'Channel 5');
$(Chat).trigger('message', ['Channel 5', 'Chris', 'Hello World!']);