<?php
	$in = array(10.30, 11.00, 11.20); // время прихода
	$out = array(11.30, 16.30, 12.30); // время ухода
	$all = array(); // массив всех значения
	$ind = array(); // массив индексов, где 1 - приход, -1 - уход
	// добавление в массив времени прихода и индексов
	for ($i=0; $i < count($in); $i++) { 
		array_push($all, $in[$i]);
		array_push($ind, 1);
	}
	// добавление в массив времени ухода и индексов
	for ($i=0; $i < count($out); $i++) { 
		array_push($all, $out[$i]);
		array_push($ind, -1);
	}

	array_multisort($all, $ind); // сортировка массива $all по возрастанию
	// массив индексов соответствует времени
	$start = 0; 
	$end = 0;
	$p1 = 0; // максимальное кол-во посетителей
	$p2 = 0; // текущее кол-во посетителей

	// проход по всему массиву
	for ($i=0; $i < count($all); $i++) { 
		$p2 += $ind[$i]; // подсчет посетителей
		if ($p2 > $p1) {
			$p1 = $p2;
			$start = $all[$i];
			$end = -1;
		}
		if (($p2 < $p1) && ($end == -1)) {
			$end = $all[$i];
		}
	}
	// вывод результата
	echo $start . ' - ' . $end . ' : ' . $p1;
	echo "\r\n";