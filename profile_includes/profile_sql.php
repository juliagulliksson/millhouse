<?php
require './partials/database.php';
$id = $_SESSION['id'];

$statement = $pdo->prepare("SELECT COUNT(posts.id) as posts 
FROM posts
WHERE user_id = '$id'
");
$statement->execute();
$profile_articles = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT COUNT(comments.id) as comments 
FROM comments
WHERE user_id = '$id'
");
$statement->execute();
$profile_comments = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM posts 
WHERE user_id = '$id'
LIMIT 5
");
$statement->execute();
$profile_blogposts = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM comments 
WHERE user_id = '$id'
LIMIT 5
");
$statement->execute();
$profile_comments_title = $statement->fetchAll(PDO::FETCH_ASSOC);
    