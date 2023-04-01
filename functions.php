<?php
use Core\Response;
function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
function urlIs($value){
    return $_SERVER['REQUEST_URI']=== $value ;
}
function base_path($path){
    return BASE_PATH."$path";
}
function view($view,$attributes=[]){
    extract($attributes);
    require BASE_PATH.'views/'.$view;
}
function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}
function login($user){
    $_SESSION['user'] = $user;
    session_regenerate_id(true);
}