<?php

require 'database.php';

// NÄR  GET-request för varje id är set, på undersidorna för alla blogposts, så hämtas kommentarerna via
// en sql query WHERE comments.post_id = $id(idt som har skickats med i GET)
//Men själva kommentarerna måste ju också räknas... för att kunna visas upp i comments(2) 
//nl2br = gör så att varje line break i artikel-fält blir till br-taggar

/*$source = '2012-07-31';
$date = new DateTime($source);
echo $date->format('d.m.Y'); // 31.07.2012
echo $date->format('d-m-Y'); // 31-07-2012*/


$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, posts.date, categories.title, 
users.username, users.id as user_id
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
  /*
  SELECT p.*, c.*, u.* FROM posts p
  LEFT JOIN comments c ON c.post_id = p.id
  LEFT JOIN users u ON u.id = p.author_id*/