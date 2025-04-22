<?php
$pendapatan = 0;
$beban = 0;
$result = array();

$sql = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '1' AND keterangan = 'AKTIF' ") or die(mysqli_error($koneksi));
// Hitung total saldo dari tb_anggota
while ($data_in = mysqli_fetch_array($sql)) {
    $pendapatan += $data_in['nominal'];
    $result[] = $data_in;
}

$data = mysqli_query($koneksi, "SELECT * FROM laporan_koperasi WHERE jenis_laporan = '2' AND keterangan = 'AKTIF' ") or die(mysqli_error($koneksi));
while ($d = mysqli_fetch_array($data)) {
    $beban += $d['nominal'];
}

// Jumlahkan hasil kedua kueri tersebut
$sisa_hasil = $pendapatan - $beban;
