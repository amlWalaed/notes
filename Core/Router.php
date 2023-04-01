<?php
namespace Core;
use Core\Middleware\Middleware;

class Router{
    protected $routes=[];

    public function add($url , $method , $controller){
        $middleware=null;
        $this->routes[] = compact('url', 'method', 'controller','middleware');
        return $this;
    }
    public function get($url, $controller){
        return $this->add($url, 'GET',$controller);
    }
    public function post($url, $controller){
        return $this->add($url, 'POST',$controller);
    }
    public function delete($url, $controller){
        return $this->add($url, 'DELETE',$controller);
    } 
    public function put($url, $controller){
        return $this->add($url, 'PUT',$controller);
    }
    public function patch($url, $controller){
        return $this->add($url, 'PATCH',$controller);
    }
    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }
    public function route($url, $method){
        foreach($this->routes as $route ){
            if($route['url'] === $url && $route['method'] === $method){
                Middleware::resolve($route['middleware']);
                // if($route['middleware'] === 'guest' ){
                //     if($_SESSION['user'] ?? false){
                //         header('location: /');
                //         exit();
                //     }
                // } 
                return require base_path($route['controller']);
        }
    }
    abort();
}
    
}
// $url = parse_url($_SERVER['REQUEST_URI'])['path'];

// $routes = require('routes.php');

// function routeToController($url , $routes){
//     if(array_key_exists($url,$routes)){
        
//         require base_path($routes[$url]);
//     }else{
//         abort();
//     }
// }
function abort($status_code=404){
    http_response_code(404);
    view("{$status_code}.view.php");
    die();
}
// routeToController($url , $routes);