<?php
if (empty($_POST['name'])) {
    echo 'Введите свое имя';
} elseif (empty($_POST['email'])) {
    echo 'Введите свой email';
} else {
    echo 'Данные получены...';
}