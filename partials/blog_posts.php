<div class="blog-post">
    <article>
        <h2>
            <a href="index.php?id=<?= $article['postID'] ?>#scroll"><?= $article['post_title']; ?></a>
        </h2>
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