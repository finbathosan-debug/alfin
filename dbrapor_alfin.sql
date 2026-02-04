-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrapor_alfin`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_alfin`
--

CREATE TABLE `absensi_alfin` (
  `id_absen_alfin` int(10) NOT NULL,
  `sakit_alfin` varchar(11) NOT NULL,
  `izin_alfin` varchar(11) NOT NULL,
  `alfa_alfin` varchar(11) NOT NULL,
  `nis_alfin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_alfin`
--

INSERT INTO `absensi_alfin` (`id_absen_alfin`, `sakit_alfin`, `izin_alfin`, `alfa_alfin`, `nis_alfin`) VALUES
(1, '1 Hari', '1 Hari', '1 Hari', 1),
(2, '2 Hari', '2 Hari', '2 Hari', 2),
(3, '3 Hari', '3 Hari', '3 Hari', 3),
(4, '0 Hari', '0 Hari', '0 Hari', 4);

-- --------------------------------------------------------

--
-- Table structure for table `guru_alfin`
--

CREATE TABLE `guru_alfin` (
  `id_guru_alfin` int(10) NOT NULL,
  `nama_guru_alfin` varchar(35) NOT NULL,
  `jeniskelamin_guru_alfin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru_alfin`
--

INSERT INTO `guru_alfin` (`id_guru_alfin`, `nama_guru_alfin`, `jeniskelamin_guru_alfin`) VALUES
(1, 'Dadang', 'laki-laki'),
(2, 'Dudung', 'perempuan'),
(3, 'Dedeng', 'laki-laki'),
(4, 'Dodong', 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_alfin`
--

CREATE TABLE `kelas_alfin` (
  `id_kelas_alfin` int(10) NOT NULL,
  `nama_kelas_alfin` varchar(10) NOT NULL,
  `id_guru_alfin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas_alfin`
--

INSERT INTO `kelas_alfin` (`id_kelas_alfin`, `nama_kelas_alfin`, `id_guru_alfin`) VALUES
(1, 'E-01', 1),
(2, 'E-02', 3),
(3, 'E-03', 4),
(4, 'E-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mapel_alfin`
--

CREATE TABLE `mapel_alfin` (
  `id_mapel_alfin` int(10) NOT NULL,
  `nama_mapel_alfin` varchar(25) NOT NULL,
  `kkm_alfin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel_alfin`
--

INSERT INTO `mapel_alfin` (`id_mapel_alfin`, `nama_mapel_alfin`, `kkm_alfin`) VALUES
(1, 'bahasa china', 75),
(2, 'bahasa inggris', 75),
(3, 'bahasa jepang', 75),
(4, 'bahasa korea', 75);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alfin`
--

CREATE TABLE `nilai_alfin` (
  `id_nilai_alfin` varchar(10) NOT NULL,
  `nis_alfin` int(8) NOT NULL,
  `id_mapel_alfin` int(10) NOT NULL,
  `nilai_tugas_alfin` int(3) NOT NULL,
  `nilai_uts_alfin` int(3) NOT NULL,
  `nilai_uas_alfin` int(3) NOT NULL,
  `nilai_akhir_alfin` int(3) NOT NULL,
  `deskripsi_alfin` varchar(225) NOT NULL,
  `semester_alfin` enum('ganjil','genap') NOT NULL,
  `tahun_ajaran_alfin` enum('2024/2025','2025/2026','2026/2027') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_alfin`
--

INSERT INTO `nilai_alfin` (`id_nilai_alfin`, `nis_alfin`, `id_mapel_alfin`, `nilai_tugas_alfin`, `nilai_uts_alfin`, `nilai_uas_alfin`, `nilai_akhir_alfin`, `deskripsi_alfin`, `semester_alfin`, `tahun_ajaran_alfin`) VALUES
('NL001', 1, 1, 90, 80, 78, 83, 'Baik', 'ganjil', '2024/2025'),
('NL002', 1, 2, 89, 79, 96, 88, 'Sangat Baik', 'ganjil', '2024/2025'),
('NL003', 1, 3, 88, 87, 89, 88, 'Sangat Baik', 'ganjil', '2024/2025'),
('NL004', 1, 4, 90, 94, 85, 90, 'Sangat Baik', 'ganjil', '2024/2025'),
('NL005', 2, 1, 87, 88, 68, 81, 'Baik', 'ganjil', '2024/2025'),
('NL006', 2, 2, 77, 68, 89, 78, 'Baik', 'ganjil', '2024/2025'),
('NL007', 2, 3, 88, 89, 87, 88, 'Sangat Baik', 'ganjil', '2024/2025'),
('NL008', 2, 4, 79, 79, 90, 83, 'Baik', 'ganjil', '2024/2025'),
('NL009', 3, 1, 88, 88, 88, 88, 'Sangat Baik', 'ganjil', '2024/2025'),
('NL010', 3, 2, 97, 94, 87, 93, 'Sangat Baik', 'ganjil', '2024/2025'),
('NL011', 3, 3, 77, 67, 78, 74, 'Buruk', 'ganjil', '2024/2025');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_alfin`
--

CREATE TABLE `siswa_alfin` (
  `nis_alfin` int(8) NOT NULL,
  `nama_alfin` varchar(35) NOT NULL,
  `tempatlahir_alfin` varchar(50) NOT NULL,
  `tanggallahir_alfin` date NOT NULL,
  `alamat_alfin` varchar(50) NOT NULL,
  `id_kelas_alfin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_alfin`
--

INSERT INTO `siswa_alfin` (`nis_alfin`, `nama_alfin`, `tempatlahir_alfin`, `tanggallahir_alfin`, `alamat_alfin`, `id_kelas_alfin`) VALUES
(1, 'Fulan Satu', 'Mobil', '1980-03-10', 'Pakuhaji City', 1),
(2, 'Fulan Dua', 'wc', '1988-05-20', 'Jaksel', 2),
(3, 'Fulan Tiga', 'Kasur', '1933-01-14', 'Jakbar', 3),
(4, 'Persib', 'GBLA', '1933-01-01', 'Bandung', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_alfin`
--

CREATE TABLE `users_alfin` (
  `id_alfin` int(10) NOT NULL,
  `username_alfin` int(8) NOT NULL,
  `password_alfin` varchar(8) NOT NULL,
  `role_alfin` enum('admin','guru','walikelas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_alfin`
--

INSERT INTO `users_alfin` (`id_alfin`, `username_alfin`, `password_alfin`, `role_alfin`) VALUES
(1, 10243280, '123', 'admin'),
(2, 10243281, '1234', 'guru'),
(3, 10243282, '12345', 'walikelas'),
(4, 10243283, '123456', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_alfin`
--
ALTER TABLE `absensi_alfin`
  ADD PRIMARY KEY (`id_absen_alfin`),
  ADD KEY `fk6` (`nis_alfin`);

--
-- Indexes for table `guru_alfin`
--
ALTER TABLE `guru_alfin`
  ADD PRIMARY KEY (`id_guru_alfin`);

--
-- Indexes for table `kelas_alfin`
--
ALTER TABLE `kelas_alfin`
  ADD PRIMARY KEY (`id_kelas_alfin`),
  ADD KEY `fk4` (`id_guru_alfin`);

--
-- Indexes for table `mapel_alfin`
--
ALTER TABLE `mapel_alfin`
  ADD PRIMARY KEY (`id_mapel_alfin`);

--
-- Indexes for table `nilai_alfin`
--
ALTER TABLE `nilai_alfin`
  ADD PRIMARY KEY (`id_nilai_alfin`),
  ADD KEY `fk2` (`nis_alfin`),
  ADD KEY `fk3` (`id_mapel_alfin`);

--
-- Indexes for table `siswa_alfin`
--
ALTER TABLE `siswa_alfin`
  ADD PRIMARY KEY (`nis_alfin`),
  ADD KEY `fk1` (`id_kelas_alfin`);

--
-- Indexes for table `users_alfin`
--
ALTER TABLE `users_alfin`
  ADD PRIMARY KEY (`id_alfin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_alfin`
--
ALTER TABLE `absensi_alfin`
  MODIFY `id_absen_alfin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru_alfin`
--
ALTER TABLE `guru_alfin`
  MODIFY `id_guru_alfin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas_alfin`
--
ALTER TABLE `kelas_alfin`
  MODIFY `id_kelas_alfin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapel_alfin`
--
ALTER TABLE `mapel_alfin`
  MODIFY `id_mapel_alfin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa_alfin`
--
ALTER TABLE `siswa_alfin`
  MODIFY `nis_alfin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_alfin`
--
ALTER TABLE `users_alfin`
  MODIFY `id_alfin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_alfin`
--
ALTER TABLE `absensi_alfin`
  ADD CONSTRAINT `fk6` FOREIGN KEY (`nis_alfin`) REFERENCES `siswa_alfin` (`nis_alfin`);

--
-- Constraints for table `kelas_alfin`
--
ALTER TABLE `kelas_alfin`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`id_guru_alfin`) REFERENCES `guru_alfin` (`id_guru_alfin`);

--
-- Constraints for table `nilai_alfin`
--
ALTER TABLE `nilai_alfin`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`nis_alfin`) REFERENCES `siswa_alfin` (`nis_alfin`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`id_mapel_alfin`) REFERENCES `mapel_alfin` (`id_mapel_alfin`);

--
-- Constraints for table `siswa_alfin`
--
ALTER TABLE `siswa_alfin`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_kelas_alfin`) REFERENCES `kelas_alfin` (`id_kelas_alfin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
