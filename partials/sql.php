<?php

require 'database.php';


$statement = $pdo->prepare("SELECT posts.date, posts.text, posts.post_title, posts.date, categories.title, users.username
FROM posts 
INNER JOIN categories 
ON posts.category_id=categories.id
INNER JOIN users
ON posts.user_id=users.id
  ");
  $statement->execute();
  $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  $statement = $pdo->prepare("SELECT *
  FROM categories
  ");
  $statement->execute();
  $category = $statement->fetchAll(PDO::FETCH_ASSOC);
