<?php
namespace Core;
use Core\Error;

class Route {

    private static $ROUTE = [];
    private int $routeСomplexity = 0;
    static function get($url, $controller)
    {
        self::$ROUTE[$url] = [
            'controller' => $controller[0],
            'method' => $controller[1],
            'child' => [],
        ];
    }

    static function post($url, $controller)
    {
        self::$ROUTE[$url] = [
            'controller' => $controller[0],
            'method' => $controller[1],
            'child' => [],
        ];
    }
    public function routeProcessing(array $url, array $ROUTE = null)
    {
        if(!isset($ROUTE)) {
            $ROUTE = self::$ROUTE;
        }
        
        foreach ( $ROUTE as $key => $array) {
            if($url[$this->routeСomplexity] === $key) {
                if(count($url) === $this->routeСomplexity + 2) {
                    $this->routeСomplexity++;
                    return $this->routeProcessing( $url, $array['child']);
                } else {
                    $classController = new $array['controller'];
                    
                    $functionController = $array['method'];

                    $classController->$functionController();

                    return 0;
                }
            }
        }

        Error::error404();
    }
}