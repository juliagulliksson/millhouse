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
    endif; //end of count if


elseif(isset($_GET['ucid'])):

    $user_id = $_GET['ucid'];

    $statement = $pdo->prepare("SELECT posts.id AS postID, posts.post_title, 
    comments.text, comments.date, comments.user_id, comments.id AS comment_id
    FROM posts
    INNER JOIN users
    ON posts.user_id=users.id
    RIGHT JOIN comments ON posts.id=comments.post_id
    WHERE comments.user_id = :id
    ORDER BY comments.date DESC");
    $statement->execute(array(
        ":id" => $user_id
    ));
    $user_all_comments = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(count($user_all_comments) > 0):
        foreach($user_all_comments as $comment):  
            include 'profile_includes/profile_comments_indv.php';
        endforeach; 
    else:
        header('location: profile.php');
    endif; //end of count if
endif;//end of GET if