-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2024 at 02:39 PM
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
-- Database: `triops`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aktif` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `email`, `nama`, `password`, `aktif`) VALUES
(1, 'putra@smatrinitas.sch.id', 'Admin Trinitas', '$2y$10$KDqaYaPI088GSBqJ8E4sWuzV50eu7whI/ZD8Qbatbp68kta8Eh.n2', 1),
(3, 'johanesalex774@gmail.com', 'Johannes Alexander Putra, S.Pd.', '$2y$10$QEJzGobMLHeCJVOWyx/bnejGBaoIx9/reqQBEb0bVxVrQVQewBpue', 1),
(4, 'johannesap@upi.edu', 'Johannes Alexander Putra, S.Pd.', '$2y$10$D1w53IJ0JENtnta2L7GSJOJWvMYVVb01NYwgSTIKG88lfG4z0u2Re', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `gambar`, `isi`) VALUES
(4, 'TRIOP 2024', '3a1118ea0de2cc831eb9874dd101867e.png', '<p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Bandung, 4 September 2024</strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">&nbsp;— SMA Trinitas Bandung kembali menggelar Trinitas Open Basketball Championship (TRIOP) 2024, kejuaraan basket tahunan yang diikuti oleh puluhan tim dari berbagai sekolah menengah atas di wilayah Bandung dan sekitarnya. Acara yang berlangsung selama seminggu ini berhasil menarik perhatian para pencinta olahraga basket dengan menampilkan pertandingan-pertandingan seru dan penuh semangat.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Tahun ini, TRIOP 2024 membawa tema “Rise Above the Limits,” mengajak para peserta untuk menunjukkan kemampuan terbaik mereka di lapangan. Kompetisi yang dimulai pada tanggal 1 September 2024 ini diikuti oleh 16 tim putra dan 12 tim putri. Pertandingan final yang berlangsung di hari terakhir berhasil menarik ratusan penonton, dengan SMA Bintang Timur keluar sebagai juara pertama di kategori putra dan SMA Angkasa di kategori putri.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Selain pertandingan basket, TRIOP 2024 juga dimeriahkan oleh berbagai kegiatan pendukung seperti penampilan cheerleaders, kompetisi three-point shootout, serta bazar yang menampilkan produk-produk lokal dan makanan khas Bandung. Kegiatan ini tidak hanya menjadi ajang kompetisi, tetapi juga mempererat hubungan antar sekolah dan menjadi wadah bagi siswa-siswi untuk menyalurkan bakat dan minat mereka.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">“Kejuaraan ini adalah salah satu upaya kami untuk mengembangkan potensi siswa dalam bidang olahraga, sekaligus membangun semangat sportivitas dan solidaritas antar sekolah,” ujar Kepala Sekolah SMA Trinitas, Bapak Agus Santoso, dalam sambutannya di upacara penutupan TRIOP 2024.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">TRIOP 2024 ditutup dengan upacara penyerahan piala kepada para juara serta penghargaan untuk pemain terbaik di masing-masing kategori. Dengan kesuksesan ini, SMA Trinitas berkomitmen untuk terus menyelenggarakan TRIOP di tahun-tahun mendatang sebagai bentuk kontribusi nyata dalam dunia olahraga sekolah.</span></p><p><br></p>'),
(5, 'TRIOP 2024', 'de61b40bad18ada4e8123c1868c7b362.png', '<p><strong style=\"color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\">Bandung, 4 September 2024</strong><span style=\"color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\">&nbsp;— SMA Trinitas Bandung kembali menggelar Trinitas Open Basketball Championship (TRIOP) 2024, kejuaraan basket tahunan yang diikuti oleh puluhan tim dari berbagai sekolah menengah atas di wilayah Bandung dan sekitarnya. Acara yang berlangsung selama seminggu ini berhasil menarik perhatian para pencinta olahraga basket dengan menampilkan pertandingan-pertandingan seru dan penuh semangat.</span></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\">Tahun ini, TRIOP 2024 membawa tema “Rise Above the Limits,” mengajak para peserta untuk menunjukkan kemampuan terbaik mereka di lapangan. Kompetisi yang dimulai pada tanggal 1 September 2024 ini diikuti oleh 16 tim putra dan 12 tim putri. Pertandingan final yang berlangsung di hari terakhir berhasil menarik ratusan penonton, dengan SMA Bintang Timur keluar sebagai juara pertama di kategori putra dan SMA Angkasa di kategori putri.</span></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\">Selain pertandingan basket, TRIOP 2024 juga dimeriahkan oleh berbagai kegiatan pendukung seperti penampilan cheerleaders, kompetisi three-point shootout, serta bazar yang menampilkan produk-produk lokal dan makanan khas Bandung. Kegiatan ini tidak hanya menjadi ajang kompetisi, tetapi juga mempererat hubungan antar sekolah dan menjadi wadah bagi siswa-siswi untuk menyalurkan bakat dan minat mereka.</span></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\">“Kejuaraan ini adalah salah satu upaya kami untuk mengembangkan potensi siswa dalam bidang olahraga, sekaligus membangun semangat sportivitas dan solidaritas antar sekolah,” ujar Kepala Sekolah SMA Trinitas, Bapak Agus Santoso, dalam sambutannya di upacara penutupan TRIOP 2024.</span></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\">TRIOP 2024 ditutup dengan upacara penyerahan piala kepada para juara serta penghargaan untuk pemain terbaik di masing-masing kategori. Dengan kesuksesan ini, SMA Trinitas berkomitmen untuk terus menyelenggarakan TRIOP di tahun-tahun mendatang sebagai bentuk kontribusi nyata dalam dunia olahraga sekolah.</span></p><p><br></p>'),
(7, 'TRIOP 2024', 'ca9ecbfec6d027eacd4c2ac4956778f1.png', '<p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Bandung, 4 September 2024</strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">&nbsp;— SMA Trinitas Bandung kembali menggelar Trinitas Open Basketball Championship (TRIOP) 2024, kejuaraan basket tahunan yang diikuti oleh puluhan tim dari berbagai sekolah menengah atas di wilayah Bandung dan sekitarnya. Acara yang berlangsung selama seminggu ini berhasil menarik perhatian para pencinta olahraga basket dengan menampilkan pertandingan-pertandingan seru dan penuh semangat.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Tahun ini, TRIOP 2024 membawa tema “Rise Above the Limits,” mengajak para peserta untuk menunjukkan kemampuan terbaik mereka di lapangan. Kompetisi yang dimulai pada tanggal 1 September 2024 ini diikuti oleh 16 tim putra dan 12 tim putri. Pertandingan final yang berlangsung di hari terakhir berhasil menarik ratusan penonton, dengan SMA Bintang Timur keluar sebagai juara pertama di kategori putra dan SMA Angkasa di kategori putri.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Selain pertandingan basket, TRIOP 2024 juga dimeriahkan oleh berbagai kegiatan pendukung seperti penampilan cheerleaders, kompetisi three-point shootout, serta bazar yang menampilkan produk-produk lokal dan makanan khas Bandung. Kegiatan ini tidak hanya menjadi ajang kompetisi, tetapi juga mempererat hubungan antar sekolah dan menjadi wadah bagi siswa-siswi untuk menyalurkan bakat dan minat mereka.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">“Kejuaraan ini adalah salah satu upaya kami untuk mengembangkan potensi siswa dalam bidang olahraga, sekaligus membangun semangat sportivitas dan solidaritas antar sekolah,” ujar Kepala Sekolah SMA Trinitas, Bapak Agus Santoso, dalam sambutannya di upacara penutupan TRIOP 2024.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">TRIOP 2024 ditutup dengan upacara penyerahan piala kepada para juara serta penghargaan untuk pemain terbaik di masing-masing kategori. Dengan kesuksesan ini, SMA Trinitas berkomitmen untuk terus menyelenggarakan TRIOP di tahun-tahun mendatang sebagai bentuk kontribusi nyata dalam dunia olahraga sekolah.</span></p><p><br></p>'),
(8, 'TRIOP 2024', 'f84c8b39ed0fc66e41d023b8e27bb148.png', '<p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Bandung, 4 September 2024</strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">&nbsp;— SMA Trinitas Bandung kembali menggelar Trinitas Open Basketball Championship (TRIOP) 2024, kejuaraan basket tahunan yang diikuti oleh puluhan tim dari berbagai sekolah menengah atas di wilayah Bandung dan sekitarnya. Acara yang berlangsung selama seminggu ini berhasil menarik perhatian para pencinta olahraga basket dengan menampilkan pertandingan-pertandingan seru dan penuh semangat.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Tahun ini, TRIOP 2024 membawa tema “Rise Above the Limits,” mengajak para peserta untuk menunjukkan kemampuan terbaik mereka di lapangan. Kompetisi yang dimulai pada tanggal 1 September 2024 ini diikuti oleh 16 tim putra dan 12 tim putri. Pertandingan final yang berlangsung di hari terakhir berhasil menarik ratusan penonton, dengan SMA Bintang Timur keluar sebagai juara pertama di kategori putra dan SMA Angkasa di kategori putri.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">Selain pertandingan basket, TRIOP 2024 juga dimeriahkan oleh berbagai kegiatan pendukung seperti penampilan cheerleaders, kompetisi three-point shootout, serta bazar yang menampilkan produk-produk lokal dan makanan khas Bandung. Kegiatan ini tidak hanya menjadi ajang kompetisi, tetapi juga mempererat hubungan antar sekolah dan menjadi wadah bagi siswa-siswi untuk menyalurkan bakat dan minat mereka.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">“Kejuaraan ini adalah salah satu upaya kami untuk mengembangkan potensi siswa dalam bidang olahraga, sekaligus membangun semangat sportivitas dan solidaritas antar sekolah,” ujar Kepala Sekolah SMA Trinitas, Bapak Agus Santoso, dalam sambutannya di upacara penutupan TRIOP 2024.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 37, 41);\">TRIOP 2024 ditutup dengan upacara penyerahan piala kepada para juara serta penghargaan untuk pemain terbaik di masing-masing kategori. Dengan kesuksesan ini, SMA Trinitas berkomitmen untuk terus menyelenggarakan TRIOP di tahun-tahun mendatang sebagai bentuk kontribusi nyata dalam dunia olahraga sekolah.</span></p><p><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

CREATE TABLE `tb_content` (
  `id_content` int NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_content`
--

INSERT INTO `tb_content` (`id_content`, `gambar`, `judul`) VALUES
(8, '0494d613b54e6464232bf14afa537143.PNG', 'Johanism : Sebuah Pengantar 3'),
(9, '9b1c4ec89ec1f453ecdfb862bc197b3f.PNG', 'FF : Sebuah Pengantar'),
(10, 'edbcd17ba7d8e524594aa6962713b36b.jpg', 'Sistem Operasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int NOT NULL,
  `id_sekolah1` int NOT NULL,
  `id_sekolah2` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `skor1` varchar(11) DEFAULT NULL,
  `skor2` varchar(11) DEFAULT NULL,
  `utama` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_sekolah1`, `id_sekolah2`, `tanggal`, `skor1`, `skor2`, `utama`) VALUES
(8, 1, 2, '2024-09-30 21:22:00', '10', '2', 1),
(9, 1, 4, '2024-09-29 21:52:00', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `bukti` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sekolah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama`, `gambar`) VALUES
(1, 'SMA Trinitas Bandung', 'dda9771d392fac32b9229d4f55593ccb.png'),
(2, 'SMA Talenta', '6bb8f8d9316a04eefe2b400c292e20dd.png'),
(3, 'SMAK BPK 1 Bandung ', 'f5cf54d34b210540f1599bae594181d2.png'),
(4, 'SMA Santa Angela', '2087ec34c6f9159bfb799873b6ea0737.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sponsor`
--

CREATE TABLE `tb_sponsor` (
  `id_sponsor` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sponsor`
--

INSERT INTO `tb_sponsor` (`id_sponsor`, `nama`, `gambar`) VALUES
(3, 'Lagie', '90edeee085476cd267c0d1bd0f37e455.jpeg'),
(4, 'Lagie 2', 'd357cc9eae3ff101c193128f462fe496.jpeg'),
(5, 'Lagie 3', '3082c2252d630fcbd9d39e8b1d20bb77.jpeg'),
(6, 'Lagie', '80b4f994eba13f16308eebb484f37347.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE `tb_video` (
  `id_youtube` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_youtube`, `judul`, `link`) VALUES
(1, 'Opening Ceremony TRIOP 2023', 'fWo76y3Fvns?si=SBrCOCjQRZD5mUI9'),
(2, 'SMPN 1 Cimahi vs SMP Trimulya', 'GcQ0ouHpETY?si=jJXqpTIkHYBkgLN_'),
(3, 'SMA Kuntum Cemerlang vs SMAN 8 Bandung', 'on2HNaZ7Zec?si=HjpCg-IqNqggnJtn');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_content`
--
ALTER TABLE `tb_content`
  ADD PRIMARY KEY (`id_content`);

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
  ADD PRIMARY KEY (`id_youtube`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_content`
--
ALTER TABLE `tb_content`
  MODIFY `id_content` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_sponsor`
--
ALTER TABLE `tb_sponsor`
  MODIFY `id_sponsor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id_youtube` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_sekolah1`) REFERENCES `tb_sekolah` (`id_sekolah`),
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`id_sekolah2`) REFERENCES `tb_sekolah` (`id_sekolah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
