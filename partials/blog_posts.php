<div class="blog_post">
    
            <article>
                <?php
                if(isset($_SESSION['signed_in'])):
                    if ($article['user_id'] == $_SESSION['id']):
                        ?>
                        <a href="partials/edit_blogpost.php?id=<?= $article['postID']?>&content=<?=$article['text'] ?>">Edit your blog post here</a> 
                        <br/>
                        <a href="partials/delete_blogpost.php?id=<?= $article['postID']?>">Delete blog post</a>
                    <?php 
                    endif;
                endif;
                    ?>

               
        <h3> <?= replace_date($article['date']) ?> | <?= $article['username'] ?></h3>
        <h2><?= $article['post_title']; ?></h2>
        <p><?= string_length($article['text'], 200)?></p>
        <a href="index.php?id=<?= $article['postID'] ?>" class="comments-count">
            Comments (<?= $article['comments']?>)
        </a>
        <h3>Category: <?= $article['title']; ?></h3>
    </article>
</div>

