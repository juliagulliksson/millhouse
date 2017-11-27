<?php
function log_in ($username, $password){
    require "partials/database.php";

    //check if username is present in database
    $statement = $pdo->prepare(
        "SELECT COUNT(id) AS user_id FROM users 
        WHERE BINARY username = :username"
    );
    $statement->execute(array(
        ":username"    => $username
    ));
    $username_exist = $statement->fetch(PDO::FETCH_ASSOC);

    $my_sql = $pdo->prepare(
        "SELECT * FROM users 
        WHERE BINARY username = :username"
    );
    $my_sql->execute(array(
        ":username"    => $username
    ));
    $fetched_user = $my_sql->fetch(PDO::FETCH_ASSOC);  

    //Initiates session variables if password is correct
    if (password_verify($password, $fetched_user["password"]) 
    && $username_exist['user_id'] > 0){ 
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
            
    }elseif($username_exist['user_id'] <= 0) {
            header('location: login.php?login=fail#scroll');
            exit();
    }elseif(!password_verify($password, $fetched_user["password"])){
            header('location: login.php?password=fail#scroll');
            exit();
        }
}
?>