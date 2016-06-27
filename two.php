<?php
// получение данных из POST-запроса
$data = file_get_contents('php://input');
// преобразование из JSON-строки
$array = json_decode($data);

// проверка на массив, его пустоту и не NULL
if (isset($array) && is_array($array) && !(empty($array))){    
    $polindrom = array(); // массив дл€ полиндромов
    foreach ($array as $value) { // цикл проходит по каждому элементу        
        $word = strtolower($value); // преобразование элемента к нижнему регистру
        if($word == strrev($word)){ // strrev() - переворачивание слова   
            array_push($polindrom, $value); // добавление в массив полиндромов
        }
    }    
    header('Content-Type: application/json'); // отправка HTTP-заголовка
    /* преобразование массива в JSON-формат
       и вывод результата*/
    echo json_encode($polindrom); // 
} else {
    //отправка сообщени€ об ошибке
    header('Content-Type: text/plain');
    echo "ќшибка. Ќе получен массив.";
}

/* дл€ использовани€ curl через cmd (Windows):
 * curl "http://localhost:8000/two.php" -X POST -H "Content-Type: application/json" 
 * --data-binary "[\"hello\", \"racecar\", \"Level\", \"lol\", \"xsolla\"]" 
 */