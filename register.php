<?php require 'partials/head.php'; 
?>
<div class="register">
    <?php
    if(isset($_GET['register'], $_GET['username'])):
        $username = $_GET['username'];
        $user_column = 'username';
        $get_username = $username;
        //check if the username is present in the database
        $exists = check_if_duplicate($user_column, $get_username);
        if(!$exists):
            header('location: index.php');
            exit();
        elseif($_GET['register'] == 'success' && $exists == true):?>
           <p class="success_message"><?= $username ?> was successfully registered!
           <a href="login.php#scroll">Click here to log in</a></p>
           <?php
        endif;//end of check exist
    endif;//end of check GET

    if(isset($_GET['user'])){?>
    <p class="error_message">This username already exists!</p>
     <?php
    }
    if(isset($_GET['email'])){?>
        <p class="error_message">This email adress is already registered!</p>
    <?php
    }
    ?>
    <h1>Register</h1>
    <form action="index.php" id="register_form" method="POST">
        <label for="username" hidden>Username:</label>
        <input type="text" 
               id="input_register_username"
               name="register_username"
               placeholder="Username">
        <br />
        <label for="email" hidden>E-mail:</label>
        <input type="email" 
               id="input_register_email"
               name="register_email"
               placeholder="E-mail">
        <br />
        <label for="password" hidden>Password:</label>
        <input type="password" 
               id="input_register_password"
               name="register_password"
               placeholder="Password">
        <br />
        <input type="submit"id="submit_register" value="Register">
    </form>
    <b>Already signed up?</b> <a href="login.php#scroll">Login here!</a>
</div>
<!-- /.register-collapse -->
<?php require 'partials/footer.php'; ?>