
<!-- Created by : Roy Andri  Senin, 08-04-2019-->
<?php
include_once '../config/db_config.php';
include_once './backend/Fungsi.php';
include_once './backend/Siang.php';
include_once './backend/Malam.php';
include_once './backend/Besok.php';
include_once './backend/tampil_data.php';

$naive = new Fungsi($con);

$data = mysqli_fetch_object($exe);
$temperatur = $data->temperatur;    
$kelembapan = $data->kelembapan;
$kecepatan_angin = $data->kecepatan_angin;

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
            <li class="active">Perhitungan Prakiraan Cuaca</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Perhitungan Prakiraan Cuaca</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Manual
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="temperatur" class="col-sm-2 col-form-label" style="margin-right:-50px; margin-top:6px;">Temperatur (°C) : </label>
                            <div class="col-sm-1">
                                <input type="number" required class="form-control" id="temperatur" name="temperatur" placeholder="0" style="height: 35px;">
                            </div>

                            <label for="kelembapan" class="col-sm-2 col-form-label" style="margin-right:-48px;  margin-top:6px;">Kelembapan (%) : </label>
                            <div class="col-sm-1">
                                <input type="number" required class="form-control" id="kelembapan" name = "kelembapan" placeholder="0" style="height: 35px;">
                            </div>

                            <label for="angin" class="col-sm-3 col-form-label" style="margin-right:-80px;  margin-top:6px;">Kecepatan Angin (km/h) : </label>
                            <div class="col-sm-1">
                                <input type="number" required class="form-control" id="angin" name="kecepatan_angin" placeholder="0" style="height: 35px; margin-bottom: 10px;">
                            </div>

                            <div class="col-sm-1">
                                <button class="btn btn-primary" type="submit" name="simpan" id="simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Uji
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="form-group row">
                        <label for="temperatur" class="col-sm-2 col-form-label" >Temperatur : <?php echo $temperatur; ?>°C </label>
                        <label for="kelembapan" class="col-sm-2 col-form-label" >Kelembapan : <?php echo $kelembapan; ?>% </label>
                        <label for="angin" class="col-sm-3 col-form-label" >Kecepatan Angin : <?php echo $kecepatan_angin; ?> km/h     </label>

                    </div>
                </div>
            </div>
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
                                    <th>Temperatur (°C)</th>
                                    <th>Kelembapan (%)</th>
                                    <th>Kecepatan Angin (km/h)</th>
                                    <th>Prediksi Cuaca</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            while($a = mysqli_fetch_object($exe)):
                                ?>
                                <tr>
                                    <td align="center"> <?php echo $no; ?></td>
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

    <!-- Mean dan Standard Deviasi Temperatur -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mean dan Standard Deviasi <b>Temperatur</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cuaca</th>
                                    <th>Mean</th>
                                    <th>Standard Deviasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hujan</td>
                                    <td> <?php echo round($naive->mean("kecepatan_angin", "Hujan"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kecepatan_angin", "Hujan"),4);?> </td>
                                </tr>
                                <tr>
                                    <td>Berawan</td>
                                    <td> <?php echo round($naive->mean("kecepatan_angin", "Berawan"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kecepatan_angin", "Berawan"),4);?> </td>
                                </tr>
                                <tr>
                                    <td>Cerah</td>
                                    <td> <?php echo round($naive->mean("kecepatan_angin", "Cerah"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kecepatan_angin", "Cerah"),4);?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Mean dan Standard Deviasi Temperatur -->

    <!-- Mean dan Standard Deviasi Kelembapan -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mean dan Standard Deviasi <b>Kelembapan</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cuaca</th>
                                    <th>Mean</th>
                                    <th>Standard Deviasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hujan</td>
                                    <td> <?php echo round($naive->mean("kelembapan", "Hujan"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kelembapan", "Hujan"),4);?> </td>
                                </tr>
                                <tr>
                                    <td>Berawan</td>
                                    <td> <?php echo round($naive->mean("kelembapan", "Berawan"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kelembapan", "Berawan"),4);?> </td>
                                </tr>
                                <tr>
                                    <td>Cerah</td>
                                    <td> <?php echo round($naive->mean("kelembapan", "Cerah"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kelembapan", "Cerah"),4);?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Mean dan Standard Deviasi Kelembapan -->

    <!-- Mean dan Standard Deviasi Kecepatan Angin -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mean dan Standard Deviasi <b>Kecepatan Angin</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cuaca</th>
                                    <th>Mean</th>
                                    <th>Standard Deviasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hujan</td>
                                    <td> <?php echo round($naive->mean("kecepatan_angin", "Hujan"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kecepatan_angin", "Hujan"),4);?> </td>
                                </tr>
                                <tr>
                                    <td>Berawan</td>
                                    <td> <?php echo round($naive->mean("kecepatan_angin", "Berawan"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kecepatan_angin", "Berawan"),4);?> </td>
                                </tr>
                                <tr>
                                    <td>Cerah</td>
                                    <td> <?php echo round($naive->mean("kecepatan_angin", "Cerah"),4) ?> </td>
                                    <td> <?php echo round($naive->standarDeviasi("kecepatan_angin", "Cerah"),4);?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Mean dan Standard Deviasi Kecepatan Angin -->

    <!-- Probabilitas Setiap Kelas -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Probabilitas Setiap <b>Kelas</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cuaca</th>
                                <th>Probabilitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hujan</td>
                                <td> <?php echo round($naive->Probabilitas("Hujan"),4); ?> </td>
                            </tr>
                            <tr>
                                <td>Berawan</td>
                                <td> <?php echo round($naive->Probabilitas("Berawan"),4); ?> </td>
                            </tr>
                            <tr>
                                <td>Cerah</td>
                                <td> <?php echo round($naive->Probabilitas("Cerah"),4); ?> </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Probabilitas Setiap Kelas -->

    <!-- Perhitungan Densitas Gauss -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hasil Perhitungan <b>Densitas Gaus</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <!-- Data kategori Temperatur -->
                    <b>Data Kategori Temperatur</b>
                    <table>
                        <tbody>
                            <tr>
                                <td> (Status = Hujan) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("temperatur", "Hujan", $temperatur); ?> </td>
                            </tr>
                            <tr>
                                <td> (Status = Berawan) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("temperatur", "Berawan", $temperatur); ?> </td>
                            </tr>
                            <tr>
                                <td> (Status = Cerah) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("temperatur", "Cerah", $temperatur); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Akhir Data kategori Temperatur -->
                    <br>
                    <!-- Data kategori Kelembapan -->
                    <b>Data Kategori Kelembapan</b>
                    <table>
                        <tbody>
                            <tr>
                                <td> (Status = Hujan) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("kelembapan", "Hujan", $kelembapan); ?> </td>
                            </tr>
                            <tr>
                                <td> (Status = Berawan) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("kelembapan", "Berawan", $kelembapan); ?> </td>
                            </tr>
                            <tr>
                                <td> (Status = Cerah) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("kelembapan", "Cerah", $kelembapan); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Akhir Data kategori Kelembapan -->
                    <br>
                    <!-- Data kategori Kecepatan Angin -->
                    <b>Data Kategori Kecepatan Angin</b>
                    <table>
                        <tbody>
                            <tr>
                                <td> (Status = Hujan) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("kecepatan_angin", "Hujan", $kecepatan_angin); ?> </td>
                            </tr>
                            <tr>
                                <td> (Status = Berawan) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("kecepatan_angin", "Berawan", $kecepatan_angin); ?> </td>
                            </tr>
                            <tr>
                                <td> (Status = Cerah) </td>
                                <td> &emsp;=&emsp; </td>
                                <td nowrap> <?php echo $naive->densitasGauss("kecepatan_angin", "Cerah", $kecepatan_angin); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Akhir Data kategori Kecepatan Angin -->
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Perhitungan Densitas Gaus -->

    <!-- Likelihood Setiap Kelas -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Likelihood Setiap <b>Kelas</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cuaca</th>
                                <th>Likelihood</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hujan</td>
                                <td> <?php echo $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Hujan", $temperatur, $kelembapan, $kecepatan_angin); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Berawan</td>
                                <td> <?php echo $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Berawan", $temperatur, $kelembapan, $kecepatan_angin); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Cerah</td>
                                <td> <?php echo $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Cerah", $temperatur, $kelembapan, $kecepatan_angin); ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Likelihood Setiap Kelas -->

    <!-- Normalisasi Setiap Kelas -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Normalisasi Setiap <b>Kelas</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <?php
                    $hujan = $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Hujan", $temperatur, $kelembapan, $kecepatan_angin);
                    $berawan = $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Berawan", $temperatur, $kelembapan, $kecepatan_angin);
                    $cerah = $naive->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Cerah", $temperatur, $kelembapan, $kecepatan_angin);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cuaca</th>
                                    <th>Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hujan</td>
                                    <td> <?php echo $naive->normalisasi($hujan, $berawan, $cerah, "Hujan") ."%"; ?> </td>
                                </tr>
                                <tr>
                                    <td>Berawan</td>
                                    <td> <?php echo $naive->normalisasi($hujan, $berawan, $cerah, "Berawan") ."%" ; ?> </td>
                                </tr>
                                <tr>
                                    <td>Cerah</td>
                                    <td> <?php echo $naive->normalisasi($hujan, $berawan, $cerah, "Cerah") ."%"; ?> </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Normalisasi Setiap Kelas -->

    <!-- Hasil -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hasil <b>Prediksi Cuaca</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    <?php
                    $normal_hujan = $naive->normalisasi($hujan, $berawan, $cerah, "Hujan");
                    $normal_berawan = $naive->normalisasi($hujan, $berawan, $cerah, "Berawan");
                    $normal_cerah = $naive->normalisasi($hujan, $berawan, $cerah, "Cerah");

                    echo "Hasil prediksi cuaca : <b>".$naive->hasil($normal_hujan, $normal_berawan, $normal_cerah)."</b>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Hasil -->

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

<?php include_once './backend/tambah_datauji.php'; ?>

<script>
$(document).ready(function(){
    $("#tabel_datajam").dataTable();

    $("#bodydataset").hide();
})
</script>