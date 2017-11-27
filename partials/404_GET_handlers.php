<?php
// $_GET['id] error checks
if(isset($_GET['id'])):
    $get_id = $_GET['id'];
    $statement = $pdo->prepare(
    "SELECT COUNT(id) as post_id
    FROM posts
    WHERE id = :id"); 
    $statement->execute(array(
        ":id" => $get_id
    ));
    $existing = $statement->fetch(PDO::FETCH_NUM);
    // Check if post exists
    if($existing[0] <= 0):
        header('location: 404.php');
        exit();
    endif;

    if($_GET['id'] == NULL):
        header('location: 404.php');
        exit();
    endif;

    if(!is_numeric($_GET['id'])):
        header('location: 404.php');
        exit();
    endif;
endif;// End of $_GET['id] error checks