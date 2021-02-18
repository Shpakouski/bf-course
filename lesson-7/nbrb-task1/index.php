<?php
//Задача 1

//Спарсить через API сайта nbrb{dot}by все курсы доллара, евро, российского рубля с начала этого года.
// Значения записать в базу и после вывести на экране в таблице и в виде графика. График можно построить
// с помощью JS библиотеки amcharts
require_once 'Currency.php';

$usdID = 145;

$rateUSD = new Currency();
$resultUSD = $rateUSD->getRates($rateUSD->startDate, $rateUSD->today, $usdID);
$json = json_encode($resultUSD);
require_once 'header.php';
?>
<!-- HTML -->
<h1>Динамика официального курса доллара</h1>
<div id="chartdiv"></div>
<table border="1" style="border-collapse: collapse;">
    <tr>
        <th>Дата</th>
        <th>Курс, BYN</th>
    </tr>
    <?php foreach ($resultUSD as $resUSD): ?>
        <tr>
            <td><?php echo $resUSD['date']; ?></td>
            <td><?php echo $resUSD['value']; ?></td>
        </tr>

    <?php endforeach; ?>
</table>

</body>
</html>