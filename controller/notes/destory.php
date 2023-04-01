<?php
use Core\App;
use Core\Database;

$database = App::resolve(Database::class);
// $database = App::container()->resolve('\Core\Database');
$currentUser = 1;
$note = $database->query('select * from notes where id = :id and user_id = :user', ['id' => $_GET['id'], 'user' => $currentUser])->findOrFail();
if ($note['user_id'] === $currentUser) {
    $database->query('delete from notes where id = :id and user_id = :user', ['id' => $_GET['id'], 'user' => $currentUser]);
    header('location: /notes');
    exit();
}
