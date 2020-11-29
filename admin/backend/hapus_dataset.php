<?php
include_once '../../config/db_config.php';

$id = $_GET['id'];

$query = "DELETE FROM tbl_dataset WHERE id_dataset = '$id' ";
$hapus = mysqli_query($koneksi, $query);

if($hapus){
    echo "<div id='status'>sukses</div>";
}else {
    echo "<div id='status'>gagal</div>";
}

?>