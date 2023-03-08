-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 05:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masyarakat`
--

CREATE TABLE `tbl_masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `level`) VALUES
('112313', 'Muhammad Noor Ilham', 'ilham123', 'e10adc3949ba59abbe56e057f20f883e', '0812678323', 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `judul_laporan` varchar(50) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `foto`, `status`) VALUES
(15, '2023-03-07', '112313', 'Orang Utan Tersesat', 'Ditemukan orang utan dan anaknya nyasar ke rumah warga setempat diduga karena habitatnya telah diambil alih oleh perusahaan asing', '465-orang utan nyasar.jpg', 'selesai'),
(16, '2023-03-07', '112313', 'Kucing Nyangkut', 'Kucing nyangkut di spion mobil dekat kantor desa sunda empire', '511-kucing nyangkut.jpg', '0'),
(18, '2023-03-07', '112313', 'Jalan Berlubang', 'sad', '276-jalan berlubang.jpg', '0'),
(19, '2023-03-07', '112313', 'Jalan Rusak', 'adas', '313-banjir.jpg', '0'),
(20, '2023-03-07', '112313', 'Jalan Rusak', 'adas', '225-banjir.jpg', '0'),
(21, '2023-03-07', '112313', 'Jalan Rusak', 'adas', '596-banjir.jpg', 'proses'),
(22, '2023-03-07', '112313', 'Jalan Rusak', 'adas', '966-banjir.jpg', '0'),
(23, '2023-03-07', '112313', 'Jalan Rusak', 'adas', '579-banjir.jpg', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin', 'admin', '0192023a7bbd73250516f069df18b500', '1234567', 'admin'),
(2, 'petugas', 'petugas', '570c396b3fc856eceb8aa7357f32af1a', '12346266', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanggapan`
--

CREATE TABLE `tbl_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tanggapan`
--

INSERT INTO `tbl_tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_pengaduan`, `tanggapan`, `id_petugas`) VALUES
(1, 12, '2023-03-07', 'Segera dilaksanakan', 1),
(2, 13, '2023-03-07', 'asddad', 1),
(3, 13, '2023-03-07', '', 1),
(4, 13, '2023-03-07', '31313', 1),
(5, 15, '2023-03-07', 'Sahhhh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
