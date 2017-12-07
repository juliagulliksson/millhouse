<?php //require "profile_includes/edit_profile.php"; ?>
   <div class="edit-account">
    <?php
    if(!empty($error_messages)):
        foreach ($error_messages as $error_messages):?>
            <p class="error-message">
                <?= $error_messages ?><br/></p>
            <?php endforeach;
    endif;

    if(isset($_POST['edit_profile_submit'])):
        if(!empty($_FILES['new_profile_picture']['name'])):
            if(is_array($upload_ok) && !empty($upload_ok)):
                foreach ($upload_ok as $error_message):?>
                    <p class="error-message"><?= $error_message ?><br/></p>
                <?php endforeach;
            endif;//end of check if in array and not empty
        endif;//end of if $_FILES not empty
    endif;//end of submit isset
    ?>
        <h1>Edit profile</h1>
        <p>Not happy with your username or profile photo? Feel happy to make changes.</p>

        <form action="profile.php?edit=true"
        enctype="multipart/form-data" 
        method="POST">
            <label for="new_profile_picture">Upload new profile photo:</label>
            <input type="file" name="new_profile_picture" id="new_profile_picture">
            <br />
            <label for="new_username">Change username:</label>
            <br />
            <input name="new_username" id="new_username" type="text"
                value="<?= $_SESSION['username']; ?>">
            <br />
            <label for="new_email">Change e-mail:</label>
            <br />
            <input name="new_email" id="new_username" type="email" 
            value="<?= $_SESSION['email']; ?>">
            <br />
            <input type="submit" name="edit_profile_submit" value="Save Profile Settings">
        </form>

        <form action="profile.php?edit=true" method ="POST">
            <label for="old_password">Old password:</label>
            <br/>
            <input name="old_password" id="old_password" type="password">
            <br />
            <label for="new_password">New password:</label>
            <br/>

            <input name="new_password" id="new_password" type="password">
            <br />
            <label for="verify_new_password" class="visuallyhidden">Verify new password:</label>
            <br />
            <input name="verify_new_password" id="verify_new_password" type="password">
            <br />
            <input type="submit" name="change_password" value="Change Password">
        </form>
        <h2>
            <a href="profile.php#scroll">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> No, I'm happy as it is. Take me back!
    </a>
        </h2>
</div>
