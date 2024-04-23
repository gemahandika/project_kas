<?php
include '../../../header.php';
// if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
//     echo "Ooopss!! Kamu Tidak Punya Akses";
//     exit();
// }
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Data User App</h1>
            <p>Table User App</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
                        <thead>
                            <tr class="btn-warning">
                                <th class="small">NO</th>
                                <th class="small">USERNAME</th>
                                <th class="small">PASSWORD</th>
                                <th class="small">NAMA USER</th>
                                <th class="small">STATUS</th>
                                <th class="small">AKSES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE STATUS = 'NON AKTIF'  ORDER BY LOGIN_ID DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td class="small"><?= $data['username'] ?></td>
                                    <td class="small"><?= $data['password'] ?></td>
                                    <td class="small"><?= $data['nama_user'] ?></td>
                                    <td class="small"><?= $data['status'] ?></td>
                                    <td class="d-flex">
                                        <a href="#" class=" btn btn-info btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['login_id'] ?>">Aktifkan</a>
                                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                        <a href="delete.php?id=<?= $data['login_id'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!-- Modal Aktivasi User -->
                                <div class="modal fade" id="editModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../../app/controller/User_app.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aktifkan User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="report-it">
                                                        <input type="hidden" name="id" value="<?= $data['login_id'] ?>">
                                                        <input type="hidden" name="password" value="<?= $data['password'] ?>">
                                                        <h6>Apakah Anda ingin mengaktifkan user atas nama <?= $data['nama_user'] ?> ?</h6>
                                                        <input class="dept-1" name="role" type="hidden" value="user" readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <input type="submit" name="aktif_user" class="btn btn-success" value="Aktifkan">
                                                    </div>
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
<?php
include '../../../footer.php';
?>