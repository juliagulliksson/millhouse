<?php

function register ($username, $password, $boolean, $email)
{
      require "partials/database.php";
    
        $my_sql = $pdo->prepare(
            "INSERT INTO users 
            (username, password, is_distributor, email) 
            VALUES (:username, :password, :is_distributor, :email)"
             ); 


        $my_sql->execute(array( 
            ":username"         => $username,  
            ":password"         => $password,
            ":is_distributor"   => $boolean,
            ":email"            => $email));
    
}

?>