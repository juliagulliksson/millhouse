<?php 
     $target = "partials/article_images/" . basename($_FILES["image"]["name"]);
     $path = $_FILES["image"]["tmp_name"]; 
     $filename = $_FILES["image"]["name"]; 
     $alt_text = $_POST["alt_text"]; 
     $check = getimagesize($path);
     $upload_ok = true; 
     
     if ($_FILES["image"]["size"] > 50000000000) { 
         echo "The file is too large"; 
         $upload_ok = false; 
     }//End if 
     
     elseif (file_exists($target)) { 
         echo "The file already exists"; 
         $upload_ok = false; 
     }//End elseif 
     
     elseif (!$check) { 
         echo "The file is not an image"; 
         $upload_ok = false; 
     }//End elseif 
     
         if($upload_ok &&
           move_uploaded_file($path, $target)) {
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
                 ":title" => $title,
                 ":category_id" => $category, 
                 ":text" => $body, 
                 ":user_id" => $user_id, 
                 ":image" => $target, 
                 ":alt_text" => $alt_text
            ));
        }//end if
 
           
//ignorera detta så länge
//Fetches images from database 
           //$statement2 = $pdo->prepare(
               //"SELECT image, alt_text FROM posts"
           //);
           //$statement2->execute(array( 
              // ":image" => "image", 
              // ":alt_text" => "alt_text"
          // )); 
           
          // $images = $statement2->fetchAll(PDO::FETCH_ASSOC);
           
           //foreach ($images as $image) { 
              // echo '<img src="' . $image["image"] . '" alt="' . $image["alt_text"] . '">'; } ?>
