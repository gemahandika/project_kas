<?php
// Ambil nilai tanggal dari form input
$dari = isset($_GET['dari']) ? $_GET['dari'] : '';
$ke = isset($_GET['ke']) ? $_GET['ke'] : '';

// MURABAHAH
$murabahah_query = "SELECT * FROM tb_murabahah WHERE status = 'DAFTAR'";
$murabahah_terima_query = "SELECT * FROM tb_murabahah WHERE status = 'TERIMA'";

// MUDHARABAH
$mudharabah_query = "SELECT * FROM tb_mudharabah WHERE status = 'DAFTAR'";
$mudharabah_terima_query = "SELECT * FROM tb_mudharabah WHERE status = 'TERIMA'";

// TABUNGAN EMAS
$emas_query = "SELECT * FROM tb_emas WHERE status = 'DAFTAR'";
$emas_terima_query = "SELECT * FROM tb_emas WHERE status = 'TERIMA'";

if (!empty($dari) && !empty($ke)) {
    $murabahah_query .= " AND tanggal BETWEEN '$dari' AND '$ke'";
    $murabahah_terima_query .= " AND tanggal BETWEEN '$dari' AND '$ke'";
    $mudharabah_query .= " AND tanggal BETWEEN '$dari' AND '$ke'";
    $mudharabah_terima_query .= " AND tanggal BETWEEN '$dari' AND '$ke'";
    $emas_query .= " AND tanggal BETWEEN '$dari' AND '$ke'";
    $emas_terima_query .= " AND tanggal BETWEEN '$dari' AND '$ke'";
}

$data = mysqli_query($koneksi, $murabahah_query) or die(mysqli_error($koneksi));
$daftar_murabahah = mysqli_num_rows($data);

$data1 = mysqli_query($koneksi, $murabahah_terima_query) or die(mysqli_error($koneksi));
$terima_murabahah = mysqli_num_rows($data1);

$data2 = mysqli_query($koneksi, $mudharabah_query) or die(mysqli_error($koneksi));
$daftar_mudharabah = mysqli_num_rows($data2);

$data3 = mysqli_query($koneksi, $mudharabah_terima_query) or die(mysqli_error($koneksi));
$terima_mudharabah = mysqli_num_rows($data3);

$data4 = mysqli_query($koneksi, $emas_query) or die(mysqli_error($koneksi));
$daftar_emas = mysqli_num_rows($data4);

$data5 = mysqli_query($koneksi, $emas_terima_query) or die(mysqli_error($koneksi));
$terima_emas = mysqli_num_rows($data5);
