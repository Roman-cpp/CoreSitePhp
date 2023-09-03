<?php
use Core\Route;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../router/web.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode('/', trim($uri, '/'));



(new Route())->routeProcessing($segments);










// echo 5;
// $pdo = new PDO('mysql:host=db;dbname=test', 'sail', 'password');

// $stmt = $pdo->query('SELECT * FROM users');

// while ($row = $stmt->fetch()) {
//   echo $row['name'];
// }
// require_once __DIR__ . '/vendor/autoload.php';

// use App\Servises\Dom;

// echo __DIR__ . '/vendor/autoload.php';
// echo 'php123';
