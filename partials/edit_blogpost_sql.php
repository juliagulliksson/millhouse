<?php
header('location: ../index.php');
require 'database.php';

$new_title = $_POST['edit_title'];
$id = $_GET['id'];
$new_text = $_POST['edit_text'];
$category = $_POST['category'];

$statement = $pdo->prepare("UPDATE posts SET post_title = :newTitle, text = :newText, category_id = :newCategory 
WHERE id = :id");
$statement->execute(array(
":newTitle" => $new_title,
":newText" => $new_text,
":id" => $id,
":newCategory" => $category
));