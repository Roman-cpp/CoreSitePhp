<?php
namespace Core;

class Route {

    private $ROUTE = [
        'home' => [
            'controller' => HomeController::class,
            'method' => 'index',
            'child' => [],
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

    public function routeProcessing(array $url)
    {
        foreach ( $this->ROUTE as $key => $array) {
            if($url[$this->counter] == $key) {

                if($url[$this->counter + 1]) {
                    $this->counter++;
                    return $this->routeProcessing($array['child'], $url);
                } else {
                    $class = new $array['controller'];

                    $function = $array['method'];

                    //установка языка на котором будут показываться новости
                    //$class->$function(UserData::userLanguage());

                    return 0;
                }
            }
        }
        print_r($url);
        echo '404';
    }
}