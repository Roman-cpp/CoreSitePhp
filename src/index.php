<?php

//require 'vendor/autoload.php';


//class WebSocketServerTest
//{
//    private $clients = []; // Массив подключенных клиентов
    // private $connects = [];
    // private $server = null;

    // // Функция запуска сервера
    // public function run($host, $port)
    // {
    //     $server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    //     socket_bind($server, $host, $port);
    //     socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1);
    //     socket_listen($server);
    //     echo "Сервер запущен: $host:$port\n";

    //     $this->server = $server;

    //     //$this->clients[] = $server;

    //     while (true) {
    //         $read = $this->connects;
    //         $read[] = $this->server;
    //         $write = null;
    //         $except = null;


            //$changed = $this->clients;
            // if(!socket_select($read, $write, $except, null)) {
            //     break;
            // }

            // if (in_array($this->server, $read)) {//есть новое соединение
            //     $connect = stream_socket_accept($server, 20);//принимаем новое соединение
            //     $this->connects[] = $connect;//добавляем его в список необходимых для обработки
            //     unset($read[ array_search($this->server, $read) ]);

            // }

            // foreach($read as $connect) {//обрабатываем все соединения
         
            //     unset($connects[ array_search($connect, $this->connects) ]);
            // }

            // foreach ($changed as $socket) {
            //     // Если новое подключение
            //     if ($socket === $server) {
            //         $client = socket_accept($server);
            //         $this->clients[] = $client;
            //         echo 'ad';
            //         $this->send($client, 'Добро пожаловать на сервер!');
            //     } else {
            //         // Принимаем данные от клиента
            //         $bytes = socket_recv($socket, $data, 2048, 0);
            //         if ($bytes === 0) {
            //             // Если клиент отключился, удаляем его из списка
            //             $index = array_search($socket, $this->clients);
            //             unset($this->clients[$index]);
            //             socket_close($socket);
            //         } else {
            //             $this->sendToAll($data);
            //         }
            //     }
            // }
//         }
//     }

//     // Функция отправки сообщения клиенту
//     private function send($client, $message)
//     {
//         socket_write($client, $message, strlen($message));
//     }

//     // Функция отправки сообщения всем клиентам
//     private function sendToAll($message)
//     {
//         foreach ($this->clients as $client) {
//             // if ($client !== $server) {
//             //     $this->send($client, $message);
//             // }
//             $this->send($client, $message);
//         }
//     }
// }

// // Запускаем сервер
// $server = new WebSocketServerTest();
// $server->run('localhost', 6025);



// error_reporting(E_ALL);

// /* Позволяет скрипту ожидать соединения бесконечно. */
// set_time_limit(0);

// /* Включает скрытое очищение вывода так, что мы видим данные
//  * как только они появляются. */
// ob_implicit_flush();

// $address = 'localhost';
// $port = 6020;

// if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
//     echo "Не удалось выполнить socket_create(): причина: " . socket_strerror(socket_last_error()) . "\n";
// }

// if (socket_bind($sock, $address, $port) === false) {
//     echo "Не удалось выполнить socket_bind(): причина: " . socket_strerror(socket_last_error($sock)) . "\n";
// }

// if (socket_listen($sock, 5) === false) {
//     echo "Не удалось выполнить socket_listen(): причина: " . socket_strerror(socket_last_error($sock)) . "\n";
// }

// do {
//     if (($msgsock = socket_accept($sock)) === false) {
//         echo "Не удалось выполнить socket_accept(): причина: " . socket_strerror(socket_last_error($sock)) . "\n";
//         break;
//     }
//     /* Отправляем инструкции. */
//     $msg = "\nДобро пожаловать на тестовый сервер PHP. \n" .
//         "Чтобы отключиться, наберите 'выход'. Чтобы выключить сервер, наберите 'выключение'.\n";
//     socket_write($msgsock, $msg, strlen($msg));

//     do {
//         if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
//             echo "Не удалось выполнить socket_read(): причина: " . socket_strerror(socket_last_error($msgsock)) . "\n";
//             break 2;
//         }
//         if (!$buf = trim($buf)) {
//             continue;
//         }
//         if ($buf == 'выход') {
//             break;
//         }
//         if ($buf == 'выключение') {
//             socket_close($msgsock);
//             break 2;
//         }
//         $talkback = "PHP: Вы сказали '$buf'.\n";
//         socket_write($msgsock, $talkback, strlen($talkback));
//         echo "$buf\n";
//     } while (true);
//     socket_close($msgsock);
// } while (true);

// socket_close($sock); #}


// function SocketServer($limit = 0) {
//     $starttime = time();
//     echo 'SERVER START' . PHP_EOL;

//     echo 'Socket create...' . PHP_EOL;
//     $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

//     if (false === $socket) {
//         die('Error: ' . socket_strerror(socket_last_error()) . PHP_EOL);
//     }

//     echo 'Socket bind...' . PHP_EOL;
//     $bind = socket_bind($socket, '127.0.0.1', 7777); // привязываем к ip и порту
//     if (false === $bind) {
//         die('Error: ' . socket_strerror(socket_last_error()) . PHP_EOL);
//     }

//     echo 'Set options...' . PHP_EOL;
//     // разрешаем использовать один порт для нескольких соединений
//     $option = socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
//     if (false === $option) {
//         die('Error: ' . socket_strerror(socket_last_error()) . PHP_EOL);
//     }

//     echo 'Listening socket...' . PHP_EOL;
//     $listen = socket_listen($socket); // слушаем сокет
//     if (false === $listen) {
//         die('Error: ' . socket_strerror(socket_last_error()) . PHP_EOL);
//     }

//     while (true) { // бесконечный цикл ожидания подключений
//         echo 'Waiting for connections...' . PHP_EOL;
//         $connect = socket_accept($socket); // зависаем, пока не получим ответа
//         if ($connect !== false) {
//             echo 'Client connected...' . PHP_EOL;
//             echo 'Send message to client...' . PHP_EOL;
//             socket_write($connect, 'Hello, Client!');
//         } else {
//             echo 'Error: ' . socket_strerror(socket_last_error()) . PHP_EOL;
//             usleep(1000);
//         }

//         // останавливаем сервер после $limit секунд
//         if ($limit && (time() - $starttime > $limit)) {
//             echo 'Closing connection...' . PHP_EOL;
//             socket_close($socket);
//             echo 'SERVER STOP' . PHP_EOL;
//             return;
//         }
//     }
// }

// error_reporting(E_ALL); // выводим все ошибки и предупреждения
// set_time_limit(0);      // бесконечное время работы скрипта
// ob_implicit_flush();    // включаем вывод без буферизации

// // Запускаем сервер в работу, завершение работы через 60 секунд
// SocketServer(60);


class WebSocketServer {

    /**
     * Функция вызывается, когда получено сообщение от клиента
     */
    public $handler;

    /**
     * IP адрес сервера
     */
    private $ip;
    /**
     * Порт сервера
     */
    private $port;
    /**
     * Сокет для принятия новых соединений, прослушивает указанный порт
     */
    private $connection;
    /**
     * Для хранения всех подключений, принятых слушающим сокетом
     */
    private $connects;

    /**
     * Ограничение по времени работы сервера
     */
    private $timeLimit = 0;
    /**
     * Время начала работы сервера
     */
    private $startTime;
    /**
     * Выводить сообщения в консоль?
     */
    private $verbose = false;
    /**
     * Записывать сообщения в log-файл?
     */
    private $logging = false;
    /**
     * Имя log-файла
     */
    private $logFile = 'ws-log.txt';
    /**
     * Ресурс log-файла
     */
    private $resource;


    public function __construct($ip = '127.0.0.1', $port = 7777) {
        $this->ip = $ip;
        $this->port = $port;

        // эта функция вызывается, когда получено сообщение от клиента;
        // при создании экземпляра класса должна быть переопределена
        $this->handler = function($connection, $data) {
            $message = '[' . date('r') . '] Получено сообщение от клиента: ' . $data . PHP_EOL;
            if ($this->verbose) {
                echo $message;
            }
            if ($this->logging) {
                fwrite($this->resource, $message);
            }
        };
    }

    public function __destruct() {
        if (is_resource($this->connection)) {
            $this->stopServer();
        }
        if ($this->logging) {
            fclose($this->resource);
        }
    }

    /**
     * Дополнительные настройки для отладки
     */
    public function settings($timeLimit = 0, $verbose = false, $logging = false, $logFile = 'ws-log.txt') {
        $this->timeLimit = $timeLimit;
        $this->verbose = $verbose;
        $this->logging = $logging;
        $this->logFile = $logFile;
        if ($this->logging) {
            $this->resource = fopen($this->logFile, 'a');
        }
    }

    /**
     * Выводит сообщение в консоль и/или записывает в лог-файл
     */
    private function debug($message) {
        $message = '[' . date('r') . '] ' . $message . PHP_EOL;
        if ($this->verbose) {
            echo $message;
        }
        if ($this->logging) {
            fwrite($this->resource, $message);
        }
    }

    /**
     * Отправляет сообщение клиенту
     */
    public static function response($connect, $data) {
        socket_write($connect, self::encode($data));
    }

    /**
     * Запускает сервер в работу
     */
    public function startServer() {

        $this->debug('Try start server...');

        $this->connection = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if (false === $this->connection) {
            $this->debug('Error socket_create(): ' . socket_strerror(socket_last_error()));
            return;
        }

        $bind = socket_bind($this->connection, $this->ip, $this->port); // привязываем к ip и порту
        if (false === $bind) {
            $this->debug('Error socket_bind(): ' . socket_strerror(socket_last_error()));
            return;
        }

        // разрешаем использовать один порт для нескольких соединений
        $option = socket_set_option($this->connection, SOL_SOCKET, SO_REUSEADDR, 1);
        if (false === $option) {
            $this->debug('Error socket_set_option(): ' . socket_strerror(socket_last_error()));
            return;
        }

        $listen = socket_listen($this->connection); // слушаем сокет
        if (false === $listen) {
            $this->debug('Error socket_listen(): ' . socket_strerror(socket_last_error()));
            return;
        }

        $this->debug('Server is running...');

        $this->connects = array($this->connection);
        $this->startTime = time();

        while (true) {

            $this->debug('Waiting for connections...');

            // создаем копию массива, так что массив $this->connects не будет изменен функцией socket_select()
            $read = $this->connects;
            $write = $except = null;

            /*
             * Сокет $this->connection только прослушивает порт на предмет новых соединений. Как только поступило
             * новое соединение, мы создаем новый ресурс сокета с помощью socket_accept() и помещаем его в массив
             * $this->connects для дальнейшего чтения из него.
             */

            if ( ! socket_select($read, $write, $except, null)) { // ожидаем сокеты, доступные для чтения (без таймаута)
                break;
            }

            // если слушающий сокет есть в массиве чтения, значит было новое соединение
            if (in_array($this->connection, $read)) {
                // принимаем новое соединение и производим рукопожатие
                if (($connect = socket_accept($this->connection)) && $this->handshake($connect)) {
                    $this->debug('New connection accepted');
                    $this->connects[] = $connect; // добавляем его в список необходимых для обработки
                }
                // удаляем слушающий сокет из массива для чтения
                unset($read[ array_search($this->connection, $read) ]);
            }

            foreach ($read as $connect) { // обрабатываем все соединения, в которых есть данные для чтения
                $data = socket_read($connect, 100000);
                $decoded = self::decode($data);
                // если клиент не прислал данных или хочет разорвать соединение
                if (false === $decoded || 'close' === $decoded['type']) {
                    $this->debug('Connection closing');
                    socket_write($connect, self::encode('  Closed on client demand', 'close'));
                    socket_shutdown($connect);
                    socket_close($connect);
                    unset($this->connects[ array_search($connect, $this->connects) ]);
                    $this->debug('Closed successfully');
                    continue;
                }
                // получено сообщение от клиента, вызываем пользовательскую
                // функцию, чтобы обработать полученные данные
                if (is_callable($this->handler)) {
                    call_user_func($this->handler, $connect, $decoded['payload']);
                }
            }

            // если истекло ограничение по времени, останавливаем сервер
            if ($this->timeLimit && time() - $this->startTime > $this->timeLimit) {
                $this->debug('Time limit. Stopping server.');
                $this->stopServer();
                return;
            }

        }

    }

    /**
     * Останавливает работу сервера
     */
    public function stopServer() {
        // закрываем слушающий сокет
        socket_close($this->connection);
        if (!empty($this->connects)) { // отправляем все клиентам сообщение о разрыве соединения
            foreach ($this->connects as $connect) {
                if (is_resource($connect)) {
                    socket_write($connect, self::encode('  Closed on server demand', 'close'));
                    socket_shutdown($connect);
                    socket_close($connect);
                }
            }
        }
    }

    /**
     * Для кодирования сообщений перед отправкой клиенту
     */
    private static function encode($payload, $type = 'text', $masked = false) {
        $frameHead = array();
        $payloadLength = strlen($payload);

        switch ($type) {
            case 'text':
                // first byte indicates FIN, Text-Frame (10000001):
                $frameHead[0] = 129;
                break;
            case 'close':
                // first byte indicates FIN, Close Frame(10001000):
                $frameHead[0] = 136;
                break;
            case 'ping':
                // first byte indicates FIN, Ping frame (10001001):
                $frameHead[0] = 137;
                break;
            case 'pong':
                // first byte indicates FIN, Pong frame (10001010):
                $frameHead[0] = 138;
                break;
        }

        // set mask and payload length (using 1, 3 or 9 bytes)
        if ($payloadLength > 65535) {
            $payloadLengthBin = str_split(sprintf('%064b', $payloadLength), 8);
            $frameHead[1] = ($masked === true) ? 255 : 127;
            for ($i = 0; $i < 8; $i++) {
                $frameHead[$i + 2] = bindec($payloadLengthBin[$i]);
            }
            // most significant bit MUST be 0
            if ($frameHead[2] > 127) {
                return array('type' => '', 'payload' => '', 'error' => 'frame too large (1004)');
            }
        } elseif ($payloadLength > 125) {
            $payloadLengthBin = str_split(sprintf('%016b', $payloadLength), 8);
            $frameHead[1] = ($masked === true) ? 254 : 126;
            $frameHead[2] = bindec($payloadLengthBin[0]);
            $frameHead[3] = bindec($payloadLengthBin[1]);
        } else {
            $frameHead[1] = ($masked === true) ? $payloadLength + 128 : $payloadLength;
        }

        // convert frame-head to string:
        foreach (array_keys($frameHead) as $i) {
            $frameHead[$i] = chr($frameHead[$i]);
        }
        if ($masked === true) {
            // generate a random mask:
            $mask = array();
            for ($i = 0; $i < 4; $i++) {
                $mask[$i] = chr(rand(0, 255));
            }
            $frameHead = array_merge($frameHead, $mask);
        }
        $frame = implode('', $frameHead);

        // append payload to frame:
        for ($i = 0; $i < $payloadLength; $i++) {
            $frame .= ($masked === true) ? $payload[$i] ^ $mask[$i % 4] : $payload[$i];
        }

        return $frame;
    }

    /**
     * Для декодирования сообщений, полученных от клиента
     */
    private static function decode($data) {
        if ( ! strlen($data)) {
            return false;
        }

        $unmaskedPayload = '';
        $decodedData = array();

        // estimate frame type:
        $firstByteBinary = sprintf('%08b', ord($data[0]));
        $secondByteBinary = sprintf('%08b', ord($data[1]));
        $opcode = bindec(substr($firstByteBinary, 4, 4));
        $isMasked = ($secondByteBinary[0] == '1') ? true : false;
        $payloadLength = ord($data[1]) & 127;

        // unmasked frame is received:
        if (!$isMasked) {
            return array('type' => '', 'payload' => '', 'error' => 'protocol error (1002)');
        }

        switch ($opcode) {
            // text frame:
            case 1:
                $decodedData['type'] = 'text';
                break;
            case 2:
                $decodedData['type'] = 'binary';
                break;
            // connection close frame:
            case 8:
                $decodedData['type'] = 'close';
                break;
            // ping frame:
            case 9:
                $decodedData['type'] = 'ping';
                break;
            // pong frame:
            case 10:
                $decodedData['type'] = 'pong';
                break;
            default:
                return array('type' => '', 'payload' => '', 'error' => 'unknown opcode (1003)');
        }

        if ($payloadLength === 126) {
            $mask = substr($data, 4, 4);
            $payloadOffset = 8;
            $dataLength = bindec(sprintf('%08b', ord($data[2])) . sprintf('%08b', ord($data[3]))) + $payloadOffset;
        } elseif ($payloadLength === 127) {
            $mask = substr($data, 10, 4);
            $payloadOffset = 14;
            $tmp = '';
            for ($i = 0; $i < 8; $i++) {
                $tmp .= sprintf('%08b', ord($data[$i + 2]));
            }
            $dataLength = bindec($tmp) + $payloadOffset;
            unset($tmp);
        } else {
            $mask = substr($data, 2, 4);
            $payloadOffset = 6;
            $dataLength = $payloadLength + $payloadOffset;
        }

        /**
         * We have to check for large frames here. socket_recv cuts at 1024 bytes
         * so if websocket-frame is > 1024 bytes we have to wait until whole
         * data is transferd.
         */
        if (strlen($data) < $dataLength) {
            return false;
        }

        if ($isMasked) {
            for ($i = $payloadOffset; $i < $dataLength; $i++) {
                $j = $i - $payloadOffset;
                if (isset($data[$i])) {
                    $unmaskedPayload .= $data[$i] ^ $mask[$j % 4];
                }
            }
            $decodedData['payload'] = $unmaskedPayload;
        } else {
            $payloadOffset = $payloadOffset - 4;
            $decodedData['payload'] = substr($data, $payloadOffset);
        }

        return $decodedData;
    }

    /**
     * «Рукопожатие», т.е. отправка заголовков согласно протоколу WebSocket
     */
    private function handshake($connect) {

        $info = array();

        $data = socket_read($connect, 1000);
        $lines = explode("\r\n", $data);
        foreach ($lines as $i => $line) {
            if ($i) {
                if (preg_match('/\A(\S+): (.*)\z/', $line, $matches)) {
                    $info[$matches[1]] = $matches[2];
                }
            } else {
                $header = explode(' ', $line);
                $info['method'] = $header[0];
                $info['uri'] = $header[1];
            }
            if (empty(trim($line))) break;
        }

        // получаем адрес клиента
        $ip = $port = null;
        if ( ! socket_getpeername($connect, $ip, $port)) {
            return false;
        }
        $info['ip'] = $ip;
        $info['port'] = $port;

        if (empty($info['Sec-WebSocket-Key'])) {
            return false;
        }

        // отправляем заголовок согласно протоколу вебсокета
        $SecWebSocketAccept = 
            base64_encode(pack('H*', sha1($info['Sec-WebSocket-Key'] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
        $upgrade = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
                   "Upgrade: websocket\r\n" .
                   "Connection: Upgrade\r\n" .
                   "Sec-WebSocket-Accept:".$SecWebSocketAccept."\r\n\r\n";
        socket_write($connect, $upgrade);

        return true;

    }

}

error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

$server = new WebSocketServer('127.0.0.1', 7779);
// максимальное время работы 100 секунд, выводить сообщения в консоль
$server->settings(100, true);

// эта функция вызывается, когда получено сообщение от клиента
$server->handler = function($connect, $data) {
    // полученные от клиента данные отправляем обратно
    WebSocketServer::response($connect, $data . '----------');
};

$server->startServer();