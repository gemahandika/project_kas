<?php
include '../../../header.php';
include '../../../app/models/Dashboard_models1.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard AJA</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
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
            <div class="widget-small info coloured-icon"><i class="icon fa fa-university fa-3x"></i>
                <div class="info">
                    <h4>Masuk</h4>
                    <p><b><?php echo number_format($debit) ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-money fa-3x"></i>
                <div class="info">
                    <h4>Keluar</h4>
                    <p><b><?php echo number_format($kredit) ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b><?= $jumlah_data3 ?></b></p>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="row">-->
    <!--    <div class="col-md-6">-->
    <!--        <div class="tile">-->
    <!--            <h3 class="tile-title">Monthly Sales</h3>-->
    <!--            <div class="embed-responsive embed-responsive-16by9">-->
    <!--                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-md-6">-->
    <!--        <div class="tile">-->
    <!--            <h3 class="tile-title">Support Requests</h3>-->
    <!--            <div class="embed-responsive embed-responsive-16by9">-->
    <!--                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
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
    var pdata = [{
            value: 300,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Complete"
        },
        {
            value: 50,
            color: "#F7464A",
            highlight: "#FF5A5E",
            label: "In-Progress"
        }
    ]

    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

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