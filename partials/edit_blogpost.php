<?php

if(isset($_POST['submit'])):

    require 'database.php';
    
    $new_title = $_POST['edit_title'];
    $id = $_GET['id'];
    $new_text = $_POST['edit_text'];
    
    $statement = $pdo->prepare("UPDATE posts SET post_title = :newTitle, text = :newText WHERE id = :id");
    $statement->execute(array(
    ":newTitle" => $new_title,
    ":newText" => $new_text,
    ":id" => $id
    ));
    
endif;

$id = $_GET['id'];
?>

<form action="edit_blogpost.php?id=<?= $id ?>" method="POST">
<label for="edit_title">Title:</label>
<br/>
<input type="text" name="edit_title">
<br/>
<label for="edit_text">Edit:</label>
<br/>
<textarea name="edit_text" cols="70" rows="10"><?= $_GET['content']?></textarea>
<br/>
<input type="submit" name="submit">
<form>