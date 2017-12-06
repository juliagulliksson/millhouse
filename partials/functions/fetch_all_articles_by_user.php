<?php
function fetch_all_articles_by_users($user_id){
    require 'partials/database.php';

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
        ":id" => $user_id
    ));

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}