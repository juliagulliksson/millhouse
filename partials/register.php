<?php
// If register submit button is clicked
if(isset($_POST["register-user"])){
    
    $pass_verify = trim($_POST['verify_password']);
    $mail = trim($_POST["register_email"]);
    $user = trim($_POST["register_username"]);
    $pass = trim($_POST["register_password"]);

    //Set error messages as an empty array
    $error_messages = array();

    /// Form Required Field Validation
    foreach($_POST as $key=>$value){
        if(empty($_POST[$key])) {
            $error_messages[] = "All fields are required";
        break;
        }
    }

    // No spaces
    if(preg_match('/\s/',$user) ) {
        $error_messages[] = "Blank space is not allowed in username";
    }
    
    if(preg_match('/\s/',$pass) ){
        $error_messages[] = "Blank space is not allowed in password";
    }

    // Username validation
    if (strlen($user) > 20){
        $error_messages[] = "There's a username limit of max 20 characters ";
    }

    // Password matching validation
    if($pass != $pass_verify){ 
        $error_messages[] = 'Passwords do not match'; 
    }

    // Email Validation
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $error_messages[] = "Invalid e-mail address";
    }

    //Begin check of duplicate
    $new_username = $_POST["register_username"];     
    $new_email = $_POST["register_email"];  
    
    // Variables with the name of the column to be checked
    $user_column = 'username';
    $email_column = 'email';

    // Checks if username already exists
    $is_duplicate_username = check_if_duplicate($user_column, $new_username);

    // Checks if email already exists
    $is_duplicate_email = check_if_duplicate($email_column, $new_email);

    //Checks if username is already registered
    if ($is_duplicate_username){
        $error_messages[] = "This username already exists!";
    }

    //Checks if email is aldready registered
    if($is_duplicate_email){
        $error_messages[] = "This email adress is already registered!";
    }

    //If the error messages array is empty, the registration runs
    if(empty($error_messages)){  
        $new_password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);     
        $contributor = false;
        $admin = false;

        //Run the function for register      
        register($new_username, 
            $new_password, 
            $contributor,
            $new_email,
            $admin);                 
    }
}
?>