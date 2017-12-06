<?php
function fetch_all_limit_5($table, $value, $order_by){
    require 'partials/database.php';

    $statement = $pdo->prepare("SELECT * FROM $table 
    WHERE user_id = '$value'
    ORDER BY posts.date DESC
    LIMIT 5
    ");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}