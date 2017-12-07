<?php
require "partials/database.php";

//Declaring variables for image upload
$target = "profile_pictures/" . basename($_FILES["new_profile_picture"]["name"]);
$path = $_FILES["new_profile_picture"]["tmp_name"]; 
$filename = $_FILES["new_profile_picture"]["name"]; 
$image_size = $_FILES["new_profile_picture"]["size"];
$check_image = getimagesize($path); 
$image_type = $check_image[2]; 
$user_id = $_SESSION["id"];
$folder = "profile_includes/";


//Check image before upload
$upload_ok = check_image_before_upload($folder,
                                       $image_size, 
                                       $image_type, 
                                       $target); 


//Inserts to database
if(gettype($upload_ok) == 'boolean'){
  if(move_uploaded_file($path, 'profile_includes/' . $target)) { 
    $statement = $pdo->prepare( 
        "UPDATE users 
        SET profile_picture = :profile_picture,
        username            = :username,
        email               = :email
        WHERE id            = :id" 
    ); 
    
    $statement->execute(array(  
        ":profile_picture" => $target,
        ":username"        => $new_username,
        ":email"           => $new_email,
        ":id"              => $user_id
    )); 
    
    $_SESSION["username"]        = $new_username;
    $_SESSION["email"]           = $new_email;
    $_SESSION["profile_picture"] = $target;
    //header('location: index.php');
  } 
}
?>