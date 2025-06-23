-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2025 at 07:48 PM
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
  `nama_alat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga_per_hari` int DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('tersedia','disewa') COLLATE utf8mb4_general_ci DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_berat`
--

INSERT INTO `alat_berat` (`id`, `nama_alat`, `jenis`, `harga_per_hari`, `foto`, `status`) VALUES
(1, 'Excavator', 'Digger', 3000000, 'excavator.jpg', 'tersedia'),
(2, 'Backhoe Loader', 'Loader', 850000, 'backhoe loader.jpg', 'disewa'),
(4, 'Crane', 'Lifting', 1500000, 'crane.jpg', 'disewa'),
(5, 'Backhoe Loader', 'Loader', 850000, 'backhoe loader.jpg', 'disewa'),
(6, 'Bulldozer', 'Dozer', 950000, 'bulldozer.jpg', 'disewa'),
(7, 'Crane', 'Lifting', 1500000, 'crane.jpg', 'disewa'),
(8, 'Dump Truck', 'Transport', 750000, 'dump truk.jpg', 'disewa'),
(9, 'Excavator', 'Penggali', 1200000, 'excavator.jpg', 'disewa'),
(10, 'Grader', 'Perata', 800000, 'grader.jpg', 'tersedia'),
(11, 'Hydraulic Breaker', 'Digger', 1300000, 'hydraulic breaker.jpg', 'disewa'),
(12, 'Skid Steer Loader', 'Loader', 700000, 'skid steer loader.jpg', 'disewa'),
(13, 'Vibro Roller', 'Pemadat', 900000, 'vibro roller.jpg', 'tersedia'),
(14, 'Wheel Loader', 'Loader', 1000000, 'wheel loader.jpg', 'disewa');

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
  `status` enum('menunggu','disetujui','berjalan','selesai','ditolak') COLLATE utf8mb4_general_ci DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_alat`, `tanggal_sewa`, `durasi`, `total_biaya`, `status`) VALUES
(9, 4, 12, '2025-06-18', 7, 12000000, 'menunggu'),
(10, 3, 8, '2025-06-18', 3, 2250000, 'menunggu'),
(11, 3, 4, '2025-06-04', 5, 7500000, 'selesai'),
(12, 3, 14, '2025-06-19', 4, 4000000, 'selesai'),
(13, 4, 2, '2025-06-19', 4, 3400000, 'menunggu'),
(14, 4, 9, '2025-06-23', 4, 4800000, 'menunggu'),
(15, 4, 6, '2025-06-25', 1, 950000, 'selesai'),
(16, 7, 5, '2025-06-27', 6, 5100000, 'berjalan'),
(17, 6, 11, '2025-06-18', 14, 18200000, 'menunggu'),
(18, 6, 10, '2025-06-05', 17, 13600000, 'selesai'),
(19, 6, 7, '2025-06-30', 30, 45000000, 'disetujui'),
(20, 3, 4, '2025-06-12', 2, 3000000, 'berjalan'),
(21, 3, 6, '2025-06-13', 4, 3800000, 'disetujui'),
(22, 3, 14, '2025-07-04', 1, 1000000, 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_general_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(2, 'Lintang', 'lintang@gmail.com', '$2y$10$npGyBd7NdZOFgLjFpQxm7eGjH1ZAwQqNcj7MQFQgqrX7ro4BJSG0e', 'admin'),
(3, 'Divan', 'divan@gmail.com', '$2y$10$DSju4UXxyJB//6mmf7segevBFrwW0ZW4OV5tEQBFKy15Na1wuxsvG', 'user'),
(4, 'fadmin', 'fadmin@gmail.com', '$2y$10$BLEbX3Y6kpQr3OOkkjTjgueAiKvnYkvivak21lWO4OSxtCg3wbG5.', 'user'),
(5, 'admin', 'admin@gmail.com', '$2y$10$A5fhuZ6Ra3t7gKYWEnpBYeZ8WsqBkEU0AJ/9OeTs2SHNg7Dy2TeGa', 'admin'),
(6, 'dwi', 'dwi@gmail.com', '$2y$10$qi2sFap8IuiN3tbtLrwa0OA4pX1c3Rq4Rt7UhHfeiwI.aPzmMQfCS', 'user'),
(7, 'sidik', 'sidik@gmail.com', '$2y$10$6xJhssrJvFo7.r1GSM0YhOEeJi/MK0bIA1LTeSRoCKqRaxf1fkWSq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_berat`
--
ALTER TABLE `alat_berat`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
