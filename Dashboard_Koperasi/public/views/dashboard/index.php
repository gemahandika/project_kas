<?php
include '../../../header.php';
include '../../../app/models/Dashboard_models1.php';
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form action="index.php" method="get">
                    <div class="tile-body d-flex align-items-center">
                        <label class="control-label">Periode : </label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="dari" value="<?= $date ?>">
                        </div>
                        <label class="control-label mx-2">-</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="ke" value="<?= $date ?>">
                        </div>
                        <div class="ml-2">
                            <button type="submit" name="approve" class="btn btn-primary icon-btn form-group"><i class="fa fa-search"></i>Cari</button>
                        </div>
                        <p><a href="index.php" class="btn btn-secondary ml-1"><i class="fa fa-refresh" aria-hidden="true"></i></a></p>
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

    <div class="row">
        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-dollar fa-3x"></i>
                    <div class="info">
                        <h4>Saldo</h4>
                        <p><b><?php echo number_format($saldo) ?></b></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (in_array("user", $_SESSION['admin_akses'])) { ?>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-dollar fa-3x"></i>
                    <div class="info">
                        <h4>Saldo</h4>
                        <p><b><?= number_format($data_saldo_user['saldo']) ?></b></p>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Anggota Aktif</h4>
                    <h3><strong><?= $jumlah_data3 ?></strong></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6>Data Profitabilitas Usaha</h6>
                    <h6>Data Anggota</h6>
                    <h6>Data Anggota Baru</h6>
                </div>
                <div class="d-flex">
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
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
<script type="text/javascript">
    var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [{
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86]
            }
        ]
    };

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


    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
</script>

<!-- Google analytics script-->
<script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>

</html>