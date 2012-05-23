var focusRoom = '';

function createAccordian(roomName) {
    var room = roomName; // Keep here, will change API to pass a room ID at a later point

    $('<a href="#" class="groupHead" data-channel="' + room + '">' + roomName + '</a><ul class="users"></ul>').appendTo('.rooms');
    $('<div id="' + room + '" class="chatWindow"></div>').prependTo('#colB');
}

function createTab(roomName) {
    var room = roomName; // Keep here, will change API to pass a room ID at a later point

    $('<li data-channel="' + roomName + '"><a href="#">' + roomName + '<span>Join</span></a></li>').hide().prependTo('#channelList ul').fadeIn('slow');
}

$(function() {
	var listWidth = 0; 
	
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
		focusRoom = channel;
		
		return false;
	}); 
	
	$('#channelList ul li a').live('click', function() {
		$(this).parent('li').addClass('joined');

        var id = $(this).parent('li').data('channel');

        Chat.join(id);
        createAccordian(id);

		return false;
	});
	
	$('.add').live('click',function() {
		Chat.join('Testing');
		return false;
	});
	
	$('#channelList ul li').each(function() {
		listWidth = (listWidth + $(this).width()) + 15;
		console.log(listWidth);
		$('#channelList ul').width(listWidth);
	});
	
	$('#textbox').submit(function() {
		var text = $('#textbox input').val();
		Chat.send(focusRoom, text);
		$('#textbox input').val('');
		return false;
	});
	
});

    $(Chat).bind('connect', function(e) {
        Chat.join('General');
        createAccordian('General');
    });

    $(Chat).bind('message', function(e, room, from, msg) {
        if (focus != room) {
            // update counter
        }

        // create div, put in box
        $('<div class="comment"><h2>' + from + '<br /><span>3 min ago</span></h2><p>' + msg + '</p></div>').hide().prependTo('#' + room).fadeIn('slow');
    });

    $(Chat).bind('openRoom', function(e, roomName) {
        createTab(roomName);
    });

    $(Chat).bind('closeRoom', function(e, room) {
    	$('#' + room).remove();
    	$('.groupHead[data-channel=' + room + ']').next('.users').remove();
    	$('.groupHead[data-channel=' + room + ']').remove();
    });

    $(Chat).bind('leftRoom', function(e, room, id) {
        // name has left room
        $('#' + id + room).remove();
    });

    $(Chat).bind('joinRoom', function(e, room, id, name) {
        // name has joined room
        $('<li id="' + id + room +'"><span>Indicator</span>' + name + '</li>').appendTo($('.groupHead[data-channel=' + room + ']').next('.users'));
    });

// Testing code
/*
$(Chat).trigger('connect');
$(Chat).trigger('disconnect');
$(Chat).trigger('error', ['An error has occurred!']);
$(Chat).trigger('openRoom', ['Room Name']);
$(Chat).trigger('closeRoom', ['Room Name']);
$(Chat).trigger('joinRoom', ['Room Name', 'uid12345', 'Chris']);
$(Chat).trigger('leftRoom', ['Room Name', 'uid12345']);
$(Chat).trigger('message', ['Room Name', 'uid12345', 'Hello World!']);
*/
