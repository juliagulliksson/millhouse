<div class="blog_post max-characters">
    <article>
        <h2>
        <?= $article['post_title']; ?></h2>
        <h3>
            <span class="category-bold"><?= $article['title']; ?></span>
            <span class="dot">&bull;</span><?= replace_date($article['date']) ?> | 
            <span class="username"><?= $article['username'] ?><span>
        </h3>
        
        <p><?= string_length($article['text'], 65, $article['postID'])?></p>
        <a href="index.php?id=<?= $article['postID'] ?>" class="comments-counter">
            COMMENTS (<?= $article['comments']?>)
        </a>
    </article>
</div>