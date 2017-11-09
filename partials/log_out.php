        <?php
         
         //Ifall användaren trycker på LOG OUT
         if (isset($_GET["end_session"]))
         {
             require "partials/end_session.php";
             end_session();
         }
         
         ?>