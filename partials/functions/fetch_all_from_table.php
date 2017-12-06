<?php
function fetch_all($table){
    require 'partials/database.php';

    $statement = $pdo->prepare("SELECT *
    FROM $table
    ");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
