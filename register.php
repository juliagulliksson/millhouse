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
           <p class="success-message"><?= $username ?> was successfully registered!
           <a href="login.php#scroll">Login here!</a></p>
           <?php
        endif;//end of check exist
    endif;//end of check GET

    if(isset($_GET['user'])){?>
    <p class="error-message">This username already exists!</p>
     <?php
    }
    if(isset($_GET['email'])){?>
        <p class="error-message">This email adress is already registered!</p>
    <?php
    }
    ?>
    <h1>Register</h1>
<form name="frmRegistration" method="POST" action="register.php">

		
<input type="text" class="demoInputBox" id="input_register_username" name="register_username" value="<?php if(isset($_POST["register_username"])) echo $_POST["register_username"]; ?>" placeholder="Username">
		        <br />
		        

<input type="password" class="demoInputBox" id="input_register_password"
name="register_password" value="" placeholder="Password">
		        <br />


<input type="password" class="demoInputBox" id="input_verify_password" name="verify_password" value="" placeholder="Verify Password">
		        <br />

<input type="text" class="demoInputBox" id="input_register_email" name="register_email" value="<?php if(isset($_POST['register_email'])) echo $_POST['register_email']; ?>" placeholder="E-mail">
		

		        <br />


<input type="submit" name="register-user" value="Register" class="btnRegister">

		<?php if(!empty($error_message)) { ?>	
		<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
		<?php } ?>
		
		<br />



</form>    
    <b>Already signed up?</b> <a href="login.php#scroll">Login here!</a>
</div>
<!-- /.register-collapse -->
<?php require 'partials/footer.php'; ?>