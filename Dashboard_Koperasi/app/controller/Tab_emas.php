<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_emas'])) {
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nik_perusahaan = trim(mysqli_real_escape_string($koneksi, $_POST['nik_perusahaan']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $berat_emas = trim(mysqli_real_escape_string($koneksi, $_POST['berat_emas']));
    $lama_tab = trim(mysqli_real_escape_string($koneksi, $_POST['lama_tab']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    // Masukan data ke tabel murabahah
    mysqli_query($koneksi, "INSERT INTO tb_emas ( nama, nik, nik_perusahaan, alamat, phone, berat_emas, lama_tab, tanggal, status) 
    VALUES( '$nama', '$nik', '$nik_perusahaan', '$alamat', '$phone' , '$berat_emas' , '$lama_tab' , '$tanggal','$status')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/produk/daftar_emas.php');
} else if (isset($_POST['terima_emas'])) {

    $id_emas = trim(mysqli_real_escape_string($koneksi, $_POST['id_emas']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_emas SET status='$status' WHERE id_emas='$id_emas'");
    showSweetAlert('success', 'Success', 'Anggota Berhasil di Daftarkan', '#3085d6', '../../public/views/produk/index_emas.php');
} else if (isset($_POST['tolak_emas'])) {
    $id_emas = trim(mysqli_real_escape_string($koneksi, $_POST['id_emas']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_emas SET status='$status' WHERE id_emas='$id_emas'");
    showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Tolak', '#dc3545', '../../public/views/produk/index_emas.php');
} else if (isset($_POST['edit_emas'])) {
    $id_emas = trim(mysqli_real_escape_string($koneksi, $_POST['id_emas']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $berat_emas = trim(mysqli_real_escape_string($koneksi, $_POST['berat_emas']));
    $lama_tab = trim(mysqli_real_escape_string($koneksi, $_POST['lama_tab']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

    mysqli_query($koneksi, "UPDATE tb_emas SET alamat='$alamat', phone='$phone', berat_emas='$berat_emas', lama_tab='$lama_tab', tanggal='$tanggal' WHERE id_emas='$id_emas'");
    showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Update', '#3085d6', '../../public/views/produk/data_emas.php');
}
