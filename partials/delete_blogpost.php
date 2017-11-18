<?php
header('location: ../index.php');
require 'database.php';
$post_id = $_GET['id'];


$statement = $pdo->prepare("DELETE FROM posts WHERE id = $post_id
  ");
  $statement->execute();
  