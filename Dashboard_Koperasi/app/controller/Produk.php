<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_murabahah'])) {
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $warna = trim(mysqli_real_escape_string($koneksi, $_POST['warna']));
    $harga = trim(mysqli_real_escape_string($koneksi, $_POST['harga']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_murabahah WHERE nik = '$nik'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/produk/index_murabahah.php');
    } else {
        // Masukan data ke tabel murabahah
        mysqli_query($koneksi, "INSERT INTO tb_murabahah ( nama, nik, unit, alamat, tanggal, nama_barang, jenis, warna, harga, status) 
    VALUES( '$nama', '$nik', '$unit', '$alamat', '$tanggal','$nama_barang','$jenis','$warna', $harga,'$status')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/produk/daftar_murabahah.php');
    }
} else if (isset($_POST['terima_murabahah'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_murabahah SET status='$status' WHERE nik='$nik'");
    showSweetAlert('success', 'Success', 'Anggota Berhasil di Daftarkan', '#3085d6', '../../public/views/produk/index_murabahah.php');
} else if (isset($_POST['tolak_murabahah'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_murabahah SET status='$status' WHERE nik='$nik'");
    showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Tolak', '#dc3545', '../../public/views/produk/index_murabahah.php');
} else if (isset($_POST['edit_murabahah'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $warna = trim(mysqli_real_escape_string($koneksi, $_POST['warna']));
    $harga = trim(mysqli_real_escape_string($koneksi, $_POST['harga']));

    mysqli_query($koneksi, "UPDATE tb_murabahah SET unit='$unit', alamat='$alamat', tanggal='$tanggal', nama_barang='$nama_barang', jenis='$jenis', warna='$warna' , harga=$harga WHERE nik='$nik'");
    showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Update', '#3085d6', '../../public/views/produk/data_murabahah.php');
}
