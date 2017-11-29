<?php

function split_email($user_email){
    $length_of_user_email = strlen($user_email);
    if($length_of_user_email > 20){
         $first_half_of_user_email = substr($user_email, 0, 21);
         $second_half_of_user_email = substr($user_email, 21,  $length_of_user_email);
                 echo $first_half_of_user_email .
                 "<br>" . $second_half_of_user_email;
    } else {
        echo $user_email;
       }
    }