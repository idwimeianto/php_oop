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

  if (!empty($_POST)) { // form submitted
    $error_message = $mahasiswa->validate($_POST);
    if (empty($error_message)) {
      $mahasiswa->update(Input::get('id'));
      $message = urlencode("Mahasiswa dengan nama <b>{$mahasiswa->getItem('nama')}</b>, Nim <b>{$mahasiswa->getItem('nim')}</b> sudah berhasil di-update");
      header("Location:index.php?message={$message}");
    }
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
  <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
    <header class="header-title mb-4">
      <h1><a href="./index.php" style="text-decoration: none;"><span class="fw-normal text-dark">Sistem Informasi</span> <span class="text-primary">Mahasiswa</span></a></h1>
      <hr>
    </header>
  <section>
    <h2 class="mb-3">Update Data Mahasiswa</h2>
    <?php
      if (isset($error_message) && $error_message !== "") {
        echo "<div class=\"alert alert-danger alert-dismissible fade show mb-3\" role=\"alert\">";
        echo "<div class=\"m-0 p-0\">";
        foreach ($error_message as $message) {
          echo "<li>$message</li>";
        }
        echo "</div>";
        echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
          </div>";
      }
    ?>
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="form">
      <div class="mb-3">
        <label for="nim" class="form-label">Nim</label>
        <input type="text" name="nim" id="nim" class="form-control" value="<?php echo $mahasiswa->getItem('nim'); ?>"
          placeholder="Contoh: 1234567">
        <span class="text-muted">(7 digit angka)</span>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $mahasiswa->getItem('nama'); ?>"
          placeholder="Masukkan Nama Kamu">
      </div>
      <div class="mb-3">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
          value="<?php echo $mahasiswa->getItem('tempat_lahir'); ?>" placeholder="Masukkan Tempat Lahir">
      </div>
      <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $mahasiswa->getItem('tanggal_lahir'); ?>">
      </div>
      <div class="mb-3">
        <div>
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" <?php echo $mahasiswa->getItem('jenis_kelamin') === "Laki-laki" ?  "checked" : ""; ?>>
          <label class="form-check-label" for="laki-laki">Laki-laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" <?php echo $mahasiswa->getItem('jenis_kelamin') === "Perempuan" ?  "checked" : ""; ?>>
          <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
      </div>
      <div class="mb-3">
        <label for="fakultas" class="form-label">Fakultas</label>
          <select name="fakultas" id="fakultas" class="form-select">
            <option value="">Pilih Fakultas</option>
            <?php
              $faculties = ["FIP", "FPIPS", "FPBS", "FPSD", "FPMIPA", "FPTK", "FPEB"];

              echo Input::generateOption($faculties, $mahasiswa->getItem('fakultas'));
            ?>
          </select>
        </div>
      <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?php echo $mahasiswa->getItem('jurusan'); ?>"
          placeholder="Masukkan Jurusan">
      </div>
      <div class="mb-3">
        <label for="ipk">IPK</label>
        <input type="text" name="ipk" id="ipk" class="form-select" value="<?php echo $mahasiswa->getItem('ipk'); ?>"
          placeholder="Contoh: 3.85">
        <span class="text-muted">(angka desimal dipisah dengan karakter titik ".")</span>
      </div>
      <br>
      <div class="mb-3">
        <input type="submit" name="submit" value="Update Data" class="btn btn-primary">
      </div>
    </form>
  </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>