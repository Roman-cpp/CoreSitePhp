<?php



require __DIR__ . '/vendor/autoload.php';

echo 'start';

use App\Servises\WebSocketServerServises;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new WebSocketServerServises()
        )
    ),
    8080
);

$server->run();
