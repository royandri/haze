<?php include_once'../backend/autentikasi.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Haze</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- <link href="../assets/css/font-awesome.min.css" rel="stylesheet"> -->
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
	<link href="../assets/css/sweetalert.css" rel="stylesheet">
	<link href="../assets/DataTables/css/dataTables.bootstrap4.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/sweetalert.min.js"></script>
	<script src="../assets/DataTables/js/jquery.dataTables.min.js"></script>
	<script src="../assets/DataTables/js/dataTables.bootstrap4.js"></script>
	
	<script src="../assets/js/chart.min.js"></script>
	<!-- <script src="../assets/js/chart-data.js"></script> -->
	<script src="../assets/js/easypiechart.js"></script>
	<script src="../assets/js/easypiechart-data.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>

</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#">
					<img src="../assets/images/haze.png" alt="" style="width: 60px;">
				</a>
				<ul class="nav navbar-top-links navbar-right">

					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<i class="fa fa-user"></i> User &nbsp;<i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
									<div><em class=""></em> <b><?php echo $nama ?></b></div>
								</a></li>
							<li class="divider"></li>
							<li><a href="?p=ganti_password">
									<div><em class="fa fa-key"></em> Ganti Password</div>
								</a></li>
							<!-- <li class="divider"></li> -->
							<!-- <li><a href="#">
									<div><em class="fa fa-user"></em> Profil</div>
								</a></li> -->
							<li class="divider"></li>
							<li><a href="#" onclick="keluar();">
								<div><em class="fa fa-power-off"></em> Keluar</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
		<hr class="navbar-line warna">
	</nav>
	<!-- Akhir Navbar -->

	<!-- Sidebar -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $nama; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class=""><a href="?p=dashboard"><em class="fa fa-tachometer-alt">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-server">&nbsp;</em> Master <span data-toggle="collapse" href="#sub-item-1"
						class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="?p=dataset">
							<span class="">&nbsp;</span> Dataset
						</a></li>
					<li><a class="" href="?p=dataperjam">
							<span class="">&nbsp;</span> Data Per Jam
						</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#perhitungan">
					<em class="fa fa-calculator">&nbsp;</em> Perhitungan <span data-toggle="collapse" href="#sub-item-1"
						class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="perhitungan">
					<li><a class="" href="?p=perhitungan">
							<span class="">&nbsp;</span> Prakiraan Cuaca
						</a></li>
					<li><a class="" href="?p=uji_dataset">
							<span class="">&nbsp;</span> Uji Dataset
						</a></li>
						<li><a class="" href="?p=cuaca_siang">
							<span class="">&nbsp;</span> MA Cuaca Siang
						</a></li>
						<li><a class="" href="?p=cuaca_malam">
							<span class="">&nbsp;</span> MA Cuaca Malam
						</a></li>
						<li><a class="" href="?p=cuaca_besok">
							<span class="">&nbsp;</span> MA Cuaca Besok
						</a></li>
				</ul>
			</li>
			<hr>
			<li><a href="?p=prediksi_cuaca"><em class="fa fa-cloud-sun">&nbsp;</em> Prediksi Cuaca</a></li>
			<!-- <li><a href="#"><em class="fa fa-cogs">&nbsp;</em> Pengaturan</a></li> -->
		</ul>
	</div>
	<!--Akhir Sidebar-->

	<!-- Isi Kontent -->
	<?php
	if(isset($_GET['p'])){
		$page = $_GET['p'];

		if(file_exists("./view/" . $page . ".php")) {
			include_once './view/' . $page . ".php";
		} else {
			include_once './view/dashboard.php';
		}
	} else{
		include_once './view/dashboard.php';
	}
	?>
	<!-- Akhir Isi Kontent -->


	<!-- <script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script> -->
	<script>
	function keluar() {
    swal({
                    title: "Sign-Out?",
                    text: "Apakah anda yakin akan keluar?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmWarningText: "Ya, keluar",
                    closeOnConfirm: false
                },
                function () {
                    window.location="../login/logout.php";
                });
  	}
    </script>
</body>

</html>