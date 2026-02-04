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
                <td> <input readonly type="text" name="id_nilaialfin" value="<?php echo $dn['id_nilai_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Nis:</td>
                <td>
                    <select  name="nisalfin" required>
                        <option value="">-- Pilih Siswa --</option>
                        <?php 
                        mysqli_data_seek($datasiswa, 0);
                        while($ds = mysqli_fetch_array($datasiswa)) { 
                            $selected = ($ds['nis_alfin'] == $dn['nis_alfin']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $ds['nis_alfin']; ?>" <?php echo $selected; ?>>
                                <?php echo $ds['nama_alfin']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Mapel:</td>
                <td>
                    <select name="mapelalfin" required>
                        <option value="">-- Pilih Guru --</option>
                        <?php 
                        mysqli_data_seek($datamapel, 0);
                        while($dm = mysqli_fetch_array($datamapel)) { 
                            $selected = ($dm['id_mapel_alfin'] == $dn['id_mapel_alfin']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $dm['id_mapel_alfin']; ?>" <?php echo $selected; ?>>
                                <?php echo $dm['nama_mapel_alfin']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nilai Tugas:</td>
                <td><input type="number" name="tugasalfin" placeholder="Masukan Nilai Tugas" value="<?php echo $dn['nilai_tugas_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Nilai UTS:</td>
                <td><input type="number" name="utsalfin" placeholder="Masukkan Nilai UTS" value="<?php echo $dn['nilai_uts_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Nilai UAS:</td>
                <td><input type="number" name="uasalfin" placeholder="Masukkan Nilai UAS" value="<?php echo $dn['nilai_uas_alfin']?>" required></td>
            </tr>
            <tr>
                <td>Semester:</td>
                <td><select name="semesteralfin1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select></td>
            </tr>
            <tr>
                <td>Tahun Ajaran:</td>
                <td><select name="tahunalfin">
                    <option value="2024/2025">2024/2025</option>
                    <option value="2025/2026">2025/2026</option>
                    <option value="2026/2027">2026/2027</option>
                </select></td>
            </tr>
        </table>
            <br><button type="submit" name="alfinupdate">Update</button><br><br>
            <a href="nilai_alfin.php" >&larr; kembali ke daftar nilai</a>
        
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
            $semesteralfin = $_POST['semesteralfin1'];
            $taalfin = $_POST['tahunalfin'];
            if ($naalfin>=85) {
            $deskalfin="Sangat Baik";

        } else if ($naalfin >75) {
            $deskalfin="Baik";
        } else {
            $deskalfin="Buruk";
        }   


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