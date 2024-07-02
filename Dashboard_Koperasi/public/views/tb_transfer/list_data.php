<?php
include '../../../header.php';
// include 'modal.php';
// include 'modal_edit.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Detail Bukti Transfer Iuran</h1>
            <p>Table Seluruh Bukti Transfer Iuran</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="post" name="proses">
                        <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
                            <thead>
                                <tr class="btn-primary">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA</th>
                                    <th class="small">NIP</th>
                                    <th class="small">DATE</th>
                                    <th class="small">JENIS TRANSFER</th>
                                    <th class="small">NOMINAL</th>
                                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <th class="small">STATUS</th>
                                    <?php } ?>
                                    <th class="small">PHOTO </th>
                                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <th class="small">ACTION </th>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            if (in_array("admin", $_SESSION['admin_akses']) || in_array("super_admin", $_SESSION['admin_akses'])) {
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_transfer ORDER BY id_transfer DESC") or die(mysqli_error($koneksi));
                            }
                            if (in_array("user", $_SESSION['admin_akses'])) {
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_transfer WHERE nip_transfer = '$data2' ORDER BY id_transfer DESC") or die(mysqli_error($koneksi));
                            }
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                                $gambar = $data['file_transfer'];
                                if ($gambar == null) {
                                    $img = 'No Photo';
                                } else {
                                    $img1 = '<img src="../../../app/assets/img/bukti_transfer/' . $gambar . '" class="zoomable" style="width: 100%; height: 100%; ">';
                                    $img = '<img src="../../../app/assets/img/bukti_transfer/' . $gambar . '" class="zoomable">';
                                }
                            ?>
                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td class="small"><?= $data['nama_transfer'] ?></td>
                                    <td class="small"><?= $data['nip_transfer'] ?></td>
                                    <td class="small"><?= $data['tgl_transfer'] ?></td>
                                    <td class="small"><?= $data['jenis_transfer'] ?></td>
                                    <td class="small"><?= $data['nominal_transfer'] ?></td>
                                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <td class="small"><?= $data['status_transfer'] ?></td>
                                    <?php } ?>
                                    <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_transfer'] ?>">Cek Photo</a></td>
                                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_transfer'] ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                            <a href="delete.php?id=<?= $data['id_transfer'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    <?php } ?>
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