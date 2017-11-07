<?php

function login ($username, $password)
{
require "partials/start_session.php";
require "partials/database.php";

$my_sql = $pdo->prepare(
    "SELECT * FROM users 
    WHERE username = :username"
);
    
$my_sql->execute(array(
  ":username" => $username
));

    
$fetched_user = $my_sql->fetch(PDO::FETCH_ASSOC);
    
    //$hash = password_hash($fetched_user["password"], PASSWORD_DEFAULT);   
 

if (password_verify($password, $fetched_user["password"]))
{
    
  $_SESSION["user"] = $fetched_user;
  $_SESSION["loggedIn"] = true;


  //header("Location: index.php");
    echo 'Welcome ' . $user;

} 
    
else 
    
{
echo 'failed login';
  //header("Location: failed_log_in.php");
  
}
}

?>