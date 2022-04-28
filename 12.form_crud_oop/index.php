<?php
  require "./class/DB.php";
  require "./class/Input.php";

  $DB = DB::getInstance();

  $students = $DB->get('mahasiswa');
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
      <h2 class="text-center">Data Mahasiswa</h2>
      <div class="clearfix">
        <a href="add_mahasiswa.php" class="btn btn-primary float-end" style="width: 100px;">Add</a>
      </div>
      <?php
        if (Input::get('message') !== "") {
          echo "<div class=\"alert alert-success alert-dismissible fade show my-3\" role=\"alert\">
            <div class=\"m-0\">".Input::get('message')."</div>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
          </div>";
        }
      ?>
      <div class="table-responsive">
        <table class="table table-striped  mt-4">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col">Tempat Lahir</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Jurusan</th>
              <th scope="col">IPK</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($students as $data) { 
              $raw_date = strtotime($data->tanggal_lahir);
              $date = date("d-m-Y", $raw_date);
              
              echo "<tr>";
              echo "<th scope=\"row\">$i</th>";
              echo "<td>{$data->nim}</td>";
              echo "<td>{$data->nama}</td>";
              echo "<td>{$data->tempat_lahir}</td>";
              echo "<td>{$date}</td>";
              echo "<td>{$data->jenis_kelamin}</td>";
              echo "<td>{$data->fakultas}</td>";
              echo "<td>{$data->jurusan}</td>";
              echo "<td>{$data->ipk}</td>";
              echo "<th scope=\"row\" class=\"text-center\">
                  <a style=\"width:80px\"
                    class=\"btn btn-info text-white d-inline-block\" href=\"./update_mahasiswa.php?id=$data->id\">Update</a>
                  <a style=\"width:80px\"
                    class=\"btn btn-danger text-white\" href=\"./delete_mahasiswa.php?id=$data->id\">Delete</a>
              </th>";
              echo "</tr>";

              $i++;
            }
            ?>  
          </tbody>
        </table>
      </div>
    </section>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>