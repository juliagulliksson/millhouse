<?php
require 'partials/head.php';

//checks if user is logged in
if(!isset($_SESSION['signed_in']) && empty($_SESSION['signed_in'])){
    header('location: index.php');
    exit();
}
require 'profile_includes/profile_sql.php';

if(!isset($_GET['newpost']) && !isset($_GET['editpost'])
&& !isset($_GET['editcomment'])):
?>
<div class="profile-wrapper">
    <div class="profile-container">
    
        <div class="profile">
            <img src="images/profile_photo.jpg" Alt="Profile photo" />
        </div>
        <div class="profile-info">
            <h1><?= $_SESSION['username']?></h1>
            <h2><?= $_SESSION['email']?></h2>
            <?php 
            if($_SESSION['contributor'] == true):
            ?>
            <a href="profile.php?newpost=true#scroll">Write a new blog post</a>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.profile-container-collapse -->
    <div class="amount-container">
        <?php
        if($_SESSION['contributor'] == true):
        ?>
        <div class="amount">
            <?php foreach($profile_articles as $articles): ?>
            <h4><a href="index.php?upost=true#scroll"><?= $articles['number_of_posts']?></a></h4>
            <?php endforeach; ?>
            <p>Blog posts</p>
        </div>
        <?php 
        endif; //end of check if contributor ?>
        <div class="amount">
            <?php foreach($profile_comments as $comment): ?>
            <h4><a href="index.php?ucomments=true#scroll"><?= $comment['number_of_comments']?></a></h4>
            <?php endforeach; ?>
            <p>Comments</p>
        </div>
    </div>
    <!-- /.amount-container-collapse -->
    <div class="list-container">
        <?php 
        if($_SESSION['contributor'] == true):
        ?>
        <h4>Most recent blog posts:</h4>
        <ul>
            <?php
            if(count($profile_blogposts) > 0):
                foreach($profile_blogposts as $blogpost):
            ?>
            <li>
                <a href="index.php?id=<?= $blogpost['id']?>#scroll">
                <?= $blogpost['post_title'] ?></a>
            </li>
            <?php
                endforeach;
            else:
                echo "You have not written any blogposts yet";
            endif;
            ?>
        </ul>
        <?php endif;//end of check if contributor ?>
        <h4>Most recent comments:</h4>
        <ul>
            <?php
            if(count($profile_comments_title) > 0):
                foreach($profile_comments_title as $comments):
            ?>
            <li>
                <a href="index.php?id=<?= $comments['post_id'] ?>#scroll">
                <?= $comments['text']?></a>
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
endif;

if(isset($_GET['newpost'])):
    require 'partials/new_post.php';
endif; //End of newpost if

if(isset($_GET['editpost'])):
    require 'partials/edit_blogpost.php';
endif;//end of editpost if

if(isset($_GET['editcomment'])):
    require 'profile_includes/edit_comment_profile.php';
endif;//end of editcomment if


require 'partials/footer.php';
?>