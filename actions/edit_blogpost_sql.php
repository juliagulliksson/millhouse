<?php
$post_id = $_GET['id'];
header("location: ../index.php?id=$post_id#scroll");
require '../partials/database.php';
$new_title = $_POST['edit_title'];
$new_text = $_POST['edit_text'];
$category = $_POST['category'];

$statement = $pdo->prepare("UPDATE posts SET post_title = :newTitle, text = :newText, 
category_id = :newCategory 
WHERE id = :id");
$statement->execute(array(
":newTitle" => $new_title,
":newText" => $new_text,
":newCategory" => $category,
":id" => $post_id
));