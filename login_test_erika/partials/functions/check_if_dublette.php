<?php

function check_if_dublette ($username)
{
      require "partials/database.php";
    
        $my_sql = $pdo->prepare(
            "SELECT COUNT(username) 
            FROM users
            WHERE username = '$username'"
             ); 


        $my_sql->execute();
    
        $existing_usernames = $my_sql->fetch();
    
        if ($existing_usernames[0] >= 1)
        {
            $is_dublette = true;
        }
        
        else 
        {
            $is_dublette = false;
        }
    
       return $is_dublette;
    
}

?>