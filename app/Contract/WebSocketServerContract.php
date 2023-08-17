<?php

namespace App\Contract;

interface WebSocketServerContract {
    public function startServer();
    public function stopServer();
    public function onMessage();
    public function onOpen();
    public function onClose();
}
