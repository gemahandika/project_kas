<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

// Memastikan file yang diunggah tersedia
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['file']['name'];
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;
    if (in_array($ekstensi, $allowed_extension) === true) {
        if ($ukuran < 15000000) {
            move_uploaded_file($file_tmp, '../assets/img/img_notif/' . $image);
        } else {
            echo '<script>alert("Ukuran Terlalu Besar")</script>';
        }
    } else {
        echo '<script>alert("File Harus png")</script>';
    }
}

// Setelah mengunggah file, lanjutkan dengan operasi yang terkait dengan database
if (isset($_POST['add']) && isset($image)) {
    $judul_info = trim(mysqli_real_escape_string($koneksi, $_POST['judul_info']));
    $isi_info = trim(mysqli_real_escape_string($koneksi, $_POST['isi_info']));
    $tgl_info = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_info']));

    mysqli_query($koneksi, "INSERT INTO tb_notif (nama_notif, isi_notif, tgl_notif, image) 
    VALUES('$judul_info', '$isi_info', '$tgl_info', '$image')");

    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/tb_informasi/index.php');
} else if (isset($_POST['edit_info'])) {
    $id_notif = trim(mysqli_real_escape_string($koneksi, $_POST['id_notif']));
    $judul_info = trim(mysqli_real_escape_string($koneksi, $_POST['judul_info']));
    $isi_info = trim(mysqli_real_escape_string($koneksi, $_POST['isi_info']));
    $tgl_info = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_info']));
    // $image = trim(mysqli_real_escape_string($koneksi, $_POST['file']));

    mysqli_query($koneksi, "UPDATE tb_notif set nama_notif='$judul_info', isi_notif='$isi_info', tgl_notif='$tgl_info' WHERE id_notif='$id_notif'");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/tb_informasi/index.php');
}
