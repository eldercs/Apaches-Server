<?php
$x_min= -10;
$x_max= 10;
$k= 1;
$func='sin($i)';
$function=create_function('$i,$k', 'return '.$func.';');

$DATA=Array();
for ($i=$x_min;$i<=$x_max;$i+=$k) {
    $DATA[0][]=$function($i,$k);
    $DATA["x"][]=$i;
    }

// Задаем изменяемые значения #######################################

// Размер изображения
$W=640;
$H=480;

// Отступы
$MB=20;  // Нижний
$ML=8;   // Левый 
$M=5;    // Верхний и правый отступы. Они меньше, так как там нет текста

// Ширина одного символа
$LW=imagefontwidth(2);

// Подсчитаем количество элементов (точек) на графике
$count=count($DATA[0]);

// Подсчитаем максимальное значение
$max=0;

for ($i=0;$i<$count;$i++) {
    $max=$max<$DATA[0][$i]?$DATA[0][$i]:$max;
    }

// Работа с изображением ############################################

// Создадим изображение
$im=imagecreate($W,$H);

// Цвет фона (белый)
$bg[0]=imagecolorallocate($im,255,255,255);

// Цвет задней грани графика (светло-серый)
$bg[1]=imagecolorallocate($im,231,231,231);

// Цвет левой грани графика (серый)
$bg[2]=imagecolorallocate($im,212,212,212);

// Цвет сетки (серый, темнее)
$c=imagecolorallocate($im,184,184,184);

// Цвет текста (темно-серый)
$text=imagecolorallocate($im,136,136,136);

// Цвета для линий графиков
$bar[0]=imagecolorallocate($im,161,155,0);

$text_width=0;
// Вывод подписей по оси Y
for ($i=1;$i<=$count;$i++) {
    $strl=strlen(($max/$count)*$i)*$LW;
    if ($strl>$text_width) $text_width=$strl;
    }

// Подравняем левую границу с учетом ширины подписей по оси Y
$ML+=$text_width;

// Посчитаем реальные размеры графика (за вычетом подписей и
// отступов)
$RW=$W-$ML-$M;
$RH=$H-$MB-$M;

// Посчитаем координаты нуля
$X0=$ML;
$Y0=$H-$MB;

$step=$RH/$count;

// Вывод главной рамки графика
imagefilledrectangle($im, $X0, $Y0-$RH, $X0+$RW, $Y0, $bg[1]);
imagerectangle($im, $X0, $Y0, $X0+$RW, $Y0-$RH, $c);

// Вывод сетки по оси Y
for ($i=1;$i<=$count;$i++) {
    $y=$Y0-$step*$i;
    imageline($im,$X0,$y,$X0+$RW,$y,$c);
    imageline($im,$X0,$y,$X0-($ML-$text_width)/4,$y,$text);
    }

// Вывод сетки по оси X
// Вывод изменяемой сетки
for ($i=0;$i<$count;$i++) {
    imageline($im,$X0+$i*($RW/$count),$Y0,$X0+$i*($RW/$count),$Y0,$c);
    imageline($im,$X0+$i*($RW/$count),$Y0,$X0+$i*($RW/$count),$Y0-$RH,$c);
    }

// Вывод линий графика
$dx=($RW/$count)/2;

$pi=$Y0-($RH/$max*$DATA[0][0]);
$px=intval($X0+$dx);

for ($i=1;$i<$count;$i++) {
    $x=intval($X0+$i*($RW/$count)+$dx);

    $y=$Y0-($RH/$max*$DATA[0][$i]);
    imageline($im,$px,$pi,$x,$y,$bar[0]);
    $pi=$y;
    $px=$x;
    }

// Уменьшение и пересчет координат
$ML-=$text_width;

// Вывод подписей по оси Y
for ($i=1;$i<=$count;$i++) {
    $str=($max/$count)*$i;
    imagestring($im,2, $X0-strlen($str)*$LW-$ML/4-2,$Y0-$step*$i-
                       imagefontheight(2)/2,$str,$text);
    }

// Вывод подписей по оси X
$prev=100000;
$twidth=$LW*strlen($DATA["x"][0])+6;
$i=$X0+$RW;

while ($i>$X0) {
    if ($prev-$twidth>$i) {
        $drawx=$i-($RW/$count)/2;
        if ($drawx>$X0) {
            $str=$DATA["x"][round(($i-$X0)/($RW/$count))-1];
            imageline($im,$drawx,$Y0,$i-($RW/$count)/2,$Y0+5,$text);
            imagestring($im,2, $drawx-(strlen($str)*$LW)/2, $Y0+7,$str,$text);
            }
        $prev=$i;
        }
    $i-=$RW/$count;
    }

header("Content-Type: image/png");

// Генерация изображения
ImagePNG($im);

imagedestroy($im);
?>