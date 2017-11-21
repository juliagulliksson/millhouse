<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload image</title>
    
    <style>
    img {
    width: 150px;
        }
    </style>
    
</head>
<body>
   
   <?php
    $pdo = new PDO(
    "mysql:host=localhost;dbname=erikas_database;charset=utf8",
    "root",
    "root"
        );
    ?>

   <main>
       <div class="form_wrapper">
           <form action="upload_image.php"
           method="POST"
           enctype="multipart/form-data">
               <input type="file"
               name="image">
               <textarea name="alt_text"
               cols="40" rows="1"
               placeholder="Write something about your image.."
               id="editor"></textarea>
               <input type="submit"
               name="upload" 
               value="Upload">
           </form>
           
<?php 
 if (isset($_FILES["image"]) && 
     isset($_POST["alt_text"])) { 
     $target = "images/" . basename($_FILES["image"]["name"]);
     $path = $_FILES["image"]["tmp_name"]; 
     $filename = $_FILES["image"]["name"]; 
     $alt_text = $_POST["alt_text"]; 
     $check = getimagesize($_FILES["image"]["tmp_name"]);
     $upload_ok = true; 
     
     if ($_FILES["image"]["size"] > 500000) { 
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
     
         if($upload_ok) {
            if(move_uploaded_file($path, $target)) {
            $statement = $pdo->prepare(
                 "INSERT INTO images 
                 (image, alt_text) 
                 VALUES (:image, :alt_text)"
             ); 

             $statement->execute(array( 
                 ":image" => $target, 
                 ":alt_text" => $alt_text 
             ));
        }//end if(move_uploaded..)
     }//end if($upload_ok)
 }//end if(isset..) 
           
//Fetches images from database 
           $statement2 = $pdo->prepare(
               "SELECT * FROM images"
           );
           $statement2->execute(array( 
               ":image" => "image", 
               ":alt_text" => "alt_text", 
               ":id" => "id"
           )); 
           
           $images = $statement2->fetchAll(PDO::FETCH_ASSOC);
           
           foreach ($images as $image) { 
               echo '<img src="' . $image["image"] . '" alt="' . $image["alt_text"] . '">'; } ?>

</div>


</main>

</body>

</html>