<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['add'])) {
    $tgl_report = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_report']));
    $nama_report = trim(mysqli_real_escape_string($koneksi, $_POST['nama_report']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $debit_report = trim(mysqli_real_escape_string($koneksi, $_POST['debit_report']));
    $kredit_report = trim(mysqli_real_escape_string($koneksi, $_POST['kredit_report']));
    mysqli_query($koneksi, "INSERT INTO tb_report ( tgl_report, nama_report, keterangan, debit_report, kredit_report) 
    VALUES( '$tgl_report', '$nama_report', '$keterangan', '$debit_report', '$kredit_report')");
     showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/master_report/');
    
} else if (isset($_POST['update'])) {
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $debit = trim(mysqli_real_escape_string($koneksi, $_POST['debit']));
    $kredit = trim(mysqli_real_escape_string($koneksi, $_POST['kredit']));
    mysqli_query($koneksi, "UPDATE tb_report SET tgl_report='$date', debit_report='$debit', kredit_report='$kredit'
    WHERE nama_report='$nama'");
    showSweetAlert('success', 'Success', $pesan_update, '#ffc107','../../public/views/master_report/');
    
} else if (isset($_POST['nonaktif'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    mysqli_query($koneksi, "UPDATE tb_report SET status='$status' WHERE id_report='$id'");
     showSweetAlert('success', 'Success', 'User Berhasil di Non Aktifkan', '#dc3545','../../public/views/master_report/');
    
}
