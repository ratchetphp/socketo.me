$(function() {
	var listWidth = 0;
	
	$('.groupHead:first').next('.users').slideToggle();
	$('.groupHead:first').addClass('open');
	$('.chatWindow:first').fadeIn();
	$('.chatWindow:first').addClass('active');
	
	$('.groupHead').live('click',function() {
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
		
		return false;
	}); 
	
	$('#channelList ul li').each(function() {
		listWidth = (listWidth + $(this).width()) + 15;
		console.log(listWidth);
		$('#channelList ul').width(listWidth);
	});
	
});


    $(Chat).bind('message', function(e, room, from, msg) {
        if (focus != room) {
            // update counter
        }

        // create div, put in box
        $('<div class="comment"><h2>' + from + '<br /><span>3 min ago</span></h2><p>' + msg + '</p></div>').hide().prependTo('#' + room).fadeIn('slow');
    });

    $(Chat).bind('openChannel', function(e, room, roomName) {
    	$('<a href="#" class="groupHead" data-channel="' + room + '">' + roomName + '</a><ul class="users"></ul>').appendTo('.rooms');
    	$('<div id="' + room + '" class="chatWindow"></div>').prependTo('#colB');
    });

    $(Chat).bind('closeChannel', function(e, room) {
    	$('#' + room).remove();
    	$('.groupHead[data-channel=' + room + ']').next('.users').remove();
    	$('.groupHead[data-channel=' + room + ']').remove();
    });

    $(Chat).bind('leftChannel', function(e, room, id) {
        // name has left room
        $('#' + id + room).remove();
        $('#channelList ul li[data-channel=' + room + ']').removeClass('joined');
    });

    $(Chat).bind('joinChannel', function(e, room, id, name) {
        // name has joined room
        $('<li id="' + id + room +'"><span>Indicator</span>' + name + '</li>').appendTo($('.groupHead[data-channel=' + room + ']').next('.users'));
        $('#channelList ul li[data-channel=' + room + ']').addClass('joined');
    });

// Testing code
//$(Chat).trigger('message', ['channel1', 'Jon Rundle', 'Testing this out']);
//$(Chat).trigger('openChannel', ['channel5', 'Channel 5']);
//$(Chat).trigger('closeChannel', ['channel1']);
//$(Chat).trigger('leftChannel', ['channel1', '1']);
//$(Chat).trigger('joinChannel', ['channel1', '1', 'Chris']);