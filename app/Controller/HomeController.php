<?php

namespace App\Controller;

use Core\Controller\Trait\View;

class HomeController
{
    use View;

    public function index()
    {
        return $this->view( 'home.index');
    }
}
