<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['add'])) {
    $tgl_daftar = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_daftar']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $status_karyawan = trim(mysqli_real_escape_string($koneksi, $_POST['status_karyawan']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $syarat = trim(mysqli_real_escape_string($koneksi, $_POST['syarat']));
  
    

    // Masukan data ke tabel anggota
    mysqli_query($koneksi, "INSERT INTO tb_daftar ( nama_daftar, alamat_daftar, nik_daftar, unit_daftar, hp_daftar, syarat_daftar, tgl_daftar, status_daftar,status_karyawan) 
    VALUES( '$nama', '$alamat', '$nik', '$unit', '$phone','$syarat','$tgl_daftar','$status','$status_karyawan')");
    // Masukan data ke table transaksi

    showSweetAlert('success', 'Sukses', 'Data Berhasil DI kirim', '#3085d6', '../../../');
    }
