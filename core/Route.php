<?php
namespace Core;
use App\Controller\CatController;
use App\Controller\HomeController;
use App\Controller\UserController;

class Route {

    private $ROUTE = [
        'home' => [
            'controller' => HomeController::class,
            'method' => 'index',
            'child' => [
                'user' => [
                    'controller' => UserController::class,
                    'method' => 'index',
                    'child' => [
                        'dom' => [
                            'controller' => CatController::class,
                            'method' => 'index',
                            'child' => [],
                        ],
                    ],
                ]
            ],
        ],
        'user' => [
            'controller' => UserController::class,
            'method' => 'index',
            'child' => [],
        ],
        'dom' => [
            'controller' => CatController::class,
            'method' => 'index',
            'child' => [],
        ],
    ];

    private array $route = [];

    static function get($url, $controller)
    {

    }

    static function post()
    {

    }

    private int $counter = 0;

    public function routeProcessing(array $url, array $ROUTE = null)
    {
        if(!isset($ROUTE)) {
            $ROUTE = $this->ROUTE;
        }
        
        foreach ( $ROUTE as $key => $array) {
            if($url[$this->counter] === $key) {
                if(count($url) === $this->counter + 2) {
                    $this->counter++;
                    return $this->routeProcessing( $url, $array['child']);
                } else {
                    $classController = new $array['controller'];
                    
                    $functionController = $array['method'];

                    $classController->$functionController();

                    return 0;
                }
            }
        }

        echo '404';
    }
}