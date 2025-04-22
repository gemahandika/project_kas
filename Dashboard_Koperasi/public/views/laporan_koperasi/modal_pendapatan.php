<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Laporan.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-primary">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="form-group">
                            <label for="nama_laporan">DETAIL LAPORAN :</label><br>
                            <input class="form-control" type="text" id="nama_laporan" name="nama_laporan">
                        </div>
                        <div class="form-group">
                            <label for="jenis_laporan">JENIS LAPORAN :</label><br>
                            <select class="form-control" id="jenis_laporan" name="jenis_laporan" required>
                                <option value="1">PENDAPATAN</option>
                                <option value="2">BEBAN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">NOMINAL :</label><br>
                            <input class="form-control" type="number" id="nominal" name="nominal" min="0" value="0" onkeypress="return inputAngka(event)" required>
                        </div>
                        <input type="hidden" name="keterangan" value="AKTIF" readonly>
                        <!-- <div class="form-group">
                            <label for="tahun">TAHUN :</label><br>
                            <select class="form-control" id="tahun" name="tahun" required>
                                <option value="">Pilih Tahun</option>
                            </select>
                        </div> -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_laporan">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Menentukan rentang tahun (misalnya dari 2000 hingga tahun sekarang)
    var selectTahun = document.getElementById("tahun");
    var tahunSekarang = new Date().getFullYear();
    var tahunAwal = 2020; // Bisa diubah sesuai kebutuhan

    for (var i = tahunSekarang; i >= tahunAwal; i--) {
        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        selectTahun.appendChild(option);
    }
</script>