<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Usaha_kantin.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-info">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="form-group">
                            <label for="nama_kantin">Nama Kantin :</label><br>
                            <select class="form-control" id="nama_kantin" name="nama_kantin" aria-label="Default select example" required>
                                <option value="">- Pilih Kantin -</option>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_kantin") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                ?>
                                    <option value="<?= $data['nama_kantin'] ?>"><?= $no++; ?>. <?= $data['nama_kantin'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pendapatan">Pendapatan :</label><br>
                            <input class="form-control" type="number" id="pendapatan" name="pendapatan" value="0" required>
                        </div>
                        <div class="form-group">
                            <label for="komisi">Komisi :</label><br>
                            <input class="form-control" type="number" id="komisi" name="komisi" value="0" required>
                        </div>
                        <div class="form-group">
                            <label for="pembelian">Pembelian :</label><br>
                            <input class="form-control" type="number" id="pembelian" name="pembelian" value="0" onkeypress="return inputAngka(event)" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan :</label><br>
                            <input class="form-control" type="text" id="keterangan" name="keterangan" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal :</label><br>
                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $date ?>" required>
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