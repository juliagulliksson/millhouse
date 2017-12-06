<?php
function fetch_count_as($column, $renamed, $table, $condition, $value){
    require 'partials/database.php';

    $statement = $pdo->prepare("SELECT COUNT($column) as $renamed 
    FROM $table
    WHERE $condition = '$value'
    ");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}