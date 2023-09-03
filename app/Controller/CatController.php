<?php

namespace App\Controller;

class CatController
{
    public function index(): string
    {
        dd('cat');
        return '<dev>hello cat</dev>';
    }
}
