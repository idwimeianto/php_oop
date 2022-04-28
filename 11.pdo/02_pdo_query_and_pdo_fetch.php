<?php
$host = "localhost";
$dbname = "db_univ";
$username = "root";
$password = "";
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$query = "SELECT * FROM mahasiswa";
$stmt = $pdo->query($query);
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
  1400501 | Riana Putria | Padang | 1996-11-23 | | FMIPA | Kimia | 3.10
  1502104 | Rudi Permana | Bandung | 1994-08-22 | | FASILKOM | Ilmu Komputer | 2.90
  1500303 | Sari Citra Lestari | Jakarta | 1997-12-31 | | Ekonomi | Manajemen | 3.50
  1500203 | Rina Kumala Sari | Jakarta | 1997-06-28 | | Ekonomi | Akuntansi | 3.40
  1301201 | James Situmorang | Medan | 1995-04-02 | | Kedokteran | Kedokteran Gigi | 2.70
*/
?>