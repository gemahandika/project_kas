<?php
include '../../../header.php';
// include 'modal.php';
// include 'modal_edit.php';
include '../../../app/config/koneksi.php';
if (!in_array("user", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Bukan Grouping User";
    exit();
}
$date = date("Y-m-d");
$time = date("H:i");
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Detail Bukti Transfer Iuran</h1>
            <p>Table Seluruh Bukti Transfer Iuran</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <form action="../../../app/controller/Bukti_transfer.php" method="post" enctype="multipart/form-data">
                    <div class="form-group d-flex">
                        <img class="mr-1 mb-2" src="../../../app/assets/img/LOGO1.png" alt="profile" style="width: 50px; height: 50px;">
                        <h3 class="tile-title mt-2">Form Upload Bukti Transfer</h3>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">NIP : </label>
                            <input class="form-control" type="text" name="nip_transfer" value="<?= $data2 ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Anggota :</label>
                            <input class="form-control" type="text" name="nama_transfer" value="<?= $data1['nama_user'] ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date :</label>
                            <input class="form-control" type="text" name="tgl_transfer" value="<?= $date ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Transfer :</label>
                            <select class="form-control" name="jenis_transfer" type="text" id="role" required>
                                <option value="">- Pilih Jenis Transaksi -</option>
                                <option value="SIMPANAN WAJIB">SIMPANAN WAJIB</option>
                                <option value="MURABAHAH">MURABAHAH</option>
                                <option value="MUDHARABAH">MUDHARABAH</option>
                                <option value="TABUNGAN EMAS">TABUNGAN EMAS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nominal Transfer:</label>
                            <input class="form-control" type="number" name="nominal_transfer" required>
                        </div>
                        <input class="form-control" type="hidden" name="status_transfer" value="waiting" required readonly>
                        <div class="form-group">
                            <label class="control-label">Input Bukti Transfer :</label>
                            <input class="form-control" type="file" name="file" required>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <input type="submit" name="add" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>