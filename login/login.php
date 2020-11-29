<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="../assets/css/login.css" media="screen" title="no title">
    <link href="../assets/css/sweetalert.css" rel="stylesheet">
    <link href="#" rel="shortcut icon" type="image/x-icon">

    <script src="../assets/js/jquery-1.11.1.min.js"></script>
	  <script src="../assets/js/bootstrap.min.js"></script>
	  <script src="../assets/js/sweetalert.min.js"></script>
    <title>Login | HAZE</title>
  </head>
  <body>
    <?php include '../backend/login.php'; ?>
    <div class="utama" align="center">
      <div class="container">
        <div class="row">
          <div class="col-md-3" style="margin-left:-40px;">
          </div>
          <div class="col-md-3 kiri box">
            <br><br><br><br><br>
            <img src="../assets/images/hazee.png" alt="logo" style="width:180px;"><br><br>
            <!-- <h4>Sistem Prakiraan Cuaca <br> </h4> -->
            <br><br>
          </div>
          <div class="col-md-4 kanan box2" align="left">
            <br><br>
            <!-- <h4 style="margin-left:20px;">Login</h4> -->
            <br>
            <div class="formlogin">
              <form method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
              </form>
            </div>
            <br><br><br>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="footer">
        Copyright © 2019 | <a href="#"><b>HAZE</b></a>
      <br><br><br>
    </div>
  </body>
</html>
