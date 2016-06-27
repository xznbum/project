<?php
// ��������� ������ �� POST-�������
$data = file_get_contents('php://input');
// �������������� �� JSON-������
$array = json_decode($data);

// �������� �� ������, ��� ������� � �� NULL
if (isset($array) && is_array($array) && !(empty($array))){    
    $polindrom = array(); // ������ ��� �����������
    foreach ($array as $value) { // ���� �������� �� ������� ��������        
        $word = strtolower($value); // �������������� �������� � ������� ��������
        if($word == strrev($word)){ // strrev() - ��������������� �����   
            array_push($polindrom, $value); // ���������� � ������ �����������
        }
    }    
    header('Content-Type: application/json'); // �������� HTTP-���������
    /* �������������� ������� � JSON-������
       � ����� ����������*/
    echo json_encode($polindrom); // 
} else {
    //�������� ��������� �� ������
    header('Content-Type: text/plain');
    echo "������. �� ������� ������.";
}

/* ��� ������������� curl ����� cmd (Windows):
 * curl "http://localhost:8000/two.php" -X POST -H "Content-Type: application/json" 
 * --data-binary "[\"hello\", \"racecar\", \"Level\", \"lol\", \"xsolla\"]" 
 */