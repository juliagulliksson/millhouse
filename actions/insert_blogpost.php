<?php
//header('location: ../index.php');
require '../partials/database.php';

if(!empty($_POST['blog_title']) && !empty($_POST['blog_title'] || $_POST['category']) && !empty($_POST['category'] || $_POST['post_text']) && !empty($_POST['post_text'] || $_POST['user_id']) && !empty($_POST['user_id'])) {

$title = $_POST['blog_title'];
$category = $_POST['category'];
$body = $_POST['post_text'];
$user_id = $_POST['user_id'];


//If blog post with image is posted
if (!empty($_FILES["image"]) && 
    !empty($_POST["alt_text"])) {
require "../partials/upload_image.php";
}//End if


//If blog post without image is posted
else {
    var_dump($_POST);
$statement = $pdo->prepare(
    "INSERT INTO posts 
    (post_title, 
    category_id, 
    text, 
    date, 
    user_id,
    image,
    alt_text) 
    VALUES (:title, 
    :category_id, 
    :text, 
    CURRENT_TIMESTAMP(), 
    :user_id,
    '',
    '')");
    
$statement->execute(array(
    ":title" => $title,
    ":category_id" => $category, 
    ":text" => $body, 
    ":user_id" => $user_id
));
}//End else
}

else{

header('Location: ../profile.php?newpost=error&error=error');

}