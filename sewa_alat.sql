-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2025 at 04:58 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_alat`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_berat`
--

CREATE TABLE `alat_berat` (
  `id` int NOT NULL,
  `nama_alat` varchar(100) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `harga_per_hari` int DEFAULT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('tersedia','disewa') DEFAULT 'tersedia',
  `id_kategori` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alat_berat`
--

INSERT INTO `alat_berat` (`id`, `nama_alat`, `jenis`, `harga_per_hari`, `deskripsi`, `foto`, `status`, `id_kategori`) VALUES
(1, 'Excavator', 'Digger', 3000000, 'Excavator PC100 ini sangat dapat diandalkan', 'excavator.jpg', 'disewa', NULL),
(2, 'Backhoe Loader', 'Loader', 850000, 'Alat multifungsi untuk penggalian dan pemindahan material.', 'backhoe loader.jpg', 'tersedia', NULL),
(3, 'Bulldozer', 'Dozer', 950000, 'Digunakan untuk mendorong dan meratakan tanah atau material lainnya.', 'bulldozer.jpg', 'tersedia', NULL),
(4, 'Crane', 'Lifting', 1500000, 'Digunakan untuk mengangkat dan memindahkan material berat secara vertikal.', 'crane.jpg', 'tersedia', NULL),
(5, 'Backhoe Loader', 'Loader', 850000, 'Alat multifungsi untuk penggalian dan pemindahan material.', 'backhoe loader.jpg', 'tersedia', NULL),
(6, 'Bulldozer', 'Dozer', 950000, 'Digunakan untuk mendorong dan meratakan tanah atau material lainnya.', 'bulldozer.jpg', 'tersedia', NULL),
(7, 'Crane', 'Lifting', 1500000, 'Digunakan untuk mengangkat dan memindahkan material berat secara vertikal.', 'crane.jpg', 'tersedia', NULL),
(8, 'Dump Truck', 'Transport', 750000, 'Kendaraan untuk mengangkut material seperti pasir, tanah, dan batu.', 'dump truk.jpg', 'tersedia', NULL),
(9, 'Excavator', 'Penggali', 1200000, 'Digunakan untuk menggali tanah dan memindahkan material besar.', 'excavator.jpg', 'tersedia', NULL),
(10, 'Grader', 'Perata', 800000, 'Alat untuk meratakan permukaan tanah atau jalan.', 'grader.jpg', 'tersedia', NULL),
(11, 'Hydraulic Breaker', 'Pemecah', 1300000, 'Dipakai untuk menghancurkan beton, batu besar, atau bangunan.', 'hydraulic breaker.jpg', 'tersedia', NULL),
(12, 'Skid Steer Loader', 'Loader Kompak', 700000, 'Loader kecil serbaguna untuk area kerja sempit.', 'skid steer loader.jpg', 'tersedia', NULL),
(13, 'Vibro Roller', 'Pemadat', 900000, 'Digunakan untuk memadatkan tanah atau aspal dengan getaran.', 'vibro roller.jpg', 'tersedia', NULL),
(14, 'Wheel Loader', 'Loader', 1000000, 'Untuk memuat material ke dalam truk atau alat lainnya.', 'wheel loader.jpg', 'tersedia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_alat`
--

CREATE TABLE `kategori_alat` (
  `id` int NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `id_transaksi` int DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `jumlah_bayar` int DEFAULT NULL,
  `metode` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status` enum('menunggu_verifikasi','terverifikasi','ditolak') DEFAULT 'menunggu_verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_alat` int DEFAULT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `total_biaya` int DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('menunggu','disetujui','berjalan','selesai','ditolak') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(2, 'Lintang', 'lintang@gmail.com', '$2y$10$KfHjvUl3w13nRfaV2gmuPOnSx6lNrjtPUOA.l2tVtcUOG9iTloj3q', 'admin'),
(3, 'Divan', 'divan@gmail.com', '$2y$10$DSju4UXxyJB//6mmf7segevBFrwW0ZW4OV5tEQBFKy15Na1wuxsvG', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_berat`
--
ALTER TABLE `alat_berat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_alat`
--
ALTER TABLE `kategori_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_alat` (`id_alat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_berat`
--
ALTER TABLE `alat_berat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_alat`
--
ALTER TABLE `kategori_alat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_berat`
--
ALTER TABLE `alat_berat`
  ADD CONSTRAINT `alat_berat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_alat` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `alat_berat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
