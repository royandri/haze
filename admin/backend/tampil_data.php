<!-- Created by : Roy Andri  Senin, 08-04-2019-->
<?php
include_once '../config/db_config.php';

$query = "SELECT * FROM tbl_dataperjam WHERE id_dataperjam = (SELECT MAX(id_dataperjam) FROM tbl_dataperjam)";
$exe = mysqli_query($koneksi, $query);


?>