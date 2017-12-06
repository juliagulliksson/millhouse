<?php
if(isset($_GET['register'], $_GET['username'])){
    if($_GET['register'] == 'success' && $exists == true){ ?>
        <p class="success-message"><?= $username ?> was successfully registered!
        <a href="login.php#scroll">Login here!</a></p>
        <?php
    }//end of check exist
}
if(isset($_POST['register-user'])):
    if(is_array($check_user_input) && !empty($check_user_input)):
        foreach ($check_user_input as $error_message):?>
        <p class="error-message"><?= $error_message ?><br/></p>
        <?php endforeach;
    endif;//end of check if in array and not empty
endif;//end of check if 

if(!empty($error_messages)){
    foreach($error_messages as $error){ ?>
            <p class="error-message"><?= $error ?></p>
        <?php 
    }
}
?>