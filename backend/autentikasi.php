<?php

  // membuka session untuk mengolah data akun yang login
  session_start();

  // memeriksa apakah pengguna sudah login sebelumnya
  if (!isset($_SESSION['sudah_login'])) {
    // jika iya
?>
      <script type="text/javascript">
        window.location = "../login/login.php";
      </script>

<?php
  }

  $id_user = $_SESSION['id_login'];
  $username = $_SESSION['username'];
  $posisi = $_SESSION['posisi'];
  $nama = $_SESSION['nama'];
?>
