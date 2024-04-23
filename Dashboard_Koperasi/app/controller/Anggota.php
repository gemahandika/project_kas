<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add'])) {
    $pemasukan = trim(mysqli_real_escape_string($koneksi, $_POST['pemasukan']));
    $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip']));
    $join_date = trim(mysqli_real_escape_string($koneksi, $_POST['join_date']));
    $nama_anggota = trim(mysqli_real_escape_string($koneksi, $_POST['nama_anggota']));
    $divisi = trim(mysqli_real_escape_string($koneksi, $_POST['divisi']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $saldo = trim(mysqli_real_escape_string($koneksi, $_POST['saldo']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $pass = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $status_user = trim(mysqli_real_escape_string($koneksi, $_POST['status_user']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_anggota WHERE nip = '$nip'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', $tujuan);
    } else {
        // Masukan data ke tabel anggota
        mysqli_query($koneksi, "INSERT INTO tb_anggota ( nip, join_date, nama_anggota, divisi, cabang, saldo, status) 
    VALUES( '$nip', '$join_date', '$nama_anggota', '$divisi', '$cabang',$saldo,'$status')");
        // Masukan data ke table transaksi
        mysqli_query($koneksi, "INSERT INTO tb_transaksi (nip, nama_anggota, jenis_transaksi, jumlah_transaksi, keterangan, tgl_transaksi) 
    VALUES('$nip', '$nama_anggota', '$pemasukan', $saldo, '$keterangan', '$join_date')");
        //  Masukan data ke table User Aplikasi
        mysqli_query($koneksi, "INSERT INTO user (nip, nama_user, username, password, status) 
    VALUES('$nip', '$nama_anggota', '$nip', '$pass', '$status_user')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', $tujuan);
    }
} else if (isset($_POST['add_daftar'])) {
    $pemasukan = trim(mysqli_real_escape_string($koneksi, $_POST['pemasukan']));
    $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip']));
    $join_date = trim(mysqli_real_escape_string($koneksi, $_POST['join_date']));
    $nama_anggota = trim(mysqli_real_escape_string($koneksi, $_POST['nama_anggota']));
    $divisi = trim(mysqli_real_escape_string($koneksi, $_POST['divisi']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $saldo = trim(mysqli_real_escape_string($koneksi, $_POST['saldo']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $pass = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $status_user = trim(mysqli_real_escape_string($koneksi, $_POST['status_user']));
    $id_daftar = trim(mysqli_real_escape_string($koneksi, $_POST['id_daftar']));
    $status_daftar = trim(mysqli_real_escape_string($koneksi, $_POST['status_daftar']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_anggota WHERE nip = '$nip'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', $tujuan_2);
    } else {
        // Masukan data ke tabel anggota
        mysqli_query($koneksi, "INSERT INTO tb_anggota ( nip, join_date, nama_anggota, divisi, cabang, saldo, status) 
    VALUES( '$nip', '$join_date', '$nama_anggota', '$divisi', '$cabang',$saldo,'$status')");
        // Masukan data ke table transaksi
        mysqli_query($koneksi, "INSERT INTO tb_transaksi (nip, nama_anggota, jenis_transaksi, jumlah_transaksi, keterangan, tgl_transaksi) 
    VALUES('$nip', '$nama_anggota', '$pemasukan', $saldo, '$keterangan', '$join_date')");
        // Update status tb daftar
        mysqli_query($koneksi, "UPDATE tb_daftar SET status_daftar='$status_daftar' WHERE id_daftar='$id_daftar'");
        //  Masukan data ke table User Aplikasi
        mysqli_query($koneksi, "INSERT INTO user (nip, nama_user, username, password, status) 
    VALUES('$nip', '$nama_anggota', '$nip', '$pass', '$status_user')");
        showSweetAlert('success', 'Success', $pesan_ok, '#3085d6', $tujuan_2);
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip']));
    $join_date = trim(mysqli_real_escape_string($koneksi, $_POST['join_date']));
    $nama_anggota = trim(mysqli_real_escape_string($koneksi, $_POST['nama_anggota']));
    $divisi = trim(mysqli_real_escape_string($koneksi, $_POST['divisi']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $saldo = trim(mysqli_real_escape_string($koneksi, $_POST['saldo']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    mysqli_query($koneksi, "UPDATE tb_anggota SET nip='$nip', join_date='$join_date', nama_anggota='$nama_anggota', divisi='$divisi', cabang='$cabang', saldo='$saldo',
    status='$status' WHERE id_anggota='$id'");
    mysqli_query($koneksi, "UPDATE user SET nama_user='$nama_anggota' WHERE nip='$nip'");
    mysqli_query($koneksi, "UPDATE user SET nip='$nip' WHERE nama_user='$nama_anggota'");
    showSweetAlert('success', 'Success', $pesan_update, '#3085d6', $tujuan);
} else if (isset($_POST['ambil'])) {
    $id = $_POST['id'];
    $saldo_update = trim(mysqli_real_escape_string($koneksi, $_POST['saldo_update']));

    $jenis_bukubesar = trim(mysqli_real_escape_string($koneksi, $_POST['jenis_bukubesar']));
    $tgl_bukubesar = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_bukubesar']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $debit_bukubesar = trim(mysqli_real_escape_string($koneksi, $_POST['debit_bukubesar']));
    $kredit_bukubesar = trim(mysqli_real_escape_string($koneksi, $_POST['kredit_bukubesar']));

    mysqli_query($koneksi, "UPDATE tb_anggota SET saldo='$saldo_update' WHERE id_anggota='$id'");
    // Masukan data ke table bukubesar
    mysqli_query($koneksi, "INSERT INTO tb_bukubesar(jenis_bukubesar, tgl_bukubesar, keterangan, debit_bukubesar, kredit_bukubesar) 
    VALUES('$jenis_bukubesar', '$tgl_bukubesar', '$keterangan', '$debit_bukubesar', '$kredit_bukubesar')");
    showSweetAlert('success', 'Success', $pesan_ambil, '#3085d6', $tujuan_3);
}
