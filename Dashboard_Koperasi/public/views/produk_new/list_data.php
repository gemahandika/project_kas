<?php
session_name("kas_session");
session_start();
include '../../../header.php';
// include 'modal.php';
// include 'modal_edit.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong>LIST DATA</strong></h6>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="index.php">Back</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body d-flex justify-content-end">
                    <!-- <p><a href="export" type="button" class="btn btn-sm mr-2 btn-danger"><i class="fa fa-download"></i>Download</a></p> -->
                </div>
                <div class="tile-body">
                    <form method="post" name="proses">
                        <table class="display nowrap" style="width:100%" id="sampleTable">
                            <thead>
                                <tr class="btn-info">
                                    <th class="small">NO</th>
                                    <th class="small">NAMA ANGGOTA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">NIK PERUSAHAAN</th>
                                    <th class="small">ALAMAT</th>
                                    <th class="small">PHONE</th>
                                    <th class="small">UNIT</th>
                                    <th class="small">NAMA PRODUK</th>
                                    <th class="small">NAMA BARANG</th>
                                    <th class="small">JENIS</th>
                                    <th class="small">WARNA</th>
                                    <th class="small">BERAT</th>
                                    <th class="small">HARGA</th>
                                    <th class="small">TANGGAL</th>
                                    <th class="small">LAMA MENABUNG</th>
                                    <th class="small">ACTION</th>
                                </tr>
                            </thead>

                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE status = 'AKTIF' ORDER BY id_produk DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="small"><?= $no; ?></td>
                                    <td class="small"><?= $data['nama'] ?></td>
                                    <td class="small"><?= $data['nik'] ?></td>
                                    <td class="small"><?= $data['nik_perusahaan'] ?></td>
                                    <td class="small"><?= $data['alamat'] ?></td>
                                    <td class="small"><?= $data['phone'] ?></td>
                                    <td class="small"><?= $data['unit'] ?></td>
                                    <td class="small"><?= $data['nama_produk'] ?></td>
                                    <td class="small"><?= $data['nama_barang'] ?></td>
                                    <td class="small"><?= $data['jenis'] ?></td>
                                    <td class="small"><?= $data['warna'] ?></td>
                                    <td class="small"><?= $data['berat'] ?></td>
                                    <td class="small"><?= $data['harga'] ?></td>
                                    <td class="small"><?= $data['tanggal'] ?></td>
                                    <td class="small"><?= $data['lama_menabung'] ?></td>
                                    <td class="d-flex">
                                        <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_produk'] ?>">Edit</a>
                                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                            <a href="delete.php?id=<?= $data['id_produk'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                    </form>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $data['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form action="../../../app/controller/Produk.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-warning">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">EDIT DATA ANGGOTA <?= $data['nama_produk'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="id" value="<?= $data['id_produk'] ?>">

                                            <div class="row">
                                                <!-- Kolom Kiri -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama_produk">NAMA PRODUK :</label><br>
                                                        <select class="form-control" name="nama_produk" id="role" type="text" onchange="showInput()" required>
                                                            <option value="<?= $data['nama_produk'] ?>"><?= $data['nama_produk'] ?></option>
                                                            <?php
                                                            $no = 1;
                                                            $sql = mysqli_query($koneksi, "SELECT * FROM katagori_produk") or die(mysqli_error($koneksi));
                                                            $result = array();
                                                            while ($data1 = mysqli_fetch_array($sql)) {
                                                                $result[] = $data1;
                                                            }
                                                            foreach ($result as $data1) {
                                                            ?>

                                                                <option value="<?= $data1['nama_produk'] ?>"> <?= $data1['nama_produk'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">NAMA ANGGOTA :</label><br>
                                                        <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nik">NIK :</label><br>
                                                        <input class="form-control" type="text" id="nik" name="nik" value="<?= $data['nik'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nik_perusahaan">NIK PERUSAHAAN :</label><br>
                                                        <input class="form-control" type="text" id="nik_perusahaan" name="nik_perusahaan" value="<?= $data['nik_perusahaan'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">ALAMAT :</label><br>
                                                        <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $data['alamat'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">PHONE :</label><br>
                                                        <input class="form-control" type="text" id="phone" name="phone" value="<?= $data['phone'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="unit">UNIT :</label><br>
                                                        <input class="form-control" type="text" id="unit" name="unit" value="<?= $data['unit'] ?>">
                                                    </div>

                                                </div>

                                                <!-- Kolom Kanan -->
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label for="nama_barang">NAMA BARANG :</label><br>
                                                        <input class="form-control" type="text" id="nama_barang" name="nama_barang" value="<?= $data['nama_barang'] ?>" onkeypress="return inputAngka(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis">JENIS :</label><br>
                                                        <input class="form-control" type="text" id="jenis" name="jenis" value="<?= $data['jenis'] ?>" onkeypress="return inputAngka(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="warna">WARNA :</label><br>
                                                        <input class="form-control" type="text" id="warna" name="warna" value="<?= $data['warna'] ?>" onkeypress="return inputAngka(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="berat">BERAT :</label><br>
                                                        <input class="form-control" type="text" id="berat" name="berat" value="<?= $data['berat'] ?>" onkeypress="return inputAngka(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">HARGA :</label><br>
                                                        <input class="form-control" type="text" id="harga" name="harga" value="<?= $data['harga'] ?>" onkeypress="return inputAngka(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal">TANGGAL :</label><br>
                                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" onkeypress="return inputAngka(event)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lama_menabung">LAMA MENABUNG:</label><br>
                                                        <input class="form-control" type="text" id="lama_menabung" name="lama_menabung" value="<?= $data['lama_menabung'] ?>" onkeypress="return inputAngka(event)">
                                                    </div>
                                                    <!-- <input type="hidden" id="status" name="status" value="AKTIF"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning" id="demoNotify" name="edit">Update</button>
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