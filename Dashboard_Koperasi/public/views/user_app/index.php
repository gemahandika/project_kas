<?php
session_name("kas_session");
session_start();
include '../../../header.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
  echo "Ooopss!! Kamu Tidak Punya Akses";
  exit();
}
include 'modal.php';

?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h6><strong>DATA USER APLIKASI</strong></h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body d-flex justify-content-start">
          <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
            <p><button type="button" class="btn btn-primary  mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Add Data </button></p>
          <?php } ?>
          <p><a href="export.php" type="button" class="btn btn-danger mr-2"><i class="fa fa-download"></i>Download</a></p>
          <p><a href="aktivasi.php" type="button" class="btn btn-info mr-2"><i class="fa fa-download"></i>Aktifasi</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <table class="display nowrap" style="width:100%" id="sampleTable">
            <thead>
              <tr class="btn-primary">
                <th class="small">ACTION</th>
                <th class="small">NIP</th>
                <th class="small">USERNAME</th>
                <th class="small">NAMA USER</th>
                <th class="small">ROLE</th>
                <th class="small text-center">AKSES</th>
              </tr>
            </thead>
            <?php
            $no = 0;
            $sql = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN admin_akses ON user.LOGIN_ID = admin_akses.LOGIN_ID  ORDER BY user.LOGIN_ID DESC") or die(mysqli_error($koneksi));
            $result = array();
            while ($data = mysqli_fetch_array($sql)) {
              $result[] = $data;
            }
            foreach ($result as $data) {
              $no++;
            ?>
              <tr>
                <td>
                  <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['login_id'] ?>">Edit</a>
                </td>
                <td class="small"><?= $data['nip'] ?></td>
                <td class="small"><?= $data['username'] ?></td>
                <td class="small"><?= $data['nama_user'] ?></td>
                <td class="small"><?= $data['status'] ?></td>
                <td class="small text-center">
                  <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#aksesModal<?= $data['login_id'] ?>">Nonaktif User</a>
                  <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" id="demoSwal" data-bs-target="#resetModal<?= $data['login_id'] ?>">Reset</a>
                </td>
              </tr>
              <!-- Modal Edit 111 -->
              <div class="modal fade" id="editModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form action="../../../app/controller/User_app.php" method="post">
                    <div class="modal-content">
                      <div class="modal-header btn btn-success">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data User App</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="report-it">
                          <input type="hidden" name="id" value="<?= $data['login_id'] ?>" readonly>
                          <div class="form-group">
                            <label for="user_id">Username :</label><br>
                            <input class="form-control" type="text" id="user_id" name="user_id" value="<?= $data['username'] ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="fullname">Fullname :</label><br>
                            <input class="form-control" type="text" id="fullname" name="fullname" value="<?= $data['nama_user'] ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="status">Status :</label><br>
                            <select class="form-control" id="status" name="status" type="text" required>
                              <option value="<?= ($data['status']) ?>"><?= ($data['status']) ?></option>
                              <option value="user">User</option>
                              <option value="admin">Admin</option>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                          <input type="submit" name="edit" class="btn btn-success" value="Edit Data">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Modal NON AKtif 111 -->
              <div class="modal fade" id="aksesModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form action="../../../app/controller/User_app.php" method="post">
                    <div class="modal-content">
                      <div class="modal-header btn btn-success">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Nonaktif User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="report-it">

                          <h6>Apakah Anda ingin menon-aktifkan user atas nama <?= $data['nama_user'] ?> ?</h6>

                          <input type="hidden" name="id" value="<?= $data['login_id'] ?>" readonly>
                          <input type="hidden" id="user_id" name="user_id" value="<?= $data['username'] ?>" readonly>
                          <input type="hidden" id="password" name="password" value="123" readonly>
                          <input class="dept-1" name="role" type="hidden" value="NON AKTIF" readonly>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                          <input type="submit" name="nonaktif_user" class="btn btn-primary" value="Non Aktif">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Modal Reset -->
              <div class="modal fade" id="resetModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form action="../../../app/controller/User_app.php" method="post">
                    <div class="modal-content">
                      <div class="modal-header btn btn-success">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Reset User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="report-it">
                          <input type="hidden" name="id" value="<?= $data['login_id'] ?>" readonly>
                          <h6>Apakah Anda Ingin Mereset Password user atas nama <b> <?= $data['nama_user'] ?> ?</b></h6>
                          <input type="hidden" id="password" name="password" value="123" readonly>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                          <input type="submit" name="reset" class="btn btn-warning" value="Reset">
                        </div>
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


<?php
include '../../../footer.php';
?>