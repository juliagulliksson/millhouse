<?php
require 'partials/head.php';
?>
<div class="login">
    <?php
    if(isset($_GET['login'])):
        if($_GET['login'] == 'fail'): ?>
            <p class="error-message">Login failed! Username does not exist</p>
        <?php
        endif;
    endif;
    if(isset($_GET['password'])):
        if($_GET['password'] == 'fail'): ?>
            <p class="error-message">Login failed! Incorrect password</p>
        <?php
        endif;
    endif;
    ?>

    <h1>Login</h1>
    <form action="index.php" class="form_toggle" id="login_form" method="POST">
        <label for="username" class="visuallyhidden">Username:</label>
        <input type="text"
               id="input_login_username"
               name="username"
               placeholder="Username">
        <br />
        <label for="password" class="visuallyhidden">Password:</label>
        <input type="password" 
               id="input_login_password"
               name="password"
               placeholder="Password">
        <br />
        <input type="submit"
               id="submit_login"
               value="Login">
    </form>
    Not a member yet? <b><a href="register.php#scroll">Register here!</a></b>
</div>
<!-- /.login-collapse -->
<?php require 'partials/footer.php'; ?>