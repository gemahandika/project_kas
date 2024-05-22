<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";
if (isset($_POST['approve'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $id = $_POST['id'][$i];
        $saldo = trim(mysqli_real_escape_string($koneksi, $_POST['saldo'][$i]));
        mysqli_query($koneksi, "UPDATE tb_anggota SET saldo = $saldo WHERE id_anggota = '$id'");

        $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip'][$i]));
        $nama_anggota = trim(mysqli_real_escape_string($koneksi, $_POST['nama_anggota'][$i]));
        // $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang'][$i]));
        $jenis_transaksi = trim(mysqli_real_escape_string($koneksi, $_POST['jenis_transaksi'][$i]));
        $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah_transaksi'][$i]));
        $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan'][$i]));
        $date_sekarang = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

        mysqli_query($koneksi, "INSERT INTO tb_transaksi ( nip, nama_anggota, jenis_transaksi, jumlah_transaksi, keterangan, tgl_transaksi) 
        VALUES('$nip','$nama_anggota','$jenis_transaksi','$jumlah','$keterangan','$date_sekarang')");
    }
    showSweetAlert('success', 'Sukses', 'Iuran Berhasil di tambah', '#3085d6', $tujuan);

    //proses input satu data 
}
