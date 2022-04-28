<?php
  mysqli_report(MYSQLI_REPORT_STRICT);

  try {
    $mysqli = new mysqli("localhost", "root", "");

    $query = "DROP DATABASE IF EXISTS db_univ";
    $mysqli->query($query);
    if ($mysqli->error){
      throw new Exception($mysqli->error, $mysqli->errno);
    }

    // create db_univ if it's not exist
    $query = "CREATE DATABASE IF NOT EXISTS db_univ";
    $mysqli->query($query);
    if ($mysqli->error){
      throw new Exception($mysqli->error, $mysqli->errno);
    }
    else {
      echo "<li>Create Database <b>db_univ</b></li>";
    };

    // select db_univ database
    $mysqli->select_db("db_univ");
    if ($mysqli->error){
      throw new Exception($mysqli->error, $mysqli->errno);
    }
    else {
      echo "<li>Database <b>db_univ</b> selected</li>";
    };

    // Drop table if exists
    $query = "DROP TABLE IF EXISTS mahasiswa";
    $mysqli->query($query);
    if ($mysqli->error){
      throw new Exception($mysqli->error, $mysqli->errno);
    }

    // create mahasiswa table
    $query  = "CREATE TABLE mahasiswa (id int NOT NULL AUTO_INCREMENT, nim CHAR(7), nama VARCHAR(100), ";
    $query .= "tempat_lahir VARCHAR(50), tanggal_lahir DATE, jenis_kelamin varchar(50), ";
    $query .= "fakultas VARCHAR(50), jurusan VARCHAR(50), ";
    $query .= "ipk DECIMAL(3,2), PRIMARY KEY (id))";
    $mysqli->query($query);
    if ($mysqli->error){
      throw new Exception($mysqli->error, $mysqli->errno);
    }
    else {
      echo "<li>Create table <b>mahasiswa</b></li>";
    };

    // insert data to mahasiswa table
    $query  = "INSERT INTO mahasiswa (nim, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, fakultas, jurusan, ipk) VALUES ";
    $query .= "('1904499', 'Imam Firdaus Dwimeianto', 'Majalengka', '2000-05-15', ";
    $query .= "'Laki-laki', 'FPMIPA', 'Ilmu Komputer', 3.8), ";
    $query .= "('1805566', 'Zahra Elgysha', 'Bandung', '1999-01-06', ";
    $query .= "'Perempuan','FPIPS', 'Ilmu Komunikasi', 3.9), ";
    $query .= "('1704455', 'Uzukami Nartanto', 'Cikampek', '1998-11-11', ";
    $query .= "'Laki-laki', 'FPBS', 'Bahasa dan Sastra Inggris', 3.2), ";
    $query .= "('1608497', 'Rio Lebaran', 'Cirebon', '1997-05-28', ";
    $query .= "'Laki-laki', 'FPTK', 'Teknik Elektro', 3.1), ";
    $query .= "('1908877', 'Listya Kusnadi', 'Medan', '2000-07-02', ";
    $query .= "'Perempuan', 'FPEB','Manajemen', 2.9)";
    $mysqli->query($query);
    if ($mysqli->error){
      throw new Exception($mysqli->error, $mysqli->errno);
    }
    else {
      echo "<li>fill <b>mahasiswa</b> table</li>";
    };
  }
  catch (Exception $e) {
    echo "<p>Error: ".$e->getMessage()." (".$e->getCode().")</p>";
  }
  finally {
    if (isset($mysqli)) {
      $mysqli->close();
    }
  }
?>
