<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Domd;
use Core\Route;

// echo __DIR__ . '/vendor/autoload.php';
// echo 'php123';

// $pusher = new Pusher\Pusher('app-key', 'app-secret', 'app-id', [
//     'host' => '127.0.0.1',
//     'port' => 6001,
//     'scheme' => 'http',
//     'encrypted' => true,
//     'useTLS' => false,
// ]);

// $pusher->trigger('my-channel', 'my_event', ['m' => 'ddf', 'test' => 'sdf']);

$d = new WebSocket();

$d->sendData(['adf' => 'dsf', 'sdfasf' => '2222']);
(new Route())->get();

Class WebSocket {
    private $connect;
    public function __construct()
    {
        $this->connect = new Pusher\Pusher('app-key', 'app-secret', 'app-id', [
            'host' => '127.0.0.1',
            'port' => 6001,
            'scheme' => 'http',
            'encrypted' => true,
            'useTLS' => false,
        ]);
    }

    public function sendData(array $data)
    {
        $this->connect->trigger('my-channel', 'my_event', $data);
    }
}
