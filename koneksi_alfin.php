<?php
$serveralfin = "localhost";
$useralfin = "root";
$passwordalfin = "";
$databasealfin = "dbrapor_alfin" ;

$conn = new mysqli ($serveralfin, $useralfin, $passwordalfin, $databasealfin);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>