<?php
include 'koneksi_alfin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai</title>
    <link rel="stylesheet" href="22.css">
</head>
<body>
    <center>
    <div class="container">
    <form action="" method="POST">
        <table>
            <tr>
                <h2>Tambah Data Nilai</h2>
            </tr>
            <tr>
                <th>Nis:</th>
                <td><select class="input" name="nisalfin">
                    <option value="">-- Pilih Siswa --</option>
                    <?php 
                        $datasiswa = mysqli_query($conn, "SELECT * FROM siswa_alfin");
                        while($s = mysqli_fetch_array($datasiswa)) {
                            echo "<option value='".$s['nis_alfin']."'>".$s['nama_alfin']."</option>";
                        }
                        ?>
                </select>
                </td>
            </tr>
            <tr>
                <th>ID Mapel:</th>
                <td><select name="id_mapelalfin">
                    <option value="">-- Pilih Mapel --</option>
                    <?php
                    $datamapel = mysqli_query($conn, "SELECT * FROM mapel_alfin");
                    while($m = mysqli_fetch_array($datamapel)){
                        echo "<option value='".$m['id_mapel_alfin']."'>".$m['nama_mapel_alfin']."</option>";
                    }
                    ?>
                </select></td>
            </tr>
            <tr>
                <th>Nilai Tugas:</th>
                <td><input type="number" name="tugasalfin" placeholder="Masukan Nilai Harian" required></td>
            </tr>
            <tr>
                <th>Nilai UTS:</th>
                <td><input type="number" name="utsalfin" placeholder="Masukkan Nilai UTS" required></td>
            </tr>
            <tr>
                <th>Nilai UAS:</th>
                <td><input type="number" name="uasalfin" placeholder="Masukkan Nilai UAS" required></td>
            </tr>
            <tr>
                <th>Semester:</th>
                <td><select name="semesteralfin">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select></td>
            </tr>
            <tr>
                <th>Tahun Ajaran:</th>
                <td><select name="taalfin">
                    <option value="2024/2025">2024/2025</option>
                    <option value="2025/2026">2025/2026</option>
                    <option value="2026/2027">2026/2027</option>
                </select></td>
            </tr>
        </table>
        <br><button type="submit" name="alfinsimpan" class="button">Simpan</button><br><br>
        <a href="nilai_alfin.php" class="a">&larr; Kembali ke daftar nilai</a>
    </form>
    </div>
    </center>
    <?php
    $query = mysqli_query($conn, 
    "SELECT id_nilai_alfin FROM nilai_alfin
    ORDER BY id_nilai_alfin DESC LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    if ($data) {
        $no = (int) substr($data['id_nilai_alfin'],2,3);
        $no++;
    } else {
        $no = 1;
    }
    $id_nilai = "NL" . str_pad($no,3,"0", STR_PAD_LEFT);
    //str_pad(string,panjang,karakter,arah)












    if (isset($_POST['alfinsimpan'])){
        //$id_nilai = $_POST['id_nilai'];
        $nisalfin = $_POST['nisalfin'];
        $id_mapelalfin = $_POST['id_mapelalfin'];
        $nilaitugasalfin = $_POST['tugasalfin'];
        $nilaiutsalfin = $_POST['utsalfin'];
        $nilaiuasalfin = $_POST['uasalfin'];
        $naalfin = ($nilaitugasalfin + $nilaiutsalfin + $nilaiuasalfin) / 3;
        $deskalfin = ($_POST['deskalfin']);
        $semesteralfin = $_POST['semesteralfin'];
        $taalfin = $_POST['taalfin'];
                if ($naalfin>=85) {
            $deskalfin="Sangat Baik";

        } else if ($naalfin >75) {
            $deskalfin="Baik";
        } else {
            $deskalfin="Buruk";
        }   

        $cekalfin = mysqli_query($conn, "SELECT * FROM nilai_alfin WHERE id_nilai_alfin='$id_nilai'");
        if (mysqli_num_rows($cekalfin) > 0) {
            echo "<script>alert('Nilai Siswa tersebut sudah terdaftar, silakan isi dengan Siswa lain!');
            window.location='tambah_alfin_raport.php';</script>";
        } else {
            $sql = "INSERT INTO nilai_alfin (id_nilai_alfin, nis_alfin, id_mapel_alfin, nilai_tugas_alfin, nilai_uts_alfin, nilai_uas_alfin, nilai_akhir_alfin, deskripsi_alfin, semester_alfin, tahun_ajaran_alfin) VALUES ('$id_nilai', '$nisalfin', '$id_mapelalfin', '$nilaitugasalfin', '$nilaiutsalfin', '$nilaiuasalfin', '$naalfin', '$deskalfin', '$semesteralfin', '$taalfin')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Data Berhasil Disimpan!');
                window.location='nilai_alfin.php';</script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan!');
                window.location='tambah_alfin.php';</script>";
            }
        }
    }
    ?>
</body>
</html>