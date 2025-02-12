<?php
session_name("kas_session");
session_start();
include '../../../header.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h6><strong> DOWNLOAD DATA ANGGOTA</strong></h6>
        </div>
    </div>
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="tile">
                <!-- <p class="tile-title"><strong>ANGGOTA AKTIF</strong></p> -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="mauexport">
                        <thead>
                            <tr class="btn-dark">
                                <th class="small">NO</th>
                                <th class="small">NIP</th>
                                <th class="small">JOIN DATE</th>
                                <th class="small">NAMA ANGGOTA</th>
                                <th class="small">DIVISI</th>
                                <th class="small">CABANG</th>
                                <th class="small">STATUS KARYAWAN</th>
                                <th class="small">HANDPHONE</th>
                                <th class="small">ALAMAT</th>
                                <th class="small">SALDO </th>
                                <th class="small">STATUS </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status = 'AKTIF' ORDER BY id_anggota DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="small"><?= $no ?></td>
                                    <td class="small"><?= $data['nip'] ?></td>
                                    <td class="small"><?= $data['join_date'] ?></td>
                                    <td class="small"><?= $data['nama_anggota'] ?></td>
                                    <td class="small"><?= $data['divisi'] ?></td>
                                    <td class="small"><?= $data['cabang'] ?></td>
                                    <td class="small"><?= $data['status_karyawan'] ?></td>
                                    <td class="small"><?= $data['phone'] ?></td>
                                    <td class="small"><?= $data['alamat'] ?></td>
                                    <td class="small text-right"><?= $data['saldo'] ?></td>
                                    <td class="small"><?= $data['status'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
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
                [10, 25, 50, 1000, "All"]
            ],
            pageLength: 1000
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

<?php include '../../../footer.php'; ?>