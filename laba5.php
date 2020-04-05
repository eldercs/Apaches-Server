<?php
ini_set("display_errors", "1");
  error_reporting(E_ALL); 

  header('content-type: image/jpeg');
  list($month, $day, $year) = explode('/', date('F/jS/Y'));
  $weeks[0]="Воскресенье"; 
$weeks[1]="Понедельник"; 
$weeks[2]="Вторник"; 
$weeks[3]="Среда"; 
$weeks[4]="Четверг"; 
$weeks[5]="Пятница"; 
$weeks[6]="Суббота"; 
$gisett=(int)date("w"); 
  $image = imagecreatefrompng('fon/calendar.png');
  $image_width = imagesx($image);

  $white = imagecolorallocate($image, 255, 255, 255);
  $black = imagecolorallocate($image, 0, 0, 0);
  $font_path = dirname(__FILE__) . '/arial.ttf';

  $pos_month = imagettfbbox(13, 0, $font_path, $month);
  $pos_day = imagettfbbox(25, 0, $font_path, $day);
  $pos_year = imagettfbbox(8, 0, $font_path, $year);
  $pos_weeks = imagettfbbox(8, 0, $font_path, $weeks[$gisett]);
  
  imagettftext($image, 70, 0, 320, 295, $white, $font_path, $month);
  
  imagettftext($image, 140, 0, 280, 550, $black, $font_path, $day);

  imagettftext($image, 40, 0,370, 900, $black, $font_path, $year);

  imagettftext($image, 60, 0,280, 700, $black, $font_path, $weeks[$gisett]);

  imagejpeg($image, 'lol.png', 100);

  imagedestroy($image);

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
</head>
<body>
    <style>
body {
  background-image: url('fon/lol.png');
}
</style>
    </body>
</html>