<?php
require 'database.php';
header('location: ../index.php');



if(!empty($_POST['blog_title']) && !empty($_POST['blog_title'] || $_POST['category']) && !empty($_POST['category'] || $_POST['post_text']) && !empty($_POST['post_text'] || $_POST['user_id']) && !empty($_POST['user_id'])) {


$title = $_POST['blog_title'];
$category = $_POST['category'];
$body = $_POST['post_text'];

$user_id = $_POST['user_id'];


$statement = $pdo->prepare("INSERT INTO posts (post_title, category_id, text, date, user_id) 
VALUES ('$title', $category, '$body', CURRENT_TIMESTAMP(), $user_id)");
$statement->execute();



}


else{

header('Location: ../profile.php?newpost=error&error=error');

}



