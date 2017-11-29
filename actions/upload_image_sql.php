<?php 

require "partials/functions/check_image_before_upload.php";


//Declaring variables for image upload
$target = "article_images/" . basename($_FILES["image"]["name"]);
$path = $_FILES["image"]["tmp_name"]; 
$filename = $_FILES["image"]["name"]; 
$image_size = $_FILES["image"]["size"]; 
$alt_text = $_POST["alt_text"]; 
$check_image = getimagesize($path); 
$image_type = $check_image[2]; 


//Check image before upload
$upload_ok = check_image_before_upload($image_size, 
                                       $image_type, 
                                       $target); 


//Inserts to database
if(gettype($upload_ok) == 'boolean'){
  if(move_uploaded_file($path, 'partials/' . $target)) { 
    $statement = $pdo->prepare( 
        "INSERT INTO posts 
        (post_title, 
        category_id, 
        text, 
        date, 
        user_id, 
        image, 
        alt_text) 
        VALUES (:title, 
        :category_id, 
        :text, 
        CURRENT_TIMESTAMP(), 
        :user_id, 
        :image, 
        :alt_text)" 
    ); 
    
    $statement->execute(array( 
        ":title"       => $title, 
        ":category_id" => $category, 
        ":text"        => $body, 
        ":user_id"     => $user_id, 
        ":image"       => $target, 
        ":alt_text"    => $alt_text 
    )); 
    header('location: index.php');
  } 
}
?>
