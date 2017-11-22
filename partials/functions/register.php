<?php
function register ($username, $password, $boolean, $email, $admin){
    require "partials/database.php";
    
$my_sql = $pdo->prepare(
    "INSERT INTO users 
    (username, password, contributor, email, admin) 
    VALUES (:username, :password, :contributor, :email, :admin)"
); 

$my_sql->execute(array( 
    ":username"         => $username,  
    ":password"         => $password,
    ":contributor"      => $boolean,
    ":email"            => $email,
    ":admin"            => $admin
));
    echo $username . ' was successfully registered!';
}
?>