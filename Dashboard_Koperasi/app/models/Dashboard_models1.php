<?php
if (isset($_GET['dari']) && isset($_GET['ke'])) {
  $sql1 = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status 'AKTIF' AND join_date BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "'") or die(mysqli_error($koneksi));
  $jumlah_data3 = mysqli_num_rows($sql1);
} else {
  $sql1 = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status 'AKTIF'") or die(mysqli_error($koneksi));
  $jumlah_data3 = mysqli_num_rows($sql1);
}
// ================================================================================================================================================================
// Definisikan variabel saldo dan data_saldo_user
$saldo = 0;
$data_saldo_user = 0;
$result = array();

// Cek apakah tanggal dari dan ke sudah di-set
if (isset($_GET['dari']) && isset($_GET['ke'])) {
  $dari = $_GET['dari'];
  $ke = $_GET['ke'];

  // Query untuk mendapatkan data anggota dalam rentang tanggal yang ditentukan
  $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE join_date BETWEEN '$dari' AND '$ke'") or die(mysqli_error($koneksi));

  // Query untuk mendapatkan data transaksi dalam rentang tanggal yang ditentukan
  $data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE tgl_transaksi BETWEEN '$dari' AND '$ke'") or die(mysqli_error($koneksi));
} else {
  // Query untuk mendapatkan semua data anggota jika tanggal tidak di-set
  $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota ") or die(mysqli_error($koneksi));

  // Query untuk mendapatkan semua data transaksi jika tanggal tidak di-set
  $data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi ") or die(mysqli_error($koneksi));
}

// Hitung total saldo dari tb_anggota
while ($data_in = mysqli_fetch_array($sql)) {
  $saldo += $data_in['saldo'];
  $result[] = $data_in;
}

// Hitung total saldo transaksi dari tb_transaksi
while ($d = mysqli_fetch_array($data)) {
  $data_saldo_user += $d['jumlah_transaksi'];
}

// Jumlahkan hasil kedua kueri tersebut
$total_saldo = $saldo + $data_saldo_user;



// =================================================================================================================================

$dari = isset($_GET['dari']) ? $_GET['dari'] : '';
$ke = isset($_GET['ke']) ? $_GET['ke'] : '';

$where_clause = "";
if ($dari != '' && $ke != '') {
  $where_clause = "AND join_date BETWEEN '$dari' AND '$ke'";
}

// Query untuk mengambil data dari database
$sql = "SELECT 'cabang' AS cabang, COUNT(*) AS total FROM tb_anggota WHERE cabang = 'CABANG' $where_clause
        UNION 
        SELECT 'karyawan' AS cabang, COUNT(*) AS total FROM tb_anggota WHERE cabang = 'KARYAWAN' $where_clause
        UNION 
        SELECT 'agen' AS cabang, COUNT(*) AS total FROM tb_anggota WHERE cabang = 'AGEN' $where_clause";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
  die("Query gagal: " . mysqli_error($koneksi));
}

// Siapkan array untuk menyimpan data dinamis
$pdata = array();

// Loop melalui hasil query dan tambahkan data ke array $pdata
while ($row = mysqli_fetch_assoc($result)) {
  $cabang = $row['cabang'];
  $total = $row['total'];

  // Tentukan warna berdasarkan status
  $color = '';
  if ($cabang == 'cabang') {
    $color = '#FDB45C';
  } elseif ($cabang == 'karyawan') {
    $color = '#46BFBD';
  } elseif ($cabang == 'agen') {
    $color = '#F7464A';
  }

  // Tambahkan data ke array $pdata
  $pdata[] = [
    'value' => $total,
    'color' => $color,
    'highlight' => '#5AD3D9', // Highlight color tetap sama untuk semua
    'label' => ucfirst($cabang) // Menggunakan ucfirst() untuk membuat huruf pertama dari status menjadi kapital
  ];
}

// Konversi array $pdata menjadi format JSON
$json_data = json_encode($pdata);

$karyawan = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE cabang = 'karyawan' $where_clause") or die(mysqli_error($koneksi));
$jumlah_karyawan = mysqli_num_rows($karyawan);
$cabang = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE cabang = 'cabang' $where_clause") or die(mysqli_error($koneksi));
$jumlah_cabang = mysqli_num_rows($cabang);
$agen = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE cabang = 'agen' $where_clause") or die(mysqli_error($koneksi));
$jumlah_agen = mysqli_num_rows($agen);

// ==================================================================================================

// INI CHART LINE UNTUK USAHA
function getAllKantinData($koneksi)
{
  $datasets = array();
  $date_condition = "";

  // Tetapkan tanggal default jika tidak ada tanggal yang diberikan
  if (isset($_GET['dari']) && isset($_GET['ke'])) {
    $start_date = $_GET['dari'];
    $end_date = $_GET['ke'];
    $date_condition = "WHERE date BETWEEN '$start_date' AND '$end_date'";
  }

  // Ambil semua nama kantin dari database
  $result = mysqli_query($koneksi, "SELECT DISTINCT nama_kantin FROM usaha_kantin") or die(mysqli_error($koneksi));

  while ($row = mysqli_fetch_assoc($result)) {
    $nama_kantin = $row['nama_kantin'];

    // Inisialisasi array data kosong untuk setiap kantin
    $data = array();

    // Ambil semua bulan yang mungkin dalam rentang waktu yang relevan
    $result_bulan = mysqli_query($koneksi, "SELECT DISTINCT DATE_FORMAT(date, '%Y-%m') AS bulan FROM usaha_kantin $date_condition") or die(mysqli_error($koneksi));
    $bulan_mungkin = array();
    while ($row_bulan = mysqli_fetch_assoc($result_bulan)) {
      $bulan_mungkin[] = $row_bulan['bulan'];
    }

    // Ambil data dari database untuk kantin tertentu dalam rentang tanggal yang diberikan
    $sql_query = "SELECT DATE_FORMAT(date, '%Y-%m') AS bulan, SUM(pendapatan) AS total_pendapatan FROM usaha_kantin WHERE nama_kantin='$nama_kantin'";
    if ($date_condition != "") {
      $sql_query .= " AND date BETWEEN '$start_date' AND '$end_date'";
    }
    $sql_query .= " GROUP BY bulan";

    $sql = mysqli_query($koneksi, $sql_query) or die(mysqli_error($koneksi));

    // Buat array data untuk kantin saat ini
    while ($inner_row = mysqli_fetch_assoc($sql)) {
      $data[$inner_row['bulan']] = $inner_row['total_pendapatan'];
    }

    // Cek setiap bulan yang mungkin dan tambahkan data ke array data
    foreach ($bulan_mungkin as $bulan) {
      if (!isset($data[$bulan])) {
        // Jika tidak ada data untuk bulan ini, tambahkan entri dengan nilai 0
        $data[$bulan] = 0;
      }
    }

    // Sort array data berdasarkan kunci (periode)
    ksort($data);

    // Ubah format bulan dari 'YYYY-MM' menjadi nama bulan
    $data_labels = array_map(function ($bulan) {
      return date("F", strtotime($bulan));
    }, array_keys($data));

    // Pisahkan nilai (pendapatan) dari array data
    $data_values = array_values($data);

    // Tambahkan data ke dalam datasets
    $datasets[] = array(
      'label' => $nama_kantin,
      'data_labels' => $data_labels,
      'data_values' => $data_values
    );
  }

  return $datasets;
}

// Panggil fungsi untuk mengambil data dari database untuk semua kantin
$datasets = getAllKantinData($koneksi);

// Convert $datasets ke dalam format JSON
$json_datasets = json_encode($datasets);

// ===========================================================================================//


// BAR CHART 
// Fungsi untuk mengambil data dari database
function getDataForBarChart($koneksi, $dari = '', $ke = '')
{
  $data = array();

  // Menambahkan klausa WHERE jika rentang tanggal diberikan
  $where_clause = "";
  if ($dari != '' && $ke != '') {
    $where_clause = "WHERE join_date BETWEEN '$dari' AND '$ke'";
  }

  // Query untuk mengambil jumlah anggota yang bergabung pada setiap bulan tahun
  $query = "SELECT DATE_FORMAT(join_date, '%Y-%m') AS bulan, COUNT(*) AS jumlah_anggota FROM tb_anggota $where_clause GROUP BY DATE_FORMAT(join_date, '%Y-%m')";
  $result = mysqli_query($koneksi, $query);

  // Memproses hasil query
  while ($row = mysqli_fetch_assoc($result)) {
    $bulan = $row['bulan'];
    $jumlah_anggota = $row['jumlah_anggota'];

    // Menambahkan data ke dalam array
    $data[] = array(
      'bulan' => $bulan,
      'jumlah_anggota' => $jumlah_anggota
    );
  }

  return $data;
}

// Mengambil parameter dari form (jika ada)
$dari = isset($_GET['dari']) ? $_GET['dari'] : '';
$ke = isset($_GET['ke']) ? $_GET['ke'] : '';

// Panggil fungsi untuk mendapatkan data
$data_anggota = getDataForBarChart($koneksi, $dari, $ke);

// Convert data ke dalam format JSON
$json_data_anggota = json_encode($data_anggota);



// =============================================================================================================================


$data_pemasukan = mysqli_query($koneksi, "SELECT tgl_transaksi, SUM(jumlah_transaksi) AS jumlah_transaksi FROM tb_transaksi WHERE jenis_transaksi = 'pemasukan' GROUP BY tgl_transaksi");
$data_tanggal = array();
$data_total = array();

while ($data = mysqli_fetch_array($data_pemasukan)) {
  $data_tanggal[] = date('d-m-Y', strtotime($data['tgl_transaksi'])); // Memasukan tanggal ke dalam array
  $data_total[] = $data['jumlah_transaksi']; // Memasukan total ke dalam array
}

$data_pengeluaran = mysqli_query($koneksi, "SELECT tgl_transaksi, SUM(jumlah_transaksi) AS jumlah_transaksi FROM tb_transaksi WHERE jenis_transaksi = 'pengeluaran' GROUP BY tgl_transaksi ");
$data_tanggal1 = array();
$data_total1 = array();

while ($data = mysqli_fetch_array($data_pengeluaran)) {
  $data_tanggal1[] = date('d-m-Y', strtotime($data['tgl_transaksi'])); // Memasukan tanggal ke dalam array
  $data_total1[] = $data['nominal_transaksi']; // Memasukan total ke dalam array
}


// Table Transaksi
$sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE jenis_transaksi = 'pemasukan' ORDER BY id_transaksi DESC") or die(mysqli_error($koneksi));
$pemasukan = 0;
$result = array();
while ($data_in = mysqli_fetch_array($sql)) {
  $pemasukan += $data_in['jumlah_transaksi'];
  $result[] = $data;
}

$sql2 = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE jenis_transaksi = 'pengeluaran' ORDER BY id_transaksi DESC") or die(mysqli_error($koneksi));
$pengeluaran = 0;
$result = array();
while ($data_out = mysqli_fetch_array($sql2)) {
  $pengeluaran += $data_out['jumlah_transaksi'];
  $result[] = $data;
}
$jumlah_transaksi = $pemasukan - $pengeluaran;



// master report debit

$sql = mysqli_query($koneksi, "SELECT * FROM tb_report") or die(mysqli_error($koneksi));
$debit = '0';
$result = array();
while ($data_in = mysqli_fetch_array($sql)) {
  $debit += $data_in['debit_report'];
}

// master report kredit
$sql = mysqli_query($koneksi, "SELECT * FROM tb_report") or die(mysqli_error($koneksi));
$kredit = 0;
$result = array();
while ($data_in = mysqli_fetch_array($sql)) {
  $kredit += $data_in['kredit_report'];
  $result[] = $data;
}

// Tagihan ==============================================================================================================================

if (isset($_GET['dari']) && isset($_GET['ke'])) {
  $dari = mysqli_real_escape_string($koneksi, $_GET['dari']);
  $ke = mysqli_real_escape_string($koneksi, $_GET['ke']);

  // Validasi tanggal agar format sesuai
  if (validateDate($dari) && validateDate($ke)) {
    $query = "SELECT * FROM tb_tagihan WHERE nik = '$data2' AND status = 'OTS' AND tanggal BETWEEN '$dari' AND '$ke'";
    $query_all = "SELECT * FROM tb_tagihan WHERE status = 'OTS' AND tanggal BETWEEN '$dari' AND '$ke'";
  } else {
    die("Format tanggal tidak valid.");
  }
} else {
  $query = "SELECT * FROM tb_tagihan WHERE nik = '$data2' AND status = 'OTS'";
  $query_all = "SELECT * FROM tb_tagihan WHERE status = 'OTS'";
}

$sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
$tagihan = 0;
$tagihan_all = 0;
$result = array();

while ($data_in = mysqli_fetch_assoc($sql)) { // Menggunakan fetch_assoc untuk performa lebih baik
  $tagihan += $data_in['jumlah_tagihan'];
  $result[] = $data_in;
}

// Query untuk menghitung tagihan_all
$sql_all = mysqli_query($koneksi, $query_all) or die(mysqli_error($koneksi));
while ($data_in_all = mysqli_fetch_assoc($sql_all)) {
  $tagihan_all += $data_in_all['jumlah_tagihan'];
}

// Fungsi validasi tanggal
function validateDate($date, $format = 'Y-m-d')
{
  $d = DateTime::createFromFormat($format, $date);
  return $d && $d->format($format) === $date;
}
