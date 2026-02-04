<?php
require('fpdf.php');
include 'koneksi_alfin.php'; 

$pdf = new FPDF('P','mm','A4');
$pdf->SetAutoPageBreak(true, 10);

// Ambil NIS dari parameter GET
if (isset($_GET['nis'])) {
    $nis_siswa = mysqli_real_escape_string($conn, $_GET['nis']);
    $query_siswa = mysqli_query($conn, "SELECT * FROM siswa_alfin WHERE nis_alfin = '$nis_siswa'");
} else {
    die('NIS siswa tidak ditemukan!');
}

while($siswa = mysqli_fetch_array($query_siswa)){
    $pdf->AddPage();
    $nis_siswa = $siswa['nis_alfin'];

    // --- HEADER & IDENTITAS (Sama seperti sebelumnya) ---
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 7, 'LAPORAN HASIL BELAJAR (RAPORT)', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(30, 6, 'Nama Siswa', 0, 0); $pdf->Cell(5, 6, ':', 0, 0); $pdf->Cell(70, 6, $siswa['nama_alfin'], 0, 0);
    $pdf->Cell(30, 6, 'NIS', 0, 0);         $pdf->Cell(5, 6, ':', 0, 0); $pdf->Cell(70, 6, $siswa['nis_alfin'], 0, 0);
    $pdf->Ln(7);

    // --- TABEL NILAI ---
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(230, 230, 230);
    $pdf->Cell(15, 10, 'No', 1, 0, 'C', true);
    $pdf->Cell(95, 10, 'Mata Pelajaran', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Nilai Akhir', 1, 0, 'C', true); 
    $pdf->Cell(50, 10, 'Keterangan', 1, 1, 'C', true);

    $pdf->SetFont('Arial', '', 10);
    $no = 1;
    $sql_nilai = "SELECT * FROM nilai_alfin 
                  INNER JOIN mapel_alfin ON nilai_alfin.id_mapel_alfin = mapel_alfin.id_mapel_alfin 
                  WHERE nilai_alfin.nis_alfin = '$nis_siswa'";
    $query_nilai = mysqli_query($conn, $sql_nilai);
    
    while($nilai = mysqli_fetch_array($query_nilai)){
        $pdf->Cell(15, 8, $no++, 1, 0, 'C');
        $pdf->Cell(95, 8, ' '.$nilai['nama_mapel_alfin'], 1, 0);
        $pdf->Cell(30, 8, $nilai['nilai_akhir_alfin'], 1, 0, 'C');
        $pdf->Cell(50, 8, ' '.$nilai['deskripsi_alfin'], 1, 1);
    }

    $pdf->Ln(10);

    // --- AMBIL DATA ABSENSI DARI TABEL KHUSUS ---
    $q_absen = mysqli_query($conn, "SELECT * FROM absensi_alfin WHERE nis_alfin = '$nis_siswa' LIMIT 1");
    $absen = mysqli_fetch_array($q_absen);
    $s = isset($absen['sakit_alfin']) ? $absen['sakit_alfin'] : 0;
    $i = isset($absen['izin_alfin']) ? $absen['izin_alfin'] : 0;
    $a = isset($absen['alfa_alfin']) ? $absen['alfa_alfin'] : 0;

    // --- TAMPILAN TABEL ABSENSI ---
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 8, 'KETIDAKHADIRAN', 1, 1, 'C', true);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(45, 8, ' Sakit', 1, 0); $pdf->Cell(15, 8, $s . ' Hari', 1, 1, 'C');
    $pdf->Cell(45, 8, ' Izin', 1, 0);  $pdf->Cell(15, 8, $i . ' Hari', 1, 1, 'C');
    $pdf->Cell(45, 8, ' Tanpa Keterangan', 1, 0); $pdf->Cell(15, 8, $a . ' Hari', 1, 1, 'C');

    // --- TANDA TANGAN (Kiri: Orang Tua, Kanan: Wali Kelas) ---
    $pdf->Ln(15);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(60, 6, 'Mengetahui,', 0, 0, 'C');
    $pdf->Cell(70);
    $pdf->Cell(60, 6, 'Cimahi, ' . date('d M Y'), 0, 1, 'C');
    
    $pdf->Cell(60, 6, 'Orang Tua/Wali,', 0, 0, 'C');
    $pdf->Cell(70);
    $pdf->Cell(60, 6, 'Wali Kelas,', 0, 1, 'C');

    $pdf->Ln(20);
    
    $pdf->Cell(60, 6, '(....................................)', 0, 0, 'C');
    $pdf->Cell(70);
    $pdf->SetFont('Arial', 'BU', 11);
    $pdf->Cell(60, 6, 'Alfin Bathosan, S.Pd', 0, 1, 'C');
}

$pdf->Output('I', 'Raport_Siswa_Alfin.pdf');
?>