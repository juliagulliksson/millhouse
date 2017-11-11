<?php

function replace_date($date){
            $date = new DateTime($date);
            return $date->format('F j, Y');
       }

       
function replace_month($month){
    $dateObj = DateTime::createFromFormat('!m', $month);
    return $dateObj->format('F');
}


