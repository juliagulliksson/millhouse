<?php
header("location: ../index.php?#scroll");
require '../partials/database.php';
$comment_id = $_GET['comment_id'];
$new_text = $_POST['edit_comment'];

$statement = $pdo->prepare("UPDATE comments SET text = :newText
WHERE id = :id");
$statement->execute(array(
":newText" => $new_text,
":id" => $comment_id
));