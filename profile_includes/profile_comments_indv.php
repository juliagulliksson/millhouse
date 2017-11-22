<div class="blog-post">
    <article>
    <h2> Posted on: <a href="index.php?id=<?= $comment['postID']?>">
    <?= $comment['post_title'] ?></a></h2>
    <h3><?= replace_date($comment['date']) ?></h3>
    <p><?= $comment['text'] ?></p>

    <?php // Edit and delete options
    if (isset($_SESSION['signed_in']) && $comment['user_id'] == $_SESSION['id']):
    ?> 
    <a class="profile-button" 
    href="profile.php?editpost=true&id=<?= $comment['comment_id']?>">
        Edit <i class="fa fa-pencil" aria-hidden="true"></i>
    </a>
    <a class="profile-button" 
    href="actions/delete_comment.php?id=<?= $comment['comment_id']?>">
        Delete <i class="fa fa-trash" aria-hidden="true"></i>
    </a>
    <?php endif; ?>  
    </article>
</div>