<?php

require 'database.php';
header('location: ../index.php');

var_dump($_POST);
var_dump($_GET);
$comment = $_POST['comment'];
$post_id = $_GET['post_id'];
$today = $_POST['date'];

$statement = $pdo->prepare("INSERT INTO comments (post_id, text, date, user_id) 
VALUES ($post_id, '$comment', '$today', 2)");
$statement->execute();

