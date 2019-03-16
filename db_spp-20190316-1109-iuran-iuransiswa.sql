-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 16, 2019 at 05:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `t0201_siswa`
--

CREATE TABLE `t0201_siswa` (
  `id` int(11) NOT NULL,
  `NIS` varchar(100) NOT NULL,
  `Nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0201_siswa`
--

INSERT INTO `t0201_siswa` (`id`, `NIS`, `Nama`) VALUES
(1, '190001', 'Abdul'),
(2, '190002', 'Adi');

-- --------------------------------------------------------

--
-- Table structure for table `t0202_siswaiuran`
--

CREATE TABLE `t0202_siswaiuran` (
  `id` int(11) NOT NULL,
  `tahunajaran_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `iuran_id` int(11) NOT NULL,
  `Nilai` float(14,2) NOT NULL DEFAULT '0.00',
  `Terbayar` float(14,2) NOT NULL DEFAULT '0.00',
  `Sisa` float(14,2) NOT NULL DEFAULT '0.00',
  `P01` enum('0','1') NOT NULL DEFAULT '0',
  `P02` enum('0','1') NOT NULL DEFAULT '0',
  `P03` enum('0','1') NOT NULL DEFAULT '0',
  `P04` enum('0','1') NOT NULL DEFAULT '0',
  `P05` enum('0','1') NOT NULL DEFAULT '0',
  `P06` enum('0','1') NOT NULL DEFAULT '0',
  `P07` enum('0','1') NOT NULL DEFAULT '0',
  `P08` enum('0','1') NOT NULL DEFAULT '0',
  `P09` enum('0','1') NOT NULL DEFAULT '0',
  `P10` enum('0','1') NOT NULL DEFAULT '0',
  `P11` enum('0','1') NOT NULL DEFAULT '0',
  `P12` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0202_siswaiuran`
--

INSERT INTO `t0202_siswaiuran` (`id`, `tahunajaran_id`, `siswa_id`, `iuran_id`, `Nilai`, `Terbayar`, `Sisa`, `P01`, `P02`, `P03`, `P04`, `P05`, `P06`, `P07`, `P08`, `P09`, `P10`, `P11`, `P12`) VALUES
(1, 1, 1, 1, 101000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 1, 1, 2, 201000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 1, 2, 3, 301000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 1, 2, 4, 351000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, 1, 2, 5, 401000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t0201_siswa`
--
ALTER TABLE `t0201_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0202_siswaiuran`
--
ALTER TABLE `t0202_siswaiuran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t0201_siswa`
--
ALTER TABLE `t0201_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t0202_siswaiuran`
--
ALTER TABLE `t0202_siswaiuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
