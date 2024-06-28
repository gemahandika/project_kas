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
            <h1><i class="fa fa-edit"></i> Tagihan Iuran Wajib</h1>
            <p>Data Tagihan Iuran Wajib Anggota</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
    </div>
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form action="index.php" method="get">
                    <div class="tile-body d-flex align-items-center">
                        <label class="control-label">Periode : </label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="dari" value="<?= $date ?>">
                        </div>
                        <label class="control-label mx-2">-</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="ke" value="<?= $date ?>">
                        </div>
                        <div class="ml-2">
                            <button type="submit" name="approve" class="btn btn-primary icon-btn form-group"><i class="fa fa-search"></i>Cari</button>
                        </div>
                        <p><a href="index.php?>" class="btn btn-secondary ml-1"><i class="fa fa-refresh" aria-hidden="true"></i></a></p>
                        <label class="ml-2 ">
                            <?php
                            if (isset($_GET['dari']) && isset($_GET['ke'])) {
                                echo "<p>Data Dari Tanggal " . $_GET['dari'] . " s/d " . $_GET['ke'] . "</p>";
                            } else {
                                echo "-";
                            }
                            ?>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body d-flex justify-content-start">
                    <p><button type="button" class="btn btn-info icon-btn mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Buat Tagihan</button></p>
                    <p><button type="button" class="btn btn-info icon-btn" onclick="edit()"><i class="fa fa-paper-plane"></i>Proses Tagihan</button></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="post" name="proses">
                        <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
                            <thead>
                                <tr class="btn-info">
                                    <th class="small">NO</th>
                                    <th><input type="checkbox" id="select_all"></th>
                                    <th class="small">NAMA ANGGOTA</th>
                                    <th class="small">NIK</th>
                                    <th class="small">JUMLAH TAGIHAN</th>
                                    <th class="small">TANGGAL</th>
                                    <th class="small">KETERANGAN</th>
                                    <th class="small">ACTION </th>
                                </tr>
                            </thead>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_tagihan where status='OTS' ORDER BY id_tagihan DESC") or die(mysqli_error($koneksi));
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
                                        <input type="checkbox" name="checked[]" class="check" value="<?= $d['nik'] ?>">
                                    </td>
                                    <td class="small"><?= $d['nama_anggota'] ?></td>
                                    <td class="small"><?= $d['nik'] ?></td>
                                    <td class="small">Rp. <?= number_format($d['jumlah_tagihan']) ?></td>
                                    <td class="small"><?= $d['tanggal'] ?></td>
                                    <td class="small"><?= $d['keterangan'] ?></td>
                                    <td class="d-flex">
                                        <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#tagihanModal<?= $d['id_tagihan'] ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                                            <a href="delete.php?id=<?= $d['id_tagihan'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
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