<?php

namespace App\Controller;

use Core\Controller\Trait\View;

class CatController
{
    use View;
    
    public function index()
    {
        return $this->view( 'cat.index');
    }
}
