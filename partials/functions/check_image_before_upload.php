<?php
function check_image_before_upload($image_size, $image_type, $target) {
     $error_message = array();
     $upload_ok = false;
     if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG,  IMAGETYPE_PNG, IMAGETYPE_BMP))) {
         $upload_ok = true;
     }
        else {
             $error_message[] = "Image type must be gif, jpeg, pgn or bmp!";
             $upload_ok = false;
        }//End if
         
     if ($image_size > 500000000) { 
         $error_message[] = "The image file is too large";
         $upload_ok = false;
     }
     elseif (file_exists("partials/" . $target)) {
         $error_message[] = "The image already exists";
         $upload_ok = false;
     }
     if($upload_ok){
         return $upload_ok;
     }
        else {
            return $error_message;
        }
}