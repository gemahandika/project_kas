<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_produk'])) {
    $nama_produk = trim(mysqli_real_escape_string($koneksi, $_POST['nama_produk']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nik_perusahaan = trim(mysqli_real_escape_string($koneksi, $_POST['nik_perusahaan']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $warna = trim(mysqli_real_escape_string($koneksi, $_POST['warna']));
    $berat = trim(mysqli_real_escape_string($koneksi, $_POST['berat']));
    $harga = trim(mysqli_real_escape_string($koneksi, $_POST['harga']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $lama_menabung = trim(mysqli_real_escape_string($koneksi, $_POST['lama_menabung']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    // Validasi NIK agar tidak ganda
    $check_query = "SELECT * FROM tb_produk WHERE nik = '$nik' AND nama_produk = '$nama_produk'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/produk_new/');
    } else {
        // Masukan data ke tabel murabahah
        mysqli_query($koneksi, "INSERT INTO tb_produk ( nama, nik, nik_perusahaan, alamat, phone, unit, nama_produk, nama_barang, jenis, warna, berat, harga, tanggal, lama_menabung, status) 
    VALUES( '$nama', '$nik', '$nik_perusahaan', '$alamat', '$phone','$unit','$nama_produk','$nama_barang', '$jenis','$warna','$berat', $harga,'$tanggal','$lama_menabung','$status')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/produk_new/daftar_murabahah.php');
    }
} else if (isset($_POST['daftar_produk'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_produk SET status='$status' WHERE id_produk='$id'");
    showSweetAlert('success', 'Success', 'Anggota Berhasil di Daftarkan', '#3085d6', '../../public/views/produk_new/list_data.php');
} else if (isset($_POST['edit'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $nama_produk = trim(mysqli_real_escape_string($koneksi, $_POST['nama_produk']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nik_perusahaan = trim(mysqli_real_escape_string($koneksi, $_POST['nik_perusahaan']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
    $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
    $warna = trim(mysqli_real_escape_string($koneksi, $_POST['warna']));
    $berat = trim(mysqli_real_escape_string($koneksi, $_POST['berat']));
    $harga = trim(mysqli_real_escape_string($koneksi, $_POST['harga']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
    $lama_menabung = trim(mysqli_real_escape_string($koneksi, $_POST['lama_menabung']));

    mysqli_query($koneksi, "UPDATE tb_produk SET nama_produk='$nama_produk',
    nama_produk='$nama_produk',
    nama='$nama',
    nik='$nik',
    nik_perusahaan='$nik_perusahaan',
    alamat='$alamat',
    phone='$phone',
    unit='$unit',
    nama_barang='$nama_barang',
    jenis='$jenis',
    warna='$warna',
    berat='$berat',
    harga='$harga',
    lama_menabung='$lama_menabung' WHERE id_produk='$id'");
    showSweetAlert('success', 'Success', 'Data Berhasil di Update', '#3085d6', '../../public/views/produk_new/list_data.php');
} 
// else if (isset($_POST['terima_murabahah'])) {
//     $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
//     $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

//     mysqli_query($koneksi, "UPDATE tb_murabahah SET status='$status' WHERE nik='$nik'");
//     showSweetAlert('success', 'Success', 'Anggota Berhasil di Daftarkan', '#3085d6', '../../public/views/produk/index_murabahah.php');
// } else if (isset($_POST['tolak_murabahah'])) {
//     $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
//     $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

//     mysqli_query($koneksi, "UPDATE tb_murabahah SET status='$status' WHERE nik='$nik'");
//     showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Tolak', '#dc3545', '../../public/views/produk/index_murabahah.php');
// } else if (isset($_POST['edit_murabahah'])) {
//     $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
//     $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
//     $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
//     $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
//     $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
//     $jenis = trim(mysqli_real_escape_string($koneksi, $_POST['jenis']));
//     $warna = trim(mysqli_real_escape_string($koneksi, $_POST['warna']));
//     $harga = trim(mysqli_real_escape_string($koneksi, $_POST['harga']));

//     mysqli_query($koneksi, "UPDATE tb_murabahah SET unit='$unit', alamat='$alamat', tanggal='$tanggal', nama_barang='$nama_barang', jenis='$jenis', warna='$warna' , harga=$harga WHERE nik='$nik'");
//     showSweetAlert('success', 'Done', 'Pendaftaran Berhasil di Update', '#3085d6', '../../public/views/produk/data_murabahah.php');
// }
