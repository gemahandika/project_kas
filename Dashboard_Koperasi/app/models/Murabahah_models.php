<?php
// MURABAHAH
$data = mysqli_query($koneksi, "SELECT * FROM tb_murabahah WHERE status = 'DAFTAR' ") or die(mysqli_error($koneksi));
$daftar_murabahah = mysqli_num_rows($data);
$data1 = mysqli_query($koneksi, "SELECT * FROM tb_murabahah WHERE status = 'TERIMA' ") or die(mysqli_error($koneksi));
$terima_murabahah = mysqli_num_rows($data1);
// MUDHARABAH
$data2 = mysqli_query($koneksi, "SELECT * FROM tb_mudharabah WHERE status = 'DAFTAR' ") or die(mysqli_error($koneksi));
$daftar_mudharabah = mysqli_num_rows($data2);
$data3 = mysqli_query($koneksi, "SELECT * FROM tb_mudharabah WHERE status = 'TERIMA' ") or die(mysqli_error($koneksi));
$terima_mudharabah = mysqli_num_rows($data3);
// TABUNGAN EMAS
$data4 = mysqli_query($koneksi, "SELECT * FROM tb_emas WHERE status = 'DAFTAR' ") or die(mysqli_error($koneksi));
$daftar_emas = mysqli_num_rows($data4);
$data5 = mysqli_query($koneksi, "SELECT * FROM tb_emas WHERE status = 'TERIMA' ") or die(mysqli_error($koneksi));
$terima_emas = mysqli_num_rows($data5);
