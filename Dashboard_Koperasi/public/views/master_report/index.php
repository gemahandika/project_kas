<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-file-text-o"></i> Master Report</h1>
      <p>Table Report</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="tile-body d-flex justify-content-start">
            <p><a href="export.php" class="btn btn-danger mr-2"><i class="fa fa-download" aria-hidden="true"></i>Download</a></p>
            <p><a href="index.php ?>" class="btn btn-secondary ">Refresh</a></p>
          </div>
          <form method="post" name="proses">
            <table class="display nowrap" style="width:100%" id="sampleTable">
              <thead>
                <tr class="btn-secondary">
                  <?php if (in_array("super_admin", $_SESSION['admin_akses']) && in_array("admin", $_SESSION['admin_akses'])) { ?>
                    <th class="small">ACTION</th>
                  <?php } ?>
                  <th class="small">NO</th>
                  <th class="small">TANGGAL</th>
                  <th class="small">NAMA REPORT</th>
                  <th class="small">KETERANGAN</th>
                  <th class="small">DEBIT</th>
                  <th class="small">KREDIT </th>
                  <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                    <th class="small">ACTION </th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_report WHERE status='aktif' ORDER BY id_report ASC") or die(mysqli_error($koneksi));
                $result = array();
                while ($data = mysqli_fetch_array($sql)) {
                  $result[] = $data;
                }
                foreach ($result as $data) {
                  $no++;
                ?>
                  <tr>
                    <?php if (in_array("super_admin", $_SESSION['admin_akses']) && in_array("admin", $_SESSION['admin_akses'])) { ?>
                      <td>
                        <a href="#" class="btn btn-danger btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $data['id_report'] ?>">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                      </td>
                    <?php } ?>
                    <td class="small"><?= $no ?></td>
                    <td class="small"><?= $data['tgl_report'] ?></td>
                    <td class="small"><?= $data['nama_report'] ?></td>
                    <td class="small"><?= $data['keterangan'] ?></td>
                    <td class="small text-right"><?= number_format($data['debit_report']) ?></td>
                    <td class="small text-right"><?= number_format($data['kredit_report']) ?></td>
                    <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                      <td class="d-flex align-items-center">
                        <a href="#" class="btn btn-info btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_report'] ?>">Update</a>
                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                          <a href="delete.php?id=<?= $data['id_report'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <?php } ?>
                      </td>
                    <?php } ?>
                  </tr>
          </form>
          <!-- Modal Edit -->
          <div class="modal fade" id="editModal<?= $data['id_report'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="../../../app/controller/Master_report.php" method="post">
                <div class="modal-content">
                  <div class="modal-header btn btn-info">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Update Data Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php
                    $nama = $data['nama_report'];
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_bukubesar WHERE jenis_bukubesar = '$nama'") or die(mysqli_error($koneksi));
                    $simpanan3 = 0;
                    $simpanan4 = 0;
                    $result = array();
                    while ($data_in = mysqli_fetch_array($sql)) {
                      $simpanan3 += $data_in['debit_bukubesar'];
                      $simpanan4 += $data_in['kredit_bukubesar'];
                    }
                    ?>
                    <div class="report-it">
                      <input type="hidden" name="id" value="<?= $data['id_report'] ?>">
                      <input type="hidden" id="nama" name="nama" value="<?= $data['nama_report'] ?>">
                      <input type="hidden" id="date" name="date" value="<?= $data['tgl_report'] ?>">
                      <input type="hidden" id="debit" name="debit" value="<?= $simpanan3 ?>">
                      <input type="hidden" id="kredit" name="kredit" value="<?= $simpanan4 ?>">
                      <h6>Apakah Ingin Update Data <b><?= $data['nama_report'] ?></b> ? </h6>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="update" class="btn btn-info" id="demoNotify" value="Update">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Modal Nonaktif -->
          <div class="modal fade" id="hapusModal<?= $data['id_report'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="../../../app/controller/Master_report.php" method="post">
                <div class="modal-content">
                  <div class="modal-header btn btn-danger">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Report</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="report-it">
                      <input type="hidden" name="id" value="<?= $data['id_report'] ?>">
                      <input type="hidden" name="status" value="nonaktif">
                      <h6>Apakah Ingin Menghapus Data <b><?= $data['nama_report'] ?></b> ? </h6>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <input type="submit" name="nonaktif" class="btn btn-danger" value="Hapus">
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

<?php include '../../../footer.php'; ?>