<?php
// Where should it redirect?
header('location: ../index.php');
require '../partials/database.php';
$comment_id = $_GET['id'];

$statement = $pdo->prepare("DELETE FROM comments WHERE id = :id");
$statement->execute(array(
  ":id" => $comment_id
));