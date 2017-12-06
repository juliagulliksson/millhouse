<?php
$password = $_POST['old_password'];
$username = $_SESSION['username'];

if(!empty($_POST['new_password']) 
&& !empty($_POST['verify_new_password']) && !empty($password)){

    $table = "users";
    $column = "username";

    $fetched_user = fetch_all_where_condition($table, $column, $username);

    if(password_verify($password, $fetched_user['password'])){
        $new_password = $_POST['new_password'];
        $password_verify = $_POST['verify_new_password'];

        if($new_password != $password_verify){
            $update_ok = false;
            $error_messages[] = "The passwords do not match";
        }else{
            $update_ok = true;
            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            require "profile_includes/profile_actions/change_password_sql.php";
        }
    }else{
            $update_ok = false;
            $error_messages[] = "The password is incorrect";
    }
}else{
    $error_messages[] = "Fill in the required fields";
}