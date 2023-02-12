-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2023 at 12:15 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `idproduk` int NOT NULL,
  `namaproduk` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `gambar` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`idproduk`, `namaproduk`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 'Hot Coffe', 'Hot Coffe', 15000, 'hot-coffee-milk-foto-resep-utama.jpg'),
(3, 'Jus Melon', 'Jus Melon', 12000, 'melon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `iduser` int NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`iduser`, `nama`, `email`, `password`) VALUES
(1, 'Rakhmat Khaidir', 'rakhmatkhaidir@mail.com', '$2y$10$AJgkRru9A5utDJo66UYg6eYO2KHFUDlrLqNPssAwmVMNpOOvfKuZS'),
(2, 'Nara Augustin', 'naraagst@mail.com', '$2y$10$LkEu7M62/FZ7Gzrv.Fa/u.DovWiDDPHgz3rGYIom/4SXFKq3ulzze'),
(3, 'Russell', 'russell@mail.com', '$2y$10$7fV6EawlmR6FGc.hheXG8.c0JzZ90JWckzCsZQ8BzDx4NxYqVtupS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `idproduk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
