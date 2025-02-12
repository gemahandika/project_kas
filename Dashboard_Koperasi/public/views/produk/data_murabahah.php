<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong> DATA MURABAHAH</strong></h6>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="index.php">Back</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="tile" style="background-color: rgba(0, 123, 255, 0.3);">
                        <h6>Data Anggota Produk Murabahah. </h6>
                    </div>
                    <form method="post" name="proses">
                        <table class="display nowrap" style="width:100%" id="sampleTable">
                            <thead>
                                <tr class="btn-info">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA ANGGOTA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">UNIT</th>
                                    <th class="small">ALAMAT</th>
                                    <th class="small">TANGGAL</th>
                                    <th class="small">NAMA BARANG</th>
                                    <th class="small">JENIS</th>
                                    <th class="small">WARNA</th>
                                    <th class="small">HARGA </th>
                                    <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                                        <th class="small">ACTION </th>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            $result = array();

                            if (in_array("admin", $_SESSION['admin_akses']) || in_array("super_admin", $_SESSION['admin_akses'])) {
                                // Query untuk admin atau super_admin
                                $stmt = $koneksi->prepare("SELECT * FROM tb_murabahah WHERE status = ? ORDER BY id_murabahah DESC");
                                $status = 'TERIMA';
                                $stmt->bind_param("s", $status);
                            } elseif (in_array("user", $_SESSION['admin_akses'])) {
                                // Query untuk user
                                $stmt = $koneksi->prepare("SELECT * FROM tb_murabahah WHERE status = ? AND nik = ? ORDER BY id_murabahah DESC");
                                $status = 'TERIMA';
                                $stmt->bind_param("ss", $status, $data2);
                            }

                            // Eksekusi query
                            if (isset($stmt) && $stmt->execute()) {
                                $result_query = $stmt->get_result();

                                // Ambil hasil query
                                while ($data = $result_query->fetch_assoc()) {
                                    $result[] = $data;
                                }

                                // Tutup statement
                                $stmt->close();
                            }

                            // Tutup koneksi
                            $koneksi->close();

                            // Output data
                            foreach ($result as $data) {
                                $no++;
                                // Contoh output data
                                // echo "No: $no - Nama: " . $data['nama'] . "<br>";

                            ?>

                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td class="small"><?= $data['nama'] ?></td>
                                    <td class="small"><?= $data['nik'] ?></td>
                                    <td class="small"><?= $data['unit'] ?></td>
                                    <td class="small"><?= $data['alamat'] ?></td>
                                    <td class="small"><?= $data['tanggal'] ?></td>
                                    <td class="small"><?= $data['nama_barang'] ?></td>
                                    <td class="small"><?= $data['jenis'] ?></td>
                                    <td class="small"><?= $data['warna'] ?></td>
                                    <td class="small"><?= $data['harga'] ?></td>
                                    <td class="small d-flex">
                                        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                                            <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#edit<?= $data['nik'] ?>"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Edit</a>
                                            <a href="#" class="btn btn-primary btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#edit<?= $data['nik'] ?>"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Bayar Tagihan</a>
                                        <?php } ?>
                                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#tolak<?= $data['nik'] ?>"><i class="fa fa-fw fa-lg fa-times-circle" aria-hidden="true"></i>Hapus</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                    </form>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Produk.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-success">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Anggota Murabahah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <div class="form-group">
                                                <label for="nama"><strong>Nama Anggota :</strong></label>
                                                <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik"><strong>Nik :</strong></label>
                                                <input class="form-control" type="text" id="nik" name="nik" value="<?= $data['nik'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="unit"><strong>Unit :</strong></label>
                                                <input class="form-control" type="text" id="unit" name="unit" value="<?= $data['unit'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat"><strong>Alamat :</strong></label>
                                                <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal"><strong>Tanggal :</strong></label>
                                                <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_barang"><strong>Nama Barang :</strong></label>
                                                <input class="form-control" type="text" id="nama_barang" name="nama_barang" value="<?= $data['nama_barang'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis"><strong>Jenis Barang :</strong></label>
                                                <input class="form-control" type="text" id="jenis" name="jenis" value="<?= $data['jenis'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="warna"><strong>Warna Barang :</strong></label>
                                                <input class="form-control" type="text" id="warna" name="warna" value="<?= $data['warna'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga"><strong>Harga Barang :</strong></label>
                                                <input class="form-control" type="number" id="harga" name="harga" value=<?= $data['harga'] ?> required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success" id="demoNotify" name="edit_murabahah">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Tolak Daftar -->
                    <div class="modal fade" id="tolak<?= $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Produk.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-danger">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Tolak Anggota Murabahah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="nik" value="<?= $data['nik'] ?>">
                                            <input type="hidden" name="status" value="NONAKTIF">
                                            <div class="form-group">
                                                <label for="nip">Apakah Anda Ingin Menghapus <?= $data['nama'] ?> Dari Anggota Murabahah <strong><?= $data['nama'] ?> </strong> ? </label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-danger" id="demoNotify" name="tolak_murabahah">Tolak</button>
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