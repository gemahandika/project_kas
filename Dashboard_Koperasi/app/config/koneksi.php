<?php
// setting default timezone
date_default_timezone_set('Asia/Jakarta');


// koneksi database public
// $koneksi = mysqli_connect('localhost', 'u568977811_kreasi', 'KopKas2024', 'u568977811_kreasi');
// if (mysqli_connect_errno()) {
// 	echo mysqli_connect_error();
// }

// // koneksi database Local
$koneksi = mysqli_connect('localhost', 'root', '', 'u568977811_kreasi');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
