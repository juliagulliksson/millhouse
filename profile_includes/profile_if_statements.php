<?php
// Checks if user is logged in
if(!isset($_SESSION['signed_in']) && empty($_SESSION['signed_in'])):
    header('location: index.php');
    exit();
endif;

// If newpost is set and user is not logged in, redirect to index
if(isset($_GET['newpost'])):
    if (!isset($_SESSION['signed_in']) 
    || $_SESSION['contributor'] == false 
    || isset($_GET['id'])):
        header('location: index.php');
        exit();
    endif;
endif;

// If the submit button for write new blogpost has been clicked
if(isset($_GET['newpost'])):
    if(isset($_POST['newpost_submit'])):
        require 'actions/insert_blogpost_sql.php';
        if(!empty($_FILES["upload_image"]["name"]) && !empty($_POST["alt_text"])):
            require "actions/upload_image_sql.php";
        endif;
    endif;
endif;//end of newpost if

// If the submit button for edit blogpost has been clicked
if(isset($_GET['editpost'])):
    if(isset($_POST['editpost_submit'])):
        include 'actions/edit_blogpost_sql.php';
    endif;
endif;// End of editpost if

// If the submit button for edit profile has been clicked
if(isset($_POST['edit_profile_submit'])):
    require 'profile_includes/edit_profile.php';
endif;

// If submit button for change password is set
if(isset($_POST['change_password'])){
    require "profile_includes/change_password.php";
}