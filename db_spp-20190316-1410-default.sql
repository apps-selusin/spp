-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 16, 2019 at 08:10 AM
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
-- Table structure for table `t0101_tahunajaran`
--

CREATE TABLE `t0101_tahunajaran` (
  `id` int(11) NOT NULL,
  `AwalBulan` tinyint(4) NOT NULL,
  `AwalTahun` smallint(6) NOT NULL,
  `AkhirBulan` tinyint(4) NOT NULL,
  `AkhirTahun` smallint(6) NOT NULL,
  `TahunAjaran` varchar(11) NOT NULL,
  `Aktif` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0101_tahunajaran`
--

INSERT INTO `t0101_tahunajaran` (`id`, `AwalBulan`, `AwalTahun`, `AkhirBulan`, `AkhirTahun`, `TahunAjaran`, `Aktif`) VALUES
(1, 7, 2018, 6, 2019, '2018 / 2019', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t0102_sekolah`
--

CREATE TABLE `t0102_sekolah` (
  `id` int(11) NOT NULL,
  `Sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0102_sekolah`
--

INSERT INTO `t0102_sekolah` (`id`, `Sekolah`) VALUES
(1, 'MI NURUL ULUM KARAKTER SUKOREJO BOJONEGORO'),
(2, 'MI NURUL ULUM UNGGULAN SUKOREJO BOJONEGORO');

-- --------------------------------------------------------

--
-- Table structure for table `t0103_kelas`
--

CREATE TABLE `t0103_kelas` (
  `id` int(11) NOT NULL,
  `Kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0103_kelas`
--

INSERT INTO `t0103_kelas` (`id`, `Kelas`) VALUES
(1, 'KELAS I KH. BISRI SYANSURI'),
(2, 'KELAS I KH. WACHID HASYIM'),
(3, 'KELAS I NICOLAS OTTO'),
(4, 'KELAS I JAMES WATT'),
(5, 'KELAS II ALEXANDER GRAHAM BELL'),
(6, 'KELAS II MICHAEL FARADAY'),
(7, 'KELAS III ALBERT EINSTEIN'),
(8, 'KELAS III ALFRED NOBEL'),
(9, 'KELAS IV ISAAC NEWTON'),
(10, 'KELAS IV ALESSANDRO VOLTA'),
(11, 'KELAS V THOMAS ALFA EDISON'),
(12, 'KELAS VI GALILEO GALILEI');

-- --------------------------------------------------------

--
-- Table structure for table `t0104_daftarsiswamaster`
--

CREATE TABLE `t0104_daftarsiswamaster` (
  `id` int(11) NOT NULL,
  `tahunajaran_id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0104_daftarsiswamaster`
--

INSERT INTO `t0104_daftarsiswamaster` (`id`, `tahunajaran_id`, `sekolah_id`, `kelas_id`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t0105_daftarsiswadetail`
--

CREATE TABLE `t0105_daftarsiswadetail` (
  `id` int(11) NOT NULL,
  `daftarsiswamaster_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0105_daftarsiswadetail`
--

INSERT INTO `t0105_daftarsiswadetail` (`id`, `daftarsiswamaster_id`, `siswa_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t0106_iuran`
--

CREATE TABLE `t0106_iuran` (
  `id` int(11) NOT NULL,
  `Iuran` varchar(100) NOT NULL,
  `Jenis` enum('Rutin','Non-Rutin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t0106_iuran`
--

INSERT INTO `t0106_iuran` (`id`, `Iuran`, `Jenis`) VALUES
(1, 'Infaq', 'Rutin'),
(2, 'Catering', 'Rutin'),
(3, 'Worksheet', 'Rutin'),
(4, 'Beasiswa Infaq', 'Rutin'),
(5, 'Dana SPM BP3MNU', 'Non-Rutin'),
(6, 'Daftar Ulang', 'Non-Rutin');

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
(1, 1, 1, 1, 100000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 1, 1, 2, 200000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 1, 2, 3, 300000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 1, 2, 4, 350000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, 1, 2, 5, 400000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `t0301_bayarmaster`
--

CREATE TABLE `t0301_bayarmaster` (
  `id` int(11) NOT NULL,
  `tahunajaran_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `Nomor` varchar(25) NOT NULL,
  `Tanggal` date NOT NULL,
  `Total` float(14,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t0302_bayardetail`
--

CREATE TABLE `t0302_bayardetail` (
  `id` int(11) NOT NULL,
  `bayarmaster_id` int(11) NOT NULL,
  `iuran_id` int(11) NOT NULL,
  `Periode1` varchar(14) DEFAULT NULL,
  `Periode2` varchar(14) DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Jumlah` float(14,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t9996_employees`
--

CREATE TABLE `t9996_employees` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t9997_userlevelpermissions`
--

CREATE TABLE `t9997_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t9998_userlevels`
--

CREATE TABLE `t9998_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t9999_audittrail`
--

CREATE TABLE `t9999_audittrail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext,
  `oldvalue` longtext,
  `newvalue` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t9999_audittrail`
--

INSERT INTO `t9999_audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1, '2019-03-16 13:47:51', '/spp/t0101_tahunajaranadd.php', '1', 'A', 't0101_tahunajaran', 'AwalBulan', '1', '', '7'),
(2, '2019-03-16 13:47:51', '/spp/t0101_tahunajaranadd.php', '1', 'A', 't0101_tahunajaran', 'AwalTahun', '1', '', '2018'),
(3, '2019-03-16 13:47:51', '/spp/t0101_tahunajaranadd.php', '1', 'A', 't0101_tahunajaran', 'AkhirBulan', '1', '', '6'),
(4, '2019-03-16 13:47:51', '/spp/t0101_tahunajaranadd.php', '1', 'A', 't0101_tahunajaran', 'AkhirTahun', '1', '', '2019'),
(5, '2019-03-16 13:47:51', '/spp/t0101_tahunajaranadd.php', '1', 'A', 't0101_tahunajaran', 'TahunAjaran', '1', '', '2018 / 2019'),
(6, '2019-03-16 13:47:51', '/spp/t0101_tahunajaranadd.php', '1', 'A', 't0101_tahunajaran', 'Aktif', '1', '', 'Y'),
(7, '2019-03-16 13:47:51', '/spp/t0101_tahunajaranadd.php', '1', 'A', 't0101_tahunajaran', 'id', '1', '', '1'),
(8, '2019-03-16 13:49:11', '/spp/t0102_sekolahadd.php', '1', 'A', 't0102_sekolah', 'Sekolah', '1', '', 'MI NURUL ULUM KARAKTER SUKOREJO BOJONEGORO'),
(9, '2019-03-16 13:49:11', '/spp/t0102_sekolahadd.php', '1', 'A', 't0102_sekolah', 'id', '1', '', '1'),
(10, '2019-03-16 13:49:25', '/spp/t0102_sekolahadd.php', '1', 'A', 't0102_sekolah', 'Sekolah', '2', '', 'MI NURUL ULUM UNGGULAN SUKOREJO BOJONEGORO'),
(11, '2019-03-16 13:49:25', '/spp/t0102_sekolahadd.php', '1', 'A', 't0102_sekolah', 'id', '2', '', '2'),
(12, '2019-03-16 13:49:54', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '1', '', 'KELAS I KH. BISRI SYANSURI'),
(13, '2019-03-16 13:49:54', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '1', '', '1'),
(14, '2019-03-16 13:50:13', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '2', '', 'KELAS I KH. WACHID HASYIM'),
(15, '2019-03-16 13:50:13', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '2', '', '2'),
(16, '2019-03-16 13:50:27', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '3', '', 'KELAS I NICOLAS OTTO'),
(17, '2019-03-16 13:50:27', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '3', '', '3'),
(18, '2019-03-16 13:50:43', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '4', '', 'KELAS I JAMES WATT'),
(19, '2019-03-16 13:50:43', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '4', '', '4'),
(20, '2019-03-16 13:50:57', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '5', '', 'KELAS II ALEXANDER GRAHAM BELL'),
(21, '2019-03-16 13:50:57', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '5', '', '5'),
(22, '2019-03-16 13:51:10', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '6', '', 'KELAS II MICHAEL FARADAY'),
(23, '2019-03-16 13:51:10', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '6', '', '6'),
(24, '2019-03-16 13:51:24', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '7', '', 'KELAS III ALBERT EINSTEIN'),
(25, '2019-03-16 13:51:24', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '7', '', '7'),
(26, '2019-03-16 13:51:38', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '8', '', 'KELAS III ALFRED NOBEL'),
(27, '2019-03-16 13:51:38', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '8', '', '8'),
(28, '2019-03-16 13:51:51', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '9', '', 'KELAS IV ISAAC NEWTON'),
(29, '2019-03-16 13:51:51', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '9', '', '9'),
(30, '2019-03-16 13:52:06', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '10', '', 'KELAS IV ALESSANDRO VOLTA'),
(31, '2019-03-16 13:52:06', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '10', '', '10'),
(32, '2019-03-16 13:52:23', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '11', '', 'KELAS V THOMAS ALFA EDISON'),
(33, '2019-03-16 13:52:23', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '11', '', '11'),
(34, '2019-03-16 13:52:37', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'Kelas', '12', '', 'KELAS VI GALILEO GALILEI'),
(35, '2019-03-16 13:52:37', '/spp/t0103_kelasadd.php', '1', 'A', 't0103_kelas', 'id', '12', '', '12'),
(36, '2019-03-16 13:54:05', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Iuran', '1', '', 'Infaq'),
(37, '2019-03-16 13:54:05', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Jenis', '1', '', 'Rutin'),
(38, '2019-03-16 13:54:05', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'id', '1', '', '1'),
(39, '2019-03-16 13:54:11', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Iuran', '2', '', 'Catering'),
(40, '2019-03-16 13:54:11', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Jenis', '2', '', 'Rutin'),
(41, '2019-03-16 13:54:11', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'id', '2', '', '2'),
(42, '2019-03-16 13:54:19', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Iuran', '3', '', 'Worksheet'),
(43, '2019-03-16 13:54:19', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Jenis', '3', '', 'Rutin'),
(44, '2019-03-16 13:54:19', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'id', '3', '', '3'),
(45, '2019-03-16 13:54:27', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Iuran', '4', '', 'Beasiswa Infaq'),
(46, '2019-03-16 13:54:27', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Jenis', '4', '', 'Rutin'),
(47, '2019-03-16 13:54:27', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'id', '4', '', '4'),
(48, '2019-03-16 13:54:36', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Iuran', '5', '', 'Dana SPM BP3MNU'),
(49, '2019-03-16 13:54:36', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Jenis', '5', '', 'Non-Rutin'),
(50, '2019-03-16 13:54:36', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'id', '5', '', '5'),
(51, '2019-03-16 13:54:43', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Iuran', '6', '', 'Daftar Ulang'),
(52, '2019-03-16 13:54:43', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'Jenis', '6', '', 'Non-Rutin'),
(53, '2019-03-16 13:54:43', '/spp/t0106_iuranadd.php', '1', 'A', 't0106_iuran', 'id', '6', '', '6'),
(54, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'NIS', '1', '', '190001'),
(55, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'Nama', '1', '', 'Abdul'),
(56, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'id', '1', '', '1'),
(57, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', '*** Batch insert begin ***', 't0202_siswaiuran', '', '', '', ''),
(58, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'tahunajaran_id', '1', '', '1'),
(59, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'iuran_id', '1', '', '1'),
(60, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'Nilai', '1', '', '100000'),
(61, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'siswa_id', '1', '', '1'),
(62, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'id', '1', '', '1'),
(63, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'tahunajaran_id', '2', '', '1'),
(64, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'iuran_id', '2', '', '2'),
(65, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'Nilai', '2', '', '200000'),
(66, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'siswa_id', '2', '', '1'),
(67, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'id', '2', '', '2'),
(68, '2019-03-16 13:55:42', '/spp/t0201_siswaadd.php', '1', '*** Batch insert successful ***', 't0202_siswaiuran', '', '', '', ''),
(69, '2019-03-16 13:56:32', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'NIS', '2', '', '190002'),
(70, '2019-03-16 13:56:32', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'Nama', '2', '', 'Adi'),
(71, '2019-03-16 13:56:32', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'id', '2', '', '2'),
(72, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', '*** Batch insert begin ***', 't0202_siswaiuran', '', '', '', ''),
(73, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'tahunajaran_id', '3', '', '1'),
(74, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'iuran_id', '3', '', '3'),
(75, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'Nilai', '3', '', '300000'),
(76, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'siswa_id', '3', '', '2'),
(77, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'id', '3', '', '3'),
(78, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'tahunajaran_id', '4', '', '1'),
(79, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'iuran_id', '4', '', '4'),
(80, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'Nilai', '4', '', '350000'),
(81, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'siswa_id', '4', '', '2'),
(82, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'id', '4', '', '4'),
(83, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'tahunajaran_id', '5', '', '1'),
(84, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'iuran_id', '5', '', '5'),
(85, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'Nilai', '5', '', '400000'),
(86, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'siswa_id', '5', '', '2'),
(87, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'id', '5', '', '5'),
(88, '2019-03-16 13:56:33', '/spp/t0201_siswaadd.php', '1', '*** Batch insert successful ***', 't0202_siswaiuran', '', '', '', ''),
(89, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0104_daftarsiswamaster', 'tahunajaran_id', '1', '', '1'),
(90, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0104_daftarsiswamaster', 'sekolah_id', '1', '', '1'),
(91, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0104_daftarsiswamaster', 'kelas_id', '1', '', '1'),
(92, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0104_daftarsiswamaster', 'id', '1', '', '1'),
(93, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', '*** Batch insert begin ***', 't0105_daftarsiswadetail', '', '', '', ''),
(94, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0105_daftarsiswadetail', 'siswa_id', '1', '', '1'),
(95, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0105_daftarsiswadetail', 'daftarsiswamaster_id', '1', '', '1'),
(96, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0105_daftarsiswadetail', 'id', '1', '', '1'),
(97, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0105_daftarsiswadetail', 'siswa_id', '2', '', '2'),
(98, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0105_daftarsiswadetail', 'daftarsiswamaster_id', '2', '', '1'),
(99, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', 'A', 't0105_daftarsiswadetail', 'id', '2', '', '2'),
(100, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', '*** Batch insert successful ***', 't0105_daftarsiswadetail', '', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v0301_bayarmasterdetail`
-- (See below for the actual view)
--
CREATE TABLE `v0301_bayarmasterdetail` (
`bayarmaster_id` int(11)
,`tahunajaran_id` int(11)
,`siswa_id` int(11)
,`Nomor` varchar(25)
,`Tanggal` date
,`Total` float(14,2)
,`bayardetail_id` int(11)
,`iuran_id` int(11)
,`Periode1` varchar(14)
,`Periode2` varchar(14)
,`Keterangan` varchar(100)
,`Jumlah` float(14,2)
);

-- --------------------------------------------------------

--
-- Structure for view `v0301_bayarmasterdetail`
--
DROP TABLE IF EXISTS `v0301_bayarmasterdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0301_bayarmasterdetail`  AS  select `a`.`id` AS `bayarmaster_id`,`a`.`tahunajaran_id` AS `tahunajaran_id`,`a`.`siswa_id` AS `siswa_id`,`a`.`Nomor` AS `Nomor`,`a`.`Tanggal` AS `Tanggal`,`a`.`Total` AS `Total`,`b`.`id` AS `bayardetail_id`,`b`.`iuran_id` AS `iuran_id`,`b`.`Periode1` AS `Periode1`,`b`.`Periode2` AS `Periode2`,`b`.`Keterangan` AS `Keterangan`,`b`.`Jumlah` AS `Jumlah` from (`t0301_bayarmaster` `a` left join `t0302_bayardetail` `b` on((`a`.`id` = `b`.`bayarmaster_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t0101_tahunajaran`
--
ALTER TABLE `t0101_tahunajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0102_sekolah`
--
ALTER TABLE `t0102_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0103_kelas`
--
ALTER TABLE `t0103_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0104_daftarsiswamaster`
--
ALTER TABLE `t0104_daftarsiswamaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0105_daftarsiswadetail`
--
ALTER TABLE `t0105_daftarsiswadetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0106_iuran`
--
ALTER TABLE `t0106_iuran`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `t0301_bayarmaster`
--
ALTER TABLE `t0301_bayarmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0302_bayardetail`
--
ALTER TABLE `t0302_bayardetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t9996_employees`
--
ALTER TABLE `t9996_employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t9997_userlevelpermissions`
--
ALTER TABLE `t9997_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t9998_userlevels`
--
ALTER TABLE `t9998_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t9999_audittrail`
--
ALTER TABLE `t9999_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t0101_tahunajaran`
--
ALTER TABLE `t0101_tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t0102_sekolah`
--
ALTER TABLE `t0102_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t0103_kelas`
--
ALTER TABLE `t0103_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t0104_daftarsiswamaster`
--
ALTER TABLE `t0104_daftarsiswamaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t0105_daftarsiswadetail`
--
ALTER TABLE `t0105_daftarsiswadetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t0106_iuran`
--
ALTER TABLE `t0106_iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- AUTO_INCREMENT for table `t0301_bayarmaster`
--
ALTER TABLE `t0301_bayarmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t0302_bayardetail`
--
ALTER TABLE `t0302_bayardetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t9996_employees`
--
ALTER TABLE `t9996_employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t9999_audittrail`
--
ALTER TABLE `t9999_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
