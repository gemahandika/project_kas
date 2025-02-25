<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/config/koneksi.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h6>LAPORAN KOPERASI</h6>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="tile-body d-flex justify-content-center mb-4">
                        <h6>LAPORAN SISA HASIL USAHA KOPERASI</h6>
                    </div>

                    <div class="tile-body d-flex justify-content-start">
                        <h6>PENDAPATAN USAHA</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>