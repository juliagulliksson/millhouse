<div class="profile-wrapper">

    <?php if(isset($_GET['update'])):?>
        <p class="success-message">Your profile has been updated!</p>
    <?php endif; ?>

    <?php if(isset($_GET['pass'])):?>
        <p class="success-message">Your password has been updated!</p>
    <?php endif; ?>

    <div class="profile-container">
        <div class="profile">
            <img src="profile_includes/<?= $_SESSION['profile_picture'] ?>" alt="Profile photo" />
        </div>
        <div class="profile-info">
            <h1><?= $_SESSION['username']?></h1>
            <h2><?= split_email($_SESSION['email']); ?></h2>
            <?php 
            if($_SESSION['contributor'] == true): ?>
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
            endif; ?>
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
        } ?>
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