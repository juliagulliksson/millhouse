<?php
function check_if_duplicate($column, $value){
    require "partials/database.php";
        $my_sql = $pdo->prepare(
        "SELECT COUNT($column) as $column
        FROM users
        WHERE $column = '$value'"); 


        $my_sql->execute();
        $existing = $my_sql->fetch(PDO::FETCH_NUM);
    
        if ($existing[0] > 0){
            $is_duplicate = true;
        } else {
            $is_duplicate = false;
        } return $is_duplicate;
    }
?>