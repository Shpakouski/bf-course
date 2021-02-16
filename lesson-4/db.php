<?php
$host = 'localhost';
$database = 'bfcourse';
$user = 'root';
$password = '';


$link = mysqli_connect($host, $user, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
