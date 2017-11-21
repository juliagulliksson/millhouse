<?php
//In progress
//Be able to see a list of blogposts the user has made, with Delete and Edit buttons without having to click on the
//indv blogposts
?>

<div class="blog_post">

    <article>
        <h2><?= $article['post_title']; ?></h2>
        <h3><span class="category-bold"><?= $article['title']; ?></span>
        <span class="dot">&bull;</span><?= replace_date($article['date']) ?>
        | <span class="username"><?= $article['username'] ?><span></h3>
        
        <p><?= string_length($article['text'], 15, $article['postID'])?></p>
        
        <a href="index.php?id=<?= $article['postID'] ?>" class="comments-count">
            Comments (<?= $article['comments']?>)
        </a>
    </article>
</div>