<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include 'modal.php';
include 'modal_kantin.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong>DATA KANTIN</strong></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="index.php">Back</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#kantinModal"><i class="fa fa-plus"></i>Tambah Kantin </button>
                    <form action="../../../app/controller/Usaha_kantin.php" method="post">
                        <table class="display nowrap" style="width:100%" id="sampleTable">
                            <thead>
                                <tr class="btn-dark">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA KANTIN</th>
                                    <th class="small">ACTION</th>
                                </tr>
                            </thead>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tb_kantin ORDER BY id_kantin ASC");
                            $no = 1;
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td class="small"><?= $d['nama_kantin'] ?></td>
                                    <td class="d-flex align-items-center">
                                        <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id_kantin'] ?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                            <a href="delete_kantin.php?id=<?= $d['id_kantin'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>
                                    </td>

                                </tr>
                    </form>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $d['id_bukubesar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Buku_besar.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-info">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anggota</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="id" value="<?= $d['id_bukubesar'] ?>">
                                            <div class="form-group">
                                                <label for="jenis">Jenis Transaksi :</label><br>
                                                <input class="form-control" type="text" id="jenis" name="jenis" value="<?= $d['jenis_bukubesar'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal :</label><br>
                                                <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $d['tgl_bukubesar'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan :</label><br>
                                                <input class="form-control" type="text" id="keterangan" name="keterangan" value="<?= $d['keterangan'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="debit">Debit :</label><br>
                                                <input class="form-control" type="text" id="debit" name="debit" value="<?= $d['debit_bukubesar'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="kredit">Kredit :</label><br>
                                                <input class="form-control" type="text" id="kredit" name="kredit" value="<?= $d['kredit_bukubesar'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info" id="demoNotify" name="edit">Update</button>
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