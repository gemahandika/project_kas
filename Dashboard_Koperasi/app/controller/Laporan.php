<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_laporan'])) {
    $nama_laporan = trim(mysqli_real_escape_string($koneksi, $_POST['nama_laporan']));
    $nominal = trim(mysqli_real_escape_string($koneksi, $_POST['nominal']));
    $jenis_laporan = trim(mysqli_real_escape_string($koneksi, $_POST['jenis_laporan']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    mysqli_query($koneksi, "INSERT INTO laporan_koperasi (nama_laporan, jenis_laporan, nominal, keterangan) 
    VALUES('$nama_laporan', '$jenis_laporan', $nominal, '$keterangan')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/laporan_koperasi/index.php');
} elseif (isset($_POST['edit_laporan'])) {
    $id_laporan = $_POST['id'];
    $nama_laporan = trim(mysqli_real_escape_string($koneksi, $_POST['nama_laporan']));
    $nominal = trim(mysqli_real_escape_string($koneksi, $_POST['nominal']));
    $nominal = str_replace(',', '', $nominal); // Menghapus tanda koma
    $nominal = floatval($nominal); //konfersi menjadi decimal
    mysqli_query($koneksi, "UPDATE laporan_koperasi SET nama_laporan='$nama_laporan' , nominal=$nominal WHERE id_laporan='$id_laporan'");
    showSweetAlert('success', 'Sukses', 'Data berhasil Di Update', '#3085d6', '../../public/views/laporan_koperasi/index.php');
} elseif (isset($_POST['nonaktif_laporan'])) {
    $id_laporan = $_POST['id'];
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    mysqli_query($koneksi, "UPDATE laporan_koperasi SET keterangan='$keterangan' WHERE id_laporan='$id_laporan'");
    showSweetAlert('success', 'Done', 'Data berhasil Di Hapus', ' #ff0000', '../../public/views/laporan_koperasi/index.php');
}
