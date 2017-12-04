<?php
require 'partials/database.php';
require 'partials/pagination.php';

//Main article fetch
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, categories.title, categories.id AS category_id,
users.username, users.email, users.id as user_id, COUNT(comments.post_id) AS comments,
image,
alt_text
FROM posts 
INNER JOIN categories 
ON posts.category_id=categories.id
INNER JOIN users
ON posts.user_id=users.id
LEFT JOIN comments ON posts.id=comments.post_id
GROUP BY posts.id
ORDER BY posts.date DESC
LIMIT 5 OFFSET $offset_number
  ");
$statement->execute();
$articles = $statement->fetchAll(PDO::FETCH_ASSOC);

//Categories (number of posts)
$statement = $pdo->prepare(" SELECT categories.title, categories.id, 
COUNT(posts.id) AS number_of_posts
FROM categories 
LEFT JOIN posts 
ON categories.id=posts.category_id 
GROUP BY categories.id
");
$statement->execute();
$categories_disctinct = $statement->fetchAll(PDO::FETCH_ASSOC);

//Categories fetch
$statement = $pdo->prepare("SELECT *
FROM categories
");
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

//Distinct months fetch
$statement = $pdo->prepare("SELECT DISTINCT MONTH(date) as month, 
COUNT(posts.id) as number_of_posts
FROM posts 
GROUP BY MONTH(date)
ORDER BY MONTH(date) DESC");
$statement->execute();
$months_number = $statement->fetchAll(PDO::FETCH_ASSOC);


 
