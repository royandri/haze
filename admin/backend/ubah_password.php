<!-- Created by : Roy Andri  Rabu, 24-04-2019-->
<?php
include_once '../config/db_config.php';

if(isset($_POST['simpan'])) {
    $passwordlama = $_POST['passwordlama'];
    $passwordbaru = $_POST['passwordbaru2'];

    if($passwordlama == $passwordbaru) {
        echo "<script> swal('', 'Password baru sama dengan password lama !', 'warning'); </script>";
    } else {
        $pwdmd5 = md5($passwordbaru);
        $query = "UPDATE tbl_pengguna SET password = '$pwdmd5' WHERE id = '$id_user' ";
        $simpan = mysqli_query($koneksi, $query);

        if($simpan) {
            ?>
            <script> 
            swal({
                title: "Sukses",
                text: "Data berhasil diubah",
                type: "success",
                confirmButtonText: "Oke",
            },
            function () {
                window.location = "?p=dashboard";
            });
            </script>
            <?php
        } else {
            echo "<script> swal('Gagal', 'Password gagal diubah !', 'error'); </script>";
        }
    }
}
?>