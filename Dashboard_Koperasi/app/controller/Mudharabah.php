<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_mudharabah'])) {
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_mudharabah WHERE nik = '$nik'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/produk/index_mudharabah.php');
    } else {
        // Masukan data ke tabel murabahah
        mysqli_query($koneksi, "INSERT INTO tb_mudharabah ( nama, nik, alamat, phone, tanggal, status) 
    VALUES( '$nama', '$nik', '$alamat', '$phone' , '$tanggal','$status')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/produk/daftar_mudharabah.php');
    }
} else if (isset($_POST['terima_mudharabah'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_mudharabah SET status='$status' WHERE nik='$nik'");
    showSweetAlert('success', 'Success', 'Anggota Berhasil di Daftarkan', '#3085d6', '../../public/views/produk/index_mudharabah.php');
} else if (isset($_POST['tolak_mudharabah'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_mudharabah SET status='$status' WHERE nik='$nik'");
    showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Tolak', '#dc3545', '../../public/views/produk/index_mudharabah.php');
} else if (isset($_POST['edit_mudharabah'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

    mysqli_query($koneksi, "UPDATE tb_mudharabah SET alamat='$alamat', phone='$phone', tanggal='$tanggal' WHERE nik='$nik'");
    showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Update', '#3085d6', '../../public/views/produk/data_mudharabah.php');
}
