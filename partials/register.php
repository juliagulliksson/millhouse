           <?php
            
            
            //Ifall fälten för registrering fylls i
            if (isset($_POST["register_username"]) &&
               isset($_POST["register_password"]) &&
               isset($_POST["register_email"]))
                {
                    $new_username = $_POST["register_username"];
                
                    $new_email = $_POST["register_email"];
                    
                    $new_password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);
                    
                    $contributor = false;
                    
                
                    //Kollar ifall användarnamn redan finns
                    require "partials/functions/check_if_dublette.php";
                
                
                    //Variabler med namnen på kolumnerna som ska kollas
                    $user_column = 'username';
                    $email_column = 'email';
                
                    
                    //Kollar ifall username redan finns
                    $is_dublette_username = check_if_dublette($user_column, $new_username);
                
                
                    //Kollar ifall email redan finns
                    $is_dublette_email =
                    check_if_dublette($email_column,
                    $new_email);
                
                
                    //Ifall username redan är registrerad
                    if ($is_dublette_username)
                    {
                        echo 'The username already exists! <br/>';
                    }
                
                
                    //Ifall email redan är registrerad
                    elseif ($is_dublette_email)
                    {
                        echo 'The email address is already registered!';
                    }
                
                
                    //Ifall varken email eller username finns så anropas funktionen register
                    elseif (!$is_dublette_email &&
                           !$is_dublette_username)
                    {
                        require "partials/functions/register.php";
                    
                        register($new_username, 
                             $new_password, 
                             $contributor,
                             $new_email); 
                        
                        
                    }
                
                
                }
            
            ?>