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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="images/millhouse-logo.png" Alt="Millhouse logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">BLOG</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
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

   <div class="login_wrapper">
       
        <input type="checkbox" 
        name="login_toggle_button" 
        id="login_toggle_button" />
        
        <label for="login_toggle_button">
        </label>
        

        <div class="login_toggle_box">
           
           <div class="form_wrapper"
             id="login_form_wrapper">
              
               <form action="index.php"
               class="form_toggle"
               method="POST">
                   
                   <div class="form_input_wrapper">
                   
                        <label for="username">
                        USERNAME
                        </label>
                        <input type="text" 
                        id="input_login_username"
                        name="username"
                        placeholder="Username">

                    </div>
                    
                    <div class="form_input_wrapper">
                    
                        <label for="password">
                        PASSWORD
                        </label>
                        <input type="password" 
                        id="input_login_password"
                        name="password"
                        placeholer="Password">
                    
                   </div>
                   
                   <div class="form_input_wrapper">
                        <input type="submit"
                        value="SUBMIT"
                        class="submit_button"
                        id="submit_login">
                   </div>  
               </form>
           </div>

        </div><!--login_toggle_box end-->

    </div><!--.login_wrapper end-->
    
    <?php
    require "partials/log_in.php";
    ?>
    
    <div class="wrapper">
        <div class="container">
            <main>
                <div class="blog_post">
                    <img src="images/clock-1.jpg" Alt="Clock" />
                    <h3>NOVEMBER 6, 2017 | ADMIN</h3>
                    <h2>A super long title that is kind of long and not very short because it’s long</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia dese... <a href="">Continue reading -></a></p>

                    COMMENTS (12)
                </div>
                <div class="blog_post">
                    <img src="images/clock-2.jpg" Alt="Clock" />
                    <h3>NOVEMBER 4, 2017 | ADMIN</h3>
                    <h2>A short title</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia dese... <a href="">Continue reading -></a></p>

                    COMMENTS (12)
                </div>
            </main>

            <aside>
               
        <div class="sidebar">  
             
        
                   
                    <br />
                    <h4>Categories:</h4>
                    <ul>
                        <li>Clocks</li>
                        <li>Sunglasses</li>
                        <li>Interior</li>
                    </ul>
                </div>
            </aside>
        </div> <!-- container end -->
    </div> <!-- wrapper end -->

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