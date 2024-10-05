-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2024 at 10:18 AM
-- Server version: 5.7.40-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_triop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktifpendaftaran`
--

CREATE TABLE IF NOT EXISTS `tb_aktifpendaftaran` (
  `id_aktifpendaftaran` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_aktifpendaftaran`
--

INSERT INTO `tb_aktifpendaftaran` (`id_aktifpendaftaran`, `status`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE IF NOT EXISTS `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `email`, `nama`, `password`, `aktif`, `role_id`) VALUES
(1, 'putra@smatrinitas.sch.id', 'Admin Trinitas', '$2y$10$KDqaYaPI088GSBqJ8E4sWuzV50eu7whI/ZD8Qbatbp68kta8Eh.n2', 1, 1),
(3, 'johanesalex774@gmail.com', 'Johannes Alexander Putra, S.Pd.', '$2y$10$QEJzGobMLHeCJVOWyx/bnejGBaoIx9/reqQBEb0bVxVrQVQewBpue', 1, 2),
(4, 'johannesap@upi.edu', 'Johannes Alexander Putra, S.Pd.', '$2y$10$D1w53IJ0JENtnta2L7GSJOJWvMYVVb01NYwgSTIKG88lfG4z0u2Re', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE IF NOT EXISTS `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `nama` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id_berkas`, `nama`, `file`) VALUES
(3, 'tes', '20dbe05c6271ceb962488499a54749f5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

CREATE TABLE IF NOT EXISTS `tb_content` (
  `id_content` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_instagram`
--

CREATE TABLE IF NOT EXISTS `tb_instagram` (
  `id_instagram` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_instagram`
--

INSERT INTO `tb_instagram` (`id_instagram`, `link`) VALUES
(5, 'DAmpnpSB4lF'),
(6, 'DAo34dmhWOd'),
(7, 'DAo8XrRhmLd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_sekolah1` int(11) NOT NULL,
  `id_sekolah2` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `skor1` varchar(11) DEFAULT NULL,
  `skor2` varchar(11) DEFAULT NULL,
  `utama` int(11) NOT NULL,
  `tiket` text
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `tb_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `bukti` longtext NOT NULL,
  `sekolah` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `nama`, `nomor`, `bukti`, `sekolah`) VALUES
(9, 'Johannes Alexander Putra', '081934172542', '66ffedbd52cd2.png', 'SMKN 1 Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE IF NOT EXISTS `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama`, `gambar`) VALUES
(1, 'SMA Trinitas Bandung', '601ed092ee539cd30ae18eafb492c1f1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sponsor`
--

CREATE TABLE IF NOT EXISTS `tb_sponsor` (
  `id_sponsor` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE IF NOT EXISTS `tb_video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_video`, `judul`, `link`) VALUES
(1, 'Opening Ceremony TRIOP 2023', 'fWo76y3Fvns?si=SBrCOCjQRZD5mUI9'),
(3, 'SMA Kuntum Cemerlang vs SMAN 8 Bandung', 'on2HNaZ7Zec?si=HjpCg-IqNqggnJtn');

-- --------------------------------------------------------

--
-- Table structure for table `tb_videosejarah`
--

CREATE TABLE IF NOT EXISTS `tb_videosejarah` (
  `id_videosejarah` int(11) NOT NULL,
  `judul` text NOT NULL,
  `link` text NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_videosejarah`
--

INSERT INTO `tb_videosejarah` (`id_videosejarah`, `judul`, `link`, `tahun`) VALUES
(1, 'TRIOP 2016', 'IAmHdbvEJcQ', 2016),
(3, 'TRIOP 2018', 'OkKdxQwNE2E', 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aktifpendaftaran`
--
ALTER TABLE `tb_aktifpendaftaran`
  ADD PRIMARY KEY (`id_aktifpendaftaran`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tb_content`
--
ALTER TABLE `tb_content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indexes for table `tb_instagram`
--
ALTER TABLE `tb_instagram`
  ADD PRIMARY KEY (`id_instagram`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_sekolah1` (`id_sekolah1`),
  ADD KEY `id_sekolah2` (`id_sekolah2`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_sponsor`
--
ALTER TABLE `tb_sponsor`
  ADD PRIMARY KEY (`id_sponsor`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `tb_videosejarah`
--
ALTER TABLE `tb_videosejarah`
  ADD PRIMARY KEY (`id_videosejarah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aktifpendaftaran`
--
ALTER TABLE `tb_aktifpendaftaran`
  MODIFY `id_aktifpendaftaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_content`
--
ALTER TABLE `tb_content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_instagram`
--
ALTER TABLE `tb_instagram`
  MODIFY `id_instagram` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_sponsor`
--
ALTER TABLE `tb_sponsor`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_videosejarah`
--
ALTER TABLE `tb_videosejarah`
  MODIFY `id_videosejarah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_sekolah1`) REFERENCES `tb_sekolah` (`id_sekolah`),
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`id_sekolah2`) REFERENCES `tb_sekolah` (`id_sekolah`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
