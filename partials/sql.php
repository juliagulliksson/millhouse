<?php

require 'database.php';

// NÄR  GET-request för varje id är set, på undersidorna för alla blogposts, så hämtas kommentarerna via
// en sql query WHERE comments.post_id = $id(idt som har skickats med i GET)
//Men själva kommentarerna måste ju också räknas... för att kunna visas upp i comments(2) 
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
