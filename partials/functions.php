<?php

function replace_date($date){
    $date = new DateTime($date);
    return $date->format('F j, Y - H:i');
}

       
function replace_month($month){
    $dateObj = DateTime::createFromFormat('!m', $month);
    return $dateObj->format('F');
}

function string_length($blog_string, $length, $link){
    $blog_array = (explode(" ", $blog_string));
    $shorter_blog_array = array();
    if (count($blog_array)> $length){
        $shorter_blog_array = array_slice($blog_array, 0, $length);
        $blog_string = implode(" " , $shorter_blog_array) . "..." ."<a href='index.php?id=$link'>Continue reading <i class='fa fa-arrow-right' aria-hidden='true'></i></a>";
        return $blog_string;
    } else {
    return $blog_string;
    }
    
  }
