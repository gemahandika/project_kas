<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/config/koneksi.php';
include 'modal_pendapatan.php';
include '../../../app/models/Laporan_models.php'
?>
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="tile-body d-flex justify-content-center mb-4" style="border-bottom: 2px solid black;">
                        <h5>LAPORAN SISA HASIL USAHA KOPERASI</h5>
                    </div>
                    <div class="tile-body d-flex justify-content-end">
                        <button type="button" class="btn btn-info btn-sm ml-2 " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data </button>
                        <!-- <a href="display_laporan.php" target="_blank" type="button" class="btn btn-info btn-sm ml-2 ">Display Laporan </a> -->
                    </div>
                    <div class="tile-body d-flex justify-content-center">
                        <h6>PENDAPATAN USAHA</h6>
                    </div>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th class=" text-center">ACTION</th>
                                <th class=" text-center">NO</th>
                                <th class=" text-center">PENDAPATAN USAHA</th>
                                <th class=" text-center">PENDAPATAN</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '1' AND keterangan = 'AKTIF' ORDER BY id_laporan DESC") or die(mysqli_error($koneksi));
                        $result = array();
                        while ($data = mysqli_fetch_array($sql)) {
                            $result[] = $data;
                        }
                        foreach ($result as $data) {
                            $no++;
                        ?>

                            <tr>
                                <td class="small text-center">
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_laporan'] ?>">Update</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $data['id_laporan'] ?>">Hapus</a>
                                </td>
                                <td class=" text-center"><?= $no ?></td>
                                <td class=" text-center"><?= $data['nama_laporan'] ?></td>
                                <td class=" text-right mr-4"><?= number_format($data['nominal']) ?></td>
                            </tr>

                            <!-- Modal Update Pendapatan -->
                            <div class="modal fade" id="editModal<?= $data['id_laporan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="../../../app/controller/Laporan.php" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header btn btn-primary">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data Laporan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="report-it">
                                                    <input type="hidden" name="id" value="<?= $data['id_laporan'] ?>" readonly>
                                                    <div class="form-group text-center text-primary">
                                                        <label for="nama_laporan"><b>PENDAPATAN USAHA</b></label><br>
                                                        <input class="form-control text-center" type="text" id="nama_laporan" name="nama_laporan" value="<?= $data['nama_laporan'] ?>" required>
                                                    </div>
                                                    <div class="form-group text-center text-primary">
                                                        <label for="nominal"><b>NOMINAL</b></label><br>
                                                        <input class="form-control text-center" type="text" id="nominal" name="nominal" value="<?= number_format($data['nominal']) ?>" min="0" onkeypress="return inputAngka(event)" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" name="edit_laporan" class="btn btn-primary" value="Update">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal Nonaktif Pendapatan -->
                            <div class="modal fade" id="hapusModal<?= $data['id_laporan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="../../../app/controller/Laporan.php" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header btn btn-danger">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Laporan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="report-it">
                                                    <input type="hidden" name="id" value="<?= $data['id_laporan'] ?>" readonly>
                                                    <div class="form-group text-center text-danger">
                                                        <label for="nama_laporan"><b>Apakah Anda Ingin Menghapus Data ini ?</b></label><br>
                                                    </div>
                                                    <div class="form-group text-center text-danger">
                                                        <label for="nominal"><b>NOMINAL</b></label><br>
                                                        <input class="form-control text-center" type="number" id="nominal" name="nominal" value="<?= $data['nominal'] ?>" required readonly>
                                                    </div>
                                                    <input type="hidden" name="keterangan" value="NONAKTIF" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" name="nonaktif_laporan" class="btn btn-danger" value="Hapus">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        <?php } ?>
                    </table>
                    <div class="tile-body d-flex justify-content-between mr-2 mb-4" style="border-bottom: 1px solid;">
                        <h6>TOTAL PENDAPATAN USAHA BRUTO : </h6>
                        <h6>Rp. <?= number_format($pendapatan) ?></h6>
                    </div>
                </div>

                <div class="tile-body">
                    <div class="tile-body d-flex justify-content-center">
                        <h6>BEBAN USAHA</h6>
                    </div>
                    <table id="example1" class="display" style="width:100%">
                        <thead>
                            <tr class="bg-info text-white">
                                <th class="text-center">ACTION</th>
                                <th class="text-center">NO</th>
                                <th class="text-center">BEBAN USAHA</th>
                                <th class="text-center">BEBAN</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '2' AND keterangan = 'AKTIF' ORDER BY id_laporan DESC") or die(mysqli_error($koneksi));
                        $result = array();
                        while ($data = mysqli_fetch_array($sql)) {
                            $result[] = $data;
                        }
                        foreach ($result as $data) {
                            $no++;
                        ?>
                            <tr>
                                <td class="small text-center">
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_laporan'] ?>">Update</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $data['id_laporan'] ?>">Hapus</a>
                                </td>
                                <td class="text-center"><?= $no ?></td>
                                <td class="text-center"><?= $data['nama_laporan'] ?></td>
                                <td class="text-right mr-4"><?= number_format($data['nominal']) ?></td>
                            </tr>

                            <!-- Modal Update Beban -->
                            <div class="modal fade" id="editModal<?= $data['id_laporan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="../../../app/controller/Laporan.php" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header btn btn-info">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data Laporan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="report-it">
                                                    <input type="hidden" name="id" value="<?= $data['id_laporan'] ?>" readonly>
                                                    <div class="form-group text-center text-info">
                                                        <label for="nama_laporan"><b>BEBAN USAHA</b></label><br>
                                                        <input class="form-control text-center" type="text" id="nama_laporan" name="nama_laporan" value="<?= $data['nama_laporan'] ?>" required>
                                                    </div>
                                                    <div class="form-group text-center text-info">
                                                        <label for="nominal"><b>NOMINAL</b></label><br>
                                                        <input class="form-control text-center" type="number" id="nominal" name="nominal" value="<?= $data['nominal'] ?>" min="0" onkeypress="return inputAngka(event)" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" name="edit_laporan" class="btn btn-info" value="Update">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal Nonaktif BEBAN -->
                            <div class="modal fade" id="hapusModal<?= $data['id_laporan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="../../../app/controller/Laporan.php" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header btn btn-danger">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Laporan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="report-it">
                                                    <input type="hidden" name="id" value="<?= $data['id_laporan'] ?>" readonly>
                                                    <div class="form-group text-center text-danger">
                                                        <label for="nama_laporan"><b>Apakah Anda Ingin Menghapus Data ini ?</b></label><br>
                                                    </div>
                                                    <div class="form-group text-center text-danger">
                                                        <label for="nominal"><b>NOMINAL</b></label><br>
                                                        <input class="form-control text-center" type="number" id="nominal" name="nominal" value="<?= $data['nominal'] ?>" required readonly>
                                                    </div>
                                                    <input type="hidden" name="keterangan" value="NONAKTIF" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" name="nonaktif_laporan" class="btn btn-danger" value="Hapus">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </table>
                    <div class="tile-body d-flex justify-content-between mr-2">
                        <h6>TOTAL BEBAN USAHA BRUTO :</h6>
                        <h6>Rp. <?= number_format($beban) ?></h6>
                    </div>
                    <div class="tile-body d-flex justify-content-between mr-2 mt-4 text-danger">
                        <h5>SISA HASIL USAHA : </h5>
                        <h5>Rp. <?= number_format($sisa_hasil) ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

<script>
    new DataTable('#example', {
        info: false,
        ordering: false,
        paging: false
    });
    new DataTable('#example1', {
        info: false,
        ordering: false,
        paging: false
    });
</script>

<?php include '../../../footer.php'; ?>