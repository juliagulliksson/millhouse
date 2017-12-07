<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

$target = "../article_images/standing.jpg";
$type = 'IMAGETYPE_JPEG';
echo '<img src="' . $target . '">';
crop_image($type, $target);

function crop_image($type, $target){

switch($type) {
    case 'IMAGETYPE_GIF':
        $image = @imagecreatefromgif($target);
        break;
    case 'IMAGETYPE_JPEG':
        $image = @imagecreatefromjpeg($target);
        break;
    case 'IMAGETYPE_PNG':
        $image = @imagecreatefrompng($target);
        break;
    case 'IMAGETYPE_BMP':
        $image = @imagecreatefromwbmp($target);
        break;
}
    var_dump($image);
    var_dump($type);
    var_dump($target);
    
    $width = 100;
    $height = 100;
    $x = 100;
    $y = 100;

$size = min(imagesx($image), imagesy($image));
$cropped_image = imagecreatetruecolor( $width, $height );
imagecopyresampled($image, $cropped_image, 0, 0, $x, $y, $width, $height, $width, $height );

if ($cropped_image !== FALSE) {
    imagejpeg($cropped_image, 'cropped.jpg');
    
    var_dump($cropped_image);
    
    echo '<img src="' . $target . '">';
}}
//$width
// Desired function call.
//$cropped = imagecrop( $image, array( 'x' => $x, 'y' => $y, 'width' => $width, 'height' => $height ) );

//$cropped = imagecreatetruecolor($width, $height);
//imagecopyresampled($cropped, $image, 0, 0, $x, $y, $width, $height, $width, $height );   
//}


//$cropped = imagecropauto($image, IMG_CROP_DEFAULT);
//if ($cropped !== false) { // in case a new image resource was returned
    //imagedestroy($image);    // we destroy the original image
    //$new_image = $cropped;       // and assign the cropped image to $im
    
    //echo '<img src="' . $cropped . '">';
//}
?>
</body>
</html>