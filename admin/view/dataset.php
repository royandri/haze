<!-- Created by : Roy Andri  Senin, 08-04-2019-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row turun">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dataset</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dataset</h1>
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
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah"
                            data-whatever="@mdo"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
                <div class="panel-body">

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
                                    <th>Cuaca</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dataset">
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
                                    <td>
                                        <button type="button"
                                            onclick="modalEdit('<?php echo $a->id_dataset;  ?>','<?php echo $a->temperatur;  ?>','<?php echo $a->kelembapan;  ?>','<?php echo $a->kecepatan_angin;  ?>','<?php echo $a->prediksi_cuaca;  ?>');"
                                            class="btn btn-warning" data-toggle="popover" title="Ubah Dataset"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" onclick="hapus('<?php echo $a->id_dataset;  ?>');" class="btn btn-danger" data-toggle="popover" title="Hapus Dataset"><i
                                                class="fa fa-trash"></i></button>
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

<!-- modal tambah -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dataset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="temperatur" class="col-form-label">Temperatur (°C)</label>
                        <input type="number" required class="form-control" id="temperatur" name="temperatur">
                    </div>
                    <div class="form-group">
                        <label for="kelembapan" class="col-form-label">Kelembapan (%):</label>
                        <input type="number" required class="form-control" id="kelembapan" name="kelembapan">
                    </div>
                    <div class="form-group">
                        <label for="angin" class="col-form-label">Kecepatan Angin (km/h)</label>
                        <input type="number" required class="form-control" id="angin" name="angin">
                    </div>
                    <div class="form-group">
                        <label for="angin" class="col-form-label">Hasil Cuaca</label>
                        <select class="form-control" required name="prediksi" id="prediksi">
                            <option value="">Cuaca</option>
                            <option value="Hujan">Hujan</option>
                            <option value="Berawan">Berawan</option>
                            <option value="Cerah">Cerah</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- akhir modal tambah -->

<!-- modal edit -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dataset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="edttemperatur" class="col-form-label">Temperatur (°C)</label>
                        <input type="hidden" required class="form-control" id="edtid" name="edtid">
                        <input type="number" required class="form-control" id="edttemperatur" name="edttemperatur">
                    </div>
                    <div class="form-group">
                        <label for="edtkelembapan" class="col-form-label">Kelembapan (%):</label>
                        <input type="number" required class="form-control" id="edtkelembapan" name="edtkelembapan">
                    </div>
                    <div class="form-group">
                        <label for="edtangin" class="col-form-label">Kecepatan Angin (km/h)</label>
                        <input type="number" required class="form-control" id="edtangin" name="edtangin">
                    </div>
                    <div class="form-group">
                        <label for="edtangin" class="col-form-label">Hasil Cuaca</label>
                        <select class="form-control" required name="edtprediksi" id="edtprediksi">
                            <option value="">Cuaca</option>
                            <option value="Hujan">Hujan</option>
                            <option value="Berawan">Berawan</option>
                            <option value="Cerah">Cerah</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- akhir modal edit -->

<?php include_once './backend/tambah_dataset.php'; ?>
<?php include_once './backend/ubah_dataset.php'; ?>

<script>
    $(document).ready(function () {
        $("#tabel_dataset").dataTable();

    })

    function modalEdit(id, temp, humi, wind, pred) {
        $("#edtid").val(id);
        $("#edttemperatur").val(temp);
        $("#edtkelembapan").val(humi);
        $("#edtangin").val(wind);
        $("#edtprediksi").val(pred);
        $("#modaledit").modal('show');
    }

    function hapus(id) {
        swal({
                title: 'Hapus data?',
                text: 'Anda yakin akan menghapus data ini ?',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                type: 'warning',
                showCancelButton: true,
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: './backend/hapus_dataset.php?',
                    type: 'GET',
                    data: 'id=' + id,
                    success: function (data) {
                        let $response = $(data);
                        let status = $response.filter("#status").text();
                        if (status == "sukses") {
                            swal({
                                    title: "Sukses",
                                    text: "Data berhasil dihapus",
                                    type: "success",
                                    confirmWarningText: "Oke"
                                },
                                function () {
                                    location.reload();
                                });
                        } else {
                            swal("Gagal", "Data gagal dihapus", "error");
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Gagal", "Data ggagal dihapus", "error");
                    }
                });
            });
    }
</script>