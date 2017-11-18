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

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>
</head>

<form action="edit_blogpost.php?id=<?= $id ?>" method="POST">
<label for="edit_title">Title:</label>
<br/>
<input type="text" name="edit_title">
<br/>
<label for="edit_text">Edit:</label>
<br/>
<textarea name="edit_text" id="editor"><?= $_GET['content']?></textarea>
        <script>
            ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        </script>
<br/>
<input type="submit" name="submit">
<form>
</body>
</html>