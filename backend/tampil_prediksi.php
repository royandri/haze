<?php
include_once './config/db_config.php';

$query = "SELECT * FROM tbl_prediksi WHERE id = (SELECT max(id) FROM tbl_prediksi)";
$exe = mysqli_query($koneksi, $query);
$cuaca = mysqli_fetch_object($exe);

$query2 = "SELECT * FROM tbl_prediksi_besok ORDER BY id DESC LIMIT 1";
$exe2 = mysqli_query($koneksi, $query2);
$cuaca_besok = mysqli_fetch_assoc($exe2);

$query3 = "SELECT * FROM tbl_prediksi_siang ORDER BY id DESC LIMIT 1";
$exe3 = mysqli_query($koneksi, $query3);
$cuaca_siang = mysqli_fetch_assoc($exe3);

$query4 = "SELECT * FROM tbl_prediksi_malam ORDER BY id DESC LIMIT 1";
$exe4 = mysqli_query($koneksi, $query4);
$cuaca_malam = mysqli_fetch_assoc($exe4);
?>