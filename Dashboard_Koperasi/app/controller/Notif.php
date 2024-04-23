<?php
require_once "../config/koneksi.php";
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $judul = trim(mysqli_real_escape_string($koneksi, $_POST['judul']));
    $isi = trim(mysqli_real_escape_string($koneksi, $_POST['isi']));
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));

    mysqli_query($koneksi, "INSERT INTO tb_notif (id_notif, nama_notif, isi_notif, tgl_notif) 
    VALUES('$id', '$judul', '$isi', '$date')");
    echo "<script>window.location='../../public/views/notif/';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $sumber = trim(mysqli_real_escape_string($koneksi, $_POST['sumber']));
    $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
    $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip']));
    mysqli_query($koneksi, "UPDATE tb_pemasukan SET tgl_pemasukan='$date', sumber_pemasukan='$sumber', jumlah_pemasukan='$jumlah' 
    WHERE id_pemasukan='$id'");
    mysqli_query($koneksi, "UPDATE tb_anggota SET saldo ='$jumlah'
    WHERE nip='$nip'");
    echo "<script>window.location='../../public/views/kas_masuk/';</script>";
}
