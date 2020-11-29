<!-- Created by : Roy Andri  Senin, 08-04-2019-->
<?php
include_once '../config/db_config.php';

$query = "SELECT * FROM tbl_dataperjam ORDER BY id_dataperjam DESC";
$exe = mysqli_query($koneksi, $query);


?>