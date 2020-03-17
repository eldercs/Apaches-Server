<?php
echo ("lol");
class tryOtvety {
 
   // public $otvety = Array ();
    public $rightOtvety = Array ( 1 => 2, 2, 4, 3, 4, 3, 2, 3, 3, 3, 4, 1, 1, 2, 2, 3 );
 
    public $result = Array (
 
        "countRight"     => 0,
 
        "countLeft"      => 0,
 
        "countNoOtvety"  => 0,
 
    //    "rightOtvety"    => Array (),
 
        "leftOtvety"     => Array (),
 
        "noOtvety"       => Array ()
 
    );
 
    public $maxOtvetov = 16;
 
 
    public function setOtvety () {
 
        for ( $i = 1; $i <= $this -> maxOtvetov; $i++ ) {
 
            $this -> otvety [ $i ] = ( empty ( $_GET [ $i ] ) ) ? 0 : ( ( int ) $_GET [ $i ] );
 
        }
 
    }
 
    public function tryOtvety () {
 
 
        for ( $i = 1; $i <= $this -> maxOtvetov; $i++ ) {
         /*   if ( $this -> otvety [ $i ] == $this -> rightOtvety [ $i ] ) {
 
                $this -> result [ "countRight" ]++;
 
                $this -> result [ "rightOtvety"] [] = $i;
 
            } else*/
           for($j=1;$j<11;$j++){

                $vaa = "$j";
                $id =  $j; //приводим к целому числу идентификатор голосования
                $vote = (int) $_GET[$vaa]; 
                echo ("$vote");
           }
            if ( $this -> otvety [ $i ] == 0 ) {
 
                $this -> result [ "countNoOtvety" ]++;
 
                $this -> result [ "noOtvety"] [] = $i;
 
            } else {
 
                $this -> result [ "countLeft"]++;
 
                $this -> result [ "leftOtvety"] [] = $i;
 
            }
 
        }
 
 
    }
 /*   public function tryOtvety () {
 
    $result = 0;
    for ( $i = 1; $i <= $this -> maxOtvetov; $i++ ) {
        if(isset($_POST['answer'])) {
    if(isset($_POST['answer'] == '1')) {
        $result += 1;
    }
    else if(isset($_POST['1'] == '2'))
    $result += 2;
    else if(isset($_POST['1'] == '3'))
    $result += 3;
    else if(isset($_POST['1'] == '4'))
    $result += 4;
    }
}
    echo ("$result");
}*/
    public function showOtvety () {
	file_put_contents("result4.txt", "");
        echo "<br/>Всего правильных ответов   " . $this -> result [ "countRight" ] . "<br/><br/>";
		
		file_put_contents("result4.txt", "Всего правильных ответов   " . $this -> result [ "countRight" ]. PHP_EOL, FILE_APPEND);
 
        echo "Всего ответов  " . $this -> result [ "countLeft" ] . "<br/><br/>";
 
		file_put_contents("result4.txt", "Всего ответов  " . $this -> result [ "countLeft" ] . PHP_EOL, FILE_APPEND);
		
        echo "Всего вопросов без ответа   " . $this -> result [ "countNoOtvety" ] . "<br/><br/><br/>";
		
		file_put_contents("result4.txt", "Всего вопросов без ответа   " . $this -> result [ "countNoOtvety" ]. PHP_EOL, FILE_APPEND);
 
      /*  foreach ( $this -> result [ "rightOtvety" ] as $val ){
            echo "Вы правильно ответели на вопрос № " . $val . "<br/>";
			file_put_contents("result4.txt", "Вы правильно ответели на вопрос № " . $val . PHP_EOL, FILE_APPEND);
		}*/
 
        echo "<br/>";
 
        foreach ( $this -> result [ "leftOtvety" ] as $val ){
            echo "Вы ответели на вопрос № " . $val ."<br/>";
			file_put_contents("result4.txt", "Вы  ответели на вопрос № " . $val . PHP_EOL, FILE_APPEND);
		}
 
        echo "<br/>";
 
        foreach ( $this -> result [ "noOtvety" ] as $val ){
            echo "Вы не отвечали на вопрос № " . $val . "<br/>";
			file_put_contents("result4.txt", "Вы не отвечали на вопрос № " . $val . PHP_EOL, FILE_APPEND);
		}
		
        echo "<br/>";
 
    }
 
    public function showSubmit () {
 
        ?>
            <form name="test" action="">
                <input type="submit" value="Пройти тест еще раз" name = "clear" >
            </form>
        <?php
 
    }
 
    public function outViev ( $type = "showOtvet" ) {
 
        if ( $type !== "showOtvet" )
            return false;
 
        ?>
            <html>
                <body align="center">
                    <h1> Результаты </h1>
        <?php

        $this -> showOtvety ();
 
        $this -> showSubmit ();
		
		date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
		$time = time(); // Вот это значение отправляем в базу
		$offset = 3; // Допустим, у пользователя смещение относительно Гринвича составляет +3 часа
		$time += 3 * 3600; // Добавляем 3 часа к времени по Гринвичу
		echo date("Сегодня:d-m-Y  Текущее время: H:i:s", $time); // Выводим время пользователя, согласно его часовому поясу
		file_put_contents ("result4.txt", date("Сегодня:d-m-Y  Текущее время: H:i:s", $time). PHP_EOL, FILE_APPEND);
		$file = 'result4.txt'; 
    echo'<br>';
   echo '<a href="#" download="result4.txt">CКАЧАТЬ РЕЗУЛЬТАТ</a>';
        ?>

                </body>
            </html>
        <?php
 
        exit;
 
    }
 
    public function __construct () {
 
        if ( !empty ( $_GET [ "clear" ] ) )
            $this -> outViev ( "showVoprosy" );
 
 
        if ( !empty ( $_GET [ "try" ] ) ) {
 
            $this -> setOtvety ();
 
            $this -> tryOtvety ();
 
            $this -> outViev ( "showOtvet" );
 
        }
 
    }
 
}
 
$object = new tryOtvety ();
 

?>
