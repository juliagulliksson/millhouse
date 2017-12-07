<?php
header('location: ../index.php');
require '../partials/functions/delete_all_where_sql.php';
$post_id = $_GET['id'];

$table = "posts";
$column = "id";
delete_all_where($table, $column, $post_id);

//delete all the blogposts's comments
$table = "comments";
$column = "post_id";
delete_all_where($table, $column, $post_id);