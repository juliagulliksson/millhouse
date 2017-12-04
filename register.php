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
        <a href="login.php#scroll">Login here!</a></p>
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
        <label for="register_username">Username:</label>
        <br />
        <input type="text" 
               name="register_username" 
               id="register_username"
               value="<?php if(isset($_POST["register_username"])){
                    echo $_POST["register_username"];} ?>">
        <br />
        <label for="register_email">E-mail:</label>
        <br />
        <input type="email"
               name="register_email"
               id="register_email"
               value="<?php if(isset($_POST['register_email'])){
                    echo $_POST['register_email'];} ?>">
        <br />
        <label for="register_password">Password:</label>
        <br />
        <input type="password"
               name="register_password"
               id="register_password">
        <br />
        <label for="verify_password">Verify password:</label>
        <br />
        <input type="password" 
               name="verify_password"
               id="verify_password">
        <br />
        <input type="submit" name="register-user" value="Register">
    </form>    
    Already signed up? <b><a href="login.php#scroll">Login here!</a></b>
</div>
<!-- /.register-collapse -->
<?php require 'partials/footer.php'; ?>