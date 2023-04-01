<?php
use Core\Validator;
use Core\App;
use Core\Database;
$email = $_POST['email'];
$password = $_POST['password'];
$database = App::resolve(Database::class);
$user = $database->query('select * from users where email = :email',[
    'email' => $email
])->find();
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'password must be more than 7 characters';
}
if (!Validator::email($email)) {
    $errors['email'] = 'email must be a valid email';
}
if(!$user){
    $errors['email']='email not found';
    view('sessions/create.view.php',[
        'errors' =>$errors,
    ]);
    exit();
}
if(! password_verify($password,$user['password'])){
    $errors['password']='password not correct';
    view('sessions/create.view.php',[
        'errors' => $errors,
    ]);
    exit();
}
login($user);
header('Location:/');
