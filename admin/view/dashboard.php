<?php include_once '../config/db_config.php'; ?>
<?php include_once './backend/tampil_dashboard.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row turun">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-temperature-high color-blue"></em>
                        <div class="large"><?php echo $cuaca['temperatur']; ?>°C</div>
                        <div class="text-muted">Temperatur</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-water color-orange"></em>
                        <div class="large"><?php echo $cuaca['kelembapan']; ?>%</div>
                        <div class="text-muted">Kelembapan</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-wind color-teal"></em>
                        <div class="large"><?php echo $cuaca['kecepatan_angin']; ?> km/h</div>
                        <div class="text-muted">Kecepatan Angin</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <?php 
                $status = "";
                if($cuaca['prediksi_cuaca'] == "Hujan") {
                    $status = "cloud-rain";
                } else if($cuaca['prediksi_cuaca'] == "Berawan") {
                    $status = "cloud";
                } else if($cuaca['prediksi_cuaca'] == "Cerah") {
                    $status = "sun";
                }
                ?>
                    <div class="row no-padding"><em class="fa fa-xl fa-<?php echo $status; ?> color-red"></em>
                        <div class="large"><?php echo $cuaca['prediksi_cuaca']; ?></div>
                        <div class="text-muted">Prediksi Cuaca</div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Cuaca Per Jam
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                    <br>
                    <b>Keterangan</b>
                    <table>
                        <tr>
                            <td width="20px;" style="background-color: rgba(48, 164, 255, 1) "></td>
                            <td>&emsp;Temperatur</td>
                        </tr>
                        <tr>
                            <td width="20px;" style="background-color: rgba(243, 156, 18, 1) "></td>
                            <td>&emsp;Kelembapan</td>
                        </tr>
                        <tr>
                            <td width="20px;" style="background-color: rgba(77, 175, 124, 1) "></td>
                            <td>&emsp;Kecepatan Angin</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <!--/.col-->

        <!--/.col-->
        <div class="col-sm-12">
            <p class="back-link">HAZE by <a href="#">Roy Andri</a></p>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->

<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };

    var lineChartData = {
		labels : 
            [
                    <?php
                    $query = "SELECT *FROM tbl_dataperjam WHERE DATE(waktu_tanggal) = CURDATE();";
                    $temp = mysqli_query($koneksi, $query);
                    while($a = mysqli_fetch_assoc($temp)):
                        echo "'" . substr($a['waktu_jam'], 0, 5)."',";            
                    endwhile;
                    ?>
            ],
		datasets : [
			{
				label: "Temperatur",
				fillColor : "transparent",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
                data : 
                [
                    <?php
                    $query = "SELECT *FROM tbl_dataperjam WHERE DATE(waktu_tanggal) = CURDATE();";
                    $temp = mysqli_query($koneksi, $query);
                    while($b = mysqli_fetch_assoc($temp)):
                        echo $b['temperatur'] .",";            
                    endwhile;
                    ?>
                ]
			},
			{
				label: "Kelembapan",
				fillColor : "transparent",
				strokeColor : "rgba(243, 156, 18, 1)",
				pointColor : "rgba(243, 156, 18, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
                data : 
                [
                    <?php
                    $query = "SELECT *FROM tbl_dataperjam WHERE DATE(waktu_tanggal) = CURDATE();";
                    $temp = mysqli_query($koneksi, $query);
                    while($b = mysqli_fetch_assoc($temp)):
                        echo $b['kelembapan'] .",";            
                    endwhile;
                    ?>
                ]
			},
			{
				label: "Kecepatan Angin",
				fillColor : "transparent",
				strokeColor : "rgba(77, 175, 124, 1)",
				pointColor : "rgba(77, 175, 124, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
                data : 
                [
                    <?php
                    $query = "SELECT *FROM tbl_dataperjam WHERE DATE(waktu_tanggal) = CURDATE();";
                    $temp = mysqli_query($koneksi, $query);
                    while($b = mysqli_fetch_assoc($temp)):
                        echo $b['kecepatan_angin'] .",";            
                    endwhile;
                    ?>
                ]
			}
		]

	}
// Akhir Wind
</script>