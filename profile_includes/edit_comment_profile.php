<?php
$comment_id = $_GET['comment_id'];
require 'actions/sql.php';
$statement = $pdo->prepare("SELECT * FROM comments 
WHERE id = :id");
$statement->execute(array(
    ":id" => $comment_id
));
$edit_comment = $statement->fetch(PDO::FETCH_ASSOC);
?>
<div class="insert-form">
    <div class="center-heading"><h2>Edit comment</h2></div>
    <form action="actions/edit_comment.php?comment_id=<?= $comment_id ?>" method="POST">
    <textarea name="edit_comment"><?= $edit_comment['text']?></textarea>
    <input type="submit" name="submit" value="Submit">
    </form>
</div>
<!-- /.insert-form-collapse -->