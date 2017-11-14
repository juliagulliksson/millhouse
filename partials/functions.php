<?php

function replace_date($date){
            $date = new DateTime($date);
            return $date->format('F j, Y');
       }

       
function replace_month($month){
    $dateObj = DateTime::createFromFormat('!m', $month);
    return $dateObj->format('F');
}

function string_length($x, $length){
    if(strlen($x)<= $length){
      return $x;
    }else{
      $y = substr($x,0,$length) . '...';
      return $y;
    }
  }
