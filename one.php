<?php
$offers = array(5, 10, 8, 4, 7 , 2); // -> (2, 4, 5, 7, 8, 10)
$demands = array(3, 1, 11, 18, 9); // -> (18, 11, 9, 3, 1)

// �������� �������� ���������� �� �� NULL
if(isset($offers) && isset($demands)){
    // �������� ���������� �� ������
    if (is_array($offers) && is_array($demands)) {
        // �������� ���������� ������ � ����� ������
        $chairs = new Chairs();
        echo "�����: ".$chairs->getMaxProfit($offers, $demands);
    } else {
        echo "������. ���������� �� �������� ��������.";
    }
} else {
    echo "������. ���������� �� �����������.";
}


class Chairs
{
    public function getMaxProfit(array $offers, array $demands)
    {        
        $summa = 0;
        // �������� �������� �� �������
        if (!(empty($offers) || empty($demands))) {
            // ���������� ��� ��������� ��-�����������
            sort($offers, SORT_NUMERIC);
            // ���������� ��� ����������� ��-��������
            rsort($demands, SORT_NUMERIC);

            $i = 0;
            // ���� ���� �������� ������ ���� ����������, ���� �������
            while ($offers[$i] < $demands[$i]){
                $summa += ($demands[$i] - $offers[$i]);
                $i++;
            } 
        }                
        return $summa;
    }
}