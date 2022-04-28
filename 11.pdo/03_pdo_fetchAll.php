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
?>