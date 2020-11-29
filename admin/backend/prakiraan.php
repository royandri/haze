<!-- Created by : Roy Andri  Rabu, 08-05-2019-->

<?php   
date_default_timezone_set('Asia/Jakarta');

include_once 'Fungsi.php';
include_once 'Siang.php';
include_once 'Malam.php';
include_once 'Besok.php';
include_once '../../config/db_config.php';
$predict = new Fungsi($con);
$siang = new Siang($con);
$malam = new Malam($con);
$besok = new Besok($con);

if(isset($_GET['t'])) {
    $status = $_GET['t'];
    if($status == "5222") {
        $temperatur = $_GET['temp'];
        $kelembapan = $_GET['hum'];
        $kecepatan_angin = $_GET['wind'];
        $tanggal = date('Y-m-d');
        $jam = date('H:i:s');
        $hour = date('H');
    
        $query = "INSERT into tbl_dataperjam (waktu_jam, waktu_tanggal, temperatur, kelembapan, kecepatan_angin) VALUES ('$jam', '$tanggal', $temperatur, $kelembapan, $kecepatan_angin)";
        $simpan = mysqli_query($koneksi, $query);
    
        if ($simpan) {
            $hujan = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Hujan", $temperatur, $kelembapan, $kecepatan_angin);
            $berawan = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Berawan", $temperatur, $kelembapan, $kecepatan_angin);
            $cerah = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Cerah", $temperatur, $kelembapan, $kecepatan_angin);
    
            $normal_hujan = $predict->normalisasi($hujan, $berawan, $cerah, "Hujan");
            $normal_berawan = $predict->normalisasi($hujan, $berawan, $cerah, "Berawan");
            $normal_cerah = $predict->normalisasi($hujan, $berawan, $cerah, "Cerah");
    
            $hasil = $predict->hasil($normal_hujan, $normal_berawan, $normal_cerah);
            $query2 = "INSERT INTO tbl_prediksi (waktu_tanggal, waktu_jam, temperatur, kelembapan, kecepatan_angin, prediksi_cuaca) VALUES ('$tanggal', '$jam', $temperatur, $kelembapan, $kecepatan_angin, '$hasil');";
            $prediksi = mysqli_query($koneksi, $query2);
    
            $query_tot = "SELECT COUNT(id_dataperjam) as jumlah FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '24:00:00' AND DATE(waktu_tanggal) = CURDATE() ORDER BY id_dataperjam LIMIT 1";
            $jlh = mysqli_query($koneksi, $query_tot);
            $jumlah = mysqli_fetch_assoc($jlh);
    
            
            if($jumlah['jumlah'] > 4 ) {
                // prediksi siang
                if($hour >3 && $hour < 12) {
                    $temp_siang = round($siang->average('temperatur', 4, 4));
                    $hum_siang = round($siang->average('kelembapan', 4, 4));
                    $wind_siang = round($siang->average('kecepatan_angin', 4, 4));
        
                    $hujan_siang = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Hujan", $temp_siang, $hum_siang, $wind_siang);
                    $brawan_siang = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Berawan", $temp_siang, $hum_siang, $wind_siang);
                    $cerah_siang = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Cerah", $temp_siang, $hum_siang, $wind_siang);
            
                    $normal_hujan_siang = $predict->normalisasi($hujan_siang, $brawan_siang, $cerah_siang, "Hujan");
                    $normal_berawan_siang = $predict->normalisasi($hujan_siang, $brawan_siang, $cerah_siang, "Berawan");
                    $normal_cerah_siang = $predict->normalisasi($hujan_siang, $brawan_siang, $cerah_siang, "Cerah");
            
                    $hasil_siang = $predict->hasil($normal_hujan_siang, $normal_berawan_siang, $normal_cerah_siang);
                    $query_siang = "INSERT INTO tbl_prediksi_siang (waktu_tanggal, waktu_jam, temperatur, kelembapan, kecepatan_angin, prediksi_cuaca) VALUES ('$tanggal', '$jam', $temp_siang, $hum_siang, $wind_siang, '$hasil_siang');";
                    $prediksi_siang = mysqli_query($koneksi, $query_siang);
                }
                // akhir prediksi siang
    
                // prediksi malam
                if($hour >3 && $hour < 19) {
                    $temp_malam = round($malam->average('temperatur', 11, 4));
                    $hum_malam = round($malam->average('kelembapan', 11, 4));
                    $wind_malam = round($malam->average('kecepatan_angin', 11, 4));
        
                    $hujan_malam = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Hujan", $temp_malam, $hum_malam, $wind_malam);
                    $berawan_malam = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Berawan", $temp_malam, $hum_malam, $wind_malam);
                    $cerah_malam = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Cerah", $temp_malam, $hum_malam, $wind_malam);
            
                    $normal_hujan_malam = $predict->normalisasi($hujan_malam, $berawan_malam, $cerah_malam, "Hujan");
                    $normal_berawan_malam = $predict->normalisasi($hujan_malam, $berawan_malam, $cerah_malam, "Berawan");
                    $normal_cerah_malam = $predict->normalisasi($hujan_malam, $berawan_malam, $cerah_malam, "Cerah");
            
                    $hasil_malam = $predict->hasil($normal_hujan_malam, $normal_berawan_malam, $normal_cerah_malam);
                    $query_malam = "INSERT INTO tbl_prediksi_malam (waktu_tanggal, waktu_jam, temperatur, kelembapan, kecepatan_angin, prediksi_cuaca) VALUES ('$tanggal', '$jam', $temp_malam, $hum_malam, $wind_malam, '$hasil_malam');";
                    $prediksi_malam = mysqli_query($koneksi, $query_malam);
                }
                // akhir prediks malam
    
                // prediks besok
                $temp_besok = round($malam->average('temperatur', 17, 4));
                $hum_besok = round($malam->average('kelembapan', 17, 4));
                $wind_besok = round($malam->average('kecepatan_angin', 17, 4));
        
                $hujan_besok = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Hujan", $temp_besok, $hum_besok, $wind_besok);
                $berawan_besok = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Berawan", $temp_besok, $hum_besok, $wind_besok);
                $cerah_besok = $predict->likelihood("temperatur", "kelembapan", "kecepatan_angin", "Cerah", $temp_besok, $hum_besok, $wind_besok);
        
                $normal_hujan_besok = $predict->normalisasi($hujan_besok, $berawan_besok, $cerah_besok, "Hujan");
                $normal_berawan_besok = $predict->normalisasi($hujan_besok, $berawan_besok, $cerah_besok, "Berawan");
                $normal_cerah_besok = $predict->normalisasi($hujan_besok, $berawan_besok, $cerah_besok, "Cerah");
        
                $hasil_besok = $predict->hasil($normal_hujan_besok, $normal_berawan_besok, $normal_cerah_besok);
                $query_besok = "INSERT INTO tbl_prediksi_besok (waktu_tanggal, waktu_jam, temperatur, kelembapan, kecepatan_angin, prediksi_cuaca) VALUES ('$tanggal', '$jam', $temp_besok, $hum_besok, $wind_besok, '$hasil_besok');";
                $prediksi_besok = mysqli_query($koneksi, $query_besok);
                // akhir prediksi besok
            }
            echo "Success";
        } else {
            echo "Gagal";
        }
    } else {
        echo "404 Not Found";
    }
} else {
    echo "404 Not Found";
}
?>