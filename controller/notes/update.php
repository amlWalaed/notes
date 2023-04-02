<?php
use Core\App;
use Core\Database;
use Core\Validator;
$database = App::resolve(Database::class);
$currentUser= $_SESSION['user']['id'];
$errors=[];
$heading = 'edit your note....';
$note = $database->query('select * from notes where id = :id', ['id'=> $_POST['id']])->findOrFail();
authorize($note['user_id']=== $currentUser);
if(!Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = 'the body must be empty and not long than 1,000 characters';
    $note['body'] = $_POST['body'];
    return view('notes/edit.view.php', [
        'heading' => $heading,
        'errors' => $errors,
        'note'=>$note,
    ]);
}
if (Validator::string($_POST['body'], 1, 1000)) {
    $database->query('update notes set body = :body where id = :id', [
        'id' => $_POST['id'],
        'body' => $_POST['body']
    ]);
    
    // redirect the user
    header('location: /notes');
    exit();
}