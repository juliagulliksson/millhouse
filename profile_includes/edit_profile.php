<?php

//If the submit button to change username or email is set 
$existing_username = $_SESSION['username'];
$existing_email = $_SESSION['email'];
$new_username = $_POST['new_username'];
$new_email = $_POST['new_email'];
$error_messages = array();
$update_ok = true;

//If username has been removed from input field
if(empty($_POST['new_username'])){
    $error_messages[] = 'The username can\'t be empty';
    $update_ok = false;
}
//If email has been removed from input field
if(empty($_POST['new_email'])){
    $error_messages[] = 'The e-mail can\'t be empty';
    $update_ok = false;
}
if($new_username == $existing_username && $new_email == $existing_email
&& empty($_FILES['new_profile_picture']['name'])){
    $error_messages[] = 'No changes where made';
}

require 'partials/functions/check_user_values.php';
require "partials/functions/check_if_duplicate.php";

//If new username is chosen, check for duplicate in database
if($new_username != $existing_username){
    $user_column = 'username';
    $is_duplicate_username = check_if_duplicate($user_column, $new_username);

    if($is_duplicate_username){
        $error_messages[] = 'The username already exists';
        $update_ok = false;
    }
}
//If new email is chosen, check for duplicate in database
if($new_email != $existing_email){
    $user_column = 'email';
    $is_duplicate_email = check_if_duplicate($user_column, $new_email);
    if($is_duplicate_email){
        $error_messages[] = 'The e-mail already exists';
        $update_ok = false;
    } 
}

$check_user_input = check_user_values($new_username, $new_email);

//Uploads profile picture and/or username, and/or email
if(!empty($_FILES['new_profile_picture']['name']) && 
    gettype($check_user_input) == 'boolean' &&
    $update_ok && 
    empty($error_messages))
{
    require "profile_includes/profile_actions/update_profile_pic_sql.php";
}
//Updates profile with new email and/or username, if profile picture is empty
elseif(empty($_FILES['new_profile_picture']['name']) && 
    gettype($check_user_input) == 'boolean' &&
    $update_ok && 
    empty($error_messages))
{
    require "profile_includes/profile_actions/update_profile_sql.php";
}

    

