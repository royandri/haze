<!-- Created by : Roy Andri  Minggu, 22-04-2019-->
<?php
include_once '../config/db_config.php';

$query = "SELECT waktu_jam, temperatur FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '24:00:00' AND DATE(waktu_tanggal) = CURDATE();";
$temp = mysqli_query($koneksi, $query);

$query2 = "SELECT waktu_jam, kelembapan FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '24:00:00' AND DATE(waktu_tanggal) = CURDATE();";
$humi = mysqli_query($koneksi, $query2);

$query3 = "SELECT waktu_jam, kecepatan_angin FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '24:00:00' AND DATE(waktu_tanggal) = CURDATE();";
$wind = mysqli_query($koneksi, $query3);


?>