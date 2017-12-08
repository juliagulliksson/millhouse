<?php
function check_user_values($username, $mail){
    
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

    if($check_ok){
        return $check_ok;
    }
       else{
           return $error_messages;
        }
}