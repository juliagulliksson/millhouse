<?php
function fetch_all($table){
    require 'partials/database.php';

    $statement = $pdo->prepare("SELECT *
    FROM $table
    ");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_all_articles_by_user($user_id){
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

function fetch_count_as($column, $renamed, $table, $value){
    require 'partials/database.php';

    $statement = $pdo->prepare("SELECT COUNT($column) as $renamed 
    FROM $table
    WHERE user_id = '$value'
    ");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_all_where_condition($table, $column, $value){
    require 'partials/database.php';
    
    $statement = $pdo->prepare("SELECT *
    FROM $table
    WHERE $column = '$value'
    ");
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function fetch_all_limit_5($table, $value, $order_by){
    require 'partials/database.php';

    $statement = $pdo->prepare("SELECT * FROM $table 
    WHERE user_id = '$value'
    ORDER BY $order_by DESC
    LIMIT 5
    ");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}