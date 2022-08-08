<?php
use Ratchet\App;
use Ratchet\Wamp\ServerProtocol;

use Ratchet\Website\Chat\Bot;
use Ratchet\Website\Chat\ChatRoom;
use Ratchet\Website\MessageLogger;

use React\EventLoop\Loop;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

    // Composer: The greatest thing since sliced bread
    require dirname(__DIR__) . '/vendor/autoload.php';

    $host = 'socketo.me';
    if (file_exists(__DIR__ . '/config.php')) {
        require __DIR__ . '/config.php';
    }

    // Setup logging
    $stdout = new StreamHandler('php://stdout');
    $logout = new Logger('SockOut');
    $login  = new Logger('Sock-In');
    $login->pushHandler($stdout);
    $logout->pushHandler($stdout);

    $app = new App($host, 8080, '0.0.0.0');
    $app->route('/chat',
        new MessageLogger(       // Log events in case of "oh noes"
            new ServerProtocol(  // WAMP; the new hotness sub-protocol
                new Bot(         // People kept asking me if I was a bot, so I made one!
                    new ChatRoom // ...and DISCUSS!
                )
            )
            , $login
            , $logout
        )
    );

    Loop::addSignal(SIGINT, $func = function ($signal) use (&$func) {
        echo 'Received signal: ', (string)$signal, PHP_EOL;

        Loop::removeSignal(SIGINT, $func);
        Loop::get()->stop();
    });
    Loop::addSignal(SIGTERM, $func = function ($signal) use (&$func) {
        echo 'Received signal: ', (string)$signal, PHP_EOL;

        Loop::removeSignal(SIGTERM, $func);
        Loop::get()->stop();
    });

    // GO GO GO!
    $app->run();
