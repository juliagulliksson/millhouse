<div class="blog_post">
    
            <article>
            <?php
                if(isset($_SESSION['signed_in'])):
                    if ($article['user_id'] == $_SESSION['id']):
                        ?>
                        <a href="profile.php?editpost=true&id=<?= $article['postID']?>&content=<?=$article['text'] ?>
                        &title=<?= $article['post_title']?>
                        &category_id=<?= $article['category_id']?>">
                        Edit your blog post here</a> 
                        <br/>
                        <a href="partials/delete_blogpost.php?id=<?= $article['postID']?>">Delete blog post</a>
                    <?php 
                    endif;
                endif;
                    ?>
        
        <h3><span class="category-bold"><?= $article['title']; ?></span><span class="dot">&bull;</span><?= replace_date($article['date']) ?> | <span class="username"><?= $article['username'] ?><span></h3>
        <h2><?= $article['post_title']; ?></h2>
        <p><?= string_length($article['text'], 15, $article['postID'])?></p>
        <a href="index.php?id=<?= $article['postID'] ?>" class="comments-count">
            Comments (<?= $article['comments']?>)
        </a>
        
    </article>
</div>

