-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2022 at 03:09 PM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikm`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_vote` int(11) NOT NULL,
  `id_opsi` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `bagian` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_vote`, `id_opsi`, `date_create`, `id_layanan`, `bagian`) VALUES
(9, 1, '2022-06-14 15:05:50', 4, 'Resepsionis'),
(10, 4, '2022-06-14 15:05:53', 5, 'Kasir'),
(11, 2, '2022-06-14 15:05:56', 6, 'Kantin'),
(12, 3, '2022-06-14 15:06:00', 7, 'Parkir'),
(13, 3, '2022-06-14 15:06:04', 4, 'Resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_instansi`
--

CREATE TABLE `identitas_instansi` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(60) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `link_maps` varchar(150) NOT NULL,
  `kode_instansi` varchar(10) NOT NULL,
  `nama_singkat_instansi` varchar(35) NOT NULL,
  `logo_instansi_warna` varchar(150) NOT NULL,
  `logo_instansi_hitam_putih` varchar(150) NOT NULL,
  `status` enum('aktif','blok') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_instansi`
--

INSERT INTO `identitas_instansi` (`id`, `nama_instansi`, `alamat`, `email`, `website`, `kode_pos`, `telp`, `fax`, `link_maps`, `kode_instansi`, `nama_singkat_instansi`, `logo_instansi_warna`, `logo_instansi_hitam_putih`, `status`) VALUES
(1, 'Kantor Dinas Pelayanan Masyarakat', 'Jalan Raya GedangKlutuk No7 Kecamatan GedangGoreng Kabupaten Mojokerto ', 'gedangklutuk@gmail.com', 'www.gedangklutuk.com', 623453, '03210850358239', '03210850358239', 'https://maps.google.com', 'KDPM', 'DinasPelma', 'begong_warna.png', 'begong.png', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`) VALUES
(4, 'Resepsionis'),
(5, 'Kasir'),
(6, 'Kantin'),
(7, 'Parkir');

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

CREATE TABLE `opsi` (
  `id_opsi` int(11) NOT NULL,
  `nama_opsi` varchar(150) NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id_opsi`, `nama_opsi`, `thumbnail`) VALUES
(1, 'SANGAT PUAS /<br> EXCELLENT', '1super.png'),
(2, 'PUAS /<br> SATISFIED', '2happy.png'),
(3, 'CUKUP PUAS /<br> FAIR', '3fair.png'),
(4, 'TIDAK PUAS /<br> POOR', '4sad.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_vote`);

--
-- Indexes for table `identitas_instansi`
--
ALTER TABLE `identitas_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `opsi`
--
ALTER TABLE `opsi`
  ADD PRIMARY KEY (`id_opsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `identitas_instansi`
--
ALTER TABLE `identitas_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `opsi`
--
ALTER TABLE `opsi`
  MODIFY `id_opsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
