<?php
function end_session (){
    require "partials/database.php";
    start_session();
    session_unset();
    session_destroy(); 
}