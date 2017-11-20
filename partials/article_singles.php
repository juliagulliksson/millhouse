<?php
$id = $_GET['id'];

//require SQL-queries
require 'partials/article_single_sql.php';
        
foreach ($article_single as $article):
?>
<div class="blog_post">
    <div class="go-back">
        <a href="index.php">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    <article>
        <h2><?= $article['post_title']; ?></h2>
        <h3><span class="category-bold">
            <?= $article['title']; ?></span>
            <span class="dot">&bull;</span><?= replace_date($article['date']) ?> | 
            <span class="username"><?= $article['username'] ?><span>
        </h3>
        <p><?= nl2br($article['text']) ?></p>   
    </article>
    <?php
        if(isset($_SESSION['signed_in'])):
            if ($article['user_id'] == $_SESSION['id']):
    ?>
    <a href="profile.php?editpost=true&id=<?= $article['postID']?>&content=<?=$article['text'] ?>
    &title=<?= $article['post_title']?>
    &category_id=<?= $article['category_id']?>">
    Edit <i class="fa fa-pencil" aria-hidden="true"></i></a> | 
    <a href="partials/delete_blogpost.php?id=<?= $article['postID']?>">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
    <?php 
            endif;
        endif;
endforeach;
        if(isset($_SESSION['username'])):
    ?>
    <div class="comment-field">
        <h4>Comment the blog post here:</h4>
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