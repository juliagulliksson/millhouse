<?php
function fetch_all_comments_by_user($user_id){
    require 'partials/database.php';

    $statement = $pdo->prepare("SELECT posts.id AS postID, posts.post_title, 
    comments.text, comments.date, comments.post_id,
    comments.user_id, comments.id AS comment_id
    FROM posts
    INNER JOIN users
    ON posts.user_id=users.id
    RIGHT JOIN comments ON posts.id=comments.post_id
    WHERE comments.user_id = :id
    ORDER BY comments.date DESC");
    $statement->execute(array(
        ":id" => $user_id
    ));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}