<?php
namespace Core\Controller\Trait;
trait View
{
    function view(string $view, array $params = []): void
    {
        ob_start();
        extract($params);
        require __DIR__ .'/../../../src/view/' . str_replace('.', '/', $view) . '.blade.php';
        echo ob_get_clean();
    }
}