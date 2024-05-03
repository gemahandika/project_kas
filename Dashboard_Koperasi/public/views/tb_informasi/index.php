<?php
include '../../../header.php';
// include 'modal.php';
// include 'modal_katagori.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-info"></i> Information</h1>
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
          <div class="form-group mr-2 ">
          <a href="add.php" type="button" class="btn btn-primary mr-2">Create</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form action="../../../app/controller/Report.php" method="post">
            <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
              <thead>
                <tr class="btn-secondary">
                  <th class="small">NO</th>
                  <th class="small">JUDUL INFORMASI</th>
                  <th class="small">ISI INFORMASI</th>
                  <th class="small">TANGGAL</th>
                  <th class="small">ACTION </th>
                </tr>
              </thead>
              <?php
              $no = 0;
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_notif ORDER BY id_notif DESC") or die(mysqli_error($koneksi));
              $result = array();
              while ($data = mysqli_fetch_array($sql)) {
                $result[] = $data;
              }
              foreach ($result as $data) {
                $no++;
                $gambar = $data['image'];
                  if ($gambar == null) {
                  $img1 = 'No Photo';
                } else {
                  $img = '<img src="../../../app/assets/img/img_notif/' . $gambar . '" class="zoomable">';
                }
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td class="small"><?= $data['nama_notif'] ?></td>
                  <td class="small"><a href="edit.php?id=<?= $data['id_notif'] ?>" class="btn btn-success btn-sm">Detail Informasi</a></td>
                  <td class="small"><?= $data['tgl_notif'] ?></td>
                  <td class="d-flex align-items-center">
                    <a href="delete.php?id=<?= $data['id_notif'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
            </form>
        <?php } ?>
        </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include '../../../footer.php'; ?>