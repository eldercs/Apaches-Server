<?php


        
        $result = 0;
        $t = 1;
        $answ = 0;
        for ( $i = 0; $i <= 29; $i++ ) {
            if(isset($_POST[$t])) {
                $k = $_POST[$t];
        if($k== '1')  {
     
            $result += 0;
            $answ++;
        }
        else if($k == '2'){
        
        $result += 1;
        $answ++;    
    }
        else if($k == '3'){
         
        $result += 2;
        $answ++;
        }
        else if($k == '4'){
          
        $result += 3;
        $answ++;    
    }
    }
        $t++;  
    }

    file_put_contents("result4.txt", "");
    file_put_contents("result4.txt", "txtКарточка  " .  PHP_EOL, FILE_APPEND);
    file_put_contents("result4.txt", "Всего ответов  " .  PHP_EOL, FILE_APPEND);
    $result2 = ($result/87)*100;
    if($result2 < 40){
        echo '<div style="font-size:42px;color:pink; text-align:center;">lul </div>';
        echo '<div style="font-size:42px;; text-align:center;">Вы набрали:  '. $result .' из 87 балов</div>';
        echo '<br>';
        echo '<div style="font-size:42px;; text-align:center;">Ну... Это очень плохо. У вас низкий показатель уровня счастья. Я конечно не доктор, но номерок больнички вам оставлю (062) 305-39-83</div>';
        file_put_contents("result4.txt", "Пациент не счастлив и это прискорбно" . PHP_EOL, FILE_APPEND);
        file_put_contents("result4.txt", "Я рад, что вы прошли мой тест на счастье)) всем добра" . PHP_EOL, FILE_APPEND);
        
    }
    else if($result2 >40 && $result2 <= 60){
        echo '<div style="font-size:42px; text-align:center;">Результат: </div>';
        echo '<div style="font-size:42px;; text-align:center;">Вы набрали:  '. $result .' из 87 балов</div>';
        echo '<br>';
        echo '<div style="font-size:42px; text-align:center;">Вставлю текст с сайта: </div>';
        echo '<div style="font-size:32px; text-align:center;">Вы счастливый человек, только в последнее время совсем об этом позабыли. Может, Вы стали реже встречаться со своими друзьями? Сопричастность к кому-либо на самом деле очень важна, она позволяет ощущать безопасность, спокойствие, удовольствие, любовь, и, конечно же, счастье. Социальные сети не в счёт, они создают иллюзорную видимость контакта, но он не столь полон и насыщен, как в реальности. Так что выделяйте время и отправляйтесь с близкими и любимыми на прогулку.  </div>';
        file_put_contents("result4.txt", "Пациент на 50% счастлив, уровень счастья: днровец" .  PHP_EOL, FILE_APPEND);
        file_put_contents("result4.txt", "Я рад, что вы прошли мой тест на счастье)) всем добра" . PHP_EOL, FILE_APPEND);
    }
    else if($result2 > 60 && $result2<=85){
        echo '<div style="font-size:42px; text-align:center;">Результат: </div>';
        echo '<div style="font-size:42px;; text-align:center;">Вы набрали:  '. $result .' из 87 балов</div>';
        echo '<br>';
        echo '<div style="font-size:42px; text-align:center;">Вы почти полностью счастливый </div>';
        echo '<div style="font-size:38px; text-align:center;">Вы очень счастливый человек, но вам есть куда расти. Ставьте перед собой цели и добивайтесь ! РУССКИЕ ВПЕРЕД!!!!! </div>';
        file_put_contents("result4.txt", "Пациент среднестатистический средний сачстливый человек" . PHP_EOL, FILE_APPEND);
        file_put_contents("result4.txt", "Я рад, что вы прошли мой тест на счастье)) всем добра" .PHP_EOL, FILE_APPEND);
    }
    else if($result2 > 85 && $result2<=99){
        echo '<div style="font-size:42px; text-align:center;">Результат: </div>';
        echo '<div style="font-size:42px;; text-align:center;">Вы набрали:  '. $result .' из 87 балов</div>';
        echo '<br>';
        echo '<div style="font-size:42px; text-align:center;">НИЧОСЕ вы супер-счастливы</div>';
       echo "<img src='fon/maibl.png'>";
       file_put_contents("result4.txt", "Пациент слишком счастлив" . PHP_EOL, FILE_APPEND);
       file_put_contents("result4.txt", "В воронок его, Россия для грустных" . PHP_EOL, FILE_APPEND);
    }
    else if($result2 = 100){
        echo '<div style="font-size:42px; text-align:center;">Результат: </div>';
        echo '<div style="font-size:42px;; text-align:center;">Вы набрали:  '. $result .' из 87 балов</div>';
        echo '<br>';
        echo '<div style="font-size:42px; text-align:center;">В ДНР все равно никто не наберет столько балов. Поэтому СЛАВА УКРАИНЕ!</div>';
        file_put_contents("result4.txt", "Пациент хитер и опасен" . PHP_EOL, FILE_APPEND);
        file_put_contents("result4.txt", "Я рад, что вы прошли мой тест на счастье)) всем добра" . PHP_EOL, FILE_APPEND);
    }
    date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
    $time = time(); // Вот это значение отправляем в базу
    $offset = 3; // Допустим, у пользователя смещение относительно Гринвича составляет +3 часа
    $time += 3 * 3600; // Добавляем 3 часа к времени по Гринвичу
 //   echo date("Сегодня:d-m-Y  Текущее время: H:i:s", $time); // Выводим время пользователя, согласно его часовому поясу
    file_put_contents ("result4.txt", date("Сегодня:d-m-Y  Текущее время: H:i:s", $time). PHP_EOL, FILE_APPEND);
  //  echo ("$result");
    //echo ("$result2");
echo '<br>'; 
echo '<div style="font-size:32px; text-align:center"><a href="result4.txt" download = "result4.txt" target="_blank" >Скачать файл</a></div>';

/*<?php echo '<a href="#" download="result4.txt">CКАЧАТЬ РЕЗУЛЬТАТ</a>';?>*/
?>
 <form name="test" action="lab4.html">
 <br>
    <center><input  type="submit" value="Пройти тест еще раз" name = "clear"></center>
</form>

<?php
if($result <40 ){
    echo '<br><br><br><br>';
    echo '<div style="font-size:70px; text-align:center; font-weight:40px; font-family:sans-serif;"> Здесь могла бы быть ваша реклама</div>';
}
?>