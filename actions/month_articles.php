<?php

//Months fetch
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, posts.date, categories.title, 
users.username, users.id as user_id, COUNT(comments.post_id) AS comments
FROM posts 
INNER JOIN categories 
ON posts.category_id=categories.id
INNER JOIN users
ON posts.user_id=users.id
LEFT JOIN comments ON posts.id=comments.post_id
WHERE MONTH(posts.date) = $month
GROUP BY posts.id
ORDER BY posts.date DESC
  ");
  $statement->execute();
  $month_articles = $statement->fetchAll(PDO::FETCH_ASSOC);


