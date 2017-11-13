<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Millhouse</title>
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/tonsky/FiraCode/1.204/distr/fira_code.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="images/millhouse.ico">
</head>
<body>
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
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="hero">
            "An awesome and selling slogan"
        </div>
    </header>

    <div class="wrapper">
        <div class="input_container">
            <main>
                <div class="login">
                    <h1>Login</h1>
                    <form action="index.php" class="form_toggle" id="login_form" method="POST">
                        <label for="username" hidden>Username:</label>
                        <input type="text" id="input_login_username" name="username" placeholder="Username">
                        <br />
                        <label for="password" hidden>Password:</label>
                        <input type="password" id="input_login_password" name="password" placeholder="Password">
                        <br />
                        <input type="submit" id="submit_login" value="Login">
                    </form>
                    <a href="register.php">Register</a>
                </div>
            </main>
        </div>
        <!-- /.container-collapse -->
    </div> 
    <!-- /.wrapper-collapse -->

    <footer>
        <div class="footer_wrapper">
            <div class="volt_image">
                <img src="images/volt_studios-logo.png" Alt="Volt Studios Logo" />
            </div>
            <p>Just a footer with footer options</p>
            <div class="footer_icons">
                <img src="images/instagram-icon.png" Alt="Instagram" />
                <img src="images/facebook-icon.png" Alt="Facebook" />
            </div><!-- footer icons end -->
        </div><!-- footer wrapper end -->
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous">
    </script>
</body>
</html>