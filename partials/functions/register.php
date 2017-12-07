<?php
function register ($username, $password, $boolean, $email, $admin){
    require "partials/database.php";

$my_sql = $pdo->prepare(
    "INSERT INTO users 
    (username, 
    password, 
    contributor, 
    email, 
    admin, 
    profile_picture) 
    VALUES (:username, 
    :password, 
    :contributor, 
    :email, 
    :admin,
    :profile_picture)"
); 

$my_sql->execute(array( 
    ":username"         => $username,  
    ":password"         => $password,
    ":contributor"      => $boolean,
    ":email"            => $email,
    ":admin"            => $admin,
    ":profile_picture"  => "profile_pictures/default_profile_picture.jpg"
));
    header("location: register.php?register=success&username=$username#scroll");
}