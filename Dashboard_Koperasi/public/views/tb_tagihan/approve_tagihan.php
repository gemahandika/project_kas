<?php
session_name("kas_session");
session_start();
include '../../../header.php';

if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
$date = date('Y-m-d');
$time = date("H:i");
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Silahkan Pilih Data Terlebih Dahulu'); window.location='index.php';</script>";
} else {

?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h6>DATA TAGIHAN</h6>
            </div>
        </div>
        <form action="../../../app/controller/Tagihan" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body d-flex justify-content-start">
                            <label class="control-label">Tanggal :</label>
                            <div class="col-md-4">
                                <input id="mainDate" class="form-control col-md-6" name="date" type="date" value="<?= $date ?>">
                            </div>
                            <p><input type="submit" name="add_tagihan" class="btn btn-danger" value="PROSES"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="clearfix"></div> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Detail Tagihan Wajib</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="small"><strong>NO</strong></th>
                                        <th class="small"><strong>NAMA ANGGOTA</strong></th>
                                        <th class="small"><strong>NIK</strong></th>
                                        <th class="small"><strong>STATUS KARYAWAN</strong></th>
                                        <th class="small"><strong>KETERANGAN</strong></th>
                                        <th class="small"><strong>JUMLAH TAGIHAN</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 100000;
                                    $no = 0;
                                    foreach ($chk as $nik) {
                                        $sql_resi = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE nip = '$nik'") or die(mysqli_error($koneksi));
                                        while ($data = mysqli_fetch_array($sql_resi)) {
                                            $no++; ?>
                                            <tr>

                                                <input type="hidden" name="nama_anggota[]" value="<?= $data['nama_anggota'] ?>">
                                                <input type="hidden" name="nik[]" value="<?= $data['nip']  ?>">
                                                <input type="hidden" name="status_karyawan[]" value="<?= $data['status_karyawan'] ?>">
                                                <input type="hidden" name="nominal[]" value=100000>
                                                <input type="hidden" name="keterangan[]" value="IURAN WAJIB ANGGOTA">
                                                <input type="hidden" name="status[]" value="OTS">
                                                <input type="hidden" class="dateArray" name="date[]" value="<?= $date ?>">
                                                <input type="hidden" name="ket_history[]" value="TAGIHAN ANDA TELAH DIBUAT">

                                                <td class="small"><?= $no ?></td>
                                                <td class="small"><?= $data['nama_anggota'] ?></td>
                                                <td class="small"><?= $data['nip'] ?></td>
                                                <td class="small"><?= $data['status_karyawan'] ?></td>
                                                <td class="small">IURAN WAJIB ANGGOTA</td>
                                                <td class="small">Rp. 100.000</td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script>
        document.getElementById('mainDate').addEventListener('change', function() {
            var dateValue = this.value;
            var dateArrayInputs = document.querySelectorAll('.dateArray');
            dateArrayInputs.forEach(function(input) {
                input.value = dateValue;
            });
        });
    </script>
<?php
    include '../../../footer.php';
}
?>