<?php
include_once '../config/db_config.php';

$query = "SELECT * FROM tbl_prediksi ORDER BY id DESC LIMIT 1";
$exe = mysqli_query($koneksi, $query);
$cuaca = mysqli_fetch_array($exe);

$query2 = "SELECT * FROM tbl_prediksi_siang ORDER BY id DESC LIMIT 1";
$exe2 = mysqli_query($koneksi, $query2);
$cuaca_siang = mysqli_fetch_array($exe2);

$query3 = "SELECT * FROM tbl_prediksi_malam ORDER BY id DESC LIMIT 1";
$exe3 = mysqli_query($koneksi, $query3);
$cuaca_malam = mysqli_fetch_array($exe3);

$query3 = "SELECT * FROM tbl_prediksi_besok ORDER BY id DESC LIMIT 1";
$exe3 = mysqli_query($koneksi, $query3);
$cuaca_besok = mysqli_fetch_array($exe3);

?>