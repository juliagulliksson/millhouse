<?php

require 'database.php';

 
//nl2br = gör så att varje line break i artikel-fält blir till br-taggar


/*SELECT posts.post_title , posts.date, posts.user_id as uid, COUNT(comments.post_id) AS comments
FROM posts 
LEFT JOIN comments ON posts.id = comments.post_id
GROUP BY
    posts.id*/


//Main article fetch
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, posts.date, categories.title, 
users.username, users.id as user_id, COUNT(comments.post_id) AS comments
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

  /*
  SELECT p.*, c.*, u.* FROM posts p
  LEFT JOIN comments c ON c.post_id = p.id
  LEFT JOIN users u ON u.id = p.author_id*/

  /*$statement = $pdo->prepare("SELECT comments.text, comments.date, users.username
  FROM comments 
  INNER JOIN users
  ON comments.user_id=users.id
  ORDER BY comments.id DESC
  WHERE 
  ");
  $statement->execute();
  $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
*/
 
