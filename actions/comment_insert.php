<?php
require 'partials/database.php';
$comment = $_POST['comment'];
$user_id = $_POST['user_id'];

if(empty($_POST['comment']) || empty($_POST['user_id'])):
    $error_message = "Error: All fields are required for submission";

else:
    $statement = $pdo->prepare("INSERT INTO comments (post_id, text, date, user_id) 
    VALUES (:post_id, :comment, CURRENT_TIMESTAMP(), :user_id)");
    $statement->execute(array(
        ":post_id" => $id,
        ":comment" => $comment,
        ":user_id" => $user_id
    ));
endif;