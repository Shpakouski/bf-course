<?php
require_once 'func.php';
$url = 'https://yandex.by';

$cookies = "cookie-" . microtime(true) . ".txt";
$page = get_page('get', $url, array(), $cookies, 'https://yandex.ru');
$res = $page['content'];
//print_r($res);

$title = getDataByOrder($res, "<title>", "</title>", 1);

print_r($title);