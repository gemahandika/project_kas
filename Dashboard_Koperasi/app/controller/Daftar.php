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
    $generate = trim(mysqli_real_escape_string($koneksi, $_POST['generate']));


    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_daftar WHERE nik_daftar = '$nik'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', 'Anda Sudah Pernah Daftar !!', '#3085d6', '../../public/views/tb_daftar/index');
    } else {
        // Masukan data ke tabel anggota
        mysqli_query($koneksi, "INSERT INTO tb_daftar ( nama_daftar, alamat_daftar, nik_daftar, unit_daftar, hp_daftar, syarat_daftar, tgl_daftar, status_daftar,status_karyawan, generate) 
        VALUES( '$nama', '$alamat', '$nik', '$unit', '$phone','$syarat','$tgl_daftar','$status','$status_karyawan','$generate')");

        showSweetAlert('success', 'Sukses', 'Data Berhasil DI kirim', '#3085d6', '../../../');
    }
} else if (isset($_POST['tolak_daftar'])) {
    $id_daftar = trim(mysqli_real_escape_string($koneksi, $_POST['id_daftar']));
    $join_date = trim(mysqli_real_escape_string($koneksi, $_POST['join_date']));
    $generate = trim(mysqli_real_escape_string($koneksi, $_POST['generate']));

    // Update data ke tabel Daftar
    mysqli_query($koneksi, "UPDATE tb_daftar SET generate='$generate' WHERE id_daftar='$id_daftar'");

    showSweetAlert('success', 'Berhasil', 'Data Berhasil DI Tolak', '#d63030', '../../public/views/tb_daftar/list_daftar.php');
}
