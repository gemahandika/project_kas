<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
?>
<!-- Modal Create -->
<div class="modal fade" id="editModal<?= $data['id_anggota'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Anggota.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-success">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <input type="hidden" id="report1" name="password" value="123" required onkeyup="myFunction()">
                        <input type="hidden" id="status" name="status_user" value="NON AKTIF" readonly>
                        <input type="hidden" id="pemasukan" name="pemasukan" value="pemasukan" readonly>
                        <input type="hidden" id="keterangan" name="keterangan" value="iuran bulanan anggota">

                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota :</label><br>
                            <input class="form-control" type="text" id="nama_anggota" name="nama_anggota">
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP :</label><br>
                            <input class="form-control" type="text" id="nip" name="nip">
                        </div>
                        <div class="form-group">
                            <label for="join_date">Join Date :</label><br>
                            <input class="form-control" type="date" id="join_date" name="join_date" value="<?= $date ?>">
                        </div>
                        <div class="form-group">
                            <label for="divisi">Divisi :</label><br>
                            <input class="form-control" type="text" id="divisi" name="divisi">
                        </div>
                        <div class="form-group">
                            <label for="cabang">Cabang :</label><br>
                            <input class="form-control" type="text" id="cabang" name="cabang">
                        </div>

                        <div class="form-group">
                            <label for="saldo">Saldo :</label><br>
                            <input class="form-control" type="text" id="saldo" name="saldo" value=0 onkeypress="return hanyaAngka(event)">
                        </div>
                        <input type="hidden" id="status" name="status" value="AKTIF">
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