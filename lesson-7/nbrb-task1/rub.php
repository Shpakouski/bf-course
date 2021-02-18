<?php

require_once 'Currency.php';

$rubID = 298;

$rateRUB = new Currency();
$resultRUB = $rateRUB->getRates($rateRUB->startDate, $rateRUB->today, $rubID);
$json = json_encode($resultRUB);
require_once 'header.php';
?>
<!-- HTML -->
<h1>Динамика официального курса российского рубля (100 RUB)</h1>
<div id="chartdiv"></div>
<table border="1" style="border-collapse: collapse;">
    <tr>
        <th>Дата</th>
        <th>Курс за 100 RUB, BYN</th>
    </tr>
    <?php foreach ($resultRUB as $resRUB): ?>
        <tr>
            <td><?php echo $resRUB['date']; ?></td>
            <td><?php echo $resRUB['value']; ?></td>
        </tr>

    <?php endforeach; ?>
</table>

</body>
</html>