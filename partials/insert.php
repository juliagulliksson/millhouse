
<?php
require 'database.php';

header('location: ../index.php');

var_dump($_POST);
$title = $_POST['blog_title'];
$category = $_POST['category'];
$body = $_POST['post_text'];
$date = date('Y-n-d');
echo $title;
echo $category;
echo $body;
echo $date;
//echo $date;

$statement = $pdo->prepare("INSERT INTO posts (post_title, category_id, text) 
VALUES ('$title', $category, '$body')");
$statement->execute();
  
  /*$statement->execute(array(
      ":title" => $title,
      ":category" => $category,
      ":body" => $body,
      ":date" => $date
  ));*/