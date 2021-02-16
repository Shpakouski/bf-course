<?php
//Задача 1:
//Для предыдущего задания с парсингом (задача 4 урок 3) создать таблицу через phpMyAdmin и переделать решение так,
// чтобы вместо массива использовалась база данных.


require_once 'func.php';
require_once 'db.php';


$query = "SELECT * FROM `parser`";

if ($result = mysqli_query($link, $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {

        $start = microtime(1);
        $cookies = "temp/cookie-" . microtime(true) . ".txt";
        $site = $row['url'];
        $id = $row['id'];

        $page = get_page('get', $site, array(), $cookies, $site);
        $res = $page['content'];
        $encoding = $page['encoding'];
        $title = getDataByOrder($res, "<title>", "</title>", 1);
        $site_name = str_replace(['https://', 'http://', '/'], '', $site);
        file_put_contents('temp/' . $site_name . '.html', $res);
        $date = time();

        $end = microtime(1);
        $time_parse = $end - $start;


        $sql = "UPDATE `parser`
                SET `time_parse` = $time_parse, 
                    `site_name` = '$site_name', 
                    `title` = '$title', 
                    `encoding` = '$encoding', 
                    `date_parse` = $date
                WHERE `id` = $id;";

        if (!mysqli_query($link, $sql)) {
            echo "Error updating record: " . mysqli_error($link);
        }
    }

    $query = "SELECT * FROM `parser` ORDER BY `time_parse` DESC";
    if ($result = mysqli_query($link, $query)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['time_parse'] . " - " . date('d.m.Y', $row['date_parse']) . " - <a href=\"temp/{$row['site_name']}.html\">{$row['title']}</a>  - {$row['url']} - {$row['title']} - {$row['encoding']}<br>";
        }
    }


    /* free result set */
    mysqli_free_result($result);
}

/* close connection */
mysqli_close($link);