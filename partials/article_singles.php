<?php
$id = $_GET['id'];

//require SQL-queries
require 'actions/article_single_sql.php';
?>
<div class="blog-post">
    <div class="go-back">
        <a href="index.php">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    <article>
        <h1><?= $article_single['post_title']; ?></h1>
        <h3><b><?= $article_single['title']; ?></b>
            <span class="dot">&bull;</span>
            <?= replace_date($article_single['date']) ?>
            <span class="dot">&bull;</span> 
            <span class="username">
                <a href="user.php?uid=<?= $article_single['user_id'] ?>#scroll">
                <?= $article_single['username'] ?></a>  
            </span>
        </h3>
        <?php if(!empty($article_single['image'])): ?>
        <img src="partials/<?=$article_single['image']?>" 
             alt="<?=$article_single['alt_text']?>" 
             class="article_image">
        <?php endif; ?> 
        <p><?= ($article_single['text']) ?></p>
        <?php // Edit and delete blog post options
        if(isset($_SESSION['signed_in'])):
            if($article_single['user_id'] == $_SESSION['id'] 
            || $_SESSION['admin'] == true):
        ?>
        <a class="profile-button" 
            href="profile.php?editpost=true&id=<?= $article_single['postID']?>#scroll">
            Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a class="profile-button" 
            href="actions/delete_blogpost.php?id=<?= $article_single['postID']?>">
            Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
        <?php
            endif;// End of check user/admin 
        endif;// End of signed in if 
        ?>  <!-- End of edit and delete buttons -->
    </article>
    <?php
    // article_single_sql.php is where $comments is made
    if(count($comments) > 0):
    ?>
    <div class="comments-container">
        <h4>Comments:</h4>
        <?php foreach($comments as $comment): ?>
        <div class="comments">
            <h3>
                <b><a href="user.php?uid=<?= $comment['user_id']?>#scroll">
                <?= $comment['username']?></a></b>
                <br />
                <?= replace_date($comment['date']) ?>
            </h3>
            <p><?= $comment['text']?> </p>
            <?php // Edit and delete comment options
            if(isset($_SESSION['signed_in'])):
                if($comment['user_id'] == $_SESSION['id'] 
                || $_SESSION['admin'] == true):
            ?>
            <a  class="profile-button"
                href="profile.php?editcomment=true&comment_id=<?= $comment['comment_id']?>
                &post_id=<?= $comment['post_id'] ?>#scroll">
                Edit comment <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a class="profile-button"
                href="actions/delete_comment.php?id=<?= $comment['comment_id']?>#scroll">
                Delete comment <i class="fa fa-trash" aria-hidden="true"></i></a>
            <?php 
                endif;//end of check user/admin
            endif;//end of signed in if ?>
        </div>
        <!-- comments-collapse -->
        <?php endforeach; ?>
    </div>
    <!-- /.comments-container-collapse -->
    <?php 
    endif; // END OF count comments if 

    if(isset($_SESSION['signed_in'])):
    ?>
    <div class="comment-field">
        <h4>Comment the blog post here:</h4>
        <form action="actions/comment_insert.php?post_id=<?= $article_single['postID']?>" method="POST">
            <input type="hidden" value="<?= $_SESSION['id'] ?>" name="user_id">
            <textarea name="comment" placeholder="Type your comment"></textarea>
            <br />
            <input type="submit" name="comment_submit" value="Comment">
        </form> 
    </div>
    <!-- /.comment-field-collapse -->
    <?php 
        else:
            echo "<br /><b><a href='login.php#scroll'>Sign in to comment</a></b>";
        endif; // End of isset username if 
    ?>
</div>
<!-- /.blog_post-collapse -->