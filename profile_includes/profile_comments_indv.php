<div class="blog-post">
    <article>
    <h1 id="smaller-heading"><span id="normal">Posted on:</span> <a href="index.php?id=<?= $comment['postID']?>">
    <?= $comment['post_title'] ?></a></h1>
    <h2><?= replace_date($comment['date']) ?></h2>
    <p><?= $comment['text'] ?></p>

    <?php // Edit and delete options
    if (isset($_SESSION['signed_in'])):
        if($comment['user_id'] == $_SESSION['id']
        || $_SESSION['admin'] == true):
    ?> 
    <a class="edit-button" href="profile.php?editcomment=true&comment_id=<?= $comment['comment_id']?>#scroll">
        Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
    <a class="delete-button" href="actions/delete_comment.php?id=<?= $comment['comment_id']?>">
        Delete <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
    <?php 
        endif;//end of check if signed in
    endif;//end of user/admin check ?>  
    </article>
</div>