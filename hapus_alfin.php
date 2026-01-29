<?php 
include 'koneksi_alfin.php';
 
$id_nilai = $_GET['id_nilai_alfin'];
 
mysqli_query($conn,"delete from nilai_alfin where id_nilai_alfin='$id_nilai'");
 
header("location:nilai_alfin.php");
 
?>