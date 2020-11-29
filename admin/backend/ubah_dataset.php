<?php
include_once '../config/db_config.php';

if(isset($_POST['ubah'])) {
    $id = $_POST['edtid'];
    $temperatur = $_POST['edttemperatur'];
    $kelembapan = $_POST['edtkelembapan'];
    $angin = $_POST['edtangin'];
    $prediksi = $_POST['edtprediksi'];

    $query = "UPDATE tbl_dataset SET temperatur = '$temperatur', kelembapan = '$kelembapan', kecepatan_angin = '$angin', prediksi_cuaca = '$prediksi' WHERE id_dataset = '$id'";
    $ubah = mysqli_query($koneksi, $query);

    if($ubah) {
        ?>
    <script>
        swal({
                title: "Sukses",
                text: "Data berhasil diubah",
                type: "success",
                confirmButtonText: "Oke",
            },
            function () {
                window.location = "?p=dataset";
            });
    </script>
    <?php

    } else {
        echo "<script> swal('Gagal', 'Data gagal diubah', 'error'); </script>";
    }
}


?>