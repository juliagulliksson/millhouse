<?php
require 'partials/includes.php';
// Checks if user is logged in
if(!isset($_SESSION['signed_in']) && empty($_SESSION['signed_in'])){
    header('location: index.php');
    exit();
}
//If newpost is set and user is not logged in, redirect to index
if(isset($_GET['newpost'])):
    if (!isset($_SESSION['signed_in']) 
    || $_SESSION['contributor'] == false 
    || isset($_GET['id'])):
        header('location: index.php');
        exit();
    endif;
endif;

//If the submit button for write new blogpost has been clicked
if(isset($_GET['newpost'])):
    if(isset($_POST['newpost_submit'])):
        include 'actions/insert_blogpost_sql.php';
    endif;
endif;

require 'partials/head.php';
require 'profile_includes/profile_sql.php';
require 'partials/functions/split_email.php';

if(!isset($_GET['newpost']) && !isset($_GET['editpost'])
&& !isset($_GET['editcomment']) 
&& !isset($_GET['delete'])
&& !isset($_GET['edit'])):
?>
<div class="profile-wrapper">
    <div class="profile-container">
        <div class="profile">
            <img src="images/profile-photo.jpg" alt="Profile photo" />
        </div>
        <div class="profile-info">
            <h1><?= $_SESSION['username']?></h1>
            <h2><?= split_email($_SESSION['email']); ?></h2>
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
            if($profile_articles[0]['number_of_posts'] > 0):
                echo "<a href='index.php?upost=true#scroll'>";
            endif;
        ?>
            <div class="amount">
                <h4>
                    <?= $profile_articles[0]['number_of_posts'] ?>
                </h4>
                <p>Blog posts</p>
            </div>
            <!-- /.amount-collapse -->
        <?php
            if($profile_articles[0]['number_of_posts'] > 0):
                echo "</a>";
            endif;
        endif; // End of check if contributor 

        if($profile_comments[0]['number_of_comments'] > 0):
            echo "<a href='index.php?ucomments=true#scroll'>";
        endif;
        ?>
            <div class="amount">
                <h4>
                    <?= $profile_comments[0]['number_of_comments'] ?>
                </h4>
                <p>Comments</p>
            </div>
            <!-- /.amount-collapse -->
        <?php
        if($profile_comments[0]['number_of_comments'] > 0){
            echo "</a>";
        }
        ?>
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
                echo "<i>You have not written any blogposts yet</i>";
            endif;
            ?>
        </ul>
        <?php endif; // End of check if contributor ?>
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
                echo "<i>You have not posted any comments yet</i>";
            endif;
            ?>
        </ul>    
    </div>
    <!-- /.list-container-collapse -->
    <div class="button-container">
        <a class="edit" href="profile.php?edit=true#scroll">Edit profile</a>
        <a class="delete" href="profile.php?delete=true#scroll">Delete account</a>  
    </div>
</div>
<!-- /.profile-wrapper-collapse -->
<?php
endif;// End of main get if

// Edit account
if(isset($_GET['edit'])): 
    require 'profile_includes/edit_profile.php';
endif; // End of edit if

// Delete account
if(isset($_GET['delete'])): 
    require 'profile_includes/delete_profile.php';
endif; // End of delete if

if(isset($_GET['newpost'])):
    require 'profile_includes/new_post.php';
endif; // End of newpost if

if(isset($_GET['editpost'])):
    require 'profile_includes/edit_blogpost.php';
endif;// End of editpost if

if(isset($_GET['editcomment'])):
    require 'profile_includes/edit_comment_profile.php';
endif;// End of editcomment if

require 'partials/footer.php';
?>