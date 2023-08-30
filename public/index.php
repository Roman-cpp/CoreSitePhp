<?php
echo 5;
$pdo = new PDO('mysql:host=db;dbname=test', 'sail', 'password');

$stmt = $pdo->query('SELECT * FROM users');

while ($row = $stmt->fetch()) {
  echo $row['name'];
}
// require_once __DIR__ . '/vendor/autoload.php';

// use App\Servises\Dom;

// echo __DIR__ . '/vendor/autoload.php';
// echo 'php123';
