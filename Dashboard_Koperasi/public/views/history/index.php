<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong>HISTORY TRANSAKSI</strong></h6>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="post" name="proses">
                        <table class="display nowrap" style="width:100%" id="sampleTable">
                            <thead>
                                <tr class="btn-primary">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">TANGGAL</th>
                                    <th class="small">NOMINAL</th>
                                    <th class="small">KETERANGAN</th>
                                    <!-- <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <th class="small">STATUS</th>
                                    <?php } ?>
                                    <th class="small">PHOTO </th>
                                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <th class="small">ACTION </th>
                                    <?php } ?> -->
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            if (in_array("admin", $_SESSION['admin_akses']) || in_array("super_admin", $_SESSION['admin_akses'])) {
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_history ORDER BY id_history DESC") or die(mysqli_error($koneksi));
                            }
                            if (in_array("user", $_SESSION['admin_akses'])) {
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_history WHERE nik = '$data2' ORDER BY id_history DESC") or die(mysqli_error($koneksi));
                            }
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                                // $gambar = $data['file_transfer'];
                                // if ($gambar == null) {
                                //     $img = 'No Photo';
                                // } else {
                                //     $img1 = '<img src="../../../app/assets/img/bukti_transfer/' . $gambar . '" class="zoomable" style="width: 100%; height: 100%; ">';
                                //     $img = '<img src="../../../app/assets/img/bukti_transfer/' . $gambar . '" class="zoomable">';
                                // }
                            ?>
                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td class="small"><?= $data['nama'] ?></td>
                                    <td class="small"><?= $data['nik'] ?></td>
                                    <td class="small"><?= $data['tanggal'] ?></td>
                                    <td class="small"><?= $data['nominal'] ?></td>
                                    <td class="small"><?= $data['keterangan'] ?></td>
                                    <!-- <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <td class="small"><?= $data['status_transfer'] ?></td>
                                    <?php } ?> -->
                                    <!-- <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_transfer'] ?>">Cek Photo</a></td>
                                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_transfer'] ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                            <a href="delete.php?id=<?= $data['id_transfer'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    <?php } ?> -->
                                </tr>
                    </form>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $data['id_transfer'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header btn btn-dark">
                                    <h5 class="modal-title fs-5" id="exampleModalLabel">Detail Photo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="report-it">
                                        <h1><?= $img1 ?></h1>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
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