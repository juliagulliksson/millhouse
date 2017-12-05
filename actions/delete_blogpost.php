<?php
header('location: ../index.php');
require '../partials/database.php';
$post_id = $_GET['id'];

$statement = $pdo->prepare("DELETE FROM posts WHERE id = :post_id");
$statement->execute(array(
  ":post_id" => $post_id
));

$statement = $pdo->prepare("DELETE FROM comments WHERE post_id = :post_id");
$statement->execute(array(
  ":post_id" => $post_id
));