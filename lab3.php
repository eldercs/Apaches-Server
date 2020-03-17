<?php
if(isset($_POST['clear']))  
{    
    $f = fopen('file2.txt','w'); 
    ftruncate($f, 0); 
    fclose($f);         
    require('tittle.html');
}
if(isset($_POST['dz'])){
$text = $_POST['text'];
$file = fopen('file2.txt', 'a');
fwrite($file, $_POST['text'] . PHP_EOL);
fclose($file);
//echo $info;
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 900);
$file1 = file('file2.txt');
$result = '';
$value = '';
$lines = count($file1); 
for ($b=0; $b < $lines; $b++) { 
    $str = $file1[$b];
    $arr = explode(' ', $str);//разбиваем на слова строку
    $i = 0;

foreach ($arr as $key => $value) {
    if ($i >= 2) 
    $i = 0;	
    if ($i == 1) {
    if (preg_match('/[a-zA-Z]+/', $value)) {
    //$result .= mb_convert_case($, MB_CASE_UPPER, 'UTF-8').' ';
    $result .= $value.' ';
    }
    else
    $result .= mb_strtoupper($value, 'utf-8').' ';//увеличиваем регистр
}
    else{
    $result .= $value.' ';//не увеличиваем регистр
    }
$i++;
}
}
 file_put_contents("result.txt", $result);
 echo (file_get_contents("result.txt"));
}
?>