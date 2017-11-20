<?php
//Setting the variables for pagination

$statement = $pdo->prepare("SELECT COUNT(id) FROM posts");
     $statement->execute();
     $number_of_rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                
     $last_page = ceil($number_of_rows[0]['COUNT(id)'] / 5);
            
     if (isset($_GET['page'])) {
            $page = $_GET['page'];       
        }else {
            $page = 1;
        }
                
      $offset_number = $page * 5 - 5;