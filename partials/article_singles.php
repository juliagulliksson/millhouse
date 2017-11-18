    
<a href="index.php" class="go-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go back</a>
<?php
$id = $_GET['id'];

//require SQL-queries
require 'partials/function_article.php';
        
foreach ($article_single as $article):
?>

<div class="blog_post">
    <article>
        <h2><?= $article['post_title']; ?></h2>
        <h3><span class="category-bold">
            <?= $article['title']; ?></span><span class="dot">&bull;</span><?= replace_date($article['date']) ?> | <span class="username"><?= $article['username'] ?><span>
        </h3>
        <p><?= nl2br($article['text']) ?></p>
                
    </article>
    <?php
endforeach;
        if(isset($_SESSION['username'])):
    ?>
    <div class="comment-field">
        <h3>Comment the blog post here:</h3>
        <form action="partials/comment_insert.php?post_id=<?= $article['postID']?>" method="POST">
            <input type="hidden" value=<?= $_SESSION['id'] ?> name="user_id">
            <input type="hidden" value="<?= $today ?>" name="date">
            <textarea name="comment" placeholder="Type your comment"></textarea>
            <br />
            <input type="submit" name="comment_submit" value="Comment">
    </form>
        
    </div>
    <!-- /.comment-field-collapse -->
</div>
<!-- /.blog_post-collapse -->
    <?php 
        else:
            echo "<b>Sign in to comment</b>";

        endif; //end of isset username if
        ?>
    <?php
//function_article.php is where $comments is made
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

