#!/usr/bin/env php
<?php
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Server\EchoServer;

    require __DIR__ . '/../vendor/autoload.php';

    $server = IoServer::factory(new WsServer(new EchoServer), 8080);
    $server->run();
