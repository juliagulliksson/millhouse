<?php
header("location: ../index.php?#scroll"); 
$comment_id = $_GET['comment_id'];
var_dump($_POST);
var_dump($_GET);
require '../partials/database.php';
$new_text = $_POST['edit_comment'];

$statement = $pdo->prepare("UPDATE comments SET text = :newText
WHERE id = :id");
$statement->execute(array(
":newText" => $new_text,
":id" => $comment_id
));