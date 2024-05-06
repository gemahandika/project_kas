<?php
include '../../../header.php';
// include 'modal.php';
// include 'modal_katagori.php';
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
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
          <form action="../../../app/controller/Notif.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                <input type="hidden" name="tgl_info" value="<?= $date ?>" required readonly>
                  <label for="exampleFormControlInput1"><strong>JUDUL INFORMASI</strong></label>
                  <input type="text" name="judul_info" class="form-control" id="exampleFormControlInput1" placeholder="Input Judul Informasi">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1"><strong>ISI INFORMASI</strong></label>
                  <textarea class="form-control" name="isi_info" id="exampleFormControlTextarea1" rows="12"></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlFile1"><strong>INPUT PHOTO</strong></label>
                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" onchange="previewImage(this)">
                    <img id="preview" src="#" alt="Preview" style="display:none; max-width:100%; margin-top:10px;">
                  <button type="button" class="btn btn-danger btn-sm mt-2" id="removeImage" style="display:none;">Remove</button>
                </div>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-md-4">
                <input type="submit" class="btn btn-info btn-block" name="add" value="Create">
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  function previewImage(input) {
    var preview = document.getElementById('preview');
    var removeButton = document.getElementById('removeImage');

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        removeButton.style.display = 'block';
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  document.getElementById('removeImage').addEventListener('click', function() {
    var preview = document.getElementById('preview');
    var removeButton = document.getElementById('removeImage');
    var fileInput = document.getElementById('exampleFormControlFile1');

    preview.src = '#';
    preview.style.display = 'none';
    removeButton.style.display = 'none';
    fileInput.value = '';
  });
</script>

<?php include '../../../footer.php'; ?>
