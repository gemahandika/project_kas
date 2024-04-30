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
        <form action="index.php" method="get">
          <div class="tile-body d-flex justify-content-start">
            <div class="form-group mr-2">
              <select class="form-control btn-sm" id="jenis" name="jenis" required>
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
            <div class="form-group d-flex flex-wrap">
              <p><button type="submit" class="btn btn-info icon-btn mr-2 btn-sm"><i class="fa fa-search"></i>Cari</button></p>
              <p><button type="button" class="btn btn-success icon-btn mr-2 btn-sm" data-bs-toggle="modal" data-bs-target="#katagoriModal"><i class="fa fa-plus"></i>Add Data Katagori </button></p>
              <p><a href="../tb_katagori/index.php" class="btn btn-secondary btn-sm mr-2"><i class="fa fa-database" aria-hidden="true"></i>Katagori</a></p>
              <p><a href="index.php?>" class="btn btn-secondary btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i></a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <button type="button" class="btn btn-primary icon-btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Add Data </button>
          <form action="../../../app/controller/Report.php" method="post">
            <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
              <thead>
                <tr class="btn-secondary">
                  <th class="small">NO</th>
                  <th class="small">JUDUL INFORMASI</th>
                  <th class="small">ISI INFORMASI</th>
                  <th class="small">TANGGAL</th>
                  <th class="small">PHOTO</th>
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
                                    $img1 = '<img src="../../../app/assets/img/bukti_transfer/' . $gambar . '" class="zoomable" style="width: 100%; height: 100%; ">';
                                    $img = '<img src="../../../app/assets/img/bukti_transfer/' . $gambar . '" class="zoomable">';
                                }
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td class="small"><?= $data['nama_notif'] ?></td>
                  <td class="small"><?= $data['isi_notif'] ?></td>
                  <td class="small"><?= $data['tgl_notif'] ?></td>
                  <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal<?= $data['id_notif'] ?>">Cek Photo</a></td>
                  <td class="d-flex align-items-center">
                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_notif'] ?>">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="delete.php?id=<?= $data['id_notif'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                  </td>

                </tr>
          </form>
          <!-- Modal image -->
                    <div class="modal fade" id="imageModal<?= $data['id_notif'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-dark">
                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Detail Photo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <h1><?= $img1 ?></h1>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                    </div>
          <!-- Modal Edit -->
          <div class="modal fade" id="editModal<?= $d['id_bukubesar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="../../../app/controller/Buku_besar.php" method="post">
                <div class="modal-content">
                  <div class="modal-header btn btn-info">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="report-it">
                      <input type="hidden" name="id" value="<?= $d['id_bukubesar'] ?>">
                      <div class="form-group">
                        <label for="jenis">Jenis Transaksi :</label><br>
                        <input class="form-control" type="text" id="jenis" name="jenis" value="<?= $d['jenis_bukubesar'] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal :</label><br>
                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $d['tgl_bukubesar'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan :</label><br>
                        <input class="form-control" type="text" id="keterangan" name="keterangan" value="<?= $d['keterangan'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="debit">Debit :</label><br>
                        <input class="form-control" type="text" id="debit" name="debit" value="<?= $d['debit_bukubesar'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="kredit">Kredit :</label><br>
                        <input class="form-control" type="text" id="kredit" name="kredit" value="<?= $d['kredit_bukubesar'] ?>">
                      </div>
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