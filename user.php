<?php
require 'partials/includes.php';
$id = $_GET['uid'];
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
//if delete isset, but admin is false, redirect to same page
if(isset($_GET['delete'])){
    if($_SESSION['admin'] == false){
        header("location: user.php?uid=$id");
    }
}

require 'partials/head.php';
require 'profile_includes/profile_actions/user_sql.php';
require 'partials/functions/split_email.php';

 //User html
if(!isset($_GET['delete'])):
    require 'profile_includes/main_user_profile.php';
endif;

// Delete account
if(isset($_GET['delete'])): 
    require 'profile_includes/delete_user_profile.php';
endif; // End of delete if
require 'partials/footer.php'; ?>