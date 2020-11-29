<?php
//membuka session
session_start();
//cek apakah sudah Login
if(isset($_SESSION['sudah_login'])){
  //jika iya
  ?>
  <script type="text/javascript">
    window.location='../admin/'
  </script>
  <?php
}else {
  //jika belum Login
  ?>
  <script type="text/javascript">
    window.location='login.php';
  </script>
  <?php
}
 ?>
