<?php
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
                    <p><b>6.</b> jika keluar dari keanggotaan, maka tidak dapat kembali menjadi anggota koperasi KAS</p>
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Form Pendaftaran</h3>
                    <div class="tile-body">
                        <form action="../../../app/controller/Daftar.php" method="post">
                            <!--  -->
                            <div class="form-group">
                                <label class="control-label">NAMA *</label>
                                <input class="form-control" type="text" name="nama" placeholder="Enter full name">
                            </div>

                            <div class="form-group">
                            <label for="status">STATUS *</label><br>
                            <select class="form-control" name="status" type="text" id="role" onchange="showInput()" required>
                                <option value="">- Pilih Status -</option>
                                <option value="KARYAWAN">KARYAWAN</option>
                                <option value="CABANG">CABANG</option>
                                <option value="AGEN">AGEN</option>
                            </select>
                            <div class="form-group" id="status_input" style="display: none;"><br>
                                <label class="control-label">STATUS KARYAWAN</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="syarat" value="KARYAWAN TETAP">Karyawan Tetap
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="syarat" value="OUTSOURCING">Outsourcing
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" id="nik_input" style="display: none;">
                                <label for="nik" class="control-label">NIK</label>
                                <input class="form-control" type="text" name="nik" id="nik" placeholder="Input NIK">
                            </div>

                            <div class="form-group"><br>
                                <label class="control-label">Alamat *</label>
                                <input class="form-control" type="alamat" name="alamat" placeholder="Enter full address">
                            </div>
                            <div class="form-group">
                                <label class="control-label">NIK Khusus Kayawan Kantor Cabang Utama Medan/Silangit atau Karyawan Cabang Milik JNE (tetap/Pkwt/Outsourching JNE)</label>
                                <input class="form-control" type="text" name="nik" placeholder="Enter your NIK">
                            </div>

                            <div class="form-group">
                                <label class="control-label">UNIT / Nama Cabang / Nama Agen *</label>
                                <input class="form-control" type="text" name="unit" placeholder="Enter your Unit">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No. telepon / HP *</label>
                                <input class="form-control" type="text" name="hp" placeholder="Enter your Unit">
                            </div>
                            <input type="hidden" name="status_daftar" value="belum diterima">
                            <input type="hidden" name="tgl" value="<?= $date ?>">
                            <div class="tile-footer">
                                <button class="btn btn-primary" name="add" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Daftar</button>
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
            var nikInput = document.getElementById("nik_input");
            var statusInput = document.getElementById("status_input");

            if (role === "KARYAWAN") {
                nikInput.style.display = "block";
                statusInput.style.display = "block";
            } else {
                nikInput.style.display = "none";
                statusInput.style.display = "none";
            }
        }
    </script>

    <!-- <?php
    // Logika PHP untuk menghasilkan NIK otomatis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['role'] == 'karyawan') {
            // Generate NIK otomatis, misalnya dengan angka acak
            $nik = mt_rand(100000, 999999);
            echo "<p>NIK: $nik</p>";
        }
    }
    ?> -->

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