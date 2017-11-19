<?php
require './partials/database.php';
$id = $_SESSION['id'];

//Fetch the number of posts made by the user
$statement = $pdo->prepare("SELECT COUNT(posts.id) as posts 
FROM posts
WHERE user_id = '$id'
");
$statement->execute();
$profile_articles = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch the number of comments made by the user
$statement = $pdo->prepare("SELECT COUNT(comments.id) as comments 
FROM comments
WHERE user_id = '$id'
");
$statement->execute();
$profile_comments = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch all blogposts made by the user, limit to 5
$statement = $pdo->prepare("SELECT * FROM posts 
WHERE user_id = '$id'
LIMIT 5
");
$statement->execute();
$profile_blogposts = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch all user comments made by the user, limit to 5
$statement = $pdo->prepare("SELECT * FROM comments 
WHERE user_id = '$id'
LIMIT 5
");
$statement->execute();
$profile_comments_title = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch all blogposts made by the user
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.text, posts.post_title, categories.title, categories.id AS category_id, users.email, 
COUNT(comments.post_id) AS comments
FROM posts 
INNER JOIN categories 
ON posts.category_id=categories.id
INNER JOIN users
ON posts.user_id=users.id
LEFT JOIN comments ON posts.id=comments.post_id
WHERE posts.user_id = '$id'
GROUP BY posts.id
ORDER BY posts.date DESC");
$statement->execute();
$profile_all_articles = $statement->fetchAll(PDO::FETCH_ASSOC);