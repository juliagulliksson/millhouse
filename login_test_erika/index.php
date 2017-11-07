<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <title>Login test</title>
    
    <style>
    body
        {
            margin: auto;
        }
        
    .container
        {
            display: flex;
            justify-content: space-around;
        }
        
    .box_login,
    .box_register
        {
            flex-basis: 45%;
            background: rgba(9, 114, 114, 0.47);
            color: black;
            font-family: 'Oswald', sans-serif;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        
    h1, h2, h3, h4, h5, h6, p
        {
            font-size: 1.5em;
            font-weight: 600;
            margin: 0px;
        }
    </style>
    
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
        
        <div class="box_register">
          
           <h2>REGISTER</h2>
           <hr/>
           <form action="index.php"
           method="POST">
                <h5>USERNAME</h5>
                <input type="text" 
                name="register_username">
                <h6>PASSWORD</h6>
                <input type="password" 
                name="register_password">
                <input type="submit"
                value="SEND">
           </form>
           
           <?php
            
            //Ifall fälten under registrering fylls i
            if (isset($_POST["register_username"]) &&
               isset($_POST["register_password"]))
                {
                    $new_username = $_POST["register_username"];
                    
                    $new_password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);
                    
                    $is_distributor = false;
                    
                
                    //Kollar ifall användarnamn redan finns
                    require "partials/functions/check_if_dublette.php";
                
                     $is_dublette = check_if_dublette($new_username);
                
                
                    if ($is_dublette)
                    {
                        echo 'The username already exists!';
                    }
                
                    else
                    {
                        require "partials/functions/register.php";
                    
                        register($new_username, 
                             $new_password, 
                             $is_distributor); 
                        
                        echo $new_username . ' was successfully registered!';
                    }
                
                
                }
            
            ?>
           
        </div>
       </div>
   </main>
    
</body>
</html>