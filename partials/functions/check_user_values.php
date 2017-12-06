<?php
function check_user_values($username, $mail, $user_column, 
$email_column, $new_username, $new_email){
    //Set error messages as an empty array
    $error_messages = array();
    $check_ok = true;

    // No spaces
    if(preg_match('/\s/',$username)){
        $error_messages[] = "Blank space is not allowed in username";
        $check_ok = false;
    }
    
    // Username validation
    if (strlen($username) > 20){
        $error_messages[] = "There's a username limit of max 20 characters ";
        $check_ok = false;
    }

    // Email Validation
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $error_messages[] = "Invalid e-mail address";
        $check_ok = false;
    }

    // Checks if username already exists
    $is_duplicate_username = check_if_duplicate($user_column, $new_username);
    
    // Checks if email already exists
    $is_duplicate_email = check_if_duplicate($email_column, $new_email);

    //Checks if username is already registered
    if ($is_duplicate_username){
        $error_messages[] = "This username already exists!";
        $check_ok = false;
    }

    //Checks if email is aldready registered
    if($is_duplicate_email){
        $error_messages[] = "This email adress is already registered!";
        $check_ok = false;
    }

    if($check_ok){
        return $check_ok;
    }
       else{
           return $error_messages;
        }
}