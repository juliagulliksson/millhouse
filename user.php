<?php

require 'partials/includes.php';

// Check if the get request is numeric
if(!is_numeric($_GET['uid'])){
    header('location: index.php');
    exit();
}
// Check if the user id equals the logged in user, if so redirect to profile
if(isset($_SESSION['signed_in'])){
    if($_GET['uid'] == $_SESSION['id']){
		header('location: profile.php');
		exit();
    }
}
require 'partials/head.php';
require 'profile_includes/user_sql.php';
require 'partials/functions/split_email.php';

?>
<div class="profile-wrapper">
    <div class="profile-container">
        <div class="profile">
            <img src="images/profile-photo.jpg" Alt="Profile photo" />
        </div>
        <div class="profile-info">
            <h1><?= $user_info['username']?></h1>
            <h2><?= split_email($user_info['email']);?></h2>
        </div>
    </div>
    <!-- /.profile-container-collapse -->
    <div class="amount-container">
    <?php if($user_info['contributor'] == true): 
            if($user_articles[0]['number_of_posts'] > 0): ?>
                <a href="index.php?upost=true&uid=<?= $user_info['id'] ?>#scroll">
            <?php
            endif;
        ?>
            <div class="amount">
                <h4>
                    <?= $user_articles[0]['number_of_posts'] ?>
                </h4>
                <p>Blog posts</p>
            </div>
            <!-- /.amount-collapse -->
        <?php
            if($user_articles[0]['number_of_posts'] > 0):
                echo "</a>";
            endif;

        endif; //end of check if contributor ?>
        
            <?php
            if($user_comments[0]['number_of_comments'] > 0): ?>
                <a href="index.php?ucomments=true&ucid=<?= $user_info['id'] ?>#scroll">
            <?php
            endif;
        ?>
            <div class="amount">
                <h4>
                    <?= $user_comments[0]['number_of_comments'] ?>
                </h4>
                <p>Comments</p>
            </div>
            <!-- /.amount-collapse -->
        <?php
            if($user_comments[0]['number_of_comments'] > 0):
                echo "</a>";
            endif; ?>
            
        </a>
    </div>
    <!-- /.amount-container-collapse -->
    <div class="list-container">
        <?php
        if($user_info['contributor'] == true):
        ?>
            <h4>Most recent blog posts:</h4>
            <ul>
                <?php
                if(count($user_blogposts) > 0):
                    foreach($user_blogposts as $blogpost):
                ?>
                <li>
                    <a href="index.php?id=<?= $blogpost['id']?>#scroll">
                    <?= $blogpost['post_title'] ?></a>
                </li>
                <?php
                    endforeach;
            else:
                echo "This user has not written any blogposts yet";
        endif;
            ?>
        </ul>
        <?php endif;//end of check if contributor ?>
        <h4>Most recent comments:</h4>
        <ul>
            <?php
            if(count($user_comments_title) > 0):
                foreach($user_comments_title as $comment):
            ?>
            <li>
                <a href="index.php?id=<?= $comment['post_id'] ?>#scroll">
                <?= $comment['text']?></a>
            </li>
            <?php
                endforeach;
            else:
                echo "This user has not posted any comments yet";
            endif;
            ?>
        </ul>
    </div>
    <!-- /.list-container-collapse -->
</div>
<!-- /.profile-wrapper-collapse -->

<?php require 'partials/footer.php'; ?>