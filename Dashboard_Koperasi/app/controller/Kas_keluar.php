<?php
require_once "../config/koneksi.php";
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
    mysqli_query($koneksi, "INSERT INTO tb_pengeluaran (id_pengeluaran, tgl_pengeluaran, keterangan, jumlah_pengeluaran) 
    VALUES('$id', '$date', '$keterangan', '$jumlah')");
    echo "<script>window.location='../../public/views/kas_keluar/';</script>";
}else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
    mysqli_query($koneksi, "UPDATE tb_pengeluaran SET tgl_pengeluaran='$date', keterangan='$keterangan', jumlah_pengeluaran='$jumlah' 
    WHERE id_pengeluaran='$id'");
    echo "<script>window.location='../../public/views/kas_keluar/';</script>";
}