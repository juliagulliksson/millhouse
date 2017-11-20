<?php
header('location: ../index.php');
require 'database.php';


$title = $_POST['blog_title'];
$category = $_POST['category'];
$body = $_POST['post_text'];

$user_id = $_POST['user_id'];


$statement = $pdo->prepare("INSERT INTO posts (post_title, category_id, text, date, user_id) 
VALUES (:title, :category, :body, CURRENT_TIMESTAMP(), :user_id)");
$statement->execute(array(
    ":title" => $title,
    ":category" => $category,
    ":body" => $body,
    ":user_id" => $user_id
));