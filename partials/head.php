
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Millhouse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/tonsky/FiraCode/1.204/distr/fira_code.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900,900i" rel="stylesheet">
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="images/millhouse.ico">
<?php

//Require partials/functions
require 'partials/functions/start_session.php';
require 'partials/functions/log_in.php';
require 'partials/functions/register.php';
require 'partials/functions/check_if_dublette.php';

//Require partials
require 'partials/database.php';
require 'partials/sql.php';
require 'partials/functions.php';

require 'partials/log_out.php';
require 'partials/register.php';

?>

</head>
<body>
<?php 
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
start_session();

require 'partials/log_in.php';
?>

    <header>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" 
                            class="navbar-toggle collapsed"
                            data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1"
                            aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="images/millhouse-logo.png" Alt="Millhouse logo">
                    </a>
                </div>
                <!-- /.navbar-header-collapse -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">BLOG</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <?php
                        if(isset($_SESSION['signed_in'])):
                        ?>
                        <li><a href="#">You are logged in as <?= $_SESSION['username']?></a></li>
                            <li><a href="profile.php">My profile</a></li>
                            <li><a href="index.php?end_session=true">Log out</a></li>
                        <?php 
                        else:
                            ?>
                             <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                            
                        <?php endif; ?>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <div class="hero">
            <h2>An awesome and selling slogan</h2>
        </div>
    </header>
