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
        <h2><?= $article_single['post_title']; ?></h2>
        <h3><span class="category-bold">
            <?= $article_single['title']; ?></span>
            <span class="dot">&bull;</span><?= replace_date($article_single['date']) ?> | 
            <span class="username"><?= $article_single['username'] ?> | <span>
            <?php // Edit and delete options
            if (isset($_SESSION['signed_in']) && $article_single['user_id'] == $_SESSION['id']):
            ?>
            <a href="profile.php?editpost=true&id=<?= $article_single['postID']?>">
                Edit <i class="fa fa-pencil" aria-hidden="true"></i>
            </a> | 
            <a href="partials/delete_blogpost.php?id=<?= $article_single['postID']?>">
                Delete <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
            <?php endif; ?>  
        </h3>
        <p><?= ($article_single['text']) ?></p> 
    </article>
   <?php
    if(isset($_SESSION['signed_in'])):
    ?>
    <div class="comment-field">
        <h4>Comment the blog post here:</h4>
        <form action="actions/comment_insert.php?post_id=<?= $article_single['postID']?>" method="POST">
            <input type="hidden" value=<?= $_SESSION['id'] ?> name="user_id">
            <textarea name="comment" placeholder="Type your comment"></textarea>
            <br />
            <input type="submit" name="comment_submit" value="Comment">
        </form> 
    </div>
    <!-- /.comment-field-collapse -->
    <?php 
        else:
            echo "<a href='login.php#scroll'><b>Sign in to comment</b></a>";

        endif; //end of isset username if
        ?>
</div>
<!-- /.blog_post-collapse -->
    
    <?php
//article_single_sql.php is where $comments is made
    if(count($comments) > 0):
        ?>
        <h2>Comments:</h2>
        <?php
        foreach($comments as $comment): 
        ?>
            <div class="comments-box">
            <h3><?= replace_date($comment['date']) ?> | <span class="username">
            <?= $comment['username']?><span></h3>
                <p><?= $comment['text']?> </p>
            </div>
        <!-- comments-box-collapse -->
        <?php 
        endforeach; 
    endif; //END OF count comments if