<?php
$serveralfin = "localhost";
$useralfin = "root";
$passwordalfin = "";
$databasealfin = "alfindb_finish" ;

$conn = new mysqli ($serveralfin, $useralfin, $passwordalfin, $databasealfin);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>