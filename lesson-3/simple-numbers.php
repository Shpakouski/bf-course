<?php

//Way 1
function getSimpleNumbers($range)
{
    $simpleNumbers = array();
    for ($i = 1; $i <= $range; $i++) {
        if ($i === 1) continue;
        for ($j = 1; $j < $i; $j++) {
            if ($j === 1) continue;
            if ($i % $j === 0) continue 2;
        }
        $simpleNumbers[] = $i;
    }
    return $simpleNumbers;
}

//var_dump(getSimpleNumbers(100));

//Way 2
$simpleNumbers = array();
for ($i = 1; $i <= 100; $i++) {
    if (isSimpleNumber($i)) $simpleNumbers[] = $i;
}

function isSimpleNumber($num)
{
    if ($num === 1) return false;
    for ($j = 1; $j < $num; $j++) {
        if ($j === 1) continue;
        if ($num % $j === 0) return false;
    }
    return true;
}

//var_dump($simpleNumbers);
