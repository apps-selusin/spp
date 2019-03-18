-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 18, 2019 at 11:46 AM
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
(2, 1, 2),
(3, 1, 3);

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
(2, '190002', 'Adi'),
(3, '190003', 'Ahmad');

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
(1, 1, 1, 1, 100000.00, 0.00, 0.00, '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0'),
(2, 1, 1, 2, 200000.00, 0.00, 0.00, '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0'),
(3, 1, 2, 3, 300000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 1, 2, 4, 350000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, 1, 2, 5, 400000.00, 0.00, 0.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, 1, 3, 1, 75000.00, 0.00, 0.00, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

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

--
-- Dumping data for table `t0301_bayarmaster`
--

INSERT INTO `t0301_bayarmaster` (`id`, `tahunajaran_id`, `siswa_id`, `Nomor`, `Tanggal`, `Total`) VALUES
(1, 1, 1, 'BYR001', '2019-03-16', 300000.00),
(2, 1, 1, 'BYR002', '2019-03-18', 300000.00),
(3, 1, 1, 'BYR003', '2019-03-18', 300000.00),
(4, 1, 1, 'BYR004', '2019-03-18', 300000.00),
(5, 1, 1, 'BYR005', '2019-03-18', 300000.00),
(6, 1, 3, 'BYR006', '2019-03-18', 75000.00);

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

--
-- Dumping data for table `t0302_bayardetail`
--

INSERT INTO `t0302_bayardetail` (`id`, `bayarmaster_id`, `iuran_id`, `Periode1`, `Periode2`, `Keterangan`, `Jumlah`) VALUES
(1, 1, 1, '1', '1', NULL, 100000.00),
(2, 1, 2, '1', '1', NULL, 200000.00),
(3, 2, 1, '2', '2', NULL, 100000.00),
(4, 2, 2, '2', '2', NULL, 200000.00),
(5, 3, 1, '3', '3', NULL, 100000.00),
(6, 3, 2, '3', '3', NULL, 200000.00),
(7, 4, 1, '4', '4', NULL, 100000.00),
(8, 4, 2, '4', '4', NULL, 200000.00),
(9, 5, 1, '5', '5', NULL, 100000.00),
(10, 5, 2, '5', '5', NULL, 200000.00),
(11, 6, 1, '1', '1', NULL, 75000.00);

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

--
-- Dumping data for table `t9996_employees`
--

INSERT INTO `t9996_employees` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `TitleOfCourtesy`, `BirthDate`, `HireDate`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `HomePhone`, `Extension`, `Email`, `Photo`, `Notes`, `ReportsTo`, `Password`, `UserLevel`, `Username`, `Activated`, `Profile`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', -1, 'admin', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t9997_userlevelpermissions`
--

CREATE TABLE `t9997_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t9997_userlevelpermissions`
--

INSERT INTO `t9997_userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0302_potensi', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0303_potensi', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0304_potensi', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0101_tahunajaran', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0102_sekolah', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0103_kelas', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0104_daftarsiswamaster', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0105_daftarsiswadetail', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0106_iuran', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0201_siswa', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0202_siswaiuran', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0301_bayarmaster', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t0302_bayardetail', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t9996_employees', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t9997_userlevelpermissions', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t9998_userlevels', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}t9999_audittrail', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}v0301_bayarmasterdetail', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}v0302_potensi', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}v0303_potensi', 0),
(-2, '{1E3116C6-C701-420A-A6D6-A123DF9E6EED}v0304_potensi', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}cf01_home.php', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0101_tahunajaran', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0102_sekolah', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0103_kelas', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0104_daftarsiswamaster', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0105_daftarsiswadetail', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0106_iuran', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0201_siswa', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0202_siswaiuran', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0301_bayarmaster', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0302_bayardetail', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t9996_employees', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t9997_userlevelpermissions', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t9998_userlevels', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}t9999_audittrail', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}v0301_bayarmasterdetail', 0),
(-2, '{45A85772-754E-4F4B-A197-9291CE1FD3F9}v0302_potensi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t9998_userlevels`
--

CREATE TABLE `t9998_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t9998_userlevels`
--

INSERT INTO `t9998_userlevels` (`userlevelid`, `userlevelname`) VALUES
(-2, 'Anonymous');

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
(100, '2019-03-16 13:56:57', '/spp/t0104_daftarsiswamasteradd.php', '1', '*** Batch insert successful ***', 't0105_daftarsiswadetail', '', '', '', ''),
(101, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Nomor', '1', '', 'BYR001'),
(102, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Tanggal', '1', '', '2019-03-16'),
(103, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'tahunajaran_id', '1', '', '1'),
(104, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'siswa_id', '1', '', '1'),
(105, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Total', '1', '', '0'),
(106, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'id', '1', '', '1'),
(107, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert begin ***', 't0302_bayardetail', '', '', '', ''),
(108, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '1', '', '1'),
(109, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '1', '', '1'),
(110, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '1', '', '1'),
(111, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '1', '', NULL),
(112, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '1', '', '100000.00'),
(113, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '1', '', '1'),
(114, '2019-03-16 16:57:48', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '1', '', '1'),
(115, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '2', '', '2'),
(116, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '2', '', '1'),
(117, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '2', '', '1'),
(118, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '2', '', NULL),
(119, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '2', '', '200000.00'),
(120, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '2', '', '1'),
(121, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '2', '', '2'),
(122, '2019-03-16 16:57:49', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert successful ***', 't0302_bayardetail', '', '', '', ''),
(123, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'NIS', '3', '', '190003'),
(124, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'Nama', '3', '', 'Ahmad'),
(125, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0201_siswa', 'id', '3', '', '3'),
(126, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', '*** Batch insert begin ***', 't0202_siswaiuran', '', '', '', ''),
(127, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'tahunajaran_id', '6', '', '1'),
(128, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'iuran_id', '6', '', '1'),
(129, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'Nilai', '6', '', '75000'),
(130, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'siswa_id', '6', '', '3'),
(131, '2019-03-16 18:34:41', '/spp/t0201_siswaadd.php', '1', 'A', 't0202_siswaiuran', 'id', '6', '', '6'),
(132, '2019-03-16 18:34:42', '/spp/t0201_siswaadd.php', '1', '*** Batch insert successful ***', 't0202_siswaiuran', '', '', '', ''),
(133, '2019-03-16 18:52:16', '/spp/t0105_daftarsiswadetailadd.php', '1', 'A', 't0105_daftarsiswadetail', 'siswa_id', '3', '', '3'),
(134, '2019-03-16 18:52:16', '/spp/t0105_daftarsiswadetailadd.php', '1', 'A', 't0105_daftarsiswadetail', 'daftarsiswamaster_id', '3', '', '1'),
(135, '2019-03-16 18:52:16', '/spp/t0105_daftarsiswadetailadd.php', '1', 'A', 't0105_daftarsiswadetail', 'id', '3', '', '3'),
(136, '2019-03-18 09:00:56', '/spp/login.php', 'admin', 'login', '::1', '', '', '', ''),
(137, '2019-03-18 09:01:01', '/spp/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(138, '2019-03-18 09:01:03', '/spp/login.php', 'admin', 'login', '::1', '', '', '', ''),
(139, '2019-03-18 09:01:38', '/spp/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(140, '2019-03-18 09:01:40', '/spp/login.php', 'admin', 'login', '::1', '', '', '', ''),
(141, '2019-03-18 10:34:11', '/spp/login.php', 'admin', 'login', '::1', '', '', '', ''),
(142, '2019-03-18 13:33:05', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Nomor', '2', '', 'BYR002'),
(143, '2019-03-18 13:33:05', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Tanggal', '2', '', '2019-03-18'),
(144, '2019-03-18 13:33:05', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'tahunajaran_id', '2', '', '1'),
(145, '2019-03-18 13:33:05', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'siswa_id', '2', '', '1'),
(146, '2019-03-18 13:33:05', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Total', '2', '', '0'),
(147, '2019-03-18 13:33:05', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'id', '2', '', '2'),
(148, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert begin ***', 't0302_bayardetail', '', '', '', ''),
(149, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '3', '', '1'),
(150, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '3', '', '2'),
(151, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '3', '', '2'),
(152, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '3', '', NULL),
(153, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '3', '', '100000.00'),
(154, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '3', '', '2'),
(155, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '3', '', '3'),
(156, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '4', '', '2'),
(157, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '4', '', '2'),
(158, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '4', '', '2'),
(159, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '4', '', NULL),
(160, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '4', '', '200000.00'),
(161, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '4', '', '2'),
(162, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '4', '', '4'),
(163, '2019-03-18 13:33:06', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert successful ***', 't0302_bayardetail', '', '', '', ''),
(164, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Nomor', '3', '', 'BYR003'),
(165, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Tanggal', '3', '', '2019-03-18'),
(166, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'tahunajaran_id', '3', '', '1'),
(167, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'siswa_id', '3', '', '1'),
(168, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Total', '3', '', '0'),
(169, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'id', '3', '', '3'),
(170, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert begin ***', 't0302_bayardetail', '', '', '', ''),
(171, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '5', '', '1'),
(172, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '5', '', '3'),
(173, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '5', '', '3'),
(174, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '5', '', NULL),
(175, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '5', '', '100000.00'),
(176, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '5', '', '3'),
(177, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '5', '', '5'),
(178, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '6', '', '2'),
(179, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '6', '', '3'),
(180, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '6', '', '3'),
(181, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '6', '', NULL),
(182, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '6', '', '200000.00'),
(183, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '6', '', '3'),
(184, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '6', '', '6'),
(185, '2019-03-18 13:42:40', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert successful ***', 't0302_bayardetail', '', '', '', ''),
(186, '2019-03-18 17:20:31', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Nomor', '4', '', 'BYR004'),
(187, '2019-03-18 17:20:31', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Tanggal', '4', '', '2019-03-18'),
(188, '2019-03-18 17:20:31', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'tahunajaran_id', '4', '', '1'),
(189, '2019-03-18 17:20:31', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'siswa_id', '4', '', '1'),
(190, '2019-03-18 17:20:31', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Total', '4', '', '0'),
(191, '2019-03-18 17:20:31', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'id', '4', '', '4'),
(192, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert begin ***', 't0302_bayardetail', '', '', '', ''),
(193, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '7', '', '1'),
(194, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '7', '', '4'),
(195, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '7', '', '4'),
(196, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '7', '', NULL),
(197, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '7', '', '100000.00'),
(198, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '7', '', '4'),
(199, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '7', '', '7'),
(200, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '8', '', '2'),
(201, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '8', '', '4'),
(202, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '8', '', '4'),
(203, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '8', '', NULL),
(204, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '8', '', '200000.00'),
(205, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '8', '', '4'),
(206, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '8', '', '8'),
(207, '2019-03-18 17:20:32', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert successful ***', 't0302_bayardetail', '', '', '', ''),
(208, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Nomor', '5', '', 'BYR005'),
(209, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Tanggal', '5', '', '2019-03-18'),
(210, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'tahunajaran_id', '5', '', '1'),
(211, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'siswa_id', '5', '', '1'),
(212, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Total', '5', '', '0'),
(213, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'id', '5', '', '5'),
(214, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert begin ***', 't0302_bayardetail', '', '', '', ''),
(215, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '9', '', '1'),
(216, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '9', '', '5'),
(217, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '9', '', '5'),
(218, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '9', '', NULL),
(219, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '9', '', '100000.00'),
(220, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '9', '', '5'),
(221, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '9', '', '9'),
(222, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '10', '', '2'),
(223, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '10', '', '5'),
(224, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '10', '', '5'),
(225, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '10', '', NULL),
(226, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '10', '', '200000.00'),
(227, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '10', '', '5'),
(228, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '10', '', '10'),
(229, '2019-03-18 17:24:36', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert successful ***', 't0302_bayardetail', '', '', '', ''),
(230, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Nomor', '6', '', 'BYR006'),
(231, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Tanggal', '6', '', '2019-03-18'),
(232, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'tahunajaran_id', '6', '', '1'),
(233, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'siswa_id', '6', '', '3'),
(234, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'Total', '6', '', '0'),
(235, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0301_bayarmaster', 'id', '6', '', '6'),
(236, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert begin ***', 't0302_bayardetail', '', '', '', ''),
(237, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'iuran_id', '11', '', '1'),
(238, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode1', '11', '', '1'),
(239, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Periode2', '11', '', '1'),
(240, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Keterangan', '11', '', NULL),
(241, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'Jumlah', '11', '', '75000.00'),
(242, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'bayarmaster_id', '11', '', '6'),
(243, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', 'A', 't0302_bayardetail', 'id', '11', '', '11'),
(244, '2019-03-18 17:39:57', '/spp/t0301_bayarmasteradd.php', '1', '*** Batch insert successful ***', 't0302_bayardetail', '', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v0101_daftarsiswamasterdetail`
-- (See below for the actual view)
--
CREATE TABLE `v0101_daftarsiswamasterdetail` (
`id` int(11)
,`tahunajaran_id` int(11)
,`sekolah_id` int(11)
,`kelas_id` int(11)
,`siswa_id` int(11)
);

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
-- Stand-in structure for view `v0302_potensi`
-- (See below for the actual view)
--
CREATE TABLE `v0302_potensi` (
`ds_id` int(11)
,`ta_id` int(11)
,`TahunAjaran` varchar(11)
,`s_id` int(11)
,`Sekolah` varchar(100)
,`k_id` int(11)
,`Kelas` varchar(100)
,`dsd_id` int(11)
,`siswa_id` int(11)
,`NIS` varchar(100)
,`Nama` varchar(100)
,`sswiur_id` int(11)
,`iuran_id` int(11)
,`Iuran` varchar(100)
,`Jenis` enum('Rutin','Non-Rutin')
,`Nilai` float(14,2)
,`Jumlah` double(19,2)
,`Terbayar` double(19,2)
,`Sisa` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v0303_potensi`
-- (See below for the actual view)
--
CREATE TABLE `v0303_potensi` (
`tahunajaran` varchar(11)
,`sekolah` varchar(100)
,`kelas` varchar(100)
,`nis` varchar(100)
,`nama` varchar(100)
,`iuran` varchar(100)
,`jumlah` double(19,2)
,`terbayar` double(19,2)
,`sisa` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v0304_potensi`
-- (See below for the actual view)
--
CREATE TABLE `v0304_potensi` (
`iuran_id` int(11)
,`Iuran` varchar(100)
,`Jenis` enum('Rutin','Non-Rutin')
,`tahunajaran_id` int(11)
,`TahunAjaran` varchar(11)
,`sekolah_id` int(11)
,`Sekolah` varchar(100)
,`kelas_id` int(11)
,`Kelas` varchar(100)
,`Potensi` double(19,2)
,`Terbayar` double(19,2)
,`Sisa` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v0305_potensi`
-- (See below for the actual view)
--
CREATE TABLE `v0305_potensi` (
`iuran` varchar(100)
,`jenis` enum('Rutin','Non-Rutin')
,`tahunajaran` varchar(11)
,`sekolah` varchar(100)
,`kelas` varchar(100)
,`potensi` double(19,2)
,`terbayar` double(19,2)
,`sisa` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v0306_pembayaran`
-- (See below for the actual view)
--
CREATE TABLE `v0306_pembayaran` (
`TahunAjaran` varchar(11)
,`Sekolah` varchar(100)
,`Kelas` varchar(100)
,`NIS` varchar(100)
,`Nama` varchar(100)
,`Iuran` varchar(100)
,`Jenis` enum('Rutin','Non-Rutin')
,`Nomor` varchar(25)
,`Tanggal` date
,`Periode1` varchar(9)
,`Periode2` varchar(9)
,`Jumlah` float(14,2)
);

-- --------------------------------------------------------

--
-- Structure for view `v0101_daftarsiswamasterdetail`
--
DROP TABLE IF EXISTS `v0101_daftarsiswamasterdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0101_daftarsiswamasterdetail`  AS  select `dsm`.`id` AS `id`,`dsm`.`tahunajaran_id` AS `tahunajaran_id`,`dsm`.`sekolah_id` AS `sekolah_id`,`dsm`.`kelas_id` AS `kelas_id`,`dsd`.`siswa_id` AS `siswa_id` from (`t0104_daftarsiswamaster` `dsm` left join `t0105_daftarsiswadetail` `dsd` on((`dsm`.`id` = `dsd`.`daftarsiswamaster_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v0301_bayarmasterdetail`
--
DROP TABLE IF EXISTS `v0301_bayarmasterdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0301_bayarmasterdetail`  AS  select `a`.`id` AS `bayarmaster_id`,`a`.`tahunajaran_id` AS `tahunajaran_id`,`a`.`siswa_id` AS `siswa_id`,`a`.`Nomor` AS `Nomor`,`a`.`Tanggal` AS `Tanggal`,`a`.`Total` AS `Total`,`b`.`id` AS `bayardetail_id`,`b`.`iuran_id` AS `iuran_id`,`b`.`Periode1` AS `Periode1`,`b`.`Periode2` AS `Periode2`,`b`.`Keterangan` AS `Keterangan`,`b`.`Jumlah` AS `Jumlah` from (`t0301_bayarmaster` `a` left join `t0302_bayardetail` `b` on((`a`.`id` = `b`.`bayarmaster_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v0302_potensi`
--
DROP TABLE IF EXISTS `v0302_potensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0302_potensi`  AS  select `ds`.`id` AS `ds_id`,`ta`.`id` AS `ta_id`,`ta`.`TahunAjaran` AS `TahunAjaran`,`s`.`id` AS `s_id`,`s`.`Sekolah` AS `Sekolah`,`k`.`id` AS `k_id`,`k`.`Kelas` AS `Kelas`,`dsd`.`id` AS `dsd_id`,`dsd`.`siswa_id` AS `siswa_id`,`ssw`.`NIS` AS `NIS`,`ssw`.`Nama` AS `Nama`,`sswiur`.`id` AS `sswiur_id`,`sswiur`.`iuran_id` AS `iuran_id`,`iur`.`Iuran` AS `Iuran`,`iur`.`Jenis` AS `Jenis`,`sswiur`.`Nilai` AS `Nilai`,(case when (`iur`.`Jenis` = 'Rutin') then (`sswiur`.`Nilai` * 12) else `sswiur`.`Nilai` end) AS `Jumlah`,(case when (`iur`.`Jenis` = 'Rutin') then ((((((((((((if((`sswiur`.`P01` = '0'),0,1) + if((`sswiur`.`P02` = '0'),0,1)) + if((`sswiur`.`P03` = '0'),0,1)) + if((`sswiur`.`P04` = '0'),0,1)) + if((`sswiur`.`P05` = '0'),0,1)) + if((`sswiur`.`P06` = '0'),0,1)) + if((`sswiur`.`P07` = '0'),0,1)) + if((`sswiur`.`P08` = '0'),0,1)) + if((`sswiur`.`P09` = '0'),0,1)) + if((`sswiur`.`P10` = '0'),0,1)) + if((`sswiur`.`P11` = '0'),0,1)) + if((`sswiur`.`P12` = '0'),0,1)) * `sswiur`.`Nilai`) else `sswiur`.`Terbayar` end) AS `Terbayar`,((case when (`iur`.`Jenis` = 'Rutin') then (`sswiur`.`Nilai` * 12) else `sswiur`.`Nilai` end) - (case when (`iur`.`Jenis` = 'Rutin') then ((((((((((((if((`sswiur`.`P01` = '0'),0,1) + if((`sswiur`.`P02` = '0'),0,1)) + if((`sswiur`.`P03` = '0'),0,1)) + if((`sswiur`.`P04` = '0'),0,1)) + if((`sswiur`.`P05` = '0'),0,1)) + if((`sswiur`.`P06` = '0'),0,1)) + if((`sswiur`.`P07` = '0'),0,1)) + if((`sswiur`.`P08` = '0'),0,1)) + if((`sswiur`.`P09` = '0'),0,1)) + if((`sswiur`.`P10` = '0'),0,1)) + if((`sswiur`.`P11` = '0'),0,1)) + if((`sswiur`.`P12` = '0'),0,1)) * `sswiur`.`Nilai`) else `sswiur`.`Terbayar` end)) AS `Sisa` from (((((((`t0104_daftarsiswamaster` `ds` left join `t0101_tahunajaran` `ta` on((`ds`.`tahunajaran_id` = `ta`.`id`))) left join `t0102_sekolah` `s` on((`ds`.`sekolah_id` = `s`.`id`))) left join `t0103_kelas` `k` on((`ds`.`kelas_id` = `k`.`id`))) left join `t0105_daftarsiswadetail` `dsd` on((`ds`.`id` = `dsd`.`daftarsiswamaster_id`))) left join `t0201_siswa` `ssw` on((`dsd`.`siswa_id` = `ssw`.`id`))) left join `t0202_siswaiuran` `sswiur` on(((`ssw`.`id` = `sswiur`.`siswa_id`) and (`ta`.`id` = `sswiur`.`tahunajaran_id`)))) left join `t0106_iuran` `iur` on((`sswiur`.`iuran_id` = `iur`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v0303_potensi`
--
DROP TABLE IF EXISTS `v0303_potensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0303_potensi`  AS  select `v0302_potensi`.`TahunAjaran` AS `tahunajaran`,`v0302_potensi`.`Sekolah` AS `sekolah`,`v0302_potensi`.`Kelas` AS `kelas`,`v0302_potensi`.`NIS` AS `nis`,`v0302_potensi`.`Nama` AS `nama`,`v0302_potensi`.`Iuran` AS `iuran`,sum(`v0302_potensi`.`Jumlah`) AS `jumlah`,sum(`v0302_potensi`.`Terbayar`) AS `terbayar`,sum(`v0302_potensi`.`Sisa`) AS `sisa` from `v0302_potensi` group by `v0302_potensi`.`ta_id`,`v0302_potensi`.`s_id`,`v0302_potensi`.`k_id`,`v0302_potensi`.`siswa_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v0304_potensi`
--
DROP TABLE IF EXISTS `v0304_potensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0304_potensi`  AS  select `i`.`id` AS `iuran_id`,`i`.`Iuran` AS `Iuran`,`i`.`Jenis` AS `Jenis`,`si`.`tahunajaran_id` AS `tahunajaran_id`,`ta`.`TahunAjaran` AS `TahunAjaran`,`dsm`.`sekolah_id` AS `sekolah_id`,`sklh`.`Sekolah` AS `Sekolah`,`dsm`.`kelas_id` AS `kelas_id`,`kls`.`Kelas` AS `Kelas`,if((`i`.`Jenis` = 'Rutin'),(`si`.`Nilai` * 12),`si`.`Nilai`) AS `Potensi`,if((`i`.`Jenis` = 'Rutin'),((((((((((((if((`si`.`P01` = '0'),0,1) + if((`si`.`P02` = '0'),0,1)) + if((`si`.`P03` = '0'),0,1)) + if((`si`.`P04` = '0'),0,1)) + if((`si`.`P05` = '0'),0,1)) + if((`si`.`P06` = '0'),0,1)) + if((`si`.`P07` = '0'),0,1)) + if((`si`.`P08` = '0'),0,1)) + if((`si`.`P09` = '0'),0,1)) + if((`si`.`P10` = '0'),0,1)) + if((`si`.`P11` = '0'),0,1)) + if((`si`.`P12` = '0'),0,1)) * `si`.`Nilai`),`si`.`Terbayar`) AS `Terbayar`,(if((`i`.`Jenis` = 'Rutin'),(`si`.`Nilai` * 12),`si`.`Nilai`) - if((`i`.`Jenis` = 'Rutin'),((((((((((((if((`si`.`P01` = '0'),0,1) + if((`si`.`P02` = '0'),0,1)) + if((`si`.`P03` = '0'),0,1)) + if((`si`.`P04` = '0'),0,1)) + if((`si`.`P05` = '0'),0,1)) + if((`si`.`P06` = '0'),0,1)) + if((`si`.`P07` = '0'),0,1)) + if((`si`.`P08` = '0'),0,1)) + if((`si`.`P09` = '0'),0,1)) + if((`si`.`P10` = '0'),0,1)) + if((`si`.`P11` = '0'),0,1)) + if((`si`.`P12` = '0'),0,1)) * `si`.`Nilai`),`si`.`Terbayar`)) AS `Sisa` from ((((((`t0106_iuran` `i` left join `t0202_siswaiuran` `si` on((`i`.`id` = `si`.`iuran_id`))) left join `t0101_tahunajaran` `ta` on((`si`.`tahunajaran_id` = `ta`.`id`))) left join `t0105_daftarsiswadetail` `dsd` on((`si`.`siswa_id` = `dsd`.`siswa_id`))) left join `t0104_daftarsiswamaster` `dsm` on((`dsd`.`daftarsiswamaster_id` = `dsm`.`id`))) left join `t0102_sekolah` `sklh` on((`dsm`.`sekolah_id` = `sklh`.`id`))) left join `t0103_kelas` `kls` on((`dsm`.`kelas_id` = `kls`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v0305_potensi`
--
DROP TABLE IF EXISTS `v0305_potensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0305_potensi`  AS  select `v0304_potensi`.`Iuran` AS `iuran`,`v0304_potensi`.`Jenis` AS `jenis`,`v0304_potensi`.`TahunAjaran` AS `tahunajaran`,`v0304_potensi`.`Sekolah` AS `sekolah`,`v0304_potensi`.`Kelas` AS `kelas`,sum(`v0304_potensi`.`Potensi`) AS `potensi`,sum(`v0304_potensi`.`Terbayar`) AS `terbayar`,sum(`v0304_potensi`.`Sisa`) AS `sisa` from `v0304_potensi` group by `v0304_potensi`.`Iuran` ;

-- --------------------------------------------------------

--
-- Structure for view `v0306_pembayaran`
--
DROP TABLE IF EXISTS `v0306_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v0306_pembayaran`  AS  select `ta`.`TahunAjaran` AS `TahunAjaran`,`sklh`.`Sekolah` AS `Sekolah`,`kls`.`Kelas` AS `Kelas`,`ssw`.`NIS` AS `NIS`,`ssw`.`Nama` AS `Nama`,`iur`.`Iuran` AS `Iuran`,`iur`.`Jenis` AS `Jenis`,`byr`.`Nomor` AS `Nomor`,`byr`.`Tanggal` AS `Tanggal`,(case `byr`.`Periode1` when '1' then 'Juli' when '2' then 'Agustus' when '3' then 'September' when '4' then 'Oktober' when '5' then 'November' when '6' then 'Desember' when '7' then 'Januari' when '8' then 'Februari' when '9' then 'Maret' when '10' then 'April' when '11' then 'Mei' when '12' then 'Juni' end) AS `Periode1`,(case `byr`.`Periode2` when '1' then 'Juli' when '2' then 'Agustus' when '3' then 'September' when '4' then 'Oktober' when '5' then 'November' when '6' then 'Desember' when '7' then 'Januari' when '8' then 'Februari' when '9' then 'Maret' when '10' then 'April' when '11' then 'Mei' when '12' then 'Juni' end) AS `Periode2`,`byr`.`Jumlah` AS `Jumlah` from ((((((`v0301_bayarmasterdetail` `byr` left join `v0101_daftarsiswamasterdetail` `dft` on(((`byr`.`tahunajaran_id` = `dft`.`tahunajaran_id`) and (`byr`.`siswa_id` = `dft`.`siswa_id`)))) left join `t0101_tahunajaran` `ta` on((`byr`.`tahunajaran_id` = `ta`.`id`))) left join `t0102_sekolah` `sklh` on((`dft`.`sekolah_id` = `sklh`.`id`))) left join `t0103_kelas` `kls` on((`dft`.`kelas_id` = `kls`.`id`))) left join `t0201_siswa` `ssw` on((`byr`.`siswa_id` = `ssw`.`id`))) left join `t0106_iuran` `iur` on((`byr`.`iuran_id` = `iur`.`id`))) ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t0106_iuran`
--
ALTER TABLE `t0106_iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t0201_siswa`
--
ALTER TABLE `t0201_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t0202_siswaiuran`
--
ALTER TABLE `t0202_siswaiuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t0301_bayarmaster`
--
ALTER TABLE `t0301_bayarmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t0302_bayardetail`
--
ALTER TABLE `t0302_bayardetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t9996_employees`
--
ALTER TABLE `t9996_employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t9999_audittrail`
--
ALTER TABLE `t9999_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
