<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table.P,td,th {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 85%;
    padding:8px;
    border:1px solid;

  }
</style>
<center>
<h1>Rapot</h1>
</center>
<body>
    <center>
    <div class="container">
    <?php
        include 'koneksi_alfin.php';
        $nilaiA = $_GET['id_nilai_alfin'];
        $data = mysqli_query($conn,"SELECT siswa_alfin.nis_alfin,siswa_alfin.nama_alfin, mapel_alfin.nama_mapel_alfin, mapel_alfin.kkm_alfin,
         nilai_alfin.nilai_tugas_alfin, nilai_alfin.nilai_uts_alfin, nilai_alfin.nilai_uas_alfin, nilai_alfin.nilai_akhir_alfin, nilai_alfin.deskripsi_alfin, 
         nilai_alfin.semester_alfin, nilai_alfin.tahun_ajaran_alfin FROM nilai_alfin INNER JOIN siswa_alfin ON nilai_alfin.nis_alfin = siswa_alfin.nis_alfin
          INNER JOIN mapel_alfin ON mapel_alfin.id_mapel_alfin = nilai_alfin.id_mapel_alfin WHERE id_nilai_alfin='$nilaiA';");
        while ($dn = mysqli_fetch_array($data)) {
    ?>
    <form action="" method="POST">
        <table class='P'>
            <tr>
                <h2></h2>
            </tr>
            <tr>
                <th>Nis:</th>
                <td><?php echo $dn['nis_alfin']?></td>
            </tr>
            <tr>
                <th>Nama:</th>
                <td><?php echo $dn['nama_alfin']?></td>
            </tr>
            <tr>
                <th>Semester:</th>
                <td><?php echo $dn['semester_alfin']?></td>
            </tr>
            <tr>
                <th>Tahun Ajaran:</th>
                <td><?php echo $dn['tahun_ajaran_alfin']?></td>
            </tr>
            <tr>
                <th>Nilai Tugas:</th>
                <td><?php echo $dn['nilai_tugas_alfin']?></td>
            </tr>
            <tr>
                <th>Nilai UTS:</th>
                <td><?php echo $dn['nilai_uts_alfin']?></td>
            </tr>
            <tr>
                <th>Nilai UAS:</th>
                <td><?php echo $dn['nilai_uas_alfin']?></td>
            </tr>
            <tr>
                <th>Deskripsi:</th>
                <td><?php echo $dn['deskripsi_alfin']?></td>
            </tr>
        </table>
        <a href="cetak_alfin.php?nis=<?php echo $dn['nis_alfin']; ?>" target="_blank">CETAK</a>
    </form>
    <?php
        }
    ?>
    </div>
    </center>
</body>
</html>