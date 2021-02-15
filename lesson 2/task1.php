<?php
//Задача 1. Вывести все нечетные числа из диапазона от 100 до 50 и в конце посчитать их количество в виде:
// "Всего ... нечетных чисел". Проверка на нечётность должна быть оформлена функцией


//Way 1
function getOddNumbers($from, $to)
{
    $count = 0;
    for ($i = $from; $i <= $to; $i++) {
        if ($i % 2 !== 0) {
            $count++;
        }
    }
    return $count;
}

echo "Всего " . getOddNumbers(50, 100) . "чисел";

//Way 2
function getOddNumbersEcho()
{
    $count = 0;
    for ($i = 100; $i >= 50; $i--) {
        if ($i % 2 !== 0) $count++;
    }
    echo "Всего " . $count . " чисел";
}

getOddNumbersEcho();

//Way 3
function isOdd($num)
{
    return $num % 2 !== 0;
}

$count = 0;
for ($i = 100; $i >= 50; $i--) {
    if (isOdd($i)) $count++;
}
echo "Всего " . $count . " чисел";


