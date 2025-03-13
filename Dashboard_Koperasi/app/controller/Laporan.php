<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_laporan'])) {
    $nama_laporan = trim(mysqli_real_escape_string($koneksi, $_POST['nama_laporan']));
    $jenis_laporan = trim(mysqli_real_escape_string($koneksi, $_POST['jenis_laporan']));
    $nominal = trim(mysqli_real_escape_string($koneksi, $_POST['nominal']));
    $tahun = trim(mysqli_real_escape_string($koneksi, $_POST['tahun']));
    mysqli_query($koneksi, "INSERT INTO laporan_koperasi (nama_laporan, jenis_laporan, nominal, tahun) 
    VALUES('$nama_laporan', '$jenis_laporan', $nominal, '$tahun')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/laporan_koperasi/index.php');
}
