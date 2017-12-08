<?php
//If user logs out
if (isset($_GET["end_session"])){
    require "functions/end_session.php";
    end_session();
}