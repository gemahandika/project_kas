<?php
require_once "../config/koneksi.php";
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $sumber = trim(mysqli_real_escape_string($koneksi, $_POST['sumber']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
    mysqli_query($koneksi, "INSERT INTO tb_pemasukan (id_pemasukan, tgl_pemasukan, sumber_pemasukan, keterangan, jumlah_pemasukan) 
    VALUES('$id', '$date', '$sumber', '$keterangan','$jumlah')");
    echo "<script>window.location='../../public/views/kas_masuk/';</script>";
}else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    mysqli_query($koneksi, "UPDATE tb_pemasukan SET tgl_pemasukan='$date', keterangan='$keterangan'
    WHERE id_pemasukan='$id'");
    echo "<script>window.location='../../public/views/kas_masuk/';</script>";
}