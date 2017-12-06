<?php
require "partials/database.php";
$statement = $pdo->prepare( 
        "UPDATE users 
        SET password = :password
        WHERE id     = :id" 
    ); 
    
    $statement->execute(array(  
        ":password" => $new_password,
        ":id"       => $user_id
    )); 
?>