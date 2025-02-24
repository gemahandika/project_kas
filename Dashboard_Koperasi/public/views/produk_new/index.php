<?php
session_name("kas_session");
session_start();
include '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
include 'modal_produk.php';
include '../../../app/config/koneksi.php';
// include '../../../app/models/Murabahah_models.php';


$query = "SELECT * FROM katagori_produk";
$result = mysqli_query($koneksi, $query);

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
            <h6><strong>PRODUK</strong></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>TAMBAH PRODUK </button>
                <a href="list_data.php" type="button" class="btn btn-primary"><i class="fa fa-database"></i>LIST DATA </a>
                <a href="list_daftar.php" type="button" class="btn btn-primary"><i class="fa fa-user"></i>LIST DAFTAR </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body d-flex flex-wrap justify-content-center gap-3">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="card text-center bg-info m-1" style="width: 18rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <h4 class="card-title text-white text-center" style="border-bottom: 1px solid white;">
                                    <strong><?= $row['nama_produk'] ?></strong>
                                </h4>
                                <div style="width: 100%; height: 150px; background-color: white; display: flex; align-items: center; justify-content: center;">
                                    <img src="../../../app/assets/img/produk/<?= $row['poto_produk']; ?>"
                                        alt="<?= $row['poto_produk']; ?>"
                                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                </div>
                                <a href="daftar.php" class="btn btn-warning btn-sm mt-2">Daftar Disini</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>




</main>

<?php include '../../../footer.php'; ?>