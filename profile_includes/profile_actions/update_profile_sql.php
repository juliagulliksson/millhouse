<?php
require "partials/database.php";
$user_id = $_SESSION['id'];

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
    
    $_SESSION["username"] = $new_username;
    $_SESSION["email"]    = $new_email;

    header('location: profile.php?update=success');