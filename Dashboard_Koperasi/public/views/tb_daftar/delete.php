<?php
 include '../../../app/config/koneksi.php';
mysqli_query($koneksi, "DELETE FROM tb_daftar WHERE id_daftar ='$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>alert('Data Berhasil di Hapus');window.location='list_daftar.php';</script>";