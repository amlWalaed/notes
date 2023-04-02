<?php
use Core\App;
use Core\Database;

$database = App::resolve(Database::class);
    $heading='my notes';
    $notes = $database->query('select * from notes where user_id = :id',[
        'id'=>$_SESSION['user']['id']??null,
    ])->get();
view('notes/index.view.php',[
    'heading' => $heading,
    'notes' => $notes
]);
