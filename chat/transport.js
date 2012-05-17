var Chat = function() {
    var sess;

    var onRoom = function(room, msg) {
        Debug({'room': room, 'msg': msg});
    }

    var onMessage = function(room, msg) {
        Debug({'room': room, 'msg': msg});

        $(api).trigger('message', {'room': room, 'msg': msg});
    }

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
             * @event connected
             * @param Chat
             */
            'connect'

            /**
             * @event message
             * @param string Room the message is sent to
             * @param string Name of the person who sent the message
             * @param string Message received
             */
          , 'message'

            /**
             * @event disconnect
             */
          , 'disconnect'


            /**
             * @event error
             * @param string Message from the server
             */
          , 'error'

            /**
             * @event openChannel
             * @param string Name of the room
             */
          , 'openChannel'

            /**
             * @event closeChannel
             * @param string Name of the channel closing
             */
          , 'closeChannel'

            /**
             * @event leftChannel
             * @param string Name of the person who left
             * @param string Name of the channel
             */
          , 'leftChannel'
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

            sess.subscribe(room, onMessage);
        }

      , leave: function(room) {
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

                sess.subscribe('ctrl:channels', onRoom);

                $(api).trigger('connect', api);
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