<?php

//single articles fetch
  $statement = $pdo->prepare("SELECT posts.date, posts.id as postID, 
  posts.text, posts.post_title, posts.date, categories.title, 
  users.username, users.id as user_id
  FROM posts 
  INNER JOIN categories 
  ON posts.category_id=categories.id
  INNER JOIN users
  ON posts.user_id=users.id
  WHERE posts.id = $id
    ");
  $statement->execute();
  $article_single = $statement->fetchAll(PDO::FETCH_ASSOC);

    //categories fetch


  $statement = $pdo->prepare("SELECT comments.text, comments.date, users.username
  FROM comments 
  INNER JOIN users
  ON comments.user_id=users.id
  WHERE comments.post_id=$id
  ORDER BY comments.id DESC
  ");
  $statement->execute();
  $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

  