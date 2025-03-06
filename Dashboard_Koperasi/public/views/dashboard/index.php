<?php
session_name("kas_session");
session_start();
include '../../../header.php';
include '../../../app/models/Dashboard_models1.php';
include '../../../app/models/Daftar_models.php';
include '../../../app/models/Murabahah_models.php';
$query = "SELECT * FROM katagori_produk";
$result = mysqli_query($koneksi, $query);
// include 'modal_produk.php';
$date = date("Y-m-d");
$time = date("H:i");
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong>DASHBOARD</strong> </h6>
        </div>
    </div>
    <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <form action="index" method="get">
                        <div class="tile-body d-flex align-items-center flex-column flex-md-row">
                            <label class="control-label mr-3">Periode : </label>
                            <div class="form-group">
                                <input class="form-control" type="date" name="dari" value="<?= $date ?>">
                            </div>
                            <label class="control-label mx-2">-</label>
                            <div class="form-group">
                                <input class="form-control" type="date" name="ke" value="<?= $date ?>">
                            </div>
                            <div class="ml-2">
                                <button type="submit" name="approve" class="btn btn-primary form-group"><i class="fa fa-search"></i>Cari</button>
                            </div>
                            <div class="ml-2">
                                <p><a href="index" class="btn btn-secondary ml-1">Refresh</a></p>
                            </div>
                            <label class="ml-2 ">
                                <?php
                                if (isset($_GET['dari']) && isset($_GET['ke'])) {
                                    echo "<p>Data Dari Tanggal <span style='color:red; font-weight:bold;'>" . $_GET['dari'] . "</span> s/d <span style='color:red; font-weight:bold;'>" . $_GET['ke'] . "</span></p>";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-dollar fa-3x"></i>
                    <div class="info">
                        <h4 style="border-bottom: 1px solid black;"><strong>Saldo</strong></h4>
                        <h4><strong> <?php echo number_format($saldo) ?></strong></h4>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (in_array("user", $_SESSION['admin_akses'])) { ?>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-dollar fa-3x"></i>
                    <div class="info">
                        <h4 style="border-bottom: 1px solid black;">Saldo</h4>
                        <h4><b><?= number_format($data_saldo_user1['saldo']); ?></b></h4>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-4 col-lg-3 text-center">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4 style="border-bottom: 1px solid black;">Anggota</h4>
                    <a href="../data_anggota/index" style="text-decoration: none;">
                        <h4><b><?= $jumlah_data3 ?></b></h4>
                    </a>
                </div>
            </div>
        </div>
        <?php if (in_array("user", $_SESSION['admin_akses'])) { ?>
            <div class="col-md-4 col-lg-3 text-center">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-file-invoice-dollar fa-3x"></i>
                    <div class="info">
                        <h4 style="border-bottom: 1px solid black;">OTS IURAN</h4>
                        <h4><b><?= number_format($tagihan) ?></b></h4>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-id-card fa-3x"></i>
                    <div class="info">
                        <h4 style="border-bottom: 1px solid black;">Daftar</h4>
                        <a href="../tb_daftar/list_daftar" style="text-decoration: none;">
                            <h4><strong><?= $data_daftar ?></strong></h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 text-center">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-file-invoice-dollar fa-3x"></i>
                    <div class="info">
                        <h4 style="border-bottom: 1px solid black;">OTS IURAN</h4>
                        <h4><b><?= number_format($tagihan_all) ?></b></h4>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="tile">
                <div class="mb-3" style="border-bottom: 1px solid black;">
                    <div class="d-flex justify-content-around">
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_kantin ORDER BY id_kantin ASC");
                        $no = 1;
                        $colors = [
                            "rgba(255, 99, 132, 1)", // Merah
                            "rgba(54, 162, 235, 1)", // Biru
                            "rgba(255, 206, 86, 1)", // Kuning
                            "rgba(75, 192, 192, 1)", // Hijau
                            "rgba(153, 102, 255, 1)", // Ungu
                            // Anda bisa menambahkan warna tambahan sesuai kebutuhan
                        ];
                        while ($d = mysqli_fetch_array($data)) {
                            // Gunakan indeks untuk mendapatkan warna dari palet warna
                            $color_index = $no - 1;
                            $btn_style = "background-color: " . $colors[$color_index] . ";"; // Style untuk tombol
                        ?>
                            <h6 class="btn btn-dark btn-sm ml-1" style="<?= $btn_style ?>">
                                <span style="font-size: 9px;"><?= $d['nama_kantin'] ?></span>
                            </h6>

                        <?php
                            $no++; // Naikkan nomor untuk warna selanjutnya
                        }
                        ?>
                    </div>
                </div>
                <div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="tile">
                <div class="mb-3">
                    <div class="d-flex justify-content-around pb-2" style="border-bottom: 1px solid black;">
                        <button class="btn btn-danger btn-sm">AGEN : <?= $jumlah_agen ?> </button>
                        <button class="btn btn-info btn-sm">KARYAWAN : <?= $jumlah_karyawan ?> </button>
                        <button class="btn btn-warning btn-sm" style="color: white;">CABANG : <?= $jumlah_cabang ?> </button>
                    </div>
                </div>
                <div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="tile">
                <div class="mb-3">
                    <div class="text-center pb-2" style="border-bottom: 1px solid black;">
                        <h6 class="text-primary">DATA ANGGOTA BARU</h6>
                    </div>
                </div>
                <div>
                    <div class=" embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body d-flex flex-wrap justify-content-center gap-2">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="card text-center bg-info m-1" style="width: 14rem;">
                            <div class="card-body d-flex flex-column align-items-center p-2">
                                <h5 class="card-title text-white text-center" style="border-bottom: 1px solid white; font-size: 14px;">
                                    <strong><?= $row['nama_produk'] ?></strong>
                                </h5>
                                <div style="width: 100%; height: 120px; background-color: white; display: flex; align-items: center; justify-content: center;">
                                    <img src="../../../app/assets/img/produk/<?= $row['poto_produk']; ?>"
                                        alt="<?= $row['poto_produk']; ?>"
                                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                </div>
                                <!-- <a href="daftar.php" class="btn btn-warning btn-sm mt-2">Daftar Disini</a> -->
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

</main>
<!-- Essential javascripts for application to work-->
<script src="../../../app/assets/js/jquery-3.2.1.min.js"></script>
<script src="../../../app/assets/js/popper.min.js"></script>
<script src="../../../app/assets/js/bootstrap.min.js"></script>
<script src="../../../app/assets/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="../../../app/assets/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="../../../app/assets/js/plugins/chart.js"></script>
<!-- Chart -->

<script type="text/javascript">
    var colors = [
        "rgba(255, 99, 132, 1)", // Merah
        "rgba(54, 162, 235, 1)", // Biru
        "rgba(255, 206, 86, 1)", // Kuning
        "rgba(75, 192, 192, 1)", // Hijau
        "rgba(153, 102, 255, 1)", // Ungu
        // Anda bisa menambahkan warna tambahan sesuai kebutuhan
    ];
    // Mendapatkan data kantin dari PHP
    var datasets = <?php echo $json_datasets; ?>;

    // Membuat variabel untuk menyimpan data chart
    var data = {
        labels: datasets[0]['data_labels'], // Menggunakan data labels dari kantin pertama
        datasets: datasets.map(function(dataset) {
            return {
                label: dataset['label'],
                fillColor: "rgba(0, 0, 0, 0)", // Transparan untuk area chart
                strokeColor: colors[datasets.indexOf(dataset) % colors.length], // Menggunakan palet warna, berulang jika jumlah kantin melebihi jumlah warna yang tersedia
                pointColor: colors[datasets.indexOf(dataset) % colors.length], // Warna titik pada garis chart
                pointStrokeColor: "#fff", // Warna border titik
                pointHighlightFill: "#fff", // Warna fill titik saat di sorot
                pointHighlightStroke: colors[datasets.indexOf(dataset) % colors.length], // Warna border titik saat di sorot
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: dataset['data_values']
            };
        })
    };

    // Update chart
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);


    // pie chart
    var pdata = <?php echo $json_data; ?>;
    var ctxp = document.getElementById("pieChartDemo").getContext("2d");
    var pieChart = new Chart(ctxp, {
        type: 'pie',
        data: {
            datasets: [{
                data: pdata.map(item => item.value),
                backgroundColor: pdata.map(item => item.color),
                hoverBackgroundColor: pdata.map(item => item.highlight)
            }],
            labels: pdata.map(item => item.label)
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);


    // bar Chart anggota ===================================================================================================

    var data_anggota = <?php echo $json_data_anggota; ?>;

    // Definisi warna untuk batang-batang
    var backgroundColors = [
        "rgba(255, 99, 132, 1)", // Merah
        "rgba(54, 162, 235, 1)", // Biru
        "rgba(255, 206, 86, 1)", // Kuning
        "rgba(75, 192, 192, 1)", // Hijau
        "rgba(153, 102, 255, 1)", // Ungu
        // Anda bisa menambahkan lebih banyak warna sesuai kebutuhan
    ];

    // Mendapatkan label bulan dan jumlah anggota dari data
    var bulan_labels = data_anggota.map(function(item) {
        return item.bulan;
    });

    var jumlah_anggota_data = data_anggota.map(function(item) {
        return item.jumlah_anggota;
    });

    var backgroundColorsMapped = bulan_labels.map(function(label, index) {
        return backgroundColors[index % backgroundColors.length];
    });
    // Menggunakan warna secara berulang jika jumlah bulan melebihi jumlah warna yang ditentukan
    var data = {
        labels: bulan_labels,
        datasets: [{
            label: 'Jumlah Anggota',
            backgroundColor: backgroundColorsMapped, // Menggunakan array warna yang telah ditentukan sebelumnya
            borderColor: 'rgba(54, 162, 235, 1)', // Warna border batang
            borderWidth: 1,
            data: jumlah_anggota_data
        }]
    };

    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
</script>

</body>

</html>