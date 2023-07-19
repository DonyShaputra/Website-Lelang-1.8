-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_lelang2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `foto` blob NOT NULL,
  `status` enum('CLOSE','OPEN','SOLD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `barang`:
--

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `tanggal`, `harga_awal`, `deskripsi_barang`, `foto`, `status`) VALUES
(60, 'Sepatu Sneakers Hitam Pri', '2023-03-16', 176900, 'Sneakers Gio Saverino:\n- Fashion terkini dengan style yang casual dipakai setiap hari.\n- Bahan Hi-', 0x64336432663737342d343634652d346162642d613836362d6139333331303065633539382e6a7067, 'SOLD'),
(61, 'D.A Gaming gaming bat', '2023-03-19', 12, '122', 0x6461612e6a7067, 'CLOSE'),
(62, 'keyboard', '2023-03-20', 12, 'bagus', 0x6b6579626f6172642e6a7067, 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `history_lelang`:
--   `id_barang`
--       `barang` -> `id`
--   `id_masyarakat`
--       `masyarakat2` -> `id_user`
--   `id_lelang`
--       `lelang` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `penawaran_harga` int(20) NOT NULL,
  `status` enum('','WINNER') NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `lelang`:
--   `id_barang`
--       `barang` -> `id`
--   `id_masyarakat`
--       `masyarakat` -> `id`
--

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id`, `id_barang`, `tgl_lelang`, `penawaran_harga`, `status`, `id_masyarakat`, `id_petugas`) VALUES
(31, 60, '2023-03-16', 200000, '', 17, 0),
(32, 60, '2023-03-16', 2100000, '', 17, 0),
(44, 60, '2023-03-18', 2200000, '', 27, 0),
(45, 60, '2023-03-18', 3000000, '', 27, 0),
(46, 60, '2023-03-18', 4000000, 'WINNER', 27, 0),
(48, 62, '2023-03-19', 12000, '', 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `masyarakat`:
--

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nama`, `username`, `password`, `tlp`) VALUES
(17, 'wayan123', 'wayan123', '202cb962ac59075b964b07152d234b70', ''),
(27, 'donysaputra', 'dony', '202cb962ac59075b964b07152d234b70', '0882456');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `petugas`:
--

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `username`, `password`, `level`) VALUES
(8, 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(9, 'Staff', 'staff', '202cb962ac59075b964b07152d234b70', 'petugas'),
(20, 'dony5', 'dony5', '202cb962ac59075b964b07152d234b70', 'admin'),
(21, 'staff', 'staff', '202cb962ac59075b964b07152d234b70', 'petugas'),
(22, 'staff Dony', 'dony', '202cb962ac59075b964b07152d234b70', 'petugas'),
(25, 'dony5', 'dony5', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lelang` (`id_lelang`,`id_barang`,`id_masyarakat`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_masyarakat` (`id_masyarakat`),
  ADD KEY `id_lelang_2` (`id_lelang`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`,`id_masyarakat`),
  ADD KEY `id_masyarakat` (`id_masyarakat`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat2` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_4` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table barang
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'test_lelang2', 'barang', '{\"sorted_col\":\"`status` ASC\"}', '2023-03-19 05:02:47');

--
-- Metadata for table history_lelang
--

--
-- Metadata for table lelang
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'test_lelang2', 'lelang', '{\"sorted_col\":\"`penawaran_harga` ASC\"}', '2023-03-19 04:45:45');

--
-- Metadata for table masyarakat
--

--
-- Metadata for table petugas
--

--
-- Metadata for database test_lelang2
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
