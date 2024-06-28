<?php

$data = mysqli_query($koneksi, "SELECT * FROM tb_daftar WHERE generate = 'WAITING' ") or die(mysqli_error($koneksi));
$data_daftar = mysqli_num_rows($data);
