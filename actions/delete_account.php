<?php
header('location: ../index.php');
require '../partials/database.php';
$user_id = $_GET['id'];

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

session_start();
session_unset();
session_destroy();