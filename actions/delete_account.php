<?php
header('location: ../index.php');
$user_id = $_GET['id'];
require '../partials/functions/delete_account.php';
//Run the function for delete account
delete_account($user_id);

session_start();
session_unset();
session_destroy();