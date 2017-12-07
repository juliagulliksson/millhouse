<div class="profile-wrapper">
    <div class="profile-container">
        <div class="profile">
            <img src="profile_includes/<?= $user_info['profile_picture'] ?>" Alt="Profile photo" />
        </div>
        <div class="profile-info">
            <h1><?= $user_info['username']?></h1>
            <h2>
                <a href="mailto:<?= ($user_info['email']);?>">
                    <?= split_email($user_info['email']);?>
                </a>
            </h2>
        </div>
    </div>
    <!-- /.profile-container-collapse -->
    <div class="amount-container">
        <?php 
        if($user_info['contributor'] == true): 
            if($user_articles[0]['number_of_posts'] > 0): ?>
                <a href="index.php?upost=true&uid=<?= $user_info['id'] ?>#scroll">
            <?php
            endif; ?>
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
        endif; //end of check if contributor 
            if($user_comments[0]['number_of_comments'] > 0): ?>
                <a href="index.php?ucomments=true&ucid=<?= $user_info['id'] ?>#scroll">
            <?php endif; ?>
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
    </div>
    <!-- /.amount-container-collapse -->
    <div class="list-container">
        <?php
        if($user_info['contributor'] == true): ?>
            <h4>Most recent blog posts:</h4>
            <ul>
                <?php
                if(count($user_blogposts) > 0):
                    foreach($user_blogposts as $blogpost): ?>
                <li>
                    <a href="index.php?id=<?= $blogpost['id']?>#scroll">
                    <?= $blogpost['post_title'] ?></a>
                </li>
                <?php
                    endforeach;
            else:
                echo "<i>This user has not written any blogposts yet</i>";
        endif; ?>
        </ul>
        <?php endif;//end of check if contributor ?>
        <h4>Most recent comments:</h4>
        <ul>
            <?php 
            if(count($user_comments_title) > 0):
                foreach($user_comments_title as $comment): ?>
            <li>
                <a href="index.php?id=<?= $comment['post_id'] ?>#scroll">
                <?= $comment['text']?></a>
            </li>
            <?php
                endforeach;
            else:
                echo "<i>This user has not posted any comments yet</i>";
            endif; ?>
        </ul>
    </div>
    <!-- /.list-container-collapse -->
    <?php if(isset($_SESSION['admin'])):
            if($_SESSION['admin'] == true): ?>
                <div class="button-container">
                    <a class="delete" href="user.php?uid=<?= $id ?>&delete=true#scroll">
                    Delete account</a>  
                </div>
    <?php   endif;
        endif; ?>
</div>
<!-- /.profile-wrapper-collapse -->