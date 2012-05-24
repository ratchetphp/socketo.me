var focusRoom = '';

function createAccordian(roomName) {
    var room = roomName; // Keep here, will change API to pass a room ID at a later point

    $('<a href="#" class="groupHead" data-channel="' + room + '">' + roomName + '<span class="notifications none">0</span></a><ul class="users"></ul>').appendTo('.rooms');
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
		$('#textbox input').focus();
		$(this).children('.notifications').addClass('none').html(0);
		
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
		$('#create').fadeIn(500);
		$('#channelList').animate({opacity: 0}, 300);
		$('#chat').animate({opacity: 0}, 300);
		$('#createRoom input').focus();
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
	
	$('#createRoom').submit(function() {
		var text = $('#createRoom input').val();
		$('#createRoom input').val('');
		$('#create').fadeOut(300);
		$('#channelList').animate({opacity: 1}, 500);
		$('#chat').animate({opacity: 1}, 500);
		Chat.join(text);
		return false;
	});
	
});

    $(Chat).bind('connect', function(e) {
        Chat.join('General');
        createAccordian('General');
    });

    $(Chat).bind('message', function(e, room, from, msg) {
        if (focusRoom != room) {
        	var number = $('.groupHead[data-channel=' + room + '] .notifications').html();
        	number = parseInt(number) + 1;
        	$('.groupHead[data-channel=' + room + '] .notifications').html(number).removeClass('none');
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
$(Chat).trigger('inRoom', ['Room Name', [{'uid12345':'Chris'}]]);
$(Chat).trigger('message', ['Room Name', 'uid12345', 'Hello World!']);
*/
