<?php

include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/User_app.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-success">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data User App</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="form-group">
                            <label for="nik">NIK :</label><br>
                            <input type="text" class="form-control" id="report" name="nik" required onkeyup="myFunction()">
                        </div>
                        <div class="form-group">
                            <label for="user_id">User ID :</label><br>
                            <input type="text" class="form-control" id="report" name="user_id" required onkeyup="myFunction()">
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label><br>
                            <input type="text" class="form-control" id="report1" name="password" required onkeyup="myFunction()">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Fullname :</label><br>
                            <input type="text" class="form-control" id="report2" name="fullname" required onkeyup="myFunction()">
                        </div>
                        <input type="hidden" id="status" name="status" value="NON AKTIF" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="add">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>