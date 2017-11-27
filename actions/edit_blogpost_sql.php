<?php
$post_id = $_GET['id'];
//header("location: ../index.php?id=$post_id#scroll");
var_dump($_POST);
require '../partials/database.php';
$new_title = $_POST['edit_title'];
$new_text = $_POST['edit_text'];
$category = $_POST['category'];

if (!empty($_FILES["edit_image"]) && 
   !empty($_POST["edit_alt_text"])) {
    require "../partials/functions/check_image_before_upload.php";
    
        //Declaring variables for image upload
        $new_target = "article_images/" . basename($_FILES["edit_image"]["name"]);
        $new_path = $_FILES["edit_image"]["tmp_name"];
        $new_filename = $_FILES["edit_image"]["name"]; 
        $new_image_size = $_FILES["edit_image"]["size"]; 
        $new_alt_text = $_POST["edit_alt_text"]; 
        $check_image = getimagesize($new_path); 
        $new_image_type = $check_image[2];
        
        
        //Check image before upload
        $upload_ok = check_image_before_upload($new_image_size,
                                              $new_image_type,
                                              $new_target);

if(gettype($upload_ok) == 'boolean' &&
   move_uploaded_file($new_path, '../partials/' . $new_target)) {
        $statement = $pdo->prepare(
        "UPDATE posts 
        SET post_title = :new_title, 
        text           = :new_text, 
        category_id    = :new_category,
        image          = :new_image,
        alt_text       = :new_alt_text
        WHERE id = :id"
        );

        $statement->execute(array(
        ":new_title"    => $new_title,
        ":new_text"     => $new_text,
        ":new_category" => $category,
        ":new_image"    => $new_target,
        ":new_alt_text" => $new_alt_text,
        ":id"           => $post_id
        ));
    }//End if
    
elseif(gettype($upload_ok) == 'string') {
    echo $upload_ok;
    }//End elseif
}//End if(!empty..)

else {
        $statement = $pdo->prepare(
        "UPDATE posts 
        SET post_title = :new_title, 
        text           = :new_text, 
        category_id    = :new_category
        WHERE id = :id"
        );

        $statement->execute(array(
        ":new_title"    => $new_title,
        ":new_text"     => $new_text,
        ":new_category" => $category,
        ":id"           => $post_id
        ));
}