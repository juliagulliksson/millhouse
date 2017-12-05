<?php
function log_in ($username, $password){
    require "partials/database.php";
    require "partials/functions/check_if_duplicate.php";

    //check if username is present in database
    $user_column = 'username';
    $existing_username = check_if_duplicate($user_column, $username);

    $my_sql = $pdo->prepare(
        "SELECT * FROM users 
        WHERE username = :username"
    );
    $my_sql->execute(array(
        ":username"    => $username
    ));
    $fetched_user = $my_sql->fetch(PDO::FETCH_ASSOC);
    
    if(!$existing_username){
        header('location: login.php?login=fail#scroll');
        exit();
    }
    if(!password_verify($password, $fetched_user["password"])){
        header('location: login.php?password=fail#scroll');
        exit();
    }

    //Initiates session variables if password is correct
    if (password_verify($password, $fetched_user["password"]) 
    && $existing_username){ 
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
}
?>