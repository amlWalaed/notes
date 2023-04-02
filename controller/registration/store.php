<?php

use Core\Validator;
use Core\App;
use Core\Database;
$database = App::resolve(Database::class);
$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'password must be more than 7 characters';
}
if (!Validator::email($email)) {
    $errors['email'] = 'email must be a valid email';
}
$user= $database->query("select * from users where email = :email",[
    'email'=>$email,
])->find();
if($user){
    $errors['email']='email already exists';
}
if (count($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

if (empty($errors)) {
    $user =$database->query('INSERT INTO users(email, password) VALUES(:email, :password)',[
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_BCRYPT) ,
    ]);
    $_SESSION['user']=$user;
    header('location: /');
    exit();
}
