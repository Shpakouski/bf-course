<?php
$url = 'https://yandex.by';
//$res = file_get_contents($url);
//print_r($res);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($curl);
print_r($res);