<?php 
require 'partials/includes.php';
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

if(!empty($error_message)) {
        if(isset($error_message)){ ?>
             <p class="error-message"><?= $error_message ?></p>
            <?php 
        }
} ?>
    <h1>Register</h1>
    <form method="POST" action="register.php">
        <input type="text" 
               name="register_username" 
               value="<?php if(isset($_POST["register_username"])){ echo $_POST["register_username"];} ?>" 
               placeholder="Username" required>
        <br />
        <input type="email"
               name="register_email"
               value="<?php if(isset($_POST['register_email'])){ echo $_POST['register_email'];} ?>"
               placeholder="E-mail" required>
		<br />
        <input type="password"
               name="register_password" 
               value="" 
               placeholder="Password" required>
		<br />
        <input type="password" 
               name="verify_password"
               value=""
               placeholder="Verify Password" required>
		<br />
        <input type="submit" name="register-user" value="Register">
		<br />
    </form>    
    <b>Already signed up?</b> <a href="login.php#scroll">Login here!</a>
</div>
<!-- /.register-collapse -->
<?php require 'partials/footer.php'; ?>