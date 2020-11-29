<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row turun">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Ubah Password</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ganti Password</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- Judul -->
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Password Lama</b>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" required oninput="cekPassword('<?php echo $id_user; ?>')"
                                            class="form-control type=" password" name="passwordlama" id="passdwordlama">
                                    </div>
                                    <div class="col-md-4">
                                        <div id="pwdsalah" style="display: none; margin-top:13px;"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Passworrd Baru</b>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" required type="password" name="passwordbaru"
                                            id="passwordbaru">
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Konfirmasi Passworrd Baru</b>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" required oninput="cekConfirm();" type="password"
                                            name="passwordbaru2" id="passwordbaru2">
                                    </div>
                                    <div class="col-md-4">
                                        <div id="pwdconfirm" style="display: none; margin-top:13px;"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-4">
                                        <button id="simpan" type="submit" name="simpan" disabled="false"
                                            class="btn btn-primary">Simpan</button>
                                        <a class="btn btn-danger" href="?p=dashboard">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
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

<?php include_once './backend/ubah_password.php'; ?>

<script>
    var stat = false;

    function cekPassword(id) {
        let password = document.getElementById("passdwordlama").value;
        $.ajax({
            url: './backend/cek_password.php',
            type: 'GET',
            data: 'id=' + id + "&password=" + password,
            success: function (data) {
                let $response = $(data);
                let status = $response.filter("#status").text();

                if (status != "sukses") {
                    document.getElementById("pwdsalah").style.color = "red";
                    document.getElementById("pwdsalah").innerHTML = "Password lama salah !";
                    $("#pwdsalah").show();
                    stat = false;
                } else {
                    $("#pwdsalah").hide();
                    stat = true;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal('Gagal', 'Terjadi kegagalan sistem !', 'error')
            }
        })
    }

    function cekConfirm() {
        let password1 = $("#passwordbaru").val();
        let password2 = $("#passwordbaru2").val();

        if (password1 != password2) {
            document.getElementById("pwdconfirm").style.color = "red";
            document.getElementById("pwdconfirm").innerHTML = "Password konfirmasi salah !";
            $("#pwdconfirm").show();
            stat = false;
        } else {
            $("#pwdconfirm").hide();
            stat = true;
        }

        if (stat) {
            document.getElementById("simpan").disabled = false;
        } else {
            document.getElementById("simpan").disabled = true;
        }

    }
</script>