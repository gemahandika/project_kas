<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

$allowed_extension = array('png', 'jpg', 'jpeg');
$nama = $_FILES['file']['name'];
$dot = explode('.', $nama);
$ekstensi = strtolower(end($dot));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;
if (in_array($ekstensi, $allowed_extension) === true) {
    if ($ukuran < 15000000) {
        move_uploaded_file($file_tmp, '../assets/img/produk/' . $image);
    } else {
        echo '<script> alert("Ukuran Terlalu Besar") <script>';
    }
} else {
    echo '<script> alert("File Harus png") <script>';
}

if (isset($_POST['tambah_produk'])) {
    $nama_produk = trim(mysqli_real_escape_string($koneksi, $_POST['nama_produk']));

    mysqli_query($koneksi, "INSERT INTO katagori_produk (nama_produk, poto_produk) 
    VALUES('$nama_produk', '$image')");

    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/produk_new/index.php');
}
