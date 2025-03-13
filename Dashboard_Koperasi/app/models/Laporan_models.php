<?php
// ================================================================================================================================================================
// Definisikan variabel saldo dan data_saldo_user
$pendapatan = 0;
$beban = 0;
$result = array();

// Cek apakah tanggal dari dan ke sudah di-set
if (isset($_GET['tahun'])) {
    $tahun = $_GET['tahun'];

    // Query untuk mendapatkan data anggota dalam rentang tanggal yang ditentukan
    $sql = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '1' AND tahun = '$tahun' ") or die(mysqli_error($koneksi));

    // Query untuk mendapatkan data transaksi dalam rentang tanggal yang ditentukan
    $data = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '2' AND tahun = '$tahun' ") or die(mysqli_error($koneksi));
} else {
    // Query untuk mendapatkan semua data anggota jika tanggal tidak di-set
    $sql = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '1' ") or die(mysqli_error($koneksi));

    // Query untuk mendapatkan semua data transaksi jika tanggal tidak di-set
    $data = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '2' ") or die(mysqli_error($koneksi));
}

// Hitung total saldo dari tb_anggota
while ($data_in = mysqli_fetch_array($sql)) {
    $pendapatan += $data_in['nominal'];
    $result[] = $data_in;
}

// Hitung total saldo transaksi dari tb_transaksi
while ($d = mysqli_fetch_array($data)) {
    $beban += $d['nominal'];
}

// Jumlahkan hasil kedua kueri tersebut
$sisa_hasil = $pendapatan - $beban;
