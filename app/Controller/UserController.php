<?php

namespace App\Controller;
use Core\Controller;
use Core\Controller\Trait\View;
use Core\DB;

class UserController
{
    use View;
    public function index()
    {
        echo 3;
        //DB::showTable('users');
        //dd('user', $_ENV['DB_USERNAME']);
        echo '<dev>hello user</dev>';
        return $this->view('index', ['user' => 'tom']);
    }
}
