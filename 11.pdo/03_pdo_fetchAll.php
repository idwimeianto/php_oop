<?php
$host = "localhost";
$dbname = "db_univ";
$username = "root";
$password = "";
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$query = "SELECT * FROM mahasiswa";
$stmt = $pdo->query($query);
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
echo print_r($arr);
echo "</pre>"

// OUTPUT
/*
  Array
  (
      [id] => 1
      [nim] => 1400501
      [nama] => Riana Putria
      [tempat_lahir] => Padang
      [tanggal_lahir] => 1996-11-23
      [jenis_kelamin] => 
      [fakultas] => FMIPA
      [jurusan] => Kimia
      [ipk] => 3.10
  )
*/
?>