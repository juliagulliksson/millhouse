<?php
function check_image_before_upload($image_size, $image_type, $target) {
     if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG,  IMAGETYPE_PNG, IMAGETYPE_BMP))) {
         $upload_ok = true;
     }
        else {
             $error_message = "Image type must be gif, jpeg, pgn or bmp!";
             return $error_message;
        }//End if
         
     if ($image_size > 500000000) { 
         $error_message = "The file is too large";
         return $error_message;
     }
         else {
             $upload_ok = true;
         }//End if
         
     if (file_exists($target)) {
         $error_message = "The file already exists";
         return $error_message;
     }
         else {
             $upload_ok = true;
         }//End if
    
     return $upload_ok;
}
?>