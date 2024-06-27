<?php

include '../../../app/config/koneksi.php';

if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Tagihan.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-info">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Buat Tagihan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <?php
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_tagihan  ORDER BY id_tagihan DESC") or die(mysqli_error($koneksi));
                        $result = array();
                        while ($data = mysqli_fetch_array($sql)) {
                            $result[] = $data;
                        }
                        foreach ($result as $d) {
                            $no++;
                        ?>
                            <input class="form-control" type="hidden" id="keterangan" name="keterangan" value="<?= $d['keterangan'] ?>">

                        <?php } ?>
                        <input class="form-control" type="hidden" id="status" name="status" value="OTS">
                        <div class="form-group">
                            <label for="nama_anggota">Apakah Anda Ingin Membuat Tagihan Wajib Anggota ?</strong> </label><br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="add">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>