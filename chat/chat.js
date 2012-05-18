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


    $(Chat).bind('message', function(e, room, from, msg) {
        if (focus != room) {
            // update counter
        }

        // create div, put in box
    });

    $(Chat).bind('openChannel', function(e, room, roomName) {
    	$('<a href="#" class="groupHead" data-channel="' + room + '">' + roomName + '</a>').appendTo('.rooms');
    });

    $(Chat).bind('closeChannel', function(e, room) {
    	$('#' + room).remove();
    	$('.groupHead[data-channel=' + room + ']').next('.users').remove();
    	$('.groupHead[data-channel=' + room + ']').remove();
    });

    $(Chat).bind('leftChannel', function(e, room, id) {
        // name has left room
        $('#' + id + room).remove();
    });

    $(Chat).bind('joinChannel', function(e, room, id, name) {
        // name has joined room
        $('<li id="' + id + room +'"><span>Indicator</span>' + name + '</li>').appendTo($('.groupHead[data-channel=' + room + ']').next('.users'));
    });

// Testing code
//$(Chat).trigger('openChannel', ['channel5', 'Channel 5']);
//$(Chat).trigger('closeChannel', ['channel1']);
//$(Chat).trigger('leftChannel', ['channel1', '1']);
//$(Chat).trigger('joinChannel', ['channel1', '1', 'Chris']);