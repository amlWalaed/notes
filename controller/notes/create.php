<?php

$heading = 'create your note...';
$errors=[];
view('notes/create.view.php',[
    'heading' => $heading,
    'errors' => $errors,
]);
