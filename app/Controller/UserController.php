<?php

namespace App\Controller;
use Core\DB;

class UserController
{
    public function index(): string
    {
        DB::showTable('users');
        dd('user');
        return '<dev>hello user</dev>';
    }
}
