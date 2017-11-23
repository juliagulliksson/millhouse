<?php
if(!isset($_GET['uid'])):
    require 'profile_includes/profile_sql.php';
    if(count($profile_all_articles) > 0):
        foreach($profile_all_articles as $article):  
            include 'profile_includes/profile_blogposts_indv.php';
        endforeach; 
    else:
        header('location: profile.php');
    endif; //End of count articles if

elseif(isset($_GET['uid'])):
    require 'profile_includes/user_sql.php';
    if(count($user_all_articles) > 0):
        foreach ($user_all_articles as $article):
            include 'profile_includes/profile_blogposts_indv.php';
        endforeach;
    else: 
        header('location: user.php');
    endif; //End of count if
endif;//end of check get requests if

    ?>