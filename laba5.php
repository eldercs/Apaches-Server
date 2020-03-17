<?php

// PNG изображение
header('Content-type: image/png');

// 404x404
$im = imagecreatetruecolor(404, 404);

// Определяем красный цвет
$red = imagecolorallocate($im, 0xCC, 0x00, 0x00);

// Определяем черный цвет
$black = imagecolorallocate($im, 0, 0, 0);

// Определяем белый цвет
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);

// Делаем фон белым (по-умолчанию черный)
imagefill($im, 1, 1, $white);

// Рисуем круг красного цвета
imageellipse($im, 202, 202, 400, 400, $red);

// Рисуем центр
imageline($im, 202, 202, 202, 202, $black);

// Рисуем линии от окружности
//imageline($im, 343, 343, 323, 323, $black);
//imageline($im, 61, 61, 81, 81, $black);

// Рисуем линии от центра
// толщина линии
imagesetthickness($im, 3);
imageline($im, 202, 202, 180, 40, $black);
//imageline($im, 202, 320, 222, 300, $black);
//imageline($im, 202, 320, 182, 300, $black);
// толщина линии
imagesetthickness($im, 5);
imageline($im, 202, 202, 110, 205, $black);
//imageline($im, 110, 205, 130, 225, $black);
//imageline($im, 110, 205, 130, 185, $black);
// толщина линии
imagesetthickness($im, 2);
imageline($im, 202, 202, 300, 140, $red);
//imageline($im, 300, 140, 290, 160, $red);
//imageline($im, 300, 140, 280, 140, $red);

//// Рисуем цифры
imageString($im, 5, 300, 40, "1", $black);
imageString($im, 5, 360, 110, "2", $black);
imageString($im, 5, 385, 200, "3", $black);
imageString($im, 5, 360, 285, "4", $black);
imageString($im, 5, 300, 352, "5", $black);
imageString($im, 5, 200, 380, "6", $black);
imageString($im, 5, 90, 345, "7", $black);
imageString($im, 5, 35, 285, "8", $black);
imageString($im, 5, 10, 200, "9", $black);
imageString($im, 5, 30, 110, "10", $black);
imageString($im, 5, 90, 40, "11", $black);
imageString($im, 5, 190, 10, "12", $black);


// Выводим изображение
imagepng($im);

// очищаем память после выполнения скрипта
imagedestroy($im);
?>