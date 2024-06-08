-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 05:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-collage`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `Username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `prodi` varchar(20) NOT NULL,
  `matkul` varchar(20) NOT NULL,
  `jumlah_sks` int(10) NOT NULL,
  `jam_matkul` varchar(20) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `kd_matkul` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `nim` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_matkul` int(20) NOT NULL,
  `nilai1` int(10) NOT NULL,
  `nilai2` int(10) NOT NULL,
  `kuis1` int(10) NOT NULL,
  `kuis2` int(10) NOT NULL,
  `uts` int(10) NOT NULL,
  `uas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `kd_matkul` varchar(20) NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_presensi`
--

INSERT INTO `tb_presensi` (`kd_matkul`, `prodi`, `kelas`, `materi`) VALUES
('as', 'dfgdhf', 'C', 'UTS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_register`
--

CREATE TABLE `tb_register` (
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`kd_matkul`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kd_matkul` (`kd_matkul`);

--
-- Indexes for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`kd_matkul`),
  ADD KEY `kd_matkul` (`kd_matkul`);

--
-- Indexes for table `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `tb_register` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD CONSTRAINT `tb_pengajar_ibfk_1` FOREIGN KEY (`kd_matkul`) REFERENCES `tb_presensi` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
