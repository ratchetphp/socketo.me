var GUI = function() {
    var Chat;
    var focusRoom = '';

    var Joined = [];
    var Names  = {};

    function createAccordian(room) {
        var roomName = Chat.rooms[room];

        $('<a href="#" class="groupHead" data-channel="' + room + '">' + roomName + '<span class="notifications none">0</span></a><ul class="users"></ul>').appendTo('.rooms');
        $('<div id="' + room + '" class="chatWindow"></div>').prependTo('#colB');
    }

    function createTab(room, roomName) {
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

		$('#chat .active').each(function() {
			$(this).fadeOut();
			$(this).removeClass('active');
		});

		$('#' + channel).fadeIn();
		$('#' + channel).addClass('active');
		focusRoom = channel;
		$('#textbox input').focus();
		objAccordian.children('.notifications').addClass('none').html(0);
    }

    function join(id) {
        if (-1 !== $.inArray(id, Joined)) {
            return false;
        }

        $('li[data-channel="' + id + '"]').addClass('joined');
        $('li[data-channel="' + id + '"] span').html('Leave');

        Chat.join(id);
        createAccordian(id);
        focusChannel(id);

        Joined.push(id);
    }

    function leave(room) {
        $('li[data-channel="' + room + '"]').removeClass('joined');
        $('li[data-channel="' + room + '"] span').html('Join');

        Chat.leave(room);

    	$('#' + room).fadeOut('fast', function() { $(this).remove(); });
    	$('.groupHead[data-channel="' + room + '"]').next('.users').fadeOut('fast', function() { $(this).remove(); });
    	$('.groupHead[data-channel="' + room + '"]').fadeOut('fast', function() { $(this).remove() });

    	delete Joined[$.inArray(room, Joined)];
    }

    $(function() {
    	var listWidth = 0; 

    	$('.groupHead').live('click', function() {
            focusChannel($(this).data('channel'));

    		return false;
    	}); 

    	$('#channelList ul li a').live('click', function() {
        	roomId = $(this).parent('li').data('channel');

        	if (-1 != $.inArray(roomId, Joined)) {
            	leave(roomId);
            } else {
            	join(roomId);
            }

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

            Chat.create(text, function(id, disp) {
                join(id);
            });

    		return false;
    	});

    	status.init();
    	status.update('connecting');

    	$('#giveName input').val($.cookie('name'));

   		$('#giveName').fadeIn(500);
   		$('#channelList').animate({opacity: 0}, 300);
   		$('#chat').animate({opacity: 0}, 300);
   		$('#giveName input').focus();

   		$('#setName').submit(function(e) {
            e.preventDefault();
            var Name = $('#setName input').val();
            $.cookie('name', Name, {domain: '.' + window.location.hostname});

    		$('#giveName input').val('');
    		$('#giveName').fadeOut(300);
    		$('#channelList').animate({opacity: 1}, 500);
    		$('#chat').animate({opacity: 1}, 500);

        	Chat  = new ChatRoom();
    
            $(Chat).bind('connect', function(e) {
                Names[Chat.sessionId] = 'Me';
    
                status.update('online');
    
                Chat.create('General', function(id, display) {
                    join(id);
                });
            });
    
            $(Chat).bind('close', function(e) {
                status.update('error');
            });
    
            $(Chat).bind('message', function(e, room, from, msg, time) {
                if (focusRoom != room) {
                	var number = $('.groupHead[data-channel="' + room + '"] .notifications').html();
                	number = parseInt(number) + 1;
                	$('.groupHead[data-channel="' + room + '"] .notifications').html(number).removeClass('none');
                    // update counter
                }
    
                // create div, put in box
                var isMine = (Chat.sessionId == from ? ' mine' : '');
                $('<div class="comment' + isMine + '"><h2>' + Names[from] + '<br /><span class="timeago" title="' + time + '">' + time + '</span></h2><p>' + msg + '</p></div>').hide().prependTo('#' + room).fadeIn('slow');
                $('.timeago').removeClass('timeago').timeago();
            });
    
            $(Chat).bind('openRoom', function(e, roomId, roomName) {
                createTab(roomId, roomName);
            });
    
            $(Chat).bind('closeRoom', function(e, room) {
            	$('#' + room).fadeOut('fast', function() { $(this).remove(); });
            	$('.groupHead[data-channel="' + room + '"]').next('.users').fadeOut('fast', function() { $(this).remove(); });
            	$('.groupHead[data-channel="' + room + '"]').fadeOut('fast', function() { $(this).remove(); });
            	$('#channelList ul li[data-channel="' + room + '"]').fadeOut('slow', function() { $(this).remove(); });
            });
    
            $(Chat).bind('leftRoom', function(e, room, id) {
                // name has left room
                $('#' + id + room).remove();
            });
    
            $(Chat).bind('joinRoom', function(e, room, id, name) {
                Names[id] = name;
                $('<li id="' + id + room +'"><span>Indicator</span>' + name + '</li>').appendTo($('.groupHead[data-channel="' + room + '"]').next('.users'));
            });
        });
    });
}();