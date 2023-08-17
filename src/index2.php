<?php
use Pusher\Pusher;
require 'vendor/autoload.php';


echo '1234';

// $app_id = 'app-id';
// $app_key = 'app-key';
// $app_secret = 'app-secret';
// $app_cluster = 'eu';

$app_id = '1649499';
$app_key = 'f066590798c8e94ebf1f';
$app_secret = '76eeffc26f650ef00d4d';
$app_cluster = 'eu';
// $app_id = 'app-id';
// $app_key = 'app-key';
// $app_secret = 'app-secret';

$pusher = new Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster,'useTLS'=> TRUE]);

// $pusher = new Pusher($app_key, $app_secret, $app_id, [
//     'host' => '127.0.0.1',
//     'port' => 6001,
//     'scheme' => 'http',
//     'encrypted' => true,
//     'useTLS' => false,
// ]);


$pusher->trigger('my-channel', 'my-event', ['data' => '+-+-+-+-+-+-+-']);