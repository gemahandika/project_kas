<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['add'])) {
    $setuju = trim(mysqli_real_escape_string($koneksi, $_POST['setuju']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $hp = trim(mysqli_real_escape_string($koneksi, $_POST['hp']));
    $tgl = trim(mysqli_real_escape_string($koneksi, $_POST['tgl']));
    $syarat = isset($_POST['syarat']) ? $_POST['syarat'] : 'Tidak Setuju';
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status_daftar']));

    // Masukan data ke tabel anggota
    mysqli_query($koneksi, "INSERT INTO tb_daftar ( nama_daftar, alamat_daftar, nik_daftar, unit_daftar, hp_daftar, syarat_daftar, tgl_daftar, status_daftar) 
    VALUES( '$nama', '$alamat', '$nik', '$unit', '$hp','$syarat','$tgl','$status')");
    // Masukan data ke table transaksi

    showSweetAlert('success', 'Sukses', 'Data Berhasil DI kirim', '#3085d6', '../../../');
    }
