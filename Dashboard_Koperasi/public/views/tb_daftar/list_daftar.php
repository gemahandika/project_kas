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
            <h1><i class="fa fa-users"></i> Data List Register</h1>
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
                                <tr class="btn-primary">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">UNIT</th>
                                    <th class="small">NO HANDPHONE</th>
                                    <th class="small">ALAMAT </th>
                                    <!-- <th class="small">SYARAT & KETENTUAN </th> -->
                                    <th class="small">TANGGAL</th>
                                    <th class="small">*KARYAWAN *CABANG *AGEN</th>
                                    <th class="small">STATUS KARYAWAN</th>
                                    <th class="small">ACTION</th>
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_daftar WHERE generate = 'waiting' ORDER BY id_daftar DESC") or die(mysqli_error($koneksi));
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
                                        <a href="#" class="btn btn-info btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_daftar'] ?>"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Terima</a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#tolakModal<?= $data['id_daftar'] ?>"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i>Tolak</a>

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
                                            <input type="hidden" id="keterangan" name="keterangan" value="IURAN WAJIB ANGGOTA">

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
                                                <label for="unit">Unit :</label><br>
                                                <input class="form-control" type="text" id="unit" name="unit" value="<?= $data['unit_daftar'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="hp">No. Handphone :</label><br>
                                                <input class="form-control" type="text" id="hp" name="hp" value="<?= $data['hp_daftar'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat :</label><br>
                                                <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $data['alamat_daftar'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cabang">Karyawan / Cabang / Agen :</label><br>
                                                <input class="form-control" type="text" id="cabang" name="cabang" value="<?= $data['status_daftar'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status_karyawan">Status Karyawan :</label><br>
                                                <input class="form-control" type="text" id="status_karyawan" name="status_karyawan" value="<?= $data['status_karyawan'] ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="saldo">Saldo :</label><br>
                                                <input class="form-control" type="text" id="saldo" name="saldo" value="0" required onkeypress="return inputAngka(event)">
                                            </div>
                                            <input type="hidden" name="status" value="AKTIF">
                                            <input type="hidden" name="generate" value="diterima">

                                            <!-- UNTUK KE TABLE TAGIHAN -->
                                            <input type="hidden" name="jumlah_tagihan" value=100000>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="demoNotify" name="add_daftar">Approve</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Tolak -->
                    <div class="modal fade" id="tolakModal<?= $data['id_daftar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Daftar.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-danger">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Tolak Anggota</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="id_daftar" value="<?= $data['id_daftar'] ?>">
                                            <input type="hidden" name="join_date" value="<?= $date ?>">
                                            <div class="form-group">
                                                <label for="nama_anggota">Apakah Anda Ingin Menolak Pendaftaran Atas nama : <strong><?= $data['nama_daftar'] ?></strong> </label><br>
                                            </div>
                                            <input type="hidden" name="generate" value="ditolak">


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" id="demoNotify" name="tolak_daftar">Proses</button>
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