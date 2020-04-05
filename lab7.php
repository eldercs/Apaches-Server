<?php
function printTree($level=1) {
    // Открываем каталог и выходим в случае ошибки.
    $d = @opendir(".");
    if (!$d) return;
    while (($e=readdir($d)) !== false) {
      // Игнорируем элементы .. и .
      if ($e=='.' || $e=='..') continue;
      // Нам нужны только подкаталоги.
      if (!@is_dir($e)) continue;
      // Печатаем пробелы, чтобы сместить вывод.
      for ($i=0; $i<$level; $i++) echo "  ";
      // Выводим текущий элемент.

      $newArr = [];
      $file = scandir($e);
      foreach($file as $elem) {
      if(is_file($e.'/'.$elem) and preg_match('#.txt$#',$elem)) {
      array_push($newArr, $elem);
      }
      }
      foreach($newArr as $elem) {
        $lines = count($file);
    
       $a = file_get_contents($e.'/'.$elem);
       $a = preg_split("~\\n(?=\\s+)~",$a);
       $slovo = 'соль';
       foreach(preg_grep("~$slovo~ui",$a) as $v){
       //echo $v;
       if(chmod($e.'/'.$elem, "0444")){
        $filedata = date ("d.m.y H:i:s", filemtime($e.'/'.$elem));
        $today = date('d.m.y H:i:s'); 
      //   echo ($filedata);
      //  echo ($today);
        if($filedata < $today){
          file_put_contents($e.'/'.$elem, ". ." . PHP_EOL, FILE_APPEND);
          file_put_contents($e.'/'.$elem, "любые символы пользователя" . PHP_EOL, FILE_APPEND);
       echo"<br>";
       echo ($elem);
        }
       }
       }
   // return false;
     // }

       // echo"<br>";
       // echo ($elem);
      //echo ($e.'/'.$elem);
      }
      
      //echo "$e\n";
      // Входим в текущий подкаталог и печатаем его
      if (!chdir($e)) continue;
      printTree($level+1);
      // Возвращаемся назад
      chdir("..");
      // Отправляем данные в браузер, чтобы избежать видимости зависания
      // для больших распечаток.
      flush();
    }
    closedir($d);
  }
  function ParseString($words, $c)
{
    for ($k=0; $k < $c; $k++) { 

        if ($words[$k] = "solt")
        {
            //echo $words[$k]."</br>";
            return true;
        }
    }
    return false;
}
  
   
  // Выводим остальной текст фиксированным шрифтом
  echo "<pre>";
  echo "/\n";
  // Входим в корневой каталог и печатаем его
  chdir($_SERVER['DOCUMENT_ROOT']);
  PrintTree();
  echo "</pre>";
?>