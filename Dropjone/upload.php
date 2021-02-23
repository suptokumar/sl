 <?php   
 //upload.php  
 //echo 'done';  
 $output = ''; 
 $path = 'data/'; 
 $folder = $_POST["person"];
 if (!file_exists($path.$folder)) {
 	mkdir($path.$folder);
 }
 if(isset($_FILES['file']['name'][0]))  
 {  
      //echo 'OK';  


      foreach($_FILES['file']['name'] as $keys => $values)  
      {  



      	 	$fn = $_FILES['file']['tmp_name'][$keys];
$size = getimagesize($fn);
$ratio = $size[0]/$size[1]; // width/height
if( $ratio > 1) {
    $width = 200;
    $height = 500/$ratio;
}
else {
    $width = 500*$ratio;
    $height = 500;
}
$src = imagecreatefromstring(file_get_contents($fn));
$dst = imagecreatetruecolor($width,$height);
imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
imagedestroy($src);
imagepng($dst,$path.$folder."/".rand().".png"); // adjust format as needed
imagedestroy($dst);


                $output .= '✅';  
      }  
 }  
 echo $output;  
 ?> 