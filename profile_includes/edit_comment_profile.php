<?php
$comment_id = $_GET['comment_id'];
require 'actions/main_sql.php';
$statement = $pdo->prepare("SELECT * FROM comments 
WHERE id = :id");
$statement->execute(array(
    ":id" => $comment_id
));
$edit_comment = $statement->fetch(PDO::FETCH_ASSOC);
?>
<div class="insert-form">
    <div class="go-back">
        <?php
        if(isset($_GET['post_id'])):
        ?>
        <a href="index.php?id=<?= $_GET['post_id'] ?>#scroll">
        <?php 
        elseif(!isset($_GET['post_id'])):
        ?>
        <a href="profile.php#scroll">
        <?php endif; ?>
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    <div class="center-heading"><h1>Edit comment</h1></div>
    <form action="actions/edit_comment.php?comment_id=<?= $comment_id ?>" method="POST">
    <textarea name="edit_comment"><?= $edit_comment['text']?></textarea>
    <input type="submit" name="submit" value="Submit">
    </form>
</div>
<!-- /.insert-form-collapse -->