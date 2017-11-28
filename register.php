<?php 
require 'partials/includes.php';
require 'partials/functions/check_if_duplicate.php';
require 'partials/register.php';

if(isset($_GET['register'], $_GET['username'])){
    $username = $_GET['username'];
    $user_column = 'username';
    $get_username = $username;
    // Check if the username is present in the database
    $exists = check_if_duplicate($user_column, $get_username);
    if(!$exists){
        header('location: index.php');
        exit();
    }
}
require 'partials/head.php'; ?>
<div class="register">
<?php
if(isset($_GET['register'], $_GET['username'])){
    if($_GET['register'] == 'success' && $exists == true){ ?>
        <p class="success-message"><?= $username ?> was successfully registered!
        <a href="login.php#scroll">Login here</a></p>
        <?php
    }//end of check exist
}

if(!empty($error_messages)) {
    foreach($error_messages as $error){ ?>
            <p class="error-message"><?= $error ?></p>
        <?php 
    }
} ?>
    <h1>Register</h1>
    <form method="POST" action="register.php">
        <label for="register_username" class="visuallyhidden">Username:</label>
        <input type="text" 
               name="register_username" 
               value="<?php if(isset($_POST["register_username"])){
                    echo $_POST["register_username"];} ?>" 
               placeholder="Username">
        <br />
        <label for="register_email" class="visuallyhidden">E-mail:</label>
        <input type="email"
               name="register_email"
               value="<?php if(isset($_POST['register_email'])){
                    echo $_POST['register_email'];} ?>"
               placeholder="E-mail">
        <br />
        <label for="register_password" class="visuallyhidden">Password:</label>
        <input type="password"
               name="register_password" 
               placeholder="Password">
        <br />
        <label for="verify_password" class="visuallyhidden">Verify password:</label>
        <input type="password" 
               name="verify_password"
               placeholder="Verify Password">
        <br />
        <input type="submit" name="register-user" value="Register">
    </form>    
    <b>Already signed up?</b> <a href="login.php#scroll">Login here!</a>
</div>
<!-- /.register-collapse -->
<?php require 'partials/footer.php'; ?>