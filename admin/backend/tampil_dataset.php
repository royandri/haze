<!-- Created by : Roy Andri  Senin, 08-04-2019-->
<?php
include_once '../config/db_config.php';

$query = "SELECT * FROM tbl_dataset";
$exe = mysqli_query($koneksi, $query);

?>