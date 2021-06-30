<?php

namespace Router;

use App\Exceptions\NotFoundException;

class Router{

    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action)
    {
        //Trier les routes par request method
        $this->routes['GET'][] = new Route($path, $action);

    }

    public function run(){
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->matches($this->url)){
                return $route->execute();
            }
        }

        throw new NotFoundException('La page demandée est introuvable');
    }

}