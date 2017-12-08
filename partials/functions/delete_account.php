<?php
function delete_account($user_id){
  require '../partials/database.php';

  $statement = $pdo->prepare("DELETE FROM posts WHERE user_id = :user_id");
  $statement->execute(array(
    ":user_id" => $user_id
  ));

  $statement = $pdo->prepare("DELETE FROM comments WHERE user_id = :user_id");
  $statement->execute(array(
    ":user_id" => $user_id
  ));

  $statement = $pdo->prepare("DELETE FROM users WHERE id = :user_id");
  $statement->execute(array(
    ":user_id" => $user_id
  ));
}