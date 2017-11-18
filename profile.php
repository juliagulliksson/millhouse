<?php

require 'partials/head.php';
require 'profile_includes/profile_sql.php';
?>

<?php
if(!isset($_GET['newpost'])):
?>

<div class="profile-container">
    <div class="profile">
        <img src="images/profile_photo.jpg" Alt="Profile photo" />
    </div>
    <div class="profile-info">
        <h4><?= $_SESSION['username']?></h4>
        <h3><?= $_SESSION['email']?></h3>
        <a href="profile.php?newpost=true">Write a new blog post</a>

    </div>
</div>
<div class="amount-container">
    <div class="amount">
       
        <?php
        foreach($profile_articles as $articles):
        ?>
        <h4><?= $articles['posts']?></h4>
        <?php endforeach; ?>
        <p>Blog posts</p>
    </div>
    <div class="amount">
        <?php
        foreach($profile_comments as $comments):
        ?>
        <h4><?= $comments['comments']?></h4>
        <?php
        endforeach;
        ?>
        <p>Comments</p>
    </div>
</div>
<div class="list-container">
    <h4>5 recent blog posts:</h4>
    <ul>
        <?php
        if(count($profile_blogposts) > 0):
            foreach($profile_blogposts as $blogposts):
        ?>
            <li><a href="index.php?id=<?= $blogposts['id']?>"><?= $blogposts['post_title'] ?></a></li>
            <?php
            endforeach;
        else:
            echo "You have not written any blogposts yet";
        endif;
        ?>
    </ul>
    <br />
    <h4>5 recent comments:</h4>
    <ul>
    <?php
    if(count($profile_comments_title) > 0):
        foreach($profile_comments_title as $comments):
    ?>
        <li><a href="index.php?id=<?= $comments['post_id'] ?>"><?= $comments['text']?></a></li>
    <?php
        endforeach;
    else:
        echo "You have not posted any comments yet";
    endif;
    ?>
    </ul>
</div>

<?php
endif;

if(isset($_GET['newpost'])):

    require 'partials/new_post.php';
?>


<?php
endif; //End of newpost if

require 'partials/footer.php';

?>