<?php
include '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
// include 'modal.php';
// include 'modal_edit.php';
include '../../../app/config/koneksi.php';

?>
<style>
  @media (max-width: 768px) {
    .tile-body {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  }
</style>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Data Transaksi</h1>
      <p>Table Transaksi Iuran Anggota</p>
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
          <div class="tile-body d-flex align-items-center">
            <label class="control-label">Periode : </label>
            <div class="form-group">
              <input class="form-control" type="date" name="dari" value="<?= $date ?>">
            </div>
            <label class="control-label mx-2">-</label>
            <div class="form-group">
              <input class="form-control" type="date" name="ke" value="<?= $date ?>">
            </div>
            <div class="ml-2">
              <button type="submit" name="approve" class="btn btn-info icon-btn form-group"><i class="fa fa-search"></i>Cari</button>
            </div>
            <p><a href="index.php?>" class="btn btn-secondary ml-1"><i class="fa fa-refresh" aria-hidden="true"></i></a></p>
            <label class="ml-2 ">
              <?php
              if (isset($_GET['dari']) && isset($_GET['ke'])) {
                echo "<p>Data Dari Tanggal " . $_GET['dari'] . " s/d " . $_GET['ke'] . "</p>";
              } else {
                echo "-";
              }
              ?>
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form action="../../../app/controller/Buku_besar.php" method="post">
            <table class="table table-hover table-bordered table-responsive-sm" id="sampleTable">
              <thead>
                <tr class="btn-info">
                  <th class="small">NO</th>
                  <th class="small">NIP</th>
                  <th class="small">NAMA ANGGOTA</th>
                  <th class="small">JENIS TRANSAKSI</th>
                  <th class="small">JUMLAH</th>
                  <th class="small">KETERANGAN</th>
                  <th class="small">TANGGAL </th>
                  <th class="small">ACTION </th>
                </tr>
              </thead>
              <?php
              //jika tanggal dari dan tanggal ke ada maka
              if (isset($_GET['dari']) && isset($_GET['ke'])) {
                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                $data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE tgl_transaksi BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "'");
                $pemasukan = 0;
              } else {
                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                $data = mysqli_query($koneksi, "select * from tb_transaksi");
                $pemasukan = 0;
              }
              // $no digunakan sebagai penomoran 
              $no = 1;
              // while digunakan sebagai perulangan data 
              while ($d = mysqli_fetch_array($data)) {
                $pemasukan += $d['jumlah_transaksi'];
              ?>

                <tr>
                  <td class="small"><?= $no++ ?></td>
                  <td class="small"><?= $d['nip'] ?></td>
                  <td class="small"><?= $d['nama_anggota'] ?></td>
                  <td class="small"><?= $d['jenis_transaksi'] ?></td>
                  <td class="small"><?= $d['jumlah_transaksi'] ?></td>
                  <td class="small"><?= $d['keterangan'] ?></td>
                  <td class="small"><?= $d['tgl_transaksi'] ?></td>
                  <td class="d-flex">
                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id_transaksi'] ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                      <a href="delete.php?id=<?= $d['id_transaksi'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } ?>
                  </td>
                </tr>

              <?php } ?>
              <div class="tile-body d-flex flex-wrap align-items-center mt-2">
                <label class="control-label mx-2">Total :</label>
                <div class="form-group">
                  <input class="form-control" type="text" name="pemasukan" value="<?= $pemasukan ?>">
                </div>
                <label class="control-label mx-2">Keterangan :</label>
                <div class="form-group">
                  <input class="form-control" type="text" name="keterangan" required>
                </div>
                <input type="hidden" name="jenis" value="SIMPANAN ANGGOTA" required readonly>
                <input type="hidden" name="kredit" value=0 required readonly>
                <input type="hidden" name="date" value=<?= $date ?> required readonly>
                <div class="ml-2">
                  <button type="submit" name="post_bukubesar" class="btn btn-danger icon-btn form-group">Post ke Buku Besar </button>
                </div>
              </div>
          </form>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include '../../../footer.php'; ?>