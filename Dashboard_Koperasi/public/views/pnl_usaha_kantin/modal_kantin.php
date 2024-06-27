<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Create -->
<div class="modal fade" id="kantinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Usaha_kantin.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-dark">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Kantin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="form-group">
                            <label for="kantin">Nama Kantin :</label><br>
                            <input class="form-control" type="text" id="kantin" name="kantin" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark" name="tambah_kantin">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>