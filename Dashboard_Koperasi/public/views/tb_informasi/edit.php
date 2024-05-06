<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");

$id = $_GET['id'];
$query = "SELECT * FROM tb_notif WHERE id_notif = $id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($result);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-info"></i> Add Information</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="index.php">Back</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="../../../app/controller/Notif.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="hidden" name="tgl_info" value="<?= $date ?>" required readonly>
                                    <label for="exampleFormControlInput1"><strong>JUDUL INFORMASI</strong></label>
                                    <input type="text" name="judul_info" class="form-control" id="exampleFormControlInput1" value="<?= $row['nama_notif'] ?>" placeholder="Input Judul Informasi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"><strong>ISI INFORMASI</strong></label>
                                    <textarea class="form-control" name="isi_info" id="exampleFormControlTextarea1" rows="20" style="overflow-y: scroll;"><?= $row['isi_notif'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"><strong>INPUT PHOTO</strong></label>
                                    <div>
                                        <img id="preview" src="../../../app/assets/img/img_notif/<?= $row['image'] ?>" alt="Preview" style="max-width:100%; margin-top:10px;">
                                    </div>
                                    <input type="file" name="file" class="form-control-file mt-2" id="exampleFormControlFile1" onchange="previewImage(this)">
                                    <button type="button" class="btn btn-danger btn-sm mt-2" id="removeImage" style="display:none;">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-info btn-block" name="add" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../../footer.php'; ?>

<script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var removeButton = document.getElementById('removeImage');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                removeButton.style.display = 'block'; // Tampilkan tombol "Remove"
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('removeImage').addEventListener('click', function() {
        var preview = document.getElementById('preview');
        var removeButton = document.getElementById('removeImage');
        var fileInput = document.getElementById('exampleFormControlFile1');

        preview.src = '../../../app/assets/img/img_notif/<?= $row['image'] ?>'; // Kembalikan gambar ke gambar asli
        preview.style.display = 'block'; // Tampilkan gambar
        removeButton.style.display = 'none'; // Sembunyikan tombol "Remove"
        fileInput.value = ''; // Kosongkan input file
    });
</script>
