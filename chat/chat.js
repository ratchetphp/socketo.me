var GUI = function() {
    var focusRoom = '';

    function createAccordian(roomName) {
        var room = roomName; // Keep here, will change API to pass a room ID at a later point

        $('<a href="#" class="groupHead" data-channel="' + room + '">' + roomName + '<span class="notifications none">0</span></a><ul class="users"></ul>').appendTo('.rooms');
        $('<div id="' + room + '" class="chatWindow"></div>').prependTo('#colB');
    }

    function createTab(roomName) {
        var room = roomName; // Keep here, will change API to pass a room ID at a later point

        $('<li data-channel="' + room + '"><a href="#">' + roomName + '<span>Join</span></a></li>').hide().prependTo('#channelList ul').fadeIn('slow');
    }

    var status = function() {
        var btnStatus;

        return {
            init: function() {
                btnStatus = $('#chat-status');
            }

          , update: function(status) {
                btnStatus.removeClass().addClass('btn');

                switch (status) {
                    case 'online':
                        btnStatus.addClass('btn-success').html('Online');
                    break;
                    case 'connecting':
                        btnStatus.addClass('btn-warning').html('Connecting');
                    break;
                    case 'offline':
                        btnStatus.addClass('btn-inverse').html('Offline');
                    break;
                    case 'error':
                        btnStatus.addClass('btn-danger').html('Offline');
                    break;
                }
            }
        }
    }();

    function focusChannel(channel) {
        var objAccordian = $('.groupHead[data-channel="' + channel + '"]');

		$('.groupHead').each(function() {
			$('.open').next('.users').slideUp();
			$('.open').removeClass('open');
		});

		$(objAccordian).next('.users').slideToggle();
		$(objAccordian).toggleClass('open');

		$('.active').each(function() {
			$(this).fadeOut();
			$(this).removeClass('active');
		});

		$('#' + channel).fadeIn();
		$('#' + channel).addClass('active');
		focusRoom = channel;
		$('#textbox input').focus();
		$(this).children('.notifications').addClass('none').html(0);
    }

    function join(id) {
    }

    $(function() {
    	var listWidth = 0; 

    	$('.groupHead').live('click', function() {
            focusChannel($(this).attr('data-channel'));

    		return false;
    	}); 

    	$('#channelList ul li a').live('click', function() {
    		$(this).parent('li').addClass('joined');

            var id = $(this).parent('li').data('channel');

            Chat.join(id);
            createAccordian(id);

            focusChannel(id);

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

    	status.init();
    	status.update('connecting');
    	var Chat  = new ChatRoom();

        $(Chat).bind('connect', function(e) {
            Chat.join('General');
            createAccordian('General');
            focusChannel('General');
            status.update('online');
        });

        $(Chat).bind('close', function(e) {
            status.update('error');
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
    });

}();

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
