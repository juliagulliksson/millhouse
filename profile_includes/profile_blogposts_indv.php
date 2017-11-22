 <div class="blog-post">
    <article>
        <h1><?= $article['post_title']; ?></h1>
        
        <h3><span class="category-bold">
            <?= $article['title']; ?></span>
            <span class="dot">&bull;</span><?= replace_date($article['date']) ?> 
            <span class="username">
                <?php // Edit and delete options
                if (isset($_SESSION['signed_in']) 
                && $article['user_id'] == $_SESSION['id']):
                ?> 
                <a class="profile-button" 
                href="profile.php?editpost=true&id=<?= $article['postID']?>">
                    Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="profile-button" 
                href="actions/delete_blogpost.php?id=<?= $article['postID']?>">
                    Delete <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
                <?php endif; ?> 
            </span>
        </h3>
        <p><?= $article['text'] ?></p>
        <a href="index.php?id=<?= $article['postID'] ?>" class="comments-count">
        Comments (<?= $article['comments']?>)
        </a>
    </article>
</div>