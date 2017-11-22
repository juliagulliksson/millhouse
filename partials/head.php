<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
ini_set('session.cookie_lifetime', 3600);
require 'partials/functions/start_session.php';
start_session();


require 'partials/functions/log_in.php';
require 'partials/log_in.php';
require 'partials/functions/register.php';
require 'partials/functions/check_if_duplicate.php';
require 'partials/functions/date_replace.php';
require 'partials/functions/string_length.php';

//Require partials
require 'partials/database.php';
require 'actions/sql.php';
require 'partials/log_out.php';
require 'partials/register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Millhouse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/tonsky/FiraCode/1.204/distr/fira_code.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>
    <script src="https://use.fontawesome.com/81bfe91082.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="images/millhouse.ico">
</head>
<body>
    <header>
        <?php require 'navbar.php'; ?>
        <div class="hero">
            <h2>Feel the magic of Millhouse</h2>
        </div>
    </header>
    <div class="wrapper" id="scroll">
        <div class="container">
