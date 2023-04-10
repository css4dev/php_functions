<?php




$t = time();
if (isset($_FILES['sectionPicture'])){
   
$split = explode(".", $_FILES['sectionPicture']['name']);
 $ex = $split[count($split) - 1];
    $url = "images/m1" . $t . '.'.$ex;
    $thumb = "images/thumb/m1" . $t . '.'.$ex;
    $fullUrl = "https://css4dev.com/ChineseCenter/ControlPanel/" . $url;
$size=$_FILES['sectionPicture']['size'];
resizer($_FILES['sectionPicture']['tmp_name'], $url, 700, $ex);


    echo $fullUrl  ;
}
if (isset($_FILES['productPictureEdit'])){
     
$split = explode(".", $_FILES['productPictureEdit']['name']);
 $ex = $split[count($split) - 1];
    $url = "images/m1" . $t . '.'.$ex;
    $fullUrl = "https://css4dev.com/ChineseCenter/ControlPanel/" . $url;
$size=$_FILES['productPictureEdit']['size'];
resizer($_FILES['productPictureEdit']['tmp_name'], $url, 700, $ex);

    echo $fullUrl  ;
} 
  




function resizer ($source, $destination, $size, $ex) {
  $ext = $ex;
  if (in_array(strtolower($ext), ["bmp", "gif", "jpg", "jpeg", "png", "webp"])) {

    $dimensions = getimagesize($source);
  $width = $dimensions[0];
  $height = $dimensions[1];
  
    $new_width = $size;
    $new_height = ceil(($new_width/$width) * $height);
	
  // Respective PHP image functions
  $fnCreate = "imagecreatefrom" . ($ext=="jpg" ? "jpeg" : $ext);
  $fnOutput = "imagewebp";
  
  // Image objects
  $original = $fnCreate($source);
  $resized = imagecreatetruecolor($new_width, $new_height); 
  
  // Transparent images only
  if ($ext=="png" || $ext=="gif" || $ext=="webp") {
    imagealphablending($resized, false);
    imagesavealpha($resized, true);
    imagefilledrectangle(
      $resized, 0, 0, $new_width, $new_height,
      imagecolorallocatealpha($resized, 255, 255, 255, 127)
    );
  }
  
  // Copy & resize
  imagecopyresampled(
    $resized, $original, 0, 0, 0, 0, 
    $new_width, $new_height, $width, $height
  );

  $exif = exif_read_data($source);

if (!empty($exif['Orientation'])) {
    $imageResource = imagecreatefromjpeg($source); // provided that the image is jpeg. Use relevant function otherwise
    switch ($exif['Orientation']) {
        case 3:
        $image = imagerotate($resized, 180, 0);
        break;
        case 6:
        $image = imagerotate($resized, -90, 0);
        break;
        case 8:
        $image = imagerotate($resized, 90, 0);
        break;
        default:
        $image = $resized;
    } 
    imagewebp ($image, $destination);
	
  imagedestroy($original);
  imagedestroy($resized);
}
else{
 $dimensions = getimagesize($source);
  $width = $dimensions[0];
  $height = $dimensions[1];
  
    // $new_width = ceil(($size/100) * $width);
    error_log(getcwd().$new_width." ".$width);
    // $new_height = ceil(($size/100) * $height);
  // Respective PHP image functions
  $fnCreate = "imagecreatefrom" . ($ext=="jpg" ? "jpeg" : $ext);
  $fnOutput = "imagewebp";
  
  // Image objects
  $original = $fnCreate($source);
  $resized = imagecreatetruecolor($new_width, $new_height); 
  
  // Transparent images only
  if ($ext=="png" || $ext=="gif" || $ext=="webp") {
    imagealphablending($resized, false);
    imagesavealpha($resized, true);
    imagefilledrectangle(
      $resized, 0, 0, $new_width, $new_height,
      imagecolorallocatealpha($resized, 255, 255, 255, 127)
    );
  }
  
  // Copy & resize
  imagecopyresampled(
    $resized, $original, 0, 0, 0, 0, 
    $new_width, $new_height, $width, $height
  );
if ($ex == 'jpg' || $ex == 'jpeg') {
 
  imagejpeg ($resized, $destination,90);
} elseif ($ex == 'gif') {
 
   imagegif ($resized, $destination,90);

} elseif ($ex == 'png') {
 
    
    imagepng ($resized, $destination,9);

} elseif ($extension == 'webp') {
 
    imagewebp ($resized, $destination,90);
 
} else {
 
   error_log(ex);
 
}
  

  imagedestroy($original);
  imagedestroy($resized);
}
}
}


