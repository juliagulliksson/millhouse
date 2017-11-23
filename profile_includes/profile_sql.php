<?php
require './partials/database.php';
$id = $_SESSION['id'];

//Fetch the number of posts made by the user
$statement = $pdo->prepare("SELECT COUNT(posts.id) as number_of_posts 
FROM posts
WHERE user_id = :id
");
$statement->execute(array(
    ":id" => $id
));
$profile_articles = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch the number of comments made by the user
$statement = $pdo->prepare("SELECT COUNT(comments.id) as number_of_comments 
FROM comments
WHERE user_id = :id
");
$statement->execute(array(
    ":id" => $id
));
$profile_comments = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch all blogposts made by the user, limit to 5
$statement = $pdo->prepare("SELECT * FROM posts 
WHERE user_id = :id
LIMIT 5
");
$statement->execute(array(
    ":id" => $id
));
$profile_blogposts = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch the title of comments made by the user, limit to 5
$statement = $pdo->prepare("SELECT * FROM comments 
WHERE user_id = :id
LIMIT 5
");
$statement->execute(array(
    ":id" => $id
));
$profile_comments_title = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch all blogposts made by the user
$statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
posts.image, posts.alt_text, posts.text, posts.post_title, 
categories.title, categories.id AS category_id, posts.user_id,
COUNT(comments.post_id) AS comments
FROM posts 
INNER JOIN categories 
ON posts.category_id=categories.id
INNER JOIN users
ON posts.user_id=users.id
LEFT JOIN comments ON posts.id=comments.post_id
WHERE posts.user_id = :id
GROUP BY posts.id
ORDER BY posts.date DESC");
$statement->execute(array(
    ":id" => $id
));
$profile_all_articles = $statement->fetchAll(PDO::FETCH_ASSOC);

//Fetch all comments made by user
$statement = $pdo->prepare("SELECT posts.id AS postID, posts.post_title, 
comments.text, comments.date, comments.user_id, comments.id AS comment_id
FROM posts
INNER JOIN users
ON posts.user_id=users.id
RIGHT JOIN comments ON posts.id=comments.post_id
WHERE comments.user_id = :id
ORDER BY comments.date DESC");
$statement->execute(array(
    ":id" => $id
));
$profile_all_comments = $statement->fetchAll(PDO::FETCH_ASSOC);