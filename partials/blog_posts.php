<div class="blog-post">
    <article>
        <h2>
            <a href="index.php?id=<?= $article['postID'] ?>#scroll"><?= $article['post_title']; ?></a>
        </h2>
        <h3>
            <span class="category-bold"><?= $article['title']; ?></span>
            <span class="dot">&bull;</span><?= replace_date($article['date']) ?> | 
            <span class="username"><?= $article['username'] ?></span>
        </h3>
        <img src="<?=$article['image']?>" 
        alt="<?=$article['alt_text']?>" 
        class="article_image">
        <p><?= string_length($article['text'], 65, $article['postID'])?></p>
        <a href="index.php?id=<?= $article['postID'] ?>#scroll" class="comments-counter">
        COMMENTS (<?= $article['comments']?>)
        </a>
    </article>
</div>