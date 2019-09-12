<?php
function UPLOAD($imgBase64,$contenu)
{
define('UPLOAD_DIR', 'd:/framework/public/images/');
if( isset($imgBase64) && isset($contenu) ){
$img = $imgBase64;
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR .trim($contenu). '.jpg';
$success = file_put_contents($file, $data); 
}
}
//tibaredha
UPLOAD($_POST['imgBase64'],$_POST['contenu']);
?>
