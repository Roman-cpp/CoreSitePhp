<?php

namespace Core;

use Core\Model\CollectionDB;

class Model
{
    private string $nameTable;
    private array $attributes;
    
    public function all(): CollectionDB
    {
        // $pdo = new PDO('mysql:host=db;dbname=test', 'sail', 'password');
        // $stmt = $pdo->query('SELECT * FROM users');
        // while ($row = $stmt->fetch()) {
        //       dump($row['name']);
        //     }

        return new CollectionDB;
    }
}
