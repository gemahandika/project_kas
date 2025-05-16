<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include 'modal.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h6><strong>USAHA KANTIN</strong></h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <form action="index" method="get">
          <div class="tile-body">
            <div class="row align-items-center">
              <div class="col-12 col-md-3 mb-2">
                <label class="control-label"><strong>Katagori :</strong></label>
                <div class="form-group">
                  <select class="form-control btn-sm" id="jenis" name="jenis" required>
                    <option value="">- Pilih Katagori -</option>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_kantin") or die(mysqli_error($koneksi));
                    $result = array();
                    while ($data = mysqli_fetch_array($sql)) {
                      $result[] = $data;
                    }
                    foreach ($result as $data) {
                      $selected = isset($_GET['jenis']) && $_GET['jenis'] == $data['nama_kantin'] ? 'selected' : '';
                    ?>
                      <option value="<?= $data['nama_kantin'] ?>" <?= $selected ?>><?= $no++; ?>. <?= $data['nama_kantin'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-12 col-md-2 mb-2">
                <label class="control-label"><strong>Date From :</strong></label>
                <div class="form-group">
                  <input class="form-control" type="date" name="dari" value="<?= isset($_GET['dari']) ? $_GET['dari'] : '' ?>" required>
                </div>
              </div>

              <div class="col-12 col-md-2 mb-2">
                <label class="control-label"><strong>Date Thru :</strong></label>
                <div class="form-group">
                  <input class="form-control" type="date" name="ke" value="<?= isset($_GET['dari']) ? $_GET['dari'] : '' ?>" required>
                </div>
              </div>

              <div class="col-12 col-md-1 mt-4">
                <button type="submit" name="approve" class="btn btn-info form-group"><i class="fa fa-search"></i> Cari</button>
              </div>
              <div class="col-12 col-md-2 mb-3 d-flex justify-content-between mt-4">
                <a href="data_kantin" class="btn btn-secondary"><i class="fa fa-database" aria-hidden="true"></i> Kantin</a>
                <a href="index?>" class="btn btn-secondary ml-1"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
              </div>
              <div class="col-12 col-md-2 mb-2 mt-4">
                <label>
                  <?php
                  if (isset($_GET['dari']) && isset($_GET['ke'])) {
                    echo "<p>Periode :  <span style='color:red; font-weight:bold;'>" . $_GET['dari'] . "</span> s/d <span style='color:red; font-weight:bold;'>" . $_GET['ke'] . "</span></p>";
                  } else {
                    echo "-";
                  }
                  ?>
                </label>
              </div>
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
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Add Data </button>
          <table class="display nowrap" style="width:100%" id="sampleTable">
            <thead>
              <tr class="btn-info">
                <th class="small">NO</th>
                <th class="small">NAMA KANTIN</th>
                <th class="small">PENDAPATAN</th>
                <th class="small">KOMISI</th>
                <th class="small">PEMBELIAN</th>
                <th class="small">KETERANGAN</th>
                <th class="small">TANGGAL</th>
                <th class="small">ACTION</th>
              </tr>
            </thead>
            <?php
            //jika tanggal dari dan tanggal ke ada maka
            if (isset($_GET['jenis'])) {
              // tampilkan data yang sesuai dengan range tanggal dan jenis buku besar yang dicari
              $data = mysqli_query($koneksi, "SELECT * FROM usaha_kantin WHERE nama_kantin = '" . $_GET['jenis'] . "' AND date BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "' ORDER BY id_usaha DESC");
              // $data = mysqli_query($koneksi, "SELECT * FROM usaha_kantin WHERE nama_kantin = '" . $_GET['jenis'] . "' AND tgl_transaksi BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "' ORDER BY id_usaha DESC");
            } else {
              // jika tidak ada parameter tanggal dan jenis, tampilkan seluruh data
              $data = mysqli_query($koneksi, "SELECT * FROM usaha_kantin ORDER BY id_usaha DESC");
            }

            // $no digunakan sebagai penomoran 
            $no = 1;
            // while digunakan sebagai perulangan data 
            while ($d = mysqli_fetch_array($data)) {
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td class="small"><?= $d['nama_kantin'] ?></td>
                <td class="small"><?php echo number_format($d['pendapatan']) ?></td>
                <td class="small"><?php echo number_format($d['komisi']) ?></td>
                <td class="small"><?php echo number_format($d['pembelian']);  ?></td>
                <td class="small"><?= $d['keterangan']; ?></td>
                <td class="small"><?= $d['date'] ?></td>
                <td class="d-flex align-items-center">
                  <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id_usaha'] ?>">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                  <?php } ?>
                  <a href="delete.php?id=<?= $d['id_usaha'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                </td>

              </tr>
              <!-- Modal Edit -->
              <div class="modal fade" id="editModal<?= $d['id_usaha'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form action="../../../app/controller/Usaha_kantin.php" method="post">
                    <div class="modal-content">
                      <div class="modal-header btn btn-info">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="report-it">
                          <input type="hidden" name="id" value="<?= $d['id_usaha'] ?>">
                          <div class="form-group">
                            <label for="pendapatan">Pendapatan :</label><br>
                            <input class="form-control" type="number" id="pendapatan" name="pendapatan" value="<?= $d['pendapatan'] ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="komisi">Komisi :</label><br>
                            <input class="form-control" type="number" id="komisi" name="komisi" value="<?= $d['komisi'] ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="pembelian">Pembelian :</label><br>
                            <input class="form-control" type="number" id="pembelian" name="pembelian" value="<?= $d['pembelian'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="keterangan">Keterangan :</label><br>
                            <input class="form-control" type="text" id="keterangan" name="keterangan" value="<?= $d['keterangan'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="date">Tanggal :</label><br>
                            <input class="form-control" type="date" id="date" name="date" value="<?= $d['date'] ?>">
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