<?php
// If fields for login is filled, the function login runs
if (isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    log_in($username, $password);  
} 
?>