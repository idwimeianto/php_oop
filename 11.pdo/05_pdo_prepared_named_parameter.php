<?php
$host = "localhost";
$dbname = "db_univ";
$username = "root";
$password = "";
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// named paramater as placeholder
$query = "SELECT * FROM mahasiswa WHERE id = :id OR nama = :nama";

// prepare
$stmt = $pdo->prepare($query);

// bind & execute
$stmt->execute(['id'=>2, 'nama'=>"Rudi Perdana"]);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  echo $row['nim']; echo " | ";
  echo $row['nama']; echo " | ";
  echo $row['tempat_lahir']; echo " | ";
  echo $row['tanggal_lahir']; echo " | ";
  echo $row['jenis_kelamin']; echo " | ";
  echo $row['fakultas']; echo " | ";
  echo $row['jurusan']; echo " | ";
  echo $row['ipk'];
  echo "<br>";
}

// OUTPUT
/*
  1502104 | Rudi Permana | Bandung | 1994-08-22 | | FASILKOM | Ilmu Komputer | 2.90
*/