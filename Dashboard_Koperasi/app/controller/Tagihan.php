<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_tagihan'])) {
    for ($i = 0; $i < count($_POST['nik']); $i++) {
        $nama_anggota = trim(mysqli_real_escape_string($koneksi, $_POST['nama_anggota'][$i]));
        $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik'][$i]));
        $status_karyawan = trim(mysqli_real_escape_string($koneksi, $_POST['status_karyawan'][$i]));
        $nominal = trim(mysqli_real_escape_string($koneksi, $_POST['nominal'][$i]));
        $date = trim(mysqli_real_escape_string($koneksi, $_POST['date'][$i]));
        $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan'][$i]));
        $status = trim(mysqli_real_escape_string($koneksi, $_POST['status'][$i]));
        $ket_history = trim(mysqli_real_escape_string($koneksi, $_POST['ket_history'][$i]));

        // Ekstrak bulan dan tahun dari tanggal
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        // Validasi NIK agar tidak ganda dalam bulan yang sama
        $check_query = "SELECT * FROM tb_tagihan WHERE nik = '$nik' AND MONTH(tanggal) = '$month' AND YEAR(tanggal) = '$year'";
        $check_result = $koneksi->query($check_query);

        if ($check_result->num_rows > 0) {
            showSweetAlert('warning', 'Oops...', 'Data sudah ada dalam bulan yang sama.', '#3085d6', '../../public/views/tb_tagihan/cek_tagihan.php');
        } else {
            // insert tb history
            mysqli_query($koneksi, "INSERT INTO tb_history ( nama, nik, tanggal, nominal, keterangan) 
            VALUES( '$nama_anggota', '$nik', '$date', '$nominal', '$ket_history')");
            // Insert data ke tabel tb_tagihan
            $insert_query = "INSERT INTO tb_tagihan (nama_anggota, nik, status_karyawan, jumlah_tagihan, tanggal, keterangan, status) 
                             VALUES('$nama_anggota', '$nik', '$status_karyawan', $nominal, '$date' , '$keterangan', '$status')";
            if ($koneksi->query($insert_query) === TRUE) {
                showSweetAlert('success', 'Sukses', 'Iuran Berhasil ditambah', '#3085d6', '../../public/views/tb_tagihan/cek_tagihan.php');
            } else {
                showSweetAlert('error', 'Error', 'Terjadi kesalahan saat menambahkan data.', '#3085d6', $tujuan);
            }
        }
    }
}
