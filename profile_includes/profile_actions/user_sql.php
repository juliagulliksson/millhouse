<?php
$user_id = $_GET['uid'];

//Fetch all user info
$user_info = fetch_all_where_condition("users", "id", $user_id);

//Fetch the number of comments made by user
$user_comments = fetch_count_as("comments.id", 
"number_of_comments", "comments", $user_id);

//Fetch the number of posts made by the user
$user_articles = fetch_count_as("posts.id", "number_of_posts", "posts", $user_id);

//Fetch all blogposts made by the user, limit to 5
$user_blogposts = fetch_all_limit_5("posts", $user_id, "posts.date");

//Fetch all user comments made by the user, limit to 5
$user_comments_title = fetch_all_limit_5("comments", $user_id, "comments.date");

//Fetch all articles made by user
$user_all_articles = fetch_all_articles_by_user($user_id);

