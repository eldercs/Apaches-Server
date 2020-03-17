<?php
//error_reporting(E_ALL & ~E_NOTICE);
	$info = "
	<h2>Выдать на печать те строки файла, в которых есть слова, начинающиеся или заканчивающиеся прописными буквами русского алфавита.
	</h2>
	</br>";
	echo $info;

	$file = file('text.txt');

	echo "<strong>Исходный текст:</strong>"."</br>";
	for ($i=0; $i < 9; $i++) { 
		$str = $file[$i];
		echo $str."</br>";
	}

	echo "</br><strong>Обработанный текст:</strong>"."</br>";
	for ($i=0; $i < 9; $i++) { 
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

			if (CheckWord($words[$k]))
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
		if (preg_match('/[а-я\,\.]/u', $word)) //сравнение с регулярным выражением ui-ютф8 и прописные и заглавные буквы
		{ 
			//echo $word."</br>";
			return true; 
		}
		return false;
	}
?>