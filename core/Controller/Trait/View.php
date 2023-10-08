<?php
namespace Core\Controller\Trait;
trait View
{
    function view(string $view, array $param)
    {
        echo $view;
    }
}