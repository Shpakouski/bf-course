<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Calendar</title>
</head>
<body>
<?php
require 'task3.php';
$month = generateCalendarMonth(28, 'четверг');
?>


<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Понедельник</th>
        <th scope="col">Вторник</th>
        <th scope="col">Среда</th>
        <th scope="col">Четверг</th>
        <th scope="col">Пятница</th>
        <th scope="col">Суббота</th>
        <th scope="col">Воскресенье</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        $firstIndex = array_search('понедельник', $month) - 1;
        $emptyTD = 7 - $firstIndex;
        for ($i = 0; $i < $emptyTD; $i++):?>
            <td></td>
        <?php
        endfor;
        $saturdayCount = 1;
        $sundayCount = 1;
        foreach ($month

        as $day):
        if ($day === 'понедельник'):
        ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td><?php

            if ($day === 'понедельник' || $day === 'четверг') echo 'Курс PHP';
            if ($day === 'вторник') echo 'подготовка ДЗ';
            if ($day === 'среда') echo 'бассейн';
            if ($day === 'суббота') {
                if ($saturdayCount % 2 === 0) echo 'рыбалка';
                $saturdayCount++;
            }
            if ($day === 'воскресенье') {
                if ($sundayCount === 1 || $sundayCount === 2) echo 'дача';
                if ($sundayCount === 3) echo 'шашлык с друзьями';
                if ($sundayCount === 4) echo 'диплом';
                $sundayCount++;
            }


            ?></td>

        <?php endforeach; ?>
    </tr>
    </tbody>
</table>

</body>
</html>
