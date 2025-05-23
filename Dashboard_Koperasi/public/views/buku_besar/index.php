<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include 'modal.php';
include 'modal_katagori.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h6><strong>BUKU BESAR</strong></h6>
    </div>
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
              <p><button type="submit" class="btn btn-info mr-2"><i class="fa fa-search"></i>Cari</button></p>
              <p><button type="button" class="btn btn-info mr-2 " data-bs-toggle="modal" data-bs-target="#katagoriModal"><i class="fa fa-plus"></i>Tambah Katagori </button></p>
              <p><a href="../tb_katagori/index" class="btn btn-secondary mr-2"><i class="fa fa-database" aria-hidden="true"></i>Katagori</a></p>
              <p><a href="index.php?>" class="btn btn-secondary"><i class="fa fa-refresh" aria-hidden="true"></i></a></p>
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
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data </button>
          <form action="../../../app/controller/Report.php" method="post">
            <table class="display nowrap" style="width:100%" id="sampleTable">
              <thead>
                <tr class="btn-info">
                  <th class="small">NO</th>
                  <th class="small">KATAGORI</th>
                  <th class="small">TANGGAL</th>
                  <th class="small">KETERANGAN</th>
                  <th class="small">DEBIT</th>
                  <th class="small">KREDIT</th>
                  <th class="small">ACTION </th>
                </tr>
              </thead>
              <?php
              //jika tanggal dari dan tanggal ke ada maka
              if (isset($_GET['jenis'])) {
                // tampilkan data yang sesuai dengan range tanggal dan jenis buku besar yang dicari
                $data = mysqli_query($koneksi, "SELECT * FROM tb_bukubesar WHERE jenis_bukubesar = '" . $_GET['jenis'] . "' ORDER BY id_bukubesar DESC");
              } else {
                // jika tidak ada parameter tanggal dan jenis, tampilkan seluruh data
                $data = mysqli_query($koneksi, "SELECT * FROM tb_bukubesar ORDER BY id_bukubesar DESC");
              }

              // $no digunakan sebagai penomoran 
              $no = 1;
              // while digunakan sebagai perulangan data 
              while ($d = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td class="small"><?= $d['jenis_bukubesar'] ?></td>
                  <td class="small"><?= $d['tgl_bukubesar'] ?></td>
                  <td class="small"><?= $d['keterangan'] ?></td>
                  <td class="small"><?php echo number_format($d['debit_bukubesar']);  ?></td>
                  <td class="small"><?php echo number_format($d['kredit_bukubesar']); ?></td>
                  <td class="d-flex align-items-center">
                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id_bukubesar'] ?>">
                      Edit
                    </a>
                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                      <a href="delete.php?id=<?= $d['id_bukubesar'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    <?php } ?>
                  </td>

                </tr>
          </form>
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