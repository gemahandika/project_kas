<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/config/koneksi.php';

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong> DATA TABUNGAN EMAS</strong></h6>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="index.php">Back</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="tile" style="background-color: rgba(0, 255, 0, 0.3);">
                        <h6>Data Anggota Produk Tabungan Emas. </h6>
                    </div>
                    <form method="post" name="proses">
                        <table class="display nowrap" style="width:100%" id="sampleTable">
                            <thead>
                                <tr class="btn-success">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA ANGGOTA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">NIK PERUSAHAAN</th>
                                    <th class="small">ALAMAT</th>
                                    <th class="small">HANDPHONE</th>
                                    <th class="small">BERAT EMAS (gr)</th>
                                    <th class="small">LAMA TABUNGAN (Bln)</th>
                                    <th class="small">TANGGAL</th>
                                    <th class="small">ACTION </th>
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            $result = array();

                            if (in_array("admin", $_SESSION['admin_akses']) || in_array("super_admin", $_SESSION['admin_akses'])) {
                                // Query untuk admin atau super_admin
                                $stmt = $koneksi->prepare("SELECT * FROM tb_emas WHERE status = ? ORDER BY id_emas DESC");
                                $status = 'TERIMA';
                                $stmt->bind_param("s", $status);
                            } elseif (in_array("user", $_SESSION['admin_akses'])) {
                                // Query untuk user
                                $stmt = $koneksi->prepare("SELECT * FROM tb_emas WHERE status = ? AND nik = ? ORDER BY id_emas DESC");
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
                                <tbody>
                                    <tr>
                                        <td class="small"><?= $no ?></td>
                                        <td class="small"><?= $data['nama'] ?></td>
                                        <td class="small"><?= $data['nik'] ?></td>
                                        <td class="small"><?= $data['nik_perusahaan'] ?></td>
                                        <td class="small"><?= $data['alamat'] ?></td>
                                        <td class="small"><?= $data['phone'] ?></td>
                                        <td class="small"><?= $data['berat_emas'] ?></td>
                                        <td class="small"><?= $data['lama_tab'] ?></td>
                                        <td class="small"><?= $data['tanggal'] ?></td>
                                        <td class="small d-flex">
                                            <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_emas'] ?>"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Edit</a>
                                        </td>
                                    </tr>
                    </form>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $data['id_emas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Tab_emas.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-warning">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Anggota Tabungan Emas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="id_emas" value="<?= $data['id_emas'] ?>" readonly>
                                            <div class="form-group">
                                                <label for="nama"><strong>Nama Anggota :</strong></label>
                                                <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik"><strong>Nik :</strong></label>
                                                <input class="form-control" type="text" id="nik" name="nik" value="<?= $data['nik'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik_perusahaan"><strong>Nik Karyawan :</strong></label>
                                                <input class="form-control" type="text" id="nik_perusahaan" name="nik_perusahaan" value="<?= $data['nik_perusahaan'] ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="alamat"><strong>Alamat :</strong></label>
                                                <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone"><strong>Handphone :</strong></label>
                                                <input class="form-control" type="text" id="phone" name="phone" value="<?= $data['phone'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="berat_emas"><strong>Berat Emas :</strong></label>
                                                <input class="form-control" type="text" id="berat_emas" name="berat_emas" value="<?= $data['berat_emas'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="lama_tab"><strong>Lama Tabungan:</strong></label>
                                                <input class="form-control" type="text" id="lama_tab" name="lama_tab" value="<?= $data['lama_tab'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal"><strong>Tanggal :</strong></label>
                                                <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" id="demoNotify" name="edit_emas">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../../../footer.php'; ?>