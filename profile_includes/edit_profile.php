<?php
$existing_username = $_SESSION['username'];
$existing_email = $_SESSION['email'];
$user_id = $_SESSION['id'];

   
               
//If the submit button to change username or email is set    
if(isset($_POST['edit_profile_submit'])){
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $error_messages = array();
    $update_ok = true;
    require "partials/functions/check_if_duplicate.php";
    
    if(empty($_POST['new_username'])){
        $error_messages[] = 'The username can\'t be empty';
        $update_ok = false;
    }
    elseif($new_username != $existing_username){
        $user_column = 'username';
        $is_duplicate_username = check_if_duplicate($user_column, $new_username);
        if($is_duplicate_username){
            $error_messages[] = 'The username already exists';
            $update_ok = false;
        }
    }
    
    if(empty($_POST['new_email'])){
        $error_messages[] = 'The e-mail can\'t be empty';
        $update_ok = false;
    }
    
    elseif($new_email != $existing_email){
        $user_column = 'email';
        $is_duplicate_email = check_if_duplicate($user_column, $new_email);
        if($is_duplicate_email){
            $error_messages[] = 'The e-mail already exists';
            $update_ok = false;
        } 
    }


//Uploads profile picture
if(!empty($_FILES['new_profile_picture']['name']) &&
$update_ok){
    require "profile_includes/profile_actions/update_profile_pic_sql.php";
}
    elseif(empty($_FILES['new_profile_picture']['name']) &&
        $update_ok){
        require "profile_includes/profile_actions/update_profile_sql.php";
        }
}
     

//If subimt button for change password is set
if(isset($_POST['change_password'])){
    require "profile_includes/change_password.php";
}
?>  