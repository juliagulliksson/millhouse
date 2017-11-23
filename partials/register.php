<?php
    //If fields for register is filled
    if (!empty($_POST["register_username"]) &&
        !empty($_POST["register_password"]) &&
        !empty($_POST["register_email"])){
        
        $new_username = $_POST["register_username"];
                
        $new_email = $_POST["register_email"];
                    
        $new_password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);
                    
        $contributor = false;

        $admin = false;
                    
                
        //Variables with the name of the column to be checked
        $user_column = 'username';
        $email_column = 'email';
                
                    
        //Checks if username already exists
        $is_duplicate_username = check_if_duplicate($user_column, $new_username);
                
                
        //Checks if email already exists
        $is_duplicate_email =
        check_if_duplicate($email_column,
        $new_email);
                
                
        //Checks if username is already registered
        if ($is_duplicate_username){
            header('location: register.php?user=fail#scroll');
        }
                
                
        //Checks if email is aldready registered
        elseif ($is_duplicate_email){
            header('location: register.php?email=fail#scroll');
        }

        //If email or username doesn't exists the function for register runs
        elseif (!$is_duplicate_email &&
                !$is_duplicate_username){
                    
        register($new_username, 
            $new_password, 
            $contributor,
            $new_email,
            $admin);                 
        }}
?>