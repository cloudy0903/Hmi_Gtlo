-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 06:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_hmi`
--

CREATE TABLE `anggota_hmi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'default.jpg',
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota_hmi`
--

INSERT INTO `anggota_hmi` (`id`, `nama`, `email`, `password`, `no_tlp`, `alamat`, `foto_profil`, `jenis_kelamin`) VALUES
(7, 'sitiqd', 'sitiq@gmail.com', 'sdfghj', '+6285932931415', 'oke', 'prasetio.png', 'Laki-laki'),
(8, 'sitiqdd', 'sitiqw@gmail.com', '12', '+6285932931415', 'oke', 'Screenshot 2024-12-30 012915.png', 'Laki-laki'),
(10, 'sugiyanto', 'sitiqAZ@gmail.com', '123', '+6285932931415', 'oke', 'Screenshot 2024-12-29 213103.png', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `email`, `no_telp`, `alamat`, `jurusan`, `angkatan`, `tanggal_daftar`) VALUES
(1, 'sugiyanto', 'sugiyanto@gmail.com', '085932931415', 'suwawa', 'teknik informatika', 2023, '2025-01-23 13:01:03'),
(3, 'sugiyantower', 'sugiyantox@gmail.com', '085932931415', 'q234r', 'teknik informatika', 453, '2025-01-29 10:42:45'),
(4, 'sugiyantower', 'sugiyantoxq@gmail.com', '085932931415', 'kedn', 'teknik informatika', 453, '2025-01-29 13:39:04'),
(5, 'sugiyanto', 'sugiyantos@gmail.com', '085932931415', 'vbnm', 'teknik informatika', 453, '2025-01-29 13:45:24'),
(6, 'sugiyanto', 'sugiyantog@gmail.com', '085932931415', 'vbnm', 'teknik informatika', 3837, '2025-01-29 13:57:02'),
(7, 'sugiyanto', 'sugiyantogyhg@gmail.com', '085932931415', 'kampus 4', 'teknik informatika', 3837, '2025-01-29 13:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_cabang`
--

CREATE TABLE `pengurus_cabang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'default.jpg',
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurus_cabang`
--

INSERT INTO `pengurus_cabang` (`id`, `nama`, `email`, `password`, `no_tlp`, `alamat`, `foto_profil`, `jenis_kelamin`) VALUES
(12, 'sugiyanto', 'sugi@gmail.com', '123', '085932931415', 'kampus 4', 'kalender.png', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_komisariat`
--

CREATE TABLE `pengurus_komisariat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'default.jpg',
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurus_komisariat`
--

INSERT INTO `pengurus_komisariat` (`id`, `nama`, `email`, `password`, `no_tlp`, `alamat`, `foto_profil`, `jenis_kelamin`) VALUES
(2, 'qw', 'qwerty@gmail.com', 'oke', '085932931415', 'oke', 'prasetio.png', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id`, `title`, `image_path`, `content`, `created_at`) VALUES
(1, 'oke', 'uploads/admin.png', 'okshxv b', '2025-01-29 14:22:19'),
(2, 'oke', 'uploads/admin.png', 'wertyu', '2025-01-29 14:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_pengurus`
--

CREATE TABLE `struktur_pengurus` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `sosial_media` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur_pengurus`
--

INSERT INTO `struktur_pengurus` (`id`, `nama`, `jabatan`, `foto`, `sosial_media`) VALUES
(1, 'sugiyanto', 'guru', 'prasetio.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_hmi`
--
ALTER TABLE `anggota_hmi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pengurus_cabang`
--
ALTER TABLE `pengurus_cabang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `pengurus_komisariat`
--
ALTER TABLE `pengurus_komisariat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_pengurus`
--
ALTER TABLE `struktur_pengurus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_hmi`
--
ALTER TABLE `anggota_hmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengurus_cabang`
--
ALTER TABLE `pengurus_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengurus_komisariat`
--
ALTER TABLE `pengurus_komisariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `struktur_pengurus`
--
ALTER TABLE `struktur_pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
