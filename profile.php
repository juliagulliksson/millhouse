<?php
require 'partials/head.php';
require 'profile_includes/profile_sql.php';
?>

<div class="profile-container">
    <div class="profile">
        <img src="images/profile_photo.jpg" Alt="Profile photo" />
    </div>
    <div class="profile-info">
        <h4><?= $_SESSION['username']?></h4>
        <h3><?= $_SESSION['email']?></h3>
        <h3><?= var_dump($_SESSION)?></h3>

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
        <li>En ganska långt titel som inte är kort för den är lång och inte kort</li>
        <li>Lorem ipsum tjohoooo</li>
        <li>Blogginlägg</li>
        <li>Test title</li>
        <li>asdasdasd</li>
    </ul>
    <br />
    <h4>5 recent comments:</h4>
    <ul>
        <li>Kul blogg ;D</li>
        <li>Gud vad jag älskar den här bloggen</li>
        <li>Den här bloggen är bättre än Blondinbellas! :)</li>
        <li>Hej hej!</li>
        <li>asdasdasd</li>
    </ul>
</div>

<?php
require 'partials/footer.php';
?>