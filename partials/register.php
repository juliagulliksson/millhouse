<?php
    //If fields for register is filled
    if (isset($_POST["register_username"]) &&
        isset($_POST["register_password"]) &&
        isset($_POST["register_email"])){
        
        $new_username = $_POST["register_username"];
                
        $new_email = $_POST["register_email"];
                    
        $new_password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);
                    
        $contributor = false;
                    
                
        //Variables with the name of the column to be checked
        $user_column = 'username';
        $email_column = 'email';
                
                    
        //Checks if username already excists
        $is_dublette_username = check_if_dublette($user_column, $new_username);
                
                
        //Checks if email already excists
        $is_dublette_email =
        check_if_dublette($email_column,
        $new_email);
                
                
        //Checks if username is already registered
        if ($is_dublette_username){
            echo 'The username already exists! <br/>';
        }
                
                
        //Checks if email is aldready registered
        elseif ($is_dublette_email){
            echo 'The email address is already registered!';
        }

        //If email or username doesn't excsists the function for register runs
        elseif (!$is_dublette_email &&
                !$is_dublette_username){
                    
        register($new_username, 
            $new_password, 
            $contributor,
            $new_email);                 
        }}
?>