<?php
session_name("kas_session");
session_start();
include '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
include '../../../app/config/koneksi.php';

?>
<style>
    @media (max-width: 768px) {
        .tile-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<main class="app-content">
    <div class="app-title">
        <div>
            <h4><strong> Form Daftar Anggota Mudharabah</strong></h4>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="index.php">Back</a></li>
        </ul>
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
            <div class="tile" style="background-color: rgba(0, 100, 0, 0.3);">
                <div class="tile-body">
                    <h6>Silahkan Isi Data Diri Anda Untuk Menjadi Mitra<strong class="text-primary"> Mudharabah,</strong> Jika Sudah Klik Tombol Daftar. </h6>
                </div>
            </div>

            <div class="tile">
                <div class="tile-body">
                    <form class="row g-3" action="../../../app/controller/Mudharabah.php" method="post">
                        <div class="col-md-4">
                            <label for="nama" class="form-label">Nama <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nik" class="form-label">Nik <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="nik" name="nik" required>
                        </div>
                        <div class="col-4">
                            <label for="phone" class="form-label">Handphone <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="phone" name="phone" required onkeypress="return inputAngka(event)">
                        </div>
                        <div class="col-md-6">
                            <label for="alamat" class="form-label">Alamat <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="alamat" name="alamat" required>
                        </div>
                        <div class="col-md-2">
                            <label for="tanggal" class="form-label">Tanggal <strong class="text-danger">*</strong></label>
                            <input type="date" class="form-control mb-3" id="tanggal" name="tanggal" value="<?= $date ?>">
                        </div>
                        <br>
                        <input type="hidden" name="status" value="DAFTAR">
                        <div class="col-12 mb-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="syarat" id="syarat" value="SETUJU" onchange="validateForm()"><em>
                                        Syarat & Ketentuan</em>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="add_mudharabah" id="submitBtn" class="btn btn-primary" disabled><i class="fa fa-fw fa-lg fa-check-circle"></i>Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>