<?php
//ucid = user comments id
if(!isset($_GET['ucid'])):
    require 'profile_includes/profile_sql.php';
    if(count($profile_all_comments) > 0):
        foreach($profile_all_comments as $comment):  
            include 'profile_includes/profile_comments_indv.php';
        endforeach; 
    else:
        header('location: profile.php');
        exit();
    endif; //end of count if


elseif(isset($_GET['ucid'])):
    $user_id = $_GET['ucid'];
    $user_all_comments = fetch_all_comments_by_user($user_id);

    if(count($user_all_comments) > 0):
        foreach($user_all_comments as $comment):  
            include 'profile_includes/profile_comments_indv.php';
        endforeach; 
    else:
        header('location: profile.php');
    endif; //end of count if
endif;//end of GET if