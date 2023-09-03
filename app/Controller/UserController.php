<?php

namespace App\Controller;

class UserController
{
    public function index(): string
    {
        dd('user');
        return '<dev>hello user</dev>';
    }
}
