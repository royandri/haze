<?php
include_once '../../config/db_config.php';

$id = $_GET['id'];
$password = $_GET['password'];

$query = "SELECT password FROM tbl_pengguna WHERE id = '$id' ";
$exe = mysqli_query($koneksi, $query);


if(mysqli_num_rows($exe) > 0) {
    $a = mysqli_fetch_assoc($exe);
    $password_hasil = $a['password'];
    $passwordmd5 = md5($password);

    if($password_hasil == $passwordmd5){
        echo "<div id='status'>sukses</div>";
    } else {
        echo "<div id='status'>gagal</div>";
    }
    
} else {
    echo "<div id='status'>gagal</div>";
}
?>