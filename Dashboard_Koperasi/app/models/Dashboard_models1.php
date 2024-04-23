<?php
$sql1 = mysqli_query($koneksi, "SELECT * FROM tb_anggota ") or die(mysqli_error($koneksi));
$jumlah_data3 = mysqli_num_rows($sql1);

$data_pemasukan = mysqli_query($koneksi, "SELECT tgl_transaksi, SUM(jumlah_transaksi) AS jumlah_transaksi FROM tb_transaksi WHERE jenis_transaksi = 'pemasukan' GROUP BY tgl_transaksi");
$data_tanggal = array();
$data_total = array();

while ($data = mysqli_fetch_array($data_pemasukan)) {
  $data_tanggal[] = date('d-m-Y', strtotime($data['tgl_transaksi'])); // Memasukan tanggal ke dalam array
  $data_total[] = $data['jumlah_transaksi']; // Memasukan total ke dalam array
}

$data_pengeluaran = mysqli_query($koneksi, "SELECT tgl_transaksi, SUM(jumlah_transaksi) AS jumlah_transaksi FROM tb_transaksi WHERE jenis_transaksi = 'pengeluaran' GROUP BY tgl_transaksi  ");
$data_tanggal1 = array();
$data_total1 = array();

while ($data = mysqli_fetch_array($data_pengeluaran)) {
  $data_tanggal1[] = date('d-m-Y', strtotime($data['tgl_transaksi'])); // Memasukan tanggal ke dalam array
  $data_total1[] = $data['nominal_transaksi']; // Memasukan total ke dalam array
}


// Table Transaksi
$sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi  WHERE jenis_transaksi = 'pemasukan' ORDER BY id_transaksi DESC") or die(mysqli_error($koneksi));
$pemasukan = 0;
$result = array();
while ($data_in = mysqli_fetch_array($sql)) {
  $pemasukan += $data_in['jumlah_transaksi'];
  $result[] = $data;
}

$sql2 = mysqli_query($koneksi, "SELECT * FROM tb_transaksi  WHERE jenis_transaksi = 'pengeluaran' ORDER BY id_transaksi DESC") or die(mysqli_error($koneksi));
$pengeluaran = 0;
$result = array();
while ($data_out = mysqli_fetch_array($sql2)) {
  $pengeluaran += $data_out['jumlah_transaksi'];
  $result[] = $data;
}
$jumlah_transaksi = $pemasukan - $pengeluaran;

// tb_saldo
$sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota") or die(mysqli_error($koneksi));
$saldo = 0;
$result = array();
while ($data_in = mysqli_fetch_array($sql)) {
  $saldo += $data_in['saldo'];
  $result[] = $data;
}

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
