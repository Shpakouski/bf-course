<?php
//Задача 4:
//Для 10 любых сайтов нужно сделать следующее:
//спарсить эти сайты
//сохранить главную страницу в файл
//замерить время выполнения скрипта парсинга
//вывести полученные сайты, отсортировав их по времени загрузки страницы в следующем виде: URL сайта - Название сайта
// (title) - Кодировка - Дата парсинга - Время выполнения скрипта - Ссылка на полученный файл сайта.

require_once '../func.php';

$sites = [
    'https://yandex.by/',
    'https://www.tut.by/',
    'https://www.onliner.by/',
    'https://www.google.com/',
    'https://www.youtube.com/',
    'https://instagram.com/',
    'https://vk.com/',
    'https://ru.wikipedia.org/',
    'https://www.rbc.ru/',
    'https://www.forbes.ru/',
];

$cookies = "cookie-" . microtime(true) . ".txt";

$sites_stat = [];
$arr_time_parse = [];

foreach ($sites as $key => $site) {
    $start = microtime(1);

    $page = get_page('get', $site, array(), $cookies, $site);
    $res = $page['content'];
    $encoding = $page['encoding'];
    $title = getDataByOrder($res, "<title>", "</title>", 1);
    $site_name = str_replace(['https://', 'http://', '/'], '', $site);
    file_put_contents($site_name . '.html', $res);

    $end = microtime(1);
    $time_parse = $end - $start;

    $sites_stat['site'][$key] = $site;
    $sites_stat['site_name'][$key] = $site_name;
    $sites_stat['title'][$key] = trim($title);
    $sites_stat['time_parse'][$key] = $time_parse;
    $sites_stat['encoding'][$key] = $encoding;

    $arr_time_parse[$key] = $time_parse;

}


asort($arr_time_parse);
foreach ($arr_time_parse as $key => $value) {

    $site = $sites_stat['site'][$key];
    $site_name = $sites_stat['site_name'][$key];
    $title = $sites_stat['title'][$key];
    $encoding = $sites_stat['encoding'][$key];
    $time_parse = $sites_stat['time_parse'][$key];
    $date = date('d.m.Y');

    echo "$site - <a href=\"{$site_name}.html\">{$site_name}</a> - $title - $encoding - $date - $time_parse <br>";
}