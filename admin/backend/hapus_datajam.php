<!-- Created by : Roy Andri  Rabu, 24-04-2019-->
<?php
include_once '../../config/db_config.php';

$id = $_GET['id'];

$query = "DELETE FROM tbl_dataperjam WHERE id_dataperjam = '$id' ";
$hapus = mysqli_query($koneksi, $query);

if($hapus){
    echo "<div id='status'>sukses</div>";
}else {
    echo "<div id='status'>gagal</div>";
}
?>
