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
        move_uploaded_file($file_tmp, '../assets/img/bukti_transfer/' . $image);
    } else {
        echo '<script> alert("Ukuran Terlalu Besar") <script>';
    }
} else {
    echo '<script> alert("File Harus png") <script>';
}

if (isset($_POST['add'])) {
    $nama_transfer = trim(mysqli_real_escape_string($koneksi, $_POST['nama_transfer']));
    $nip_transfer = trim(mysqli_real_escape_string($koneksi, $_POST['nip_transfer']));
    $tgl_transfer = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_transfer']));
    $nominal_transfer = trim(mysqli_real_escape_string($koneksi, $_POST['nominal_transfer']));
    $status_transfer = trim(mysqli_real_escape_string($koneksi, $_POST['status_transfer']));
    $file = trim(mysqli_real_escape_string($koneksi, $_POST['file']));

    mysqli_query($koneksi, "INSERT INTO tb_transfer (nama_transfer, nip_transfer, tgl_transfer, nominal_transfer, status_transfer, file_transfer) 
    VALUES('$nama_transfer', '$nip_transfer', '$tgl_transfer', '$nominal_transfer', '$status_transfer', '$image')");

    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/tb_transfer/list_data.php');
    
}
