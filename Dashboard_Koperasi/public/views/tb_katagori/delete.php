<?php
include '../../../app/config/koneksi.php';

mysqli_query($koneksi, "DELETE FROM tb_katagori WHERE id_katagori = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>alert('Data Berhasil di Hapus');window.location='index.php';</script>";
