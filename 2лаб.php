<?php

    $text = $_POST['text'];

    $file = fopen('file1.txt', 'a');
    fwrite($file, $_POST['text'] . PHP_EOL);
    fclose($file);



$file = file('file1.txt');
$lines = count($file); 
echo "<strong>Исходный текст:</strong>"."</br>";
	for ($i=0; $i < $lines; $i++) { 
		$str = $file[$i];
		echo $str."</br>";
	}
echo "</br><strong>Обработанный текст:</strong>"."</br>";
for ($i=0; $i < $lines; $i++) { 
    $str = $file[$i];
    $words = explode(" ", $str);//получаем массив строк, полученных разбиением строки
    $c = count(preg_split('#[\s,]+#', $str)) - 1;//считаем сколько строк
    if (ParseString($words, $c))
    {
        echo $str."</br>";
    }
}

// Разбиваем строку на слова
function ParseString($words, $c)
{
    for ($k=0; $k < $c; $k++) { 

        if (CheckWord($words[2]))
        {
            //echo $words[$k]."</br>";
            return true;
        }
    }
    return false;
}

// Проверяем слово
function CheckWord($word)
{
for($k=0; $k < 3; $k++){
switch($k){
    case 2:
    if (substr_count($word, 'n') > 2) //сравнение с регулярным выражением ui-ютф8 и прописные и заглавные буквы
    { 
    
        //echo $word."</br>";
        return false; 
        break 1;
    }

    return true;
break 1;
}
    }

}

?>