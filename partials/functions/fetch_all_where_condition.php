<?php
function fetch_all_where_condition($table, $column, $value){
    require 'partials/database.php';
    
    $statement = $pdo->prepare("SELECT *
    FROM $table
    WHERE $column = '$value'
    ");
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}