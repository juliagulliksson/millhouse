<?php
$user_id = $_GET['uid'];

//Fetch all user info
$user_table = "users";
$user_column = "id";
$user_info = fetch_all_where_condition($user_table, $user_column, $user_id);

//Fetch the number of comments made by user
$column = "comments.id";
$renamed = "number_of_comments";
$table = "comments";
$condition = "user_id";
$user_comments = fetch_count_as($column, $renamed, $table, $condition, $user_id);

//Fetch the number of posts made by the user
$column = "posts.id";
$renamed = "number_of_posts";
$table = "posts";
$condition = "user_id";
$user_articles = fetch_count_as($column, $renamed, $table, $condition, $user_id);

//Fetch all blogposts made by the user, limit to 5
$table = "posts";
$order_by = "posts.date";
$user_blogposts = fetch_all_limit_5($table, $user_id, $order_by);

//Fetch all user comments made by the user, limit to 5
$table = "comments";
$order_by = "comments.date";
$user_comments_title = fetch_all_limit_5($table, $user_id, $order_by);

//Fetch all articles made by user
$user_all_articles = fetch_all_articles_by_users($user_id);

