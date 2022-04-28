<?php
try {
  $host = "localhost";
  $dbname = "db_univ";
  $username = "root";
  $password = "";
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  $query = "SELECT * FROM mahasiswa ORDER BY nama LIMIT :limit";

  // prepare
  $stmt = $pdo->prepare($query);

  // manual bind
  $stmt->bindValue('limit', 3, PDO::PARAM_INT);

  // execute
  $stmt->execute();

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

  $stmt = NULL;
}
catch (\PDOException $e) {
  echo "Error: ".$e->getMessage(). " (".$e->getCode().")";
}
finally {
  $pdo=NULL;
}

// OUTPUT
/*
  1301201 | James Situmorang | Medan | 1995-04-02 | | Kedokteran | Kedokteran Gigi | 2.70
  1400501 | Riana Putria | Padang | 1996-11-23 | | FMIPA | Kimia | 3.10
  1500203 | Rina Kumala Sari | Jakarta | 1997-06-28 | | Ekonomi | Akuntansi | 3.40
*/