<?php
$existing_username = $_SESSION['username'];
$existing_email = $_SESSION['email'];
?>
<div class="edit-account">
    <h1>Edit profile</h1>
    <p>Not happy with your username or profile photo? Feel happy to make changes.</p>
    <form action="">
        <label for="new_profile_picture">Upload new profile picture:</label>
        <input type="file" name="new_profile_picture" id="">
        <br />
        <label for="new_username">Change username:</label>
        <br />
        <input name="new_username" type="text" value="<?= $existing_username ?>">
        <br />
        <label for="new_email">Change e-mail:</label>
        <br />
        <input name="new_email" type="email" value="<?= $existing_email ?>">
        <br />
        <label for="new_password">Change password:</label>
        <br/ >
        <input name="new_password" type="password" placeholder="New password">
        <br />
        <label for="verify_new_password">Verify new password:</label>
        <br />
        <input name="verify_new_password" type="password" placeholder="Verify new password">
        <br />
        <input type="submit" name="edit_profile_submit" value="Save Profile Settings">
    </form>
    <h2>
        <a href="profile.php">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> No, I'm happy as it is. Take me back!
        </a>
    </h2>        
</div>
<?php
$user_id = $_SESSION['id'];
$new_username = $_POST['new_username'];
$new_email = $_POST['new_email'];
$error_messages = array();
$update_ok = true;
   
               
//If the submit button is set    
if(isset($_POST['edit_profile_submit'])){
    require "../partials/functions/check_if_duplicate";
    
    if(empty($_POST['new_username'])){
        $error_messages[] = 'The username can\'t be empty';
        $update_ok = false;
    }
    elseif($new_username !=
      $_SESSION['username']){
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
    
    elseif($_POST['new_email'] !=
      $_SESSION['email']){
        $user_column = 'email';
        $is_duplicate_email = check_if_duplicate($user_column, $new_email);
        if($is_duplicate_email){
            $error_messages[] = 'The e-mail already exists';
            $update_ok = false;
        } 
    }

if(!empty($_FILES['new_profile_picture']) &&
$update_ok){
    require "update_profile_pic_sql.php";
}
    elseif(empty($_FILES['new_profile_picture']) &&
        $update_ok){
        require "update_profile_sql.php";
        }
}
  
               
               
               
if(!empty($_POST['new_password']) &&
!empty($_POST['verify_new_password'])){
    $password = password_hash($_POST['new_password']);
    $password_verify = password_hash($_POST['verify_new_password']);

if($password == $password_verify){
    $update_ok = true;
    $new_password = $password;
require "edit_password_sql.php";
} 
else {
$update_ok = false;
$error_messages[] = "The passwords do not match";
}

?>