<?php
require 'partials/includes.php';

// Check if the get request is numeric
if(!is_numeric($_GET['uid'])){
    header('location: index.php');
    exit();
}
// Check if the user id equals the logged in user, if so redirect to profile
if(isset($_SESSION['signed_in'])){
    if($_GET['uid'] == $_SESSION['id']){
		header('location: profile.php');
		exit();
    }
}
require 'partials/head.php';
require 'profile_includes/profile_actions/user_sql.php';
require 'partials/functions/split_email.php';
 //user html
require 'profile_includes/main_user_profile.php';
require 'partials/footer.php'; ?>