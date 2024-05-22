<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['add'])) {
    $nama_kantin = trim(mysqli_real_escape_string($koneksi, $_POST['nama_kantin']));
    $pendapatan = trim(mysqli_real_escape_string($koneksi, $_POST['pendapatan']));
    $komisi = trim(mysqli_real_escape_string($koneksi, $_POST['komisi']));
    $pembelian = trim(mysqli_real_escape_string($koneksi, $_POST['pembelian']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

    // Masukan data ke tabel anggota
    mysqli_query($koneksi, "INSERT INTO usaha_kantin ( nama_kantin, pendapatan, komisi, pembelian, keterangan, periode) 
    VALUES( '$nama_kantin', '$pendapatan', '$komisi', '$pembelian', '$keterangan','$tanggal')");
    // Masukan data ke table transaksi

    showSweetAlert('success', 'Sukses', 'Data Berhasil DI kirim', '#3085d6', '../../public/views/pnl_usaha_kantin/');
}
