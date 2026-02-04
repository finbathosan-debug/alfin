<?php

include 'koneksi_alfin.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  tr:hover {
    background-color: rgb(236, 236, 236);
  }

  th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #ddd;
    color: black;
  }

  h2 {
    text-align: center;
  }

  .button {
    background-color: rgb(41, 123, 247);
    border: none;
    color: white;
    padding: 3px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  .button:hover {
    background-color: rgb(0, 102, 255);
  }

  .button1 {
    background-color: rgb(60, 247, 76);
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  .button1:hover {
    background-color: rgb(21, 247, 0);
  }

  .button2 {
    background-color: rgb(247, 48, 41);
    border: none;
    color: white;
    padding: 3px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  .button2:hover {
    background-color: rgb(245, 0, 0);
  }
  .button3 {
    background-color: rgb(147, 41, 247);
    border: none;
    color: white;
    padding: 3px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  .button3:hover {
    background-color: rgb(132, 0, 255);
  }
</style>
<center>
  <br>
<h1>Data Nilai Siswa</h1>
</center>
<a href="tambah_alfin.php" class="button1">+ Tambah Data </a>
<center>
<body>
<form method="get" style="margin-bottom:20px; text-align:center;">
    Tahun Ajaran:
    <select name="tahun_ajaran">
        <option value="">-- Semua --</option>
        <?php
        $qtahun = mysqli_query($conn, "SELECT DISTINCT tahun_ajaran_alfin FROM nilai_alfin ORDER BY tahun_ajaran_alfin DESC");
        while($t = mysqli_fetch_assoc($qtahun)){
            $sel = (isset($_GET['tahun_ajaran']) && $_GET['tahun_ajaran'] == $t['tahun_ajaran_alfin']) ? 'selected' : '';
            echo "<option value='{$t['tahun_ajaran_alfin']}' $sel>{$t['tahun_ajaran_alfin']}</option>";
        }
        ?>
    </select>
    <button type="submit" class="button">Filter</button>
    <a href="nilai_alfin.php" class="button" style="text-decoration:none;">Reset</a>
</form>
        <table border="1">
        <tr>
            <th>Id Nilai</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Id Mapel</th>
            <th>Nilai<br> Tugas</th>
            <th>Nilai<br> Uts</th>
            <th>Nilai<br> Uas</th>
            <th>Nilai<br> Akhir</th>
            <th>Deskripsi</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>OPSI</th>
        </tr>
        <?php 

$where = [];
if (isset($_GET['tahun_ajaran']) && $_GET['tahun_ajaran'] != '') {
    $where[] = "nilai_alfin.tahun_ajaran_alfin = '".mysqli_real_escape_string($conn, $_GET['tahun_ajaran'])."'";
}
$where_sql = '';
if (count($where) > 0) {
    $where_sql = 'WHERE ' . implode(' AND ', $where);
}

$data = mysqli_query($conn,"SELECT 
    nilai_alfin.id_nilai_alfin, 
    siswa_alfin.nis_alfin, 
    siswa_alfin.nama_alfin, 
    mapel_alfin.nama_mapel_alfin,
    nilai_alfin.nilai_tugas_alfin, 
    nilai_alfin.nilai_uts_alfin, 
    nilai_alfin.nilai_uas_alfin,
    nilai_alfin.nilai_akhir_alfin, 
    nilai_alfin.deskripsi_alfin, 
    nilai_alfin.semester_alfin, 
    nilai_alfin.tahun_ajaran_alfin
    FROM nilai_alfin 
    INNER JOIN siswa_alfin ON nilai_alfin.nis_alfin = siswa_alfin.nis_alfin 
    INNER JOIN mapel_alfin ON mapel_alfin.id_mapel_alfin = nilai_alfin.id_mapel_alfin
    $where_sql
    ORDER BY nilai_alfin.id_nilai_alfin DESC
");

while($d = mysqli_fetch_array($data)){
?>
    <tr>
        <td><?php echo $d['id_nilai_alfin']; ?></td>
        <td><?php echo $d['nis_alfin']; ?></td>
        <td><?php echo $d['nama_alfin']; ?></td>
        <td><?php echo $d['nama_mapel_alfin']; ?></td>
        <td><?php echo $d['nilai_tugas_alfin']; ?></td>
        <td><?php echo $d['nilai_uts_alfin']; ?></td>
        <td><?php echo $d['nilai_uas_alfin']; ?></td>
        <td><?php echo $d['nilai_akhir_alfin']; ?></td>
        <td><?php echo $d['deskripsi_alfin']; ?></td>
        <td><?php echo $d['semester_alfin']; ?></td>
        <td><?php echo $d['tahun_ajaran_alfin']; ?></td>
        <td>
            <a href="edit_alfin.php?id_nilai_alfin=<?php echo $d['id_nilai_alfin']; ?>" class="button">EDIT</a>
            <a href="hapus_alfin.php?id_nilai_alfin=<?=$d['id_nilai_alfin']; ?>" class="button2" onclick="return confirm('Apa Anda Yakin Akan Menghapus Data Ini?')">Hapus</a>
            <a href="lihatnilai_alfin.php?id_nilai_alfin=<?php echo $d['id_nilai_alfin']; ?>" class="button3">Lihat</a>
        </td>
    </tr>
<?php 
}
?>
      <a href="cetak_all_alfin.php" class="button" target="_blank">CETAK SEMUA</a>   
    </table>
    </center>
</body>
</html>