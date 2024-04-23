<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['add'])) {
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $debit = trim(mysqli_real_escape_string($koneksi, $_POST['debit']));
    $kredit = trim(mysqli_real_escape_string($koneksi, $_POST['kredit']));
    mysqli_query($koneksi, "INSERT INTO tb_bukubesar (jenis_bukubesar, tgl_bukubesar, keterangan, debit_bukubesar, kredit_bukubesar) 
    VALUES('$jenis', '$tanggal', '$keterangan', '$debit', '$kredit')");
   showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/buku_besar/');
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $debit = trim(mysqli_real_escape_string($koneksi, $_POST['debit']));
    $kredit = trim(mysqli_real_escape_string($koneksi, $_POST['kredit']));

    mysqli_query($koneksi, "UPDATE tb_bukubesar SET jenis_bukubesar='$jenis', tgl_bukubesar='$tanggal', keterangan='$keterangan', debit_bukubesar='$debit', kredit_bukubesar='$kredit'
    WHERE id_bukubesar='$id'");
     showSweetAlert('success', 'Sukses', $pesan_update, '#ffc107', '../../public/views/buku_besar/');
   
} else if (isset($_POST['add_katagori'])) {
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $katagori = trim(mysqli_real_escape_string($koneksi, $_POST['katagori']));
    $ket = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $debit = trim(mysqli_real_escape_string($koneksi, $_POST['debit']));
    $kredit = trim(mysqli_real_escape_string($koneksi, $_POST['kredit']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    mysqli_query($koneksi, "INSERT INTO tb_katagori (nama_katagori) 
    VALUES('$katagori')");
    mysqli_query($koneksi, "INSERT INTO tb_report (tgl_report, nama_report, keterangan, debit_report, kredit_report, status ) 
    VALUES('$date','$katagori','$ket','$debit','$kredit','$status')");
    echo "<script>alert('Katagori Berhasil di Tambah');window.location='../../public/views/buku_besar/';</script>";
} else if (isset($_POST['post_bukubesar'])) {
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $debit = trim(mysqli_real_escape_string($koneksi, $_POST['pemasukan']));
    $ket = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $kredit = trim(mysqli_real_escape_string($koneksi, $_POST['kredit']));

    mysqli_query($koneksi, "INSERT INTO tb_bukubesar (jenis_bukubesar, tgl_bukubesar, keterangan, debit_bukubesar, kredit_bukubesar) 
    VALUES('$jenis','$date','$ket','$debit','$kredit')");
    echo "<script>alert('Data Iuran Berhasil di Tambah');window.location='../../public/views/buku_besar/';</script>";
}
