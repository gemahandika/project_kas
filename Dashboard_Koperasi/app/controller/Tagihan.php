<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['add'])) {
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    // Masukan data ke tabel anggota
    mysqli_query($koneksi, "UPDATE tb_tagihan SET status='$status' WHERE keterangan='$keterangan'");
    // Masukan data ke table transaksi

    showSweetAlert('success', 'Sukses', 'Tagihan Berhasil Dibuat', '#3085d6', '../../public/views/tb_tagihan/');
}
