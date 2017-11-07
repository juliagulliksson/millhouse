<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <title>Login test</title>
    
</head>
<body>
   
   <main>
     <div class="container">
      <div class="box_login">
          
           <h1>LOGIN</h1>
           <hr/>
           <form action="index.php"
           method="POST">
                <h3>USERNAME</h3>
                <input type="text" name="username">
                <h4>PASSWORD</h4>
                <input type="password" name="password">
                <input type="submit"
                value="SEND">
           </form>
           
        </div>
        
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
         
         ?>
        
        <div class="box_register">
          
           <h2>REGISTER</h2>
           <hr/>
           <form action="index.php"
           method="POST">
                <h5>USERNAME</h5>
                <input type="text" 
                name="register_username">
                <p>EMAIL</p>
                <input type="text"
                name="register_email">
                <h6>PASSWORD</h6>
                <input type="password" 
                name="register_password">
                <input type="submit"
                value="SEND">
           </form>
           
           <?php
            
            
            //Ifall fälten för registrering fylls i
            if (isset($_POST["register_username"]) &&
               isset($_POST["register_password"]) &&
               isset($_POST["register_email"]))
                {
                    $new_username = $_POST["register_username"];
                
                    $new_email = $_POST["register_email"];
                    
                    $new_password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);
                    
                    $contributor = false;
                    
                
                    //Kollar ifall användarnamn redan finns
                    require "partials/functions/check_if_dublette.php";
                
                
                    //Variabler med namnen på kolumnerna som ska kollas
                    $user_column = 'username';
                    $email_column = 'email';
                
                    
                    //Kollar ifall username redan finns
                    $is_dublette_username = check_if_dublette($user_column, $new_username);
                
                
                    //Kollar ifall email redan finns
                    $is_dublette_email =
                    check_if_dublette($email_column,
                    $new_email);
                
                
                    //Ifall username redan är registrerad
                    if ($is_dublette_username)
                    {
                        echo 'The username already exists! <br/>';
                    }
                
                
                    //Ifall email redan är registrerad
                    elseif ($is_dublette_email)
                    {
                        echo 'The email address is already registered!';
                    }
                
                
                    //Ifall varken email eller username finns så anropas funktionen register
                    elseif (!$is_dublette_email &&
                           !$is_dublette_username)
                    {
                        require "partials/functions/register.php";
                    
                        register($new_username, 
                             $new_password, 
                             $is_distributor,
                             $new_email); 
                        
                        echo $new_username . ' was successfully registered!';
                    }
                
                
                }
            
            ?>
           
        </div>
       </div>
   </main>
    
</body>
</html>