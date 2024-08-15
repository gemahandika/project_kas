<?php
include '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
include 'modal.php';
// include 'modal_edit.php';
include '../../../app/config/koneksi.php';

?>
<style>
    @media (max-width: 768px) {
        .tile-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong>TAGIHAN IURAN WAJIB</strong></h6>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body d-flex justify-content-start">
                    <p><a href="cek_tagihan" type="button" class="btn btn-primary mr-2"><i class="fa fa-search"></i>Cek Tagihan</a></p>
                    <p><button type="button" class="btn btn-info" onclick="buat_tagihan()"><i class="fa fa-plus"></i>Buat Tagihan</button></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="post" name="proses">
                        <table class="display nowrap" style="width:100%" id="sampleTable">
                            <thead>
                                <tr class="btn-info">
                                    <th class="small">NO</th>
                                    <th><input type="checkbox" id="select_all"></th>
                                    <th class="small">NAMA ANGGOTA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">SALDO</th>
                                    <!-- <th class="small">TANGGAL</th> -->
                                    <th class="small">KETERANGAN</th>
                                    <!-- <th class="small">ACTION </th> -->
                                </tr>
                            </thead>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota where status='AKTIF' ORDER BY id_anggota DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $d) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td>
                                        <input type="checkbox" name="checked[]" class="check" value="<?= $d['nip'] ?>">
                                    </td>
                                    <td class="small"><?= $d['nama_anggota'] ?></td>
                                    <td class="small"><?= $d['nip'] ?></td>
                                    <td class="small"><?= $d['saldo'] ?></td>
                                    <!-- <td class="small"><?= $date; ?></td> -->
                                    <td class="small">IURAN WAJIB ANGGOTA</td>
                                    <!-- <td class="d-flex">
                                        <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#tagihanModal<?= $d['id_tagihan'] ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                            <a href="delete.php?id=<?= $d['id_tagihan'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td> -->
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="tagihanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../../app/controller/Anggota.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header btn btn-info">
                                                    <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data Anggota</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="report-it">
                                                        <input type="hidden" name="id" value="<?= $d['id_tagihan'] ?>">
                                                        <div class="form-group">
                                                            <label for="nip">NIP :</label><br>
                                                            <input class="form-control" type="text" id="nip" name="nip" value="<?= $d['nik'] ?>">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>