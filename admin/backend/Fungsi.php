<!-- Created by : Roy Andri  Senin, 08-04-2019-->
<?php 
class Fungsi{

	public $koneksi;

	function __construct($con){
		$this->koneksi = $con;
	}

    /* 
     * Mencari nilai rata-rata dari setiap atribut dan prediksi cuacanya
     * 
     * @param parameter Atribut $atribut dan Cuaca $cuaca bertipe String
     * @return mengembalikan nilai hasil perhitungan rata-rata
    */
    function mean($atribut, $cuaca){
        $data = $this->koneksi->query("SELECT $atribut FROM tbl_dataset WHERE prediksi_cuaca = '$cuaca'");
        $jml = $this->koneksi->query("SELECT count($atribut) AS jumlah from tbl_dataset WHERE prediksi_cuaca = '$cuaca'");
        $hasil = 0;
        $mean = 0;

        while ($temp =  $data->fetch_assoc()){
            $hasil += $temp[$atribut];
        }
        $temp_jlh =  $jml->fetch_assoc();
        $jumlah = $temp_jlh['jumlah'];
        $mean = $hasil/$jumlah;

        return $mean;
    }

    /* 
     * Mencari nilai Standar Deviasi dari setiap atribut dan prediksi cuacanya
     * 
     * @param parameter Atribut $atribut dan Cuaca $cuaca bertipe String
     * @return mengembalikan nilai hasil perhitungan Standar Deviasi
    */
    function standarDeviasi($atribut, $cuaca){
        $data = $this->koneksi->query("SELECT $atribut FROM tbl_dataset WHERE prediksi_cuaca = '$cuaca'");
        $jml = $this->koneksi->query("SELECT count($atribut) AS jumlah from tbl_dataset WHERE prediksi_cuaca = '$cuaca'");
        $hasil = 0;
        $mean = 0;
        $std = 0;
        $mean = $this->mean($atribut, $cuaca);

        while ($temp =  $data->fetch_assoc()){
            $hasil += pow(($temp[$atribut]-$mean),2);
        }

        $temp_jlh =  $jml->fetch_assoc();
        $jumlah = $temp_jlh['jumlah'];

        $temp_std = $hasil / ($jumlah-1);
        $std = sqrt($temp_std);

        return $std;
    }

    /* 
     * Mencari nilai Probabilitas dari setiap kelas
     * 
     * @param parameter Cuaca $cuaca bertipe String
     * @return mengembalikan nilai hasil perhitungan Probabilitas
    */
    function probabilitas($cuaca){
        $data = $this->koneksi->query("SELECT COUNT(prediksi_cuaca) AS probe FROM tbl_dataset WHERE prediksi_cuaca = '$cuaca'");
        $jml = $this->koneksi->query("SELECT COUNT(prediksi_cuaca) AS jumlah FROM tbl_dataset");
        $hasil = 0;
        $probabilitas = 0;

        $temp =  $data->fetch_assoc();
        $hasil = $temp['probe'];
        $temp_jlh =  $jml->fetch_assoc();
        $jumlah = $temp_jlh['jumlah'];

        $probabilitas = $hasil/$jumlah;

        return $probabilitas;
    }

    /* 
     * Mencari nilai Densitas Gauss dari setiap kategori dan cuaca
     * 
     * @param parameter Atribut $atribut, Cuaca $cuaca bertipe String
     * @param parameter Nilai $nilai bertipe Integer
     * @return mengembalikan nilai hasil perhitungan Densitas Gauss
    */
    function densitasGauss($atribut, $cuaca, $nilai){
        $mean = $this->mean($atribut, $cuaca);
        $std = $this->standarDeviasi($atribut, $cuaca);
        $hasil = 0;

        $temp1 = 1/ ((sqrt(2*3.14))*$std);
        $temp2 = (pow(($nilai-$mean),2))/(2*(pow($std,2)));
        $temp3 = pow(2.718282, -($temp2));

        $hasil = $temp1*$temp3;

        return $hasil;
    }

    /* 
     * Mencari nilai Likelihood dari setiap Kelas Cuaca
     * 
     * @param parameter Atribut $atribut 1-3, Cuaca $cuaca bertipe String
     * @param parameter Nilai $nilai 1-3 bertipe Integer
     * @return mengembalikan nilai hasil perhitungan Likelihood
    */
    function likelihood($atribut1, $atribut2, $atribut3, $cuaca, $nilai1, $nilai2, $nilai3){
        $temp1 = $this->densitasGauss($atribut1, $cuaca, $nilai1);
        $temp2 = $this->densitasGauss($atribut2, $cuaca, $nilai2);
        $temp3 = $this->densitasGauss($atribut3, $cuaca, $nilai3);
        $probe = $this->probabilitas($cuaca);
        $hasil = 0;

        $hasil = $probe * $temp1 * $temp2 * $temp3;
        
        return $hasil;
    }

    /* 
     * Mencari nilai Normaliasi dari setiap Kelas Cuaca
     * 
     * @param parameter Atribut $hujan, $berawan, $cerah hasil likelihood bertipe Real
     * @param parameter Cari $cari bertipe String
     * @return mengembalikan nilai hasil perhitungan Normalisasi
    */
    function normalisasi($hujan, $berawan, $cerah, $cari){
        $hasil = 0;
        if($cari == "Hujan") {
            $hasil = $hujan / ($hujan + $berawan + $cerah);
        } else if($cari == "Berawan") {
            $hasil = $berawan / ($hujan + $berawan + $cerah);
        } else if($cari == "Cerah") {
            $hasil = $cerah / ($hujan + $berawan + $cerah);
        }

        $hasil = $hasil * 100;

        return $hasil;
    }

    /* 
     * Mencari nilai akhir / hasil perhitungan Naive Bayes
     * 
     * @param parameter Atribut $hujan, $berawan, $cerah hasil normalisasi bertipe Real
     * @return mengembalikan nilai hasil perhitungan Naive Bayes
    */
    function hasil($hujan, $berawan, $cerah){
        $hasil;
        if($hujan > $berawan && $hujan > $cerah) {
            $hasil = "Hujan";
        } else if($berawan > $hujan && $berawan > $cerah){
            $hasil = "Berawan";
        } else if($cerah > $hujan && $cerah > $berawan){
            $hasil = "Cerah";
        }

        return $hasil;
    }
}
 ?>