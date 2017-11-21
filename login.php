<?php
require 'partials/head.php';
$today = date('Y-n-j');
?>
<div class="login">
    <h2>Login</h2>
    <form action="index.php" class="form_toggle" id="login_form" method="POST">
        <label for="username" hidden>Username:</label>
        <input type="text" id="input_login_username" name="username" placeholder="Username">
        <br />
        <label for="password" hidden>Password:</label>
        <input type="password" id="input_login_password" name="password" placeholder="Password">
        <br />
        <input type="submit" id="submit_login" value="Login">
    </form>
    <b>Not a member yet?</b> <a href="register.php#register">Register here!</a>
</div>
<!-- /.login-collapse -->
<?php require 'partials/footer.php'; ?>