<?php include_once '../config/db_config.php'; ?>
<?php include_once './backend/tampil_cuaca.php'; ?>
<?php 
date_default_timezone_set('Asia/Jakarta'); 
$hour = date('H'); 
?>

<script>
    $(document).ready(function () {
        $("#cuacasiang").hide();
        $("#cuacamalam").hide();
        $("#cuacabesok").hide();
    })
</script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row turun">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Prediksi Cuaca</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Prediksi Cuaca  </h1>
        </div>
    </div>
    <!--/.row-->

    <!-- Prediksi Cuaca Saat Ini -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Cuaca Per Jam
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="panel panel-container">
                        <div class="row">
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-teal panel-widget border-right">
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-temperature-high color-blue"></em>
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
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-<?php echo $status; ?> color-red"></em>
                                        <div class="large"><?php echo $cuaca['prediksi_cuaca']; ?></div>
                                        <div class="text-muted">Prediksi Cuaca</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Prediksi Cuaca Saat Ini -->

    <!-- Prediksi Cuaca Siang -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Cuaca Siang
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body" id="cuacasiang">
                    <div class="panel panel-container">
                        <div class="row">
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-teal panel-widget border-right">
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-temperature-high color-blue"></em>
                                        <div class="large"><?php echo $cuaca_siang['temperatur']; ?>°C</div>
                                        <div class="text-muted">Temperatur</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-blue panel-widget border-right">
                                    <div class="row no-padding"><em class="fa fa-xl fa-water color-orange"></em>
                                        <div class="large"><?php echo $cuaca_siang['kelembapan']; ?>%</div>
                                        <div class="text-muted">Kelembapan</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-orange panel-widget border-right">
                                    <div class="row no-padding"><em class="fa fa-xl fa-wind color-teal"></em>
                                        <div class="large"><?php echo $cuaca_siang['kecepatan_angin']; ?> km/h</div>
                                        <div class="text-muted">Kecepatan Angin</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-red panel-widget ">
                                    <?php 
                                    $status_siang = "";
                                    if($cuaca_siang['prediksi_cuaca'] == "Hujan") {
                                        $status_siang = "cloud-rain";
                                    } else if($cuaca_siang['prediksi_cuaca'] == "Berawan") {
                                        $status_siang = "cloud";
                                    } else if($cuaca_siang['prediksi_cuaca'] == "Cerah") {
                                        $status_siang = "sun";
                                    }
                                    ?>
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-<?php echo $status_siang; ?> color-red"></em>
                                        <div class="large"><?php echo $cuaca_siang['prediksi_cuaca']; ?></div>
                                        <div class="text-muted">Prediksi Cuaca</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                    <!-- Akhir Prediksi Cuaca Saat Ini -->
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Prediksi Cuaca Siang -->

    <!-- Prediksi Cuaca Malam -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Cuaca Malam
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body" id="cuacamalam">
                    <div class="panel panel-container">
                        <div class="row">
                        <?php 
                            $prediksi_malam = "";
                            $temperatur_malam = 0;
                            $kelembapan_malam = 0;
                            $angin_malam = 0;

                            if($hour > 18) {
                                $prediksi_malam = $cuaca['prediksi_cuaca'];
                                $temperatur_malam = $cuaca['temperatur'];
                                $kelembapan_malam = $cuaca['kelembapan'];
                                $angin_malam = $cuaca['kecepatan_angin'];
                            } else {
                                $prediksi_malam = $cuaca_malam['prediksi_cuaca'];
                                $temperatur_malam = $cuaca_malam['temperatur'];
                                $kelembapan_malam = $cuaca_malam['kelembapan'];
                                $angin_malam = $cuaca_malam['kecepatan_angin'];
                            }
                                        
                        ?>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-teal panel-widget border-right">
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-temperature-high color-blue"></em>
                                        <div class="large"><?php echo $temperatur_malam; ?>°C</div>
                                        <div class="text-muted">Temperatur</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-blue panel-widget border-right">
                                    <div class="row no-padding"><em class="fa fa-xl fa-water color-orange"></em>
                                        <div class="large"><?php echo $kelembapan_malam; ?>%</div>
                                        <div class="text-muted">Kelembapan</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-orange panel-widget border-right">
                                    <div class="row no-padding"><em class="fa fa-xl fa-wind color-teal"></em>
                                        <div class="large"><?php echo $angin_malam; ?> km/h</div>
                                        <div class="text-muted">Kecepatan Angin</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-red panel-widget ">
                                    <?php 
                                    $status_malam = "";
                                    if($prediksi_malam == "Hujan") {
                                        $status_malam = "cloud-rain";
                                    } else if($prediksi_malam == "Berawan") {
                                        $status_malam = "cloud";
                                    } else if($prediksi_malam == "Cerah") {
                                        $status_malam = "sun";
                                    }
                                    ?>
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-<?php echo $status_malam; ?> color-red"></em>
                                        <div class="large"><?php echo $prediksi_malam; ?></div>
                                        <div class="text-muted">Prediksi Cuaca</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                    <!-- Akhir Prediksi Cuaca Saat Ini -->
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Prediksi Cuaca Malam -->

    <!-- Prediksi Besok -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Cuaca Besok
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body" id="cuacabesok">
                    <div class="panel panel-container">
                        <div class="row">
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-teal panel-widget border-right">
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-temperature-high color-blue"></em>
                                        <div class="large"><?php echo $cuaca_besok['temperatur']; ?>°C</div>
                                        <div class="text-muted">Temperatur</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-blue panel-widget border-right">
                                    <div class="row no-padding"><em class="fa fa-xl fa-water color-orange"></em>
                                        <div class="large"><?php echo $cuaca_besok['kelembapan']; ?>%</div>
                                        <div class="text-muted">Kelembapan</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-orange panel-widget border-right">
                                    <div class="row no-padding"><em class="fa fa-xl fa-wind color-teal"></em>
                                        <div class="large"><?php echo $cuaca_besok['kecepatan_angin']; ?> km/h</div>
                                        <div class="text-muted">Kecepatan Angin</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                                <div class="panel panel-red panel-widget ">



                                    <?php 
                                    $status_besok = "";
                                    if($cuaca_besok['prediksi_cuaca'] == "Hujan") {
                                        $status_besok = "cloud-rain";
                                    } else if($cuaca_besok['prediksi_cuaca'] == "Berawan") {
                                        $status_besok = "cloud";
                                    } else if($cuaca_besok['prediksi_cuaca'] == "Cerah") {
                                        $status_besok = "sun";
                                    }
                                    ?>
                                    <div class="row no-padding"><em
                                            class="fa fa-xl fa-<?php echo $status_besok; ?> color-red"></em>
                                        <div class="large"><?php echo $cuaca_besok['prediksi_cuaca']; ?></div>
                                        <div class="text-muted">Prediksi Cuaca</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                    <!-- Akhir Prediksi Cuaca Besok -->
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Prediksi Cuaca Siang -->

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