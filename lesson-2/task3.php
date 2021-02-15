<?php
//Задача 3. Написать функцию генерации календарного месяца (сделать в ассоциативном массиве, где ключом является число,
// а значением - название дня недели). Аргументами функции являются количество дней в месяце и название первого дня в
// месяце (например 31, "понедельник")

function generateCalendarMonth($numberDays, $nameDay)
{
    $nameDay = mb_strtolower($nameDay);
    $nameDays = array('понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье');
    $calendarMonth = array();
    for ($i = 1; $i <= $numberDays; $i++) {
        if ($i === 1) {
            $firstDay = array_search($nameDay, $nameDays);
            $nameDays = array_slice($nameDays, $firstDay);
        }
        if ($i !== 1) {
            $nameDays = array('понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье');
        }
        foreach ($nameDays as $day) {
            $calendarMonth[$i] = $day;
            if($day !== 'воскресенье') $i++;
            if ($i > $numberDays) break;
        }
    }
    return $calendarMonth;
}

//var_dump(generateCalendarMonth(30, 'Суббота'));