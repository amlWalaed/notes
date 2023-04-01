<?php
use Core\App;
use Core\Database;

$heading='note';
$database = App::resolve(Database::class);
$currentUser = 1;
$note = $database->query('select * from notes where id = :id and user_id = :user',['id'=>$_GET['id'],'user'=>$currentUser])->findOrFail();
view('notes/show.view.php',[
        'heading' => $heading,
        'note'=>$note,
    ]);


