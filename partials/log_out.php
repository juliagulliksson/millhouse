<?php
//If user logs out
if (isset($_GET["end_session"])){
    require "partials/end_session.php";
    end_session();
}
?>