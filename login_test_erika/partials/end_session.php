<?php
function end_session ()
{
    require "partials/start_session.php";

    session_destroy(); 

    header("Location:/index.php?message=goodbye");
   
}

?>