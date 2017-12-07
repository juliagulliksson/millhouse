<?php
header('location: ../index.php');
require '../partials/functions/delete_all_where_sql.php';

$table = "comments";
$column = "id";
$comment_id = $_GET['id'];

delete_all_where($table, $column, $comment_id);