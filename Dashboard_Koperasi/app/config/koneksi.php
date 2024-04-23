<?php
// setting default timezone
date_default_timezone_set('Asia/Jakarta');


// koneksi database
$koneksi = mysqli_connect('localhost', 'u568977811_kreasi', 'KopKas2024', 'u568977811_kreasi');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
