<div class="blog-post">
    <article>
        <h1>
            <a href="index.php?id=<?= $article['postID'] ?>#scroll"><?= $article['post_title']; ?></a>
        </h1>
        <h2>
            <span class="category-bold"><a href="index.php?category=<?= $article['category_id']?>">
            <?= $article['title']; ?></a></span>
            <span class="dot">&bull;</span><?= replace_date($article['date']) ?>
            <span class="dot">&bull;</span>
            <b><a href="user.php?uid=<?= $article['user_id'] ?>#scroll">
            <?= $article['username'] ?></a></b>
        </h2>
        <?php if(!empty($article['image'])): ?>
        <img src="partials/<?=$article['image']?>" 
             alt="<?=$article['alt_text']?>" 
             class="article_image">
        <?php endif; ?>
        <p><?= string_length($article['text'], 65, $article['postID'])?></p>
        <a href="index.php?id=<?= $article['postID'] ?>#scroll" class="comments-counter">
        COMMENTS (<?= $article['comments']?>)
        </a>
    </article>
</div>