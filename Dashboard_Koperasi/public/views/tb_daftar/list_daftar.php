<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
$date = date("Y-m-d");
$time = date("H:i");
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Data List Register</h1>
            <p>Data Seluruh Anggota Yang Ingin Join</p>
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
                    <form method="post" name="proses">
                        <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
                            <thead>
                                <tr class="btn-dark">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">UNIT</th>
                                    <th class="small">NO HANDPHONE</th>
                                    <th class="small">ALAMAT </th>
                                    <!-- <th class="small">SYARAT & KETENTUAN </th> -->
                                    <th class="small">TANGGAL</th>
                                    <th class="small">STATUS</th>
                                    <th class="small">STATUS KARYAWAN</th>
                                    <th class="small">ACTION</th>
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_daftar ORDER BY id_daftar DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td class="small"><?= $data['nama_daftar'] ?></td>
                                    <td class="small"><?= $data['nik_daftar'] ?></td>
                                    <td class="small"><?= $data['unit_daftar'] ?></td>
                                    <td class="small"><?= $data['hp_daftar'] ?></td>
                                    <td class="small"><?= $data['alamat_daftar'] ?></td>
                                    <!-- <td class="small"><?= $data['syarat_daftar'] ?></td> -->
                                    <td class="small"><?= $data['tgl_daftar'] ?></td>
                                    <td class="small"><?= $data['status_daftar'] ?></td>
                                    <td class="small"><?= $data['status_karyawan'] ?></td>
                                    <td class="d-flex">
                                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_daftar'] ?>"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Terima</a>
                                         <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                            <a href="delete.php?id=<?= $data['id_daftar'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class=" btn btn-danger btn-sm ml-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                    </form>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $data['id_daftar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Anggota.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-primary">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Anggota Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="password" value="123" required onkeyup="myFunction()">
                                            <input type="hidden" name="status_user" value="NON AKTIF" readonly>
                                            <input type="hidden" id="pemasukan" name="pemasukan" value="pemasukan" readonly>
                                            <input type="hidden" id="keterangan" name="keterangan" value="iuran bulanan anggota">

                                            <input type="hidden" name="id_daftar" value="<?= $data['id_daftar'] ?>">
                                            <div class="form-group">
                                                <label for="nip">NIP :</label><br>
                                                <input class="form-control" type="text" id="nip" name="nip" value="<?= $data['nik_daftar'] ?>" required>
                                            </div>
                                            <input type="hidden" name="join_date" value="<?= $date ?>">
                                            <div class="form-group">
                                                <label for="nama_anggota">Nama Anggota :</label><br>
                                                <input class="form-control" type="text" id="nama_anggota" name="nama_anggota" value="<?= $data['nama_daftar'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="divisi">Divisi :</label><br>
                                                <input class="form-control" type="text" id="divisi" name="divisi" value="<?= $data['unit_daftar'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cabang">Cabang :</label><br>
                                                <input class="form-control" type="text" id="cabang" name="cabang" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="saldo">Saldo :</label><br>
                                                <input class="form-control" type="text" id="saldo" name="saldo" value="0" required onkeypress="return inputAngka(event)">
                                            </div>
                                            <input type="hidden" name="status" value="AKTIF">
                                            <input type="hidden" name="status_daftar" value="diterima">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="demoNotify" name="add_daftar">Update</button>
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