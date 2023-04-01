<?php
use Core\Router;

$router->get('/','controller/index.php')->only('auth');
$router->get('/contact','controller/contact.php')->only('auth');
$router->get('/about','controller/about.php')->only('auth');


$router->get('/notes','controller/notes/index.php')->only('auth');

$router->get('/note','controller/notes/show.php')->only('auth');
$router->delete('/note','controller/notes/destory.php');
$router->get('/note/edit','controller/notes/edit.php')->only('auth');
$router->patch('/note','controller/notes/update.php');

$router->get('/note/create','controller/notes/create.php')->only('auth');
$router->post('/note/create','controller/notes/store.php');

$router->get('/registration','controller/registration/create.php')->only('guest');
$router->post('/registration','controller/registration/store.php');

$router->get('/login','controller/session/create.php');
$router->post('/login','controller/session/store.php');
$router->delete('/login','controller/session/destroy.php');
// return [
//     '/'=>'controller/index.php',
//     '/contact'=>'controller/contact.php',
//     '/about'=>'controller/about.php',
//     '/notes'=>'controller/notes/index.php',
//     '/note'=>'controller/notes/show.php',
//     '/note/create'=>'controller/notes/create.php',
// ];