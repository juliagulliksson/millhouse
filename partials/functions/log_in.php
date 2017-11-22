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

//Initiates session variables if password is correct
if (password_verify($password, $fetched_user["password"])){ 
   $_SESSION["username"] = 
       $fetched_user["username"];
    
   $_SESSION["id"] = 
       $fetched_user["id"];
    
   $_SESSION["contributor"] = 
       $fetched_user["contributor"];
    
   $_SESSION["email"] = 
       $fetched_user["email"];
    
   $_SESSION["signed_in"] = true;

   $_SESSION["admin"] =
        $fetched_user["admin"];
} 
else {
    echo 'Failed login';}}
?>