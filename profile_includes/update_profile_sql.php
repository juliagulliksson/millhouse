<?php
require "../partials/database.php";

$statement = $pdo->prepare( 
        "UPDATE users 
        SET username        = :username,
        email               = :email
        WHERE id            = :id" 
    ); 
    
    $statement->execute(array(  
        ":username"        => $new_username,
        ":email"           => $new_email,
        ":id"              => $user_id
    )); 
?>