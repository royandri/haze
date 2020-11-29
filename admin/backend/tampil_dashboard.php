<?php
include_once '../config/db_config.php';

$query = "SELECT * FROM tbl_prediksi ORDER BY id DESC LIMIT 1";
$exe = mysqli_query($koneksi, $query);
$cuaca = mysqli_fetch_array($exe);

?>