<?php
require './partials/database.php';
$id = $_SESSION['id'];

//Fetch the number of posts made by the user
$profile_articles = fetch_count_as("posts.id", "number_of_posts", "posts", $id);

//Fetch the number of comments made by the user
$profile_comments = fetch_count_as("comments.id", 
"number_of_comments", "comments", $id);

//Fetch all blogposts made by the user, limit to 5
$profile_blogposts = fetch_all_limit_5("posts", $id, "posts.date");

//Fetch the title of comments made by the user, limit to 5
$profile_comments_title = fetch_all_limit_5("comments", $id, "comments.date");

//Fetch all blogposts made by the user
$profile_all_articles = fetch_all_articles_by_user($id);

//Fetch all comments made by user
$profile_all_comments = fetch_all_comments_by_user($id);