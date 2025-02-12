<?php
session_name("kas_session");
session_start();
include '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text-o"></i> Master Report</h1>
            <p>Format Report</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> Data Master Report</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date: <?= $date; ?></h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped" id="mauexport">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>NAMA REPORT</th>
                                        <th>KETERANGAN</th>
                                        <th>DEBIT</th>
                                        <th>KREDIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_report WHERE status='aktif' ORDER BY id_report ASC") or die(mysqli_error($koneksi));
                                    $result = array();
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $result[] = $data;
                                    }
                                    foreach ($result as $data) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class="small"><?= $no ?></td>
                                            <td class="small"><?= $data['tgl_report'] ?></td>
                                            <td class="small"><?= $data['nama_report'] ?></td>
                                            <td class="small"><?= $data['keterangan'] ?></td>
                                            <td class="small text-right"><?= number_format($data['debit_report']) ?></td>
                                            <td class="small text-right"><?= number_format($data['kredit_report']) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
</main>

<?php
include '../../../footer.php';
?>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/vfs_fonts.js"></script>

<script>
    $(document).ready(function() {
        $('#mauexport').DataTable({
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Print',
                    className: 'btn btn-outline-secondary mb-3',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Excel',
                    className: 'btn btn-outline-info mb-3',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i> PDF',
                    className: 'btn btn-outline-danger mb-3',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            pageLength: 50
        });
    });


    function exportToExcel(tableID) {
        var exportTable = $('#' + tableID).DataTable();
        exportTable.button('.buttons-excel').trigger();
    }

    function exportToPDF(tableID) {
        var exportTable = $('#' + tableID).DataTable();
        exportTable.button('.buttons-pdf').trigger();
    }

    function exportToPrint(tableID) {
        var exportTable = $('#' + tableID).DataTable();
        exportTable.button('.buttons-print').trigger();
    }
</script>