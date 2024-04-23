<?php
include '../../../header.php';
// include 'modal.php';
// include 'modal_edit.php';
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Profile</h1>
            <p>Profile User</p>
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
                <form action="../../../app/controller/User_app.php" method="post" enctype="multipart/form-data">
                    <div class="tile-body">
                        <input class="form-control" type="hidden" name="id" value="<?= $data1['login_id'] ?>" required readonly>
                        <div class="form-group">
                            <label class="control-label">NIP : </label>
                            <input class="form-control" type="text" name="nip_transfer" value="<?= $data2 ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Anggota :</label>
                            <input class="form-control" type="text" name="nama_transfer" value="<?= $data1['nama_user'] ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Masukan Password Baru :</label>
                            <input class="form-control" type="text" name="password_new" placeholder="- Input New Password -" required>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <input type="submit" name="reset_profile" class="btn btn-info" value="Ganti Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>