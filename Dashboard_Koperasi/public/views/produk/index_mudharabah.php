<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <!-- <h1><strong> Data Murabahah</strong></h1> -->
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="index.php">Back</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="tile" style="background-color: rgba(0, 100, 0, 0.3);">
                        <h6>Data Anggota yang Mendaftar Produk Mudharabah. </h6>
                    </div>
                    <form method="post" name="proses">
                        <table class="display nowrap" style="width:100%" id="sampleTable">
                            <thead>
                                <tr class="btn-primary">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA ANGGOTA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">ALAMAT</th>
                                    <th class="small">HANDHPHONE</th>
                                    <th class="small">TANGGAL</th>
                                    <th class="small">STATUS </th>
                                    <th class="small">ACTION </th>
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_mudharabah WHERE status = 'DAFTAR' ORDER BY id_mudharabah ASC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td class="small"><?= $data['nama'] ?></td>
                                    <td class="small"><?= $data['nik'] ?></td>
                                    <td class="small"><?= $data['alamat'] ?></td>
                                    <td class="small"><?= $data['phone'] ?></td>
                                    <td class="small"><?= $data['tanggal'] ?></td>
                                    <td class="small"><?= $data['status'] ?></td>
                                    <td class="small d-flex">
                                        <a href="#" class="btn btn-primary btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#terima<?= $data['nik'] ?>"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Terima</a>
                                        <a href="#" class="btn btn-danger btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#tolak<?= $data['nik'] ?>"><i class="fa fa-fw fa-lg fa-times-circle" aria-hidden="true"></i>Tolak</a>
                                    </td>
                                </tr>
                    </form>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="terima<?= $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Mudharabah.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-primary">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Terima Anggota Murabahah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="nik" value="<?= $data['nik'] ?>">
                                            <input type="hidden" name="status" value="TERIMA">
                                            <div class="form-group">
                                                <label for="nip">Apakah Anda Ingin Menerima Pengajuan Produk Mudharabah <strong><?= $data['nama'] ?> </strong> ? </label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-info" id="demoNotify" name="terima_mudharabah">Terima</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Tolak Daftar -->
                    <div class="modal fade" id="tolak<?= $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Mudharabah.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-danger">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Tolak Anggota Mudharabah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="nik" value="<?= $data['nik'] ?>">
                                            <input type="hidden" name="status" value="TOLAK">
                                            <div class="form-group">
                                                <label for="nip">Apakah Anda Ingin Menolak Pengajuan Produk Mudharabah <strong><?= $data['nama'] ?> </strong> ? </label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-danger" id="demoNotify" name="tolak_mudharabah">Tolak</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>