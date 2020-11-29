<!-- Created by : Roy Andri  Minggu, 21-04-2019-->
<?php 
class Malam{

	public $koneksi;

	function __construct($con){
		$this->koneksi = $con;
	}

    /* 
     * Mencari nilai rata-rata dari dari setiap atribut
     * 
     * @param parameter Atribut $atribut bertipe String, Awal $awal dan Akhir $akhir bertipe Integer
     * @return mengembalikan nilai hasil perhitungan rata-rata
    */
    function average($atribut, $awal, $akhir){
        $data = $this->koneksi->query("SELECT waktu_jam, $atribut FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '18:00:00' AND DATE(waktu_tanggal) = CURDATE() LIMIT $awal, $akhir");
        $hasil = 0;
        $avg = 0;
        $jumlah = 0;

        while ($temp =  $data->fetch_assoc()){
            $hasil += $temp[$atribut];
            $jumlah++;
        }

        /* v3
        *  Rumus moving average data yang kosong ditambah data MA sebelumnya
        */
        if($jumlah < $akhir) {
            
            if($jumlah == 3) {
                $tempawal = $awal-1;
                $data4 = $this->average($atribut, $tempawal, $akhir);

                $avg = ($hasil + $data4) / $akhir;
                return $avg;

            } else if($jumlah == 2) {
                $tempawal = $awal-1;
                $tempawal2 = $awal-2;
                $data4 = $this->average($atribut, $tempawal, $akhir);
                $data3 = $this->average($atribut, $tempawal2, $akhir);

                $avg = ($hasil + $data4 + $data3) / $akhir;
                return $avg;
            } else if($jumlah == 1) {
                $tempawal = $awal-1;
                $tempawal2 = $awal-2;
                $tempawal3 = $awal-3;
                $data4 = $this->average($atribut, $tempawal, $akhir);
                $data3 = $this->average($atribut, $tempawal2, $akhir);
                $data2 = $this->average($atribut, $tempawal3, $akhir);

                $avg = ($hasil + $data4 + $data3 + $data2) / $akhir;
                return $avg;
            } else if($jumlah == 0) {
                $tempawal = $awal-1;
                $tempawal2 = $awal-2;
                $tempawal3 = $awal-3;
                $tempawal4 = $awal-4;
                $data4 = $this->average($atribut, $tempawal, $akhir);
                $data3 = $this->average($atribut, $tempawal2, $akhir);
                $data2 = $this->average($atribut, $tempawal3, $akhir);
                $data1 = $this->average($atribut, $tempawal4, $akhir);

                $avg = ($hasil + $data4 + $data3 + $data2 + $data1) / $akhir;
                return $avg;
            }
        } else {
            $avg = $hasil / $jumlah;
            return $avg;
        } 

        // if($jumlah < 1) {
        //     $cek = $this->koneksi->query("SELECT count(id_dataperjam) AS jumlah FROM tbl_dataperjam WHERE waktu_jam BETWEEN '04:00:00' AND '18:00:00' AND DATE(waktu_tanggal) = CURDATE()");
        //     $temp_jlh =  $cek->fetch_assoc();
        //     $jumlah = $temp_jlh['jumlah'];

        //     $awl = $jumlah - 4;

        //     $avg = $this->average($atribut, $awl, $akhir);

        //     return $avg;
        // } else {
        //     $avg = $hasil / $jumlah;
        //     return $avg;
        // }
    }
}
 ?>