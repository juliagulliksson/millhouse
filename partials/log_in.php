 <?php
          require "partials/start_session.php";
          
          
                   //Ifall fälten i login fylls i anropas funktionen login
                 if (isset($_POST["username"]) &&
                    isset($_POST["password"]))
                 {
                     $username = $_POST["username"];

                     $password = $_POST["password"];

                     require "partials/functions/login.php";

                     login($username, $password);
                 } 
          
          
          
                 if (isset($_SESSION["username"]))
                 {
                    echo $_SESSION["username"];    
                 }
          
          ?>
           