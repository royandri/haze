<?php 
date_default_timezone_set('Asia/Jakarta'); 
$hour = date('H');
$day = date('D');

function hari($str){
    $tr   = trim($str);
    $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
    return $str;
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Haze</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/master.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <!-- <link rel="shortcut icon" href="./assets/images/haze.png"> -->
</head>
<body>
    
    <div class="content">
        
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light navbar-haze kontem" style="background-color: #2B244D;">
            <a class="navbar-brand" href=""  >
                <img src="./assets/images/haze.png" alt="" style="width: 60px; margin-top:-7px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div> -->
        </nav>
        <!-- Akhir Navbar -->

        <?php 
        include_once './backend/tampil_prediksi.php'; 
        $gambar_cuaca = "";
        if($cuaca->prediksi_cuaca == "Hujan") {
            $gambar_cuaca = "hujan";
        } else if($cuaca->prediksi_cuaca == "Berawan") {
            $gambar_cuaca = "berawan";
        } else if($cuaca->prediksi_cuaca == "Cerah") {
            $gambar_cuaca = "cerah";
        }
        ?>

        <!-- Isi -->
        <div class="container">
            <div class="isicuaca">
                <div class="card mb-3 isicard">
                    <div class="isi">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <div class="temp">
                                    <p><?php echo $cuaca->temperatur ?>°</p>
                                </div>
                                <div class="cuaca">
                                    <?php echo strtoupper($cuaca->prediksi_cuaca); ?>
                                </div>
                                
                            </div>
                            <div class="col-md-7 text-center">
                                <div class="kota">
                                    MLATI
                                </div>
                                <div class="gambar-cuaca">
                                    <img class="img-fluid " src=" <?php echo './assets/images/' . $gambar_cuaca . '.png'  ?>" alt="cuaca">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 datacuaca">
                                <h5>Sekarang </h5>                                
                                <div class="info-waktu">
                                    <p><?php echo hari($day) ." ". substr($cuaca->waktu_jam, 0, 5) ?> </p>
                                </div>
                                <hr>
                                    <div class="info-temp">Temperatur</div>
                                    <div><i class="fa fa-temperature-high"></i> <b> <?php echo $cuaca->temperatur ?>°C </b></div>
                                        
                                    <div class="info-humm">
                                        <div>Kelembapan</div>
                                        <div><i class="fa fa-water"></i> <b><?php echo $cuaca->kelembapan ?>%</b></div>
                                    </div>

                                    <div class="info-wind">
                                        <div>Angin</div>
                                        <div><i class="fa fa-wind"></i> <b><?php echo $cuaca->kecepatan_angin ?> km/h </b></div>
                                    </div>
                                <hr class="hr-mobile">
                            </div>
                            <div class="col-md-8 text-center" >
                                <div class="row pre-cuaca" >
                                    <div class="col">
                                        <table align="center">
                                        <?php 

                                            $prediksi_siang = "";
                                            $temperatur_siang = 0;

                                            if($hour > 12 && $hour < 15) {
                                                $prediksi_siang = $cuaca->prediksi_cuaca;
                                                $temperatur_siang = $cuaca->temperatur;

                                            } else {
                                                $prediksi_siang = $cuaca_siang['prediksi_cuaca'];
                                                $temperatur_siang = $cuaca_siang['temperatur'];
                                            }

                                        
                                        ?>
                                            <tr> <td><b>Siang</b></td></tr>
                                            <tr> <td> <img class="img-fluid" src="./assets/images/<?php echo $prediksi_siang; ?>.png" alt=""></td> </tr>
                                            <tr> <td><b><h5><?php echo $temperatur_siang; ?>°</h5></b></td></tr>
                                            <tr> <td><b><?php echo $prediksi_siang; ?></b></td></tr>
                                            
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table align="center">
                                        <?php 
                                            $prediksi_malam = "";
                                            $temperatur_malam = 0;

                                            if($hour > 18) {
                                                $prediksi_malam = $cuaca->prediksi_cuaca;
                                                $temperatur_malam = $cuaca->temperatur;
                                            } else {
                                                $prediksi_malam = $cuaca_malam['prediksi_cuaca'];
                                                $temperatur_malam = $cuaca_malam['temperatur'];
                                            }
                                        
                                        ?>
                                            <tr> <td><b>Malam</b></td></tr>
                                            <tr> <td> <img class="img-fluid" src="./assets/images/<?php echo $prediksi_malam; ?>.png" alt=""></td> </tr>
                                            <tr> <td><b><h5><?php echo $temperatur_malam; ?>°</h5></b></td></tr>
                                            <tr> <td><b><?php echo $prediksi_malam; ?></b></td></tr>   
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table align="center">
                                            <tr> <td><b>Besok</b></td></tr>
                                            <tr> <td> <img class="img-fluid" src="./assets/images/<?php echo $cuaca_besok['prediksi_cuaca']?>.png" alt=""></td> </tr>
                                            <tr> <td><b><h5><?php echo $cuaca_besok['temperatur']; ?>°</h5></b></td></tr>
                                            <tr> <td><b><?php echo $cuaca_besok['prediksi_cuaca']; ?></b></td></tr>   
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Isi -->   
    </div>
    
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/popper.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>