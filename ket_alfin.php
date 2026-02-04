<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="22.css">
</head>
<body>
    <center>
    <div class="container">
    <?php
        include 'koneksi_alfin.php';
        $nilai = $_GET['id_nilai_alfin'];
        $datanilai = mysqli_query($conn, "SELECT * FROM nilai_alfin WHERE id_nilai_alfin='$nilai'");
        $datasiswa = mysqli_query($conn, "SELECT * FROM siswa_alfin");
        $datamapel = mysqli_query($conn, "SELECT * FROM mapel_alfin");
        while ($dn = mysqli_fetch_array($datanilai)) {
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <h2>Edit Data Nilai</h2>
            </tr>
            <tr>
                <td>ID Nilai:</td>
                <td> <input class="input" readonly type="text" name="id_nilaialfin" value="<?php echo $dn['id_nilai_alfin']?>" required></td>
            </tr>
            <tr>
                <td>NIS:</td>
                <td> <input class="input" readonly type="text" name="nisalfin" value="<?php echo $dn['nis_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Mapel:</td>
                <td> <input class="input" readonly type="text" name="mapelalfin" value="<?php echo $dn['id_mapel_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Nilai Tugas:</td>
                <td><input class="input" type="number" name="tugasalfin" placeholder="Masukan Nilai Tugas" value="<?php echo $dn['nilai_tugas_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Nilai UTS:</td>
                <td><input class="input" type="number" name="utsalfin" placeholder="Masukkan Nilai UTS" value="<?php echo $dn['nilai_uts_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Nilai UAS:</td>
                <td><input class="input" type="number" name="uasalfin" placeholder="Masukkan Nilai UAS" value="<?php echo $dn['nilai_uas_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Deskripsi:</td>
                <td><input class="input" type="text" name="deskalfin" placeholder="Masukkan Deskripsi" value="<?php echo $dn['deskripsi_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Semester:</td>
                <td><input class="input" type="text" name="semesteralfin" placeholder="Masukkan Semester" value="<?php echo $dn['semester_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Tahun Ajaran:</td>
                <td><input class="input" type="date" name="tahunalfin" placeholder="Masukkan Tahun Ajaran" value="<?php echo $dn['tahun_ajaran_alfin']?>" required></td>
            </tr>
        </table>
            <br><button type="submit" name="alfinupdate" class="button">Update</button><br><br>
            <a href="nilai_alfin.php" class="a">&larr; kembali ke daftar nilai</a>
        
    </form>
    <?php
        }
    ?>
    </div>
    </center>
    <?php 
        include 'koneksi_alfin.php';
        if (isset($_POST['alfinupdate'])) {
            $id_nilaialfin = $_POST['id_nilaialfin'];
            $nisalfin = $_POST['nisalfin'];
            $id_mapelalfin = $_POST['mapelalfin'];
            $tugasalfin = $_POST['tugasalfin'];
            $utsalfin = $_POST['utsalfin'];
            $uasalfin = $_POST['uasalfin'];
            $naalfin = ($tugasalfin + $utsalfin + $uasalfin) / 3;
            $deskalfin = $_POST['deskalfin'];
            $semesteralfin = $_POST['semesteralfin'];
            $taalfin = $_POST['tahunalfin'];


            $updatealfin = "UPDATE nilai_alfin SET id_nilai_alfin='$id_nilaialfin', nis_alfin='$nisalfin', id_mapel_alfin='$id_mapelalfin', nilai_tugas_alfin='$tugasalfin', nilai_uts_alfin='$utsalfin', nilai_uas_alfin='$uasalfin', nilai_akhir_alfin='$naalfin', deskripsi_alfin='$deskalfin',semester_alfin='$semesteralfin',tahun_ajaran_alfin='$taalfin'
                WHERE id_nilai_alfin='$id_nilaialfin'";
            if (mysqli_query($conn, $updatealfin)) {
                echo "<script>alert('Data Berhasil Diupdate!');
                    window.location='nilai_alfin.php';</script>";
            }
            exit;
        }
    ?>
</body>
</html>