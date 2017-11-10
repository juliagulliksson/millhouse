<?php

function check_if_dublette ($column, $value)
{
    
        $my_sql = $pdo->prepare(
            "SELECT COUNT($column) as $column
            FROM users
            WHERE $column = '$value'"
             ); 


        $my_sql->execute();
        $existing = $my_sql->fetch(PDO::FETCH_NUM);
    
        if ($existing[0] >= 1)
        {
            $is_dublette = true;
        }
        
        else 
        {
            $is_dublette = false;
        }
    
       return $is_dublette;
    
}

?>