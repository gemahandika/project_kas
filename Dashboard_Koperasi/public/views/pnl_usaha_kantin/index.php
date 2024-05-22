<?php
include '../../../header.php';
include 'modal.php';
// include 'modal_katagori.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Pnl Usaha Kantin</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile d-flex">
        <form action="index.php" method="get">
          <div class="tile-body d-flex justify-content-start">
            <div class="form-group mr-2">
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
                ?>
                  <option value="<?= $data['nama_kantin'] ?>"><?= $no++; ?>. <?= $data['nama_kantin'] ?></option>
                <?php } ?>
              </select>
            </div>
            <!-- <div class="form-group d-flex flex-wrap"> -->
            <!-- <p><button type="submit" class="btn btn-info icon-btn mr-2 btn-sm"><i class="fa fa-search"></i>Cari</button></p> -->
            <!-- </div> -->
            <!-- </div> -->

            <!-- <div class="tile-body d-flex align-items-center"> -->
            <label class="control-label">Periode : </label>
            <div class="form-group">
              <input class="form-control" type="date" name="dari" value="<?= $date ?>">
            </div>
            <label class="control-label mx-2">-</label>
            <div class="form-group">
              <input class="form-control" type="date" name="ke" value="<?= $date ?>">
            </div>
            <div class="ml-2">
              <button type="submit" name="approve" class="btn btn-primary icon-btn form-group"><i class="fa fa-search"></i>Cari</button>
            </div>
            <label class="ml-2 ">
              <?php
              if (isset($_GET['dari']) && isset($_GET['ke'])) {
                echo "<p>Data Dari Tanggal <span style='color:red; font-weight:bold;'>" . $_GET['dari'] . "</span> s/d <span style='color:red; font-weight:bold;'>" . $_GET['ke'] . "</span></p>";
              } else {
                echo "-";
              }
              ?>
            </label>
            <div class="ml-2 d-flex">
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
          <button type="button" class="btn btn-success icon-btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Add Data </button>
          <form action="../../../app/controller/Usaha_kantin.php" method="post">
            <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
              <thead>
                <tr class="btn-warning">
                  <th class="small">NO</th>
                  <th class="small">NAMA KANTIN</th>
                  <th class="small">PENDAPATAN</th>
                  <th class="small">KOMISI</th>
                  <th class="small">PEMBELIAN</th>
                  <th class="small">KETERANGAN</th>
                  <th class="small">PERIODE</th>
                  <th class="small">ACTION</th>
                </tr>
              </thead>
              <?php
              //jika tanggal dari dan tanggal ke ada maka
              if (isset($_GET['jenis'])) {
                // tampilkan data yang sesuai dengan range tanggal dan jenis buku besar yang dicari
                $data = mysqli_query($koneksi, "SELECT * FROM usaha_kantin WHERE nama_kantin = '" . $_GET['jenis'] . "' ORDER BY id_usaha DESC");
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
                  <td class="small"><?= $d['periode'] ?></td>
                  <td class="d-flex align-items-center">
                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id_usaha'] ?>">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="delete.php?id=<?= $d['id_usaha'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger btn-sm">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
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