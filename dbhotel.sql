-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 04:23 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jeniskamar`
--

CREATE TABLE IF NOT EXISTS `tbl_jeniskamar` (
  `id_jeniskamar` int(11) NOT NULL,
  `jenis_kamar` varchar(30) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jeniskamar`
--

INSERT INTO `tbl_jeniskamar` (`id_jeniskamar`, `jenis_kamar`, `deskripsi`, `harga`) VALUES
(1, 'Standard', 'Kamar ini emiliki fasilitas televisi, pembuat kopi, telepon, meja, kloset, kamar mandi, 2 kasur queen-size', '200000'),
(2, 'Deluxe', 'Kamar ini didesain untuk terlihat lebih berkelas dalam berbagai hal', '1500000'),
(3, 'Executive', 'Dengan ruangan yang lebih besar, pemandangan dan perlengkapan terbaik yang ditawarkan', '5000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE IF NOT EXISTS `tbl_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `id_jeniskamar` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id_kamar`, `nama_kamar`, `id_jeniskamar`, `harga`, `gambar`, `deskripsi`) VALUES
(1, 'Melati Room', '1', '200000', 'room-1.jpg', 'Kamar ini emiliki fasilitas televisi, pembuat kopi, telepon, meja, kloset, kamar mandi, 2 kasur queen-size'),
(2, 'Presiden Suite', '2', '1500000', 'room-2.jpg', 'Kamar ini didesain untuk terlihat lebih berkelas dalam berbagai hal'),
(3, 'Kennedy Room', '3', '5000000', 'room-3.jpg', 'Dengan ruangan yang lebih besar, pemandangan dan perlengkapan terbaik yang ditawarkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_jeniskamar` varchar(30) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `durasi` varchar(5) NOT NULL,
  `diskon` varchar(5) NOT NULL,
  `total_bayar` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_jeniskamar`, `nama_pemesan`, `tanggal_pesanan`, `no_identitas`, `jenis_kelamin`, `durasi`, `diskon`, `total_bayar`) VALUES
(1, '2', 'Hasna', '2022-01-17', '1234567890987654', 'Perempuan', '3', '0', '4050000'),
(2, '3', 'Angga', '2022-01-01', '1234567890987643', 'Laki=Laki', '5', '10', '22580000'),
(3, '1', 'doroaja', '2022-01-13', '1234567890987645', 'Perempuan', '1', '0', '280000'),
(4, '3', 'Putra', '2022-01-13', '1234567890987641', 'Laki=Laki', '1', '0', '5000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Hasna', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jeniskamar`
--
ALTER TABLE `tbl_jeniskamar`
  ADD PRIMARY KEY (`id_jeniskamar`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jeniskamar`
--
ALTER TABLE `tbl_jeniskamar`
  MODIFY `id_jeniskamar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
