<?php
include '../../../header.php';
$date = date('Y-m-d');
$time = date("H:i");
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Silahkan Pilih Data Terlebih Dahulu'); window.location='index.php';</script>";
} else {

?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Data Tagihan</h1>
                <p>Detail Tagihan Wajib Anggota</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
            </ul>
        </div>
        <form action="../../../app/controller/Approve.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body d-flex justify-content-start">
                            <label class="control-label">Tanggal :</label>
                            <div class="col-md-4">
                                <input class="form-control col-md-6" name="tanggal" type="date" value="<?= $date ?>">
                            </div>
                            <p><input type="submit" name="approve" class="btn btn-danger icon-btn" value="Proses"></p>
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
                                        <th class="small"><strong>TANGGAL</strong></th>
                                        <th class="small"><strong>JUMLAH TAGIHAN</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 100000;
                                    $no = 0;

                                    foreach ($chk as $nik) {
                                        $sql_resi = mysqli_query($koneksi, "SELECT t1.*, t2.saldo FROM tb_tagihan t1 JOIN tb_anggota t2 ON t1.nik = t2.nip WHERE t1.id_tagihan = '$nik'") or die(mysqli_error($koneksi));
                                        $data = mysqli_fetch_array($sql_resi);

                                        if ($data) {
                                            $no++;
                                    ?>
                                            <tr>
                                                <!-- Dari tabel anggota -->
                                                <input type="text" name="saldo[]" value="<?= $data['saldo'] + $j ?>">

                                                <!-- Dari tabel tagihan -->
                                                <input type="text" name="id_tagihan[]" value="<?= $data['id_tagihan'] ?>">
                                                <input type="text" name="nik[]" value="<?= $data['nik'] ?>">
                                                <input type="text" name="nama_anggota[]" value="<?= $data['nama_anggota'] ?>">
                                                <input type="text" name="jumlah_transaksi[]" value="<?= $data['jumlah_tagihan'] ?>">
                                                <input type="text" name="keterangan[]" value="<?= $data['keterangan'] ?>">
                                                <input type="text" name="jenis_transaksi[]" value="pemasukan">
                                                <input type="text" name="status[]" value="DONE">

                                                <td class="small"><?= $no ?></td>
                                                <td class="small"><?= $data['nama_anggota'] ?></td>
                                                <td class="small"><?= $data['nik'] ?></td>
                                                <td class="small"><?= $data['tanggal'] ?></td>
                                                <td class="small">Rp. <?= number_format($data['jumlah_tagihan']) ?></td>
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

<?php
    include '../../../footer.php';
}
?>