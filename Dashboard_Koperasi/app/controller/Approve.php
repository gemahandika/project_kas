<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['approve'])) {
    for ($i = 0; $i < count($_POST['nik']); $i++) {
        $nik = $_POST['nik'][$i];
        $saldo = trim(mysqli_real_escape_string($koneksi, $_POST['saldo'][$i]));
        mysqli_query($koneksi, "UPDATE tb_anggota SET saldo = $saldo WHERE nip= '$nik'");

        // $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nik'][$i]));
        $nama_anggota = trim(mysqli_real_escape_string($koneksi, $_POST['nama_anggota'][$i]));
        // $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang'][$i]));
        $jenis_transaksi = trim(mysqli_real_escape_string($koneksi, $_POST['jenis_transaksi'][$i]));
        $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah_transaksi'][$i]));
        $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan'][$i]));
        $date_sekarang = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
        $status = trim(mysqli_real_escape_string($koneksi, $_POST['status'][$i]));

        mysqli_query($koneksi, "UPDATE tb_tagihan SET status = '$status' WHERE nik= '$nik'");

        mysqli_query($koneksi, "INSERT INTO tb_transaksi ( nip, nama_anggota, jenis_transaksi, jumlah_transaksi, keterangan, tgl_transaksi) 
        VALUES('$nik','$nama_anggota','$jenis_transaksi','$jumlah','$keterangan','$date_sekarang')");
        // Masukan data ke table History
        mysqli_query($koneksi, "INSERT INTO tb_history (nama, nik, tanggal, nominal, keterangan) 
            VALUES('$nama_anggota', '$nik', '$date_sekarang', $jumlah, '$keterangan')");
    }
    showSweetAlert('success', 'Sukses', 'Iuran Berhasil di tambah', '#3085d6', $tujuan);

    //proses input satu data 
}
