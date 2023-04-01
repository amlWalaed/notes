<?php
use Core\Router;
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'functions.php';
session_start();
spl_autoload_register(
    function ($class) {
        $class=str_replace('\\', DIRECTORY_SEPARATOR , $class);
        require base_path("{$class}.php");
    }
);

require base_path('bootstrap.php');
$router = new Core\Router();
$routes = require base_path('routes.php');
$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($url , $method);
//class  person{
//    public $name;
//    public  $age;
//    function breathe(){
//        echo $this->name.'is breathing';
//    }
//};
//$person1=new person();
//$person1->name='aml walaed';
//$person1->age=23;
//$person1->breathe();
