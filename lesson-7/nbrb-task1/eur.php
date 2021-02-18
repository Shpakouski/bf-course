<?php

require_once 'Currency.php';

$eurID = 292;


$rateEUR = new Currency();
$resultEUR = $rateEUR->getRates($rateEUR->startDate, $rateEUR->today, $eurID);
$json = json_encode($resultEUR);
require_once 'header.php';
?>
<!-- HTML -->
<h1>Динамика официального курса евро</h1>
<div id="chartdiv"></div>
<table border="1" style="border-collapse: collapse;">
    <tr>
        <th>Дата</th>
        <th>Курс, BYN</th>
    </tr>
    <?php foreach ($resultEUR as $resEUR): ?>
        <tr>
            <td><?php echo $resEUR['date']; ?></td>
            <td><?php echo $resEUR['value']; ?></td>
        </tr>

    <?php endforeach; ?>
</table>

</body>
</html>