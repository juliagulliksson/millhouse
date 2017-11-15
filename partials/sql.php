<?php

require 'database.php';

//to select comments with posts
//SELECT posts.id, posts.post_title, GROUP_CONCAT(comments.text), count(*) as coment_cnt 
//FROM posts LEFT JOIN comments ON (posts.id = comments.post_id) GROUP BY posts.id


//Main article fetch
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, categories.title, 
users.username, users.email, users.id as user_id, COUNT(comments.post_id) AS comments
FROM posts 
INNER JOIN categories 
ON posts.category_id=categories.id
INNER JOIN users
ON posts.user_id=users.id
LEFT JOIN comments ON posts.id=comments.post_id
GROUP BY posts.id
ORDER BY posts.date DESC
  ");
  $statement->execute();
  $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
  

//Categories fetch
$statement = $pdo->prepare("SELECT *
FROM categories
");
$statement->execute();
$category = $statement->fetchAll(PDO::FETCH_ASSOC);

//Distinct months fetch
$statement = $pdo->prepare("SELECT DISTINCT MONTH(date) as month FROM posts");
$statement->execute();
$month_number = $statement->fetchAll(PDO::FETCH_ASSOC);


 
