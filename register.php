<?php
    require 'partials/head.php';
?>
<div class="wrapper">
        <div class="input_container">
            <main>
                <div class="register">
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
                    <b>Already signed up?</b> <a href="login.php">Login here!</a>
                </div>
            </main>
        </div>
        <!-- /.container-collapse -->
    </div> 
    <!-- /.wrapper-collapse -->

    <?php require 'partials/footer.php'; ?>