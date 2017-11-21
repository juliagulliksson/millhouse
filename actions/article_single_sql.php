<?php

//single articles fetch
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, posts.date, categories.title, categories.id AS category_id,
users.username, users.email, users.id as user_id,
FROM posts 
INNER JOIN categories 
ON posts.category_id=categories.id
INNER JOIN users
ON posts.user_id=users.id
WHERE posts.id = :id
  ");
$statement->execute(array(
  ":id" => $id
));
$article_single = $statement->fetch(PDO::FETCH_ASSOC);

//comments fetch
$statement = $pdo->prepare("SELECT comments.text, comments.date, users.username
FROM comments 
INNER JOIN users
ON comments.user_id=users.id
WHERE comments.post_id=:id
ORDER BY comments.id DESC
");
$statement->execute(array(
  ":id" => $id
));
$comments = $statement->fetchAll(PDO::FETCH_ASSOC);

  