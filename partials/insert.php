<?php
header('location: ../index.php');
require 'database.php';

$title = $_POST['blog_title'];
$category = $_POST['category'];
$body = $_POST['post_text'];
$today = $_POST['date'];
echo $title;
echo $category;
echo $body;

//echo $date;

$statement = $pdo->prepare("INSERT INTO posts (post_title, category_id, text, date, user_id) 
VALUES ('$title', $category, '$body', CURRENT_TIMESTAMP(), 1)");
$statement->execute();