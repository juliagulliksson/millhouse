<?php

function login ($username, $password)
{

require "partials/database.php";

$my_sql = $pdo->prepare(
    "SELECT * FROM users 
    WHERE username = :username"
);
    
$my_sql->execute(array(
  ":username"    => $username
));
    
$fetched_user = $my_sql->fetch(PDO::FETCH_ASSOC);   
 

if (password_verify($password, $fetched_user["password"]))
{
   $_SESSION["username"] = $fetched_user["username"];
                     
   $_SESSION["id"] = 
   $fetched_user["id"];
                     
   $_SESSION["contributor"] = $fetched_user["contributor"];
                     
   $_SESSION["email"] = 
   $fetched_user["email"];
                     
   $_SESSION["logged_in"] = true;

} 
    
else 
    
{
echo 'failed login';
  
}
}

?>