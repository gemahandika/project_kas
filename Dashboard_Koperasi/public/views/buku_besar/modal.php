<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Buku_besar.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-primary">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="form-group">
                            <label for="nama_anggota">Jenis Transaksi :</label><br>
                            <select class="form-control" id="jenis" name="jenis" aria-label="Default select example" required>
                                <option value="">- Pilih Katagori -</option>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_katagori") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                ?>
                                    <option value="<?= $data['nama_katagori'] ?>"><?= $no++; ?>. <?= $data['nama_katagori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal :</label><br>
                            <input class="form-control" type="date" id="date" name="date" value="<?= $date ?>">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan :</label><br>
                            <input class="form-control" type="text" id="keterangan" name="keterangan">
                        </div>
                        <div class="form-group">
                            <label for="debit">Debit :</label><br>
                            <input class="form-control" type="text" id="debit" name="debit" value="0" onkeypress="return inputAngka(event)" required>
                        </div>
                        <div class="form-group">
                            <label for="kredit">Kredit :</label><br>
                            <input class="form-control" type="text" id="kredit" name="kredit" value="0" onkeypress="return inputAngka(event)" required>
                        </div>
                        <input type="hidden" id="status" name="status" value="AKTIF">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>