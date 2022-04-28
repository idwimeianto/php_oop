<?php
  require './class/DB.php';
  require './class/Input.php';
  require './class/Validate.php';
  require './class/Mahasiswa.php';

  if(empty(Input::get('id'))) {
    header('Location:index.php');
  }

  $mahasiswa = new Mahasiswa();
  $mahasiswa->generate(Input::get('id'));

  if (!empty($_POST)) {
    $mahasiswa->delete(Input::get('id'));
    $message = urlencode("Mahasiswa dengan nama <b>{$mahasiswa->getItem('nama')}</b>, Nim <b>{$mahasiswa->getItem('nim')}</b> sudah berhasil dihapus");
    header("Location:index.php?message={$message}");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sistem Informasi Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-light">
  <div class="container mt-5 py-4 px-5 mb-5">
    <div class="row">
      <div class="col-6 mx-auto">
        <div id="modalHapus">
          <div class="modal-dialog modal-confirm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
              </div>
              <div class="modal-body">
                <p> Apakah Anda yakin menghapus mahasiswa 
                  <b><?php echo $mahasiswa->getItem('nama'); ?></b>, Nim <b><?php echo $mahasiswa->getItem('nim'); ?>?</b></p>
              </div>
              <div class="modal-footer">
              <a href="./index.php" class="btn btn-secondary">Tidak</a>

              <form method="post">
                <input type="hidden" name="id"
                  value="<?php echo $mahasiswa->getItem('id'); ?>">
                <input type="submit" class="btn btn-danger" value="Ya">
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>