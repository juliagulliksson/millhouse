<?php
function end_session ()
{
    start_session();

    session_destroy(); 

    //header("Location:login_test_erika/index.php?message=goodbye");
    if (session_status() == PHP_SESSION_NONE)
    {
        echo 'goodbye';
    }
}

?>