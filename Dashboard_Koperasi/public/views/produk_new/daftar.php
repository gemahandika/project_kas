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
            <h4><strong> Form Daftar Product KAS</strong></h4>
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
            <div class="tile" style="background-color: rgba(0, 123, 255, 0.3);">
                <div class="tile-body">
                    <h6>Silahkan Pilih Produk dan Isi Data Diri Anda Jika Sudah Klik Tombol Daftar. <br>
                        Noted : Isi yang perlu di isi </h6>
                </div>
            </div>

            <div class="tile">
                <div class="tile-body">
                    <form class="row g-3" action="../../../app/controller/Produk.php" method="post">

                        <div class="col-md-4">
                            <label for="nama_produk" class="form-label">Produk Kas <strong class="text-danger">*</strong></label>
                            <select class="form-control" name="nama_produk" id="role" type="text" onchange="showInput()" required>
                                <option value="">- Silahkan Pilih Produk -</option>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM katagori_produk") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                ?>

                                    <option value="<?= $data['nama_produk'] ?>"> <?= $data['nama_produk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-4" id="Nama">
                            <label for="nama" class="form-label">Nama <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" id="InputNama" name="nama" required>
                        </div>

                        <div class="col-md-4" id="Nik">
                            <label for="nik" class="form-label">Nik Karyawan <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="InputNik" name="nik" required>
                        </div>
                        <div class="col-md-4" id="Nik_Perusahaan">
                            <label for="nik_perusahaan" class="form-label">Nik Perusahaan <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="InputNik_Perusahaan" name="nik_perusahaan">
                        </div>
                        <div class="col-md-6" id="Alamat">
                            <label for="alamat" class="form-label">Alamat <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="InputAlamat" name="alamat" required>
                        </div>
                        <div class="col-md-4" id="Phone">
                            <label for="phone" class="form-label">Phone <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="Input_Phone" name="phone" min="0">
                        </div>
                        <div class="col-md-4" id="Unit">
                            <label for="unit" class="form-label">Posisi / Unit <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="Input_Unit" name="unit">
                        </div>
                        <div class="col-md-4" id="NamaBarang">
                            <label for="nama_barang" class="form-label">Nama Barang <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="InputNama_Barang" name="nama_barang">
                        </div>
                        <div class="col-md-4" id="Jenis">
                            <label for="jenis" class="form-label">Jenis / Type <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="jenis" name="jenis">
                        </div>
                        <div class="col-md-2" id="Warna">
                            <label for="warna" class="form-label">Warna <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="warna" name="warna">
                        </div>
                        <div class="col-md-2" id="Berat">
                            <label for="berat" class="form-label">berat <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="berat" name="berat">
                        </div>
                        <div class="col-md-2" id="Harga">
                            <label for="harga" class="form-label">Perkiraan Harga <strong class="text-danger">*</strong></label>
                            <input type="number" class="form-control mb-3" id="harga" name="harga" value="0" min="0">
                        </div>
                        <div class="col-md-2">
                            <label for="tanggal" class="form-label">Tanggal <strong class="text-danger">*</strong></label>
                            <input type="date" class="form-control mb-3" id="tanggal" name="tanggal" value="<?= $date ?>" required>
                        </div>
                        <div class="col-md-2" id="Lama_Menabung">
                            <label for="lama_menabung" class="form-label">Lama Menabung <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control mb-3" id="lama_menabung" name="lama_menabung" required>
                        </div>

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
                            <button type="submit" name="add_produk" id="submitBtn" class="btn btn-primary" disabled><i class="fa fa-fw fa-lg fa-check-circle"></i>Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <script>
    function showInput() {
        var role = document.getElementById("role").value;
        var Nik_Perusahaan = document.getElementById("Nik_Perusahaan");
        var Phone = document.getElementById("Phone");
        var Berat = document.getElementById("Berat");
        var Lama_Menabung = document.getElementById("Lama_Menabung");
        var Unit = document.getElementById("Unit");
        var NamaBarang = document.getElementById("NamaBarang");
        var Jenis = document.getElementById("Jenis");
        var Warna = document.getElementById("Warna");
        var Harga = document.getElementById("Harga");

        if (role === "MURABAHAH") {
            Nik_Perusahaan.style.display = "none";
            Phone.style.display = "none";
            Berat.style.display = "none";
            Lama_Menabung.style.display = "none";

        } else if (role === "MUDHARABAH") {
            Nik_Perusahaan.style.display = "none";
            Unit.style.display = "none";
            NamaBarang.style.display = "none";
            Berat.style.display = "none";
            Jenis.style.display = "none";
            Warna.style.display = "none";
            Lama_Menabung.style.display = "none";
            Harga.style.display = "none";
        } else if (role === "TABUNGAN EMAS") {
            Unit.style.display = "none";
            NamaBarang.style.display = "none";
            Jenis.style.display = "none";
            Warna.style.display = "none";
            Harga.style.display = "none";
        } else {
            Phone.style.display = "none";

        }
    }
</script> -->

<?php include '../../../footer.php'; ?>