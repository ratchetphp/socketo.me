var Chat = function() {
    var sess;

    var onError = function(error) {
        Debug('Error: ' + error);
    }

    var Debug = function(msg) {
        if (api.debug) {
            console.log(msg);
        }
    }

    var api = {
        events: [
            /**
             * The user has connected to the server
             * @event connected
             */
            'connect'

            /**
             * The user has disconnected from the server
             * @event disconnect
             */
          , 'disconnect'

            /**
             * Crap crap crap!
             * @event error
             * @param string Message from the server
             */
          , 'error'

            /**
             * A new room has been created by another user
             * @event openRoom
             * @param string Room name
             */
          , 'openRoom'

            /**
             * A room has been closed
             * @event closeRoom
             * @param string Room name
             */
          , 'closeRoom'

            /**
             * Another use has joined a room the current user is in
             * @event joinRoom
             * @param string Room name
             * @param string Unique ID of the person who joined
             * @param string Display name of the person who joined (make sure to store this in a lookup)
             */
          , 'joinRoom'

            /**
             * Another use has left one of the rooms this user is in
             * @event leftRoom
             * @param string Room name
             * @param string Unique ID of the person who left
             */
          , 'leftRoom'

            /**
             * A message has been received in one of the chat rooms
             * @event message
             * @param string Room the message is sent to
             * @param string Unique ID of the person who sent the message
             * @param string Message received
             */
          , 'message'
        ]

      , debug: true

      , setName: function(name) {
            // Name can not be longer than 32 characters

            sess.call('setName', name).then(function() {
            }, onError);
        }

      , join: function(room) {
            // check room name is clean
            // No more than 32 characters
            // Must be alpha numeric

            sess.subscribe(room, function(room, msg) {
                Debug({'room': room, 'msg': msg});

                var action = msg.shift();
                msg.unshift(room);

                $(api).trigger(action, msg);
            });
        }

      , leave: function(room) {
            sess.unsubscribe(room);
        }

      , send: function(room, msg) {
            // Message can not be longer than 140 characters

            sess.publish(room, msg);
        }

      , end: function() {
            sess.close();
        }
    }

    $(function() {
        /*
        ab._debug       = true;
        ab._debugrpc    = true;
        ab._debugpubsub = true;
        ab._debugws     = true;
        /**/

        sess = new ab.Session(
            'ws://localhost:8000'
          , function() {
                Debug('Connected!');

                sess.subscribe('ctrl:rooms', function(room, msg) {
                    if (1 == msg[1]) {
                        $(api).trigger('openRoom', [msg[0]]);
                    } else {
                        $(api).trigger('closeRoom', [msg[0]]);
                    }
                });

                $(api).trigger('connect', api);

                api.join('General');
            }
          , function() {
                Debug('Connection closed');
                $(api).trigger('close');
            }
          , {
                'skipSubprotocolCheck': true
            }
        );
    });

    return api;
}();