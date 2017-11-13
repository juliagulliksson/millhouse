<?php
require "partials/header.php";
?>
   <div class="login_register_wrapper">
       
        <input type="checkbox" 
        name="login_toggle_button" 
        id="login_toggle_button" />
        
        <label for="login_toggle_button">
        </label>
        

        <div class="login_register_toggle_box">
           
           <div class="form_wrapper"
             id="login_form_wrapper">
              
               <form action="index.php"
               class="form_toggle"
               id="login_form"
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
    
      <div class="login_register_wrapper">
       
        <input type="checkbox" 
        name="register_toggle_button" 
        id="register_toggle_button" />
        
        <label for="register_toggle_button">
        </label>
        

        <div class="login_register_toggle_box">
           
           <div class="form_wrapper"
             id="login_form_wrapper">
              
               <form action="index.php"
               class="form_toggle"
               id="register_form"
               method="POST">
                   
                   <div class="form_input_wrapper">
                   
                        <label for="username">
                        USERNAME
                        </label>
                        <input type="text" 
                        id="input_register_username"
                        name="register_username"
                        placeholder="Username">

                    </div>
                    
                    <div class="form_input_wrapper">
                   
                        <label for="email">
                        EMAIL
                        </label>
                        <input type="email" 
                        id="input_register_email"
                        name="register_email"
                        placeholder="Email">

                    </div>
                    
                    <div class="form_input_wrapper">
                    
                        <label for="password">
                        PASSWORD
                        </label>
                        <input type="password" 
                        id="input_register_password"
                        name="register_password"
                        placeholer="Password">
                    
                   </div>
                   
                   <div class="form_input_wrapper">
                        <input type="submit"
                        value="SUBMIT"
                        class="submit_button"
                        id="submit_register">
                   </div>  
               </form>
           </div>

        </div><!--login_toggle_box end-->

    </div><!--.login_wrapper end-->
    
   
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