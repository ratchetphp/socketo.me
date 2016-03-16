<?php
use Ratchet\ConnectionInterface;

    require __DIR__ . '/../vendor/autoload.php';

class EchoEcho implements \Ratchet\MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $from->send($msg);

        $now = date(DATE_RFC2822);
        $headers = $from->WebSocket->request->getHeader('User-Agent');

        echo "{$now} -- id:{$from->resourceId} -- {$from->remoteAddress} -- {$headers} -- ({$msg})\n";
    }

    public function onClose(ConnectionInterface $conn) {
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}

    $server = \Ratchet\Server\IoServer::factory(
        new \Ratchet\Http\HttpServer(
            new \Ratchet\WebSocket\WsServer(
                new EchoEcho
            )
        ),
        9000
    );

    $server->run();
