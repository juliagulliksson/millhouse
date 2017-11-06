<?php

function register ($username, $password, $boolean)
{
      require "partials/database.php";
    
        $my_sql = $pdo->prepare(
            "INSERT INTO users (username, password, is_distributor) 
            VALUES (:username, :password, :is_distributor)"
             ); 


        $my_sql->execute(array( 
            ":username" => $username,  
            ":password" => $password,
            ":is_distributor" => $boolean));
    
       //header("Location: index.php");
}

?>