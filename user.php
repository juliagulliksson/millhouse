<?php
require 'partials/head.php';

//check if the get request is numeric and the user id equals the logged in user
if(!is_numeric($_GET['uid']) && $_GET['uid'] == $_SESSION['id']){
    header('location: index.php');
    exit();
}

require 'profile_includes/user_sql.php';

?>
<div class="profile-wrapper">
    <div class="profile-container">
        <div class="profile">
            <img src="images/profile_photo.jpg" Alt="Profile photo" />
        </div>
        <div class="profile-info">
            <h4><?= $user_info['username']?></h4>
            <h3><?= $user_info['email']?></h3>
        </div>
    </div>
    <!-- /.profile-container-collapse -->
    <div class="amount-container">
        <div class="amount">
            <?php foreach($user_articles as $article): ?>
            <h4><a href="index.php?upost=true&uid=<?= $user_info['id'] ?>#scroll"><?= $article['number_of_posts']?></a></h4>
            <?php endforeach; ?>
            <p>Blog posts</p>
        </div>
        <div class="amount">
            <?php foreach($user_comments as $comment): ?>
            <h4><?= $comment['number_of_comments']?></h4>
            <?php endforeach; ?>
            <p>Comments</p>
        </div>
    </div>
    <!-- /.amount-container-collapse -->
    <div class="list-container">
        <h4>Most recent blog posts:</h4>
        <ul>
            <?php
            if(count($user_blogposts) > 0):
                foreach($user_blogposts as $blogpost):
            ?>
            <li>
                <a href="index.php?id=<?= $blogpost['id']?>">
                <?= $blogpost['post_title'] ?></a>
            </li>
            <?php
                endforeach;
            else:
                echo "You have not written any blogposts yet";
            endif;
            ?>
        </ul>
        <h4>Most recent comments:</h4>
        <ul>
            <?php
            if(count($user_comments_title) > 0):
                foreach($user_comments_title as $comment):
            ?>
            <li>
                <a href="index.php?id=<?= $comment['post_id'] ?>">
                <?= $comment['text']?></a>
            </li>
            <?php
                endforeach;
            else:
                echo "You have not posted any comments yet";
            endif;
            ?>
        </ul>
    </div>
    <!-- /.list-container-collapse -->
</div>
<!-- /.profile-wrapper-collapse -->
<?php

require 'partials/footer.php'; ?>