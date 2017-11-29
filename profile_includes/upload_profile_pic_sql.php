<?php
require "partials/functions/check_image_before_upload.php";
require "partials/database.php";

//Declaring variables for image upload
$target = "profile_pictures/" . basename($_FILES["picture"]["name"]);
$path = $_FILES["picture"]["tmp_name"]; 
$filename = $_FILES["picture"]["name"]; 
$image_size = $_FILES["picture"]["size"];
$check_image = getimagesize($path); 
$image_type = $check_image[2]; 
$user_id = $_SESSION["id"];


//Check image before upload
$upload_ok = check_image_before_upload($image_size, 
                                       $image_type, 
                                       $target); 


//Inserts to database
if(gettype($upload_ok) == 'boolean'){
  if(move_uploaded_file($path, $target)) { 
    $statement = $pdo->prepare( 
        "UPDATE users 
        SET profile_picture = :profile_picture
        WHERE id            = :id" 
    ); 
    
    $statement->execute(array(  
        ":profile_picture" => $target,
        ":id"              => $user_id
    )); 
    header('location: index.php');
  } 
}
?>