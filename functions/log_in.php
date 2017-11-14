<?php

function log_in ($username, $password){
require "partials/database.php";

$my_sql = $pdo->prepare(
    "SELECT * FROM users 
    WHERE username = :username"
);
    
$my_sql->execute(array(
  ":username"    => $username
));
    
$fetched_user = $my_sql->fetch(PDO::FETCH_ASSOC);   
 

//Initierar session-variabler ifall lösenordet stämmer
if (password_verify($password, $fetched_user["password"]))
{ 
   $_SESSION["username"] = 
       $fetched_user["username"];
    
   $_SESSION["id"] = 
       $fetched_user["id"];
    
   $_SESSION["contributor"] = 
       $fetched_user["contributor"];
    
   $_SESSION["email"] = 
       $fetched_user["email"];
    
   $_SESSION["signed_in"] = true;
    
   //$_SESSION = (array(
       //"username"       => $fetched_user["username"],
       //"id"             => $fetched_user["id"],
       //"contributor"    => $$fetched_user["contributor"],
       //"email"          => $fetched_user["email"],
       //"signed_in"      => true
   //));

} 
    
else {
    echo 'failed login';}}

?>