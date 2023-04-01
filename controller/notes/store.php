<?php

use Core\Validator;

use Core\App;
use Core\Database;

$heading = 'create your note...';
$database = App::resolve(Database::class);
$errors = [];

if (Validator::string($_POST['body'], 1, 1000)) {
    $notes = $database->query(
        'INSERT INTO `myapp`.`notes` (`body`, `user_id`) VALUES (:body ,:id)',
        [
            'body' => $_POST['body'],
            'id' => 1
        ]
    );
    header('location: /notes');
    exit();
} else {
    $errors['body'] = 'the body must be empty and not long than 1,000 characters';
    view('notes/create.view.php', [
        'heading' => $heading,
        'errors' => $errors,
    ]);
}
