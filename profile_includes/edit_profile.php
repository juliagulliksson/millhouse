<?php
$existing_username = $_SESSION['username'];
$existing_email = $_SESSION['email'];
$user_id = $_SESSION['id'];
      
//If the submit button to change username or email is set    
if(isset($_POST['edit_profile_submit'])){
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $error_messages = array();
    $update_ok = true;
    require "partials/functions/check_if_duplicate.php";
    
    if(empty($_POST['new_username'])){
        $error_messages[] = 'The username can\'t be empty';
        $update_ok = false;
    }
    elseif($new_username != $existing_username){
        $user_column = 'username';
        $is_duplicate_username = check_if_duplicate($user_column, $new_username);
        if($is_duplicate_username){
            $error_messages[] = 'The username already exists';
            $update_ok = false;
        }
    }
    
    if(empty($_POST['new_email'])){
        $error_messages[] = 'The e-mail can\'t be empty';
        $update_ok = false;
    }
    
    elseif($new_email != $existing_email){
        $user_column = 'email';
        $is_duplicate_email = check_if_duplicate($user_column, $new_email);
        if($is_duplicate_email){
            $error_messages[] = 'The e-mail already exists';
            $update_ok = false;
        } 
    }


//Uploads profile picture
if(!empty($_FILES['new_profile_picture']) &&
$update_ok){
    require "profile_includes/update_profile_pic_sql.php";
}
    elseif(empty($_FILES['new_profile_picture']) &&
        $update_ok){
        require "profile_includes/update_profile_sql.php";
        }
}
     

//If subimt button for change password is set
if(isset($_POST['change_password'])){
    require "profile_includes/change_password.php";
}
?>
    <div class="edit-account">
        <?php
    if(!empty($error_messages)):
        foreach ($error_messages as $error_messages):?>
            <p class="error-message">
                <?= $error_messages ?><br/></p>
            <?php endforeach;
    endif;
    ?>
            <h1>Edit profile</h1>
            <p>Not happy with your username or profile photo? Feel happy to make changes.</p>

            <form action="profile.php?edit=true" method="POST">
                <label for="new_profile_photo">Upload new profile photo:</label>
                <input type="file" name="new_profile_photo" id="">
                <br />
                <label for="new_username">Change username:</label>
                <br />
                <input name="new_username" id="new_username" type="text" value="<?= $existing_username ?>">
                <br />
                <label for="new_email">Change e-mail:</label>
                <br />
                <input name="new_email" id="new_username" type="email" value="<?= $existing_email ?>">
                <br />
                <input type="submit" name="edit_profile_submit" value="Save Profile Settings">
            </form>

            <form action="">
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
