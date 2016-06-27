<?php
$offers = array(5, 10, 8, 4, 7 , 2); // -> (2, 4, 5, 7, 8, 10)
$demands = array(3, 1, 11, 18, 9); // -> (18, 11, 9, 3, 1)

// проверка значения переменных на не NULL
if(isset($offers) && isset($demands)){
    // проверка переменной на массив
    if (is_array($offers) && is_array($demands)) {
        // создание экземпляра класса и вызов метода
        $chairs = new Chairs();
        echo "Ответ: ".$chairs->getMaxProfit($offers, $demands);
    } else {
        echo "Ошибка. Переменная не является массивом.";
    }
} else {
    echo "Ошибка. Переменная не установлена.";
}


class Chairs
{
    public function getMaxProfit(array $offers, array $demands)
    {        
        $summa = 0;
        // проверка массивов на пустоту
        if (!(empty($offers) || empty($demands))) {
            // сортировка цен продавцов по-возрастанию
            sort($offers, SORT_NUMERIC);
            // сортировка цен покупателей по-убыванию
            rsort($demands, SORT_NUMERIC);

            $i = 0;
            // пока цена продавца меньше цены покупателя, есть прибыль
            while ($offers[$i] < $demands[$i]){
                $summa += ($demands[$i] - $offers[$i]);
                $i++;
            } 
        }                
        return $summa;
    }
}