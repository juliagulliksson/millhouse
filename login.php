<?php
require 'partials/head.php';

$today = date('Y-n-j');
?>
    <div class="wrapper">
        <div class="input_container">
            <main>
                <div class="login">
                    <h1>Login</h1>
                    <form action="index.php" class="form_toggle" id="login_form" method="POST">
                        <label for="username" hidden>Username:</label>
                        <input type="text" id="input_login_username" name="username" placeholder="Username">
                        <br />
                        <label for="password" hidden>Password:</label>
                        <input type="password" id="input_login_password" name="password" placeholder="Password">
                        <br />
                        <input type="submit" id="submit_login" value="Login">
                    </form>
                    <b>Not a member yet?</b> <a href="register.php">Register here!</a>
                </div>
            </main>
        </div>
        <!-- /.container-collapse -->
    </div> 
    <!-- /.wrapper-collapse -->

    <?php require 'partials/footer.php'; ?>