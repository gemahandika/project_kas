<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("location:../login/index.php");
}
// if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
//     echo "Ooopss!! Kamu Tidak Punya Akses";
//     exit();
// }
include 'app/config/koneksi.php';
$user1 = $_SESSION['admin_username'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user1'") or die(mysqli_error($koneksi));
$data1 = $sql->fetch_array();
$data2 = $data1["nip"];
$saldo_user = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE nip ='$data2'") or die(mysqli_error($koneksi));
$data_saldo_user = mysqli_fetch_array($saldo_user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <link rel="shortcut icon" href="../../../app/assets/img/LOGO1.png">
    <title>Kreasi Anugerah Sejahtera</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
</head>



<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="#" style="font-family: 'Arial-black';"><img class="mr-1 mb-2" src="../../../app/assets/img/LOGO1.png" alt="profile" style="width: 50px; height: 50px;">KAS</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="app-search">
                <p class="app-sidebar__user-designation" style="color: white;"><?= $data1['nama_user'] ?></p>
            </li>
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="../user_app/profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a href="../login/logout.php" class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../../../app/assets/img/User.png" alt="profile" style="width: 50px; height: 50px;">
            <div>
                <p class="app-sidebar__user-name"><?= $user1 ?></p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item" href="../dashboard/index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

            <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Anggota</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="../data_anggota/index.php" rel="noopener"><i class="icon fa fa-circle-o ml-4"></i>Anggota Aktif</a></li>
                        <li><a class="treeview-item" href="../data_anggota/index_nonaktif.php"><i class="icon fa fa-circle-o ml-4"></i> Anggota Nonaktif</a></li>
                        <li><a href="../tb_daftar/list_daftar.php" class="treeview-item"><i class="icon fa fa-circle-o ml-4"></i> Anggota Baru</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="../tb_transaksi/"><i class="icon fa fa-circle-o ml-4"></i> Iuran Anggota</a></li>
                        <li><a class="treeview-item" href="../buku_besar/"><i class="icon fa fa-circle-o ml-4"></i> Buku Besar</a></li>
                        <li><a class="treeview-item" href="../tb_tagihan/"><i class="icon fa fa-circle-o ml-4"></i> Tagihan Anggota</a></li>
                        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                            <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o ml-4"></i> Piutang</a></li>
                            <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o ml-4"></i> Pengeluaran</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a class="app-menu__item" href="../pnl_usaha_kantin/"><i class="app-menu__icon fa fa-cutlery"></i><span class="app-menu__label">Usaha Kantin</span></a></li>
            <?php } ?>
            <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                <li><a class="app-menu__item" href="../tb_informasi"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Informasi</span></a></li>
            <?php } ?>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-dollar"></i><span class="app-menu__label">Bukti Transfer</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <?php if (in_array("user", $_SESSION['admin_akses'])) { ?>
                        <li><a class="treeview-item" href="../tb_transfer/"><i class="icon fa fa-circle-o ml-4"></i> Unggah Bukti Transfer</a></li>
                    <?php } ?>
                    <li><a class="treeview-item" href="../tb_transfer/list_data.php"><i class="icon fa fa-circle-o ml-4"></i> List Data</a></li>
                </ul>
            </li>
            <li><a class="app-menu__item" href="../history/"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">History</span></a></li>
            <li><a class="app-menu__item" href="../produk/"><i class="app-menu__icon fa fa-product-hunt"></i><span class="app-menu__label">Produk</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Data Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="../master_report/"><i class="icon fa fa-circle-o ml-4"></i> Master Report</a></li>
                </ul>
            </li>
            <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-gear"></i><span class="app-menu__label">Setting</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="../user_app/" class="treeview-item"><i class="icon fa fa-circle-o ml-4"></i> User</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </aside>