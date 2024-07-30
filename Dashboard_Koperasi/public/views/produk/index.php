<?php
include '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
// include 'modal.php';
// include 'modal_edit.php';
include '../../../app/config/koneksi.php';
include '../../../app/models/Murabahah_models.php';
?>
<style>
    @media (max-width: 768px) {
        .tile-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-product-hunt"></i> Produk</h1>
            <!-- <p>Table Transaksi Iuran Anggota</p> -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body d-flex justify-content-around">
                    <div class="card text-center bg-info mr-2 mb-2" style="width: 18rem;">
                        <div class="card-body">
                            <h4 class="card-title text-white text-center d-flex flex-column align-items-center" style="border-bottom: 1px solid white;">
                                <i class="fas fa-money-check-alt fa-4x mb-1" style="opacity: 0.5;"></i>
                                <strong>MURABAHAH</strong>
                            </h4>
                            <div class="info d-flex justify-content-around text-white">
                                <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                                    <a href="index_murabahah.php" class="text-white" style="text-decoration: none;">
                                        <div class="pr-3">
                                            <h5>DAFTAR</h5>
                                            <h4><?= $daftar_murabahah ?></h4>
                                        </div>
                                    </a>
                                    <a href="data_murabahah.php" class="text-white" style="text-decoration: none;">
                                        <div class="pl-4" style="border-left: 2px solid white;">
                                            <h5>ANGGOTA</h5>
                                            <h4><?= $terima_murabahah ?>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div><br>
                            <a href="daftar_murabahah.php" class="btn btn-warning btn-sm">Daftar Disini</a>
                            <!-- <a href="data_murabahah.php" class="btn btn-danger btn-sm">Cek Data</a> -->
                        </div>
                    </div>
                    <div class="card text-center bg-primary mr-2 mb-2" style="width: 18rem;">
                        <div class="card-body">
                            <h4 class="card-title text-white text-center d-flex flex-column align-items-center" style="border-bottom: 1px solid white;">
                                <i class="fas fa-handshake fa-4x mb-1" style="opacity: 0.5;"></i>
                                <strong>MUDHARABAH</strong>
                            </h4>
                            <div class="info d-flex justify-content-around text-white">
                                <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                                    <a href="index_mudharabah.php" class="text-white" style="text-decoration: none;">
                                        <div class="pr-3">
                                            <h5>DAFTAR</h5>
                                            <h4><?= $daftar_mudharabah ?></h4>
                                        </div>
                                    </a>
                                    <a href="data_mudharabah.php" class="text-white" style="text-decoration: none;">
                                        <div class="pl-4" style="border-left: 2px solid white;">
                                            <h5>ANGGOTA</h5>
                                            <h4><?= $terima_mudharabah ?></h4>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div><br>
                            <a href="daftar_mudharabah.php" class="btn btn-warning btn-sm">Daftar Disini</a>
                        </div>
                    </div>
                    <div class="card text-center bg-success" style="width: 18rem;">
                        <div class="card-body">
                            <h4 class="card-title text-white text-center d-flex flex-column align-items-center" style="border-bottom: 1px solid white;">
                                <i class="fas fa-bank fa-4x mb-1" style="opacity: 0.5;"></i>
                                <strong>TABUNGAN EMAS</strong>
                            </h4>
                            <div class="info d-flex justify-content-around text-white">
                                <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                                    <a href="index_emas.php" class="text-white" style="text-decoration: none;">
                                        <div class="pr-3">
                                            <h5>DAFTAR</h5>
                                            <h4><?= $daftar_emas ?></h4>
                                        </div>
                                    </a>
                                    <a href="data_emas.php" class="text-white" style="text-decoration: none;">
                                        <div class="pl-4" style="border-left: 2px solid white;">
                                            <h5>ANGGOTA</h5>
                                            <h4><?= $terima_emas ?></h4>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div><br>
                            <a href="daftar_emas.php" class="btn btn-warning btn-sm">Daftar Disini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>