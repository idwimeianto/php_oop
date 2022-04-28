<?php
try {
  $host = "localhost";
  $dbname = "db_univ";
  $username = "root";
  $password = "";
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
catch (\PDOException $e) {
  echo "Koneksi / Query bermasalah: ".$e->getMessage(). " (".$e->getCode().")";
}
finally {
  $pdo=NULL;
}