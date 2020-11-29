<?php
include_once '../config/db_config.php';

if(isset($_POST['simpan'])) {
    $temperatur = $_POST['temperatur'];
    $kelembapan = $_POST['kelembapan'];
    $angin = $_POST['angin'];
    $prediksi = $_POST['prediksi'];

    $query = "INSERT INTO tbl_dataset (temperatur, kelembapan, kecepatan_angin, prediksi_cuaca) VALUES ('$temperatur', '$kelembapan', '$angin', '$prediksi')";
    $simpan = mysqli_query($koneksi, $query);

    if($simpan) {
        ?>
    <script>
        swal({
                title: "Sukses",
                text: "Data berhasil disimpan",
                type: "success",
                confirmButtonText: "Oke",
            },
            function () {
                window.location = "?p=dataset";
            });
    </script>
    <?php

    } else {
        echo "<script> swal('Gagal', 'Data gagal disimpan', 'error'); </script>";
    }
}


?>