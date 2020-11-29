<?php

define('host','127.0.0.1');
define('username','royandri');
define('password','');
define('db_name','db_haze');

$koneksi = mysqli_connect(host, username, password, db_name);
$con = new mysqli(host, username, password, db_name);

if(!$koneksi) {
    echo "Koneksi gagal !" . mysqli_connect_error() . PHP_EOL;
}
?>