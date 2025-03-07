<?php
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <link rel="shortcut icon" href="../../../app/assets/img/LOGO1.png">
    <title>Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">KAS</a>
    </header>
    <!-- Sidebar menu-->

    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="form-group d-flex">
                        <img class="mr-1 mb-2" src="../../../app/assets/img/LOGO1.png" alt="profile" style="width: 50px; height: 50px;">
                        <h3 class="tile-title mr-4 mt-2"> SYARAT REGISTER </h3>
                    </div>
                    <p><b>Syarat dan Ketentuan untuk Join di koperasi KAS JNE :</b> </p>
                    <p><b>1.</b> Kantor Cabang Utama Medan/Silangit (Karyawan Tetap/PKWT JNE/Outsourching), Kepala Cabang Mitra, Karyawan Tetap Cabang, Pimpinan Agen Kota Medan </p>
                    <p><b>2.</b> Bersedia membayar simpanan pokok dan wajib di Koperasi</p>
                    <p><b>3.</b> Bersedia Membayar Simpanan Pokok sebesar Rp. 100.000 dibulan pertama keangggotaan </p>
                    <p><b>4.</b> Bersedia Membayar Simpanan Wajib sebesar Rp. 100.000 setiap bulannya ( Jika
                        karyawan akan dipotong langsung melalui payroll gaji setiap tanggal 25, Jika
                        Karyawan Outsourcing,pimpinan cabang dan agen dapat melakukan pembayaran
                        melalui Transfer )
                    </p>
                    <p><b>5.</b> Uang simpanan Pokok diawal (Sebesar Rp. 100.000) tidak dikembalikan jika keluar dari keanggotaan</p>
                    <p><b>6.</b> Jika keluar dari keanggotaan, maka tidak dapat kembali menjadi anggota koperasi KAS</p>

                </div>
            </div>
        </div>

        <script>
            // Fungsi untuk memeriksa apakah checkbox dicentang
            function validateForm() {
                var checkBox = document.getElementById("syarat");
                var button = document.getElementById("submitBtn");
                if (checkBox.checked == true) {
                    button.disabled = false;
                } else {
                    button.disabled = true;
                }
            }
        </script>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Form Pendaftaran</h3>
                    <div class="tile-body">
                        <form action="../../../app/controller/Daftar.php" method="post" onsubmit="return validateForm()">
                            <!-- -->
                            <input type="hidden" name="tgl_daftar" value="<?= $date ?>">
                            <div class="form-group">
                                <label class="control-label"><Strong>Nama <strong class="text-danger">*</strong></Strong></label>
                                <input class="form-control" type="text" name="nama" placeholder="Input Fullname" required oninput="convertToUppercase(this)">
                            </div>
                            <div class="form-group">
                                <label for="nik" class="control-label"><strong>Nik <strong class="text-danger">*</strong></strong></label>
                                <input class="form-control" type="text" name="nik" id="nik" placeholder="Input NIK" required oninput="convertToUppercase(this)">
                            </div>
                            <div class="form-group">
                                <label for="status"><strong>Status <strong class="text-danger">*</strong></strong></label><br>
                                <select class="form-control" name="status" type="text" id="role" onchange="showInput()" required>
                                    <option value="">- Select Status -</option>
                                    <option value="KARYAWAN">KARYAWAN</option>
                                    <option value="CABANG">CABANG</option>
                                    <option value="AGEN">AGEN</option>
                                </select>

                                <div class="form-group" id="cabang_input" style="display: none;"><br>
                                    <label class="control-label"><strong>Cabang <strong class="text-danger">*</strong></strong></label>
                                    <select class="form-control" name="status_karyawan" type="text" id="cabang" required>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_cabang") or die(mysqli_error($koneksi));
                                        $result = array();
                                        while ($data = mysqli_fetch_array($sql)) {
                                            $result[] = $data;
                                        }
                                        foreach ($result as $data) {
                                        ?>
                                            <option value="<?= $data['nama_cabang'] ?>"><?= $no++; ?>. <?= $data['nama_cabang'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group" id="status_input" style="display: none;"><br>
                                    <label class="control-label"><strong>Status Karyawan <strong class="text-danger">*</strong></strong></label>
                                    <select class="form-control" name="status_karyawan" type="text" id="status" onchange="showInput()" required>
                                        <option value="-">- Select Status -</option>
                                        <option value="KARYAWAN TETAP">KARYAWAN TETAP</option>
                                        <option value="KARYAWAN PKWT">PKWT</option>
                                        <option value="OUTSOURCING">OUTSOURCING</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2" id="unit_input">
                                    <label class="control-label"><strong>Unit <strong class="text-danger">*</strong></strong></label>
                                    <input class="form-control" type="text" name="unit" id="unit" placeholder="Input Unit" required oninput="convertToUppercase(this)">
                                </div>

                                <div class="form-group mt-2" id="agen_input" style="display: none;">
                                    <label class="control-label"><strong>Nama Agen <strong class="text-danger">*</strong></strong></label>
                                    <input class="form-control" type="text" name="unit" id="agen" placeholder="Input Unit" required oninput="convertToUppercase(this)">
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><strong>Alamat <strong class="text-danger">*</strong></strong></label>
                                    <input class="form-control" type="text" name="alamat" placeholder="Enter full address" required oninput="convertToUppercase(this)">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>No. Handphone <strong class="text-danger">*</strong></strong></label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter your Phone" required onkeypress="return inputAngka(event)">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong><em>Syarat dan Ketentuan</em></strong></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="syarat" id="syarat" value="SETUJU" onchange="validateForm()"><em>Saya sudah membaca syarat dan
                                                sudah memahami ketentuan yang sudah dijabarkan diatas.</em>
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="generate" value="waiting">
                                <div class="tile-footer">
                                    <button class="btn btn-primary" id="submitBtn" name="add" type="submit" disabled><i class="fa fa-fw fa-lg fa-check-circle"></i>Daftar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script>
        function showInput() {
            var role = document.getElementById("role").value;
            var statusInput = document.getElementById("status_input");
            var statusField = document.getElementById("status"); // Input status
            var cabangInput = document.getElementById("cabang_input");
            var cabangField = document.getElementById("cabang"); // Input cabang
            var agenInput = document.getElementById("agen_input");
            var agenField = document.getElementById("agen"); // Input agen
            var unitInput = document.getElementById("unit_input");
            var unitField = document.getElementById("unit"); // Input unit

            if (role === "KARYAWAN") {
                statusInput.style.display = "block";
                statusField.disabled = false; // Aktifkan input status
                unitInput.style.display = "block";
                unitField.disabled = false; // Aktifkan input status
                cabangInput.style.display = "none";
                cabangField.disabled = true; // Nonaktifkan input cabang agar tidak terkirim
                agenInput.style.display = "none";
                agenField.disabled = true; // Nonaktifkan input cabang agar tidak terkirim
            } else if (role === "CABANG") {
                cabangInput.style.display = "block";
                cabangField.disabled = false; // Aktifkan input cabang
                unitInput.style.display = "block";
                unitField.disabled = false; // Aktifkan input status
                statusInput.style.display = "none";
                statusField.disabled = true; // Nonaktifkan input status agar tidak terkirim
                agenInput.style.display = "none";
                agenField.disabled = true; // Nonaktifkan input cabang agar tidak terkirim
            } else if (role === "AGEN") {
                cabangInput.style.display = "none";
                cabangField.disabled = true; // Aktifkan input cabang
                statusInput.style.display = "none";
                statusField.disabled = false; // Nonaktifkan input status agar tidak terkirim
                agenInput.style.display = "block";
                agenField.disabled = false; // Nonaktifkan input cabang agar tidak terkirim
                unitInput.style.display = "none";
                unitField.disabled = true; // Aktifkan input status
            } else {
                cabangInput.style.display = "none";
                cabangField.disabled = true;
                statusInput.style.display = "none";
                statusField.disabled = true;
                agenInput.style.display = "none";
                agenField.disabled = true;
                unitInput.style.display = "none";
                unitField.disabled = true;
            }
        }
    </script>

    <script>
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <script>
        function convertToUppercase(input) {
            input.value = input.value.toUpperCase();
        }
    </script>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
</body>

</html>