<!-- Created by : Roy Andri  Senin, 08-04-2019-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row turun">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data Per Jam</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Per Jam</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Per Jam
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span> 
                </div>
                <div class="panel-body">
                    
                    <!-- Tabel dataset -->
                    <div class="table-responsive">
                    <?php include_once './backend/tampil_datajam.php'; ?>
                        <table class="table table-bordered" id="tabel_datajam">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jam</th>
                                    <th>Tangal</th>
                                    <th>Temperatur (°C)</th>
                                    <th>Kelembapan (%)</th>
                                    <th>Kecepatan Angin (km/h)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            while($a = mysqli_fetch_object($exe)):
                                ?>
                                <tr>
                                    <td align="center"> <?php echo $no; ?></td>
                                    <td> <?php echo $a->waktu_jam; ?></td>
                                    <td> <?php echo $a->waktu_tanggal; ?></td>
                                    <td align="center"> <?php echo $a->temperatur; ?></td>
                                    <td align="center"> <?php echo $a->kelembapan; ?></td>
                                    <td align="center"> <?php echo $a->kecepatan_angin; ?></td>
                                    <td> 
                                        <!-- <button class="btn btn-warning" data-toggle="popover" title="Ubah Dataset"><i class="fa fa-edit"></i></button> -->
                                        <button class="btn btn-danger" type="button" onclick    ="hapus('<?php echo $a->id_dataperjam ?>');" data-toggle="popover" title="Hapus Dataset"><i class="fa fa-trash"></i></button>
                                    </td>
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

    <!-- Modal edit -->

    <!-- Akhir modal edit -->
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
    $("#tabel_datajam").dataTable();
})

function hapus(id) {
    swal({
        title: 'Hapus data?',
        text: 'Anda yakin akan menghapus data ini?',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        type: 'warning',
        showCancelButton: true,
        closeOnConfirm: false
    },
    function(isConfirm) {
        if(!isConfirm) return;
        $.ajax({
            url: './backend/hapus_datajam.php?',
            type: 'GET',
            data: 'id=' + id,
            success: function(data) {
                let $response = $(data);
                let status = $response.filter("#status").text();
                if(status == "sukses") {
                    swal({
                        title: 'Sukses',
                        text: 'Data berhasil dihapus',
                        type: 'success',
                        cofnfirmButtonText: 'Oke'
                    }, function() {
                        location.reload();
                    });
                } else {
                    swal('Gagal', 'Data gagal dihapus', 'error');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                swal('Gagal', 'Data gagal dihapus', 'error');
            }
        });
    });
}
</script>