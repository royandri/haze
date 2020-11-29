<!-- Created by : Roy Andri  Minggu, 08-04-2019-->

<?php
// ini_set('max_execution_time', 300); 
include_once '../config/db_config.php';
include_once './backend/besok.php';
include_once './backend/cekstatus_besok.php';
include_once './backend/tampil_datacuaca_besok.php';

$temper1 = array();
$temper = array();
$kelem1 = array();
$kelem = array();
$angin1 = array();
$angin = array();

$besok = new Besok($con);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row turun">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Perhitungan Cuaca besok</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Perhitungan Cuaca besok</h1>
        </div>
    </div>
    <!--/.row-->

    <?php

    if($jumlah['jumlah'] < 5) {
        ?>
    <!-- Jumlah Timeseries belum cukup -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hasil <b>Perhitungan Cuaca besok</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    Silahkan tunggu beberapa saat lagi
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Jumlah Timeseries belum cukup -->
    <?php
    } else {
        ?>
    <!-- Jumlah time sriec memenuhi -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Temperatur Hari Ini
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Tabel dataset -->
                            <div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jam</th>
                                                <th>Temperatur</th>
                                                <th>4 Jam (MA)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $awal = 0;
                                        $akhir = 4;
                                        $no = 1;
                                        $b = 0;
                                        $i = 0;
                                        $abs =  array();
                                        $tempmape =  array();
                                        
                                        while($a = mysqli_fetch_assoc($temp)):
                                        ?>
                                            <tr>
                                                <td> <?php echo $no; ?> </td>
                                                <td> <?php echo $a['waktu_jam'] ?> </td>
                                                <td align="center"> <?php echo $a['temperatur'] ?> </td>
                                                <?php
                                                if($no < 5) {
                                                    echo "<td></td>";
                                                    
                                                } else { 
                                                    $temper[$b] = round($besok->average('temperatur', $awal, $akhir));
                                                    echo "<td align='center' style='background-color: #D6EDFF;'>" .round($besok->average('temperatur', $awal, $akhir)) ."</td>";
                                                    $abs[$i] = abs($a['temperatur'] - $besok->average('temperatur', $awal, $akhir));
                                                    $tempmape[$i] = (abs($a['temperatur'] - $besok->average('temperatur', $awal, $akhir))) / $a['temperatur'];
                                                    $awal++;
                                                    $i++;
                                                    
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                            $no++;
                                            $b++;
                                            
                                        endwhile;
                                        
                                        $jam;
                                        $jlh = 22 - $jumlah['jumlah'];
                                        $awl = 0;
                                        if($jlh == 17) {
                                            $jam = 9;
                                            $awl = 1;
                                        }else if($jlh == 16){
                                            $jam = 10;
                                            $awl = 2;
                                        }else if($jlh == 15) {
                                            $jam = 11;
                                            $awl = 3;
                                        } else if($jlh == 14) {
                                            $jam = 12;
                                            $awl = 4;
                                        } else if($jlh == 13) {
                                            $jam = 13;
                                            $awl = 5;
                                        } else if($jlh == 12) {
                                            $jam = 14;
                                            $awl = 6;
                                        } else if($jlh == 11) {
                                            $jam = 15;
                                            $awl = 7;
                                        } else if($jlh == 10) {
                                            $jam = 16;
                                            $awl = 8;
                                        } else if($jlh == 9) {
                                            $jam = 17;
                                            $awl = 9;
                                        } else if($jlh == 8) {
                                            $jam = 18;
                                            $awl = 10;
                                        } else if($jlh == 7) {
                                            $jam = 19;
                                            $awl = 11;
                                        } else if($jlh ==6) {
                                            $jam = 20;
                                            $awl = 12;
                                        }else if($jlh == 5) {
                                            $jam = 21;
                                            $awl = 13;
                                        }else if($jlh == 4) {
                                            $jam = 22;
                                            $awl = 14;
                                        }else if($jlh == 3) {
                                            $jam = 23;
                                            $awl = 15;
                                        }else if($jlh == 2) {
                                            $jam = 24;
                                            $awl = 16;
                                        }else if($jlh == 1) {
                                            $jam = 0;
                                            $awl = 17;
                                        }

                                        echo $jlh;  

                                        ?><tr><?php
                                        
                                        for($i = 0; $i < $jlh ; $i++) {
                                            echo "<td>" .$no ."</td>";
                                            if($jam == 25) {
                                                echo "<td>00".":00:00</td>";
                                            } else if(strlen($jam) < 2) {
                                                echo "<td>0".$jam .":00:00</td>";
                                            } else {
                                                echo "<td>" .$jam .":00:00 </td>";
                                            }

                                            ?>
                                                <td></td>
                                                <td align='center' style='background-color: #D6EDFF;'> 
                                                <?php 
                                                echo round($besok->average('temperatur', $awl, $akhir)); 
                                                $temper1[$i] = round($besok->average('temperatur', $awl, $akhir));
                                                
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            $jam++;
                                            $awl++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Akhir Tabel dataset -->

                                <!-- Tabel Uji -->
                                <table>
                                    <?php
                                    $totalabs = 0;
                                    $totalmse = 0;
                                    $totalmape = 0;
                                    $sqmse = array();

                                    foreach ($abs as $key => $value) {
                                        $totalabs = $totalabs + $abs[$key];
                                        $sqmse[$key] = pow($abs[$key], 2);
                                    }

                                    foreach ($sqmse as $key => $value) {
                                        $totalmse = $totalmse + $sqmse[$key];
                                    }

                                    foreach ($tempmape as $key => $value) {
                                        $totalmape = $totalmape + $tempmape[$key];
                                    }

                                    $mad = $totalabs / sizeof($abs);
                                    $temp = $totalmse / sizeof($sqmse);
                                    $mse = sqrt($temp);
                                    $mape = $totalmape / sizeof($tempmape);
                                    ?>
                                    <tr>
                                        <td> <b>MAD</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mad; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>MSE</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mse; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>MAPE</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mape; ?> </td>
                                    </tr>
                                </table>
                                <!-- Akhir Tabel Uji -->
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="canvas-wrapper">
                                <canvas class="main-chart" id="chart-temp" height="380" width="500"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Timeseries Kelembapan -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Kelembapan Hari Ini
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Tabel dataset -->
                            <div>
                                <?php include_once './backend/tampil_datacuaca_besok.php'; ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jam</th>
                                                <th>Kelembapan</th>
                                                <th>4 Jam (MA)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $awal = 0;
                                        $akhir = 4;
                                        $no = 1;
                                        $z = 0;
                                        $i = 0;
                                        $abs =  array();
                                        $tempmape =  array();
                                        while($a = mysqli_fetch_assoc($humi)):
                                        ?>
                                            <tr>
                                                <td> <?php echo $no; ?> </td>
                                                <td> <?php echo $a['waktu_jam'] ?> </td>
                                                <td align='center'> <?php echo $a['kelembapan'] ?> </td>
                                                <?php
                                                if($no < 5) {
                                                    echo "<td></td>";
                                                    
                                                } else { 
                                                    $kelem[$z] = round($besok->average('kelembapan', $awal, $akhir));
                                                    echo "<td align='center' style='background-color: #D6EDFF;'>" .round($besok->average('kelembapan', $awal, $akhir)) ."</td>";
                                                    $abs[$i] = abs($a['kelembapan'] - $besok->average('kelembapan', $awal, $akhir));
                                                    $tempmape[$i] = (abs($a['kelembapan'] - $besok->average('kelembapan', $awal, $akhir))) / $a['kelembapan'];
                                                    $awal++;
                                                    $i++;
                                                    $z++;
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                            $no++;
                                        endwhile;
                                        
                                        $jam;
                                        $jlh = 22 - $jumlah['jumlah'];
                                        $awl = 0;
                                        if($jlh == 17) {
                                            $jam = 9;
                                            $awl = 1;
                                        }else if($jlh == 16){
                                            $jam = 10;
                                            $awl = 2;
                                        }else if($jlh == 15) {
                                            $jam = 11;
                                            $awl = 3;
                                        } else if($jlh == 14) {
                                            $jam = 12;
                                            $awl = 4;
                                        } else if($jlh == 13) {
                                            $jam = 13;
                                            $awl = 5;
                                        } else if($jlh == 12) {
                                            $jam = 14;
                                            $awl = 6;
                                        } else if($jlh == 11) {
                                            $jam = 15;
                                            $awl = 7;
                                        } else if($jlh == 10) {
                                            $jam = 16;
                                            $awl = 8;
                                        } else if($jlh == 9) {
                                            $jam = 17;
                                            $awl = 9;
                                        } else if($jlh == 8) {
                                            $jam = 18;
                                            $awl = 10;
                                        } else if($jlh == 7) {
                                            $jam = 19;
                                            $awl = 11;
                                        } else if($jlh ==6) {
                                            $jam = 20;
                                            $awl = 12;
                                        }else if($jlh == 5) {
                                            $jam = 21;
                                            $awl = 13;
                                        }else if($jlh == 4) {
                                            $jam = 22;
                                            $awl = 14;
                                        }else if($jlh == 3) {
                                            $jam = 23;
                                            $awl = 15;
                                        }else if($jlh == 2) {
                                            $jam = 24;
                                            $awl = 16;
                                        }else if($jlh == 1) {
                                            $jam = 0;
                                            $awl = 17;
                                        }

                                        echo $jlh;  

                                        ?><tr><?php
                                        
                                        for($i = 0; $i < $jlh ; $i++) {
                                            echo "<td>" .$no ."</td>";
                                            if($jam == 25) {
                                                echo "<td>00".":00:00</td>";
                                            } else if(strlen($jam) < 2) {
                                                echo "<td>0".$jam .":00:00</td>";
                                            } else {
                                                echo "<td>" .$jam .":00:00 </td>";
                                            }
                                            ?>
                                                <td></td>
                                                <td align='center' style='background-color: #D6EDFF;'> 
                                                <?php 
                                                echo round($besok->average('kelembapan', $awl, $akhir)); 
                                                $kelem1[$i] = round($besok->average('kelembapan', $awl, $akhir));
                                                
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            $jam++;
                                            $awl++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Akhir Tabel dataset -->

                                <!-- Tabel Uji -->
                                <table>
                                    <?php
                                    $totalabs = 0;
                                    $totalmse = 0;
                                    $totalmape = 0;
                                    $sqmse = array();

                                    foreach ($abs as $key => $value) {
                                        $totalabs = $totalabs + $abs[$key];
                                        $sqmse[$key] = pow($abs[$key], 2);
                                    }

                                    foreach ($sqmse as $key => $value) {
                                        $totalmse = $totalmse + $sqmse[$key];
                                    }

                                    foreach ($tempmape as $key => $value) {
                                        $totalmape = $totalmape + $tempmape[$key];
                                    }

                                    $mad = $totalabs / sizeof($abs);
                                    $temp = $totalmse / sizeof($sqmse);
                                    $mse = sqrt($temp);
                                    $mape = $totalmape / sizeof($tempmape);
                                    ?>
                                    <tr>
                                        <td> <b>MAD</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mad; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>MSE</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mse; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>MAPE</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mape; ?> </td>
                                    </tr>
                                </table>
                                <!-- Akhir Tabel Uji -->
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="canvas-wrapper">
                                <canvas class="main-chart" id="chart-hum" height="380" width="500"></canvas>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Timeseries Kelembapan -->

    <!-- Timeseries Kecepatan Angin -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Kecepatan Angin Hari Ini
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Tabel dataset -->
                            <div>
                                <?php include_once './backend/tampil_datacuaca_besok.php'; ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jam</th>
                                                <th>Kecepatan Angin</th>
                                                <th>4 Jam (MA)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $awal = 0;
                                        $akhir = 4;
                                        $no = 1;
                                        $i = 0;
                                        $b;
                                        $abs =  array();
                                        $tempmape =  array();
                                        while($a = mysqli_fetch_assoc($wind)):
                                        ?>
                                            <tr>
                                                <td> <?php echo $no; ?> </td>
                                                <td> <?php echo $a['waktu_jam'] ?> </td>
                                                <td> <?php echo $a['kecepatan_angin'] ?> </td>
                                                <?php
                                                if($no < 5) {
                                                    echo "<td></td>";
                                                    
                                                } else { 
                                                    $angin[$b] = round($besok->average('kecepatan_angin', $awal, $akhir));
                                                    echo "<td align='center' style='background-color: #D6EDFF;'>" .round($besok->average('kecepatan_angin', $awal, $akhir)) ."</td>";
                                                    $abs[$i] = abs($a['kecepatan_angin'] - $besok->average('kecepatan_angin', $awal, $akhir));
                                                    $tempmape[$i] = (abs($a['kecepatan_angin'] - $besok->average('kecepatan_angin', $awal, $akhir))) / $a['kecepatan_angin'];
                                                    $awal++;
                                                    $i++;
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                            $no++;
                                            $b++;
                                            
                                        endwhile;
                                        
                                        $jam;
                                        $jlh = 22 - $jumlah['jumlah'];
                                        $awl = 0;
                                        if($jlh == 17) {
                                            $jam = 9;
                                            $awl = 1;
                                        }else if($jlh == 16){
                                            $jam = 10;
                                            $awl = 2;
                                        }else if($jlh == 15) {
                                            $jam = 11;
                                            $awl = 3;
                                        } else if($jlh == 14) {
                                            $jam = 12;
                                            $awl = 4;
                                        } else if($jlh == 13) {
                                            $jam = 13;
                                            $awl = 5;
                                        } else if($jlh == 12) {
                                            $jam = 14;
                                            $awl = 6;
                                        } else if($jlh == 11) {
                                            $jam = 15;
                                            $awl = 7;
                                        } else if($jlh == 10) {
                                            $jam = 16;
                                            $awl = 8;
                                        } else if($jlh == 9) {
                                            $jam = 17;
                                            $awl = 9;
                                        } else if($jlh == 8) {
                                            $jam = 18;
                                            $awl = 10;
                                        } else if($jlh == 7) {
                                            $jam = 19;
                                            $awl = 11;
                                        } else if($jlh ==6) {
                                            $jam = 20;
                                            $awl = 12;
                                        }else if($jlh == 5) {
                                            $jam = 21;
                                            $awl = 13;
                                        }else if($jlh == 4) {
                                            $jam = 22;
                                            $awl = 14;
                                        }else if($jlh == 3) {
                                            $jam = 23;
                                            $awl = 15;
                                        }else if($jlh == 2) {
                                            $jam = 24;
                                            $awl = 16;
                                        }else if($jlh == 1) {
                                            $jam = 0;
                                            $awl = 17;
                                        }

                                        echo $jlh;  

                                        ?><tr><?php
                                        
                                        for($i = 0; $i < $jlh ; $i++) {
                                            echo "<td>" .$no ."</td>";
                                            if($jam == 25) {
                                                echo "<td>00".":00:00</td>";
                                            } else if(strlen($jam) < 2) {
                                                echo "<td>0".$jam .":00:00</td>";
                                            } else {
                                                echo "<td>" .$jam .":00:00 </td>";
                                            }
                                            ?>
                                                <td></td>
                                                <td align='center' style='background-color: #D6EDFF;'> 
                                                <?php 
                                                echo round($besok->average('kecepatan_angin', $awl, $akhir)); 
                                                $angin1[$i] = round($besok->average('kecepatan_angin', $awl, $akhir));
                                                
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            $jam++;
                                            $awl++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Akhir Tabel dataset -->

                                <!-- Tabel Uji -->
                                <table>
                                    <?php
                                    $totalabs = 0;
                                    $totalmse = 0;
                                    $totalmape = 0;
                                    $sqmse = array();

                                    foreach ($abs as $key => $value) {
                                        $totalabs = $totalabs + $abs[$key];
                                        $sqmse[$key] = pow($abs[$key], 2);
                                    }

                                    foreach ($sqmse as $key => $value) {
                                        $totalmse = $totalmse + $sqmse[$key];
                                    }

                                    foreach ($tempmape as $key => $value) {
                                        $totalmape = $totalmape + $tempmape[$key];
                                    }

                                    $mad = $totalabs / sizeof($abs);
                                    $temp = $totalmse / sizeof($sqmse);
                                    $mse = sqrt($temp);
                                    $mape = $totalmape / sizeof($tempmape);
                                    ?>
                                    <tr>
                                        <td> <b>MAD</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mad; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>MSE</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mse; ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>MAPE</b> </td>
                                        <td> &emsp;:&emsp; </td>
                                        <td> <?php echo $mape; ?> </td>
                                    </tr>
                                </table>
                                <!-- Akhir Tabel Uji -->
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="canvas-wrapper">
                                <canvas class="main-chart" id="chart-wind" height="380" width="500"></canvas>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Timeseries Angin -->

    <!-- Akhir Jumlah time sriec memenuhi -->
    <?php
    
    }
 
    ?>

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
        var chart5 = document.getElementById("chart-temp").getContext("2d");
        window.myLine = new Chart(chart5).Line(lineChartData_Temperatur, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });

        var chart3 = document.getElementById("chart-hum").getContext("2d");
        window.myLines = new Chart(chart3).Line(lineChartData_Humadity, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });

        var chart4 = document.getElementById("chart-wind").getContext("2d");
        window.myLines = new Chart(chart4).Line(lineChartData_Wind, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };

    var lineChartData_Temperatur = {
		labels : ["04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00","00:00"],
		datasets : [
			{
				label: "Data Awal",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
                data : 
                [
                    <?php
                    $query = "SELECT temperatur FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '24:00:00' AND DATE(waktu_tanggal) = CURDATE();";
                    $temp = mysqli_query($koneksi, $query);
                    while($a = mysqli_fetch_assoc($temp)):
                        echo $a['temperatur'].",";            
                    endwhile;
                    ?>
                ]
			},
			{
				label: "Data Prediksi",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
                data : 
                [
                    0,0,0,0,
                    <?php
                    foreach ($temper as $key => $value) {
                        echo $temper[$key].",";
                    }

                    foreach ($temper1 as $key => $value) {
                        echo $temper1[$key].",";
                    }
                    ?>
                ]
			}
		]

    }
    
// Kelembapan
    var lineChartData_Humadity = {
		labels : ["04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00","00:00"],
		datasets : [
			{
				label: "Data Awal2",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
                data : 
                [
                    <?php
                    $query = "SELECT kelembapan FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '24:00:00' AND DATE(waktu_tanggal) = CURDATE();";
                    $temp = mysqli_query($koneksi, $query);
                    while($a = mysqli_fetch_assoc($temp)):
                        echo $a['kelembapan'].",";            
                    endwhile;
                    ?>
                ]
			},
			{
				label: "Data Prediksi2",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
                data : 
                [
                    0,0,0,0,
                    <?php
                    foreach ($kelem as $key => $value) {
                        echo $kelem[$key].",";
                    }

                    foreach ($kelem1 as $key => $value) {
                        echo $kelem1[$key].",";
                    }
                    ?>
                ]
			}
		]

	}
// Akhir Kelembapan

// Wind
var lineChartData_Wind = {
    labels : ["04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00","00:00"],
		datasets : [
			{
				label: "Data Awal2",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
                data : 
                [
                    <?php
                    $query = "SELECT kecepatan_angin FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '24:00:00' AND DATE(waktu_tanggal) = CURDATE();";
                    $temp = mysqli_query($koneksi, $query);
                    while($a = mysqli_fetch_assoc($temp)):
                        echo $a['kecepatan_angin'].",";            
                    endwhile;
                    ?>
                ]
			},
			{
				label: "Data Prediksi2",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
                data : 
                [
                    0,0,0,0,
                    <?php
                    foreach ($angin as $key => $value) {
                        echo $angin[$key].",";
                    }

                    foreach ($angin1 as $key => $value) {
                        echo $angin1[$key].",";
                    }
                    ?>
                ]
			}
		]

	}
// Akhir Wind
</script>