-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2026 at 10:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_admin`, `username`, `password`, `role`) VALUES
(1, 'Admin', '12345', ''),
(2, 'admin', '12345', 'admin'),
(3, 'N-335687', '1234', 'siswa'),
(4, 'N-335688', '1234', 'siswa'),
(5, 'G-005', '1234', 'guru'),
(6, 'G-006', '090909', 'guru'),
(7, 'G-007', '1234', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `detailjadwal`
--

CREATE TABLE `detailjadwal` (
  `id_jadwal` varchar(10) DEFAULT NULL,
  `kd_mapel` varchar(5) DEFAULT NULL,
  `kd_guru` varchar(5) DEFAULT NULL,
  `hari` varchar(15) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time NOT NULL,
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detailjadwal`
--

INSERT INTO `detailjadwal` (`id_jadwal`, `kd_mapel`, `kd_guru`, `hari`, `jam_mulai`, `jam_selesai`, `kelas`) VALUES
('J-008', 'M-001', NULL, 'Jumat', '00:00:00', '00:00:00', '3c'),
('J-009', 'M-002', NULL, 'Senin', '08:00:00', '09:30:00', '2B'),
('J-010', 'M-001', NULL, 'Selasa', '08:00:00', '09:30:00', '2B'),
('J-018', 'M-002', 'G-005', 'Selasa', '08:00:00', '10:00:00', '8'),
('J-019', 'M-001', 'G-006', 'Senin', '08:00:00', '10:00:00', '2B'),
('J-020', 'M-001', 'G-007', 'Kamis', '08:00:00', '09:30:00', '1A');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kd_guru` varchar(5) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `nm_guru` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kd_guru`, `id_user`, `nm_guru`, `jenkel`, `pend_terakhir`, `hp`, `alamat`) VALUES
('G-005', '3', 'Fika Haliza', 'P', 'MAN', '08546738229', 'Lampung'),
('G-006', '2', 'Irsya', 'P', 'SMK', '08236268863', 'Kundi'),
('G-007', '1', 'Edd', 'L', 'SMA', '083843608430', 'SOUTH');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `id_kelas`, `semester`, `tahun_ajaran`) VALUES
('J-008', 'G-006', 'ganjil', '2025-2026'),
('J-009', 'G-006', 'genap', '2025-2026'),
('J-010', 'G-005', 'genap', '2024-2025'),
('J-012', 'G-005', 'ganjil', '2024-2025'),
('J-013', 'G-005', 'ganjil', '2024-2025'),
('J-014', 'G-005', 'ganjil', '2024-2025'),
('J-017', 'Array', 'genap', '2025-2026'),
('J-018', 'G-005', 'ganjil', '2024-2025'),
('J-019', 'G-006', 'ganjil', '2024-2025'),
('J-020', 'G-007', 'ganjil', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `nm_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nm_kelas`) VALUES
('K-001', 'TJKT-1'),
('K-002', 'TJKT-2'),
('K-003', 'DKV-1'),
('K-004', 'DKV-3'),
('K-005', 'gsejrdysted');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kd_mapel` varchar(5) NOT NULL,
  `nm_mapel` varchar(35) NOT NULL,
  `kkm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kd_mapel`, `nm_mapel`, `kkm`) VALUES
('M-001', 'kiki', 80),
('M-002', 'aka', 80);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `id_user` int NOT NULL,
  `nm_siswa` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `id_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_user`, `nm_siswa`, `jenkel`, `hp`, `id_kelas`) VALUES
('N-335686', 2, 'Ijan', 'laki laki', '08236268863', 'DKV-1'),
('N-335687', 1, 'Dedi', 'laki laki', '085841954944', 'DKV-1'),
('N-335688', 3, 'Irsya Eva Safitri', 'Perempuan', '08236268863', 'DKV-1');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_2511500083`
--

CREATE TABLE `skripsi_2511500083` (
  `id_skripsi083` varchar(5) NOT NULL,
  `judul_skripsi083` varchar(50) NOT NULL,
  `topik_083` varchar(20) NOT NULL,
  `semester_083` varchar(20) NOT NULL,
  `thn_ajaran083` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skripsi_2511500083`
--

INSERT INTO `skripsi_2511500083` (`id_skripsi083`, `judul_skripsi083`, `topik_083`, `semester_083`, `thn_ajaran083`) VALUES
('S-003', 'xhdgtfhdgh12', '12', '1`', '2025/2026'),
('S-004', 'pika cantik', 'PIKAAAAAAAAAAAA', '8', '2025/2026'),
('S-005', 'kiki', 'koko', '1`', '2025/2026');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(3, 'guru', '1234', 'guru'),
(4, 'siswa', '1234', 'siswa'),
(5, 'N-335678', '1234', 'siswa'),
(6, 'N-335682', '1234', 'siswa'),
(7, 'N-335678', '1234', 'siswa'),
(8, 'N-335678', '1234', 'siswa'),
(9, 'N-335682', '1234', 'siswa'),
(10, 'N-335683', '1234', 'siswa'),
(11, 'N-335684', '1234', 'siswa'),
(12, 'N-335685', '1234', 'siswa'),
(13, 'N-335684', '1234', 'siswa'),
(14, 'N-335686', '1234', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `detailjadwal`
--
ALTER TABLE `detailjadwal`
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `kd_mapel` (`kd_mapel`),
  ADD KEY `kd_guru` (`kd_guru`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kd_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `skripsi_2511500083`
--
ALTER TABLE `skripsi_2511500083`
  ADD PRIMARY KEY (`id_skripsi083`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailjadwal`
--
ALTER TABLE `detailjadwal`
  ADD CONSTRAINT `detailjadwal_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`kd_jadwal`),
  ADD CONSTRAINT `detailjadwal_ibfk_2` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kd_mapel`),
  ADD CONSTRAINT `detailjadwal_ibfk_3` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
