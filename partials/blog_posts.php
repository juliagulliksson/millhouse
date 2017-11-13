
<div class="container">
    <main>
    <div class="blog_posts">
    
            <article>
                <h1><?= $article['post_title']; ?></h1>
                <h3>Category: <?= $article['title']; ?></h3>
                <h3>Writer: <?= $article['username'] ?></h3>
                <h3><?= replace_date($article['date']) ?></h3>
                <p><?= nl2br($article['text']) ?></p> <?php //replace n/ with <br> ?>
                <a href="index.php?id=<?= $article['postID'] ?>" class="comments-count">Comments(<?= $article['comments']?>)</a>
                
            </article>
            <div class="comment-field">
            <h3>Comment the blog post here:</h3>
            <form action="partials/comment_insert.php?post_id=<?= $article['postID']?>" method="POST">
                <input type="hidden" value=<?= $article['user_id'] ?> name="user_id">
                <input type="hidden" value="<?= $today ?>" name="date">
                <textarea name="comment" placeholder="Type your comment"></textarea>
                <input type="submit" name="comment_submit" value="Comment">
            </form>
            </div>
    </div>
</div>