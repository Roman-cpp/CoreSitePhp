<?php

namespace App\servises;
use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;


class WebSocketServerServises implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $conn)
    {
        echo 'opne';
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        echo $msg;
    }

    public function onClose(ConnectionInterface $conn)
    {
        echo 'close';
    }

    public function onError(ConnectionInterface $conn, Exception $e)
    {
        echo 'error';
    }
}
