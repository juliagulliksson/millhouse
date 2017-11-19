<?php
require 'database.php';

//to select comments with posts
//SELECT posts.id, posts.post_title, GROUP_CONCAT(comments.text), count(*) as coment_cnt 
//FROM posts LEFT JOIN comments ON (posts.id = comments.post_id) GROUP BY posts.id


//Main article fetch
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, categories.title, categories.id AS category_id,
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

//Categories (number of posts)
$statement = $pdo->prepare(" SELECT categories.title, categories.id, COUNT(posts.id) AS posts
FROM categories 
LEFT JOIN posts 
ON categories.id=posts.category_id 
GROUP BY categories.id
");
$statement->execute();
$category_disctinct = $statement->fetchAll(PDO::FETCH_ASSOC);
  
//Categories fetch
$statement = $pdo->prepare("SELECT *
FROM categories
");
$statement->execute();
$category = $statement->fetchAll(PDO::FETCH_ASSOC);

//Distinct months fetch
$statement = $pdo->prepare("SELECT DISTINCT MONTH(date) as month, COUNT(posts.id) as posts 
FROM posts 
GROUP BY MONTH(date)
ORDER BY MONTH(date) DESC");
$statement->execute();
$month_number = $statement->fetchAll(PDO::FETCH_ASSOC);


 
