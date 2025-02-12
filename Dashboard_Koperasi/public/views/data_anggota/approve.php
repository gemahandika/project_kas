<?php
session_name("kas_session");
session_start();
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
                <h1><i class="fa fa-th-list"></i> Data Anggota</h1>
                <p>Table Seluruh Anggota Aktif</p>
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

            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Responsive Table</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="small">NO</th>
                                    <th class="small">NAMA ANGGOTA</th>
                                    <th class="small">KETERANGAN</th>
                                    <th class="small">JUMLAH IURAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 100000;
                                $no = 0;
                                foreach ($chk as $id) {
                                    $sql_resi = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_anggota = '$id'") or die(mysqli_error($koneksi));

                                    while ($data = mysqli_fetch_array($sql_resi)) {
                                        $no++; ?>
                                        <tr>
                                            <input type="hidden" name="id[]" value="<?= $id ?>">
                                            <input type="hidden" name="saldo[]" value="<?= $data['saldo'] + $j ?>">
                                            <input type="hidden" name="nip[]" value="<?= $data['nip']  ?>">
                                            <input type="hidden" name="nama_anggota[]" value="<?= $data['nama_anggota'] ?>">
                                            <input type="hidden" name="jenis_transaksi[]" value="pemasukan">
                                            <input type="hidden" name="jumlah_transaksi[]" value="100000">
                                            <input type="hidden" name="keterangan[]" value="iuran bulanan anggota">

                                            <td class="small"><?= $no ?></td>
                                            <td class="small"><?= $data['nama_anggota'] ?></td>
                                            <td class="small">IURAN BULANAN ANGGOTA </td>
                                            <td class="small">100000</td>
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
        </form>
    </main>

<?php
    include '../../../footer.php';
}
?>