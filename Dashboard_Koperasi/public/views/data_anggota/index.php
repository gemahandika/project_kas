<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include 'modal.php';
include 'modal_edit.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
  echo "Ooopss!! Kamu Tidak Punya Akses";
  exit();
}
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h6><strong> DATA ANGGOTA</strong></h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body d-flex justify-content-end">
          <p><a href="export" type="button" class="btn btn-sm mr-2 btn-danger"><i class="fa fa-download"></i>Download</a></p>
        </div>
        <div class="tile-body">
          <form method="post" name="proses">
            <table class="display nowrap" style="width:100%" id="sampleTable">
              <thead>
                <tr class="btn-primary">
                  <th class="small">NO</th>
                  <th class="small">NIK</th>
                  <th class="small">JOIN DATE</th>
                  <th class="small">NAMA ANGGOTA</th>
                  <th class="small">DIVISI</th>
                  <th class="small">KARYAWAN/CABANG/AGEN</th>
                  <th class="small">STATUS KARYAWAN</th>
                  <th class="small">PHONE</th>
                  <th class="small">ALAMAT</th>
                  <th class="small">SALDO</th>
                  <th class="small">ACTION</th>
                </tr>
              </thead>

              <?php
              $no = 0;
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status = 'AKTIF' ORDER BY id_anggota ASC") or die(mysqli_error($koneksi));
              $result = array();
              while ($data = mysqli_fetch_array($sql)) {
                $result[] = $data;
              }
              foreach ($result as $data) {
                $no++;
              ?>
                <tr>
                  <td class="small"><?= $no; ?></td>
                  <td class="small"><?= $data['nip'] ?></td>
                  <td class="small"><?= $data['join_date'] ?></td>
                  <td class="small"><?= $data['nama_anggota'] ?></td>
                  <td class="small"><?= $data['divisi'] ?></td>
                  <td class="small"><?= $data['cabang'] ?></td>
                  <td class="small"><?= $data['status_karyawan'] ?></td>
                  <td class="small"><?= $data['phone'] ?></td>
                  <td class="small"><?= $data['alamat'] ?></td>
                  <td class="small"><?= $data['saldo'] ?></td>
                  <td class="d-flex">
                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_anggota'] ?>">Edit</a>
                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                      <a href="delete.php?id=<?= $data['id_anggota'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } ?>
                  </td>
                </tr>
          </form>
          <!-- Modal Edit -->
          <div class="modal fade" id="editModal<?= $data['id_anggota'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="../../../app/controller/Anggota.php" method="post">
                <div class="modal-content">
                  <div class="modal-header btn btn-info">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="report-it">
                      <input type="hidden" name="id" value="<?= $data['id_anggota'] ?>">
                      <div class="form-group">
                        <label for="nip">NIP :</label><br>
                        <input class="form-control" type="text" id="nip" name="nip" value="<?= $data['nip'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="join_date">Join Date :</label><br>
                        <input class="form-control" type="date" id="join_date" name="join_date" value="<?= $data['join_date'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="nama_anggota">Nama Anggota :</label><br>
                        <input class="form-control" type="text" id="nama_anggota" name="nama_anggota" value="<?= $data['nama_anggota'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="divisi">Divisi :</label><br>
                        <input class="form-control" type="text" id="divisi" name="divisi" value="<?= $data['divisi'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="cabang">Cabang :</label><br>
                        <input class="form-control" type="text" id="cabang" name="cabang" value="<?= $data['cabang'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelect1">Status : </label>
                        <select class="form-control" id="exampleSelect1" name="status">
                          <option value="<?= ($data['status']) ?>"><?= ($data['status']) ?></option>
                          <option value="NON AKTIF">NON AKTIF</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="saldo">Saldo :</label><br>
                        <input class="form-control" type="text" id="saldo" name="saldo" value="<?= $data['saldo'] ?>" onkeypress="return inputAngka(event)">
                      </div>
                      <!-- <input type="hidden" id="status" name="status" value="AKTIF"> -->
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" id="demoNotify" name="edit">Update</button>
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