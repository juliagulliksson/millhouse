<?php
require 'database.php';
$post_id = $_GET['post_id'];
header("location: ../index.php?id=$post_id");
$comment = $_POST['comment'];
$today = $_POST['date'];
$user_id = $_POST['user_id'];

$statement = $pdo->prepare("INSERT INTO comments (post_id, text, date, user_id) 
VALUES ($post_id, '$comment', CURRENT_TIMESTAMP(), $user_id)");
$statement->execute();

