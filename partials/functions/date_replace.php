<?php
function replace_date($date){
    $date = new DateTime($date);
    return $date->format('F j, Y - H:i');
}

function replace_month($month){
    $dateObj = DateTime::createFromFormat('!m', $month);
    return $dateObj->format('F');
}