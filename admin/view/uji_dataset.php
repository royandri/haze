<!-- Created by : Roy Andri  Senin, 15-04-2019-->
<?php 
include_once '../config/db_config.php';
include_once './backend/Fungsi.php';
$naive = new Fungsi($con);

?>

<script>
$(document).ready(function(){
    $("#bodydataset").hide();
})
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row turun">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Uji Dataset</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Uji Dataset</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dataset
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body" id="bodydataset">
                    
                    <!-- Tabel dataset -->
                    <div class="table-responsive">
                    <?php include_once './backend/tampil_dataset.php'; ?>
                        <table class="table table-bordered" id="tabel_dataset">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Hasil Uji</th>
                                    <th>Temperatur (°C)</th>
                                    <th>Kelembapan (%)</th>
                                    <th>Kecepatan Angin (km/h)</th>
                                    <th>Cuaca Actual</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $w_predict;
                            $hujan_hujan = 0;
                            $hujan_berawan = 0;
                            $hujan_cerah = 0;
                            $berawan_hujan = 0;
                            $berawan_berawan = 0;
                            $berawan_cerah = 0;
                            $cerah_hujan = 0;
                            $cerah_berawan = 0;
                            $cerah_cerah = 0;
                            while($a = mysqli_fetch_object($exe)):
                                $hujan = $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Hujan", $a->temperatur, $a->kelembapan, $a->kecepatan_angin);
                                $berawan = $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Berawan", $a->temperatur, $a->kelembapan, $a->kecepatan_angin);
                                $cerah = $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Cerah", $a->temperatur, $a->kelembapan, $a->kecepatan_angin);

                                $normal_hujan = $naive->normalisasi($hujan, $berawan, $cerah, "Hujan");
                                $normal_berawan = $naive->normalisasi($hujan, $berawan, $cerah, "Berawan");
                                $normal_cerah = $naive->normalisasi($hujan, $berawan, $cerah, "Cerah");
                        
                                $hasil = $naive->hasil($normal_hujan, $normal_berawan, $normal_cerah);

                                if($hasil == $a->prediksi_cuaca) {
                                    $w_predict = "green";
                                } else {
                                    $w_predict = "red";
                                }

                                if($a->prediksi_cuaca == "Hujan" && $hasil == $a->prediksi_cuaca) {
                                    $hujan_hujan+=1;
                                }else if($a->prediksi_cuaca == "Hujan" && $hasil == "Berawan"){
                                    $hujan_berawan+=1;
                                }else if($a->prediksi_cuaca == "Hujan" && $hasil == "Cerah"){
                                    $hujan_cerah+=1;
                                }

                                if($a->prediksi_cuaca == "Berawan" && $hasil == $a->prediksi_cuaca) {
                                    $berawan_berawan+=1;
                                }else if($a->prediksi_cuaca == "Berawan" && $hasil == "Hujan"){
                                    $berawan_hujan+=1;
                                }else if($a->prediksi_cuaca == "Berawan" && $hasil == "Cerah"){
                                    $berawan_cerah+=1;
                                }

                                if($a->prediksi_cuaca == "Cerah" && $hasil == $a->prediksi_cuaca) {
                                    $cerah_cerah+=1;
                                }else if($a->prediksi_cuaca == "Cerah" && $hasil == "Hujan"){
                                    $cerah_hujan+=1;
                                }else if($a->prediksi_cuaca == "Cerah" && $hasil == "Berawan"){
                                    $cerah_berawan+=1;
                                }

                                ?>
                                <tr>
                                    <td align="center"> <?php echo $no; ?></td>
                                    <td style="background-color : <?php  echo $w_predict ?>; color: white;"><?php echo $hasil ?></td>
                                    <td align="center"> <?php echo $a->temperatur; ?></td>
                                    <td align="center"> <?php echo $a->kelembapan; ?></td>
                                    <td align="center"> <?php echo $a->kecepatan_angin; ?></td>
                                    <td> <?php echo $a->prediksi_cuaca; ?></td>
                                </tr>
                                <?php
                                $no++;
                            endwhile;
                            ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- Akhir Tabel dataset -->
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->

     <!-- Hasil Akurasi -->
     <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                Pengujian <b> Confusion Matrix</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td align="middle" rowspan="5" ><b> <br><br><br><br>Actual</b> </td>
                                <td rowspan="2"></td>
                                <td align="center" colspan="4"> <b>Predict</b> </td>
                            </tr>
                            <tr>
                                <td align="center"> <b>Hujan</b> </td>
                                <td align="center"> <b>Berawan</b> </td>
                                <td align="center"> <b>Cerah</b> </td>
                            </tr>
                            <tr>
                                
                                <td> <b>Hujan</b> </td>
                                <td align="center" style="background-color: green; color: white"> <?php echo $hujan_hujan ?> </td>
                                <td align="center"> <?php echo $hujan_berawan; ?> </td>
                                <td align="center"> <?php echo $hujan_cerah; ?> </td>
                            </tr>
                            <tr>
                                
                                <td> <b>Berawan</b> </td>
                                <td align="center"> <?php echo $berawan_hujan ?> </td>
                                <td align="center" style="background-color: green; color: white"> <?php echo $berawan_berawan ?> </td>
                                <td align="center"> <?php echo $berawan_cerah ?> </td>
                            </tr>
                            <tr>
                                <td> <b>Cerah</b> </td>
                                <td align="center"> <?php echo $cerah_hujan ?> </td>
                                <td align="center"> <?php echo $cerah_berawan ?> </td>
                                <td align="center" style="background-color: green; color: white"> <?php echo $cerah_cerah ?> </td>
                            </tr>
                        </table>
                        <?php 
                        $benar = $cerah_cerah + $berawan_berawan + $hujan_hujan;
                        $total_error = $cerah_hujan + $cerah_berawan+ $berawan_hujan + $berawan_cerah + $hujan_cerah + $hujan_berawan;
                        $total = $cerah_cerah + $cerah_hujan + $cerah_berawan + $berawan_berawan + $berawan_hujan + $berawan_cerah + $hujan_hujan + $hujan_cerah + $hujan_berawan;
                        $akurasi = ($benar/$total)*100;
                        $error = ($total_error/$total)*100;
                        echo "True Positive &emsp;= <b>" .$benar ."</b> <br>";
                        echo "False Negative = <b>" .$total_error ."</b> <br><br>";
                        echo "Akurasi = <b>" .round($akurasi,2) ."%</b> <br>";
                        echo "Galat &emsp;= <b>" .round($error,2) ."%</b>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Hasil Akurasi -->

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
$(document).ready(function(){
    // $("#tabel_dataset").dataTable();

    $('[data-toggle="popover"]').poopover({
        placement : 'top',
        trigger : 'hover'
    }); 
})
</script>