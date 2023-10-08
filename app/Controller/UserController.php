<?php

namespace App\Controller;
use Core\DB;

class UserController
{
    public function index(): string
    {
        DB::showTable('users');
        dd('user', $_ENV['DB_USERNAME']);
        return '<dev>hello user</dev>';
    }
}
