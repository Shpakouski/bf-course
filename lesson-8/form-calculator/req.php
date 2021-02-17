<?php
if (empty($_POST['num1'])) {
    echo 'Введите число 1';
} elseif (empty($_POST['num2'])) {
    echo 'Введите число 2';
} else {
    $result = $_POST['num1'] + $_POST['num2'];
    echo $result;
}