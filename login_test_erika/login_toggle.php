<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
    <title>Login</title>


    <style>

        .login_wrapper {
            margin: 0px;
            padding: 0px;
            font-family: 'Oswald', sans-serif;
        }
        
        .login_toggle_box {
            background: #484a4e;
            color: #FFF;
            position: absolute;
            top: -250px;
            left: 0;
            width: 100%;
            height: 150px;
            transition: top 300ms cubic-bezier(0.17, 0.04, 0.03, 0.94);
            overflow: hidden;
            box-sizing: border-box;
            transition: margin 300ms cubic-bezier(0.17, 0.04, 0.03, 0.94);
        }
        
        .form_wrapper {
            display: flex;
            justify-content: space-around;
            width: 100%;
            padding-left: 15%;
        }
        
        .form_input_wrapper {
            flex-basis: 30%;
            display: inline-block;
            margin-left: 20px;
            margin-right: 20px;
        }
        
        form.form_toggle {
            width: 80%;
        }
        
        form.form_toggle input {
            padding: 10px;
            background: #26ae90;
            width: 80px;
            border-radius: 3px;
            padding: 8px 10px;
            color: #FFF;
            line-height: 20px;
            font-size: 1.2em;
            text-align: center;
            font-family: 'Oswald', sans-serif;
            border: none;
        }
        
        #input_login_username,
        #input_login_password {
            background: white;
            width: 100%;
            color: black;
            text-align: left;
        }

        #login_toggle_button {
            position: absolute;
            appearance: none;
            cursor: pointer;
            left: -100%;
            top: -100%;
        }

        #login_toggle_button+label {
            position: absolute;
            cursor: pointer;
            padding: 10px;
            background: #26ae90;
            width: 80px;
            border-radius: 3px;
            padding: 8px 10px;
            color: #FFF;
            line-height: 20px;
            font-size: 1.2em;
            text-align: center;
            -webkit-font-smoothing: antialiased;
            cursor: pointer;
            margin: 10px 10px;
            transition: all 500ms ease;
        }

        #login_toggle_button+label:after {
            content: "LOG IN";
        }

        #login_toggle_button:checked~.login_toggle_box {
            top: 0;
            z-index: -1;
        }

        #login_toggle_button:checked+label {
            background: #dd6149;
            width: 40px;
            font-size: 1em;
            line-height: 15px;
        }

        #login_toggle_button:checked+label:after {
            content: "CLOSE";
            z-index: 1;
        }

    </style>
</head>





<body>
    <main>
        <?php 
        require "partials/start_session.php";
        start_session();
        ?>

       
       
       
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
                   
                        <p class="form">
                        USERNAME
                        </p>
                        <input type="text" 
                        id="input_login_username"
                        name="username">

                    </div>
                    
                    <div class="form_input_wrapper">
                    
                        <p class="form">
                        PASSWORD
                        </p>
                        <input type="password" 
                        id="input_login_password"
                        name="password">
                    
                   </div>
                   
                   <div class="form_input_wrapper">
                        <input type="submit"
                        value="SUBMIT">
                   </div>
                   
                   
                   
                   
                   
               </form>
           </div>

        </div><!--login_toggle_box-->

    </div><!--.login_wrapper-->
    
<?php
          
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
          
                    //if (session_status() == PHP_SESSION_ACTIVE)
          //{
              //$logged_in_user = (array(
                //"username"    => $_SESSION["username"],
                //"contributor" => $_SESSION["contributor"],  
                //"logged_in"   => $_SESSION["logged_in"]
              //));
              
              //echo $_SESSION["username"];
          //}
          ?>

    </main>
</body>

</html>
