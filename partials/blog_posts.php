<div class="blog_post">
    <article>
        <h3> <?= replace_date($article['date']) ?> | <?= $article['username'] ?></h3>
        <h2><?= $article['post_title']; ?></h2>
        <p><?= string_length($article['text'], 200)?></p>
        <a href="index.php?id=<?= $article['postID'] ?>" class="comments-count">
            Comments (<?= $article['comments']?>)
        </a>
        <h3>Category: <?= $article['title']; ?></h3>
    </article>
</div>