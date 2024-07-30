<?php
include '../../../header.php';
// include 'modal.php';
// include 'modal_katagori.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h6><strong>INFORMASI</strong></h6>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <a href="add" type="button" class="btn btn-success mr-2">Create</a>
          <form action="../../../app/controller/Report.php" method="post">
            <table class="display nowrap" style="width:100%" id="sampleTable">
              <thead>
                <tr class="btn-success">
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
                  <td class="small"><a href="edit.php?id=<?= $data['id_notif'] ?>" class="btn btn-primary btn-sm">Detail Informasi</a></td>
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