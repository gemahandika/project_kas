<?php
include '../../../header.php';
include 'modal.php';
include 'modal_edit.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
  echo "Ooopss!! Kamu Tidak Punya Akses";
  exit();
}
$date = date("Y-m-d");
$time = date("H:i");
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h6><strong>DATA ANGGOTA NONAKTIF</strong></h6>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form method="post" name="proses">
            <table class="display nowrap" style="width:100%" id="sampleTable">
              <thead>
                <tr class="btn-primary">
                  <th class="small">NO</th>
                  <th class="small">ACTION</th>
                  <th class="small">NIP</th>
                  <th class="small">JOIN DATE</th>
                  <th class="small">NAMA ANGGOTA</th>
                  <th class="small">DIVISI</th>
                  <th class="small">CABANG</th>
                  <th class="small">SALDO </th>
                  <th class="small">STATUS </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status = 'NON AKTIF' ORDER BY id_anggota DESC") or die(mysqli_error($koneksi));
                $result = array();
                while ($data = mysqli_fetch_array($sql)) {
                  $result[] = $data;
                }
                foreach ($result as $data) {
                  $no++;
                ?>
                  <tr>
                    <td class="small"><?= $no ?></td>
                    <td>
                      <a href="#" class="action btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_anggota'] ?>">Tarik Saldo</a>
                      <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                        <a href="delete.php?id=<?= $data['id_anggota'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">Hapus</a>
                      <?php } ?>
                    </td>
                    <td class="small"><?= $data['nip'] ?></td>
                    <td class="small"><?= $data['join_date'] ?></td>
                    <td class="small"><?= $data['nama_anggota'] ?></td>
                    <td class="small"><?= $data['divisi'] ?></td>
                    <td class="small"><?= $data['cabang'] ?></td>
                    <td class="small"><?= $data['saldo'] ?></td>
                    <td class="small"><?= $data['status'] ?></td>
                  </tr>
          </form>
          </tbody>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal<?= $data['id_anggota'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="../../../app/controller/Anggota.php" method="post">
                <div class="modal-content">
                  <div class="modal-header btn btn-success">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tarik Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="report-it">
                      <input type="hidden" name="id" value="<?= $data['id_anggota'] ?>">
                      <input type="hidden" id="saldo_update" name="saldo_update" value="0" readonly>

                      <input type="hidden" id="jenis_bukubesar" name="jenis_bukubesar" value="PENGEMBALIAN IURAN ANGGOTA KELUAR">
                      <div class="form-group">
                        <label for="nip">Date :</label><br>
                        <input class="form-control" type="date" id="tgl_bukubesar" name="tgl_bukubesar" value="<?= $date ?>">
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan :</label><br>
                        <input class="form-control" type="text" id="keterangan" name="keterangan">
                      </div>
                      <input type="hidden" id="debit_bukubesar" name="debit_bukubesar" value="0" readonly>
                      <div class="form-group">
                        <label for="kredit_bukubesar">Saldo :</label><br>
                        <input class="form-control" type="text" id="kredit_bukubesar" name="kredit_bukubesar" value="<?= $data['saldo'] ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="demoNotify" name="ambil">Ambil Saldo</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <?php } ?>
        </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include '../../../footer.php'; ?>