<?php
include '../../../header.php';
// include 'modal.php';
// include 'modal_katagori.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h6><strong>KATAGORI</strong></h6>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="../buku_besar/index">Back</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form action="../../../app/controller/Report.php" method="post">
            <table class="display nowrap" style="width:100%" id="sampleTable">
              <thead>
                <tr class="btn-secondary">
                  <th class="small">NO</th>
                  <th class="small">NAMA KATAGORI</th>
                  <th class="small">ACTION</th>
                </tr>
              </thead>
              <?php
              $data = mysqli_query($koneksi, "SELECT * FROM tb_katagori ORDER BY id_katagori ASC");
              $no = 1;
              while ($d = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td class="small"><?php echo $d['nama_katagori']; ?></td>
                  <td class="d-flex align-items-center">
                    <a href="delete.php?id=<?= $d['id_katagori'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">
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