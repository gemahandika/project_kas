<?php
session_name("kas_session");
session_start();
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
      <h6><strong>DATA TRANSAKSI</strong></h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <form action="index" method="get">
          <div class="tile-body d-flex align-items-center">
            <label class="control-label"><strong>Periode : </strong></label>
            <div class="form-group ml-2">
              <input class="form-control" type="date" name="dari" value="<?= $date ?>">
            </div>
            <label class="control-label mx-2"><strong>-</strong></label>
            <div class="form-group">
              <input class="form-control" type="date" name="ke" value="<?= $date ?>">
            </div>
            <div class="ml-2">
              <button type="submit" name="approve" class="btn btn-info form-group"><i class="fa fa-search"></i>Cari</button>
            </div>
            <p><a href="index" class="btn btn-secondary ml-1">Refresh</a></p>
            <label class="ml-2 ">
              <?php
              if (isset($_GET['dari']) && isset($_GET['ke'])) {
                echo "<p>Data Dari Tanggal <span style='color:red; font-weight:bold;'>" . $_GET['dari'] . " </span> s/d <span style='color:red; font-weight:bold;'> " . $_GET['ke'] . "</p>";
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
          <form id="myForm" action="../../../app/controller/Buku_besar.php" method="post">
            <table class="display nowrap" style="width:100%" id="sampleTable">
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
                $data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE tgl_transaksi BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "' ORDER BY id_transaksi DESC ");
                $pemasukan = 0;
              } else {
                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                $data = mysqli_query($koneksi, "select * from tb_transaksi ORDER BY id_transaksi DESC");
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
                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $d['id_transaksi'] ?>">Edit</a>
                    <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                      <a href="delete.php?id=<?= $d['id_transaksi'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } ?>
                  </td>
                </tr>

              <?php } ?>
              <div class="tile-body d-flex flex-wrap align-items-center mt-2">
                <label class="control-label mx-2"><strong>TOTAL :</strong></label>
                <div class="form-group">
                  <input class="form-control" type="text" name="pemasukan" id="pemasukan"
                    value="<?= $pemasukan ?>" onfocus="removeFormat(this)" onblur="formatAngka(this)">
                </div>
                <label class="control-label mx-2"><strong>Keterangan :</strong></label>
                <div class="form-group">
                  <input class="form-control" type="text" name="keterangan" required>
                </div>
                <input type="hidden" name="jenis" value="SIMPANAN ANGGOTA" required readonly>
                <input type="hidden" name="kredit" value=0 required readonly>
                <input type="hidden" name="date" value=<?= $date ?> required readonly>
                <div class="ml-2">
                  <button type="submit" name="post_bukubesar" class="btn btn-danger form-group">Post ke Buku Besar </button>
                </div>
              </div>
          </form>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  function formatAngka(element) {
    let value = element.value.replace(/\./g, '').replace(/\D/g, ''); // Hapus titik & karakter non-angka
    if (value) {
      element.value = new Intl.NumberFormat('id-ID').format(value); // Format angka dengan titik ribuan
    }
  }

  function removeFormat(element) {
    element.value = element.value.replace(/\./g, ''); // Hapus titik saat input mendapat fokus
  }

  // Otomatis format saat halaman dimuat
  window.onload = function() {
    let pemasukanInput = document.getElementById("pemasukan");
    if (pemasukanInput.value) {
      formatAngka(pemasukanInput);
    }
  };

  // Bersihkan format sebelum data dikirim
  document.getElementById("myForm").addEventListener("submit", function() {
    let pemasukanInput = document.getElementById("pemasukan");
    pemasukanInput.value = pemasukanInput.value.replace(/\./g, ''); // Hapus titik sebelum dikirim
  });
</script>

<?php include '../../../footer.php'; ?>