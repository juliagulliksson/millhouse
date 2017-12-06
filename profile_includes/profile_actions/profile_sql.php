<?php
require './partials/database.php';
$id = $_SESSION['id'];

//Fetch the number of posts made by the user
$column = "posts.id";
$renamed = "number_of_posts";
$table = "posts";
$condition = "user_id";
$profile_articles = fetch_count_as($column, $renamed, $table, $condition, $id);

//Fetch the number of comments made by the user
$column = "comments.id";
$renamed = "number_of_comments";
$table = "comments";
$condition = "user_id";
$profile_comments = fetch_count_as($column, $renamed, $table, $condition, $id);

//Fetch all blogposts made by the user, limit to 5
$table = "posts";
$order_by = "posts.date";
$profile_blogposts = fetch_all_limit_5($table, $id, $order_by);

//Fetch the title of comments made by the user, limit to 5
$table = "comments";
$order_by = "comments.date";
$profile_comments_title = fetch_all_limit_5($table, $id, $order_by);

//Fetch all blogposts made by the user
$profile_all_articles = fetch_all_articles_by_users($id);

//Fetch all comments made by user
$profile_all_comments = fetch_all_comments_by_user($id);