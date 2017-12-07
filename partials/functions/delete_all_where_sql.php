<?php
function delete_all_where($table, $column, $value){
  require '../partials/database.php';
  
  $statement = $pdo->prepare(
    "DELETE FROM $table WHERE $column = '$value'");
  $statement->execute();
}