<?php

function register ($username, $password, $boolean, $email){
    require "partials/database.php";
    
    $my_sql = $pdo->prepare(
        "INSERT INTO users 
        (username, password, contributor, email) 
        VALUES (:username, :password, :contributor, :email)"
     ); 


    $my_sql->execute(array( 
        ":username"         => $username,  
        ":password"         => $password,
        ":contributor"   => $boolean,
        ":email"            => $email
    ));
    
    echo $username . ' was successfully registered!';
}

?>