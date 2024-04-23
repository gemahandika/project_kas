<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>

<!-- Modal Create -->
<div class="modal fade" id="katagoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Buku_besar.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-primary">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Katagori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="form-group">
                            <label for="katagori" class="col-form-label">Katagori :</label>
                            <input type="text" class="form-control" id="katagori" name="katagori" required>
                        </div>
                        <input type="hidden" name="date" value="<?= $date ?>" readonly>
                        <input type="hidden" name="keterangan" value="- Masukan Keterangan -" readonly>
                        <input type="hidden" name="debit" value="0" readonly>
                        <input type="hidden" name="kredit" value="0" readonly>
                        <input type="hidden" name="status" value="aktif" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_katagori">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>