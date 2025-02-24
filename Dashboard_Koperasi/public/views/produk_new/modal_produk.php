<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Katagori_produk.php" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header btn btn-info">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">TAMBAH PRODUK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="form-group">
                            <label for="nama_produk"><b>NAMA PRODUK :</b></label><br>
                            <input class="form-control" type="text" id="nama_produk" name="nama_produk" required>
                        </div>
                    </div>
                    <div class="report-it">
                        <div class="form-group">
                            <label for="file"><b>POTO PRODUK :</b></label><br>
                            <input type="file" name="file" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="tambah_produk">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>