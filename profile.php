<?php
require 'partials/includes.php';

//checks if user is logged in
if(!isset($_SESSION['signed_in']) && empty($_SESSION['signed_in'])){
    header('location: index.php');
    exit();
}
require 'partials/head.php';
require 'profile_includes/profile_sql.php';


if(!isset($_GET['newpost']) && !isset($_GET['editpost'])
&& !isset($_GET['editcomment']) 
&& !isset($_GET['delete'])):
?>
<div class="profile-wrapper">
    <div class="profile-container">
    
        <div class="profile">
            <img src="images/profile_photo.jpg" alt="Profile photo" />
        </div>
        <div class="profile-info">
            <h1><?= $_SESSION['username']?></h1>
            <h2><?= $_SESSION['email']?></h2>
            <?php 
            if($_SESSION['contributor'] == true):
            ?>
            <h3>
                <a href="profile.php?newpost=true#scroll">
                   Write a new blog post <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </h3>
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
            <h4>
                <a href="index.php?upost=true#scroll"><?= $articles['number_of_posts']?></a>
            </h4>
            <?php endforeach; ?>
            <p>Blog posts</p>
        </div>
        <?php 
        endif; //end of check if contributor ?>
        <div class="amount">
            <h4>
                <?php 
                if($profile_comments[0]['number_of_comments'] > 1): ?>
                    <a href="index.php?ucomments=true#scroll">
                    <?= $profile_comments[0]['number_of_comments'];?> <p>Comments</p></a>
                    <?php 
                    else: 
                        echo $profile_comments[0]['number_of_comments'] . "<p>Comments</p>";
                endif; ?>
                
            </h4>
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
    <div class="delete-account">
            <a class="delete" href="profile.php?delete=true#scroll">Delete account</a>
            
    </div>
</div>
<!-- /.profile-wrapper-collapse -->
<?php
endif;//end of main get if

if(isset($_GET['delete'])):?>
    <div class="delete-account">
        <p>Are you sure? You will delete all your comments and blogposts</p>
        <a href="profile.php" class="delete-go-back">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back</a>
        <a class="delete" href="actions/delete_account.php?id=<?= $_SESSION['id']?>">
        Delete account</a>          
    </div>
<?php 
endif; //end of delete if

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