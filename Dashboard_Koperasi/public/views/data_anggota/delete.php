<?php
include '../../../app/config/koneksi.php';
mysqli_query($koneksi, "DELETE FROM tb_anggota WHERE id_anggota = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>alert('Data Berhasil di Delete');window.location='index_nonaktif.php';</script>";
