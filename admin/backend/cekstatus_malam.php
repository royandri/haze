<!-- Created by : Roy Andri  Minggu, 21-04-2019-->

<?php
$query = "SELECT COUNT(id_dataperjam) as jumlah FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '18:00:00' AND DATE(waktu_tanggal) = CURDATE() ORDER BY id_dataperjam LIMIT 1";
$jlh = mysqli_query($koneksi, $query);
$jumlah = mysqli_fetch_assoc($jlh);
?>