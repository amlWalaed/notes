<?php 
use Core\App;
use Core\Database;

$heading = 'edit your note....';
$database = App::resolve(Database::class);
$currentUser = $_SESSION['user']['id'];
$note = $database->query('select * from notes where id = :id and user_id = :user',['id'=>$_GET['id'],'user'=>$currentUser])->findOrFail();
authorize($note['user_id'] === $currentUser);
$errors =[];
view('notes/edit.view.php', [
    'heading'=> $heading,
    'note'=>$note,
    'errors'=>$errors
]);